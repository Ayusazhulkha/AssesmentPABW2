<?php
// Konfigurasi database
$host = 'localhost';
$db = 'kost';
$user = 'root'; // Ganti dengan username default atau username yang benar
$pass = ''; // Kosongkan password jika tidak ada password, atau masukkan password yang benar

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data tipe kamar
$sql = "SELECT id, tipe, deskripsi FROM tipe_kamar";
$result = $conn->query($sql);

$kamarData = array();

if ($result->num_rows > 0) {
    // Mengambil data tiap baris
    while($row = $result->fetch_assoc()) {
        $kamarData[] = $row;
    }
} else {
    echo json_encode(array("message" => "Tidak ada data ditemukan."));
    $conn->close();
    exit();
}

// Menutup koneksi
$conn->close();

// Mengatur header untuk output JSON
header('Content-Type: application/json');

// Menampilkan data dalam format JSON
echo json_encode($kamarData);
?>