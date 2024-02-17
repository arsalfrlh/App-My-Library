<?php
require('cetak/fpdf.php');
include '../koneksi.php';

$pdf=new FPDF('P', 'mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Data Peminjaman',0,0,'C');

$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(35,7,'NAMA PEMINJAM',1,0,'C');
$pdf->Cell(40,7,'NAMA BUKU',1,0,'C');
$pdf->Cell(35,7,'TANGGAL PINJAM',1,0,'C');
$pdf->Cell(35,7,'TANGGAL KEMBALI',1,0,'C');
$pdf->Cell(30,7,'STATUS',1,0,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no = 1;
$query = mysqli_query($connect,"SELECT * FROM peminjaman LEFT JOIN user ON user.userid = peminjaman.userid LEFT JOIN buku ON buku.bukuid = peminjaman.bukuid");
while($laporan = mysqli_fetch_array($query)){
    $pdf->Cell(10,6, $no++,1,0,'C');
    $pdf->Cell(35,6, $laporan['namalengkap'],1,0);
    $pdf->Cell(40,6, $laporan['judul'],1,0);
    $pdf->Cell(35,6, $laporan['tglpeminjaman'],1,0);
    $pdf->Cell(35,6, $laporan['tglpengembalian'],1,0);
    $pdf->Cell(30,6, $laporan['statuspeminjaman'],1,1);
}
$pdf->Output();
?>