<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
  protected $table          = 'nilai_pkl';
  protected $primaryKey     = 'id';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'ni_siswa',
    'id_jadwal',
    'absensi',
    'job_training',
    'nilai',
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

  public function tableNilai($id = false)
  {
    $session = $this->session;
    if ($session->user_level != 'Admin' && $session->user_level != 'Pembimbing' && $session->user_level != 'Siswa') {
      return [];
    }
    $db      = $this->db;
    $builder = $db->table('nilai_pkl a');
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

  public function trashNilai($id = false)
  {
    $session = $this->session;
    if ($session->user_level != 'Admin' && $session->user_level != 'Pembimbing' && $session->user_level != 'Siswa') {
      return [];
    }
    $db      = $this->db;
    $builder = $db->table('nilai_pkl a');
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

    return $builder->get()->getResult();
    // return $builder->getCompiledSelect();
  }

  public function getSurat($id)
  {
    $session = $this->session;
    if ($session->user_level != 'Admin' && $session->user_level != 'Pembimbing' && $session->user_level != 'Siswa') {
      return [];
    }
    $db      = $this->db;
    $builder = $db->table('nilai_pkl a');
    $builder->select("a.*, 
                      b.nama nama_perusahaan,
                      b.kota kota_perusahaan,
                      c.nama nama_pembimbing,
                      d.nama nama_admin,
                      e.*,
                      f.msdesc 'perihal',
                      h.msdesc jabatan_pejabat,
                      g.nama nama_pejabat,
                      ")
      ->join("perusahaan b", "a.id_perusahaan = b.id")
      ->join("pembimbing c", "a.ni_pembimbing = c.nomor_induk")
      ->join("admin d", "a.ni_admin = d.nomor_induk")
      ->join("ms_surat e", "a.nomor_surat = e.nomor_surat")
      ->join("master f", "e.perihal = f.msid AND f.mstype='perihal'")
      ->join("admin g", "e.ni_pejabat = g.nomor_induk")
      ->join("master h", "g.jabatan = h.msid AND h.mstype='jabatan'")
      ->where('a.deleted_at', null);
    if ($id) {
      $builder->where('a.id', $id);
    }

    return $builder->get()->getResult();
    // return $builder->getCompiledSelect();
  }

  public function getFields()
  {
    $db       = $this->db;
    return $db->getFieldNames('nilai_pkl');
  }
}
