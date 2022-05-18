<?php
    session_start();
    if ($_SESSION['status_login'] != true){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lelang ONliNE</title>
    <!-- <link href="navbar.css" rel="stylesheet"> -->
    <!-- <link href="navbar.js" rel="javascript"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-light">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container"> <a class="navbar-brand" href="navbar.php"> <img src="lelangicon.jpg" alt="" width="35" class="rounded-circle"> </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"> <a class="nav-link active border-bottom" aria-current="page" href="navbar.php">Home</a> 
                <a class="nav-link" aria-current="page" href="barang.php">Barang Lelang</a> 
                <a class="nav-link" aria-current="page" href="tambah_barang.php">Tambah Barang</a>
                <a class="nav-link" aria-current="page" href="tampil_petugas.php">Data Petugas</a> 
            </div>
                <form class="d-flex">
                </form>
            </div>
            <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="user.png" alt="" width="50" height="30" class="rounded-circle me-2">
        <?php echo $_SESSION['nama_petugas'];?>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark bg-primary text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">keranjang</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="proses_logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
</div>

    </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>