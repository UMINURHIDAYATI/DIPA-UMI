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

    $sql = "INSERT INTO tb_arsip (id, nomor_surat, kategori, judul, waktu) VALUES ('$id','$nomor_surat','$kategori','$judul','$waktu')";
    mysqli_query($db,$sql); //simpan data judul dahulu untuk mendapatkan id

    //dapatkan id terkahir
    $query = mysqli_query($db,"SELECT id FROM tb_arsip ORDER BY id DESC LIMIT 1");
    $data  = mysqli_fetch_array($query);

    //mengganti nama pdf
    $nama_baru = "file_".$data['id'].".pdf"; //hasil contoh: file_1.pdf
    $file_temp = $_FILES['file']['tmp_name']; //data temp yang di upload
    $folder    = "../file"; //folder tujuan

    move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
    //update nama file di database
    mysqli_query($db,"UPDATE tb_arsip SET file='$nama_baru' WHERE id='$data[id]' ");

    header('location:../index.php?p=beranda');

} else
{
    echo "Gagal Upload File Bukan PDF! <a href='beranda.php'> Kembali </a>";
}

?>