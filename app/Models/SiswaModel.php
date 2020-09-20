<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table          = 'siswa';
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

    public function tableSiswa()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table('siswa a');
      $builder->select("a.*, b.nama 'pembimbing', c.nama 'perusahaan', d.msdesc 'stats'")
              ->join("pembimbing b","a.id_pembimbing = b.id")
              ->join("perusahaan c","a.id_perusahaan = c.id")
              ->join("master d","a.status = d.msid AND d.mstype = 'status'");

      return $query   = $builder->get()->getResult();  // Produces: SELECT * FROM mytable
    }
}
