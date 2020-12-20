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

  public function getLoadAbsensi($ni = false, $start, $end)
  {
    $db      = $this->db;
    $builder = $db->table('absensi');
    $builder->select("id,
                      right(tgl_masuk,8) 'title',
                      tgl_masuk 'start',
                      tgl_keluar 'end',
                      0 'editable',
                      tipe 'color',
                      1 'allDay'")
      ->where('tgl_masuk BETWEEN "' . $start . '" AND "' . $end . '"')
      ->where('deleted_at', null);
    if ($ni) {
      $builder->where('ni_siswa', $ni);
    }

    return $builder->get()->getResult();
    // print_r($db->getLastQuery());
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
