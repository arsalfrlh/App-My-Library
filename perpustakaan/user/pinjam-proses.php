<?php
include '../koneksi.php';
$kode = mysqli_query($connect,"SELECT MAX(SUBSTRING(kodepinjam,3)) as max_kode FROM peminjaman");
$sql = mysqli_fetch_array($kode);
$max_kode = $sql['max_kode'];
if($max_kode == null){
    $new_kode = 'PM001';
}else{
    $new_kode = 'PM' . str_pad($max_kode + 1,3,'0',STR_PAD_LEFT);
}

$id_user = $_POST['id_user'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$stok = $_POST['stok'];
$status = $_POST['status'];
$jumlah = $_POST['jumlah'];
if($stok > $jumlah){
    echo '<script>alert("Stok Buku tidak Tersedia");window.location="buku.php";</script>';
    die();
}else{
$query = "CALL pinjambuku ('','$new_kode','$id_user','$id_buku','$tgl_pinjam','$tgl_kembali','$stok','$status')";
mysqli_query($connect,$query);
echo '<script>alert("Peminjaman Berhasil");window.location="pinjam.php";</script>';
mysqli_close();
}
?>