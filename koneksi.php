<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "unudphone";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak terhubung ke database");
}
?>