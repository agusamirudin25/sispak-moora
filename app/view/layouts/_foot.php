<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
    <p class="text-muted text-center text-md-left">Copyright © <?= date('Y') ?> Sistem Pakar diagnosis penyakit masa kehamilan</p>
</footer>
</div>
</div>

<!-- base js -->
<script src="<?= base_url('') ?>assets/js/app.js"></script>
<script src="<?= base_url('') ?>assets/plugins/feather-icons/feather.min.js"></script>
<script src="<?= base_url('') ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('') ?>assets/plugins/datatables-net/jquery.dataTables.js"></script>
<script src="<?= base_url('') ?>assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js"></script>
<!-- end base js -->

<!-- common js -->
<script src="<?= base_url('') ?>assets/js/template.js"></script>

<!-- end common js -->
<script>
    $(function() {
        'use strict';

        $(function() {
            $('#table').DataTable();
        });

        $('#notificationDropdown').click(function(e) {
            $('.nav-notifications .dropdown-menu').toggleClass('show');
        });
        setInterval(() => {
            setNotif()
        }, 1000);
    });

    function delete_data(id, ajax) {
         Swal.fire({
             title: "Sistem Pakar Diagnosis Penyakit Kehamilan",
             text: "Apakah Anda Yakin menghapus data ini ?",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Hapus'
         }).then((result) => {
             if (result.value) {
                 var string = 'id=' + id;
                 $.ajax({
                     type: 'POST',
                     url: "<?= url() ?>" + ajax,
                     data: string,
                     cache: false,
                     dataType: 'json',
                     success: function(data) {
                         if (data.status == 1) {
                             Swal.fire(
                                 "Sistem Pakar Diagnosis Penyakit Kehamilan",
                                 'Berhasil dihapus.',
                                 'success'
                             ).then(function() {
                                 window.location = "<?= base_url() ?>" + data.page;
                             })
                         }
                     }
                 });

             }
         })
    }

    function verif_data(id, ajax, message, status) {
         Swal.fire({
             title: "Sistem Pakar",
             text: message,
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yakin'
         }).then((result) => {
             if (result.value) {
                 var string = 'id=' + id + '&status=' + status;
                 $.ajax({
                     type: 'POST',
                     url: "<?= url() ?>" + ajax,
                     data: string,
                     cache: false,
                     dataType: 'json',
                     success: function(data) {
                         if (data.status == 1) {
                             Swal.fire(
                                 "Sistem Pakar",
                                 'Berhasil Verifikasi.',
                                 'success'
                             ).then(function() {
                                 window.location = "<?= base_url() ?>" + data.page;
                             })
                         }
                     }
                 });

             }
         })
     }

    function alertConfirm(route, message = null)
    {
        if(message == null || message == '' || !message){
            Swal.fire({
                title: "Sistem Pakar",
                text: `Apakah Anda yakin mengubah status ?`,
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonText: `Yakin`,
                denyButtonText: `Tidak`,
            }).then((result) => {
                if (result.value) {
                    location.href = route;
                } else if (result.isDenied) {
                    return false;
                }
            })
        }else{
            Swal.fire({
                text: message,
                title: "Sistem Pakar",
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonText: `Yakin`,
            }).then((result) => {
                if (result.value) {
                    location.href = route;
                } else if (result.isDenied) {
                    return false;
                }
            })
        }
    }

    const setNotif = () => {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Dashboard/getNotif') ?>",
            data: '',
            cache: false,
            dataType: 'json',
            success: function(data) {
                $('#notif-header').html(`${data.total} Konsultasi`)
                $('#notif-menu').html(`${data.total}`)
            }
        });
    }
</script>

</body>

</html>