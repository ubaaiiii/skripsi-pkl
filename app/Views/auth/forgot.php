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
                <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                                <img src="<?= base_url('vuexy/app-assets/images/pages/forgot-password.png'); ?>" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2 py-1">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Pulihkan Katasandi</h4>
                                        </div>
                                    </div>
                                    <p class="px-2 mb-0">Harap masukkan email yang terdaftar, akan kami kirim link ubah katasandi.</p>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form id="form-forgot" novalidate>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" data-validation-email-message="Alamat email tidak valid" data-validation-required-message="Email wajib diisi" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="float-md-left d-block mb-1">
                                                    <a href="<?= base_url('auth'); ?>" class="btn btn-outline-primary btn-block px-75">Kembali ke Login</a>
                                                </div>
                                                <div class="float-md-right d-block mb-1">
                                                    <button type="submit" id="btn-submit" class="btn btn-primary btn-block px-75">Kirim Email Pemulihan</button>
                                                </div>
                                            </form>
                                            <script>
                                                $(document).ready(function() {
                                                    $('#form-forgot').submit(function(e) {
                                                        e.preventDefault();
                                                        var data = $(this).serialize();
                                                        $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i> Mengecek Email...');
                                                        $('#form-forgot input').attr('disabled', true);
                                                        $('#form-forgot button').attr('disabled', true);
                                                        $.ajax({
                                                            url: "../auth/cekemail",
                                                            data: data,
                                                            type: "post",
                                                            success: function(resp) {
                                                                resp = JSON.parse(resp);
                                                                if (resp.result == 'success') {
                                                                    $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i> Redirecting...');
                                                                    Swal.fire({
                                                                        title: 'Berhasil!',
                                                                        html: resp.message,
                                                                        type: resp.result,
                                                                        timer: 2000,
                                                                    }).then(function() {
                                                                        window.location = "<?= base_url(); ?>/auth";
                                                                    });
                                                                } else {
                                                                    $('#btn-submit').html('Kirim Email Pemulihan');
                                                                    $('#form-forgot input').attr('disabled', false);
                                                                    $('#form-forgot button').attr('disabled', false);
                                                                    Swal.fire({
                                                                        title: 'Gagal!',
                                                                        html: resp.message,
                                                                        type: resp.result,
                                                                        timer: 2000,
                                                                    });
                                                                }
                                                            }
                                                        });
                                                        return false;
                                                    });
                                                });
                                            </script>
                                        </div>
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