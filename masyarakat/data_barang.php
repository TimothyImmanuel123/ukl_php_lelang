<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body style="background-color: white">
    <br><br><br>
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header" style="background-color:#e833b7;"><h1>Data Barang</h1></div>
        <div class="card-body">
            <a class="btn btn-secondary" href="tambah_barang.php" role="button">Tambahkan Barang</a>
            <hr>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID PRODUK</th>
                    <th scope="col">NAMA PRODUK</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">HARGA</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">FOTO BARANG</th>
                    <th scope="col">AKSI</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST["cari"])) {
                        // if ($_POST["cari"] != NULL)
                        // jika ada keyword pencarian
                        $cari = $_POST["cari"];
                        $query_produk = mysqli_query($koneksi, "SELECT * FROM barang WHERE
                        id_produk = '$cari' OR nama_produk LIKE '%$cari%'");
                    } else {
                        // jika tdk ada keyword pencarian
                        $query_barang = mysqli_query($koneksi, "SELECT * FROM barang");
                    }
                    
                    //$query_produk = mysqli_query($koneksi, "SELECT * FROM produk");
                    while ($data_barang = mysqli_fetch_array($query_barang)) { ?>
                        <tr>
                            <td><?= $data_barang['id_barang']; ?></td>
                            <td><?= $data_barang['nama_barang']; ?></td>
                            <td><?= $data_barang['tgl_daftar']; ?></td>
                            <td><?= $data_barang['harga_awal']; ?></td>
                            <td><?= $data_barang['deskripsi']; ?></td>
                            <td><img src="foto/<?=$data_barang['foto']?>" width="110" height="150"></td>
                            <td><?=$data_barang['status']?></td>
                            <td>
                            <a href="detail_barang.php?id_barang=<?=$data_barang['id_barang'];?>" class="btn btn-success">detail barang</a> 
                                <a href="ubah_barang.php?id_barang=<?=$data_barang['id_barang'];?>" class="btn btn-success">Ubah</a> 
                                <a href="hapus_barang.php?id_barang=<?=$data_barang['id_barang'];?>" 
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } 
                ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
</html>