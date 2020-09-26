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
                        <div class="card-header" style="padding-bottom: 1.5rem;">
                            <h4 class="card-title">Filter</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse" class=""><i class="feather icon-chevron-down"></i></a></li>
                                    <li><a id="refresh-filter"><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show" style="">
                            <div class="card-body">
                                <div class="users-list-filter">
                                    <form>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="select-kelas">Kelas</label>
                                                <fieldset class="form-group">
                                                    <select class="select form-control" id="select-kelas">
                                                        <option value=""></option>
                                                        <option value=" " selected>Semua</option>
                                                        <?php
                                                            $unique = array();
                                                            foreach($kelas as $k) :
                                                                $kelasnya = explode(",",$k->msdesc);
                                                                if ( in_array($kelasnya[0], $unique) ) {
                                                                    continue;
                                                                }
                                                                $unique[] = $kelasnya[0];
                                                        ?>
                                                        <option value="<?=$kelasnya[0];?>,"><?=$kelasnya[0];?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="select-jurusan">Jurusan</label>
                                                <fieldset class="form-group">
                                                    <select class="select form-control" id="select-jurusan">
                                                        <option value=""></option>
                                                        <option value=" " selected>Semua</option>
                                                        <?php
                                                            $unique = array();
                                                            foreach($kelas as $j) :
                                                              $jurusan = explode(",",$j->msdesc);
                                                              if ( in_array($jurusan[1], $unique) ) {
                                                                  continue;
                                                              }
                                                              $unique[] = $jurusan[1];
                                                        ?>
                                                        <option value="<?=$jurusan[1];?>"><?=$jurusan[1];?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="select-status">Status</label>
                                                <fieldset class="form-group">
                                                    <select class="select form-control" id="select-status">
                                                        <option value=""></option>
                                                        <option value=" " selected>Semua</option>
                                                        <?php
                                                          foreach ($status as $s) :
                                                            $statusnya = explode(",",$s->msdesc);
                                                          ?>
                                                        <option value="<?=$statusnya[0];?>"><?=$statusnya[0];?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="select-kelamin">Jenis Kelamin</label>
                                                <fieldset class="form-group">
                                                    <select class="select form-control" id="select-kelamin">
                                                        <option value=""></option>
                                                        <option value=" " selected>Semua</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                $('#refresh-filter').click(function(){
                  $('.select').val(' ').change();
                });

                $('.select').change(function(){
                  var kelas   = $('#select-kelas').val(),
                      jurusan = $('#select-jurusan').val(),
                      status  = $('#select-status').val(),
                      kelamin = $('#select-kelamin').val(),
                      keyword = kelas+" "+jurusan+" "+status+" "+kelamin;
                  console.log(keyword);
                  table.search( keyword ).draw();
                })

                $('.select').select2({allowClear:true,placeholder:"Pilih Salah Satu..."});

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

                var table = $('.table').DataTable({
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
                                      <a data-toggle="tooltip" data-placement="right" title="`+stats[0]+`">
                                        <img src="/images/users/`+row.foto+`" alt="avtar img holder" width="32" height="32" alt="alternative text" title="this will be displayed as a tooltip">
                                      <span class="avatar-status-`+stats[2]+`"></span>
                                      </a>
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
                      { data    : "stats", visible:false},
                      { data    : "foto", visible:false},
                      { data    : "klas", visible:false},
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
