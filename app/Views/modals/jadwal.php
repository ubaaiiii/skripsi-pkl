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
<form class="form" method="post" id="form-jadwal">
  <?= csrf_field(); ?>
  <div class="modal-body">
    <br />
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-12">
          <label for="ni_siswa">Tanggal Terima Info</label>
          <input type="date" class="form-control">
        </div>
        <div class="col-12">
          <label for="id_perusahaan">Perusahaan</label>
          <select class="form-control select" id="id_perusahaan" name="id_perusahaan" <?= ($tipe == 'lihat') ? ('disabled') : ('required'); ?> style="width:100%;">
            <option value="">Pilih Salah Satu...</option>
            <?php foreach ($perusahaan as $ps) : ?>
              <option value="<?= $ps->id; ?>"><?= $ps->nama; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-12">
          <label for="ni_pembimbing">Pembimbing</label>
          <select class="form-control select" id="ni_pembimbing" disabled name="ni_pembimbing" <?= ($tipe == 'lihat') ? ('disabled') : ('required'); ?> style="width:100%;">
            <option value="">Harap Memilih Perusahaan...</option>
          </select>
        </div><br>
        <div class="col-12">
          <div class="form-label-group position-relative has-icon-left">
            <input style="background-color:#fff;" readonly type="text" <?= ($tipe == 'lihat') ? ('disabled') : ('required'); ?> id="range-jadwal" class="form-control" name="range-jadwal" placeholder="Pilih Rentang Tanggal">
            <div class="form-control-position">
              <i class="feather icon-calendar"></i>
            </div>
            <label for="range-jadwal">Jadwal PKL</label>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-12">
          <label for="ni_pembimbing">Pilih Siswa</label>
          <select class="max-length form-control" multiple="multiple" name="ni_siswa[]" id="ni_siswa" placeholder="Pilih Maksimal 10 Siswa">
            <?php foreach ($siswa as $s) : ?>
              <option style="text-overflow: ellipsis;" value="<?= $s->nomor_induk; ?>"><?= $s->nomor_induk . " - " . $s->nama; ?></option>
            <?php endforeach; ?>
          </select>
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
    $(function() {
      $('input#range-jadwal').daterangepicker({
          opens: 'left',
          endDate: moment().locale('id').startOf('day').add(3, 'month'),
          autoApply: true,
          maxSpan: {
            "months": 3
          },
          opens: "center",
          drops: "up",
          locale: {
            format: "DD MMMM YYYY",
          },
        },
        function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });

    $('#id_perusahaan').change(function() {
      var id = $(this).val(),
        pembimbing = <?= json_encode($pembimbing); ?>,
        ketemu = pembimbing.filter(function(e) {
          return e.id_perusahaan == id;
        });
      // console.log(ketemu);
      $('#ni_pembimbing').empty();
      $('#ni_pembimbing').append('<option value="">Pilih Salah Satu..</option>');
      $.each(ketemu, function(i, v) {
        $opt = '<option value="' + ketemu[i].nomor_induk + '">' + ketemu[i].nomor_induk + ' - ' + ketemu[i].nama + '</option>';
        $('#ni_pembimbing').append($opt);
      });
      if (Object.keys(ketemu).length > 0) {
        $("#ni_pembimbing").removeAttr('disabled');
      } else {
        $("#ni_pembimbing").prop('disabled', true);
        $('#ni_pembimbing').empty();
        $('#ni_pembimbing').append('<option value="">Harap Memilih Perusahaan..</option>');
      }
      $('#ni_pembimbing').select2('val', '');
    });

    $('#form-jadwal').submit(function(e) {
      $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>  Loading');
      $('.modal-footer button').attr('disabled', true);
      e.preventDefault();
      $.ajax({
        url: "/siswa/<?= $tipe; ?>",
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
              toastr.success("Berhasil menyimpan data siswa", 'Success!', {
                "timeOut": 5000
              });
              $('#large').modal('hide');
            } else {
              toastr.error("Nomor induk sudah terdaftar", 'Gagal!', {
                "timeOut": 5000
              });
            }
          }
          $('#btn-submit').html("Simpan");
          $('.modal-footer button').attr('disabled', false);
        }
      })
    })

    $('.select').select2({
      allowClear: true,
      placeholder: 'Pilih Salah Satu...'
    });

    $(".max-length").select2({
      dropdownAutoWidth: true,
      width: '100%',
      maximumSelectionLength: 10,
      placeholder: "Pilih maksimal 10 siswa"
    });
  })
</script>