<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Verifikasi Data Penyakit</h6>
                    <div class="table-responsive mt-4">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penyakit</th>
                                    <th>Solusi</th>
                                    <th>Bobot</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                 foreach($penyakit as $row): 
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
                                    <td><?= $no++ ?></td>
                                    <td><?= "({$row['kode_penyakit']}) {$row['penyakit']}" ?></td>
                                    <td style="white-space:normal;"><?= $row['solusi'] ?? '-' ?></td>
                                    <td><?= $row['bobot'] ?? '-' ?></td>
                                    <td><?= $statusVerif ?></td>
                                    <td>
                                        <a href="<?= base_url('Penyakit/verifikasiPenyakit/' . $row['kode_penyakit']) ?>" class="btn btn-warning text-white"><?= $row['status'] == 1 ? 'Edit' : 'Verifikasi' ?></a>
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