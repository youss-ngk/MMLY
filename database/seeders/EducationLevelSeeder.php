<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    public function run(): void
    {
        $educationLevels = [
            ['name_ar' => 'بدون مستوى', 'name_en' => 'No Level', 'name_fr' => 'Sans niveau', 'level' => 1],
            ['name_ar' => 'ابتدائي', 'name_en' => 'Primary', 'name_fr' => 'Primaire', 'level' => 2],
            ['name_ar' => 'إعدادي', 'name_en' => 'Middle School', 'name_fr' => 'Collège', 'level' => 3],
            ['name_ar' => 'ثانوي', 'name_en' => 'High School', 'name_fr' => 'Lycée', 'level' => 4],
            ['name_ar' => 'إجازة', 'name_en' => 'Bachelor', 'name_fr' => 'Licence', 'level' => 5],
            ['name_ar' => 'ماستر', 'name_en' => 'Master', 'name_fr' => 'Master', 'level' => 6],
            ['name_ar' => 'دكتوراه', 'name_en' => 'PhD', 'name_fr' => 'Doctorat', 'level' => 7],
            ['name_ar' => 'دبلوم تقني متخصص', 'name_en' => 'Specialized Technical Diploma', 'name_fr' => 'Diplôme de technicien spécialisé', 'level' => 8],
            ['name_ar' => 'دبلوم تقني', 'name_en' => 'Technical Diploma', 'name_fr' => 'Diplôme de technicien', 'level' => 9],
            ['name_ar' => 'شهادة التأهيل المهني', 'name_en' => 'Professional Qualification Certificate', 'name_fr' => 'Certificat de qualification professionnelle', 'level' => 10],
            ['name_ar' => 'شهادة التخصص المهني', 'name_en' => 'Professional Specialization Certificate', 'name_fr' => 'Certificat de spécialisation professionnelle', 'level' => 11],
            ['name_ar' => 'دبلوم الدراسات العليا المعمقة', 'name_en' => 'Advanced Graduate Diploma', 'name_fr' => 'Diplôme des études supérieures approfondies', 'level' => 12],
            ['name_ar' => 'دبلوم الدراسات العليا المتخصصة', 'name_en' => 'Specialized Graduate Diploma', 'name_fr' => 'Diplôme des études supérieures spécialisées', 'level' => 13],
            ['name_ar' => 'دبلوم مهندس دولة', 'name_en' => 'State Engineer Diploma', 'name_fr' => 'Diplôme d\'ingénieur d\'État', 'level' => 14],
            ['name_ar' => 'إجازة مهنية', 'name_en' => 'Professional Bachelor', 'name_fr' => 'Licence professionnelle', 'level' => 15]
        ];

        foreach ($educationLevels as $educationLevel) {
            EducationLevel::create($educationLevel);
        }
    }
}
