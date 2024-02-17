<?php
	session_start();
	if($_SESSION['level']==""){
		header("location:login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    .w-450 {
	width: 450px;
}
    .vh-100 {
	min-height: 100vh;
}
    .w-350 {
	width: 350px;
}
    </style>
</head>
<body>
<?php
include 'koneksi.php';
$id_user = $_SESSION['userid'];
$query = mysqli_query($connect,"SELECT * FROM user WHERE userid='$id_user'");
while($profile=mysqli_fetch_array($query)){
?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" action="profile-proses.php" method="post" enctype="multipart/form-data">

            <h4 class="display-4  fs-1">User Profile</h4><br>
            <div class="mb-3">
            <center><img src="assets/img/profile.png" class="rounded-circle" style="width: 60px"></center>
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="hidden" class="form-control" name="id" value="<?php echo $profile['userid']?>">
            <input type="hidden" class="form-control" name="level" value="<?php echo $profile['level']?>">
            <input type="text" class="form-control" name="nama" value="<?php echo $profile['namalengkap']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $profile['username']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $profile['email']?>">
          </div>
          
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $profile['alamat']?>">
            
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="index.php" class="link-secondary">Kembali</a>
        </form>
        <?php
}
?>
    </div>
</body>
</html>
