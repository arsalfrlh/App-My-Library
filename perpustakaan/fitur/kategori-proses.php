<?php
include '../koneksi.php';
$kategori = $_POST['kategori'];

$query = "INSERT INTO kategoribuku (kategoriid,namakategori) VALUES ('','$kategori')";
mysqli_query($connect,$query);
echo '<script>
alert("Menambahkan Kategori Berhasil");
window.location="buku.php";
</script>';
mysqli_close();
?>