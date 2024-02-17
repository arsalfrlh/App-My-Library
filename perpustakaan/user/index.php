<?php 
	session_start();
	if($_SESSION['level']==""){
		header("location:../login.php");
  }elseif($_SESSION['level'] == "admin"){
    header("location:../index.php");
  }elseif($_SESSION['level'] == "petugas"){
    header("location:../index.php");
  }
  $id_user = $_SESSION['userid'];
  include "../koneksi.php";
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
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">



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
    <link href="../assets/css/dashboard.css" rel="stylesheet">
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
      <a class="btn btn-danger" href="../logout.php">Sign out</a>
    </li>
  </ul>
</nav>
</form>

<?php
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo "<b>Hasil Pencarian :".$cari."</b>";
}
?>

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
            <a class="nav-link" href="buku.php">
              <span data-feather="calendar"></span>
              Buku
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pinjam.php">
              <span data-feather="layers"></span>
              Peminjaman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="favorite.php">
              <span data-feather="plus-circle"></span>
              Koleksi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ulasan.php">
              <span data-feather="feather"></span>
              Ulasan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="anggota.php">
              <span data-feather="users"></span>
              Anggota
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
          <a href="profile.php"><img src="../assets/img/profile.png" style="width: 50px; border-radius: 50%;"></a>
        </div>
      </div>



      <h2 align="center">Perpustakaan Digital</h2>
      <br><br>
<div class="row">
  <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
          <div class="card-body">
          <?php
          echo mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user"));
          ?>  
          Anggota</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="anggota.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="card bg-warning text-white mb-4">
          <div class="card-body">
          <?php
          echo mysqli_num_rows(mysqli_query($connect, "SELECT * FROM koleksipribadi LEFT JOIN user ON user.userid = koleksipribadi.userid WHERE koleksipribadi.userid='$id_user'"));
          ?>  
          Koleksi</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="favorite.php">View Details</a>
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
              <a class="small text-white stretched-link" href="buku.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="card bg-danger text-white mb-4">
          <div class="card-body">
          <?php
            echo mysqli_num_rows(mysqli_query($connect, "SELECT * FROM peminjaman LEFT JOIN user ON user.userid = peminjaman.userid WHERE peminjaman.userid='$id_user'"));
          ?>  
          Peminjaman</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="pinjam.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
      </div>
  </div>
  </div>
</div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="../assets/js/dashboard.js"></script>
  </body>
</html>