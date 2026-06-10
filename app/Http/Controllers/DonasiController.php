<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()  { return view('donasi.create'); }
    public function create() { return view('donasi.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'jenis'           => 'required',
            'target_penerima' => 'required',
            'nominal'         => 'required|numeric|min:10000',
            'metode_bayar'    => 'required',
        ]);
        return redirect()->route('transparansi')->with('success', 'Donasi berhasil! Terima kasih ♥');
    }
}