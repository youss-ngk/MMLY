<?php

namespace Database\Seeders;

use App\Models\StructurePosition;
use Illuminate\Database\Seeder;

class StructurePositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['name_ar' => 'مدير', 'name_en' => 'Director', 'name_fr' => 'Directeur', 'level' => 1],
            ['name_ar' => 'نائب المدير', 'name_en' => 'Deputy Director', 'name_fr' => 'Directeur adjoint', 'level' => 2],
            ['name_ar' => 'رئيس قسم', 'name_en' => 'Department Head', 'name_fr' => 'Chef de département', 'level' => 3],
            ['name_ar' => 'رئيس مصلحة', 'name_en' => 'Service Head', 'name_fr' => 'Chef de service', 'level' => 4],
            ['name_ar' => 'رئيس مكتب', 'name_en' => 'Office Head', 'name_fr' => 'Chef de bureau', 'level' => 5],
            ['name_ar' => 'موظف', 'name_en' => 'Employee', 'name_fr' => 'Employé', 'level' => 6],
            ['name_ar' => 'مساعد', 'name_en' => 'Assistant', 'name_fr' => 'Assistant', 'level' => 7],
            ['name_ar' => 'متدرب', 'name_en' => 'Trainee', 'name_fr' => 'Stagiaire', 'level' => 8],
            ['name_ar' => 'مستشار', 'name_en' => 'Advisor', 'name_fr' => 'Conseiller', 'level' => 9],
            ['name_ar' => 'منسق', 'name_en' => 'Coordinator', 'name_fr' => 'Coordinateur', 'level' => 10],
            ['name_ar' => 'مشرف', 'name_en' => 'Supervisor', 'name_fr' => 'Superviseur', 'level' => 11],
            ['name_ar' => 'خبير', 'name_en' => 'Expert', 'name_fr' => 'Expert', 'level' => 12],
            ['name_ar' => 'محلل', 'name_en' => 'Analyst', 'name_fr' => 'Analyste', 'level' => 13],
            ['name_ar' => 'مطور', 'name_en' => 'Developer', 'name_fr' => 'Développeur', 'level' => 14],
            ['name_ar' => 'مصمم', 'name_en' => 'Designer', 'name_fr' => 'Designer', 'level' => 15],
            ['name_ar' => 'مدير مشروع', 'name_en' => 'Project Manager', 'name_fr' => 'Chef de projet', 'level' => 16],
            ['name_ar' => 'مدير برنامج', 'name_en' => 'Program Manager', 'name_fr' => 'Directeur de programme', 'level' => 17],
            ['name_ar' => 'مدير عمليات', 'name_en' => 'Operations Manager', 'name_fr' => 'Directeur des opérations', 'level' => 18],
            ['name_ar' => 'مدير موارد بشرية', 'name_en' => 'HR Manager', 'name_fr' => 'Directeur des ressources humaines', 'level' => 19],
            ['name_ar' => 'مدير مالي', 'name_en' => 'Financial Manager', 'name_fr' => 'Directeur financier', 'level' => 20]
        ];

        foreach ($positions as $position) {
            StructurePosition::create($position);
        }
    }
}
