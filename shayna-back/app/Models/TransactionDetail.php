<?php

namespace App\Models;

use App\Models\product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'idtransaksi', 'idproduk'
    ];

    protected $hidden = [

    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'idtransaksi','id');
    }

    public function products()
    {
        return $this->belongsTo(product::class, 'idproduk','id');
    }
}
