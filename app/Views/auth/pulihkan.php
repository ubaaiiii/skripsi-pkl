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
                                            <h4 class="mb-0">Reset Katasandi</h4>
                                        </div>
                                    </div>
                                    <p class="px-2 mb-0">
                                        Hai, <?= $data->nama; ?><br>
                                        Silahkan masukkan katasandi baru.
                                    </p>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form id="form-password-baru" novalidate autocomplete="off">
                                                <?= csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="katasandi_baru">Katasandi Baru</label>
                                                                <input type="password" name="katasandi_baru" id="katasandi_baru" class="form-control" placeholder="Katasandi Baru" required data-validation-required-message="Katasandi baru wajib diisi" data-validation-minlength-message="Setidaknya mengandung 6 karakter" minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="katasandi_baru2">Ulangi Katasandi</label>
                                                                <input type="password" name="katasandi_baru2" class="form-control" required id="katasandi_baru2" data-validation-match-match="katasandi_baru" placeholder="Ulangi Kata Sandi" data-validation-required-message="Harap mengulangi katasandi" minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button id="btn-submit" type="submit" class="btn btn-primary btn-block px-75">Simpan</button>
                                                </div>
                                            </form>
                                            <script>
                                                $(document).ready(function() {
                                                    $('#form-password-baru').submit(function(e) {
                                                        e.preventDefault;
                                                        var data = $(this).serialize();
                                                        $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>  Loading');
                                                        $.ajax({
                                                            url: "/auth/reset/<?= $login->token; ?>",
                                                            data: data,
                                                            type: "post",
                                                            success: function(resp) {
                                                                if (resp == 'berhasil') {
                                                                    $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>  Redirecting...');
                                                                    Swal.fire({
                                                                        title: 'Berhasil!',
                                                                        html: resp.message,
                                                                        type: resp.result,
                                                                        timer: 2000,
                                                                    });
                                                                    setTimeout(function() {
                                                                        window.location = "<?= base_url(); ?>/auth";
                                                                    }, 500);
                                                                } else {
                                                                    Swal.fire({
                                                                        title: 'Gagal!',
                                                                        html: resp.message,
                                                                        type: resp.result,
                                                                        timer: 2000,
                                                                    });
                                                                    setTimeout(function() {
                                                                        window.location = "<?= base_url(); ?>/auth";
                                                                    }, 500);
                                                                }
                                                            }
                                                        })

                                                        return false;
                                                    })
                                                });
                                            </script>
                                        </div>
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
<?= $this->endSection(); ?>