# CodeIgniter-PHP-Native

# PHP NATIVE
- Disarankan memakai software Xampp php 7 https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.30/
- Ekstrak file zip lalu letakkan pada folder htdocs pada Xampp
- Konfigurasi koneksi database persiksa file koneksi.php
  pada folder dengan file koneksi
 
  Sesuaikan dengan database:
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "namadatabase";
  (bila pada Xampp kosongkan password)

- Dumping file sql ke MySQL
- Jalankan browser http://localhost/namafolder
- SELESAI

# CODEIGNITER 3
- Disarankan memakai software Xampp php 7 https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.30/
- Ekstrak file zip lalu letakkan pada folder htdocs pada Xampp
- Konfigurasi config base url dan database

Base url
- letaknya --> nama folder/application/config/config.php
- $config['base_url'] = 'http://localhost/nama-folder';

Database
- letaknya --> nama folder/application/config/database.php
- $config['base_url'] = 'http://localhost/nama-folder';

	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'namadatabase',
- Dumping file sql ke MySQL
- Jalankan browser http://localhost/namafolder
- SELESAI

# CODEIGNITER 4
- Disarankan memakai software Xampp php 7 https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.30/
- Disarankan memakai software vs code
- Ekstrak file zip lalu letakkan dimana saja
- Konfigurasi file .env dan database

setting	.env
CI_ENVIRONMENT = development
database.default.hostname = localhost
database.default.database = namadatabase
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =

- Dumping file sql ke MySQL
- Jalankan 'php spark serve' diterminal vs code
- Jalankan browser http://localhost:8080
- SELESAI
