<?php namespace App\Models;

use CodeIgniter\Model;
class AdminModel extends Model
{
    protected $table          = 'admin';
    protected $primaryKey     = 'nomor_induk';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
                                  'nomor_induk',
                                  'nama',
                                  'jenis_kelamin',
                                  'jabatan',
                                  'notelp',
                                  'email',
                                  'alamat',
                                  'foto',
                                ];
    protected $tempReturnType  = 'object';
    protected $useTimestamps   = true;
    protected $db;

    public function __construct()
    {
      $this->db = \Config\Database::connect();
    }

    public function tableAdmin($ni = false)
    {
      $db      = $this->db;
      $builder = $db->table('admin a');
      $builder->select("a.*, b.msdesc 'jbtn'")
              ->join("master b","a.jabatan = b.msid AND b.mstype = 'jabatan'")
              ->where('deleted_at',null);
      if ($ni) {
        $builder->where('nomor_induk',$ni);
      }

      return $builder->get()->getResult();
    }

    public function trashAdmin($ni = false)
    {
      $db      = $this->db;
      $builder = $db->table('admin a');
      $builder->select("a.*, b.msdesc 'jbtn'")
              ->join("master b","a.jabatan = b.msid AND b.mstype = 'jabatan'")
              ->where('deleted_at IS NOT NULL');
      if ($ni) {
        $builder->where('nomor_induk',$ni);
      }

      return $builder->get()->getResult();
    }

    public function simpanGambar($img)
    {
      if ($img->isValid() && ! $img->hasMoved())
      {
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
              ->where('msid',$kode_kelas)
              ->where('mstype','kelas');
      $result = $builder->get()->getResult()[0];
      $kelasnya = explode(",",$result->msdesc)[0];
      if ($kelasnya == 'Kelas X') {
        return 0;
      } else {
        return 1;
      }
    }

    public function getFields()
    {
      $db       = $this->db;
      return $db->getFieldNames('admin');
    }

    public function fieldData()
    {
      $db       = $this->db;
      return $db->getFieldData('admin');
    }


}
