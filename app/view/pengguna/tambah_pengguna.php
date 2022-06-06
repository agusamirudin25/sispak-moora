<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tambah Pengguna</h6>
                    <form class="forms-sample" autocomplete="off" id="formTambah">
                        <div class="form-group row">
                            <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Alamat Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe" class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-9">
                                <select name="tipe" id="tipe" required class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach($role as $row) : ?>
                                        <option value="<?= $row['id_role'] ?>"><?= $row['role'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
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
                url: '<?= url(); ?>Pengguna/prosesTambahPengguna',
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