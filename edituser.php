<?php 
include 'includes/header.php';
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
        header("Location: userpage.php?status=gagal");  
    }
}
 
?>
<section id="profile">
    <div class="card">
        <div class="profile d-flex justify-content-center">
            <img src="frontend/img/profile.png" alt="mdo" class="profilepict">
        </div>
        <form action="" method="POST" class="login-email">
            <h3 class="login-text text-center" style="font-size: 25px; font-weight: 800; font-family:'Lobster';">Edit Profile</h3>
            <div class="input-group">
                <label for="nama_akun"><b>Nama Akun:  </b></label>
                <input type="text" placeholder="Nama akun" name="nama_akun" value="<?= $result['nama_akun']; ?>" required>
            </div>
            <div class="input-group">
                <label for="username"><b>Username   :  </b></label>
                <input type="text" placeholder="Username" name="username" value="<?= $result['username']; ?>" required>
            </div>
            <div class="input-group">
                <button name="update" class="btn-edit">Update <i class="bi bi-check2-square"></i></button>
            </div>
        </form>
    </div>
</section>
<?php
include 'includes/footer.php'
?>