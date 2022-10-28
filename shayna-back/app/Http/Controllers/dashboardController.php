<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $pendapatan = Transaction::where('status', 'SUCCESS')->sum('total');
        $penjualan = Transaction::where('status', 'SUCCESS')->count();
        $baru = Transaction::where('status', 'SUCCESS')->orderBy('id', 'DESC')->with('details.products')->take(5)->get();
        $grafik = [
            'pending' => Transaction::where('status', 'PENDING')->count(),
            'success' => Transaction::where('status', 'SUCCESS')->count(),
            'failed' => Transaction::where('status', 'FAILED')->count(),
        ];
        
        return view('pages.dashboard')->with([
            'pendapatan' => $pendapatan,
            'penjualan'=> $penjualan,
            'baru' => $baru,
            'grafik' => $grafik
        ]);
    }
}
