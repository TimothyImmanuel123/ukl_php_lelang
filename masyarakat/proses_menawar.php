<?php
session_start();
include "koneksi.php";

    $id_barang = $_POST["id_barang"];
    $harga_awal = $_POST["harga_awal"];
    $harga_akhir = $_POST["harga_akhir"];
    // $penawaran_harga = $_POST["penawaran_harga"];

    if ($harga_akhir <= $harga_awal) {
        echo "<script>alert('Harga Terlalu Rendah');location.href='tawar_barang.php?id_barang=$id_barang';</script>";
    }else {
        $query_cek=mysqli_query($koneksi,"SELECT * FROM history_lelang where 
        id_barang = '".$id_barang."' and id_masyarakat = '".$_SESSION['id_masyarakat']."'");
        if (mysqli_num_rows($query_cek) >0) { 
        mysqli_query ($koneksi, "UPDATE barang SET harga_awal = '".$harga_akhir."'  WHERE id_barang= '".$id_barang."'");

        $insert = mysqli_query($koneksi, "INSERT INTO lelang (id_barang, tgl_lelang, harga_akhir, id_masyarakat) 
        values ('".$id_barang."','".date('Y-m-d')."','".$harga_akhir."','".$_SESSION['id_masyarakat']."')");
        mysqli_query($koneksi, "UPDATE history_lelang SET penawaran_harga = '".$harga_akhir."' where id_barang= '".$id_barang."'");
        $pemenang = mysqli_query($koneksi, "select id_barang, max(harga_akhir), id_masyarakat from lelang where id_barang = '".$id_barang."' ");
        $data_pemenang = mysqli_fetch_array($pemenang);
        mysqli_query ($koneksi, "UPDATE barang SET id_pemenang = '".$data_pemenang['id_masyarakat']."'  WHERE id_barang = '".$id_barang."'");
            if($insert){
               echo "<script>alert('Sukses Lelang');location.href='barang.php';</script>";
            } else {
                echo "<script>alert('Gagal Lelang');location.href='barang.php';</script>";
            }

        } 
        else {
            $insert_history = mysqli_query($koneksi, "INSERT INTO history_lelang (id_barang, id_masyarakat, penawaran_harga) 
            values ('".$id_barang."','".$_SESSION['id_masyarakat']."','".$harga_akhir."')");
                $pemenang = mysqli_query($koneksi, "select id_barang, max(harga_akhir), id_masyarakat from lelang where id_barang = '".$id_barang."' ");
                $data_pemenang = mysqli_fetch_array($pemenang);
                mysqli_query($koneksi,"UPDATE barang SET harga_awal = '".$harga_akhir."', id_pemenang = '".$_SESSION['id_masyarakat']."' WHERE id_barang = '".$id_barang."'");
                if($insert_history){
                    echo "<script>alert('Sukses');location.href='barang.php';</script>";
                } else {
                    echo "<script>alert('GAGAL');location.href='barang.php';</script>";
                }
        }
    }
    
?>1