<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama');
        $slug = $request->input('slug');
        $kategori = $request->input('kategori');
        $harga_from = $request->input('harga_from');
        $harga_to = $request->input('harga_to');
        $limit = 5;
        
        // Query By ID
        if($id){
            $product = product::with('galleries')->find($id);

            if($product){
                return ResponseFormatter::success($product, 'Data Ditemukan');
            }else{
                return ResponseFormatter::error(null, 'Data Tidak Tersedia', 404);
            }
        }

        // Query By Slug
        if($slug){
            $product = product::with('galleries')->find($slug);

            if($product){
                return ResponseFormatter::success($product, 'Data Ditemukan');
            }else{
                return ResponseFormatter::error(null, 'Data Tidak Tersedia', 404);
            }
        }

        // General Query
        $product = product::with('galleries');

        if($nama){
            $product->where('nama_barang', 'like', '%'.$nama.'5');
        }
        if($kategori){
            $product->where('kategori', 'like', '%'.$kategori.'%');
        }
        if($harga_from){
            $product->where('harga', '>=', $harga_from);
        }
        if($harga_to){
            $product->where('harga', '<=', $harga_to);
        }
        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data Ditemukan'
        );
    }
}
