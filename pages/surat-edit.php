<?php
include "../koneksi.php";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div class="About">
    <h2> Arsip Surat >> Update</h2>
        <h5 style="text-align: left;">Update surat yang telah diarsipkan pada form ini. <br>
            Catatan:
            <ul>
                <li>Gunakan file berformat PDF</li>
            </ul>
        </h5>
</div>
<div id="content">
<?php
$id    = mysqli_real_escape_string($db,$_GET['id']);
        $query = mysqli_query($db,"SELECT * FROM tb_arsip WHERE id='$id' ");
        $data  = mysqli_fetch_array($query);
?>
    <form action="../proses/surat-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">Nomor Surat</td>
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <td class="isian-formulir"><input type="text" name="nomor_surat" value="<?php echo $data['nomor_surat']?>"
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Kategori</td>
                <td><select class="isian-formulir" name="kategori" required="">
                        <option value="<?php echo $data['kategori']?>"><?php echo $data['kategori']?></option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Nota Dinas">Nota Dinas</option>
                        <option value="Pemberitahuan">Pemberitahuan</option>
                    </select></td>
            </tr>
            <tr>
                <td class="label-formulir">Judul</td>
                <td class="isian-formulir"><input type="text" name="judul" value="<?php echo $data['judul']?>" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">File Surat (PDF)</td>
                <td class="isian-formulir"><input type="file" class="form-control"  name="file" value="<?php echo $data['file']?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><a href="../index.php?p=beranda" class="tombol"> << Kembali</a></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="simpan" class="tombol"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
