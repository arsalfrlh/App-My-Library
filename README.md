IND
Cara Penggunnaan
1.Unduh File Zip
2.Extrak File Lalu Pindahkan ke htdocs
3.Jalankan Xampp lalu masuk ke phpMyadmin
4.Buat DataBase dengan nama db_perpustakaan dan Import DataBasenya
5.Buka Chrome lalu ketikan sesuai penempatan Folder tersebut
akun
1.Login Sebagai Admin
  username = admin
  password = 123
2.Login Sebagai Petugas
  username = petugas
  password = 123
3.Login Sebagai user/peminjam
  -username = user
   password = 123
  -username = peminjam
   password = 123
  -username = pengguna
   password = 123
   Note:
   Jika terdapat error saat menambahkan/INSERT, cek di database dan lihat di bagian auto increment si IDnya berubah menjadi 0 hapus si IDnya, jika sudah. ubah Prosedur di database dan tambahkan tanda ' ' pada IDnya contoh Prosedur (pinjambuku) INSERT INTO peminjaman VALUES('peminjamanid',kodepinjam,userid,bukuid,dst) dan jalankan programnya. jika masih error hapus tanda ' ' di ID tadi dan jalankan programnya, ingat hanya ID primary key pada tabel itu saja yang diberi tanda ' '

ENG
How to use
1.Download Zip File
2. Extract the file then move it to htdocs
3. Run Xampp then go to phpMyadmin
4. Create a DataBase with the name db_perpustakaan and Import the DataBase
5. Open Chrome then type according to the folder placement
account
1.Login as Admin
  username = admin
  password = 123
2.Login as officer
  username = petugas
  password = 123
3.Login as user/borrowed
  -username = user
   password = 123
  -username = peminjam
   password = 123
  -username = pengguna
   password = 123
   Note:
   If there is an error when adding/INSERT, check the database and look in the auto increment section, the ID changes to 0, delete the ID, if you have changed the procedure in the database and add a ' ' sign to the ID, for example Procedure (pinjambuku) INSERT INTO peminjaman VALUES('peminjamanid',kodepinjam,userid,bukuid,etc.) and run the program. if there is still an error, delete the ' ' sign on the ID and run the program, remember that only the primary key ID in that table is marke ' '

![alt text](https://github.com/arsalfrlh/App-My-Library/blob/main/dashboard.png?raw=true)
![alt text](https://github.com/arsalfrlh/App-My-Library/blob/main/buku.png?raw=true)
![alt text](https://github.com/arsalfrlh/App-My-Library/blob/main/laporan.png?raw=true)

