<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Diagnosis</h6>
                    <form action="" id="formDiagnosis" method="post">
                        <p>Silakan pilih Gejala berikut:</p>
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php foreach ($gejala as $row) : ?>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" onchange="countGejala()" class="form-check-input" name="gejala[]" value="<?= $row['kode_gejala'] ?>" id="gejala<?= $row['kode_gejala'] ?>">
                                            <?= $row['gejala'] ?>
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" id="tombol-diagnosis" disabled class="btn btn-success">Diagnosis</button>
                        </div>
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
        $('#formDiagnosis').submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '<?= base_url('diagnosis/prosesDiagnosis') ?>',
                type: 'POST',
                data: data,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.msg,
                        }).then(function() {
                            window.location.href = '<?= base_url('diagnosis/hasilDiagnosis') ?>';
                        })
                    } else {
                        alert(res.msg);
                    }
                }
            });
        });
    });

    function countGejala() {
        var gejala = $('input[name="gejala[]"]:checked').length;
        if(gejala > 1) {
            $('#tombol-diagnosis').removeAttr('disabled');
        }else{
            $('#tombol-diagnosis').attr('disabled', 'disabled');
        }
    }
</script>