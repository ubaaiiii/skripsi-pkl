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
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle btn-trash" type="button" data-toggle="tooltip" data-placement="left" title="Data <?=$subtitle;?> Yang Terhapus"><i class="feather icon-trash-2"></i></button>
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
                                            <div class="col-12 col-sm-6 col-lg-6">
                                                <label for="select-jabatan">Jabatan</label>
                                                <fieldset class="form-group">
                                                    <select class="select form-control" id="select-jabatan" style="width:100%;">
                                                        <option value=""></option>
                                                        <option value=" " selected>Semua</option>
                                                        <?php foreach($jabatan as $j) :?>
                                                        <option value="<?=$j->msdesc;?>"><?=$j->msdesc;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-6">
                                                <label for="select-kelamin">Jenis Kelamin</label>
                                                <fieldset class="form-group">
                                                    <select class="select form-control" id="select-kelamin" style="width:100%;">
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
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="">
                                        <table class="table table-striped" style="white-space: nowrap;width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nomor Induk</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Jabatan</th>
                                                    <th>Nomor Telepon</th>
                                                    <th>Email</th>
                                                    <th>Alamat</th>
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
                  var jabatan   = $('#select-jabatan').val(),
                      kelamin = $('#select-kelamin').val(),
                      keyword = jabatan+" "+kelamin;
                  table.search( keyword ).draw();
                })

                $('.select').select2({allowClear:true,placeholder:"Pilih Salah Satu..."});

                $('.table tbody').on( 'click', '#edit', function () {
                  var ni = $(this).attr('d-ni');
                  $('#large .modal-content').load(base_url+'/modal/admin/ubah/'+ni,function(){
                      $('#large').modal('show');
                  });
                });

                $('.table tbody').on( 'click', '#view', function () {
                  var ni = $(this).attr('d-ni');
                  $('#large .modal-content').load(base_url+'/modal/admin/lihat/'+ni,function(){
                      $('#large').modal('show');
                  });
                });

                $('.table tbody').on( 'click', 'img', function () {
                  if (table.rows().count() !== 0) {
                    var data = table.row($(this).closest('tr')).data();
                    $('#large .modal-content').load(base_url+'/modal/admin/lihat/'+data.nomor_induk,function(){
                        $('#large').modal('show');
                    });
                  }
                });

                $('.table tbody').on( 'click', '#delete', function () {
                  var ni    = $(this).attr('d-ni'),
                      nama  = $(this).attr('d-nama');
                  Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    html: "Data <b>"+nama+"</b> akan dihapus",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak!',
                    confirmButtonClass: 'btn btn-danger',
                    cancelButtonClass: 'btn btn-info',
                  }).then(function (result) {
                    if (result.value) {
                      $.ajax({
                        url:"/admin/hapus",
                        type: "post",
                        data: {'nomor_induk':ni},
                        success: function(resp) {
                          table.ajax.reload();
                          Swal.fire({
                            type: "success",
                            title: 'Terhapus!',
                            text: 'Data '+nama+' berhasil dihapus.',
                            confirmButtonClass: 'btn btn-success',
                          })
                        }
                      })
                    }
                    else if (result.dismiss === Swal.DismissReason.cancel) {
                      Swal.fire({
                        title: 'Dibatalkan',
                        text: 'Data Admin batal dihapus.',
                        type: 'info',
                        confirmButtonClass: 'btn btn-success',
                      })
                    }
                  })
                });

                $('.btn-tambah').click(function(){
                    $('#large .modal-content').load(base_url+'/modal/admin',function(){
                        $('#large').modal('show');
                    });
                });

                $('.btn-trash').click(function(){
                    $('#extra-large .modal-content').load(base_url+'/modal/sampah/admin',function(){
                        $('#extra-large').modal('show');
                    });
                });

                var table = $('.table').DataTable({
                    scrollX: true,
                    language: {
                      url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                    },
                    responsive: true,
                    ajax:{
                        url: "/admin/data",
                        type:"POST",
                        dataSrc: ""
                    },
                    columns: [
                      {
                        data    : "nomor_induk",
                        render  : function(data, type, row, meta) {
                          var button = `<div class="btn-group dropdown dropdown-icon-wrapper mr-1 mb-1">
                                          <button type="button" class="btn btn-flat-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-cog dropdown-icon"></i>
                                          </button>
                                          <div class="dropdown-menu ">
                                              <a id="view" d-ni="`+row.nomor_induk+`" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Lihat">
                                                  <i class="feather icon-search primary"></i>
                                              </a>
                                              <a id="edit" d-ni="`+row.nomor_induk+`" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Ubah">
                                                  <i class="feather icon-edit-1 warning"></i>
                                              </a>
                                              <a id="delete" d-nama="`+row.nama+`" d-ni="`+row.nomor_induk+`" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus">
                                                  <i class="feather icon-trash-2 danger"></i>
                                              </a>
                                            </div>
                                          </div>`;
                          return button;
                        }
                      },
                      { data    : "nomor_induk"},
                      {
                        data    : "nama",
                        render  : function ( data, type, row, meta ) {
                            return `<div class="avatar mr-1">
                                      <a data-toggle="popover"
                                         data-html="true"
                                         data-placement="right"
                                         data-trigger="hover"
                                         data-content="<img width='200px' src='/images/users/`+row.foto+`' />"
                                         data-original-title='`+data+`'
                                       >
                                        <img style="object-fit: cover; object-position: 100% 0;" src="/images/users/`+row.foto+`" alt="Foto Admin" width="32" height="32">
                                      <span class="avatar-status-online"></span>
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
                      { data    : "jbtn"},
                      { data    : "notelp"},
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
                      $('[data-toggle="popover"]').popover();
                    },
                    columnDefs: [ {
                      targets  : [0],
                      orderable: false,
                    }],
                    aaSorting: [],
                });
              });

            </script>
            <!-- Column selectors with Export Options and print table -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
