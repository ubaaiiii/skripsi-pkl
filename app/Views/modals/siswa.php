<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">Tambah Data Siswa</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form">
<div class="modal-body">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="col-12">
          <div class="form-label-group position-relative has-icon-left">
              <input type="number" required id="nomor-induk" class="form-control" name="nomor-induk" placeholder="Nomor Induk">
              <div class="form-control-position">
                  <i class="fa fa-id-card"></i>
              </div>
              <label for="nomor-induk">Nomor Induk</label>
          </div>
      </div>
      <div class="col-12">
          <div class="form-label-group position-relative has-icon-left">
              <input type="text" required id="nama" class="form-control" name="nama" placeholder="Nama Lengkap">
              <div class="form-control-position">
                  <i class="feather icon-user"></i>
              </div>
              <label for="nama">Nama Lengkap</label>

          </div>
      </div>
      <div class="col-12">
        <label for="jenis-kelamin">Jenis Kelamin</label>
          <div class="form-label-group position-relative">
              <ul class="list-unstyled mb-0">
                  <li class="d-inline-block mr-2">
                      <fieldset>
                          <div class="vs-radio-con">
                              <input required type="radio" name="jenis-kelamin" value="L">
                              <span class="vs-radio">
                                  <span class="vs-radio--border"></span>
                                  <span class="vs-radio--circle"></span>
                              </span>
                              <span class="">Laki-Laki</span>
                          </div>
                      </fieldset>
                  </li>
                  <li class="d-inline-block mr-2">
                      <fieldset>
                          <div class="vs-radio-con">
                              <input type="radio" name="jenis-kelamin" value="P">
                              <span class="vs-radio">
                                  <span class="vs-radio--border"></span>
                                  <span class="vs-radio--circle"></span>
                              </span>
                              <span class="">Perempuan</span>
                          </div>
                      </fieldset>
                  </li>
              </ul>
          </div>
      </div>
      <div class="col-12">
          <label for="kelas">Kelas</label>
          <select class="form-control" id="kelas" name="kelas" required>
              <option value="">Pilih Salah Satu...</option>
              <option>IT</option>
              <option>Blade Runner</option>
              <option>Thor Ragnarok</option>
          </select>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">

    </div>
  </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
</div>
</form>
