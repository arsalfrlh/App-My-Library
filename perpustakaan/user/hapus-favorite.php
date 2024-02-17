<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = "CALL hapusfavorite('$id')";
mysqli_query($connect,$query);
echo '<script>
alert("Berhasil di Hapus dari Favorite");
window.location="favorite.php";
</script>';
?>