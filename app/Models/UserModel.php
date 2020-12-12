<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table          = 'users';
  protected $primaryKey     = 'username';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'username',
    'password',
    'email',
    'nomor_induk',
    'level',
    'token',
    'deleted_at',
  ];
  protected $tempReturnType  = 'object';
  protected $useTimestamps   = true;
  protected $db;

  public function __construct()
  {
    $this->db       = \Config\Database::connect();
    $this->session  = session();
  }
}
