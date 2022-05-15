<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Penyakit</h6>
                    <a href="<?= base_url('Penyakit/tambahPenyakit') ?>" class="btn btn-primary">Tambah Data</a>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Penyakit</th>
                                    <th>Nama Penyakit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($penyakit as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode_penyakit'] ?></td>
                                    <td><?= $row['penyakit'] ?></td>
                                    <td>
                                        <a href="<?= base_url('Penyakit/ubahPenyakit/' . $row['kode_penyakit']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="#" onclick="delete_data('<?= $row['kode_penyakit'] ?>', 'Penyakit/hapusPenyakit')" role="button" class="btn btn-danger">Delete</a>
                                    </td>
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