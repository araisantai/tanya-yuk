<?php 
include 'header.php';
include '../function/config.php';
if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    // tambahin id/uid di database
    // untuk pengenal user
    // access cookie
    $id = $_COOKIE['id'];
    $user = $id;
    $query = "INSERT INTO Pertanyaan(pertanyaan, username) VALUES('$message', '$user')";
}
?>  
<div class="upquest">
    <div class="container">
        <div class="row">
            <!-- form here -->
            <form action="uploadquest.php" method="post" role="form" class="php-email-form">
                <div class="row">
                    <div class="form-group col-lg-8 mb-2">
                        <label for="name">Pertanyaan</label>
                        <textarea class="form-control" name="message" rows="10" required></textarea>
                    </div>
                    <div class="form-group col-lg-4">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Gambar</label>
                            <div class="img-label">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for=" name exampleFormControlSelect1">Kategori</label>
                    <select class="form-select" aria-label="Default select example" required>
                        <option selected>Pilih Kategori dari Pertanyaanmu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Pertanyaanmu telah terupload</div>
                </div>
                <div class="text-center"><button type="submit">Kirim Pertanyaan</button></div>
            </form>
            <!-- end form -->
        </div>
    </div>
</div>

<? 
include 'footer.php'
?>