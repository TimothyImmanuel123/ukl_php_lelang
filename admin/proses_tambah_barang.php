<?php
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $harga_awal = $_POST['harga_awal'];
    $tgl_daftar = $_POST['tgl_daftar'];
    

    $temp = $_FILES['foto']['tmp_name'];
    $type = $_FILES['foto']['type'];
    $size = $_FILES['foto']['size'];
    $name = rand(0,9999).$_FILES['foto']['name'];
    $folder = "foto/";

    include "koneksi.php";
    if($size < 2048000 and ($type == "image/jpeg" or $type == "image/png"))
    {
        move_uploaded_file($temp, $folder . $name);

        $input = mysqli_query($koneksi, "INSERT INTO barang (nama_barang,
        deskripsi, harga_awal, foto, tgl_daftar) VALUES ('".$nama_barang."', 
        '".$deskripsi."', '".$harga_awal."',  '".$name."',  '".$tgl_daftar."')");

        if($input){
            echo "<script>alert('Berhasil');
            location.href='data_barang.php';</script>";
        } else {
            echo "<script>alert('Gagal');
            location.href='tambah_barang.php';</script>";
        }
    }
    else {
        echo "<script>alert('File tidak sesuai');
        location.href='tambah_barang.php';</script>";
    }

?>