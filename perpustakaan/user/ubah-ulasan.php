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
    $query = mysqli_query($connect,"SELECT * FROM ulasanbuku LEFT JOIN user ON user.userid = ulasanbuku.userid LEFT JOIN buku ON buku.bukuid = ulasanbuku.bukuid WHERE ulasanid='$id'");
    while($ulasan = mysqli_fetch_array($query)){
    ?>
<form class="form-signin" action="ubah-proses.php" method="post">
  <img class="mb-4" src="../assets/img/ulasan.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Ubah Ulasan</h1>
  <select class="btn" style="color: #fff; background: #343a40;" name="rating">
        <option value="5" style="background-color: #fff; color: #343a40;">Sempurna</option>
        <option value="4" style="background-color: #fff; color: #343a40;">Baik</option>
        <option value="3" style="background-color: #fff; color: #343a40;">Sedang</option>
        <option value="2" style="background-color: #fff; color: #343a40;">Kurang</option>
        <option value="1" style="background-color: #fff; color: #343a40;">Buruk</option>
    </select>
  <label for="inputEmail" class="sr-only">Ulasan</label>
  <input type="hidden" value="<?php echo $ulasan['ulasanid'] ?>" name="id_ulasan">
  <input type="hidden" value="<?php echo $ulasan['userid'] ?>" name="id_user">
  <input type="hidden" value="<?php echo $ulasan['bukuid'] ?>" name="id_buku">
  <input type="text" id="inputEmail" class="form-control" value="<?php echo $ulasan['ulasan'] ?>" placeholder="Ulasan" name="ulasan" required>
  <div class="checkbox mb-3">
  </div>
  <button class="btn btn-lg btn-success btn-block" type="submit" required>Simpan</button>
  <br>
  <a href="ulasan.php" class="btn btn-lg btn-primary"><< Kembali</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
</form>
<?php
    }
    ?>

    
  </body>
</html>