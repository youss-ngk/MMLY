<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Province;
use App\Models\Member;
use App\Models\Expense;
use App\Models\Income;
use App\Models\CardReport;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en'];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function cardReports()
    {
        return $this->hasMany(CardReport::class);
    }
}
