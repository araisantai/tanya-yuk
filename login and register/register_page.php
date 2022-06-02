<?php 
 
include '../function/config.php';
 
error_reporting(0);
 
 
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_akun = $_POST['nama_akun'];
  
    $pemilik_insert_query = "INSERT INTO pengguna(username, password, nama_akun) VALUES('$username', '$password', '$nama_akun')";  
    
    $pemilik_result = pg_query($db, $pemilik_insert_query);  
  
    
    if($pemilik_result) {
        header("Location: login_page.php");
    } else {
        echo "Gagal";
        header("Location: register_page.php");  
    }
  }
 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../frontend/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>Tanya Yuk!</title>
    <link rel="icon" type="image/png" href="../frontend/img/favicon.png" sizes="16x16">
</head>
<body>
    <div id="logsin">
        <div class="reg">
            <div class="split left reg">
                <div class="centered">
                    <div class="container">
                        <form action="" method="POST" class="login-email" style="width: 20rem;">
                            <img src="../frontend/img/icon.png" alt="" style ="max-height: 150px; width: auto;">
                            <p class="login-text" style="font-size: 20px; font-weight: 300; font-family: Patrick Hand;">Tanyakan Berbagai Hal di Kepalamu dan Bantu Mereka Menemukan Jawabannya</p>
                            <p class="login-text" style="font-size: 2.5rem; font-weight: 300; font-family: Lobster; margin-top: 8px;">Register</p>
                            <p class="login-text" style="font-size: 13px; font-weight: 300; font-family: Quicksand; margin-bottom: 13px;">Ayo buat akunmu sekarang dan mulai bertanya</p>
                            <div class="input-group">
                                <i class="bi bi-pen-fill"></i><input type="text" placeholder="Nama akun" name="nama_akun" value="<?php echo $nama_akun; ?>" required>
                            </div>
                            <div class="input-group">
                                <i class="bi bi-person-fill"></i><input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                            </div>
                            <div class="input-group">
                                <i class="bi bi-lock-fill"></i><input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                            </div>
                            <div class="input-group">
                                <button name="submit" class="btn">Register</button>
                            </div>
                            <p class="login-register-text">Anda sudah punya akun? <a href="../login and register/login_page.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>

            <div class="split right">
                <div class="centered">
                    <img src="../frontend/img/regis.png">
                </div>
            </div>
        </div>
    </div>
</body>
</html>