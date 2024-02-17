<?php
include '../koneksi.php';
$id_pinjam = $_POST['id_pinjam'];
$id_user = $_POST['id_user'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];
$query = "CALL pengembalianbuku('$id_pinjam','$id_user','$id_buku','$tgl_pinjam','$tgl_kembali','$jumlah','$status')";
mysqli_query($connect,$query);
echo '<script>
alert("Pengembalian Buku Berhasil");
window.location="pinjam.php";
</script>';
?>