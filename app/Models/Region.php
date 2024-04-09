<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wilayah',
        'mentor_id',
        'operator_id',
        'status_wilayah',
        'vote_2014',
        'vote_2019',
        'target_rumah',
        'progres',
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    // function boot
    public static function boot()
    {
        parent::boot();

        static::creating(function ($region) {
            $region->created_at = now();
        });

        static::updating(function ($region) {
            $region->updated_at = now();
        });
    }

    public function progresLabel() : Attribute {
        return Attribute::make(
            get: fn() => ($this->progres) ? $this->progres . '%' : '-',
        );
    }
}
