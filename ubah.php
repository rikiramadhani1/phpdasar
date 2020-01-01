<?php 
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data berdasarkan id
$kb = query("SELECT * FROM katalog_buku WHERE id = $id")[0];

if(isset($_POST["submit"])) {
    // cek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
        <script> 
        alert('Data berhasil diubah');
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script> 
        alert('Data gagal diubah');
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
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah data buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $kb["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $kb["gambar"] ?>">
    <table>
        <tr>
        <td><label for="judul">Judul</label></td>
        <td>:</td>
        <td><input type="text" name="judul" id="judul" required value="<?= $kb["judul"];?>"></td>
        </tr>
        <tr>
        <td><label for="kategori">Kategori</label></td>
        <td>:</td>
        <td><input type="text" name="kategori" id="kategori" required value="<?= $kb["kategori"];?>"></td>
        </tr>
        <tr>
        <td><label for="pengarang">Pengarang</label></td>
        <td>:</td>
        <td><input type="text" name="pengarang" id="pengarang" required value="<?= $kb["pengarang"];?>"></td>
        </tr>
        <tr>
        <td><label for="tahun_terbit">Tahun Terbit</label></td>
        <td>:</td>
        <td><input type="text" name="tahun_terbit" id="tahun_terbit" required value="<?= $kb["tahun_terbit"];?>"></td>
        </tr>
        <tr>
        <td><label for="penerbit">Penerbit</label></td>
        <td>:</td>
        <td><input type="text" name="penerbit" id="penerbit" value="<?= $kb["penerbit"];?>"></td>
        </tr>
        <tr>
        <td><label for="gambar">Gambar</label></td>
        <td>:</td>
        <img src="img/<?= $kb['gambar'];?>" alt="">
        <td><input type="file" name="gambar" id="gambar"></td>
        </tr>
    </table>
    <button type="submit" name="submit"> Ubah Data</button>
    </form>

</body>
</html>