<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Pengguna</h6>
                    <a href="<?= base_url('Pengguna/tambahPengguna') ?>" class="btn btn-primary">Tambah Data</a>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Tipe</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($pengguna as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nama_lengkap'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['role'] ?></td>
                                    <td>
                                        <a href="<?= base_url('Pengguna/ubahPengguna/' . $row['username']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="#" onclick="delete_data('<?= $row['username'] ?>', 'Pengguna/hapusPengguna')" role="button" class="btn btn-danger">Delete</a>
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