<?php 
include 'includes/header.php';
include 'function/config.php';
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: login and register/login_page.php");
}

$user = $_SESSION["username"];
if (isset($_GET['status']) == 'gagal') {
    echo    "<script>
                window.location.href='uploadquest.php';
                alert('data anda gagal dimasukkan');
            </script>";
}
?> 
<section class="section-bg" style="height: 89vh;"> 
    <div class="upquest" style="margin-top: 75px; ">
        <h1 class="text-center" style="font-family: 'Lobster'; margin-bottom: 15px;">Upload Pertanyaan</h1>            
        <div class="container">
            <div class="row">
                <!-- form here -->
                <form action="question.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-lg-8 mb-2">
                            <label for="name">Pertanyaan</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="form-group col-lg-4">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Gambar</label>
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
                    <div class="text-center"><button type="submit" name="submit">Kirim Pertanyaan</button></div>
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php'
?>