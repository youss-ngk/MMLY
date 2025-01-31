<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    public function run(): void
    {
        Profession::create([
            'name_fr' => 'Enseignant',
            'name_ar' => 'أستاذ',
            'name_en' => 'Teacher'
        ]);

        Profession::create([
            'name_fr' => 'Directeur',
            'name_ar' => 'مدير',
            'name_en' => 'Director'
        ]);

        Profession::create([
            'name_fr' => 'Inspecteur',
            'name_ar' => 'مفتش',
            'name_en' => 'Inspector'
        ]);

        Profession::create([
            'name_fr' => 'Administrateur',
            'name_ar' => 'إداري',
            'name_en' => 'Administrator'
        ]);

        $professions = [
            ['name_ar' => 'التدريس الابتدائي', 'name_en' => 'Primary Education Teaching', 'name_fr' => 'Enseignement primaire'],
            ['name_ar' => 'التدريس الإعدادي', 'name_en' => 'Middle School Teaching', 'name_fr' => 'Enseignement secondaire'],
            ['name_ar' => 'التدريس التأهيلي', 'name_en' => 'High School Teaching', 'name_fr' => 'Enseignement secondaire'],
            ['name_ar' => 'متصرف تربوي', 'name_en' => 'Educational Administrator', 'name_fr' => 'Administrateur éducatif'],
            ['name_ar' => 'متصرف وزارة التربية الوطنية', 'name_en' => 'Ministry of Education Administrator', 'name_fr' => 'Administrateur du Ministère de l\'Éducation'],
            ['name_ar' => 'متصرف الأطر المشتركة', 'name_en' => 'Joint Framework Administrator', 'name_fr' => 'Administrateur de cadres communs'],
            ['name_ar' => 'مختص الإدارة والاقتصاد', 'name_en' => 'Administration and Economics Specialist', 'name_fr' => 'Spécialiste de l\'administration et de l\'économie'],
            ['name_ar' => 'مختص تربوي', 'name_en' => 'Educational Specialist', 'name_fr' => 'Spécialiste de l\'éducation'],
            ['name_ar' => 'مختص اجتماعي', 'name_en' => 'Social Specialist', 'name_fr' => 'Spécialiste social'],
            ['name_ar' => 'مستشار في التوجيه', 'name_en' => 'Guidance Counselor', 'name_fr' => 'Conseiller d\'orientation'],
            ['name_ar' => 'مستشار في التخطيط', 'name_en' => 'Planning Counselor', 'name_fr' => 'Conseiller en planification'],
            ['name_ar' => 'مفتش ابتدائي', 'name_en' => 'Primary Inspector', 'name_fr' => 'Inspecteur primaire'],
            ['name_ar' => 'مفتش ثانوي', 'name_en' => 'Secondary Inspector', 'name_fr' => 'Inspecteur secondaire'],
            ['name_ar' => 'مفتش في التوجيه', 'name_en' => 'Guidance Inspector', 'name_fr' => 'Inspecteur d\'orientation'],
            ['name_ar' => 'مفتش في التخطيط', 'name_en' => 'Planning Inspector', 'name_fr' => 'Inspecteur de planification'],
            ['name_ar' => 'مفتش المصالح المالية والمادية', 'name_en' => 'Financial and Material Services Inspector', 'name_fr' => 'Inspecteur des services financiers et matériels'],
            ['name_ar' => 'ممون', 'name_en' => 'Supplier', 'name_fr' => 'Fournisseur'],
            ['name_ar' => 'مساعد تربوي', 'name_en' => 'Educational Assistant', 'name_fr' => 'Assistant éducatif'],
            ['name_ar' => 'تقني', 'name_en' => 'Technician', 'name_fr' => 'Technicien'],
            ['name_ar' => 'طبيب', 'name_en' => 'Doctor', 'name_fr' => 'Médecin'],
            ['name_ar' => 'مبرز', 'name_en' => 'Distinguished Teacher', 'name_fr' => 'Enseignant distingué'],
            ['name_ar' => 'محرر', 'name_en' => 'Editor', 'name_fr' => 'Éditeur'],
            ['name_ar' => 'مدير', 'name_en' => 'Director', 'name_fr' => 'Directeur'],
            ['name_ar' => 'ناظر', 'name_en' => 'Supervisor', 'name_fr' => 'Superviseur'],
            ['name_ar' => 'حارس عام', 'name_en' => 'General Guardian', 'name_fr' => 'Gardien général'],
            ['name_ar' => 'متفرغ', 'name_en' => 'Full-time', 'name_fr' => 'Temps plein'],
            ['name_ar' => 'متصرف', 'name_en' => 'Administrator', 'name_fr' => 'Administrateur'],
            ['name_ar' => 'إطار تربوي', 'name_en' => 'Educational Framework', 'name_fr' => 'Cadre éducatif'],
            ['name_ar' => 'إطار اجتماعي', 'name_en' => 'Social Framework', 'name_fr' => 'Cadre social'],
            ['name_ar' => 'إطار التعليم العالي', 'name_en' => 'Higher Education Framework', 'name_fr' => 'Cadre de l\'enseignement supérieur'],
            ['name_ar' => 'إطار الإدارة والاقتصاد', 'name_en' => 'Administration and Economics Framework', 'name_fr' => 'Cadre de l\'administration et de l\'économie'],
            ['name_ar' => 'مهندس', 'name_en' => 'Engineer', 'name_fr' => 'Ingénieur'],
        ];

        foreach ($professions as $profession) {
            Profession::create($profession);
        }
    }
}
