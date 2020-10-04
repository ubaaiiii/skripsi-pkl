<style media="screen">
  .image-area {
    border: 2px dashed rgba(0, 0, 0, .7);
    padding: 1rem;
    position: relative
  }

  .image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: 700;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: .8rem;
    z-index: 1
  }

  .image-area img {
    z-index: 2;
    position: relative
  }
</style>
<div class="modal-header">
  <h4 class="modal-title" id="myModalLabel17"><?= $judul_modal; ?></h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form class="form" method="post" id="form-perusahaan">
  <?= csrf_field(); ?>
  <input type="hidden" id="id" name="id" value="<?= isset($perusahaan->id) ? $perusahaan->id : ''; ?>">
  <div class="modal-body">
    <br />
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-12">
          <div class="form-label-group position-relative has-icon-left">
            <input type="text" <?= ($tipe == 'lihat') ? ('disabled') : ('required'); ?> id="nama" class="form-control" name="nama" placeholder="Nama Perusahaan" value="<?= isset($perusahaan->nama) ? $perusahaan->nama : ''; ?>">
            <div class="form-control-position">
              <i class="feather icon-user"></i>
            </div>
            <label for="nama">Nama Perusahaan</label>
          </div>
        </div>
        <div class="col-12 mt-2">
          <div class="form-label-group position-relative has-icon-left">
            <input type="number" <?= ($tipe == 'lihat') ? ('disabled') : ('required'); ?> id="notelp" class="form-control" name="notelp" placeholder="Nomor Telepon" value="<?= isset($perusahaan->notelp) ? $perusahaan->notelp : ''; ?>">
            <div class="form-control-position">
              <i class="feather icon-phone"></i>
            </div>
            <label for="notelp">Nomor Telepon</label>
          </div>
        </div>
        <div class="col-12 mt-2">
          <fieldset class="form-label-group position-relative has-icon-left">
            <textarea class="form-control" id="alamat" rows="3" name="alamat" <?= ($tipe == 'lihat') ? ('disabled') : ('required'); ?> placeholder="Alamat"><?= isset($perusahaan->alamat) ? $perusahaan->alamat : ''; ?></textarea>
            <div class="form-control-position">
              <i class="fa fa-home"></i>
            </div>
            <label for="alamat">Alamat</label>
          </fieldset>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-12">
          <label for="upload_foto" style="<?= ($tipe == 'lihat') ? ('display:none;') : (''); ?>">Logo Perusahaan</label>
          <fieldset class="form-group">
            <div class="custom-file" style="<?= ($tipe == 'lihat') ? ('display:none;') : (''); ?>">
              <input type="file" <?= ($tipe == 'tambah') ? ('required') : (''); ?> class="custom-file-input" id="upload_foto" name="upload_foto" accept="image/x-png,image/gif,image/jpeg">
              <label class="custom-file-label" id="upload-label" for="upload_foto">Pilih file</label>
            </div>
            <p style="<?= ($tipe == 'lihat') ? ('display:none;') : (''); ?>" class="font-italic text-black text-center mt-1">Gambar akan ditampilkan pada kotak di bawah.</p>
            <div class="image-area"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
          </fieldset>
        </div>
      </div>
    </div>
  </div>
  <?php if ($tipe !== 'lihat') : ?>
    <div class="modal-footer">
      <button type="submit" id="btn-submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
      <button type="reset" id="btn-reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
    </div>
  <?php endif; ?>
</form>

<script>
  $(document).ready(function() {
    <?php if ($tipe == 'ubah' || $tipe == 'lihat') : ?>
      $('#imageResult').attr('src', '/images/perusahaan/<?= $perusahaan->logo; ?>');
    <?php endif; ?>
    $('#form-perusahaan').submit(function(e) {
      var buttonLama = $('#btn-submit').html();
      $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>  Loading');
      $('.modal-footer button').attr('disabled', true);
      e.preventDefault();
      $.ajax({
        url: "/perusahaan/<?= $tipe; ?>",
        data: new FormData(this),
        type: "post",
        processData: false,
        contentType: false,
        success: function(resp) {
          // console.log(resp);
          if (resp !== "berhasil" && resp !== "exists") {
            // console.log(resp);
            resp = JSON.parse(resp);
            $.each(resp, function(index, value) {
              toastr.error(value, 'Error!', {
                "timeOut": 5000
              });
              $('#' + index).select();
            });
          } else {
            if (resp == 'berhasil') {
              $('.table').DataTable().ajax.reload();
              toastr.success("Berhasil menyimpan data perusahaan", 'Success!', {
                "timeOut": 5000
              });
              $('#large').modal('hide');
            } else {
              toastr.error("Nomor induk sudah terdaftar", 'Gagal!', {
                "timeOut": 5000
              });
            }
          }
          $('#btn-submit').html(buttonLama);
          $('.modal-footer button').attr('disabled', false);
        }
      })
    })


    $('#kelas').select2({
      allowClear: true,
      placeholder: 'Pilih Salah Satu...'
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#imageResult')
            .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(function() {
      $('#upload_foto').on('change', function() {
        readURL(input);
      });
      $('#btn-reset').click(function() {
        $('#imageResult').attr('src', null);
        $('#upload-label').text('Pilih file');
      })
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload_foto');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
      var input = event.srcElement;
      var fileName = input.files[0].name;
      infoArea.textContent = 'File name: ' + fileName;
    }
  })
</script>