<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">



    <style>
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
    <link href="../assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <?php
  include '../koneksi.php';
  $id = $_GET['id'];
  $query = mysqli_query($connect, "SELECT * FROM buku WHERE bukuid=$id") or die(mysql_error());
  while($edit = mysqli_fetch_array($query)){
    ?>
<form class="form-signin" action="edit-proses.php" method="post" enctype="multipart/form-data">
  <img class="mb-4" src="<?php echo $edit['gambar']; ?>" alt="" width="70">
  <h1 class="h3 mb-3 font-weight-normal">Edit Data Buku</h1>
  
  <select name="kategori" class="btn" style="color: #fff; background: #343a40;">
  <?php
  $sql = mysqli_query($connect,"SELECT * FROM kategoribuku");
  while($kategori=mysqli_fetch_array($sql)){
  ?>
  <option value="<?php echo $kategori['kategoriid']; ?>" style="background-color: #fff; color: #343a40;"><?php echo $kategori['namakategori']; ?></option>
  <?php
    }
    ?>
  </select>

  <label for="inputGambar" class="sr-only">Gambar</label>
  <input type="file" id="inputGambar" name="gambar" accept=".png, .jpg, .jpeg">
  <label for="inputEmail" class="sr-only">Judul</label>
  <input type="hidden" id="inputEmail" class="form-control" name="id" value="<?php echo $edit['bukuid'] ?>" required>
  <input type="text" id="inputEmail" class="form-control" placeholder="Judul" name="judul" value="<?php echo $edit['judul'] ?>" required>
  <label for="inputEmail" class="sr-only">Penulis</label>
  <input type="text" id="inputEmail" class="form-control" placeholder="Penulis" name="penulis" value="<?php echo $edit['penulis'] ?>" required>
  <label for="inputEmail" class="sr-only">Penerbit</label>
  <input type="text" id="inputEmail" class="form-control" placeholder="penernit" name="penerbit" value="<?php echo $edit['penerbit'] ?>" required>
  <label for="inputEmail" class="sr-only">Tahun Terbit</label>
  <input type="number" id="inputEmail" class="form-control" placeholder="Tahun Terbit" name="tahun" value="<?php echo $edit['tahunterbit'] ?>" required>
  <label for="inputEmail" class="sr-only">Stok</label>
  <input type="number" id="inputEmail" class="form-control" placeholder="Stok Buku" name="stok" value="<?php echo $edit['stok'] ?>" required>
  <div class="checkbox mb-3">
    <?php
  }
  ?>

  </div>
  <button class="btn btn-lg btn-success btn-block" type="submit" required>Simpan</button>
  <br>
  <a href="buku.php" class="btn btn-lg btn-primary"><< Kembali</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
</form>


    
  </body>
</html>
