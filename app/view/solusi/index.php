<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Solusi</h6>
                    <a href="<?= base_url('Solusi/tambahSolusi') ?>" class="btn btn-primary">Tambah Data</a>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Solusi</th>
                                    <th>Nama Solusi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($solusi as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode_solusi'] ?></td>
                                    <td><?= $row['solusi'] ?></td>
                                    <td>
                                        <a href="<?= base_url('Solusi/ubahSolusi/' . $row['kode_solusi']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="#" onclick="delete_data('<?= $row['kode_solusi'] ?>', 'Solusi/hapusSolusi')" role="button" class="btn btn-danger">Delete</a>
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