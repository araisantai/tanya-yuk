<?php 
include 'includes/header.php';
include 'function/config.php';
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: index.php");
}
$id_tanya = $_GET["pertanyaan"];
$query = pg_query("SELECT * FROM pertanyaan WHERE id_pertanyaan='$id_tanya'");
$content = pg_fetch_array($query);
?>
<body>
    <br><br><br><br><br><br>
    <form action="answer.php" method="post" enctype="multipart/form-data">
        <h4>Pertanyaan</h4>
        <h5><?= $content["pertanyaan"]; ?></h5>
        <input type="hidden" name="id_pertanyaan" value="<?= $id_tanya; ?>">
        <h4>Tulis Komentar</h4>
        <textarea  name="comment" required></textarea>
        <input class="form-control" type="file" name="file" id="file">
        <br>
        <button type="submit" name="submit">Kirim Komentar</button>
    </form>
</body>