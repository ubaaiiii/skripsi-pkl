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
                            <?php foreach ($datanya as $d) : ?>
                              <tr>
                                <td>
                                  <div class="btn-group dropdown dropdown-icon-wrapper mr-1 mb-1">
                                    <button type="button" class="btn btn-flat-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cog dropdown-icon"></i>
                                    </button>
                                    <div class="dropdown-menu ">
                                      <a id="restore" d-ni="<?=$d->$primary;?>" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Kembalikan">
                                        <i class="fa fa-undo warning"></i>
                                      </a>
                                      <a id="delete" d-ni="<?=$d->$primary;?>" class="dropdown-item waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="Hapus Permanen">
                                        <i class="feather icon-trash-2 danger"></i>
                                      </a>
                                    </div>
                                  </div>
                                </td>
                                <?php foreach ($kolomnya as $k => $value) : ?>
                                <td><?= $d->$value;?></td>
                                <?php endforeach ?>
                              </tr>
                            <?php endforeach; ?>
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
    $('#table-sampah').DataTable({
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
