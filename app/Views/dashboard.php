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
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-content">
                              <div class="card-body card-dashboard">
                                  <img class="img-fluid mx-auto d-block" src="<?=base_url('images\pages\smk-bisa.png');?>" alt="" style="height:10%;">
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- <div class="row">
                    <h2 class="content-header-title ml-1">Menu</h2>
                </div> -->
                <div class="alert alert-primary">
                    Menu
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <a href="<?=base_url('tugas');?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tugas</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <img class="img-fluid mx-auto d-block" src="<?=base_url('images\pages\tugas.png');?>" alt="Tugas">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <a href="<?=base_url('monitoring');?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Monitoring</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <img class="img-fluid mx-auto d-block" src="<?=base_url('images\pages\monitoring.png');?>" alt="Monitoring">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <a href="<?=base_url('data');?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <img class="img-fluid mx-auto d-block" src="<?=base_url('images\pages\data.png');?>" alt="Data">
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
