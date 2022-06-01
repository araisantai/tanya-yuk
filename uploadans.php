<?php 
include 'includes/header.php';
include 'function/config.php';
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: login and register/login_page.php");
}
$id_tanya = $_GET["pertanyaan"];
$tanya = pg_query("SELECT * FROM pertanyaan WHERE id_pertanyaan='$id_tanya'");
$content = pg_fetch_array($tanya);
$komentar = pg_query("SELECT * FROM j_k WHERE id_pertanyaan='$id_tanya'");
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

    <section id="Question" class="section-bg">
        <div class="row gx-5" style="margin: auto;">
            <div class="col">
                <h1>Komentar</h1>            
                <?php while($result = pg_fetch_array($komentar)) :?>
                <div class="p-5">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member-info">
                        <h4><?php //$result['username']; ?></h4>
                        <span><?= $result['komentar']; ?></span>
                        <!-- <img src="" alt=""> -->
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
</body>