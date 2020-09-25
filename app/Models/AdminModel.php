<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table          = 'admin';
    protected $primaryKey     = 'nomor_induk';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
                                  'nomor_induk',
                                  'nama',
                                  'jabatan',
                                  'email',
                                  'alamat',
                                ];
    protected $useTimestamps   = true;

}
