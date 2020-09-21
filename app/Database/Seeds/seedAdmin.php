<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class seedAdmin extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
          $faker = \Faker\Factory::create('id_ID');
          $data = [];
          for ($i=0; $i < 100; $i++) {
            array_push($data,[
              'nama'          =>  $faker->name,
              'nomor_induk'   =>  $faker->isbn10,
              'jabatan'       =>  'guru',
              'created_at'    =>  Time::createFromTimeStamp($faker->unixTime()),
              'updated_at'    =>  Time::now()
            ]);
          }
          $this->db->table('admin')->insertBatch($data);
        }
}
