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
                                <a class="nav-link d-flex py-75 active" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="true">
                                    <i class="feather icon-user mr-50 font-medium-3"></i>
                                    Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock mr-50 font-medium-3"></i>
                                    Ubah Katasandi
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
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-info" aria-labelledby="account-pill-info" aria-expanded="true">
                                            <form novalidate id="form-info">
                                                <div class="media">
                                                    <a href="javascript: void(0);" data-toggle="popover" data-html="true" data-placement="left" data-trigger="hover" data-content="<img width='200px' src='/images/users/<?= $data->foto; ?>' /><?= ($session->user_level == 'Siswa') ? ("<br><h5 class='text-center " . explode(",", $data->stats)[1] . "'>" . explode(",", $data->stats)[0] . "</h5>") : (''); ?>">
                                                        <img src="<?= base_url('images/users') . "/" . $data->foto; ?>" style="object-fit: cover; object-position: 100% 0;" class="rounded mr-75 <?= ($session->user_level == 'Siswa') ? ('border-3 border-' . explode(",", $data->stats)[1]) : (''); ?>" alt="profile image" height="64" width="64">
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
                                                <div class="row">
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group form-group mt-2 position-relative has-icon-left">
                                                            <input type="text" class="form-control" id="user-name" name="user-name" placeholder="Nama Pengguna" d-lama="<?= $session->user_name; ?>" value="<?= $session->user_name; ?>" required data-validation-required-message="* Nama pengguna wajib diisi">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                            <label for="user-name">Nama Pengguna</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" id="user-nama" name="user-nama" placeholder="Name" d-lama="<?= $data->nama; ?>" value="<?= $data->nama; ?>" required data-validation-required-message="* Nama lengkap wajib diisi">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-id-card-o"></i>
                                                            </div>
                                                            <label for="user-nama">Nama Lengkap</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                            <input type="email" class="form-control" id="user-email" name="user-email" placeholder="Email" d-lama="<?= $data->email; ?>" value="<?= $data->email; ?>" required data-validation-email-message="Format email tidak valid" data-validation-required-message="* Email wajib diisi">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-mail"></i>
                                                            </div>
                                                            <label for="user-email">E-mail</label>
                                                        </fieldset>
                                                    </div>
                                                    <?php
                                                    switch ($session->user_level) {
                                                        case ('Admin'):
                                                    ?>
                                                            <div class="col-12">
                                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                                    <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" d-lama="<?= $data->jabatan; ?>" value="<?= $data->jabatan; ?>" data-validation-required-message="* Jabatan wajib diisi">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-mail"></i>
                                                                    </div>
                                                                    <label for="jabatan">Jabatan</label>
                                                                </fieldset>
                                                            </div>
                                                        <?php
                                                            break;
                                                        case ('Pembimbing'):
                                                        ?>
                                                            <div class="col-12">
                                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                                    <input type="text" class="form-control" id="perusahaan" placeholder="Perusahaan" d-lama="<?= $data->perusahaan; ?>" value="<?= $data->perusahaan; ?>" data-validation-required-message="* Perusahaan wajib diisi">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-mail"></i>
                                                                    </div>
                                                                    <label for="perusahaan">Perusahaan</label>
                                                                </fieldset>
                                                            </div>
                                                        <?php
                                                            break;
                                                        case ('Siswa'):
                                                        ?>
                                                            <div class="col-12">
                                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                                    <input type="text" class="form-control" id="kode-kelas" disabled placeholder="Kode Kelas" d-lama="<?= $data->kelas; ?>" value="<?= $data->kelas; ?>" data-validation-required-message="* Kode Kelas wajib diisi">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-users"></i>
                                                                    </div>
                                                                    <label for="kode-kelas">Kode Kelas</label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-12">
                                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                                    <input type="text" class="form-control" id="kode-kelas" disabled placeholder="Kode Kelas" d-lama="<?= explode(",", $data->klas)[0]; ?>" value="<?= explode(",", $data->klas)[0]; ?>" data-validation-required-message="* Kode Kelas wajib diisi">
                                                                    <div class="form-control-position">
                                                                        <i class="fa fa-object-ungroup"></i>
                                                                    </div>
                                                                    <label for="kode-kelas">Kelas</label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-12">
                                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                                    <input type="text" class="form-control" id="kode-kelas" disabled placeholder="Kode Kelas" d-lama="<?= explode(",", $data->klas)[1]; ?>" value="<?= explode(",", $data->klas)[1]; ?>" data-validation-required-message="* Kode Kelas wajib diisi">
                                                                    <div class="form-control-position">
                                                                        <i class="fa fa-object-group"></i>
                                                                    </div>
                                                                    <label for="kode-kelas">Jurusan</label>
                                                                </fieldset>
                                                            </div>
                                                    <?php
                                                            break;
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                            <textarea class="form-control" id="user-alamat" rows="3" placeholder="Alamat" d-lama="<?= $data->alamat; ?>"><?= $data->alamat; ?></textarea>
                                                            <div class="form-control-position">
                                                                <i class="fa fa-home"></i>
                                                            </div>
                                                            <label for="user-alamat">Alamat</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button id="btn-submit-info" type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan Perubahan</button>
                                                        <button type="reset" class="btn btn-outline-warning">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <script>
                                                $(document).ready(function() {
                                                    $('#form-info').each(function() {
                                                        var form_data = new FormData();
                                                        $(this).data('serialized', form_data);
                                                    }).on('change input', function() {
                                                        var form_data1 = new FormData();
                                                        $(this).find('#btn-submit-info').attr('disabled', form_data1 == $(this).data('serialized'));
                                                    });
                                                    $('#data-select').select2({
                                                        allowClear: true,
                                                        placeholder: "Pilih Salah Satu.."
                                                    });
                                                });
                                            </script>
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
                                        <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                            <form>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <?php if (!$medsos || $medsos->twitter == null) { ?>
                                                                <label for="account-twitter">Twitter <i class="fa fa-twitter" style="color:#1A91DA;"></i></label>
                                                            <?php } else { ?>
                                                                <a href="javascript: void(0);" data-toggle="popover" data-html="true" data-placement="left" data-trigger="hover" data-content="<img width='200px' src='https://unavatar.now.sh/twitter/mandalaschool' /><br><h5 class='text-center'>mandalaschool</h5>">
                                                                    <label for="account-twitter">Twitter <i class="fa fa-twitter" style="color:#1A91DA;"></i></label>
                                                                </a>
                                                            <?php } ?>
                                                            <input type="text" id="account-twitter" class="form-control" placeholder="Tambah tautan" value="<?= (isset($medsos)) ? ($medsos->twitter) : (''); ?>">
                                                            <?php if (!isset($medsos->twitter)) : ?>
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
                                                            <?php if (!$medsos || $medsos->facebook == null) { ?>
                                                                <label for="account-facebook">Facebook <i class="fa fa-facebook" style="color:#166FE5;"></i></label>
                                                            <?php } else { ?>
                                                                <a href="javascript: void(0);" data-toggle="popover" data-html="true" data-placement="left" data-trigger="hover" data-content="<img width='200px' src='https://unavatar.now.sh/facebook/yayasan.mandalahayu' /><br><h5 class='text-center'>yayasan.mandalahayu</h5>">
                                                                    <label for="account-facebook">Facebook <i class="fa fa-facebook" style="color:#166FE5;"></i></label>
                                                                </a>
                                                            <?php } ?>
                                                            <input type="text" id="account-facebook" class="form-control" placeholder="Tambah tautan" value="<?= (isset($medsos)) ? ($medsos->facebook) : (''); ?>">
                                                            <?php if (!isset($medsos->facebook)) : ?>
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
                                                            <input type="text" id="account-linkedin" class="form-control" placeholder="Tambah tautan" value="<?= (isset($medsos)) ? ($medsos->linkedin) : (''); ?>">
                                                            <?php if (!isset($medsos->linkedin)) : ?>
                                                                <div class="help-block">
                                                                    <ul role="alert">
                                                                        <li>Contoh: <a href="https://www.linkedin.com/in/rizqi-ubaidillah-43989a1b7/" target="_blank">https://www.linkedin.com/in/rizqi-ubaidillah-43989a1b7</a></li>
                                                                    </ul>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <?php if (!$medsos || $medsos->instagram == null) { ?>
                                                                <label for="account-instagram">Instagram <i class="fa fa-instagram" style="color:#E9622E;"></i></label>
                                                            <?php } else { ?>
                                                                <a href="javascript: void(0);" data-toggle="popover" data-html="true" data-placement="left" data-trigger="hover" data-content="<img width='200px' src='https://unavatar.now.sh/instagram/osmanka1' /><br><h5 class='text-center'>osmanka1</h5>">
                                                                    <label for="account-instagram">Instagram <i class="fa fa-instagram" style="color:#E9622E;"></i></label>
                                                                </a>
                                                            <?php } ?>
                                                            <input type="text" id="account-instagram" class="form-control" placeholder="Tambah tautan" value="<?= (isset($medsos)) ? ($medsos->instagram) : (''); ?>">
                                                            <?php if (!isset($medsos->linkedin)) : ?>
                                                                <div class="help-block">
                                                                    <ul role="alert">
                                                                        <li>Contoh: <a href="https://www.instagram.com/osmanka1/" target="_blank">https://www.instagram.com/osmanka1</a></li>
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
                        <script>
                            $('[data-toggle="popover"]').popover({
                                html: true,
                                offset: '100px 0' //offset the popover content
                            });
                        </script>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>