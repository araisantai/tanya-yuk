<?php 
include 'includes/header.php';
include 'function/config.php';
$tanya = pg_query("SELECT * FROM pertanyaan ORDER BY id_pertanyaan DESC");
$komen = pg_query("SELECT * FROM j_k");

if (isset($_GET['search'])) {
    $search = $_GET["search"];
    $tanya = pg_query("SELECT * FROM pertanyaan 
    WHERE pertanyaan LIKE '%$search%' 
    OR username LIKE '%$search%'
    ");
}

?>  
<!--Kolom Pertanyaan-->
<section id="Question" class="section-bg">
    <div class="row gx-5" style="margin: auto;">
        <div class="col">
            <h1>Forum Pertanyaan</h1>            
            <?php while($result = pg_fetch_array($tanya)) :?>
            <a href="uploadans.php?pertanyaan=<?= $result['id_pertanyaan']; ?>">
            <div class="p-5">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="member-info">
                    <h4><?= $result['pertanyaan']; ?></h4>
                    <span><?= $result['username']; ?></span>
                    <p>Jawaban (Kalo Ada)</p>
                    </div>
                </div>
            </div>
            </a>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php'
?>