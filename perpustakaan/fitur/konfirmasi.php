<?php
include '../koneksi.php';

if (isset($_GET['kode']) && isset($_GET['action'])) {
    $kode_pinjam = $_GET['kode'];
    $action = $_GET['action'];

    if ($action == 'setuju') {
        $query = "UPDATE peminjaman SET statuspeminjaman = 'disetujui' WHERE kodepinjam = '$kode_pinjam'";
        mysqli_query($connect, $query);
        echo '<script>alert("Peminjaman Disetujui");window.location="laporan.php";</script>';
        exit();
    } elseif ($action == 'tolak') {
        $query = "UPDATE peminjaman SET statuspeminjaman = 'ditolak' WHERE kodepinjam = '$kode_pinjam'";
        mysqli_query($connect, $query);
        echo '<script>alert("Peminjaman Ditolak");window.location="laporan.php";</script>';
        exit();
    }
}

// Jika tidak ada parameter yang valid, redirect ke halaman laporan
header("Location: laporan.php");
exit();
?>