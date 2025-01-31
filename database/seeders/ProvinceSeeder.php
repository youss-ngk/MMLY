<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            // Tangier-Tetouan-Al Hoceima
            [
                'name_ar' => 'عمالة طنجة',
                'name_en' => 'Prefecture of Tangier',
                'region_name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],
            [
                'name_ar' => 'عمالة تطوان',
                'name_en' => 'Prefecture of Tetouan',
                'region_name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],
            [
                'name_ar' => 'إقليم الفحص أنجرة',
                'name_en' => 'Fahs-Anjra Province',
                'region_name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],
            [
                'name_ar' => 'إقليم العرائش',
                'name_en' => 'Larache Province',
                'region_name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],
            [
                'name_ar' => 'إقليم الحسيمة',
                'name_en' => 'Al Hoceima Province',
                'region_name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],
            [
                'name_ar' => 'إقليم تازة',
                'name_en' => 'Taza Province',
                'region_name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],
            [
                'name_ar' => 'إقليم شفشاون',
                'name_en' => 'Chefchaouen Province',
                'region_name_en' => 'Tangier-Tetouan-Al Hoceima',
            ],

            // Oriental Region
            [
                'name_ar' => 'عمالة وجدة أنكاد',
                'name_en' => 'Prefecture of Oujda-Angad',
                'region_name_en' => 'Oriental',
            ],
            [
                'name_ar' => 'إقليم الناظور',
                'name_en' => 'Nador Province',
                'region_name_en' => 'Oriental',
            ],
            [
                'name_ar' => 'إقليم تاوريرت',
                'name_en' => 'Taourirt Province',
                'region_name_en' => 'Oriental',
            ],
            [
                'name_ar' => 'إقليم جرسيف',
                'name_en' => 'Guercif Province',
                'region_name_en' => 'Oriental',
            ],
            [
                'name_ar' => 'إقليم بركان',
                'name_en' => 'Berkane Province',
                'region_name_en' => 'Oriental',
            ],

            // Fez-Meknes
            [
                'name_ar' => 'عمالة فاس',
                'name_en' => 'Prefecture of Fez',
                'region_name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'عمالة مكناس',
                'name_en' => 'Prefecture of Meknes',
                'region_name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'إقليم الحاجب',
                'name_en' => 'El Hajeb Province',
                'region_name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'إقليم إفران',
                'name_en' => 'Ifrane Province',
                'region_name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'إقليم مولاي يعقوب',
                'name_en' => 'Moulay Yacoub Province',
                'region_name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'إقليم صفرو',
                'name_en' => 'Sefrou Province',
                'region_name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'إقليم البولمان',
                'name_en' => 'Boulemane Province',
                'region_name_en' => 'Fez-Meknes',
            ],
            [
                'name_ar' => 'إقليم تاونات',
                'name_en' => 'Taounate Province',
                'region_name_en' => 'Fez-Meknes',
            ],

            // Rabat-Sale-Kenitra
            [
                'name_ar' => 'عمالة الرباط',
                'name_en' => 'Prefecture of Rabat',
                'region_name_en' => 'Rabat-Sale-Kenitra',
            ],
            [
                'name_ar' => 'عمالة سلا',
                'name_en' => 'Prefecture of Sale',
                'region_name_en' => 'Rabat-Sale-Kenitra',
            ],
            [
                'name_ar' => 'عمالة القنيطرة',
                'name_en' => 'Prefecture of Kenitra',
                'region_name_en' => 'Rabat-Sale-Kenitra',
            ],
            [
                'name_ar' => 'إقليم الخميسات',
                'name_en' => 'Khemisset Province',
                'region_name_en' => 'Rabat-Sale-Kenitra',
            ],
            [
                'name_ar' => 'إقليم سيدي قاسم',
                'name_en' => 'Sidi Kacem Province',
                'region_name_en' => 'Rabat-Sale-Kenitra',
            ],
            [
                'name_ar' => 'إقليم سیدی سليمان',
                'name_en' => 'Sidi Slimane Province',
                'region_name_en' => 'Rabat-Sale-Kenitra',
            ],

            // Beni Mellal-Khenifra
            [
                'name_ar' => 'عمالة بني ملال',
                'name_en' => 'Prefecture of Beni Mellal',
                'region_name_en' => 'Beni Mellal-Khenifra',
            ],
            [
                'name_ar' => 'إقليم خنيفرة',
                'name_en' => 'Khenifra Province',
                'region_name_en' => 'Beni Mellal-Khenifra',
            ],
            [
                'name_ar' => 'إقليم أزيلال',
                'name_en' => 'Azilal Province',
                'region_name_en' => 'Beni Mellal-Khenifra',
            ],
            [
                'name_ar' => 'إقليم الفقيه بن صالح',
                'name_en' => 'Fquih Ben Salah Province',
                'region_name_en' => 'Beni Mellal-Khenifra',
            ],

            // Casablanca-Settat
            [
                'name_ar' => 'عمالة الدار البيضاء',
                'name_en' => 'Prefecture of Casablanca',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم المحمدية',
                'name_en' => 'Mohammedia Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم عين السبع الحي المحمدي',
                'name_en' => 'Ain Sebaa-Hay Mohammadi Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم البرنوصي',
                'name_en' => 'Sidi Bernoussi Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم مولاي رشيد',
                'name_en' => 'Moulay Rachid Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم بن مسيك سباتة',
                'name_en' => 'Ben Msik Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم عين الشق',
                'name_en' => 'Ain Chock Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم الفداء',
                'name_en' => 'Al Fida Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم انفا',
                'name_en' => 'Anfa Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم الحي الحسني',
                'name_en' => 'Hay Hassani Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم النواصر',
                'name_en' => 'Nouaceur Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم مديونه',
                'name_en' => 'Mediouna Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'اقليم سطات',
                'name_en' => 'Settat Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم الجديدة',
                'name_en' => 'El Jadida Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم سيدي بنور',
                'name_en' => 'Sidi Bennour Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم برشيد',
                'name_en' => 'Berrechid Province',
                'region_name_en' => 'Casablanca-Settat',
            ],
            [
                'name_ar' => 'إقليم بنسليمان',
                'name_en' => 'Benslimane Province',
                'region_name_en' => 'Casablanca-Settat',
            ],

            // Marrakech-Safi
            [
                'name_ar' => 'عمالة مراكش',
                'name_en' => 'Prefecture of Marrakech',
                'region_name_en' => 'Marrakech-Safi',
            ],
            [
                'name_ar' => 'عمالة آسفي',
                'name_en' => 'Prefecture of Safi',
                'region_name_en' => 'Marrakech-Safi',
            ],
            [
                'name_ar' => 'إقليم الحوز',
                'name_en' => 'Al Haouz Province',
                'region_name_en' => 'Marrakech-Safi',
            ],
            [
                'name_ar' => 'إقليم شيشاوة',
                'name_en' => 'Chichaoua Province',
                'region_name_en' => 'Marrakech-Safi',
            ],
            [
                'name_ar' => 'إقليم الصويرة',
                'name_en' => 'Essaouira Province',
                'region_name_en' => 'Marrakech-Safi',
            ],
            [
                'name_ar' => 'إقليم قلعة السراغنة',
                'name_en' => 'El Kelaa des Sraghna Province',
                'region_name_en' => 'Marrakech-Safi',
            ],

            // Draa-Tafilalet
            [
                'name_ar' => 'إقليم ورزازات',
                'name_en' => 'Ouarzazate Province',
                'region_name_en' => 'Draa-Tafilalet',
            ],
            [
                'name_ar' => 'إقليم الراشيدية',
                'name_en' => 'Errachidia Province',
                'region_name_en' => 'Draa-Tafilalet',
            ],
            [
                'name_ar' => 'إقليم ميدلت',
                'name_en' => 'Midelt Province',
                'region_name_en' => 'Draa-Tafilalet',
            ],
            [
                'name_ar' => 'إقليم تينغير',
                'name_en' => 'Tinghir Province',
                'region_name_en' => 'Draa-Tafilalet',
            ],

            // Souss-Massa
            [
                'name_ar' => 'عمالة أكادير إدا وتنان',
                'name_en' => 'Prefecture of Agadir-Ida Ou Tanane',
                'region_name_en' => 'Souss-Massa',
            ],
            [
                'name_ar' => 'عمالة إنزكان آيت ملول',
                'name_en' => 'Prefecture of Inezgane-Ait Melloul',
                'region_name_en' => 'Souss-Massa',
            ],
            [
                'name_ar' => 'إقليم تارودانت',
                'name_en' => 'Taroudannt Province',
                'region_name_en' => 'Souss-Massa',
            ],
            [
                'name_ar' => 'إقليم تيزنيت',
                'name_en' => 'Tiznit Province',
                'region_name_en' => 'Souss-Massa',
            ],
            [
                'name_ar' => 'إقليم سيدي إفني',
                'name_en' => 'Sidi Ifni Province',
                'region_name_en' => 'Souss-Massa',
            ],

            // Guelmim-Oued Noun
            [
                'name_ar' => 'إقليم كلميم',
                'name_en' => 'Guelmim Province',
                'region_name_en' => 'Guelmim-Oued Noun',
            ],
            [
                'name_ar' => 'إقليم أسا الزاك',
                'name_en' => 'Assa-Zag Province',
                'region_name_en' => 'Guelmim-Oued Noun',
            ],
            [
                'name_ar' => 'إقليم طاطا',
                'name_en' => 'Tata Province',
                'region_name_en' => 'Guelmim-Oued Noun',
            ],
            [
                'name_ar' => 'إقليم العيون',
                'name_en' => 'Laayoune Province',
                'region_name_en' => 'Guelmim-Oued Noun',
            ],

            // Laayoune-Sakia El Hamra
            [
                'name_ar' => 'عمالة العيون',
                'name_en' => 'Prefecture of Laayoune',
                'region_name_en' => 'Laayoune-Sakia El Hamra',
            ],
            [
                'name_ar' => 'عمالة الساقية الحمراء',
                'name_en' => 'Prefecture of Es-Semara',
                'region_name_en' => 'Laayoune-Sakia El Hamra',
            ],
            [
                'name_ar' => 'إقليم طرفاية',
                'name_en' => 'Tarfaya Province',
                'region_name_en' => 'Laayoune-Sakia El Hamra',
            ],

            // Dakhla-Oued Ed-Dahab
            [
                'name_ar' => 'عمالة الداخلة',
                'name_en' => 'Prefecture of Dakhla',
                'region_name_en' => 'Dakhla-Oued Ed-Dahab',
            ],
        ];

        foreach ($provinces as $provinceData) {
            $region = Region::where('name_en', $provinceData['region_name_en'])->first();
            if ($region) {
                Province::create([
                    'name_ar' => $provinceData['name_ar'],
                    'name_en' => $provinceData['name_en'],
                    'region_id' => $region->id,
                ]);
            }
        }
    }
}
