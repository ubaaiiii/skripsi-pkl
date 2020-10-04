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
                                    <div class="card-header pt-50 pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Validasi Akun</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">Isi form berikut untuk membuat akun.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-0">
                                            <form id="form-auth-siswa">
                                                <?= csrf_field() ?>
                                                <input type="hidden" id="cek-akun" name="cek-akun" value="not-validate">
                                                <div id="cek">
                                                    <div class="form-label-group">
                                                        <input type="number" id="nomor_induk" name="nomor_induk" class="form-control" placeholder="Nomor Induk" required>
                                                        <label for="nomor_induk">Nomor Induk</label>
                                                    </div>
                                                    <label for="perusahaan">Perusahaan</label>
                                                    <select class="form-control" id="perusahaan" name="perusahaan" required style="width:100%;">
                                                        <option value="">Pilih Salah Satu...</option>
                                                        <?php foreach ($perusahaan as $p) : ?>
                                                            <option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <br />
                                                    <br />
                                                </div>
                                                <div id="cek-done" hidden="hidden">
                                                    <div class="form-label-group">
                                                        <input type="text" id="username" class="form-control" placeholder="Username">
                                                        <label for="username">Username</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email">
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password">
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password">
                                                        <label for="inputConfPassword">Confirm Password</label>
                                                    </div>
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
                                                                <span class=""> Saya setuju mendaftar akun.</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('auth'); ?>" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                <button type="submit" id="btn-cek" class="btn btn-primary float-right btn-inline mb-50">Cek Akun</a>
                                            </form>
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