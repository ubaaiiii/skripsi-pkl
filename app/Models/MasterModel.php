<?php namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
    protected $table          = 'master';
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

    public function get($ni = false)
    {
      $db      = \Config\Database::connect();
      $builder = $db->table('siswa a');
      $builder->select("a.*, b.msdesc 'stats'")
              ->join("master b","a.status = b.msid");
      if ($ni) {
        $builder->where('nomor_induk',$ni);
      }

      return $builder->get()->getResult();
    }
}
