<?php namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $table          = 'perusahaan';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
                                  'nama',
                                  'alamat',
                                  'notelp'
                                ];
    protected $useTimestamps   = true;

}
