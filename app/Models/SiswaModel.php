<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
  protected $table          = 'siswa';
  protected $primaryKey     = 'nomor_induk';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'nomor_induk',
    'nama',
    'jenis_kelamin',
    'alamat',
    'absensi',
    'email',
    'kelas',
    'id_pembimbing',
    'id_perusahaaan',
    'foto',
    'status',
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

  public function tableSiswa($ni = false)
  {
    $session = $this->session;
    if ($session->user_level !== 'Admin' || $session->user_level !== 'Pembimbing') {
    }
    $db      = $this->db;
    $builder = $db->table('siswa a');
    $builder->select("a.*, b.msdesc 'stats', c.msdesc 'klas', d.msdesc 'jkel', f.nama 'perusahaan', e.id 'jadwal_id'")
      ->join("master b", "a.status = b.msid")
      ->join("master c", "a.kelas = c.msid")
      ->join("master d", "a.jenis_kelamin = d.msid")
      ->join("jadwal_pkl e", "e.ni_siswa like concat('%', a.nomor_induk, '%')", 'left')
      ->join("perusahaan f", "e.id_perusahaan = f.id", 'left')
      ->where('a.deleted_at', null);
    if ($ni) {
      $builder->where('a.nomor_induk', $ni);
    }
    return $builder->get()->getResult();
  }

  public function trashSiswa($ni = false)
  {
    $db      = $this->db;
    $builder = $db->table('siswa a');
    $builder->select("a.*, b.msdesc 'stats', c.msdesc 'klas'")
      ->join("master b", "a.status = b.msid")
      ->join("master c", "a.kelas = c.msid")
      ->where('deleted_at IS NOT NULL');
    if ($ni) {
      $builder->where('nomor_induk', $ni);
    }

    return $builder->get()->getResult();
  }

  public function simpanGambar($img)
  {
    if ($img->isValid() && !$img->hasMoved()) {
      $newName = $img->getRandomName();
      $img->move('images/users', $newName);
    }
    return $newName;
  }

  public function cekSyarat($kode_kelas)
  {
    $db      = $this->db;
    $builder = $db->table('master');
    $builder->select('*')
      ->where('msid', $kode_kelas)
      ->where('mstype', 'kelas');
    $result = $builder->get()->getResult()[0];
    $kelasnya = explode(",", $result->msdesc)[0];
    if ($kelasnya == 'Kelas X') {
      return 0;
    } else {
      return 1;
    }
  }

  public function getFields()
  {
    $db       = $this->db;
    return $db->getFieldNames('siswa');
  }

  public function validasi($nis, $kelas)
  {
    $db      = $this->db;
    $builder = $db->table('siswa');
    $builder->select("*")
      ->where('nomor_induk', $nis)
      ->where('kelas', $kelas);
    if ($builder->countAllResults() !== 0) {
      $builder->select("*")
        ->where('nomor_induk', $nis)
        ->where('kelas', $kelas)
        ->where('email IS NOT NULL');
      if ($builder->countAllResults() !== 0) {
        return "activated";
      } else {
        return "validate";
      }
    } else {
      return false;
    }
  }
}
