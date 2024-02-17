<?php
	session_start();
	if($_SESSION['level']==""){
		header("../location:login.php");
  }
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Pinjam</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
  </head>
  <style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    background: #343a40;
    background-size: cover;
}

.container{
    width: 100%;
    max-width: 650px;
    background-color: rgba(0, 0, 0, .25);
    padding: 28px;
    margin: 0 28px;
    border-radius: 10px;
    box-shadow: inset -2px 2px 2px white;
}

.form-title{
    font-size: 26px;
    font-weight: 600;
    text-align: center;
    padding-bottom: 6px;
    color: white;
    text-shadow: 2px 2px 2px black;
    border-bottom: solid 1px white;
}

.main-user-info{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}

.user-input-box:nth-child(2n){
    justify-content: end;
}

.user-input-box{
    display: flex;
    flex-wrap: wrap;
    width: 50%;
    padding-bottom: 15px;
}

.user-input-box label{
    width: 95%;
    color: white;
    font-size: 20px;
    font-weight: 400;
    margin: 5px 0;
}

.user-input-box input{
    height: 40px;
    width: 95%;
    border-radius: 7px;
    outline: none;
    border: 1px solid grey;
    padding: 0 10px;
}

.gender-title{
    color:white;
    font-size: 24px;
    font-weight: 600;
    border-bottom: 1px solid white;
}

.gender-category{
    margin: 15px 0;
    color: white;
}

.gender-category label{
    padding: 0 20px 0 5px;
}

.gender-category label,
.gender-category input,
.form-submit-btn input{
    cursor: pointer;
}

.form-submit-btn{
    margin-top: 40px;
}

.form-submit-btn input{
    display: block;
    width: 100%;
    margin-top: 10px;
    font-size: 20px;
    padding: 10px;
    border:none;
    border-radius: 3px;
    color: #fff;
	background-color: #28a745;
}

.form-submit-btn input:hover{
    background: rgba(56, 204, 93, 0.7);
    color: rgb(255, 255, 255);
}

@media(max-width: 600px){
    .container{
        min-width: 280px;
    }

    .user-input-box{
        margin-bottom: 12px;
        width: 100%;
    }

    .user-input-box:nth-child(2n){
        justify-content: space-between;
    }

    .gender-category{
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .main-user-info{
        max-height: 380px;
        overflow: auto;
    }

    .main-user-info::-webkit-scrollbar{
        width: 0;
    }
}

  </style>
  <body>
    <div class="container">
      <h1 class="form-title">Kembalikan Buku</h1>
      <form action="pengembalian-proses.php" method="post">
      <?php
        include '../koneksi.php';
        $id_user = $_SESSION['userid'];
        $id = $_GET['id'];
        $query = mysqli_query($connect, "SELECT * FROM peminjaman LEFT JOIN buku ON buku.bukuid = peminjaman.bukuid WHERE peminjamanid=$id") or die(mysql_error());
        while($kembali = mysqli_fetch_array($query)){
        ?>
        <br>
        <center>
            <img src="<?php echo $kembali['gambar']; ?>" alt="Gambar Buku" style="width: 100px;">
          </center>
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Judul</label>
            <input type="text" id="fullName" name="judul" value="<?php echo $kembali['judul'] ?>" readonly/>
          </div>
          <div class="user-input-box">
            <label for="username">Penulis</label>
            <input type="text" id="username" name="penulis" value="<?php echo $kembali['penulis'] ?>" readonly/>
          </div>
          <div class="user-input-box">
            <label for="email">Penerbit</label>
            <input type="text" id="email" name="penerbit" value="<?php echo $kembali['penerbit'] ?>" readonly/>
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Tahun Terbit</label>
            <input type="text" id="phoneNumber" name="tahun" value="<?php echo $kembali['tahunterbit'] ?>" readonly/>
          </div>
          <div class="user-input-box">
            <label for="password">Jumlah Kembali</label>
            <input type="number" id="password" name="jumlah" value="<?php echo $kembali['jumlah'] ?>" readonly/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Tanggal Pengembalian</label>
            <input type="date" id="tanggal" name="tgl_kembali" readonly/>
            <input type="date" name="tgl_pinjam" value="<?php echo $kembali['tglpeminjaman'] ?>" hidden="hidden" readonly/>
            <input type="hidden" value="dikembalikan" name="status" readonly/>
            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" readonly/>
            <input type="hidden" name="id_buku" value="<?php echo $kembali['bukuid'] ?>" readonly/>
            <input type="hidden" name="id_pinjam" value="<?php echo $kembali['peminjamanid'] ?>" readonly/>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Kembalikan">
        </div>
      </form>
      <br>
      <a href="pinjam.php" style="text-decoration: none; color: #fff;">Kembali</a>
      
      <script>
    // Fungsi untuk mendapatkan tanggal sekarang dalam format YYYY-MM-DD
    function getFormattedDate() {
      const now = new Date();
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0');
      const day = String(now.getDate()).padStart(2, '0');
      return `${year}-${month}-${day}`;
    }

    // Fungsi untuk mengatur nilai input tanggal secara otomatis
    function updateDate() {
      const tanggalInput = document.getElementById('tanggal');
      tanggalInput.value = getFormattedDate();
    }

    // Panggil fungsi pertama kali
    updateDate();

    // Atur interval agar tanggal diperbarui setiap hari
    setInterval(updateDate, 24 * 60 * 60 * 1000); // 24 jam * 60 menit * 60 detik * 1000 milidetik
  </script>
    </div>
    <?php
        }
    ?>
  </body>
</html>