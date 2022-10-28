<?php

namespace App\Models;

use App\Models\gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang', 'slug', 'kategori', 'desc', 'harga', 'stok'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(gallery::class, 'idproduk');
    }
}
