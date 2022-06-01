<?php
function upload(){
        $target_dir = "uploads/";
        $filename = $_FILES["file"]["name"];
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["file"]["tmp_name"]);
                if($check !== false) {
                        $uploadOk = 1;
                } else {
                        $uploadOk = 0; 
                }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                        $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["file"]["size"] > 500000) {
                        $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                        $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                        $ck = 0;
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        $ck = 1;
                } else {
                        $ck = 0;
                }
        }
        return $filename;
}
?>