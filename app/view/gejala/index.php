<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Gejala</h6>
                    <a href="<?= base_url('Gejala/tambahGejala') ?>" class="btn btn-primary">Tambah Data</a>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Gejala</th>
                                    <th>Nama Gejala</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($gejala as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode_gejala'] ?></td>
                                    <td><?= $row['gejala'] ?></td>
                                    <td>
                                        <a href="<?= base_url('Gejala/ubahGejala/' . $row['kode_gejala']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="#" onclick="delete_data('<?= $row['kode_gejala'] ?>', 'Gejala/hapusGejala')" role="button" class="btn btn-danger">Delete</a>
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