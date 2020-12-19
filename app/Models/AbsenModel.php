<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenModel extends Model
{
  protected $table          = 'absensi';
  protected $primaryKey     = 'id';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'id',
    'id_jadwal',
    'ni_siswa',
    'tgl_masuk',
    'tgl_keluar',
    'tipe',
    'ket',
    'deleted_at',
  ];
  protected $tempReturnType  = 'object';
  protected $useTimestamps   = true;
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function tableAbsensi($ni = false)
  {
    $db      = $this->db;
    $builder = $db->table('absensi a');
    $builder->select("a.*")
      ->where('deleted_at', null);
    if ($ni) {
      $builder->where('id', $ni);
    }

    return $builder->get()->getResult();
  }

  public function trashAbsensi($ni = false)
  {
    $db      = $this->db;
    $builder = $db->table('absensi');
    $builder->select("*")
      ->where('deleted_at IS NOT NULL');
    if ($ni) {
      $builder->where('id', $ni);
    }

    return $builder->get()->getResult();
  }

  public function getFields()
  {
    $db       = $this->db;
    return $db->getFieldNames('absensi');
  }
}
