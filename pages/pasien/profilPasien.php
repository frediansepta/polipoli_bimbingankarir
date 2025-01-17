<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $no_ktp = $_POST["no_ktp"]; // Pastikan `no_ktp` ditangkap dari form
    $no_rm = $_POST["no_rm"];   // Pastikan `no_rm` ditangkap dari form (jika ada)

    // Validasi untuk memastikan data tidak kosong
    if (empty($nama) || empty($alamat) || empty($no_hp) || empty($no_ktp) || empty($no_rm)) {
        echo "Error: Semua data wajib diisi.";
        exit();
    }

    // Query untuk melakukan update data pasien
    $query = "UPDATE pasien SET 
        nama = ?, 
        alamat = ?, 
        no_hp = ?, 
        no_ktp = ?, 
        no_rm = ?
        WHERE id = ?";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssssi", $nama, $alamat, $no_hp, $no_ktp, $no_rm, $id);

    // Eksekusi query
    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Data pasien berhasil diubah!");';
        echo 'window.location.href = "../../profilPasien.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$mysqli->close();
?>
