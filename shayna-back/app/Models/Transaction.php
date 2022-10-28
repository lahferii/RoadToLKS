<?php

namespace App\Models;

use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'nama', 'email', 'telpon', 'alamat', 'total', 'status'
    ];

    protected $hidden = [

    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'idtransaksi');
    }
    
}
