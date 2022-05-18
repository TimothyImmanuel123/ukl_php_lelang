<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "navbar.php";
        include "koneksi.php";
        $query_detail_barang = mysqli_query($koneksi, "SELECT * FROM barang where id_barang = '".$_GET['id_barang']."'");
        $data_barang = mysqli_fetch_array($query_detail_barang);
    ?>
    <main class="container">
    <section class="py-5 text-center container">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Detail barang</h1>
        </div>
    </section>

    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="../admin/foto/<?=$data_barang['foto']?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
            <form action="proses_menawar.php" method="POST">
                <input type="hidden" name="id_barang" value="<?=$data_barang['id_barang']?>">
                <input type="hidden" name="harga_awal" value="<?=$data_barang['harga_awal']?>">
                <table class="table table-hover table-striped">
                <thead>
                        <tr>
                            <td>nama barang</td>
                            <td colspan="2"><?=$data_barang['nama_barang']?></td>
                        </tr>
                        <tr>
                        <td>Harga awal</td>
                            <td colspan="2"><?="Rp".number_format($data_barang['harga_awal'])?></b></td>
                        </tr>
                        <tr>
                        <tr>
                        <td>Deskripsi</td>
                            <td colspan="2"><?=$data_barang['deskripsi']?></td>
                        </tr>
                        <?php if($data_barang['status'] == 'dibuka') :?>
                        </tr>
                            <td>menawar</td>
                            <td><input type="number" name="harga_akhir"  placeholder="harga tawar yang dimasukkan"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-success" value="Tawar barang"></td>
                        </tr>
                        <?php endif; ?>

                    </thead>
                </table>
            </form>
            </div>
            </div>
        </div>
    </div>
        <div> 
            <h1 style="text-align:center">RIWAYAT LELANG</h1>
                        <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr style="text-align:left">
                                    <th scope="col">NAMA PESERTA</th>
                                    <th scope="col">HARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($data_barang['status'] == 'ditutup'){
                                    $query_lelang=mysqli_query($koneksi, "
                                    SELECT lelang.id_barang, lelang.id_masyarakat, lelang.harga_akhir, masyarakat.nama 
                                    FROM lelang
                                    JOIN masyarakat ON masyarakat.id_masyarakat = lelang.id_masyarakat where id_barang = '".$_GET['id_barang']."'
                                    ORDER BY harga_akhir DESC");

                                    while($data_lelang = mysqli_fetch_array($query_lelang)){
                                ?>
                                    <tr style="text-align:left">
                                        <td><?=$data_lelang['nama']?></td>
                                        <td><?="Rp".number_format($data_lelang['harga_akhir'])." ,"?></td>
                                    </tr>                
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
</body>
</html>