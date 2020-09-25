<?php namespace App\Models;

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
        $builder->where('mstype',$mstype);
      }

      return $builder->get()->getResult();
    }
}
