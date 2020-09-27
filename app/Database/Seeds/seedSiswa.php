<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class seedSiswa extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
          $faker = \Faker\Factory::create('id_ID');
          $data = [];
          for ($i=0; $i < 1000; $i++) {
            $faker->seed($i);
            array_push($data,[
              'nomor_induk'   =>  $faker->isbn10,
              'nama'          =>  $faker->name,
              'jenis_kelamin' =>  $faker->randomElement(['L','P']),
              'alamat'        =>  $faker->address,
              'email'         =>  $faker->email,
              'kelas'         =>  $faker->randomElement([
                                    'X AK 1',
                                    'X AK 2',
                                    'X AK 3',
                                    'X AP 1',
                                    'X AP 2',
                                    'X AP 3',
                                    'X RPL 1',
                                    'X RPL 2',
                                    'X RPL 3',
                                    'XI AK 1',
                                    'XI AK 2',
                                    'XI AK 3',
                                    'XI AP 1',
                                    'XI AP 2',
                                    'XI AP 3',
                                    'XI RPL 1',
                                    'XI RPL 2',
                                    'XI RPL 3',
                                    'XII AK 1',
                                    'XII AK 2',
                                    'XII AK 3',
                                    'XII AP 1',
                                    'XII AP 2',
                                    'XII AP 3',
                                    'XII RPL 1',
                                    'XII RPL 2',
                                    'XII RPL 3'
                                  ]),
              'foto'          =>  'foto-siswa-'.$faker->numberBetween(1, 77).".jpg",
              'status'        =>  $faker->numberBetween(0, 3),
              'created_at'    =>  Time::createFromTimeStamp($faker->unixTime()),
              'updated_at'    =>  Time::now()
            ]);
          }
          $this->db->table('siswa')->insertBatch($data);
        }
}
