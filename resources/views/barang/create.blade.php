@extends('layouts.app')
@section('title','Kirim Barang — Mari Berbagi')
@section('styles')
<style>
    /* Earthy Color Palette Variables */
    :root {
        --primary-brown: #5C4033;      /* Deep Warm Brown */
        --accent-amber: #A0522D;       /* Sienna / Warm Terracotta */
        --bg-cream: #FAF7F2;           /* Soft Linen/Cream Background */
        --card-bg: #FFFFFF;
        --border-soft: #EAE3D8;        /* Subtle Warm Gray/Brown Border */
        --text-dark: #2F221A;          /* Very Dark Charcoal Brown */
        --text-muted: #8C7A6B;         /* Soft Muted Earthy Brown */
        --cream-light: #F4EFE6;        /* Light Cream for Hover & Highlights */
        --red-alert: #C0392B;
    }

    .barang-wrap {
        max-width: 800px;
        margin: 0 auto;
        padding: 4rem 5%;
        color: var(--text-dark);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Card Custom Style styling */
    .card {
        background: var(--card-bg);
        border: 1px solid var(--border-soft);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(92, 64, 51, 0.03);
        margin-bottom: 2rem;
        overflow: hidden;
        transition: transform 0.2s ease;
    }

    .card-header {
        padding: 1.5rem 1.75rem 0.5rem;
        background: transparent;
        border: none;
    }

    .card-header h3 {
        font-family: 'Fraunces', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-brown);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .card-body {
        padding: 1.25rem 1.75rem 1.75rem;
    }

    /* Category Grid */
    .barang-category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(135px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .cat-card {
        border: 1px solid var(--border-soft);
        border-radius: 12px;
        padding: 1.25rem 1rem;
        text-align: center;
        cursor: pointer;
        background: #FFFDFB;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .cat-card:hover {
        border-color: var(--accent-amber);
        background: var(--cream-light);
        transform: translateY(-2px);
    }

    .cat-card.selected {
        border-color: var(--primary-brown);
        background: #F0E6D6;
        box-shadow: inset 0 0 0 1px var(--primary-brown);
    }

    .cat-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.05));
    }

    .cat-name {
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: -0.01em;
        color: var(--text-dark);
    }

    /* Interactive Form Rows */
    .barang-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.25rem;
    }

    .barang-row {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr auto;
        gap: 0.75rem;
        align-items: center;
        animation: slideDown 0.2s ease-out;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Inputs Modern Styling */
    .form-control {
        border: 1px solid var(--border-soft);
        background-color: #FAFAFA;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        color: var(--text-dark);
        transition: all 0.2s;
    }

    .form-control:focus {
        border-color: var(--primary-brown);
        background-color: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(92, 64, 51, 0.1);
        outline: none;
    }

    /* Buttons Style */
    .btn-remove {
        background: none;
        border: 1px solid #E5E7EB;
        color: #9CA3AF;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.2rem;
        transition: all 0.2s;
    }

    .btn-remove:hover {
        background: #FEE2E2;
        border-color: #FCA5A5;
        color: var(--red-alert);
    }

    .btn-add-row {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--cream-light);
        color: var(--primary-brown);
        border: 1px dashed rgba(92, 64, 51, 0.4);
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-add-row:hover {
        background: var(--primary-brown);
        color: #FFFFFF;
        border-style: solid;
    }

    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.25rem; }

    .info-box {
        background: #FDFBF7;
        border: 1px solid #EEDCC5;
        border-radius: 12px;
        padding: 1.25rem;
        font-size: 0.85rem;
        color: #784F23;
        line-height: 1.6;
        margin-top: 1.5rem;
        display: flex;
        gap: 0.75rem;
    }

    /* Page Header Clean Overwrite */
    .page-header h1 {
        font-family: 'Fraunces', serif;
        color: var(--primary-brown);
        font-weight: 800;
    }
    
    .btn-primary-brown {
        background: var(--primary-brown);
        color: white;
        padding: 0.75rem 1.7rem;
        border-radius: 10px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-primary-brown:hover {
        background: var(--accent-amber);
    }

    .btn-outline-brown {
        border: 1px solid var(--primary-brown);
        color: var(--primary-brown);
        padding: 0.75rem 1.7rem;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-outline-brown:hover {
        background: var(--cream-light);
    }
</style>
@endsection

@section('content')
<div class="page-header text-center" style="margin-bottom: 2rem;">
    <div class="sec-lbl" style="color: var(--accent-amber); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.85rem;">📦 Donasi Logistik</div>
    <h1 style="font-size: 2.5rem; margin-top: 0.5rem;">Input Barang & Pengiriman</h1>
    <p style="color: var(--text-muted); max-width: 500px; margin: 0.5rem auto 0;">Isi data barang yang ingin kamu kirimkan beserta informasi pengiriman ke lokasi bencana.</p>
</div>

<div class="barang-wrap fade-in">
    <form action="{{ route('barang.store') }}" method="POST">
    @csrf

    {{-- TARGET --}}
    <div class="card">
        <div class="card-header">
            <h3>🎯 Tujuan Pengiriman</h3>
        </div>
        <div class="card-body">
            <div class="row-2">
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Pilih Program / Lokasi Bencana</label>
                    <select name="program" class="form-control" style="width: 100%;">
                        <option value="">-- Pilih Program --</option>
                        <option>Korban Banjir Kalsel — Banjarmasin</option>
                        <option>Korban Gempa Cianjur — Jawa Barat</option>
                        <option>Pengungsi Erupsi Gunung Awu — Sulut</option>
                        <option>Korban Kebakaran Tambora — Jakarta</option>
                        <option>Panti Asuhan Al-Ikhlas — Semarang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Prioritas Kebutuhan</label>
                    <select name="prioritas" class="form-control" style="width: 100%;">
                        <option>Pangan & Air Bersih</option>
                        <option>Pakaian & Selimut</option>
                        <option>Obat-obatan & P3K</option>
                        <option>Perlengkapan Bayi</option>
                        <option>Alat Masak</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- KATEGORI BARANG --}}
    <div class="card">
        <div class="card-header">
            <h3>📋 Kategori Barang</h3>
        </div>
        <div class="card-body">
            <div class="barang-category-grid">
                <div class="cat-card selected" onclick="selectCat(this)"><div class="cat-icon">🍚</div><div class="cat-name">Sembako</div></div>
                <div class="cat-card" onclick="selectCat(this)"><div class="cat-icon">👕</div><div class="cat-name">Pakaian</div></div>
                <div class="cat-card" onclick="selectCat(this)"><div class="cat-icon">💊</div><div class="cat-name">Obat-obatan</div></div>
                <div class="cat-card" onclick="selectCat(this)"><div class="cat-icon">🍼</div><div class="cat-name">Perlengkapan Bayi</div></div>
                <div class="cat-card" onclick="selectCat(this)"><div class="cat-icon">🛏️</div><div class="cat-name">Selimut & Kasur</div></div>
                <div class="cat-card" onclick="selectCat(this)"><div class="cat-icon">🧴</div><div class="cat-name">Kebersihan</div></div>
                <div class="cat-card" onclick="selectCat(this)"><div class="cat-icon">🔦</div><div class="cat-name">Perlengkapan</div></div>
                <div class="cat-card" onclick="selectCat(this)"><div class="cat-icon">📦</div><div class="cat-name">Lainnya</div></div>
            </div>
            <input type="hidden" name="kategori" id="inputKategori" value="Sembako">
        </div>
    </div>

    {{-- DAFTAR BARANG --}}
    <div class="card">
        <div class="card-header">
            <h3>📝 Daftar Barang</h3>
            <p style="font-size:.8rem; color:var(--text-muted); margin-top:.2rem">Isi nama, jumlah, dan satuan untuk setiap barang yang akan dikirim</p>
        </div>
        <div class="card-body">
            <div style="display:grid; grid-template-columns:2fr 1fr 1fr auto; gap:.7rem; margin-bottom:.75rem; padding-left: 0.2rem;">
                <div style="font-size:.75rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.03em">Nama Barang</div>
                <div style="font-size:.75rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.03em">Jumlah</div>
                <div style="font-size:.75rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.03em">Satuan</div>
                <div></div>
            </div>
            <div class="barang-list" id="barangList">
                <div class="barang-row">
                    <input type="text" name="barang[0][nama]" class="form-control" placeholder="Contoh: Beras">
                    <input type="number" name="barang[0][jumlah]" class="form-control" placeholder="10" min="1">
                    <select name="barang[0][satuan]" class="form-control">
                        <option>kg</option><option>dus</option><option>pcs</option><option>lusin</option><option>karung</option><option>liter</option><option>buah</option>
                    </select>
                    <button type="button" class="btn-remove" onclick="removeRow(this)">×</button>
                </div>
            </div>
            <button type="button" class="btn-add-row" onclick="addRow()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Tambah Barang
            </button>
        </div>
    </div>

    {{-- DATA PENGIRIM --}}
    <div class="card">
        <div class="card-header">
            <h3>👤 Data Pengirim</h3>
        </div>
        <div class="card-body">
            <div class="row-2" style="margin-bottom: 1rem;">
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Nama Lengkap</label>
                    <input type="text" name="nama_pengirim" class="form-control" style="width:100%" value="{{ auth()->user()->name ?? '' }}" placeholder="Nama lengkap" required>
                </div>
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">No. HP / WhatsApp</label>
                    <input type="text" name="hp_pengirim" class="form-control" style="width:100%" placeholder="08xxxxxxxxxx" required>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 1rem;">
                <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Alamat Asal Pengiriman</label>
                <textarea name="alamat_pengirim" class="form-control" style="width:100%" rows="3" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan..." required></textarea>
            </div>
            <div class="row-3">
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Kota / Kabupaten</label>
                    <input type="text" name="kota_pengirim" class="form-control" style="width:100%" placeholder="Jakarta Selatan">
                </div>
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Provinsi</label>
                    <input type="text" name="provinsi_pengirim" class="form-control" style="width:100%" placeholder="DKI Jakarta">
                </div>
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Kode Pos</label>
                    <input type="text" name="kodepos_pengirim" class="form-control" style="width:100%" placeholder="12345">
                </div>
            </div>
        </div>
    </div>

    {{-- PENGIRIMAN --}}
    <div class="card">
        <div class="card-header">
            <h3>🚚 Metode Pengiriman</h3>
        </div>
        <div class="card-body">
            <div class="row-2" style="margin-bottom: 1rem;">
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Ekspedisi</label>
                    <select name="ekspedisi" class="form-control" style="width:100%">
                        <option>JNE</option>
                        <option>J&T Express</option>
                        <option>SiCepat</option>
                        <option>POS Indonesia</option>
                        <option>Antar Langsung</option>
                        <option>Titip ke Relawan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Estimasi Berat Total</label>
                    <div style="display:flex; gap:.5rem; align-items:center">
                        <input type="number" name="berat" class="form-control" style="width:100%" placeholder="5" min="0">
                        <span style="font-weight:700; color:var(--text-muted); white-space:nowrap; font-size:0.9rem">kg</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" style="font-weight:600; font-size:0.85rem; margin-bottom:0.4rem; display:block;">Catatan Pengiriman (opsional)</label>
                <textarea name="catatan" class="form-control" style="width:100%" rows="2" placeholder="Instruksi khusus, kondisi barang, dsb..."></textarea>
            </div>
            <div class="info-box">
                <span style="font-size: 1.2rem; line-height: 1;">🤎</span>
                <div>
                    Setelah form dikirim, tim kami akan menghubungimu dalam <strong>1×24 jam</strong> untuk konfirmasi alamat penerimaan dan panduan pengiriman selanjutnya.
                </div>
            </div>
        </div>
    </div>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-top: 2rem;">
        <a href="{{ route('program.index') }}" class="btn-outline-brown">← Kembali</a>
        @auth
        <button type="submit" class="btn-primary-brown">📦 Kirim Data Barang</button>
        @else
        <a href="{{ route('login') }}" class="btn-primary-brown">Masuk untuk Kirim →</a>
        @endauth
    </div>

    </form>
</div>
@endsection

@section('scripts')
<script>
let rowCount = 1;
function addRow() {
    const list = document.getElementById('barangList');
    const div = document.createElement('div');
    div.className = 'barang-row';
    div.innerHTML = `
        <input type="text" name="barang[${rowCount}][nama]" class="form-control" placeholder="Nama barang">
        <input type="number" name="barang[${rowCount}][jumlah]" class="form-control" placeholder="0" min="1">
        <select name="barang[${rowCount}][satuan]" class="form-control">
            <option>kg</option><option>dus</option><option>pcs</option><option>lusin</option><option>karung</option><option>liter</option><option>buah</option>
        </select>
        <button type="button" class="btn-remove" onclick="removeRow(this)">×</button>`;
    list.appendChild(div);
    rowCount++;
}
function removeRow(btn) {
    const rows = document.querySelectorAll('.barang-row');
    if (rows.length > 1) btn.closest('.barang-row').remove();
}
function selectCat(el) {
    document.querySelectorAll('.cat-card').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
    document.getElementById('inputKategori').value = el.querySelector('.cat-name').textContent;
}
</script>
@endsection