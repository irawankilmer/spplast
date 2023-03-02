# Persiapan dan Pembuatan Database
[Link Soal Ujikom](https://drive.google.com/drive/mobile/folders/1d7deY05NTZQesQpEP2UuLJSKVhN0DqbY?token=K1IxOUg4S3E3bEdPaEtVVmtVaG8zQT09)<br>
[Link Polder Penyimpanan Hasil Ujikom](https://drive.google.com/drive/folders/1dwCrnVwCNWcot3eMzNLTxIV9ueI5sCUd?usp=share_link)
## Desain Database
Silahkan buat database dan beberapa tabel nya seperti yang terlihat pada gambar berikut<br>
<img src="https://github.com/irawankilmer/spplast/blob/main/img/deisgn.png">
## Upload Database
Agar pembuatan database jadi lebih cepat, silahkan ikuti langkah - langkah berikut<br>
- Buka aplikasi Xampp di laptop/PC Kalian
- Kemudian klik start apache dan mysql
<img src="https://github.com/irawankilmer/spplast/blob/main/img/1%20xampp.png">
<br>
Jika sudah terlihat seperti pada gambar di atas, langkah selanjutnya adalah membuat database baru, dengan cara:<br>
- Kunjungi link localhost/phpmyadmin<br>
- Jika sudah, maka tampilannya akan terlihat seperti berikut
<img src="https://github.com/irawankilmer/spplast/blob/main/img/2%20buat%20database%20baru.png">
- Klik tombol new/baru(Nomor satu di gambar)<br>
- Isi nama database, silahkan sesuaikan, dalam contoh ini saya membuat database dengan nama coba<br>
- Jika sudah, silahkan klik tombol create/buat seperti yang di tunjukan oleh angka 2 pada gambar diatas

### Upload sql
<img src="https://github.com/irawankilmer/spplast/blob/main/img/9.png">
- Silahkan buka file database.sql seperti yang terlihat pada gambar
- copy semua isi nya
<img src="https://github.com/irawankilmer/spplast/blob/main/img/10.png">
- Langkah selanjutnya, pada halaman database, klik tombol SQL
<img src="https://github.com/irawankilmer/spplast/blob/main/img/3%20import%20sql.png">
- Lalu paste/tempel semua isi dari file database.sql dari hasil copy sebelumnya
<img src="https://github.com/irawankilmer/spplast/blob/main/img/5%20import%20sql.png">
- Klik tombol kirim, maka import database sudah selesai, jika berhasil akan terlihat seperti gambar berikut
<img src="https://github.com/irawankilmer/spplast/blob/main/img/6%20import%20sql%20berhasil.png">
- Silahkan klik pada nama database yang kalian buat, akan terlihat struktur tabel seperti pada gambar 
<img src="https://github.com/irawankilmer/spplast/blob/main/img/7%20strtur%20table.png">


# Insert data Admin dan Petugas
Pada langkah ini kita akan menambahkan 2 data pada tabel petugas, masing - masing untuk Admin dan Petugas.<br>
Ini bertujuan untuk pengujian sistem login pada tahap selanjutnya

## Create
Silahkan buat polder di xampp/htdocs, dalam contoh ini saya buat dengan nama contohspp jadi struktur polder nya seperti ini xampp/htdocs/contohspp<br>
- Pada polder contohspp silahkan buat file index.php lalu tambahkan baris program berikut
```php
<?php
  // Buat koneksi ke database
  $conn = mysqli_connect('localhost', 'root', '', 'coba');
  
  // Enkripsi password
  $password = password_hash('admin',PASSWORD_DEFAULT);
  
  // Query insert data ke tabel petugas
  mysqli_query($conn, "INSERT INTO petugas VALUES('', 'admin', '$password', 'Admin Satu', 'admin')");
?>
```
- pada web browser silahkan ketika alamat localhost/nama polder kemudian enter (localhost/contohspp)
- Jika sudah, silahkan buka halaman database, lalu periksa tabel petugas, jika berhasil maka akan ada satu data baru dari hasil query diatas
<img src="https://github.com/irawankilmer/spplast/blob/main/img/jojojo.png">

## Note
- Lakukan langkah yang sama untuk membuat user dengan level petugas
- hapus semua isi pada file index.php
- Seluruh rangkaian panduan ini merupakan rangkuman dari materi yang sudah di jelaskan pada saat proses belajar mengajar di dalam kelas

## Informasi
[Belajar Investasi](https://www.irawan.me/)<br>
[Jasa Penulis Artikel Seo Profesional](https://rajawriter.com/)

### Untuk langkah selanjutnya, ikuti semua instruksi dari guru pembimbing.

## Menu
-> [Selanjutnya](https://github.com/irawankilmer/spplast/tree/2-sistem-login)
