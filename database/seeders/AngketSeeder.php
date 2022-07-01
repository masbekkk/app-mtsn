<?php

namespace Database\Seeders;

use App\Models\Angket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AngketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(__DIR__ . '/angket.csv', 'r');
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {

            Angket::create([
                "angket" => $data[0],
                "kategori" => $data[1],
            ]);

        }
        fclose($csvFile);
    }
}
