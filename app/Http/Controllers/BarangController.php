<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()  { return view('barang.create'); }
    public function create() { return view('barang.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'program'         => 'required',
            'nama_pengirim'   => 'required',
            'hp_pengirim'     => 'required',
            'alamat_pengirim' => 'required',
            'ekspedisi'       => 'required',
        ]);
        return redirect()->route('transparansi')->with('success', 'Data barang berhasil dikirim!');
    }
}