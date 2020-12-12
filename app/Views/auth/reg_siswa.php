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
                <div class="col-xl-8 col-10 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                <img src="<?= base_url('vuexy/app-assets/images/pages/register.jpg'); ?>" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 p-2">
                                    <div class="card-header pt-50">
                                        <div class="card-title">
                                            <h4 class="mb-0">Pengaktifan Akun Siswa</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">Isi form berikut.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-0">
                                            <form id="form-auth-siswa">
                                                <?= csrf_field() ?>
                                                <input type="hidden" id="cek-akun" name="cek-akun" value="not-validate">
                                                <input type="hidden" id="nin" name="nin">
                                                <div id="cek">
                                                    <div class="form-label-group mt-1">
                                                        <input type="number" id="nomor_induk" name="nomor_induk" class="form-control" placeholder="Nomor Induk" required>
                                                        <label for="nomor_induk">Nomor Induk</label>
                                                    </div>
                                                    <label for="kelas">Kelas</label>
                                                    <select class="form-control select" id="kelas" name="kelas" required style="width:100%;">
                                                        <option value="">Pilih Salah Satu...</option>
                                                        <?php foreach ($kelas as $k) : ?>
                                                            <option value="<?= $k->msid; ?>"><?= $k->msid; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <br />
                                                    <br />
                                                </div>
                                                <div id="cek-done">

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" required name="setuju">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class=""> Saya setuju mengaktifkan akun.</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('auth'); ?>" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                <button type="submit" id="btn-submit" class="btn btn-primary float-right btn-inline mb-50">Cek Akun</a>
                                            </form>
                                            <script>
                                                $(document).ready(function() {
                                                    $(".select").select2({
                                                        allowClear: true,
                                                        placeholder: "Pilih Salah Satu..",
                                                    });

                                                    $('#form-auth-siswa').submit(function(e) {
                                                        e.preventDefault();
                                                        var data = $(this).serialize(),
                                                            validasi = $('#cek-akun').val(),
                                                            htmlLama = $('#btn-submit').html();
                                                        $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>  Loading');
                                                        $('#form-auth-siswa input').attr('disabled', true);
                                                        $('#form-auth-siswa button').attr('disabled', true);
                                                        $('#form-auth-siswa select').attr('disabled', true);
                                                        if (validasi == 'not-validate') {
                                                            $.ajax({
                                                                url: "/auth/validasi",
                                                                data: data,
                                                                type: "post",
                                                                success: function(resp) {
                                                                    if (resp == 'validate') {
                                                                        $('#cek-akun').val(resp);
                                                                        $('#nin').val($('#nomor_induk').val());
                                                                        $('#nomor_induk').prop('disabled', true);
                                                                        $('#kelas').prop('disabled', true);
                                                                        $('#cek-done').append(`<div class="form-label-group">
                                                                                        <input type="text" id="username" name="username" required class="form-control" placeholder="Username">
                                                                                        <label for="username">Username</label>
                                                                                    </div>
                                                                                    <div class="form-label-group">
                                                                                        <input type="email" id="email" name="email" required class="form-control" placeholder="Email">
                                                                                        <label for="email">Email</label>
                                                                                    </div>
                                                                                    <div class="form-label-group">
                                                                                        <input type="password" id="password" name="password" required class="form-control" placeholder="Password">
                                                                                        <label for="password">Password</label>
                                                                                    </div>
                                                                                    <div class="form-label-group">
                                                                                        <input type="password" id="inputConfPassword" required class="form-control" placeholder="Confirm Password">
                                                                                        <label for="inputConfPassword">Confirm Password</label>
                                                                                    </div>`);
                                                                    } else if (resp == 'activated') {
                                                                        Swal.fire({
                                                                            title: 'Data Siswa Telah Terdaftar',
                                                                            html: 'Klik <strong><b><a href="/auth/forgot">disini</a></b></strong> jika anda lupa katasandi',
                                                                            type: 'warning',
                                                                        });
                                                                    } else {
                                                                        Swal.fire({
                                                                            title: 'Data Siswa Tidak Ditemukan!',
                                                                            html: 'Harap menghubungi bagian Hubungan Industri (HUBIN).',
                                                                            type: 'warning',
                                                                        });
                                                                    }
                                                                },
                                                                error: function(resp) {
                                                                    console.log(resp);
                                                                }
                                                            });
                                                        } else if (validasi == 'validate') {
                                                          // console.log(data);
                                                            $.ajax({
                                                                url: "/auth/aktivasi",
                                                                data: data,
                                                                type: "post",
                                                                success: function(resp) {
                                                                    console.log(resp);
                                                                }
                                                            });
                                                        }
                                                        $('#btn-submit').html(htmlLama);
                                                        $('#form-auth-siswa input').attr('disabled', false);
                                                        $('#form-auth-siswa button').attr('disabled', false);
                                                        $('#form-auth-siswa select').attr('disabled', false);
                                                    })
                                                })
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
