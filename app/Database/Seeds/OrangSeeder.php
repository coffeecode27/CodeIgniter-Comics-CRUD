<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // $data = [

        // [
        //     'nama'       => 'T.Imam Suranda',
        //     'alamat'     => 'Kota Banda Aceh',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        // ],

        // [

        //     'nama'       => 'Agus Hidayatullah',
        //     'alamat'     => 'Kota Banda Aceh',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        // ],


        // [

        //     'nama'       => 'Deni Rahman Azhari',
        //     'alamat'     => 'Kota Banda Aceh',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()



        // ]

            
        // ];

             $faker = \Faker\Factory::create('id_ID');

             for($i=0; $i < 20; $i++) {

            $data = [

                    'nama'       => $faker->name,
                    'alamat'     => $faker->address,
                    'created_at' => Time::createFromTimestamp($faker->unixTime()),
                    'updated_at' => Time::now()
            ];

            $this->db->table('orang')->insert($data);
        }


        // Simple Queries
        // $this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at)
        // VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        // insert biasa hanya bisa insert satu data
        // $this->db->table('orang')->insert($data);

        // insert batch untuk menginsert data lebih dari satu
        // $this->db->table('orang')->insertBatch($data);
    }
}