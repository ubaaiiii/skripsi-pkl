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
    protected $useTimestamps   = true;

    public function __construct()
    {

    }

    public function tableSiswa($ni = false)
    {
      $db      = \Config\Database::connect();
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

}
