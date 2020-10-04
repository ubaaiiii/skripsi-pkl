<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
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
    'deleted_at',
  ];
  protected $useTimestamps   = true;
  protected $db;

  public function __construct()
  {
    $this->db       = \Config\Database::connect();
  }

  public function cekLogin($username, $password)
  {
    $db = $this->db;
    return $db->table('users')->getWhere(['username' => $username, 'password' => $password]);
  }
}
