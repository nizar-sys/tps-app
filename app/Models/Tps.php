<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'nama_tps',
        'tim_id',
        'status_desa',
        'vote_2014',
        'vote_2019',
        'target_rumah',
        'progres',
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function tim()
    {
        return $this->belongsTo(User::class);
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now();
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }

    protected function progresLabel() : Attribute {
        return Attribute::make(
            get: fn() => $this->progres != 0 ? $this->progres . '%' : 'Belum ada progres',
        );
    }
}
