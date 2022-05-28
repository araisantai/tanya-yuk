<?php
include '.../function/config.php';

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
    if(time()-$_SESSION["login_time_stamp"] >6000)  
    {
        session_unset();
        session_destroy();       
        header('Location:login_page.php');
    }
    else 
    {
        header('Location:../front end/index.php');
    }
}
else
{
    header('Location:login_page.php');
}