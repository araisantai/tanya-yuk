<?php
include '../function/config.php';

session_start();

if(isset($_POST['masuk']))
{
    extract($_POST);
    $username=$_POST['username'];
    $pass=($_POST['password']);
    $pgsql=pg_query("SELECT * FROM pengguna WHERE username='$username'");
    $result=pg_fetch_array($pgsql);
    
    session_start();

    //apakah berhasil
    if(($result['username']==$username)&&($result['password']==$pass))
    {
        $_SESSION['username']=$result['username'];
        header('Location:../front end/index.php');
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