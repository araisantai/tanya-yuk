<?php 
include 'function/config.php';
include 'uploadimg.php';
if(isset($_POST['submit'])) {
    // $ck = var_dump($_POST);
    // $ck = var_dump($_FILES);
    // die($ck);
    $comment = $_POST['comment'];
    $id_tanya = $_POST['id_pertanyaan'];
    $user = $_POST['username'];
    if ($_FILES["file"]["error"] != 4) {
        $uploadfile = upload();
    } else {
        $uploadfile = NULL;
    }
    $query = "INSERT INTO j_k(komentar, id_pertanyaan, username, foto_komentar) VALUES('$comment', '$id_tanya', '$user','$uploadfile')";
    $result = pg_query($db, $query);
    if( $result==TRUE ) {
        header('Location: uploadans.php?pertanyaan='. $id_tanya . '&status=berhasil');
	} else {
		header('Location: uploadans.php?pertanyaan='. $id_tanya . '&status=gagal');
	}
}
?>