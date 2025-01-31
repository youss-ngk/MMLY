<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Member;

class EducationLevel extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
