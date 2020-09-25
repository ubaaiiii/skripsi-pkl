<?php namespace App\Models;

use CodeIgniter\Model;

class PembimbingModel extends Model
{
    protected $table          = 'pembimbing';
    protected $primaryKey     = 'nomor_induk';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
                                  'nomor_induk',
                                  'nama',
                                  'email',
                                  'notelp',
                                  'alamat',
                                ];
    protected $useTimestamps   = true;

}
