<?php namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table          = 'jadwal_pkl';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
                                  'ni_siswa',
                                  'id_perusahaan',
                                  'ni_pembimbing',
                                  'ni_penyalur',
                                  'jadwal_mulai',
                                  'jadwal_selesai',
                                  'jumlah_bulan',
                                  'status',
                                  'tgl_diselesaikan',
                                  'catatan',
                                ];
    protected $useTimestamps   = true;

}
