<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'first_name' => 'Mohammed',
                'last_name' => 'Alami',
                'birth_date' => '1985-06-15',
                'gender' => 'male',
                'academic_year' => '2024-2025',
                'phone' => '+212612345678',
                'email' => 'mohammed.alami@example.com',
                'profession_id' => 1, // Enseignant
                'specialization_id' => 1, // Langue arabe
                'education_level_id' => 5, // Licence
                'region_id' => 1, // Tanger-Tétouan-Al Hoceïma
                'province_id' => 1, // Tanger-Assilah
                'branch' => 'Tanger',
                'structure_position_id' => 1, // Directeur
            ],
            [
                'first_name' => 'Fatima',
                'last_name' => 'Benali',
                'birth_date' => '1990-03-22',
                'gender' => 'female',
                'academic_year' => '2024-2025',
                'phone' => '+212623456789',
                'email' => 'fatima.benali@example.com',
                'profession_id' => 2, // Directeur
                'specialization_id' => 4, // Mathématiques
                'education_level_id' => 6, // Master
                'region_id' => 2, // L'Oriental
                'province_id' => 13, // Oujda-Angad
                'branch' => 'Oujda',
                'structure_position_id' => 3, // Chef de département
            ],
            [
                'first_name' => 'Ahmed',
                'last_name' => 'Mansouri',
                'birth_date' => '1988-11-10',
                'gender' => 'male',
                'academic_year' => '2024-2025',
                'phone' => '+212634567890',
                'email' => 'ahmed.mansouri@example.com',
                'profession_id' => 3, // Inspecteur
                'specialization_id' => 5, // Sciences physiques
                'education_level_id' => 7, // Doctorat
                'region_id' => 3, // Fès-Meknès
                'province_id' => 20, // Fès
                'branch' => 'Fès',
                'structure_position_id' => 4, // Chef de service
            ],
            [
                'first_name' => 'Laila',
                'last_name' => 'Tazi',
                'birth_date' => '1992-08-05',
                'gender' => 'female',
                'academic_year' => '2024-2025',
                'phone' => '+212645678901',
                'email' => 'laila.tazi@example.com',
                'profession_id' => 4, // Administrateur
                'specialization_id' => 10, // Informatique
                'education_level_id' => 8, // Diplôme de technicien spécialisé
                'region_id' => 4, // Rabat-Salé-Kénitra
                'province_id' => 24, // Rabat
                'branch' => 'Rabat',
                'structure_position_id' => 6, // Employé
            ],
            [
                'first_name' => 'Karim',
                'last_name' => 'El Amrani',
                'birth_date' => '1987-04-18',
                'gender' => 'male',
                'academic_year' => '2024-2025',
                'phone' => '+212656789012',
                'email' => 'karim.elamrani@example.com',
                'profession_id' => 1, // Enseignant
                'specialization_id' => 2, // Langue française
                'education_level_id' => 5, // Licence
                'region_id' => 6, // Casablanca-Settat
                'province_id' => 40, // Casablanca
                'branch' => 'Casablanca',
                'structure_position_id' => 9, // Conseiller
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
