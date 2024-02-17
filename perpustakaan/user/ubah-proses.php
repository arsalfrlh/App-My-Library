<?php
include '../koneksi.php';
$id_ulasan = $_POST['id_ulasan'];
$id_user = $_POST['id_user'];
$id_buku = $_POST['id_buku'];
$ulasan = $_POST['ulasan'];
$rating = $_POST['rating'];
$query = "CALL ubahulasan('$id_ulasan','$id_user','$id_buku','$ulasan','$rating')";
mysqli_query($connect,$query);
echo '<script>
alert("Data Berhasil di Ganti");
window.location="ulasan.php";
</script>';
?>