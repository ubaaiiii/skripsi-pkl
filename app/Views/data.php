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
                        <h2 class="content-header-title float-left mb-0"><?= $title; ?></h2>
                        <?php if ($subtitle) : ?>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                                </ol>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <div class="row">
                    <?php if (in_array(session('user_level'), ['Admin', 'Pembimbing', 'Siswa'])) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= base_url('data/nilai'); ?>">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Nilai Siswa</h4>
                                        <div class="badge badge-primary badge-md">
                                            <span>&nbsp;<?= $jml_siswa; ?></span>&nbsp;&nbsp;&nbsp;<i class="feather icon-users"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <img class="img-fluid" src="<?= base_url('images\pages\nilai.png'); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= base_url('data/jadwal'); ?>">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Jadwal PKL</h4>
                                        <div class="badge badge-primary badge-md">
                                            <span>&nbsp;<?= $jml_perusahaan; ?></span>&nbsp;&nbsp;&nbsp;<i class="feather icon-check-circle"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <img class="img-fluid" src="<?= base_url('images\pages\jadwal.png'); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if (in_array(session('user_level'), ['Admin', 'Pembimbing'])) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= base_url('data/siswa'); ?>">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Siswa</h4>
                                        <div class="badge badge-primary badge-md">
                                            <span>&nbsp;<?= $jml_siswa; ?></span>&nbsp;&nbsp;&nbsp;<i class="feather icon-users"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <img class="img-fluid" src="<?= base_url('images\pages\siswa.png'); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= base_url('data/pembimbing'); ?>">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Pembimbing</h4>
                                        <div class="badge badge-primary badge-md">
                                            <span>&nbsp;<?= $jml_pembimbing; ?></span>&nbsp;&nbsp;&nbsp;<i class="feather icon-user-check"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <img class="img-fluid" src="<?= base_url('images\pages\pembimbing.png'); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if (in_array(session('user_level'), ['Admin'])) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= base_url('data/perusahaan'); ?>">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Perusahaan</h4>
                                        <div class="badge badge-primary badge-md">
                                            <span>&nbsp;<?= $jml_perusahaan; ?></span>&nbsp;&nbsp;&nbsp;<i class="feather icon-check-circle"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <img class="img-fluid" src="<?= base_url('images\pages\perusahaan.png'); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= base_url('data/admin'); ?>">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Admin</h4>
                                        <div class="badge badge-primary badge-md">
                                            <span>&nbsp;<?= $jml_admin; ?></span>&nbsp;&nbsp;&nbsp;<i class="feather icon-users"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <img class="img-fluid" src="<?= base_url('images\pages\admin.png'); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <!-- Column selectors with Export Options and print table -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>