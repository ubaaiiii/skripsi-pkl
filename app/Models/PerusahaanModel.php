<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
  protected $table          = 'perusahaan';
  protected $primaryKey     = 'id';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'nama',
    'alamat',
    'notelp',
    'logo',
    'deleted_at',
  ];
  protected $tempReturnType  = 'object';
  protected $useTimestamps   = true;
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function simpanGambar($img)
  {
    if ($img->isValid() && !$img->hasMoved()) {
      $newName = $img->getRandomName();
      $img->move('images/perusahaan', $newName);
    }
    return $newName;
  }

  public function getFields()
  {
    $db       = $this->db;
    return $db->getFieldNames('perusahaan');
  }

  public function tablePerusahaan($id = false)
  {
    $db     = $this->db;
    $sql    = 'SELECT b.*,
                        Group_concat(Concat(a.nomor_induk, "|", a.nama, "|", a.foto) SEPARATOR ",") as karyawan
                  FROM   pembimbing a
                        INNER JOIN perusahaan b
                                ON a.id_perusahaan = b.id 
                  WHERE  b.deleted_at IS NULL ';
    if ($id) {
      $sql  .= 'AND a.id_perusahaan = "$id" ';
    };

    $sql    .= 'GROUP  BY id_perusahaan ';
    $builder  = $db->query($sql);

    return $builder->getResult();
    // return $builder->getCompiledSelect();
  }
}
