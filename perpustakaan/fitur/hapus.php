<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = "CALL hapusbuku('$id')";
$sql = mysqli_query($connect,$query);
if($sql){
    echo '<script>alert("Data Berhasil di Hapus"); window.location="buku.php";</script>';
}else{
    echo '<script>alert("Data Gagal di Hapus");window.location="buku.php";</script>';
}
?>