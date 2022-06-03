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
                alert('jawaban/komentar anda berhasil dimasukkan');
            </script>";
} else if (isset($_GET['status']) == 'gagal') {
    echo    "<script>
                window.location.href='uploadans.php?pertanyaan=".$id_tanya."';
                alert('data anda gagal dimasukkan');
            </script>";
}
?>

    <section class="section-bg">
        <div class="upans">
            <div class="container">
                <div class="row">
                    <h4>Pertanyaan</h4>
                    <div class="form-group col-lg-8 mb-2">
                        <textarea class="form-control" name="question" readonly><?= $content["pertanyaan"]; ?></textarea>
                    </div>
                    <div class="form-group col-lg-4">
                        <div class="mb-3">
                            <div class="img-label d-flex justify-content-center">
                                <?php
                                    $photo = $content['foto_pertanyaan']; 
                                    if ($photo != NULL) {
                                        echo "<img id='myImg' src='uploads/".$photo."' alt='' class='foto'>";
                                    }
                                ?>
                                <div id="myModal" class="modal">
                                    <span class="close" style="position: absolute; top: 35px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; transition: 0.3s; z-index: 200;"><i class="bi bi-x"></i></span>
                                    <img class="modal-content" id="img01" style="max-width: 625px; height:auto;">
                                </div>
                                <script>
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    var img = document.getElementById("myImg");
                                    var modalImg = document.getElementById("img01");
                                    img.onclick = function(){
                                        document.getElementById("myModal").style.display = "block";
                                        document.getElementById("img01").src = this.src;
                                    }

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() { 
                                    modal.style.display = "none";
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Question" class="section-bg" style = "margin-top: 0px;">
        <div class="row gx-5" style="margin: auto;">
            <div class="col">
                <h1 style="font-family: 'Lobster';">Komentar</h1> 
                <div class="upans" style="margin: 20px 0;">
                <div class="row">
                    <!-- form here -->
                    <form action="answer.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                        <input type="hidden" name="id_pertanyaan" value="<?= $id_tanya; ?>">
                        <div class="row">
                            <h4>Tambah Komentar</h4>
                            <div class="form-group col-lg-8 mb-2">
                                <label for="name">Tulis Komentar</label>
                                <textarea class="form-control" name="comment" rows="10" required></textarea>
                            </div>
                            <div class="form-group col-lg-4">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Gambar untuk Komentarmu</label>
                                    <div class="img-label">
                                        <input class="form-control" type="file" name="file" id="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="username" value="<?= $user; ?>">
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Pertanyaanmu telah terupload</div>
                        </div>
                        <div class="text-center"><button type="submit" name="submit">Kirim Komentar</button></div>
                    </form>
                    <!-- end form -->
                </div>  
                </div>         
                <?php while($result = pg_fetch_array($komentar)) : ?>
                <div class="p-5">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member-info">
                        <h4><?=  $result['komentar']; ?></h4>
                        <span><?= $result['username']; ?></span>
                        <?php
                            $foto = $result['foto_komentar']; 
                            if ($foto != NULL) {
                                echo "<img id='myImgk' src='uploads/".$foto."' alt=''>";
                            }
                        ?>
                        <div id="myModal" class="modal">
                            <span class="close" style="position: absolute; top: 35px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; transition: 0.3s; z-index: 200;"><i class="bi bi-x"></i></span>
                            <img class="modal-content" id="img01" style="max-width: 625px; height:auto;">
                        </div>
                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            var img = document.getElementById("myImgk");
                            var modalImg = document.getElementById("img01");
                            img.onclick = function(){
                                document.getElementById("myModal").style.display = "block";
                                document.getElementById("img01").src = this.src;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() { 
                            modal.style.display = "none";
                            }
                        </script>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php
include 'includes/footer.php'
?>