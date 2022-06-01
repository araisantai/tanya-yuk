<?php 
include 'function/config.php';
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: login and register/login_page.php");
}

$u_name = $_SESSION["username"];
$pgsql=pg_query("SELECT * FROM pengguna WHERE username = '$u_name'");
$result=pg_fetch_array($pgsql);

if(isset($_POST['update'])) {
    $username = $_POST['username'];
    $nama_akun = $_POST['nama_akun'];
    $update_query = "UPDATE pengguna SET
    username = '$username', 
    nama_akun = '$nama_akun'
    WHERE username = '$u_name'";      
    $update = pg_query($db, $update_query);  
  
    
    if($update) {
        $_SESSION['username'] = $username;
        header("Location: userpage.php?status=berhasil");
    } else {
        header("Location: userpage.phpstatus=gagal");  
    }
}
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Tanya yuk!!</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <h3 class="login-text" style="font-size: 2rem; font-weight: 800;">Register</h3>
            <div class="input-group">
                <label for="nama_akun"><b>Nama akun :</b></label>
                <input type="text" placeholder="Nama akun" name="nama_akun" value="<?= $result['nama_akun']; ?>" required>
            </div>
            <div class="input-group">
                <label for="username"><b>Username :</b></label>
                <input type="text" placeholder="Username" name="username" value="<?= $result['username']; ?>" required>
            </div>
            <div class="input-group">
                <button name="update" class="btn">Update</button>
        </form>
    </div>
</body>
</html>