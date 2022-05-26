<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Laporan</h6>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Filter</h6>
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Tahun</label>
                                            <select class="form-control" name="tahun">
                                                <option value="">- Semua -</option>
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
                                <button type="submit" class="btn btn-primary submit">Filter</button>
                                <a href="<?= base_url($link_cetak) ?>" class="btn btn-success text-white">Cetak</a>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Hasil Diagnosa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($diagnosis as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['email'] ?></td>
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