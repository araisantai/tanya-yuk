<?php
include '../function/config.php';

//cek apakah tombol udah di klik
if(isset($_POST['masuk']))
{
    extract($_POST);
    $username=$_POST['username'];
    $pass=md5($_POST['password']);
    $pgsql=pg_query("SELECT * FROM pengguna WHERE username='$username'");
    $result=pg_fetch_array($pgsql);
    
    session_start();
    $_SESSION['loggedin']=false;

    //apakah berhasil
    $verif=password_verify($pass, $result['password']);
    if(($result['username']==$username)&&($verif))
    {
        $_SESSION['loggedin']=true;
        $_SESSION["login_time_stamp"] = time();
        $_SESSION['username'] = $nama;
        header('Location:cek_login.php');
    }
    else
    {
        echo "<script>
                window.location.href='login_page.php';
                alert('Username atau Password Salah, Silahkan Masuk kembali atau Daftar');
            </script>";
    }
}
else 
{
    echo "<script>
                window.location.href='login_page.php';
                alert('Akses gagal...');
            </script>";
}
?>