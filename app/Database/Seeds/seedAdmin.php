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
          for ($i=0; $i < $count; $i++) {
            $faker->seed($i);
            if ($jenkel == 'male') {
              $jenkel     = 'female';
              $jenkelnya  = 'P';
            } else {
              $jenkel     = 'male';
              $jenkelnya  = 'L';
            }
            array_push($data,[
              'nama'          =>  $faker->name($jenkel),
              'jenis_kelamin' =>  $jenkelnya,
              'nomor_induk'   =>  $faker->nik($jenkel),
              'jabatan'       =>  'guru',
              'email'         =>  $faker->freeEmail($jenkel),
              'alamat'        =>  $faker->address,
              'foto'          =>  'foto-guru-'.$faker->numberBetween(1, 35).".jpg",
              'created_at'    =>  Time::instance($faker->dateTimeBetween('-1 years','now','Asia/Jakarta')),
              'updated_at'    =>  Time::now()
            ]);
          }
          $this->db->table('admin')->insertBatch($data);
        }
}
