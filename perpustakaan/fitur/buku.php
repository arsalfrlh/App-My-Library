<?php
	session_start();
	if($_SESSION['level']=="user"){
		header("location:user/index.php");
  }elseif($_SESSION['level'] == ""){
    header("location:login.php");
  }
include '../koneksi.php';
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
    <form action="buku.php" method="get">
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">My Liblary</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari'];}?>">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="btn btn-danger" href="../logout.php">Sign out</a>
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
            <a class="nav-link" href="../index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="buku.php">
              <span data-feather="calendar"></span>
              Buku
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
          <?php
            $id_user = $_SESSION['userid'];
            $qry = mysqli_query($connect,"SELECT * FROM user WHERE userid='$id_user'");
            while($admin = mysqli_fetch_array($qry)){
            ?>
            <?php
            if($admin['level'] != 'petugas'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="register-admin.php?id=<?php echo $admin['userid']; ?>">
              <span data-feather="user"></span>
              Tambahkan Admin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php?id=<?php echo $admin['userid']; ?>">
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
            <a class="nav-link" href="laporan.php">
              <span data-feather="file-text"></span>
              Generate laporan
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buku</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <img src="../assets/img/logo_buku.jpg" style="width: 100px; border-radius: 50%;">
          </div>

        </div>
      </div>


      
      <h2 align="center">Daftar Buku</h2>
      <a class="btn btn-success" href="tambah.php">Tambah Buku</a>
      <a class="btn btn-primary" href="kategori.php">Tambah Kategori</a>
      <div class="table-responsive"><br>
      <form action="buku.php" method="get">
      <input type="submit" value="Semua" class="btn btn-warning"> <input type="submit" value="Novel" class="btn btn-warning" name="novel"> <input type="submit" value="Fiksi" class="btn btn-warning" name="fiksi"> <input type="submit" value="Non Fiksi" class="btn btn-warning" name="nonfiksi"> <input type="submit" value="Pendidikan" class="btn btn-warning" name="pendidikan"> <input type="submit" value="Komik" class="btn btn-warning" name="komik"> <input type="submit" value="Biografi" class="btn btn-warning" name="biografi"> <input type="submit" value="Dongeng" class="btn btn-warning" name="dongeng">
      </form>
      <table class="table table-striped table-sm">
        <thead>
            <th bgcolor="white">No</th>
            <th bgcolor="white">Gambar</th>
            <th bgcolor="white">Kategori</th>
            <th bgcolor="white">Judul</th>
            <th bgcolor="white">Penulis</th>
            <th bgcolor="white">Penerbit</th>
            <th bgcolor="white">Tahun Terbit</th>
            <th bgcolor="white">Stok</th>
            <th bgcolor="white">Aksi</th>
        </thead>
        <tbody>
            <?php
                if(isset($_GET['cari'])) {
                  $cari = $_GET['cari'];
  
                  $query = "SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE judul like '%".$cari."%'";
              }elseif(isset($_GET['novel'])){
                $query ="SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE buku.kategoriid='6'";
              }elseif(isset($_GET['fiksi'])){
                $query ="SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE buku.kategoriid='3'";
              }elseif(isset($_GET['nonfiksi'])){
                $query ="SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE buku.kategoriid='4'";
              }elseif(isset($_GET['pendidikan'])){
                $query ="SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE buku.kategoriid='13'";
              }elseif(isset($_GET['komik'])){
                $query ="SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE buku.kategoriid='5'";
              }elseif(isset($_GET['biografi'])){
                $query ="SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE buku.kategoriid='12'";
              }elseif(isset($_GET['dongeng'])){
                $query ="SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid WHERE buku.kategoriid='11'";
              }else{
                  $query = "SELECT * FROM buku LEFT JOIN kategoribuku ON buku.kategoriid = kategoribuku.kategoriid";
              }
              $result = mysqli_query($connect,$query);

            $no = 1;
            while ($buku=mysqli_fetch_array($result)) {
                $id = $buku['bukuid'];
                $judul = $buku['judul'];
                $kategori = $buku['namakategori'];
                $penulis = $buku['penulis'];
                $penerbit = $buku['penerbit'];
                $tahun = $buku['tahunterbit'];
                $stok = $buku['stok'];
            ?>
            <tr>
            <td><?php echo $no++?></td>
            <td><img src="<?php echo $buku['gambar']; ?>" alt="Gambar Buku" style="width: 80px;"></td>
            <td><?php echo $kategori?></td>
            <td><?php echo $judul?></td>
            <td><?php echo $penulis?></td>
            <td><?php echo $penerbit?></td>
            <td><?php echo $tahun?></td>
            <td><?php echo $stok?></td>
            <td><a class="btn btn-primary" href="edit.php?id=<?php echo $buku['bukuid']; ?>">Edit</a>
                  <a class="btn btn-danger" href="hapus.php?id=<?php echo $buku['bukuid']; ?>">Hapus</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
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
