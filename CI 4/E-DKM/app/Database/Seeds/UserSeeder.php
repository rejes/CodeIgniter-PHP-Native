<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {	
		$data = [
            [
                'name' => 'Dede Inoen',
                'username'    => 'superadmin',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'level' => 1,
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => 'Ridho Aditya',
                'username'    => 'ridho',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'level' => 2,
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ],
            [
                'name' => 'Sandhika Maulana',
                'username'    => 'sandhika',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'level' => 2,
                'created_at' => Time::createFromTimestamp(static::faker()->unixTime),
                'updated_at' => Time::now()
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
