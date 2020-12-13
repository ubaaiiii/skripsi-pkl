<?php

namespace App\Models;

use CodeIgniter\Model;

class PembimbingModel extends Model
{
  protected $table          = 'pembimbing';
  protected $primaryKey     = 'nomor_induk';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'nomor_induk',
    'nama',
    'jenis_kelamin',
    'email',
    'notelp',
    'alamat',
    'id_perusahaan',
    'foto',
    'deleted_at',
  ];
  protected $tempReturnType  = 'object';
  protected $useTimestamps   = true;
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function tablePembimbing($ni = false)
  {
    $db      = $this->db;
    $builder = $db->table('pembimbing a');
    $builder->select("a.*, b.nama 'perusahaan', c.msdesc 'jkel'")
      ->join("perusahaan b", "a.id_perusahaan = b.id")
      ->join("master c", "a.jenis_kelamin = c.msid AND c.mstype = 'jkel'")
      ->where('a.deleted_at', null);
    if ($ni) {
      $builder->where('nomor_induk', $ni);
    }

    return $builder->get()->getResult();
  }

  public function trashPembimbing($ni = false)
  {
    $db      = $this->db;
    $builder = $db->table('pembimbing a');
    $builder->select("a.*, b.nama 'perusahaan'")
      ->join("perusahaan b", "a.id_perusahaan = b.id")
      ->where('a.deleted_at IS NOT NULL');
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

  public function getFields()
  {
    $db       = $this->db;
    return $db->getFieldNames('pembimbing');
  }

  public function validasi($nis, $perusahaan)
  {
    $db      = $this->db;
    $builder = $db->table('pembimbing');
    $builder->select("*")
      ->where('nomor_induk', $nis)
      ->where('id_perusahaan', $perusahaan);
    if ($builder->countAllResults() !== 0) {
      $builder->select("*")
        ->where('nomor_induk', $nis)
        ->where('id_perusahaan', $perusahaan)
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
