<?php 
session_start();
require 'layouts/header.php';
require '../auth/functions.php';
$pengaduan = query("SELECT * FROM pengaduan");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Status</th>
                        <th>Laporan</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php foreach($pengaduan as $p) : ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $p["nik"]; ?></td>
                        <td><?php echo $p["status"]; ?></td>
                        <td><?php echo $p["isi_laporan"]; ?></td>
                        <?php if($p["status"] === "selesai") : ?>
                        <td>
                            <a href="#" class="btn btn-success">Selesai</a>
                        </td>
                        <?php else: ?>
                        <td>
                            <a href="updateKonfirmasi.php?id=<?php echo $p["id_pengaduan"]; ?>" class="btn btn-primary">Konfirmasi</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>