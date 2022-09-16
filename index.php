<?php
session_start();

include 'koneksi.php';

$tgl = date('Y-m-d');

// if (isset($_SESSION['sesi']) && !empty($_SESSION['sesi'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Arsip Surat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div id="container">

        <div id="sidebar">
            <a href="index.php?p=beranda"><center>Menu</center></a>
            <p class="label-navigasi"><center>--------</center></p>
            <ul>
                <li><a href="index.php?p=beranda"><i class="fa fa-star"></i>  Arsip</a></li>
                <li><a href="index.php?p=about"><i class="fa fa-warning"></i>  About</a></li>
            </ul>

        </div>
        <div id="content-container">
            <?php
            $pages_dir = 'pages';
            if (!empty($_GET['p'])) {
                $pages = scandir($pages_dir, 0);
                unset($pages[0], $pages[1]);

                $p = $_GET['p'];
                if (in_array($p . '.php', $pages)) {
                    include $pages_dir . '/' . $p . '.php';
                } else {
                    echo 'Halaman Tidak Ditemukan';
                }
            } else {
                include $pages_dir . '/beranda.php';
            }
            ?>
        </div>
    </div>
</body>

</html>