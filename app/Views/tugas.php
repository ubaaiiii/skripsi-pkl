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
                        <h2 class="content-header-title float-left mb-0"><?=$title;?></h2>
                        <?php if($subtitle): ?>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url('data');?>">Tugas</a>
                                </li>
                                <li class="breadcrumb-item active"><?=$subtitle;?></li>
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
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="<?=base_url('tugas/absensi');?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Absensi</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <img class="img-fluid" src="<?=base_url('images\pages\absensi.png');?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="<?=base_url('tugas/kegiatan');?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kegiatan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <img class="img-fluid" src="<?=base_url('images\pages\kegiatan.png');?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!-- Column selectors with Export Options and print table -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
