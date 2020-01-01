<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$kb = query("SELECT * FROM katalog_buku ORDER BY id DESC");

// jika tombol cari diklick
if(isset($_POST["cari"])) {
    $kb = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>
<body>
<a href="logout.php"> LogOut</a>
    <h1>Daftar Buku</h1>

    <a href="tambah.php"> Tambah Data Buku</a><br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">cari</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Penerbit</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach($kb as $row) : ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus?');">hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="<?= $row["judul"]; ?>" title="<?= $row["judul"]; ?>" width="50 px"></td>
            <td><?= $row["judul"]; ?></td>
            <td><?= $row["kategori"]; ?></td>
            <td><?= $row["pengarang"]; ?></td>
            <td><?= $row["tahun_terbit"]; ?></td>
            <td><?= $row["penerbit"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>