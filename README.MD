# Revisi system login
## Perbaikan
### Session
- User yang belum login tidak bisa mengakses halaman Admin, Petugas ataupun Siswa
- User yang sudah login tidak bisa mengakses halaman login, ini untuk mencegak hancurnya data karena ada beberapa query yang mengambil data dari session

### Hak Akses
- Admin tidak bisa mengakses halaman petugas atau siswa dan sebaliknya
- User hanya bisa mengakses halaman sesuai level-nya masing - masing

## Beberapa celah keamanan yang masih sangat mudah untuk di lewati
- Sangat banyak

## Jika waktu untuk uji kompetensi keahlian masih ada
- Perbaiki beberapa celah keamanan
- Sempurna kan fungsi dari sistem pembayaran SPP Online ini karena masih banyak kekurangannya

## Note
- Jangan mengerjakan tahap berikutnya sebelum tahapan ini berjalan lancar/tidak ada error