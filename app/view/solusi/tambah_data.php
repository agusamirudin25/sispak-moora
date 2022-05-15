<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tambah Solusi</h6>
                    <form class="forms-sample" autocomplete="off" id="formTambah">
                        <div class="form-group row">
                            <label for="kode_solusi" class="col-sm-3 col-form-label">Kode Solusi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kode_solusi" readonly value="<?= $kode_otomatis ?>" placeholder="Kode Solusi" name="kode_solusi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="solusi" class="col-sm-3 col-form-label">Solusi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="solusi" placeholder="solusi" name="solusi" required>
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
        $('#formTambah').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                url: '<?= url(); ?>Solusi/prosesTambahSolusi',
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