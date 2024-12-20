<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $provinceId = $request->query('province_id');
        
        $provinceUrl = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
        $province = Http::get($provinceUrl);
        $dataProvince = $province->json();
        // Ambil data dari tabel 'reports'
        $articles = DB::table('reports');
        if($provinceId) {
            $articles = $articles->where('province_id', $provinceId);
        }
        $articles = $articles->get();
        return view('report.article', compact('articles', 'dataProvince'));
    }
}
