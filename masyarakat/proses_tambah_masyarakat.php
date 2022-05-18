<?php
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $tlp = $_POST["tlp"];

    include "koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO masyarakat
    (nama, username, password, tlp)  VALUES 
    ('".$nama."', '".$username."', '".md5($password)."','".$tlp."')");
    if ($input) {
        echo "<script>alert('Berhasil menambahkan masyarakat');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal menambahkan masyarakat');location.href='tambah_pelanggan.php';</script>";
    }
?>