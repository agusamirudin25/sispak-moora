<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Laporan Bulanan</h6>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"></h6>
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label" for="bulan">Bulan</label>
                                            <select class="form-control" name="bulan" id="bulan">
                                                <?php
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $nama_bulan = bulan($i);
                                                    echo "<option value='$i' " . ">$nama_bulan</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label" for="tahun">Tahun</label>
                                            <select class="form-control" name="tahun" id="tahun">
                                                <?php
                                                $tahun = date('Y');
                                                for ($i = $tahun; $i >= $tahun - 10; $i--) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- Row -->
                                <button type="submit" class="btn btn-primary submit">Cari</button>
                                <a href="<?= base_url($link_cetak) ?>" class="btn btn-danger text-white">Cetak</a>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Hasil Diagnosa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($diagnosis as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['nama_lengkap'] ?></td>
                                        <td><?= $row['nama_penyakit'] . " ({$row['hasil_moora']})" ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?= asset('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= asset('assets/js/helpers.js') ?>"></script>