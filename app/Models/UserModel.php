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

  public function aktivasi($sebagai, $username, $email)
  {
    $db      = $this->db;
    $builder = $db->table('users');
    $builder->select("*")
      ->where('username', $username);
    if ($builder->countAllResults() !== 0) {
      return ['result' => 'error', 'response' => 'Username Yang Sama Telah Digunakan'];
    } else {
      $builder->select("*")
        ->where('email', $email);
      if ($builder->countAllResults() !== 0) {
        return ['result' => 'error', 'response' => 'Email Yang Sama Telah Digunakan'];
      } else {
        return ['result' => 'success', 'response' => 'User ' . $username . '(' . $sebagai . ') telah berhasil diaktifkan.'];
      }
    }
  }
}
