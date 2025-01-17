<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $poli = isset($_POST["poli"]) ? $_POST["poli"] : null; // Pastikan $_POST['poli'] diakses dengan aman

    // Validasi untuk memastikan poli tidak null
    if (empty($poli)) {
        echo "Error: Poli tidak boleh kosong.";
        exit();
    }

    // Query untuk melakukan update data dokter
    $query = "UPDATE dokter SET 
        nama = ?, 
        alamat = ?, 
        no_hp = ?, 
        id_poli = ?
        WHERE id = ?";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssii", $nama, $alamat, $no_hp, $poli, $id);

    // Eksekusi query
    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Data dokter berhasil diubah!");';
        echo 'window.location.href = "../../profilDokter.php";';
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
