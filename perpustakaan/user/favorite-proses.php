<?php
include '../koneksi.php';
$id_user = $_POST['id_user'];
$id_buku = $_POST['id_buku'];
$query = "CALL tambahfavorite ('','$id_user','$id_buku')";
mysqli_query($connect,$query);
echo '<script>
alert("Berhasil Ditambahkan Ke Favorite");
window.location="favorite.php";
</script>';
?>