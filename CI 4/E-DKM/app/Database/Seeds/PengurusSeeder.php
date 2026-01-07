<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PengurusSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $data = [
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Ketua',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Wakil Ketua',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Bendahara',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Sekertaris',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Ketua Bidang Dakwah',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Anggota Bidah Dakwah',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Ketua Bidang Pendidikan Dan Pelatihan',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Anggota Bidang Pendidikan Dan Pelatihan',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Ketua Bidang Organisasi dan Kelembagaan',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => $faker->name,
                'alamat'  => $faker->streetAddress,
                'no_telp' => '0812456789',
                'jabatan' => 'Anggota Bidang Organisasi dan Kelembagaan',
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
        ];

        $this->db->table('pengurus')->insertBatch($data);
    }
}
