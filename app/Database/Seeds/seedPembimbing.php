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
              'nomor_induk'   =>  $faker->nik($jenkel),
              'nama'          =>  $faker->name($jenkel),
              'jenis_kelamin' =>  $jenkelnya,
              'email'         =>  $faker->freeEmail($jenkel),
              'notelp'        =>  str_replace("(+62)","021",str_replace(" ","",$faker->phoneNumber)),
              'alamat'        =>  $faker->address,
              'id_perusahaan' =>  $faker->numberBetween(1, 20),
              'foto'          =>  'avatar-s-'.$faker->numberBetween(1, 26).".jpg",
              'verified'      =>  $faker->numberBetween(0, 1),
              'created_at'    =>  Time::instance($faker->dateTimeBetween('-1 years','now','Asia/Jakarta')),
              'updated_at'    =>  Time::now()
            ]);
          }
          $this->db->table('pembimbing')->insertBatch($data);
        }
}
