<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() { return view('feedback.index'); }

    public function store(Request $request)
    {
        $request->validate([
            'isi'    => 'required|min:10',
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        return redirect()->route('feedback.index')->with('success', 'Ulasan berhasil dikirim!');
    }
}