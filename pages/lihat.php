<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Arsip Surat</title>
    <style type="text/css">
        body {
            font-family: verdana;
            font-size: 12px;
        }
        a {
            text-decoration: none;
            color: #3050F3;
        }
        a:hover {
            color: #000F5E;
        } 
    </style>
</head>
<body>

<div id="content">
    <?php
        $id    = mysqli_real_escape_string($db,$_GET['id']);
        $query = mysqli_query($db,"SELECT * FROM tb_arsip WHERE id='$id' ");
        $data  = mysqli_fetch_array($query);
    ?>
    <div class="About">
        <h2> Arsip Surat >> Unggah</h2>
            <p>Nomor: <?php echo $data['nomor_surat']; ?></p>
            <p>Kategori: <?php echo $data['kategori']; ?></p>
            <p>Judul: <?php echo $data['judul']; ?></p>
            <p>Waktu Unggah: <?php echo $data['waktu']; ?></p>
    </div>
    <br>
    <center><embed src="file/<?php echo $data['file'];?>" type="application/pdf" width="1100" height="800" ></center>
    <br><br>
    <a href="index.php?p=beranda" class="tombol"> << Kembali</a>
    <a href="pages/download.php?filename=<?=$data['file'] ?>" class="tombol">Unduh</a>
    <a href="pages/surat-edit.php?id=<?php echo $data['id'] ?>" class="tombol">Edit/ganti file</a></div>
</div>
</body>
</html>