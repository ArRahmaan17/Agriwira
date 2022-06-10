<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 50; $i++) { 
            $data = [
                'nama' => $faker->name($gender = 'male'|'female'),
                'penerima' => $faker->randomNumber(2, false),
                'jumlah' => $faker->randomNumber(4, true),
                'hargasatuan' => $faker->numerify('Rp.#####'),
                'dimensi' => $faker->randomElement(['Lt','Kg','Pcs']),
                'tanggalmasuk' => $faker->date(),
            ];
            // $this->db->query("INSERT INTO pesanan (nama, barang, jumlah, tanggalmasuk, status) VALUES(:nama:, :barang:, :jumlah:, :tanggalmasuk:, :status:)", $data);
            // Using Query Builder
            $this->db->table('barangmasuk')->insert($data);
        }
    }
}
