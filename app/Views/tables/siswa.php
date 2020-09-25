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
                                        <table class="table table-striped" style="white-space: nowrap;width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Induk</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Kelas</th>
                                                    <th>Email</th>
                                                    <th>Alamat</th>
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
                $('.table tbody').on( 'click', '#edit', function () {
                  var ni = $(this).attr('d-ni');
                  $('#large .modal-content').load(base_url+'/modal/siswa/ubah/'+ni,function(){
                      $('#large').modal('show');
                  });
                });

                $('.btn-tambah').click(function(){
                    $('#large .modal-content').load(base_url+'/modal/siswa',function(){
                        $('#large').modal('show');
                    });
                });

                $('.table').DataTable({
                    language: {
                      url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                    },
                    responsive: true,
                    ajax:{
                        url: "/siswa/data",
                        type:"POST",
                        dataSrc: ""
                    },
                    columns: [
                      { data    : "nomor_induk"},
                      {
                        data    : "nama",
                        render  : function ( data, type, row, meta ) {
                          var stats = row.stats.split(",");
                            return `<div class="avatar mr-1">
                                      <img src="/images/users/`+row.foto+`" alt="avtar img holder" width="32" height="32">
                                      <span class="avatar-status-`+stats[2]+`"></span>
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
                      { data    : "email",
                        render  : function (data) {
                          if (data !== null){
                            return "<a href='mailto:"+data+"'>"+data+"</a>";
                          } else {
                            return `<div class="badge badge-pill bg-gradient-danger"><i>Belum Aktivasi Akun</i></div>`;
                          }
                        }
                      },
                      { data    : "alamat"},
                      {
                        data    : "stats",
                        render  : function(data) {
                          data = data.split(",");
                          return `<div class="badge badge-pill badge-light-`+data[1]+`">`+data[0]+`</div>`;
                        }
                      },
                      {
                        data    : "status",
                        render  : function(data, type, row, meta) {
                          var button = "";
                          button += `<button type="button" id="view" d-ni="`+row.nomor_induk+`" class="btn btn-icon rounded-circle btn-outline-primary waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Lihat"><i class="feather icon-search"></i></button>`;
                          button += `<button type="button" id="edit" d-ni="`+row.nomor_induk+`" class="btn btn-icon rounded-circle btn-outline-warning waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Ubah"><i class="feather icon-edit-1"></i></button>`;
                          button += `<button type="button" id="delete" d-ni="`+row.nomor_induk+`" class="btn btn-icon rounded-circle btn-outline-danger waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="feather icon-trash-2"></i></button>`;
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
                    fnDrawCallback: function(oSettings) {
                      $('[data-toggle="tooltip"]').tooltip({
                          "html": true,
                      });
                    },
                });
              });

            </script>
            <!-- Column selectors with Export Options and print table -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
