<?php 
	session_start();
	if($_SESSION['level']=="user"){
		header("location:user/index.php");
  }elseif($_SESSION['level'] == ""){
    header("location:login.php");
  }
  include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Dashboard Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">


    

    <!-- Bootstrap core CSS -->
    <script src="assets/js/Chart.bundle.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">



    <style>
      body{
        background-image: url('');
        background-repeat: no-repeat;
        background-size: cover;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <form action="index.php">
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">My Liblary</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="btn btn-danger" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>
</form>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fitur/buku.php">
              <span data-feather="calendar"></span>
              Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fitur/ulasan.php">
              <span data-feather="feather"></span>
              Ulasan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fitur/anggota.php">
              <span data-feather="users"></span>
              Anggota
            </a>
          </li>
          <?php
            $id = $_SESSION['userid'];
            $query = mysqli_query($connect,"SELECT * FROM user WHERE userid='$id'");
            while($admin = mysqli_fetch_array($query)){
            ?>
            <?php
            if($admin['level'] != 'petugas'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="fitur/register-admin.php?id=<?php echo $admin['userid']; ?>">
              <span data-feather="user"></span>
              Tambahkan Admin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fitur/register.php?id=<?php echo $admin['userid']; ?>">
              <span data-feather="user"></span>
              Tambahkan Petugas
            </a>
          </li>
          <?php
            }
            ?>
        <?php    
        }
        ?>
          <li class="nav-item">
            <a class="nav-link" href="fitur/laporan.php">
              <span data-feather="file-text"></span>
              Generate laporan
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          
          </div>
          <a href="profile.php"><img src="assets/img/profile.png" style="width: 50px; border-radius: 50%;"></a>
        </div>
      </div>



      <h2 align="center">Perpustakaan Digital</h2>
      <br>

<div class="row">
      <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
              <div class="card-body">
              <?php
              echo mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user"));
              ?>  
              Anggota</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="fitur/anggota.php">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
              <div class="card-body">
              <?php
              echo mysqli_num_rows(mysqli_query($connect, "SELECT * FROM ulasanbuku"));
              ?>
              Ulasan</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="fitur/ulasan.php">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
              <div class="card-body">
              <?php
              echo mysqli_num_rows(mysqli_query($connect, "SELECT * FROM buku"));
              ?>  
              Buku</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="fitur/buku.php">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
              <div class="card-body">
              <?php
              echo mysqli_num_rows(mysqli_query($connect, "SELECT * FROM peminjaman"));
              ?>  
              Laporan</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="fitur/laporan.php">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
</div><br>
                      
<h5>Daftar Kategori Buku Terbanyak</h5>
<div style="width: 500px;">
 <canvas id="myChartgfx"></canvas>
  <script>
 var ctx = document.getElementById("myChartgfx").getContext('2d');
 var myChartgfx = new Chart(ctx, {
 type: 'bar',
 data: {
 labels: ["Novel", "Fiksi", "Komik", "Pendidikan"],
 datasets: [{
 label: '',
 data: [
 <?php 
 $novel = mysqli_query($connect,"SELECT * FROM buku WHERE kategoriid='6'");
 echo mysqli_num_rows($novel);
 ?>, 
 <?php 
 $fiksi = mysqli_query($connect,"SELECT * FROM buku WHERE kategoriid='3'");
 echo mysqli_num_rows($fiksi);
 ?>, 
 <?php 
 $komik = mysqli_query($connect,"SELECT * FROM buku WHERE kategoriid='5'");
 echo mysqli_num_rows($komik);
 ?>, 
 <?php 
 $pendidikan = mysqli_query($connect,"SELECT * FROM buku WHERE kategoriid='13'");
 echo mysqli_num_rows($pendidikan);
 ?>
 ],
 backgroundColor: [
 'rgba(255, 99, 132, 0.2)',
 'rgba(54, 162, 235, 0.2)',
 'rgba(255, 206, 86, 0.2)',
 'rgba(75, 192, 192, 0.2)'
 ],
 borderColor: [
 'rgba(255,99,132,1)',
 'rgba(54, 162, 235, 1)',
 'rgba(255, 206, 86, 1)',
 'rgba(75, 192, 192, 1)'
 ],
 borderWidth: 1
 }]
 },
 options: {
 scales: {
 yAxes: [{
 ticks: {
 beginAtZero:true
 }
 }]
 }
 }
 });
 </script>
 </div>
 
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="assets/js/dashboard.js"></script>
  </body>
</html>