<?php

namespace App\Models;

use CodeIgniter\Model;

class MedsosModel extends Model
{
  protected $table          = 'media_sosial';
  protected $primaryKey     = 'nomor_induk';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'nomor_induk',
    'twitter',
    'facebook',
    'linkedin',
    'instagram',
  ];
  protected $tempReturnType  = 'object';
  protected $useTimestamps   = true;

  public function __construct()
  {
  }
}
