<?php
$db = pg_connect('host=localhost dbname=tanya_jawab user=postgres password=postgres');
if(!$db) {
    die("Gagal terhubung ke database: ". pg_connect_error());
}
?>