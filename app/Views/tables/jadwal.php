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
                  <li class="breadcrumb-item"><a href="<?= base_url('data'); ?>">Data</a>
                  </li>
                  <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                </ol>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php if ($session->user_level == "Admin") { ?>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrum-right">
            <div class="">
              <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle btn-trash" type="button" data-toggle="tooltip" data-placement="left" title="Data <?= $subtitle; ?> Yang Terhapus"><i class="feather icon-trash-2"></i></button>
              <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle btn-tambah" type="button" data-toggle="tooltip" data-placement="left" title="Tambah Data <?= $subtitle; ?>"><i class="fa fa-calendar-plus-o"></i></button>
            </div>
          </div>
        </div>
      <?php } ?>
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
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="users-list-filter">
                    <form>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                          <label for="select-perusahaan">Perusahaan</label>
                          <fieldset class="form-group">
                            <select class="select form-control" id="select-perusahaan" style="width:100%;">
                              <option value=""></option>
                              <option value=" " selected>Semua</option>
                              <?php foreach ($perusahaan as $p) : ?>
                                <option value="<?= $p->nama; ?>"><?= $p->nama; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                          <label for="select-status">Status</label>
                          <fieldset class="form-group">
                            <select class="select form-control" id="select-status" style="width:100%;">

                              <option value="" selected>Semua</option>
                              <option value="Telah Diselesaikan">Telah Selesai</option>
                              <option value="Belum Diselesaikan">Belum Selesai</option>
                            </select>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                          <label for="select-jadwal">Jadwal PKL</label>
                          <fieldset class="form-group">
                            <select class="form-control" id="select-jadwal" style="width:100%;">
                              <option value="" selected></option>
                              <option value="3">Jadwal Mulai PKL</option>
                              <option value="4">Jadwal Selesai PKL</option>
                            </select>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                          <label for="range-jadwal">Rentang Tanggal</label>
                          <fieldset class="form-group">
                            <input type="text" disabled id="range-jadwal" class="form-control" name="range-jadwal" placeholder="Pilih Rentang Tanggal...">
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
                          <th>Nomor Surat</th>
                          <th>Tgl Terima Info<br><i>(thn-bln-tgl)</i></th>
                          <th>Perusahaan</th>
                          <th>Siswa</th>
                          <th>Tgl Mulai PKL<br><i>(thn-bln-tgl)</i></th>
                          <th>Tgl Selesai PKL<br><i>(thn-bln-tgl)</i></th>
                          <th>PKL Diselesaikan<br><i>(thn-bln-tgl jam:mnt:dtk)</i></th>
                          <th>Pembimbing</th>
                          <th>Penanggung Jawab</th>
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
          $('#refresh-filter').click(function() {
            $('.select').val(' ').change();
          });

          $('.select').change(function() {
            var kelas = $('#select-perusahaan').val(),
              status = $('#select-status').val(),
              keyword = kelas + " " + status;
            table.search(keyword).draw();
          });

          $('#range-jadwal').daterangepicker({
            autoUpdateInput: false,
            locale: {
              cancelLabel: 'All Periode'
            }
          });

          $('#range-jadwal').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            minDateFilter = picker.startDate.format('YYYY-MM-DD')
            maxDateFilter = picker.endDate.format('YYYY-MM-DD')
            table.draw();
          });

          $('#range-jadwal').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('All Periode');
            minDateFilter = "";
            maxDateFilter = "";
            table.draw();
          });

          minDateFilter = "";
          maxDateFilter = "";

          $.fn.dataTableExt.afnFiltering.push(
            function(oSettings, aData, iDataIndex) {

              if (typeof aData._date == 'undefined') {
                aData._date = new Date(aData[1]).getTime();
              }
              if (typeof minDateFilter == 'string') {
                minDateFilter = new Date(minDateFilter).getTime();
              }
              if (typeof maxDateFilter == 'string') {
                maxDateFilter = new Date(maxDateFilter).getTime();
              }

              if (minDateFilter && !isNaN(minDateFilter)) {
                if (aData._date < minDateFilter) {
                  return false;
                }
              }

              if (maxDateFilter && !isNaN(maxDateFilter)) {
                if (aData._date > maxDateFilter) {
                  return false;
                }
              }

              return true;
            }
          );

          $('.select').select2({
            allowClear: true,
            placeholder: "Pilih Salah Satu..."
          });

          $('#select-jadwal').select2({
            allowClear: true,
            placeholder: "Pilih Salah Satu..."
          });

          $('.table tbody').on('click', '#edit', function() {
            var ni = $(this).attr('d-id');
            $('#large .modal-content').load(base_url + '/modal/jadwal/ubah/' + ni, function() {
              $('#large').modal('show');
            });
          });

          $('.table tbody').on('click', '#view', function() {
            var ni = $(this).attr('d-id');
            $('#large .modal-content').load(base_url + '/modal/jadwal/lihat/' + ni, function() {
              $('#large').modal('show');
            });
          });

          $('.table tbody').on('click', '#delete', function() {
            var ni = $(this).attr('d-id'),
              nama = $(this).attr('d-nama');
            Swal.fire({
              title: 'Apakah Anda Yakin?',
              html: "Data <b>" + nama + "</b> akan dihapus",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Ya, Hapus!',
              cancelButtonText: 'Tidak!',
              confirmButtonClass: 'btn btn-danger',
              cancelButtonClass: 'btn btn-info',
            }).then(function(result) {
              if (result.value) {
                $.ajax({
                  url: "/jadwal/hapus",
                  type: "post",
                  data: {
                    'ni_siswa': ni
                  },
                  success: function(resp) {
                    table.ajax.reload();
                    Swal.fire({
                      type: "success",
                      title: 'Terhapus!',
                      text: 'Data ' + nama + ' berhasil dihapus.',
                      confirmButtonClass: 'btn btn-success',
                    })
                  }
                })
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                  title: 'Dibatalkan',
                  text: 'Data jadwal batal dihapus.',
                  type: 'info',
                  confirmButtonClass: 'btn btn-success',
                })
              }
            })
          });

          $('.btn-tambah').click(function() {
            $('#large .modal-content').load(base_url + '/modal/jadwal', function() {
              $('#large').modal('show');
            });
          });

          $('.btn-trash').click(function() {
            $('#extra-large .modal-content').load(base_url + '/modal/sampah/jadwal', function() {
              $('#extra-large').modal('show');
            });
          });

          var table = $('.table').DataTable({
            scrollX: true,
            language: {
              url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            },
            responsive: true,
            ajax: {
              url: "/jadwal/data",
              type: "POST",
              dataSrc: ""
            },
            columns: [{
                data: "tgl_diselesaikan",
                render: function(data, type, row, meta) {
                  var button = `<div class="btn-group dropdown dropdown-icon-wrapper mr-1 mb-1">
                                          <button type="button" class="btn btn-flat-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-cog dropdown-icon"></i>
                                          </button>
                                          <div class="dropdown-menu ">
                                              <a id="view" d-id="` + row.id + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Lihat">
                                                  <i class="feather icon-search primary"></i>
                                              </a>`;
                  switch (data) {
                    case null:
                      button += ` <?php if ($session->user_level == 'Admin') : ?>
                                  <a id="edit" d-id="` + row.id + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Ubah">
                                      <i class="feather icon-edit-1 warning"></i>
                                  </a>
                                  <a id="delete" d-nama="` + row.nomor_surat + `" d-id="` + row.id + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus">
                                      <i class="feather icon-trash-2 danger"></i>
                                  </a>
                                  <div class="dropdown-divider"></div>
                                    <a id="salurkan" d-id="` + row.id + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Salurkan PKL">
                                        <i class="feather icon-check-square success"></i>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a id="berhenti" d-id="` + row.id + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Berhentikan PKL">
                                        <i class="feather icon-alert-circle danger"></i>
                                    </a>
                                  <?php endif; ?>
                                  <div class="dropdown-divider"></div>
                                    <a href="/jadwal/print_surat_pengantar?id=` + row.id + `" target="_blank" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Cetak Surat Pengantar">
                                        <i class="feather icon-printer success"></i>
                                    </a>`;
                      break;
                    default:
                      button += `<div class="dropdown-divider"></div>
                                    <a id="mulai" d-id="` + row.id + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Cetak Nilai">
                                        <i class="feather icon-printer success"></i>
                                    </a>`;
                      break;
                  }

                  button += `</div></div>`;
                  return button;
                }
              },
              {
                data: "nomor_surat"
              },
              {
                data: "tgl_terima_info"
              },
              {
                data: "nama_perusahaan",
                render: function(data, type, row, meta) {
                  return `<a href="javascript:void(0);" onclick="
                                    $('#large .modal-content').load('` + base_url + `/modal/perusahaan/lihat/` + row.id_perusahaan + `',function(){
                                        $('#large').modal('show');
                                    });
                                    ">` + data + `</a>`;
                }
              },
              {
                data: "ni_siswa",
                render: function(data, type, row, meta) {
                  var html = "<span style='display:none;'>" + row.jumlah_siswa + "</span>";
                  data = data.split(",");
                  $.each(data, function(index, value) {
                    value = value.split("|");
                    html += `<div class="avatar">
                                      <a data-toggle="popover"
                                         data-html="true"
                                         data-placement="right"
                                         data-trigger="hover"
                                         data-content="<img width='200px' src='/images/users/` + value[2] + `' />"
                                         data-original-title='` + value[1] + `'
                                         onclick="
                                          $('#large .modal-content').load('` + base_url + `/modal/siswa/lihat/` + value[0] + `',function(){
                                            $('#large').modal('show');
                                          });"
                                       >
                                        <img style="object-fit: cover; object-position: 100% 0;" src="/images/users/` + value[2] + `" alt="Foto Karyawan" width="32" height="32">
                                      </a>
                                    </div>`;
                  });
                  return html;
                }
              },
              {
                data: "tgl_mulai"
              },
              {
                data: "tgl_selesai"
              },
              {
                data: "tgl_diselesaikan",
                render: function(data, type, row, meta) {
                  if (data === null) {
                    return "<i>Belum Diselesaikan</i>";
                  } else {
                    return data + "<i style='display:none;'>Telah Diselesaikan</i>";
                  }
                }
              },
              {
                data: "pembimbing",
                render: function(data, type, row, meta) {
                  data = data.split("|");
                  return `<div class="avatar">
                                      <a data-toggle="popover"
                                         data-html="true"
                                         data-placement="right"
                                         data-trigger="hover"
                                         data-content="<img width='200px' src='/images/users/` + data[2] + `' />"
                                         data-original-title='` + data[1] + `'
                                         onclick="
                                          $('#large .modal-content').load('` + base_url + `/modal/pembimbing/lihat/` + data[0] + `',function(){
                                            $('#large').modal('show');
                                          });"
                                       >
                                        <img style="object-fit: cover; object-position: 100% 0;" src="/images/users/` + data[2] + `" alt="Foto sKaryawan" width="32" height="32">
                                      </a>
                                    </div>` + data[1];
                }
              },
              {
                data: "admin",
                render: function(data, type, row, meta) {
                  data = data.split("|");
                  return `<div class="avatar">
                                      <a data-toggle="popover"
                                         data-html="true"
                                         data-placement="right"
                                         data-trigger="hover"
                                         data-content="<img width='200px' src='/images/users/` + data[2] + `' />"
                                         data-original-title='` + data[1] + `'
                                         onclick="
                                          $('#large .modal-content').load('` + base_url + `/modal/admin/lihat/` + data[0] + `',function(){
                                            $('#large').modal('show');
                                          });"
                                       >
                                        <img style="object-fit: cover; object-position: 100% 0;" src="/images/users/` + data[2] + `" alt="Foto sKaryawan" width="32" height="32">
                                      </a>
                                    </div>` + data[1];
                }
              },
              {
                data: "id",
                visible: false
              },
              {
                data: "id_perusahaan",
                visible: false
              },
              {
                data: "jumlah_siswa",
                visible: false
              },
            ],
            dom: 'lfBrtip',
            buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [0, ':visible']
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
                action: function(e, dt, button, config) {
                  var data = dt.buttons.exportData();

                  $.fn.dataTable.fileSave(
                    new Blob([JSON.stringify(data)]),
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
            columnDefs: [{
              targets: [0],
              orderable: false,
            }],
            aaSorting: [],
          });

          <?php
          if (session('user_level') == 'Pembimbing') {
            echo "table.columns( 3 ).search( '" . $data->perusahaan . "' ).draw();";
          }
          ?>
        });
      </script>
      <!-- Column selectors with Export Options and print table -->

    </div>
  </div>
</div>
<?= $this->endSection(); ?>