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
                                <li class="breadcrumb-item"><a href="<?=base_url('data');?>">Data</a>
                                </li>
                                <li class="breadcrumb-item active"><?=$subtitle;?></li>
                            </ol>
                        </div>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle btn-tambah" type="button" data-toggle="tooltip" data-placement="left" title="Tambah Data <?=$subtitle;?>"><i class="feather icon-user-plus"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
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
                            <!-- <div class="card-header">
                                <h4 class="card-title">Column selectors with Export and Print Options</h4>
                            </div> -->
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <!-- <p class="card-text">All of the data export buttons have a exportOptions option which can be used to specify information about what data should be exported and how. The options given for this parameter are passed directly to the buttons.exportData() method to obtain the required data.
                                    </p>
                                    <p>
                                        The print button will open a new window in the end user's browser and, by default, automatically trigger the print function allowing the end user to print the table. The window will be closed once the print is complete, or has been cancelled.
                                    </p> -->
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Induk</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Kelas</th>
                                                    <th>Perusahaan</th>
                                                    <th>Pembimbing</th>
                                                    <th>Absensi</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>123123123</td>
                                                    <td>
                                                        <div class="avatar mr-1">
                                                            <img src="/images/users/avatar-s-20.jpg" alt="avtar img holder" width="32" height="32">
                                                            <span class="avatar-status-online fa fa-check"></span>
                                                        </div>
                                                        Tiger Nixon
                                                    </td>
                                                    <td>Laki-Laki</td>
                                                    <td>XII RPL 2</td>
                                                    <td>Toyota</td>
                                                    <td>Dedibara</td>
                                                    <td>
                                                      <div class="progress progress-bar-success">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                                      </div>
                                                    </td>
                                                    <td><div class="badge badge-pill badge-light-danger">blocked</div></td>
                                                    <td>
                                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-primary waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Lihat"><i class="feather icon-search"></i></button>
                                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-warning waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Ubah"><i class="feather icon-edit-1"></i></button>
                                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-danger waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="feather icon-trash-2"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
              $(document).ready(function() {
                $('.btn-tambah').click(function(){
                    $('#large .modal-content').load(base_url+'/modal/siswa',function(){
                        $('#large').modal({backdrop: 'static', keyboard: false});
                    });
                });

                console.log(base_url+"/data/siswa/data");

                $('.table').DataTable( {
                    language: {
                      url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                    },
                    ajax:{
                        url: "/data/siswa/data",
                        type:"POST",
                        dataSrc: ""
                    },
                    columns: [
                      { data    : "nomor_induk"},
                      {
                        data    : "nama",
                        render  : function ( data, type, row, meta ) {
                            return `<div class="avatar mr-1">
                                      <img src="/images/users/`+row.foto+`" alt="avtar img holder" width="32" height="32">
                                      <span class="avatar-status-online fa fa-check"></span>
                                    </div>` + data;
                        }
                      },
                      {
                        data    : "jenis_kelamin",
                        render  : function (data) {
                          return data == "L" ? "Laki-Laki" : "Perempuan";
                        }
                      },
                      { data    : "kelas"},
                      { data    : "id_perusahaan"},
                      { data    : "id_pembimbing"},
                      {
                        data    : "absensi",
                        render  : function(data) {
                          var warna = "";
                          switch (true) {
                            case (data < 20):
                              warna = "danger";
                              break;
                            case (data < 50):
                              warna = "warning";
                              break;
                            case (data < 70):
                              warna = "info";
                              break;
                            default:
                              warna = "primary";
                              break;
                          }
                          return `<div class="progress progress-bar-`+warna+`">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="`+data+`" aria-valuemin="0" aria-valuemax="100" style="width:`+data+`%"><i style="display:none;">`+data+`</i></div>
                                  </div>`;
                        }
                      },
                      {
                        data    : "status",
                        render  : function(data) {
                          data = data.split(",");
                          return `<div class="badge badge-pill badge-light-`+data[1]+`">`+data[0]+`</div>`;
                        }
                      },
                      {
                        data    : "status",
                        render  : function(data) {
                          return `<button type="button" class="btn btn-icon rounded-circle btn-outline-primary waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Lihat"><i class="feather icon-search"></i></button>
                                  <button type="button" class="btn btn-icon rounded-circle btn-outline-warning waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Ubah"><i class="feather icon-edit-1"></i></button>
                                  <button type="button" class="btn btn-icon rounded-circle btn-outline-danger waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="feather icon-trash-2"></i></button>`;
                        }
                      },
                      { data    : "foto", visible:false},
                      // {
                      //   // targets : 4,
                      //   data    : "description",
                      //   render  : function ( data, type, row, meta ) {
                      //     return type === 'display' && data.length > 40 ?
                      //       '<span title="'+data+'">'+data.substr( 0, 38 )+'...</span>' :
                      //       data;
                      //   }
                      // },
                    ],
                    // columnDefs  : [{
                    //   targets   : [6],
                    //   type      : "num-html"
                    // }],
                    dom: 'lfBrtip',
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [ 0, ':visible' ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            text: 'JSON',
                            action: function ( e, dt, button, config ) {
                                var data = dt.buttons.exportData();

                                $.fn.dataTable.fileSave(
                                    new Blob( [ JSON.stringify( data ) ] ),
                                    'Export.json'
                                );
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    ],
                    fnDrawCallback: function(oSettings) {
                      $('[data-toggle="tooltip"]').tooltip({
                          "html": true,
                      });
                    }
                });
              });

            </script>
            <!-- Column selectors with Export Options and print table -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
