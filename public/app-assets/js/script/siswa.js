$(document).ready(function() {
  $('.btn-tambah').click(function(){
    $('#large .modal-content').load(base_url+'/modal/siswa',function(){
      $('#large').modal({backdrop: 'static', keyboard: false});
    });
  });
});
