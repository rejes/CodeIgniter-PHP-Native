<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KategoriFotoSeeder extends Seeder
{
    public function run()
    {
        $data = [   
            [
                'nama_kategori' => 'Pengajian',
                'slug' => 'pengajian',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama_kategori' => 'Bukber',
                'slug' => 'bukber',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama_kategori' => 'Rapat Pengurus',
                'slug' => 'rapat-pengurus',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama_kategori' => 'Pesantren Kilat',
                'slug' => 'pesantren-kilat',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama_kategori' => 'Kurban',
                'slug' => 'kurban',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        $this->db->table('kategori_foto')->insertBatch($data);
    }
}
