<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $fillable = [
        'idproduk', 'foto', 'is_default' 
    ];

    protected $hidden = [

    ];

    public function product(){
        return $this->belongsTo(product::class, 'idproduk', 'id');
    }

    public function getFotoAttribute($value){
        return url('storage/' . $value);
    }
}
