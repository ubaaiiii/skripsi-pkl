<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table          = 'siswa';
    protected $primaryKey     = 'nomor_induk';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
                                  'nomor_induk',
                                  'nama',
                                  'jenis_kelamin',
                                  'alamat',
                                  'absensi',
                                  'kelas',
                                  'id_pembimbing',
                                  'id_perusahaaan',
                                  'foto',
                                  'status',
                                ];
    protected $tempReturnType  = 'object';
    protected $useTimestamps   = true;
    protected $db;

    public function __construct()
    {
      $this->db = \Config\Database::connect();
    }

    public function tableSiswa($ni = false)
    {
      $db      = $this->db;
      $builder = $db->table('siswa a');
      $builder->select("a.*, b.msdesc 'stats'")
              ->join("master b","a.status = b.msid");
      if ($ni) {
        $builder->where('nomor_induk',$ni);
      }

      return $builder->get()->getResult();
    }

    public function simpanGambar($img)
    {
      if ($img->isValid() && ! $img->hasMoved())
      {
         $newName = $img->getRandomName();
         $img->move('images/users', $newName);
      }
      return $newName;
    }

    public function cekSyarat($kode_kelas)
    {
      $db      = $this->db;
      $builder = $db->table('master');
      $builder->select('*')
              ->where('msid',$kode_kelas)
              ->where('mstype','kelas');
      $result = $builder->get()->getResult()[0];
      $kelasnya = explode(",",$result->msdesc)[0];
      if ($kelasnya == 'Kelas X') {
        return 0;
      } else {
        return 1;
      }
    }

}
