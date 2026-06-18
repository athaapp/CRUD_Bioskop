Implementasi CRUD dengan studi kasus Bioskop (Kelompok 2)

**Anggota Kelompok:**
- M. Athaaillaah J. D. P (5325600001)
- Maylisa Rahma Putri (5325600007)
- Nashshar Haidar Farras (5325600016)
- Muchamad Adi Firmansyah (5325600026)
- Emmanuel Eusondy Taulupun (5325600021)

Yang dibutuhkan:
- XAMPP
- Database MySQL
- Visual Studio Code
- Browser
- Git bash dengan VS Code sebagai terminal
- GitHub

**Cara menjalankan (ngeclone dari git):**
- Salin link repository ini (kotak hijau dengan simbol < >)
- Buka VS Code
Next:
1. Di VS Code, teken tombol Ctrl + Shift + P buat munculin kotak pencarian di atas.
2. Ketik kata kunci, Git: Clone, lalu tekan Enter.
3. Tempel (paste) link GitHub (repository) yang tadi ke dalam kotak tersebut, lalu tekan Enter. Jendela penyimpanan komputer akan terbuka.
4. Pilih folder C:/xampp/htdocs/ sebagai tempat nyimpen, klik tombol Select as Repository Destination (atau Select Repository Location).
5. Tunggu proses unduh. Kalao muncul kotak pop-up di pojok kanan bawah, klik tombol open.
6. Akses web pake localhost dengan format --> localhost/_namafolder_/index.php (nama folder tergantung kalian ngasih nama foldernya apa, liat nama
   foldernya di dalem folder htdocs).

**Cara menjalankan (kalau ga mau lewat github):**
1. Download folder paling terbaru yang ada di drive (ada di group wa)
2. Masukin itu folder ke htdocs XAMPP kalian
3. Download database paling terbaru yang ada di drive
4. Buka XAMPP, start Apache & MySQL
5. Buka VS Code, drag and drop folder dari drive tadi ke halaman sebelah kiri VS Code (file explorer),
  terus ada pop up, pencet add folder to workspace.
6. Akses web pake localhost dengan format --> localhost/_namafolder_/index.php (nama folder tergantung kalian ngasih nama foldernya apa,
   liat nama foldernya di dalem folder htdocs)
7. udah ok, o7

nek ada error bilang yo, :p

database juga saya upload di repo ini, barangkali lebih enak nda usah muter-muter ke drive.

**PENTING**
Untuk setting database agar relasi tetap masuk akal, jangan lupa kalau ada foreign key di tiap tabel kalian, setting kayak gini:
1. Masuk ke tabel
2. Masuk ke Structure di bar atas
3. Cari menu yang bernama Relation View (di atas struktur tabel kalian)
4. Setelah masuk, kalo nanti ada foreign key di tabel itu, bakal tampil Constraint Properties yang udah ada namanya
5. Habistu pada masing-masing constraint pasti ada tulisan ON DELETE sama ON UPDATE
6. Pada langkah ini, kalian ubah ON DELETE sama ON UPDATE dari RESTRICT menjadi CASCADE
7. k makasih

ata-
