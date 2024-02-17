<?php 
session_start();
 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = md5($_POST['password']);
 
$query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username' AND password='$password'");
$sql = mysqli_num_rows($query);
if($sql > 0){
	$data = mysqli_fetch_assoc($query);
	$_SESSION['userid'] = $data['userid'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['email'] = $data['email'];
	$_SESSION['userid'] = $data['userid'];
	$_SESSION['namalengkap'] = $data['namalengkap'];
	$_SESSION['alamat'] = $data['alamat'];
	$_SESSION['level'] = $data['level'];

	if($data['level']=="admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
        $pesan = "Selamat datang $username, Anda berhasil login sebagai admin.";

	}else if($data['level']=="petugas"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas";
        $pesan = "Selamat datang $username, Anda berhasil login sebagai petugas.";

	}else if($data['level']=="user"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		echo '<script>
		alert("Selamat datang, Anda berhasil login sebagai user");
		window.location="user/index.php";
		</script>';
 
	}else{
		echo '<script>
		alert("Data Tidak ditemukan");
		window.location="login.php";
		</script>';
	}	
}else{
	echo '<script>
		alert("Login Gagal, Username atau Password Salah!!! ");
		window.location="login.php";
		</script>';
}
 
?>
<script>
    alert('<?php echo $pesan; ?>');
    location='index.php';
</script>