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
                                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>">Dashboard</a>
                                </li>
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
                                        <table class="table table-striped" style="white-space: nowrap;">
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
                                                    <td colspan="9">
                                                      <div class="progress progress-bar-primary progress-xl">
                                                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                                                      </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                  <th><input type="text" class="form-control" placeholder="Nomor Induk" /></th>
                                                  <th><input type="text" class="form-control" placeholder="Nama" /></th>
                                                  <th><input type="text" class="form-control" placeholder="Jenis Kelamin" /></th>
                                                  <th><input type="text" class="form-control" placeholder="Kelas" /></th>
                                                  <th><input type="text" class="form-control" placeholder="Perusahaan" /></th>
                                                  <th><input type="text" class="form-control" placeholder="Pembimbing" /></th>
                                                  <th><input type="text" class="form-control" placeholder="Absensi" /></th>
                                                  <th><input type="text" class="form-control" placeholder="Status" /></th>
                                                  <th></th>
                                              </tr>
                                            </tfoot>
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

                $('.table').DataTable({
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
                          var stats = row.stats.split(",");
                          stats = stats[2];
                            return `<div class="avatar mr-1">
                                      <img src="/images/users/`+row.foto+`" alt="avtar img holder" width="32" height="32">
                                      <span class="avatar-status-`+stats+`"></span>
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
                      { data    : "perusahaan"},
                      { data    : "pembimbing"},
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
                        data    : "stats",
                        render  : function(data) {
                          data = data.split(",");
                          return `<div class="badge badge-pill badge-light-`+data[1]+`">`+data[0]+`</div>`;
                        }
                      },
                      {
                        data    : "status",
                        render  : function(data) {
                          var button = "";
                          button += `<button type="button" class="btn btn-icon rounded-circle btn-outline-primary waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Lihat"><i class="feather icon-search"></i></button>`;
                          button += `<button type="button" class="btn btn-icon rounded-circle btn-outline-warning waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Ubah"><i class="feather icon-edit-1"></i></button>`;
                          button += `<button type="button" class="btn btn-icon rounded-circle btn-outline-danger waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="feather icon-trash-2"></i></button>`;
                          switch (data) {
                            case "1":
                              button += `<button type="button" class="btn btn-icon rounded-circle btn-outline-success waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Salurkan PKL"><i class="feather icon-check-square"></i></button>`;
                              break;
                            case "2":
                              button += `<button type="button" class="btn btn-icon rounded-circle btn-outline-danger waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Berhentikan"><i class="feather icon-alert-circle"></i></button>`;
                              break;
                            case "3":
                              button += `<button type="button" class="btn btn-icon rounded-circle btn-outline-warning waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Nilai"><i class="feather
icon-star"></i></button>`;
                              break;

                          }
                          button += "<span style='display:none;'>"+data+"</span>";    // Biar bisa sorting
                          return button;
                        }
                      },
                      { data    : "foto", visible:false},
                    ],
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
                    initComplete: function () {
                        // Apply the search
                        this.api().columns().every( function () {
                            var that = this;

                            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                                if ( that.search() !== this.value ) {
                                    that
                                        .search( this.value )
                                        .draw();
                                }
                            } );
                        } );
                    },
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
