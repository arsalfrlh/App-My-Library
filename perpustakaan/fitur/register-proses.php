<?php
include '../koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$nama_lengkap = $_POST['nama'];
$alamat = $_POST['alamat'];
$level =$_POST['level'];

$query = "CALL tambahuser ('','$username', '$password', '$email', '$nama_lengkap', '$alamat', '$level')";
mysqli_query($connect,$query);
echo '<script>
alert("Menambahkan Akun Berhasil");
window.location="anggota.php";
</script>';
mysqli_close();
?>