<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ubah Pengetahuan</h6>
                    <form class="forms-sample" autocomplete="off" id="formUbah">
                        <input type="hidden" name="id" value="<?= $pengetahuan->id ?>">
                        <div class="form-group row">
                            <label for="penyakit" class="col-sm-3 col-form-label">Penyakit</label>
                            <div class="col-sm-9">
                                <select name="penyakit" id="penyakit" required class="form-control">
                                    <option value="">-Pilih Penyakit-</option>
                                    <?php foreach($penyakit as $row) : ?>
                                    <option <?= $pengetahuan->kode_penyakit == $row['kode_penyakit'] ? 'selected' : null ?> value="<?= $row['kode_penyakit'] ?>"><?= $row['penyakit'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gejala" class="col-sm-3 col-form-label">Gejala</label>
                            <div class="col-sm-9">
                                <select name="gejala" id="gejala" required class="form-control">
                                    <option value="">-Pilih Gejala-</option>
                                    <?php foreach($gejala as $row) : ?>
                                    <option <?= $pengetahuan->kode_gejala == $row['kode_gejala'] ? 'selected' : null ?> value="<?= $row['kode_gejala'] ?>"><?= $row['gejala'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="javascript:history.back()" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?= asset('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= asset('assets/js/helpers.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#formUbah').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                url: '<?= url(); ?>Pengetahuan/prosesUbahPengetahuan',
                type: "post",
                data: data,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                        }).then(function() {
                            window.location = "<?= url() ?>" + response.page;
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                        })
                    }
                }
            });
        });
    });
</script>