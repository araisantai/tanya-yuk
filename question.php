<?php 
include 'function/config.php';
include 'uploadimg.php';
if(isset($_POST['submit'])) {
        // var_dump($_POST);
        // var_dump($_FILES);
        // die;
        $message = $_POST['message'];
        $user = $_POST['username'];
        $uploadfile = upload();
        $query = "INSERT INTO pertanyaan(pertanyaan, username, foto_pertanyaan) VALUES('$message', '$user', '$uploadfile')";
        $result = pg_query($db, $query);
        if( $result==TRUE ) {
		header('Location: index.php');
	} else {
		header('Location: uploadquest.php?upload=gagal');
	}
}
?>