<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetPenerima; // 1. TAMBAHKAN INI (Untuk memanggil model database kamu)

class HomeController extends Controller
{
    public function index()
    {
        // 2. TAMBAHKAN INI (Mengambil semua data target bantuan yang aktif dari MySQL)
        $targets = TargetPenerima::where('status_aktif', true)->get();
        
        // 3. UBAH INI (Mengirimkan variabel $targets ke dalam file view 'home')
        return view('home', compact('targets'));
    }
}