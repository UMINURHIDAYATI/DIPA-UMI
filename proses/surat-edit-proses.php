<?php 
 
include '../koneksi.php';
$id = $_POST['id'];
$nomor_surat = $_POST['nomor_surat'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$waktu = date("Y-m-d h:i:sa");
$file = trim($_FILES['file']['name']);
?>

<?php
include '../koneksi.php';

$tipe_file = $_FILES['file']['type']; //mendapatkan mime type
if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
{
    $id = $_POST['id'];
    $nomor_surat = $_POST['nomor_surat'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $waktu = date("Y-m-d h:i:sa");
    $file = trim($_FILES['file']['name']);

    //mengganti nama pdf
    $nama_baru = "file_".$id.".pdf"; //hasil contoh: file_1.pdf
    $file_temp = $_FILES['file']['tmp_name']; //data temp yang di upload
    $folder    = "../file"; //folder tujuan

    move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload

    mysqli_query($db, "UPDATE tb_arsip SET nomor_surat='$nomor_surat', kategori='$kategori', judul='$judul', waktu='$waktu', file='$nama_baru' WHERE id='$id'");

    header('location:../index.php?p=beranda');

} else
{
    echo "Gagal Update File Bukan PDF! <a href='beranda.php'> Kembali </a>";
}

?>