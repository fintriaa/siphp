<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbportal";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $statusverifikasi = $_POST['statusverifikasi'];

    // Query SQL untuk memperbarui data di database
    $sql = "UPDATE tbl_pekerjaan SET statusverifikasi = '$statusverifikasi' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Status berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui status: " . $conn->error;
    }
}
?>
