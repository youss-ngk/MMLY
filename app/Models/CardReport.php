<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Region;
use App\Models\Province;

class CardReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'province_id',
        'academic_year',
        'card_count',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'office_share',
        'region_share',
        'province_share'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'remaining_amount' => 'decimal:2',
        'office_share' => 'decimal:2',
        'region_share' => 'decimal:2',
        'province_share' => 'decimal:2'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cardReport) {
            $cardReport->office_share = $cardReport->total_amount * 0.5;
            $cardReport->region_share = $cardReport->total_amount * 0.2;
            $cardReport->province_share = $cardReport->total_amount * 0.3;
        });
    }
}
