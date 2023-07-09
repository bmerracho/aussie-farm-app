<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KangarooInfoModel;
use Faker\Factory as Faker;


class KangarooInfoSeeder extends Seeder
{
    public function run()
    {
        $oFaker = Faker::create();
        
        for ($i = 0; $i < 10; $i++) {
            KangarooInfoModel::create([
                'name' => $oFaker->unique()->firstName,
                'nickname' => $oFaker->randomElement([$oFaker->firstName, null]),
                'weight' => $oFaker->randomFloat(2, 1, 100),
                'height' => $oFaker->randomFloat(2, 0.5, 2),
                'gender' => $oFaker->randomElement(['male', 'female']),
                'color' => $oFaker->randomElement(['red', 'gray', 'light brown', 'brown', 'dark brown', null]),
                'friendliness' => $oFaker->randomElement(['friendly', 'not friendly', null]),
                'birthday' => $oFaker->dateTimeThisDecade('-2 years'),
            ]);
        }
    }
}
