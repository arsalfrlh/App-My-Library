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

$cek_pinjam = "SELECT COUNT(*) as total_pinjam FROM peminjaman WHERE userid = '$id_user' AND statuspeminjaman = 'disetujui' ";
$qry = mysqli_query($connect, $cek_pinjam);
$sql = mysqli_fetch_assoc($qry);
$total_pinjam = $sql['total_pinjam'];

if($stok > $jumlah){
    echo '<script>alert("Stok Buku tidak Tersedia");window.location="buku.php";</script>';
    die();
}elseif($total_pinjam >= 2){
        echo '<script>alert("Anda sudah mencapai batas maksimal peminjaman (2 buku)");window.history.back();</script>';
        die();
}else{
$query = "CALL pinjambuku ('','$new_kode','$id_user','$id_buku','$tgl_pinjam','$tgl_kembali','$stok','$status')";
mysqli_query($connect,$query);
echo '<script>alert("Peminjaman Berhasil");window.location="pinjam.php";</script>';
mysqli_close();
}
?>
