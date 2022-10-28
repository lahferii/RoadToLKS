<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction($id)
    {
        $product = Transaction::with('details.products')->find($id);

        if($product){
            return ResponseFormatter::success($product, 'Data Ditemukan');
        }else{
            return ResponseFormatter::error(null, 'Data Tidak Tersedia', 404);
        }
    }
}
