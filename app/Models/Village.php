<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'nama_desa',
        'tim_id',
        'status_desa',
        'vote_2014',
        'vote_2019',
        'target_rumah',
        'progres',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function tim()
    {
        return $this->belongsTo(User::class);
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($village) {
            $village->created_at = now();
        });

        static::updating(function ($village) {
            $village->updated_at = now();
        });
    }

    protected function progresLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->progres != 0 ? $this->progres . '%' : 'Belum ada progres',
        );
    }
}
