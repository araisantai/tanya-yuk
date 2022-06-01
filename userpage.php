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

?>
<!--User Profile-->
<section id="profile">
    <div class="card">
        <div class="profile d-flex justify-content-center">
            <img src="frontend/img/spo6.png" alt="mdo" class="profilepict">
        </div>
        <div class="isi">
            <p><?php echo $result['username']; ?></p>
            <p><?php echo $result['nama_akun']; ?></p>
        </div>
        <div class="text-center">
            <div class="btn-edit">Edit <i class="bi bi-pencil-square"></i></div>
        </div>
        <div class="text-center">
            <div class="btn-edit"><a href="login and register/logout.php">Logout</a></div>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php'
?>
