<?php namespace App\Models;

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
      if ($img->isValid() && ! $img->hasMoved())
      {
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


}
