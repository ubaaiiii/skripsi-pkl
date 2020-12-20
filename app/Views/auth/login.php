<?= $this->extend('auth/auth'); ?>

<?= $this->section('content'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="<?= base_url('vuexy/app-assets/images/pages/login.png'); ?>" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Login</h4>
                                        </div>
                                    </div>
                                    <?php if ($session->message) { ?>
                                        <script>
                                            alert('<?= $session->message; ?>');
                                        </script>
                                    <?php } ?>
                                    <p class="px-2">Selamat datang di website PKL Mandalahayu.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form id="form-login">
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" id="user-name" name="user-name" placeholder="Nama Pengguna / Username" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Nama Pengguna / Username</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="user-password" name="user-password" placeholder="Katasandi / Password" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Katasandi / Password</label>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                    </div>
                                                    <div class="text-right"><a href="<?= base_url('auth/forgot'); ?>" class="card-link">Lupa Katasandi?</a></div>
                                                </div>
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Daftar
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                        <a class="dropdown-item" href="<?= base_url('auth/siswa'); ?>">Sebagai Siswa</a>
                                                        <a class="dropdown-item" href="<?= base_url('auth/pembimbing'); ?>">Sebagai Pembimbing</a>
                                                    </div>
                                                </div>
                                                <button id="btn-submit" type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                            </form>
                                            <script>
                                                $(document).ready(function() {
                                                    $('#form-login').submit(function(e) {
                                                        e.preventDefault();
                                                        var data = $(this).serialize();
                                                        $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>  Loading');
                                                        $('#form-login input').attr('disabled', true);
                                                        $('#form-login button').attr('disabled', true);
                                                        $.ajax({
                                                            url: "../auth/login",
                                                            data: data,
                                                            type: "post",
                                                            success: function(resp) {
                                                                resp = JSON.parse(resp);
                                                                if (resp.result == 'success') {
                                                                    $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>  Redirecting...');
                                                                    Swal.fire({
                                                                        title: 'Berhasil!',
                                                                        html: resp.message,
                                                                        type: resp.result,
                                                                        timer: 2000,
                                                                    });
                                                                    setTimeout(function() {
                                                                        window.location = "<?= base_url(); ?>/dashboard";
                                                                    }, 500);
                                                                } else {
                                                                    $('#btn-submit').html('Login');
                                                                    $('#form-login input').attr('disabled', false);
                                                                    $('#form-login button').attr('disabled', false);
                                                                    Swal.fire({
                                                                        title: 'Gagal!',
                                                                        html: resp.message,
                                                                        type: resp.result,
                                                                        timer: 2000,
                                                                    });
                                                                }
                                                            },
                                                            error: function(resp) {
                                                                Swal.fire({
                                                                    title: 'Error!',
                                                                    html: resp,
                                                                    type: 'error',
                                                                });
                                                            }
                                                        })
                                                    })
                                                })
                                            </script>
                                        </div>
                                    </div>
                                    <div class="login-footer mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>