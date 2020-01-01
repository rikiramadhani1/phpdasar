<?php 

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if(isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
        <script> 
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script> 
        alert('Data gagal ditambahkan');
        document.location.href = 'index.php'
        </script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah data buku</h1>

    <form action="" method="post" enctype="multipart/form-data" >
    <table>
        <tr>
        <td><label for="judul">Judul</label></td>
        <td>:</td>
        <td><input type="text" name="judul" id="judul" required></td>
        </tr>
        <tr>
        <td><label for="kategori">Kategori</label></td>
        <td>:</td>
        <td><input type="text" name="kategori" id="kategori" required></td>
        </tr>
        <tr>
        <td><label for="pengarang">Pengarang</label></td>
        <td>:</td>
        <td><input type="text" name="pengarang" id="pengarang" required></td>
        </tr>
        <tr>
        <td><label for="tahun_terbit">Tahun Terbit</label></td>
        <td>:</td>
        <td><input type="text" name="tahun_terbit" id="tahun_terbit" required></td>
        </tr>
        <tr>
        <td><label for="penerbit">Penerbit</label></td>
        <td>:</td>
        <td><input type="text" name="penerbit" id="penerbit"></td>
        </tr>
        <tr>
        <td><label for="gambar">Gambar</label></td>
        <td>:</td>
        <td><input type="file" name="gambar" id="gambar"></td>
        </tr>
    </table>
    <button type="submit" name="submit"> Tambah Data</button>
    </form>

</body>
</html>