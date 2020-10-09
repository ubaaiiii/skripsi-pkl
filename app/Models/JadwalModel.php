<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
  protected $table          = 'jadwal';
  protected $primaryKey     = 'id';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'ni_siswa',
    'id_perusahaan',
    'ni_pembimbing',
    'ni_penyalur',
    'jadwal_mulai',
    'jadwal_selesai',
    'jumlah_bulan',
    'tgl_diselesaikan',
    'catatan',
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
                      b.nama      'nm_siswa',
                      b.foto      'ft_siswa',
                      b.status    'status',
                      c.nama      'nm_perusahaan',
                      d.nama      'nm_pembimbing',
                      d.foto      'ft_pembimbing',
                      e.nama      'nm_admin',
                      e.foto      'ft_admin'
                    ")
      ->join("siswa b", "a.ni_siswa = b.nomor_induk")
      ->join("perusahaan c", "a.id_perusahaan = c.id")
      ->join("pembimbing d", "a.ni_pembimbing = d.nomor_induk")
      ->join("admin e", "a.ni_penyalur = e.nomor_induk")
      ->where('a.deleted_at', null);
    if ($id) {
      $builder->where('a.id', $id);
    }

    return $builder->get()->getResult();
  }

  public function trashJadwal($id = false)
  {
    $db      = $this->db;
    $builder = $db->table('jadwal_pkl a');
    $builder->select("a.*, b.nama 'nm_siswa', c.nama 'nm_perusahaan', d.nama 'nm_pembimbing', e.nama 'nm_admin'")
      ->join("siswa b", "a.ni_siswa = b.nomor_induk")
      ->join("perusahaan c", "a.id_perusahaan = c.id")
      ->join("pembimbing d", "a.ni_pembimbing = d.nomor_induk")
      ->join("admin e", "a.ni_penyalur = e.nomor_induk")
      ->where('a.deleted_at IS NOT NULL');
    if ($id) {
      $builder->where('a.id', $id);
    }

    return $builder->get()->getResult();
  }

  public function getFields()
  {
    $db       = $this->db;
    return $db->getFieldNames('jadwal_pkl');
  }
}
