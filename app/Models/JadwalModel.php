<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
  protected $table          = 'jadwal_pkl';
  protected $primaryKey     = 'id';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'nomor_surat',
    'tgl_terima_info',
    'id_perusahaan',
    'jumlah_siswa',
    'ni_siswa',
    'tgl_mulai',
    'tgl_selesai',
    'ni_pembimbing',
    'ni_admin',
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

  public function tableJadwal($id = false)
  {
    $session = $this->session;
    if ($session->user_level != 'Admin' && $session->user_level != 'Pembimbing') {
      return [];
    }
    $db      = $this->db;
    $builder = $db->table('jadwal_pkl a');
    $builder->select("a.*, 
                      b.nama nama_perusahaan,
                      CONCAT(a.ni_pembimbing,'|',c.nama,'|',c.foto) pembimbing,
                      CONCAT(a.ni_admin,'|',d.nama,'|',d.foto) admin")
      ->join("perusahaan b", "a.id_perusahaan = b.id")
      ->join("pembimbing c", "a.ni_pembimbing = c.nomor_induk")
      ->join("admin d", "a.ni_admin = d.nomor_induk")
      ->where('a.deleted_at', null);
    if ($id) {
      $builder->where('a.id', $id);
    }

    return $builder->get()->getResult();
    // return $builder->getCompiledSelect();
  }

  public function trashJadwal($id = false)
  {
    $session = $this->session;
    if ($session->user_level != 'Admin' && $session->user_level != 'Pembimbing') {
      return [];
    }
    $db      = $this->db;
    $builder = $db->table('jadwal_pkl a');
    $builder->select("a.*, 
                      b.nama nama_perusahaan,
                      c.nama nama_pembimbing,
                      d.nama nama_admin")
      ->join("perusahaan b", "a.id_perusahaan = b.id")
      ->join("pembimbing c", "a.ni_pembimbing = c.nomor_induk")
      ->join("admin d", "a.ni_admin = d.nomor_induk")
      ->where('a.deleted_at IS NOT', null);
    if ($id) {
      $builder->where('a.id', $id);
    }

    // return $builder->get()->getResult();
    return $builder->getCompiledSelect();
  }

  public function getFields()
  {
    $db       = $this->db;
    return $db->getFieldNames('jadwal_pkl');
  }
}
