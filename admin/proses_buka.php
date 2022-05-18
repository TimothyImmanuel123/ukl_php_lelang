<?php
    include "koneksi.php";
    $id_barang= $_GET['id_barang'];
    $status = 'dibuka';

        $update = mysqli_query($koneksi,"UPDATE barang SET status = '".$status."' WHERE id_barang = '".$id_barang."'");
        if ($update) {
            echo "<script>alert('Anda Berhasil Membuka lelang');location.href='data_barang.php?id_barang=$id_barang'</script>";
            echo mysqli_error($koneksi);
        }
        else{
            echo "<script>alert('Gagal Membuka lelang');location.href='data_barang.php'</script>";
             //echo mysqli_error($koneksi);
        }
    
?>