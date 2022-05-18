<?php
    $nama_petugas = $_POST["nama_petugas"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO petugas 
    (nama_petugas, username, password)  VALUES 
    ('".$nama_petugas."', '".$username."', '".md5($password)."')");
    if ($input) {
        echo "<script>alert('Berhasil menambahkan petugas');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal menambahkan petugas');location.href='tambah_petugas.php';</script>";
    }
?>