<?php
    include "koneksi.php";
    $id_barang= $_GET['id_barang'];
    $status = 'ditutup';

        $update = mysqli_query($koneksi,"UPDATE barang SET status = '".$status."' WHERE id_barang = '".$id_barang."'");
        if ($update) {
            echo "<script>alert('Anda Berhasil Menutup lelang');location.href='data_barang.php?id_barang=$id_barang'</script>";
            echo mysqli_error($koneksi);
        }
        else{
            echo "<script>alert('Gagal Menutup lelang');location.href='data_barang.php'</script>";
             //echo mysqli_error($koneksi);
        }
    
?>