<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Pengetahuan</h6>
                    <a href="<?= base_url('Pengetahuan/tambahPengetahuan') ?>" class="btn btn-primary">Tambah Data</a>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penyakit</th>
                                    <th>Gejala</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($pengetahuan as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['penyakit'] ?></td>
                                    <td><?= $row['gejala'] ?></td>
                                    <td>
                                        <a href="<?= base_url('Pengetahuan/ubahPengetahuan/' . $row['id']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="#" onclick="delete_data('<?= $row['id'] ?>', 'Pengetahuan/hapusPengetahuan')" role="button" class="btn btn-danger">Delete</a>
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