<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Profession;
use App\Models\Specialization;
use App\Models\EducationLevel;
use App\Models\Region;
use App\Models\Province;
use App\Models\StructurePosition;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'academic_year',
        'phone',
        'email',
        'profession_id',
        'specialization_id',
        'education_level_id',
        'region_id',
        'province_id',
        'branch',
        'structure_position_id'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'gender' => 'string'
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function structurePosition()
    {
        return $this->belongsTo(StructurePosition::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
