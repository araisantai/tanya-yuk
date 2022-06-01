<?php 
include 'function/config.php';
include 'uploadimg.php';
if(isset($_POST['submit'])) {
        // var_dump($_POST);
        // var_dump($_FILES);
        // die;
        $message = $_POST['message'];
        $user = $_POST['username'];
        if ($_FILES["file"]["error"] != 4) {
            $uploadfile = upload();
        } else {
            $uploadfile = NULL;
        }
        $query = "INSERT INTO pertanyaan(pertanyaan, username, foto_pertanyaan) VALUES('$message', '$user', '$uploadfile')";
        $result = pg_query($db, $query);
        if( $result==TRUE ) {
		header('Location: index.php?status=berhasil');
	} else {
		header('Location: uploadquest.php?status=gagal');
	}
}
?>