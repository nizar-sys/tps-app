<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kepala_keluarga',
        'no_telp',
        'jenis_kelamin',
        'alamat',
        'potensi_suara',
        'long_lat',
        'foto_tampak_depan_rumah',
    ];

    // function boot
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_at = now();
        });

        self::updating(function ($model) {
            $model->updated_at = now();
        });
    }

    protected function jenisKelaminLabel() : Attribute {
        return Attribute::make(
            get: fn() => $this->jenis_kelamin === 'l' ? 'Laki-laki' : 'Perempuan',
        );
    }
}
