<?php
include '../koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahunterbit = $_POST['tahun'];
$stok = $_POST['stok'];

if(!empty($_FILES['gambar']['name'])){
$namafoto = $_FILES['gambar']['name'];
$ukuranfoto = $_FILES['gambar']['size'];
$tipefoto = $_FILES['gambar']['type'];
$tmp = $_FILES['gambar']['tmp_name'];

$acc = ['image/png','image/jpeg','image/jpg'];
if (!in_array($tipefoto,$acc)){
    echo '<script>alert("Hanya file PNG JPG dan JPEG yang diperbolehkan"); window.history.back(); </script>';
    die();
}
$size = 2 * 1024 *1024;
if($ukuranfoto > $size){
    echo '<script>alert("Maaf ukuran file anda terlalu besar"); window.history.back(); </script>';
    die();
}

$lokasifoto = '../assets/img/' . $namafoto;
move_uploaded_file($tmp, $lokasifoto);
$query = "CALL editbuku('$id','$judul','$kategori','$penulis','$penerbit','$tahunterbit','$stok','$lokasifoto')";
}else{
$query = "CALL editbuku1('$id','$judul','$kategori','$penulis','$penerbit','$tahunterbit','$stok')";
}
$sql = mysqli_query($connect,$query);
if($sql){
    echo '<script>alert("Data Berhasil di Ganti"); window.location="buku.php"; </script>';
}else{
    echo '<script>alert("Data Gagal di Ganti"); window.history.back(); </script>';
}
?>