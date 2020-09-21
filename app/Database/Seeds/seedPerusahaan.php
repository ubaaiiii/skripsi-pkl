<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class seedPerusahaan extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
          $faker = \Faker\Factory::create('id_ID');
          $data = [];
          for ($i=0; $i < 20; $i++) {
            array_push($data,[
              'nama'          =>  $faker->name,
              'alamat'        =>  $faker->address,
              'notelp'        =>  $faker->phoneNumber,
            ]);
          }
          $this->db->table('perusahaan')->insertBatch($data);
        }
}
