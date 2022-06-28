<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ubah Penyakit</h6>
                    <form class="forms-sample" autocomplete="off" id="formUbah">
                        <div class="form-group row">
                            <label for="kode_penyakit" class="col-sm-3 col-form-label">Kode Penyakit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kode_penyakit" readonly value="<?= $penyakit->kode_penyakit ?>" placeholder="Kode Penyakit" name="kode_penyakit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penyakit" class="col-sm-3 col-form-label">Nama Penyakit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-uppercase" id="penyakit" readonly value="<?= $penyakit->penyakit ?>" placeholder="Penyakit" name="penyakit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="solusi" class="col-sm-3 col-form-label">Solusi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="<?= $penyakit->solusi ?>" id="solusi" placeholder="Solusi" name="solusi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bobot" class="col-sm-3 col-form-label">Bobot</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bobot" value="<?= $penyakit->bobot ?>" placeholder="bobot" name="bobot" required>
                                <span class="text-warning">Contoh : 0.06 (tidak boleh dari 1)</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bobot" class="col-sm-3 col-form-label">Verifikasi</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="1">Terverifikasi</option>
                                    <option value="-1">Tolak Vefifikasi</option>
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
                url: '<?= url(); ?>Penyakit/prosesVerifPenyakit',
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