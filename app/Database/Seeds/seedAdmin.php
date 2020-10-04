<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class seedAdmin extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $faker  = \Faker\Factory::create('id_ID');
    $data   = [];
    $jenkel = 'male';
    $count  = 100;
    for ($i = 0; $i < $count; $i++) {
      $faker->seed($i);
      if ($jenkel == 'male') {
        $jenkel     = 'female';
        $jenkelnya  = 'P';
        $foto       = 'foto-guru-' . $faker->numberBetween(20, 36) . ".jpg";
      } else {
        $jenkel     = 'male';
        $jenkelnya  = 'L';
        $foto       = 'foto-guru-' . $faker->numberBetween(1, 19) . ".jpg";
      }
      array_push($data, [
        'nama'          =>  $faker->name($jenkel),
        'jenis_kelamin' =>  $jenkelnya,
        'nomor_induk'   =>  $faker->nik($jenkel),
        'jabatan'       =>  'guru',
        'email'         =>  $faker->freeEmail($jenkel),
        'alamat'        =>  $faker->address,
        'notelp'        =>  str_replace("(+62)", "021", str_replace(" ", "", $faker->phoneNumber)),
        'foto'          =>  $foto,
        'created_at'    =>  Time::instance($faker->dateTimeBetween('-1 years', 'now', 'Asia/Jakarta')),
        'updated_at'    =>  Time::now()
      ]);
    }
    $this->db->table('admin')->insertBatch($data);
  }
}
