<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['akses'] != "dokter") {
    header("location:login.php");
    exit;
}

$username = $_SESSION['username'];
$idDokter = $_SESSION['id'];

require 'config/koneksi.php';
$query = "SELECT * FROM dokter WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $idDokter);
$stmt->execute();
$result = $stmt->get_result();
$dataDokter = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Dokter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include('components/navbar.php'); ?>
        <!-- Sidebar -->
        <?php include('components/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Profil Dokter</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Profil Dokter</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Profil</h3>
                                </div>
                                <div class="card-body">
                                    <form action="pages/dokter/profilDokter.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dataDokter['id']; ?>">

                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dataDokter['nama']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required><?php echo $dataDokter['alamat']; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_hp">Nomor HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $dataDokter['no_hp']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="poli">Poli</label>
                                            <select class="form-control" id="poli" name="poli">
                                                <?php
                                                $queryPoli = "SELECT * FROM poli";
                                                $resultPoli = mysqli_query($mysqli, $queryPoli);
                                                while ($poli = mysqli_fetch_assoc($resultPoli)) {
                                                    $selected = ($poli['id'] == $dataDokter['id_poli']) ? 'selected' : '';
                                                    echo "<option value='{$poli['id']}' {$selected}>{$poli['nama_poli']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('components/footer.php'); ?>
    </div>

    <!-- Scripts -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>
