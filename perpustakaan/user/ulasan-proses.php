<?php
include '../koneksi.php';
$id_user = $_POST['id_user'];
$id_buku = $_POST['id_buku'];
$ulasan = $_POST['ulasan'];
$rating = $_POST['rating'];
$query = "CALL ulasan ('','$id_user','$id_buku','$ulasan','$rating')";
mysqli_query($connect,$query);
echo '<script>
alert("Menambahkan Ulasan Berhasil");
window.location="ulasan.php";
</script>';
mysqli_close();
?>