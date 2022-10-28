<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX'.mt_rand(100,999).mt_rand(100,999);
        $transaksi = Transaction::create($data);

        foreach($request->transaction_details as $barang){
            $details[] = new TransactionDetail([
                'idtransaksi' => $transaksi->id,
                'idproduk' => $barang
            ]);

            product::find($barang)->decrement('stok');
        }

        $transaksi->details()->saveMany($details);
    }
}
