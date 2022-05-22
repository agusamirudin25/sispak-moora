<!DOCTYPE html>
<html>

<head>
    <title>Sistem Pakar MOORA</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= asset('assets/images/favicon.png') ?>">

    <!-- plugin css -->
    <link href="<?= asset('assets/fonts/feather-font/css/iconfont.css') ?>" rel="stylesheet" />
    <link href="<?= asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') ?>" rel="stylesheet" />
    <!-- end plugin css -->

    <!-- common css -->
    <link href="<?= asset('assets/css/app.css') ?>" rel="stylesheet" />
    <link href="<?= asset('assets/plugins/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" />
    <!-- end common css -->

</head>

<body data-base-url="<?= url('/') ?>">

    <script src="<?= asset('assets/js/spinner.js') ?>"></script>

    <div class="main-wrapper" id="app">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-10 col-xl-8 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6 pr-md-0">
                                    <div class="auth-left-wrapper" style="background-image: url(assets/images/login.png)">

                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="<?= url('/') ?>" class="noble-ui-logo d-block mb-2">SISPAK MOORA</a>
                                        <h5 class="text-muted font-weight-normal mb-4">Selamat Datang, Silakan masukan email dan password</h5>
                                        <form class="forms-sample" id="formLogin" autocomplete="off">
                                            <div class="form-group">
                                                <label for="email">Alamat email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" autocomplete="password anda" placeholder="Password">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">Login</button>
                                            </div>
                                            <!-- <a href="<?= url('/auth/register') ?>" class="d-block mt-3 text-muted">Not a user? Sign up</a> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- base js -->
    <script src="<?= asset('assets/js/app.js') ?>"></script>
    <script src="<?= asset('assets/plugins/feather-icons/feather.min.js') ?>"></script>
    <!-- end base js -->

    <!-- common js -->
    <script src="<?= asset('assets/js/template.js') ?>"></script>
    <script src="<?= asset('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= asset('assets/js/helpers.js') ?>"></script>
    <!-- end common js -->

    <script>
        const BASE_URL = "<?= base_url() ?>";
        $('#formLogin').submit(function(e) {
            e.preventDefault();
            let user = $('#email').val();
            let pass = $('#password').val();
            if (user.length == 0) {
                error_alert('Error', 'Email tidak boleh kosong')
                $("#email").focus();
                return false;
            }
            if (pass.length == 0) {
                $("#password").focus();
                error_alert('Error', 'Password tidak boleh kosong')
                return false;
            }
            $.ajax({
                url: '<?= url() ?>Auth/cek_login',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                dataType: "json",
                success: function(data) {
                    if (data.login_status == 1) {
                        success_alert("Berhasil", data.msg, BASE_URL + data.page);
                    } else {
                        error_alert("Gagal", data.msg);
                    }
                }
            });
        });
    </script>

</body>

</html>