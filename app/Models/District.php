<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kecamatan',
        'region_id',
        'mentor_id',
        'status_kecamatan',
        'vote_2014',
        'vote_2019',
        'target_rumah',
        'progres',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($district) {
            $district->created_at = now();
        });

        static::updating(function ($district) {
            $district->updated_at = now();
        });
    }

    public function progresLabel() : Attribute {
        return Attribute::make(
            get: fn() => ($this->progres) ? $this->progres . '%' : '-',
        );
    }
}
