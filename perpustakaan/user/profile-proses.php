<?php
include '../koneksi.php';
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];
if(!empty($_POST['password'])){
    $password = md5($_POST['password']);
    $query = "CALL edituser('$id','$username','$password','$email','$nama','$alamat','$level')";
}else{
$query = "CALL edituser1('$id','$username','$email','$nama','$alamat','$level')";
}
$sql = mysqli_query($connect,$query);
if($sql){
    echo '<script>alert("Profile Berhasil di update");window.location="profile.php";</script>';
}else{
    echo '<script>alert("Profile Gagal di update");window.location="profile.php";</script>';
}
?>