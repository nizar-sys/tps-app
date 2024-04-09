<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nama_barang',
        'stok_barang',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
