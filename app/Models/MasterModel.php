<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
  protected $table          = 'master';
  protected $primaryKey     = 'msid';
  protected $useSoftDeletes = true;
  protected $allowedFields  = [
    'msid',
    'msdesc',
    'mstype'
  ];
  protected $useTimestamps   = true;

  public function __construct()
  {
  }

  public function getData($mstype = false)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('master');
    $builder->select("*");
    if ($mstype) {
      $builder->where('mstype', $mstype);
    }

    return $builder->get()->getResult();
  }

  public function getJurusan()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('master');
    $builder->distinct("SUBSTRING_INDEX(SUBSTRING_INDEX(msdesc,',',-2),',',1)");
    $builder->where('mstype', 'kelas');

    return $builder->get()->getResult();
  }

  public function getKelas()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('master');
    $builder->distinct("SUBSTRING_INDEX(msdesc,',',1)");
    $builder->where('mstype', 'kelas');

    return $builder->get()->getResult();
  }
}
