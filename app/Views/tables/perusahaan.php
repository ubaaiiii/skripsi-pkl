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
      <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
          <div class="">
            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle btn-trash" type="button" data-toggle="tooltip" data-placement="left" title="Data <?= $subtitle; ?> Yang Terhapus"><i class="feather icon-trash-2"></i></button>
            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle btn-tambah" type="button" data-toggle="tooltip" data-placement="left" title="Tambah Data <?= $subtitle; ?>"><i class="feather icon-user-plus"></i></button>
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
                  <div class="">
                    <table class="table table-striped" style="white-space: nowrap;width: 100%;">
                      <thead>
                        <tr>
                          <th></th>
                          <th>ID</th>
                          <th>Nama Perusahaan</th>
                          <th>Nomor Telepon</th>
                          <th>Logo</th>
                          <th>Pembimbing</th>
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
          $('#refresh-filter').click(function() {
            $('.select').val(' ').change();
          });

          $('.select').change(function() {
            var kelas = $('#select-kelas').val(),
              jurusan = $('#select-jurusan').val(),
              status = $('#select-status').val(),
              kelamin = $('#select-kelamin').val(),
              keyword = kelas + " " + jurusan + " " + status + " " + kelamin;
            console.log(keyword);
            table.search(keyword).draw();
          })

          $('.select').select2({
            allowClear: true,
            placeholder: "Pilih Salah Satu..."
          });

          $('.table tbody').on('click', '#edit', function() {
            var id = $(this).attr('d-id');
            $('#large .modal-content').load(base_url + '/modal/perusahaan/ubah/' + id, function() {
              $('#large').modal('show');
            });
          });

          $('.table tbody').on('click', '#view', function() {
            var id = $(this).attr('d-id');
            $('#large .modal-content').load(base_url + '/modal/perusahaan/lihat/' + id, function() {
              $('#large').modal('show');
            });
          });

          $('.table tbody').on('click', 'i.fa-picture-o', function() {
            if (table.rows().count() !== 0) {
              var data = table.row($(this).closest('tr')).data();
              $('#large .modal-content').load(base_url + '/modal/perusahaan/lihat/' + data.id, function() {
                $('#large').modal('show');
              });
            }
          });

          $('.table tbody').on('click', '#delete', function() {
            var id = $(this).attr('d-id'),
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
                  url: "/perusahaan/hapus",
                  type: "post",
                  data: {
                    'id': id
                  },
                  success: function(resp) {
                    console.log(resp);
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
                  text: 'Data perusahaan batal dihapus.',
                  type: 'info',
                  confirmButtonClass: 'btn btn-success',
                })
              }
            })
          });

          $('.btn-tambah').click(function() {
            $('#large .modal-content').load(base_url + '/modal/perusahaan', function() {
              $('#large').modal('show');
            });
          });

          $('.btn-trash').click(function() {
            $('#extra-large .modal-content').load(base_url + '/modal/sampah/perusahaan', function() {
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
              url: "/perusahaan/data",
              type: "POST",
              dataSrc: ""
            },
            columns: [{
                data: "id",
                render: function(data, type, row, meta) {
                  var button = `<div class="btn-group dropdown dropdown-icon-wrapper mr-1 mb-1">
                                          <button type="button" class="btn btn-flat-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-cog dropdown-icon"></i>
                                          </button>
                                          <div class="dropdown-menu ">
                                              <a id="view" d-id="` + data + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Lihat">
                                                  <i class="feather icon-search primary"></i>
                                              </a>
                                              <a id="edit" d-nama="` + row.nama + `" d-id="` + data + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Ubah">
                                                  <i class="feather icon-edit-1 warning"></i>
                                              </a>
                                              <a id="delete" d-nama="` + row.nama + `" d-id="` + data + `" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus">
                                                  <i class="feather icon-trash-2 danger"></i>
                                              </a>
                                          </div>
                                        </div>`;
                  return button;
                }
              },
              {
                data: "id",
                visible: false
              },
              {
                data: "nama",
                render: function(data, type, row, meta) {
                  return `<a href="https://www.google.com/search?q=` + data.replace(" ", "+") + `" target="_blank">` + data + `</a>`;
                }
              },
              {
                data: "notelp",
                render: function(data, type, row, meta) {
                  return `<a href="tel:` + data + `">` + data + `</a>`;
                }
              },
              {
                data: "logo",
                render: function(data, type, row, meta) {
                  return `<a data-toggle="popover"
                             data-html="true"
                             data-placement="right"
                             data-trigger="hover"
                             data-content="<img width='200px' src='/images/perusahaan/` + data + `' />"
                             data-original-title='` + row.nama + `'
                          >
                            <i class="fa fa-picture-o"></i>
                          </a>`;
                }
              },
              {
                data: "karyawan",
                render: function(data, type, row, meta) {
                  var html = "";
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
                                          $('#large .modal-content').load('` + base_url + `/modal/pembimbing/lihat/` + value[0] + `',function(){
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
                data: "alamat",
                render: function(data, type, row, meta) {
                  return `<a href="http://maps.google.com/maps?q=` + data.replace(" ", "+") + `" target="_blank"><i class="fa fa-map-marker warning"></i> ` + data + `</a>`;
                }
              },
              {
                data: "logo",
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
        });
      </script>
      <!-- Column selectors with Export Options and print table -->

    </div>
  </div>
</div>
<?= $this->endSection(); ?>