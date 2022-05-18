<?php 
    session_start();
    include "koneksi.php";
    $id_barang = $_POST["id_barang"];
    $harga_tawar = $_POST["harga_tawar"];
    $harga_akhir = $harga_tawar > 'harga_awal';

    if($harga_tawar < 'harga_awal') {
        echo "<script>alert('Harga Tawar Kurang');location.href='data_barang.php';</script>";
    }  
    else if ($harga_akhir) {
        $tgl_lelang = date('Y-m-d');
        $query_lelang = mysqli_query($koneksi, "INSERT INTO lelang (id_barang, tgl_lelang, harga_akhir, 
        id_petugas, status, id_masyarakat) VALUES ('".$id_barang."', '".$tgl_lelang."',
        '".$harga_akhir."', '".$status."','".$_SESSION['id_pelanggan']."')");
    } else {
        echo "<script>alert('Gagal');location.href='lihat_barang.php';</script>";
    }
    
?>