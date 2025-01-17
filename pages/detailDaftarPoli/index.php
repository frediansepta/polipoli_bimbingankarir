<?php
    require 'config/koneksi.php';
    $id = $_GET['id'];
    $ambilDetail = mysqli_query($mysqli, "SELECT 
    daftar_poli.id as idDaftarPoli,
    poli.nama_poli,
    dokter.nama,
    jadwal_periksa.hari,
    DATE_FORMAT(jadwal_periksa.jam_mulai, '%H:%i') as jamMulai,
    DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai,
    daftar_poli.no_antrian,
    p.id as idPeriksa,
    p.tgl_periksa,
    p.catatan,
    p.biaya_periksa,
    GROUP_CONCAT(o.nama_obat SEPARATOR ', ') AS namaObat,
    GROUP_CONCAT(o.harga SEPARATOR ', ') AS hargaObat
    FROM daftar_poli
    INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
    INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
    INNER JOIN poli ON dokter.id_poli = poli.id
    LEFT JOIN periksa p ON daftar_poli.id = p.id_daftar_poli
    LEFT JOIN detail_periksa dp ON p.id = dp.id_periksa
    LEFT JOIN obat o ON dp.id_obat = o.id
    WHERE daftar_poli.id = '$id'
    GROUP BY daftar_poli.id, poli.nama_poli, dokter.nama, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, daftar_poli.no_antrian, p.id, p.tgl_periksa, p.catatan, p.biaya_periksa");

    $data = mysqli_fetch_assoc($ambilDetail);
?>

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Detail Periksa
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>Dr. <?php echo $data['nama'] ?></b></h2>
                                <h6 class="text-muted text-lg"> <?php echo $data['nama_poli'] ?></h6>
                                <h6 class="text-muted text-lg"><?php echo $data['hari'] ?></h6>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="large"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                                        <?php echo $data['jamMulai'] ?> - <?php echo $data['jamSelesai'] ?></li>
                                </ul>
                                <br><br>
                                <p class="text-muted text-lg"> Obat : <br>
                                    <?php 
                                    $namaObatArray = explode(',', $data['namaObat']);
                                    $hargaObatArray = explode(',', $data['hargaObat']);
                                    
                                    foreach ($namaObatArray as $index => $namaObat) {
                                        $hargaObat = isset($hargaObatArray[$index]) ? $hargaObatArray[$index] : '0';
                                        echo ($index + 1) . ". " . $namaObat . " - Rp " . number_format($hargaObat, 0, ',', '.') . "<br>";
                                    }
                                    ?>
                                    Biaya Periksa : Rp 150.000
                                </p>
                                <h5 class="text-muted text-lg"><strong>Total Biaya: Rp <?php echo number_format($data['biaya_periksa'], 0, ',', '.'); ?></strong></h5>
                            </div>
                            <div class="col-5 flex justify-center items-center flex-col">
                                <h2 class="lead"><b>No Antrian</b></h2>
                                <div class="rounded-lg flex justify-center items-center"
                                    style="height: 60px; width: 60px; background-color: #0284c7; color: white; padding-top: 6px;">
                                    <h1><?php echo $data['no_antrian'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-left">
                            <a href="daftarPoliklinik.php" class="btn btn-md btn-secondary">
                                Kembali
                            </a>
                            <button onclick="window.print();" class="btn btn-md btn-primary">
                                Cetak Nota
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer -->
</div>