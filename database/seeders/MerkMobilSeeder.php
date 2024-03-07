<?php

namespace Database\Seeders;

use App\Models\merkMobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerkMobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'merkID' => 'SUZ12',
                'nama' => 'Suzuki',
            ],
            [
                'merkID' => 'TOY25',
                'nama' => 'Toyota',
            ],
            [
                'merkID' => 'DAI99',
                'nama' => 'Daihatsu',
            ],
            [
                'merkID' => 'NIS78',
                'nama' => 'Nissan',
            ],
            [
                'merkID' => 'MIT58',
                'nama' => 'Mitsubishi',
            ],
            [
                'merkID' => 'SUB25',
                'nama' => 'Subaru',
            ],
            [
                'merkID' => 'LEX44',
                'nama' => 'Lexus',
            ],
            [
                'merkID' => 'BMW89',
                'nama' => 'BMW',
            ],
            [
                'merkID' => 'ISU17',
                'nama' => 'Isuzu',
            ],
            [
                'merkID' => 'PEU47',
                'nama' => 'Peugeot',
            ],
            [
                'merkID' => 'WUL74',
                'nama' => 'Wuling',
            ],
            [
                'merkID' => 'CHE58',
                'nama' => 'Chery',
            ],
            [
                'merkID' => 'MER44',
                'nama' => 'Mercedes-Benz',
            ],
            [
                'merkID' => 'HON21',
                'nama' => 'Honda',
            ],
            [
                'merkID' => 'MAZ47',
                'nama' => 'Mazda',
            ],
            [
                'merkID' => 'HYU12',
                'nama' => 'Hyundai',
            ],
            [
                'merkID' => 'KIA45',
                'nama' => 'KIA',
            ],
            [
                'merkID' => 'DFS58',
                'nama' => 'DFSK',
            ],
            [
                'merkID' => 'CHR87',
                'nama' => 'Chrysler',
            ],
            [
                'merkID' => 'CHE78',
                'nama' => 'Chevrolet',
            ],
            [
                'merkID' => 'FOR78',
                'nama' => 'Ford',
            ],
            [
                'merkID' => 'JAG77',
                'nama' => 'Jaguar',
            ],
            [
                'merkID' => 'AUD78',
                'nama' => 'Audi',
            ],
            [
                'merkID' => 'INF44',
                'nama' => 'Infiniti',
            ],
            [
                'merkID' => 'NET45',
                'nama' => 'Neta',
            ],
            [
                'merkID' => 'BYD78',
                'nama' => 'BYD',
            ],
            [
                'merkID' => 'MG767',
                'nama' => 'MG',
            ],
            [
                'merkID' => 'JEE87',
                'nama' => 'Jeep',
            ],
            [
                'merkID' => 'VOL78',
                'nama' => 'Volvo',
            ],
            [
                'merkID' => 'FIA67',
                'nama' => 'Fiat',
            ],
            [
                'merkID' => 'REN55',
                'nama' => 'Renault',
            ],
            [
                'merkID' => 'TES45',
                'nama' => 'Tesla',
            ],
            [
                'merkID' => 'VW885',
                'nama' => 'Volkswagen',
            ],
            [
                'merkID' => 'LAN87',
                'nama' => 'Land Rover',
            ],
        ];

        foreach($data as $value){
            merkMobil::create($value);
        }
    }
}
