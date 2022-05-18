<?php
    if ($_GET['id_barang']) {
        include "koneksi.php";

        $id_barang = $_GET['id_barang'];
        $folder = "foto/";

        $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
        $query = mysqli_query($koneksi, $sql);
        $barang = mysqli_fetch_array($query);
        $path = $folder.$barang["foto"];
        
        if (file_exists($path)) {
            unlink($path);
        }


        $qry_hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id_barang'");
        if ($qry_hapus) {
            echo "<script>alert('Berhasil menghapus barang');location.href='data_barang.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus barang');location.href='data_barang.php';</script>";
            echo mysqli_error($koneksi);
        }
    } else {
        echo "id_barang tidak ada";
    }
?>