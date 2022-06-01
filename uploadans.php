<?php 
include 'includes/header.php';
include 'function/config.php';
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: login and register/login_page.php");
}
$user = $_SESSION["username"];
$id_tanya = $_GET["pertanyaan"];
$tanya = pg_query("SELECT * FROM pertanyaan WHERE id_pertanyaan='$id_tanya'");
$content = pg_fetch_array($tanya);
$komentar = pg_query("SELECT * FROM j_k WHERE id_pertanyaan='$id_tanya'");

if (isset($_GET['status']) == 'berhasil') {
    echo    "<script>
                window.location.href='uploadans.php?pertanyaan=".$id_tanya."';
                alert('data anda berhasil dimasukkan');
            </script>";
} else if (isset($_GET['status']) == 'gagal') {
    echo    "<script>
                window.location.href='uploadans.php?pertanyaan=".$id_tanya."';
                alert('data anda gagal dimasukkan');
            </script>";
}
?>
<body>
    <br><br><br><br><br><br>
        <h4>Pertanyaan</h4>
        <h5><?= $content["pertanyaan"]; ?></h5>
        <?php
            $photo = $content['foto_pertanyaan']; 
            if ($photo != NULL) {
                echo "<img src='uploads/".$photo."' alt=''>";
            }
        ?>
    <form action="answer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pertanyaan" value="<?= $id_tanya; ?>">
        <h4>Tulis Komentar</h4>
        <input type="hidden" name="username" value="<?= $user; ?>">
        <textarea  name="comment" required></textarea>
        <input class="form-control" type="file" name="file" id="file">
        <br>
        <button type="submit" name="submit">Kirim Komentar</button>
    </form>

    <section id="Question" class="section-bg">
        <div class="row gx-5" style="margin: auto;">
            <div class="col">
                <h1>Komentar</h1>            
                <?php while($result = pg_fetch_array($komentar)) : ?>
                <div class="p-5">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member-info">
                        <h4><?=  $result['komentar']; ?></h4>
                        <span><?= $result['username']; ?></span>
                        <?php
                        $foto = $result['foto_komentar']; 
                        if ($foto != NULL) {
                            echo "<img src='uploads/".$foto."' alt=''>";
                        }
                        ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
</body>