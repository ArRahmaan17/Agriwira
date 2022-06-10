<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PesanSeeder extends Seeder
{
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 50; $i++) { 
            $data = [
                'id_pegawai' => $faker->randomElement([1, 1]),
                'id_pelanggan' => $faker->randomElement([1, 1]),
                'id_barang'    => $faker->randomElement([1, 2]),
                'jumlah_barang' => $faker->randomNumber(4, true),
                'dimensi_barang' => $faker->randomElement(['Kg','Pcs']),
                'fotoproses'=> $faker->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
                'tanggalpesan' => $faker->date(),
                'status' => $faker->randomElement(['masuk','proses']),
            ];
            // $this->db->query("INSERT INTO pesanan (nama, barang, jumlah, tanggalmasuk, status) VALUES(:nama:, :barang:, :jumlah:, :tanggalmasuk:, :status:)", $data);
            // Using Query Builder
            $this->db->table('pesanan')->insert($data);
        }
    }
}
