<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
  protected $table          = 'kegiatan';
  protected $primaryKey     = 'id';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'id',
    'id_jadwal',
    'ni_siswa',
    'judul',
    'deskripsi',
    'is_finished',
    'aktifitas',
    'tugas',
    'dokumen',
    'kendala',
    'info',
    'favorite',
    'is_deleted',
    'deleted_at',
  ];
  protected $tempReturnType  = 'object';
  protected $useTimestamps   = true;
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function tableKegiatan($ni = false)
  {
    $db      = $this->db;
    $builder = $db->table('kegiatan a');
    $builder->select("a.*")
      ->where('deleted_at', null);
    if ($ni) {
      $builder->where('id', $ni);
    }

    return $builder->get()->getResult();
  }

  public function trashKegiatan($ni = false)
  {
    $db      = $this->db;
    $builder = $db->table('kegiatan');
    $builder->select("*")
      ->where('deleted_at IS NOT NULL');
    if ($ni) {
      $builder->where('ni_siswa', $ni);
    }

    return $builder->get()->getResult();
  }

  public function getFields()
  {
    return $this->db->getFieldNames('kegiatan');
  }
}
