
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Register</title>
</head>
<body>
    
    <div class="container">
        <form method="POST" action="proses_tambah_petugas.php">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="nama" name="nama_petugas" value="">
            </div>
            <div class="input-group">
                <input type="text" placeholder="username" name="username" value="">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="">
            </div>
            <div>
            <div class="input-group">
                <input type="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>