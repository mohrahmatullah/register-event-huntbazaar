How To Install this Project
1. Persiapan
	- Memiliki CLI/Command Line Interface berupa Command Prompt (CMD) atau Power Shell atau Git Bash (selanjutnya kita sebut terminal).
	- Memiliki Web Server (misal XAMPP) dengan PHP Minimal 7.0 PHP maximal versi 7.2.24 Karena project ini menggunakan framework laravel versi 5.8
	- Composer telah ter-install, cek dengan perintah composer -V melalui terminal.
	- Memiliki koneksi internet (untuk proses installasi).

2. Langkah-Langkah
	- git clone https://github.com/mohrahmatullah/register-event-huntbazaar.git Melalui terminal,
	- Masuk ke direktori register-event-huntbazaar melalui terminal dengan perintah cd register-event-huntbazaar.
	- (Sesuai petunjuk installasi) Pada terminal, berikan perintah composer install. Ini perlu koneksi internet.
	- Composer akan menginstall dependency paket dari source code tersebut hingga selesai.
	- Jalankan perintah php artisan, untuk menguji apakah perintah artisan Laravel bekerja.
	- Buat database baru (kosong) pada mysql (via phpmyadmin) dengan nama register-event-huntbazaar.
	- Duplikat file .env.example, lalu rename menjadi .env.
	- Kembali ke terminal, php artisan key:generate.
	- Setting koneksi database di file .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD) 

		URL_MEDIA=http://127.0.0.1:8000

		DB_CONNECTION=mysql

		DB_HOST=localhost

		DB_PORT=3306

		DB_DATABASE=register-event-huntbazaar

		DB_USERNAME=root

		DB_PASSWORD=

	- Run migrations (tables and Seeders) php artisan migrate --seed. Cek di phpmyadmin, seharusnya tabel dan isi nya sudah muncul.
	- Setelah selesai, Jalankan perintah php artisan serve maka dapat diakses dengan http://127.0.0.1:8000/
 

Silahkan Ujicoba test dengan mengakses link 
	http://127.0.0.1:8000/admin	-> ini url admin

silahkan login,
			email : admin@email.com
			password : 12345

Silahkan input email anda pada tombol input undangan
maka list email yang belum terdaftar akan ada pada tabel list undangan dan system akan mengirimkan generate link ke email anda.

Terimakasih atas kesempatannya untuk mengikuti Technical Test - Web Developer @HuntStreet.com