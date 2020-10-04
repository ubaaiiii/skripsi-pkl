<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class seedPembimbing extends \CodeIgniter\Database\Seeder
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
        $foto       = 'avatar-s-' . $faker->numberBetween(14, 25) . ".jpg";
      } else {
        $jenkel     = 'male';
        $jenkelnya  = 'L';
        $foto       = 'avatar-s-' . $faker->numberBetween(1, 13) . ".jpg";
      }
      array_push($data, [
        'nomor_induk'   =>  $faker->nik($jenkel),
        'nama'          =>  $faker->name($jenkel),
        'jenis_kelamin' =>  $jenkelnya,
        'email'         =>  $faker->freeEmail($jenkel),
        'notelp'        =>  str_replace("(+62)", "08", str_replace(" ", "", $faker->phoneNumber)),
        'alamat'        =>  $faker->address,
        'id_perusahaan' =>  $faker->numberBetween(1, 20),
        'foto'          =>  $foto,
        'created_at'    =>  Time::instance($faker->dateTimeBetween('-1 years', 'now', 'Asia/Jakarta')),
        'updated_at'    =>  Time::now()
      ]);
    }
    $this->db->table('pembimbing')->insertBatch($data);
  }
}
