<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <style>
        h1 {
            color: white;
        }
    </style>
</head>
<body style="background-color: white">
    <header>
        <?php
            include "navbar3.php";
        ?>
    </header>
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header" style="background-color: #2F008C;"><h1>Tambah Barang</h1></div>
        <div class="card-body">
        <a class="btn btn-secondary" href="data_barang.php" role="button">Kembali ke Data Barang</a>
        <hr>
        <form action="proses_tambah_barang.php" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="nama_produk" class="form-label">Nama Barang : </label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama Barang" required>
            </div>
            <div class="mb-2">
                <label for="deskripsi" class="form-label">tgl_daftar : </label>
                <input type="date" name="tgl_daftar" class="form-control" placeholder="Masukkan tanggal daftar" required>
            </div>
            <div class="mb-2">
                <label for="harga" class="form-label">Harga_awal : </label>
                <input type="text" name="harga_awal" class="form-control" placeholder="Masukkan harga awal barang" required>
            </div>
            <div class="mb-2">
                <label for="harga" class="form-label">deskripsi : </label>
                <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi" required>
            </div>
            <div class="mb-2">
                <label for="foto_barang" class="form-label">Foto produk : </label>
                <input type="file" name="foto" class="form-control" required>
                <p style="color: red">*Ekstensi yang diperbolehkan .png / .jpg / .jpeg<br>*Ukuran maksimal 2 MB</p>
            </div>
            <input type="submit" name="simpan" value="Tambah barang" class="btn btn-secondary">
        </form>
        </div>
    </div>
    </div>
</body>
</html>