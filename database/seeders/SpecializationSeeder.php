<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    public function run(): void
    {
        $specializations = [
            ['name_ar' => 'اللغة العربية', 'name_en' => 'Arabic Language', 'name_fr' => 'Langue arabe'],
            ['name_ar' => 'اللغة الفرنسية', 'name_en' => 'French Language', 'name_fr' => 'Langue française'],
            ['name_ar' => 'اللغة الإنجليزية', 'name_en' => 'English Language', 'name_fr' => 'Langue anglaise'],
            ['name_ar' => 'الرياضيات', 'name_en' => 'Mathematics', 'name_fr' => 'Mathématiques'],
            ['name_ar' => 'العلوم الفيزيائية', 'name_en' => 'Physical Sciences', 'name_fr' => 'Sciences physiques'],
            ['name_ar' => 'علوم الحياة والأرض', 'name_en' => 'Life and Earth Sciences', 'name_fr' => 'Sciences de la vie et de la terre'],
            ['name_ar' => 'التربية الإسلامية', 'name_en' => 'Islamic Education', 'name_fr' => 'Éducation islamique'],
            ['name_ar' => 'التاريخ والجغرافيا', 'name_en' => 'History and Geography', 'name_fr' => 'Histoire et géographie'],
            ['name_ar' => 'التربية البدنية', 'name_en' => 'Physical Education', 'name_fr' => 'Éducation physique'],
            ['name_ar' => 'المعلوميات', 'name_en' => 'Computer Science', 'name_fr' => 'Informatique'],
            ['name_ar' => 'التربية الفنية', 'name_en' => 'Art Education', 'name_fr' => 'Éducation artistique'],
            ['name_ar' => 'التربية الموسيقية', 'name_en' => 'Music Education', 'name_fr' => 'Éducation musicale'],
            ['name_ar' => 'الفلسفة', 'name_en' => 'Philosophy', 'name_fr' => 'Philosophie'],
            ['name_ar' => 'علم الاجتماع', 'name_en' => 'Sociology', 'name_fr' => 'Sociologie'],
            ['name_ar' => 'علم النفس', 'name_en' => 'Psychology', 'name_fr' => 'Psychologie'],
            ['name_ar' => 'الاقتصاد', 'name_en' => 'Economics', 'name_fr' => 'Économie'],
            ['name_ar' => 'القانون', 'name_en' => 'Law', 'name_fr' => 'Droit'],
            ['name_ar' => 'العلوم السياسية', 'name_en' => 'Political Science', 'name_fr' => 'Sciences politiques'],
            ['name_ar' => 'الإدارة', 'name_en' => 'Administration', 'name_fr' => 'Administration'],
            ['name_ar' => 'المحاسبة', 'name_en' => 'Accounting', 'name_fr' => 'Comptabilité']
        ];

        foreach ($specializations as $specialization) {
            Specialization::create($specialization);
        }
    }
}
