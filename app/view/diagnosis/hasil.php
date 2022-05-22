<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Hasil Diagnosis</h6>
                    <h6>Gejala</h6>
                    <hr>
                    <table class="nowrap table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Bobot Kriteria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($gejala as $Key => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['gejala'] ?></td>
                                    <td><?= $value['bobot'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
                    <hr>
                    <h6>Penyakit</h6>
                    <hr>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><?= $penyakit->penyakit ?></h4>
                        <hr>
                        <p>Solusi:</p>
                        <p><?= $penyakit->solusi ?></p>
                        <p class="mb-0">Nilai Bobot: <?= $penyakit->bobot ?></p>
                    </div>
                    <hr>
                    <hr>
                    <h6>Perhitungan MOORA</h6>
                    <hr>
                    <p>1. Menentukan Normalisasi</p>
                    <p><?= $keterangan_normalisasi_before ?></p>
                    <p> = <?= $keterangan_normalisasi_after ?></p>
                    <p> = &radic; <?= $total_bobot_gejala ?></p>
                    <p> = <?= sqrt($total_bobot_gejala) ?></p>
                    <hr>
                    <p>2. Dibagi dengan bobot kriteria</p>
                    <?php foreach($keterangan_dibagi_bobot_kriteria as $key => $row) : ?>
                        <p><?= $row ?></p>
                    <?php endforeach; ?>
                    <hr>
                    <p>3. Menentukan Normalisasi nilai keputusan dikali dengan bobot Penyakit</p>
                    <?php foreach($keterangan_dikali_bobot_alternatif as $key => $row) : ?>
                        <p><?= $row ?></p>
                    <?php endforeach; ?>
                    <hr>
                    <p>4. Hasil MOORA</p>
                    <p><?= $hasil_moora ?></p>
                    <h5> = <?= number_format($hasil_moora, 4, '.', '') ?></h5>
                    <hr>
                    <hr>
                    <h6>Perankingan MOORA</h6>
                    <hr>
                    <table class="nowrap table">
                        <thead>
                            <tr>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>Peringkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($ranking_moora as $Key => $value) : ?>
                                <tr class="<?= $penyakit->kode_penyakit == $value['kode_penyakit'] ? 'bg-danger text-white text-bold' : '' ?>">
                                    <td><?= $value['kode_penyakit'] ?></td>
                                    <td><?= $value['penyakit'] ?></td>
                                    <td><?= $no++ ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>