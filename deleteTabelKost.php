<?php
// Konfigurasi database
$host = 'localhost';
$db = 'kost';
$user = 'root';
$pass = ''; // Sesuaikan dengan konfigurasi database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengecek apakah parameter id telah diterima
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM tipe_kamar WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $conn->error));
    }
} else {
    echo json_encode(array("success" => false, "error" => "ID tidak ditemukan"));
}

// Menutup koneksi
$conn->close();
?>