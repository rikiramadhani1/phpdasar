<?php 
// koneksi ke db
$conn = mysqli_connect("localhost", "root","", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] =$row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
     // ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $penerbit = htmlspecialchars($data["penerbit"]);

    // upload gambar dulu
    $gambar = upload();

    if(!$gambar) {
        return false;
    }

     // query insert data
    $query = "INSERT INTO katalog_buku
    VALUES
    ('', '$judul', '$kategori', '$pengarang', '$tahun_terbit', '$penerbit', '$gambar')";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4) {
        echo "<script>
                alert ('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload gambar?
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar =  explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert ('Yang Anda upload bukan gambar');
            </script>";
        return false;
    }
    // untuk mengecek ukuran gambar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert ('Ukuran Gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM katalog_buku WHERE id =$id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
     // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $gambarLama = $data["gambarLama"];
    $gambar = $data["gambar"];

    // cek apakah user pilih gamabr baru atau tidak
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

     // query update data
    $query = "UPDATE katalog_buku SET
                judul = '$judul',
                kategori = '$kategori',
                pengarang = '$pengarang',
                tahun_terbit = '$tahun_terbit',
                penerbit = '$penerbit',
                gambar = '$gambar'
                WHERE id = $id";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM katalog_buku WHERE 
    judul LIKE '%$keyword%' OR 
    kategori LIKE '%$keyword%' OR
    pengarang LIKE '%$keyword%' OR
    tahun_terbit LIKE '%$keyword%' OR
    penerbit LIKE '%$keyword%'
    ";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar')
            </script>";
        return false; 
    }

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai')
            </script>";
        return false; 
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masukkan ke dalam database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

?>