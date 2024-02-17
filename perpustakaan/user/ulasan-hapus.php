<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = "CALL hapusulasan('$id')";
mysqli_query($connect,$query);
echo '<script>
alert("Ulasan Berhasil di Hapus");
window.location="ulasan.php";
</script>';
?>