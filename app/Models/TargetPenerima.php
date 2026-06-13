<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetPenerima extends Model
{
    use HasFactory;

    // Beri tahu nama tabel di database
    protected $table = 'target_penerimas';

    // Beri tahu nama Primary Key kustom sesuai Class Diagram
    protected $primaryKey = 'id_target';

    // Daftarkan kolom yang boleh diisi data
    protected $fillable = [
        'nama_target',
        'kategori_target',
        'deskripsi_kebutuhan',
        'status_aktif',
        'gambar'
    ];
}