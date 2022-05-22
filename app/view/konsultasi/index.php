<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Konsultasi</h6>
                    <?php if (session_get('type') == 3) : ?>
                        <a href="<?= base_url('Konsultasi/tambahKonsultasi') ?>" class="btn btn-primary">Tambah Konsultasi</a>
                    <?php endif; ?>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <?php if (session_get('type') != 3) : ?>
                                        <th>Nama</th>
                                    <?php endif; ?>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($konsultasi as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['pertanyaan'] ?></td>
                                        <?php if (session_get('type') != 3) : ?>
                                            <td><?= $row['nama_lengkap'] ?></td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="<?= base_url('Konsultasi/detailKonsultasi/' . $row['id']) ?>" class="btn btn-warning">Lihat</a>
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