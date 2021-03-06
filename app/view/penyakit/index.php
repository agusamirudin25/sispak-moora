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
                                    <th>Kode Penyakit</th>
                                    <th>Nama Penyakit</th>
                                    <th>Solusi</th>
                                    <th>Bobot</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($penyakit as $row):
                                  $statusVerif = ""; 
                                  if($row['status'] == 0){
                                      $statusVerif = '<span class="badge badge-info">Belum verifikasi</span>';
                                  }elseif($row['status'] == 1){
                                      $statusVerif = '<span class="badge badge-success">Terverifikasi</span>';
                                  }else{
                                      $statusVerif = '<span class="badge badge-danger">Ditolak</span>';
                                  }           
                                ?>
                                <tr>
                                    <td><?= $row['kode_penyakit'] ?></td>
                                    <td style="white-space:normal;"><?= $row['penyakit'] ?></td>
                                    <td style="white-space:normal;text-align:justify;"><?= $row['solusi'] ?? '-' ?></td>
                                    <td><?= $row['bobot'] ?? '-' ?></td>
                                    <td><?= $statusVerif ?></td>
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