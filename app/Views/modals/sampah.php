<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17"><?=$judul_modal;?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
  <br />
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-content">
              <div class="card-body card-dashboard">
                  <div class="">
                      <table id="table-sampah" class="table table-striped" style="white-space: nowrap;width: 100%;">
                          <thead>
                              <tr>
                                  <th></th>
                                  <?php foreach ($kolomnya as $k => $value) : ?>
                                  <th><?= $value ;?></th>
                                  <?php endforeach; ?>
                              </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#table-sampah tbody').on( 'click', '#restore', function () {
      var ni = $(this).attr('d-id');
      $.ajax({
        url     : "../sampah/restore/<?=$table;?>",
        type    : "post",
        data    : {"id":ni},
        success : function(resp) {
          console.log(resp);
          if (resp == 'berhasil') {
            toastr.success("Berhasil mengembalikan data", 'Success!', { timeOut: 5000, positionClass: 'toast-top-center', containerId: 'toast-top-center' });
            $('.table').DataTable().ajax.reload();
          }
        }
      })
    });

    $('#table-sampah tbody').on( 'click', '#delete', function () {
      var id = $(this).attr('d-id');
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        html: "Data <b>"+id+"</b> akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!',
        confirmButtonClass: 'btn btn-danger',
        cancelButtonClass: 'btn btn-info',
      }).then(function (result) {
        if (result.value) {
          $.ajax({
            url     : "../sampah/delete/<?=$table;?>",
            type    : "post",
            data    : {"id":id},
            success : function(resp) {
              console.log(resp);
              if (resp == 'berhasil') {
                toastr.success("Berhasil menghapus data secara permanen", 'Success!', { timeOut: 5000, positionClass: 'toast-top-center', containerId: 'toast-top-center' });
                $('.table').DataTable().ajax.reload();
              }
            }
          })
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Dibatalkan',
            text: 'Data <?=$table;?> batal dihapus.',
            type: 'info',
            confirmButtonClass: 'btn btn-success',
          })
        }
      })
    });

    $('#table-sampah').DataTable({
      responsive: true,
      scrollX: "100%",
      ajax:{
        url: "../<?=$table;?>/trash",
        type:"POST",
        dataSrc: ""
      },
      columns: [
        {data: "<?=$primary;?>", render(data, type, row, meta){
          var button = `<div class="btn-group dropdown dropdown-icon-wrapper mr-1 mb-1">
          <button type="button" class="btn btn-flat-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cog dropdown-icon"></i>
          </button>
          <div class="dropdown-menu ">
          <a id="restore" d-id="`+data+`" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Kembalikan">
          <i class="fa fa-undo success"></i>
          </a>
          <a id="delete" d-id="`+data+`" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus Permanen">
          <i class="feather icon-trash-2 danger"></i>
          </a>
          </div>
          </div>`;
          return button;
        }},
        <?php foreach ($kolomnya as $k => $value) : ?>
        {data: "<?=$value;?>"},
        <?php endforeach; ?>
      ],
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
      },
      columnDefs: [ {
        targets  : [0],
        orderable: false,
      }],
      aaSorting: [],
      fnDrawCallback: function(oSettings) {
        $('[data-toggle="tooltip"]').tooltip({
            "html": true,
        });
        $('[data-toggle="popover"]').popover();
        $('#table-sampah thead th').click();
      },
    });

    $('.table').on('show.bs.dropdown', function () {
         $('.table').css( "overflow", "inherit" );
    });

    $('.table').on('hide.bs.dropdown', function () {
         $('.table').css( "overflow", "auto" );
    })
  });
</script>
