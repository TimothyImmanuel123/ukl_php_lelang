<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>

    <?php 
        include "navbar.php"
    ?>
    <div class="container">
        <br>
        <div class="card" >
            <div class="card-header">
                <h1>DATA PETUGAS</h1>
                <form method="POST" action="tampil_petugas.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Cari">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id Petugas</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_petugas = mysqli_query($koneksi, "select * from petugas where id_petugas = '$cari' 
                        or nama_petugas like '%$cari%'");
                    }
                    else{
                        $query_petugas = mysqli_query($koneksi, "select * from petugas");
                    }
                    while($data_petugas = mysqli_fetch_array($query_petugas)){
                ?>
                    <tr>
                        <td><?=$data_petugas['id_petugas']?></td>
                        <td><?=$data_petugas['nama_petugas']?></td>
                        <td><?=$data_petugas['username']?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>