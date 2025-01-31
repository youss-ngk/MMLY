<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Region;
use App\Models\Province;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'transaction_date',
        'academic_year',
        'region_id',
        'province_id',
        'quantity',
        'amount',
        'notes'
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'decimal:2',
        'type' => 'string'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
