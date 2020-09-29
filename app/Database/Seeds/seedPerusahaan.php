<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class seedPerusahaan extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
          $faker  = \Faker\Factory::create('id_ID');
          $data   = [];
          $count  = 20;
          for ($i=0; $i < $count; $i++) {
            $faker->seed($i);
            array_push($data,[
              'nama'          =>  $faker->company(),
              'alamat'        =>  $faker->address,
              'notelp'        =>  str_replace("(+62)","021",str_replace(" ","",$faker->phoneNumber)),
              'created_at'    =>  Time::instance($faker->dateTimeBetween('-1 years','now','Asia/Jakarta')),
              'updated_at'    =>  Time::now()
            ]);
          }
          $this->db->table('perusahaan')->insertBatch($data);
        }
}
