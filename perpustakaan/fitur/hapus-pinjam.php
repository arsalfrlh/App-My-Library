<?php
include '../koneksi.php';
if(isset($_GET['id']) && isset($_GET['action'])){
    $id = $_GET['id'];
    $action = $_GET['action'];
    $tanggal = date('y-m-d');
    if($action == 'ambil'){
        $query = "UPDATE peminjaman SET tglpengembalian = '$tanggal', statuspeminjaman = 'dikembalikan' WHERE peminjamanid='$id'";
        mysqli_query($connect,$query);
        echo '<script>alert("Buku Berhasil di Ambil");window.location="laporan.php";</script>';
        exit();
    }elseif($action == 'hapus'){
        $query = "CALL hapuspinjam('$id')";
        mysqli_query($connect,$query);
        echo '<script>alert("Peminjaman di Hapus");window.location="laporan.php";</script>';
        exit();
    }
}
header("Location: laporan.php");
exit();
?>