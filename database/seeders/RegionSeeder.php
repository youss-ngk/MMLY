<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'name_ar' => 'جهة طنجة تطوان الحسيمة',
                'name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],
            [
                'name_ar' => 'جهة الشرق',
                'name_en' => 'Oriental',
            ],
            [
                'name_ar' => 'جهة فاس مكناس',
                'name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'جهة الرباط سلا القنيطرة',
                'name_en' => 'Rabat-Sale-Kenitra',
            ],
            [
                'name_ar' => 'جهة بني ملال خنيفرة',
                'name_en' => 'Beni Mellal-Khenifra',
            ],
            [
                'name_ar' => 'جهة الدار البيضاء سطات',
                'name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'جهة مراكش آسفي',
                'name_en' => 'Marrakech-Safi',
            ],
            [
                'name_ar' => 'جهة درعة تافيلالت',
                'name_en' => 'Draa-Tafilalet',
            ],
            [
                'name_ar' => 'جهة سوس ماسة',
                'name_en' => 'Souss-Massa',
            ],
            [
                'name_ar' => 'جهة كلميم واد نون',
                'name_en' => 'Guelmim-Oued Noun',
            ],
            [
                'name_ar' => 'جهة العيون الساقية الحمراء',
                'name_en' => 'Laayoune-Sakia El Hamra',
            ],
            [
                'name_ar' => 'جهة الداخلة وادي الذهب',
                'name_en' => 'Dakhla-Oued Ed-Dahab',
            ],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
