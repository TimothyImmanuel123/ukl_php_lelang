<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
</head>

<body style="background-color: white">
    <header>
        <?php
            include "navbar3.php";
        ?>
    </header>
    <main>
    <div class="container">
        <br><br><br>
        <h1 style="text-align: center;">DAFTAR PRODUK</h1>
        <hr>
        <p>Cari produk :</p>
        <form action="barang.php" method="POST" style="padding-bottom: 15px;" class="d-flex">
            <input class="form-control me-2" type="search" name="cari" placeholder="Masukkan keyword nama produk" aria-label="Search">
            <button class="btn btn-outline_secondary" type="submit" >Search</button>
        </form>
        <p style="color: red;">*Masukkan keyword dan klik search/enter</p>
        <br><br><hr>
    </div>

    <div class="album py-4">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-4">
        <?php 
            include "koneksi.php";
            if (isset($_POST['cari'])) {
                $cari = $_POST['cari'];
                $query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE 
                                nama_barang LIKE '%$cari%'");
            } else {
                $query_barang = mysqli_query($koneksi, "SELECT * FROM barang");
            } 
            while ($data_barang = mysqli_fetch_array($query_barang)) { 
        ?>

        <div class="col">
            <div class="card shadow-sm">
                <img src="foto/<?= $data_barang['foto']; ?>" 
                class="bd-placeholder-img card-img-top" width="100px" height="400px"
                xmlns="http://www.w3.org/2000/svg" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                focusable="false"><title>Placeholder</title>
                <rect width="100%" heigth="100%"></img>   

                <div class="card-body bg-light shadow">
                    <p class="card-text"><b><?= $data_barang['nama_barang']; ?></b></p>
                    <p class="card-text text-muted">Harga : Rp.<?= $data_barang['harga_awal']; ?></p>
                    <p class="card-text"><?= $data_barang['deskripsi']; ?></p>
                    <a href="lihat_barang.php?id_barang=<?= $data_barang['id_barang'] ?>" class="btn btn-outline-secondary">lihat barang</a>
                </div> 
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>