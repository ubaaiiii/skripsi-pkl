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
}
