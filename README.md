## Aplikasi Web Sederhana pengelolaan data komik menggunakan Framework CodeIgniter 4

Fitur :
- Menambahkan data buku ( Judul,  Penulis, Penerbit, Sampul / Gambar)
- Edit data buku
- Hapus data buku

## Server Requirements

PHP versi 7.4 atau lebih tinggi, ditambah dengan beberapa ekstensi berikut yang harus di install:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php)

Tambahan,pastikan bahwa beberapa ekstensi berikut sudah berstatus enabled di dalam PHP anda:

- json (sudah enabled sejak awal - tidak perlu di ubah lagi)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (sudah enabled sejak awal - tidak perlu di ubah lagi)

## Penting !!!
- Untuk folder vendor tidak ditemukan, jadi pastikan anda mengintall CodeIgniter 4 terlebih dahulu menggunakan composer, lalu kemudian pindahkan folder       vendor yang ada di dalam struktur folder anda ke dalam struktur folder aplikasi web ini.
- Di dalam struktur database terdapat tabel dengan nama 'orang', ini hanya bersifat opsional karena tabel tersebut dibuat untuk mencoba fitur pagination     dan penacarian pada codeIgniter, jadi jika anda hanya tertarik pada pengelolaan data komik, silahkan hapus tabel tersebut, dan juga file migrasi-nya.

## Note
- Aplikasi ini cocok untuk pemula yang ingin belajar mengenai dasar - dasar CRUD menggunakan Framework CodeIgniter 4.
