<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Profile</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-akun" data-toggle="pill" href="#account-vertical-akun" aria-expanded="true">
                                    <i class="feather icon-user mr-50 font-medium-3"></i>
                                    Akun
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock mr-50 font-medium-3"></i>
                                    Ubah Katasandi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                    <i class="feather icon-info mr-50 font-medium-3"></i>
                                    Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                    <i class="feather icon-camera mr-50 font-medium-3"></i>
                                    Media Sosial
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-akun" aria-labelledby="account-pill-akun" aria-expanded="true">
                                            <div class="media">
                                                <a href="javascript: void(0);">
                                                    <img src="<?= base_url('vuexy/app-assets/images/portrait/small/avatar-s-12.jpg'); ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                </a>
                                                <div class="media-body mt-75">
                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Ubah foto</label>
                                                        <input type="file" id="account-upload" hidden>
                                                        <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                                    </div>
                                                    <p class="text-muted ml-75 mt-50"><small>Tipe yang diizinkan <b>JPG</b>, <b>JPEG</b>, <b>GIF</b> atau <b>PNG</b>. Dengan maksimal ukuran file <b>800 kB</b>.</small></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <form novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-username">Nama Pengguna</label>
                                                                <input type="text" class="form-control" id="account-username" placeholder="Username" value="hermione007" required data-validation-required-message="* Nama pengguna wajib diisi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">Nama Lengkap</label>
                                                                <input type="text" class="form-control" id="account-name" placeholder="Name" value="Hermione Granger" required data-validation-required-message="* Nama lengkap wajib diisi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-e-mail">E-mail</label>
                                                                <input type="email" class="form-control" id="account-e-mail" placeholder="Email" value="granger007@hogward.com" required data-validation-email-message="Format email tidak valid" data-validation-required-message="* Email wajib diisi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if (!isset($email)) : ?>
                                                        <div class="col-12">
                                                            <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <p class="mb-0">
                                                                    Email Anda belum dikonfirmasi. Silakan periksa kotak masuk Anda.
                                                                </p>
                                                                <a href="javascript: void(0);">Kirim kembali email konfirmasi</a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-company">Perusahaan</label>
                                                            <select class="form-control" id="basicSelect" data-validation-required-message="* Perusahaan wajib diisi" required>
                                                                <option value="">Pilih Salah Satu...</option>
                                                                <option>IT</option>
                                                                <option>Blade Runner</option>
                                                                <option>Thor Ragnarok</option>
                                                            </select>
                                                            <p class="help-block"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan Perubahan</button>
                                                        <button type="reset" class="btn btn-outline-warning">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="katasandi-lama">Katasandi Lama</label>
                                                                <input type="password" class="form-control" name="katasandi-lama" id="katasandi-lama" required placeholder="Katasandi Lama" data-validation-required-message="Katasandi lama wajib diisi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="katasandi-baru">Katasandi Baru</label>
                                                                <input type="password" name="katasandi-baru" id="katasandi-baru" class="form-control" placeholder="Katasandi Baru" required data-validation-required-message="Katasandi baru wajib diisi" minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="katasandi-baru2">Ulangi Katasandi</label>
                                                                <input type="password" name="katasandi-baru2" class="form-control" required id="katasandi-baru2" data-validation-match-match="katasandi-baru" placeholder="Ulangi Kata Sandi" data-validation-required-message="Harap mengulangi katasandi" minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan Perubahan</button>
                                                        <button type="reset" class="btn btn-outline-warning">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                            <form novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="accountTextarea">Bio</label>
                                                            <textarea class="form-control" id="accountTextarea" rows="3" placeholder="Your Bio data here..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-birth-date">Birth date</label>
                                                                <input type="text" class="form-control birthdate-picker" required placeholder="Birth date" id="account-birth-date" data-validation-required-message="This birthdate field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="accountSelect">Country</label>
                                                            <select class="form-control" id="accountSelect">
                                                                <option>USA</option>
                                                                <option>India</option>
                                                                <option>Canada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="languageselect2">Languages</label>
                                                            <select class="form-control" id="languageselect2" multiple="multiple">
                                                                <option value="English" selected>English</option>
                                                                <option value="Spanish">Spanish</option>
                                                                <option value="French">French</option>
                                                                <option value="Russian">Russian</option>
                                                                <option value="German">German</option>
                                                                <option value="Arabic" selected>Arabic</option>
                                                                <option value="Sanskrit">Sanskrit</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-phone">Phone</label>
                                                                <input type="text" class="form-control" id="account-phone" required placeholder="Phone number" value="(+656) 254 2568" data-validation-required-message="This phone number field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-website">Website</label>
                                                            <input type="text" class="form-control" id="account-website" placeholder="Website address">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="musicselect2">Favourite Music</label>
                                                            <select class="form-control" id="musicselect2" multiple="multiple">
                                                                <option value="Rock">Rock</option>
                                                                <option value="Jazz" selected>Jazz</option>
                                                                <option value="Disco">Disco</option>
                                                                <option value="Pop">Pop</option>
                                                                <option value="Techno">Techno</option>
                                                                <option value="Folk" selected>Folk</option>
                                                                <option value="Hip hop">Hip hop</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="moviesselect2">Favourite movies</label>
                                                            <select class="form-control" id="moviesselect2" multiple="multiple">
                                                                <option value="The Dark Knight" selected>The Dark Knight
                                                                </option>
                                                                <option value="Harry Potter" selected>Harry Potter</option>
                                                                <option value="Airplane!">Airplane!</option>
                                                                <option value="Perl Harbour">Perl Harbour</option>
                                                                <option value="Spider Man">Spider Man</option>
                                                                <option value="Iron Man" selected>Iron Man</option>
                                                                <option value="Avatar">Avatar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan Perubahan</button>
                                                        <button type="reset" class="btn btn-outline-warning">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                            <form>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-twitter">Twitter <i class="fa fa-twitter" style="color:#1A91DA;"></i></label>
                                                            <input type="text" id="account-twitter" class="form-control" placeholder="Tambah tautan" value="https://www.twitter.com">
                                                            <?php if (!isset($twitter)) : ?>
                                                                <div class="help-block">
                                                                    <ul role="alert">
                                                                        <li>Contoh: <a href="https://twitter.com/mandalaschool" target="_blank">https://twitter.com/mandalaschool</a></li>
                                                                    </ul>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-facebook">Facebook <i class="fa fa-facebook" style="color:#166FE5;"></i></label>
                                                            <input type="text" id="account-facebook" class="form-control" placeholder="Tambah tautan">
                                                            <?php if (!isset($facebook)) : ?>
                                                                <div class="help-block">
                                                                    <ul role="alert">
                                                                        <li>Contoh: <a href="https://www.facebook.com/yayasan.mandalahayu" target="_blank">https://www.facebook.com/yayasan.mandalahayu</a></li>
                                                                    </ul>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-linkedin">LinkedIn <i class="fa fa-linkedin-square" style="color:#0070B1;"></i></label>
                                                            <input type="text" id="account-linkedin" class="form-control" placeholder="Tambah tautan" value="https://www.linkedin.com">
                                                            <?php if (!isset($linkedin)) : ?>
                                                                <div class="help-block">
                                                                    <ul role="alert">
                                                                        <li>Contoh: <a href="https://www.linkedin.com/in/rizqi-ubaidillah-43989a1b7/" target="_blank">https://www.linkedin.com/in/rizqi-ubaidillah-43989a1b7/</a></li>
                                                                    </ul>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-instagram">Instagram <i class="fa fa-instagram" style="color:#E9622E;"></i></label>
                                                            <input type="text" id="account-instagram" class="form-control" placeholder="Tambah tautan">
                                                            <?php if (!isset($linkedin)) : ?>
                                                                <div class="help-block">
                                                                    <ul role="alert">
                                                                        <li>Contoh: <a href="https://www.instagram.com/osmanka1/" target="_blank">https://www.instagram.com/osmanka1/</a></li>
                                                                    </ul>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan Perubahan</button>
                                                        <button type="reset" class="btn btn-outline-warning">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>