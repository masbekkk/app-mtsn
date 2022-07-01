<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use Faker\Factory as Faker;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Faker::create('id');
        // $data = Siswa::create('id');
        $i = 1;
        while($i <= 1000){
            Siswa::insert([
                'nisn' => $data->numerify('######'),
                'nama' => $nama = $data->text(20),
                'nama-slug' => \Str::slug($nama . '-' .$i),
                'kelas' => $data->text(5)
            ]);
            $i++;
        }
    }
}
