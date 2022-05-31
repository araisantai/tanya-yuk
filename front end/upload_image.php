<?php 
//blum selesai
if(isset($_POST['submit'])) {
        if ($_FILES['file']['error'] <= 0) {
                $filename  = $_FILES['file']['name'];
                $filetype  = $_FILES['file']['type'];
                $uploaddir = 'upload/';
                $file_ext  = strrchr($filename, '.');
                $imageinfo = getimagesize($_FILES['file']['tmp_name']);
                $whitelist = array(".jpg",".jpeg",".gif",".png"); 

                if (!(in_array($file_ext, $whitelist))) {
                        die('Error 000');
                }

                if(strpos($filetype,'image') === false) {
                        die('Error 001');
                }

                if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg'&& $imageinfo['mime'] != 'image/png') {
                        die('Error 002');
                }

                if(substr_count($filetype, '/')>1){
                        die('Error 003');
                }

                $uploadfile = $uploaddir . md5(basename($_FILES['file']['name'])).$file_ext;

                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                        echo "<img src=\"".$uploadfile."\"><br />";
                } else {
                        die('Error 4');
                }
        }
}
?>