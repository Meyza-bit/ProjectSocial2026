@extends('layouts.app')
@section('title','Kirim Barang — Mari Berbagi')
@section('styles')
<style>
.barang-wrap{max-width:800px;margin:0 auto;padding:3rem 5%}
.barang-category-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:.8rem;margin-bottom:1.5rem}
.cat-card{border:2px solid var(--border);border-radius:14px;padding:1rem;text-align:center;cursor:pointer;transition:all .2s}
.cat-card:hover,.cat-card.selected{border-color:var(--teal);background:var(--teal-light)}
.cat-icon{font-size:1.8rem;margin-bottom:.4rem}
.cat-name{font-size:.78rem;font-weight:600}
.barang-list{display:flex;flex-direction:column;gap:.8rem;margin-bottom:1rem}
.barang-row{display:grid;grid-template-columns:2fr 1fr 1fr auto;gap:.7rem;align-items:center}
.btn-remove{background:none;border:2px solid #FCA5A5;color:var(--red);border-radius:50%;width:34px;height:34px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:1rem;flex-shrink:0;transition:all .2s}
.btn-remove:hover{background:var(--red);color:var(--white)}
.btn-add-row{display:inline-flex;align-items:center;gap:.5rem;background:var(--teal-light);color:var(--teal);border:2px dashed rgba(13,110,110,.3);border-radius:12px;padding:.6rem 1.2rem;font-size:.85rem;font-weight:600;cursor:pointer;transition:all .2s;font-family:'Plus Jakarta Sans',sans-serif}
.btn-add-row:hover{background:var(--teal);color:var(--white);border-style:solid}
.alamat-box{background:var(--teal-light);border-radius:16px;padding:1.4rem;margin-top:1rem}
.row-2{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
.row-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem}
.info-box{background:#FFF7ED;border:1px solid #FED7AA;border-radius:12px;padding:1rem 1.2rem;font-size:.83rem;color:#92400E;line-height:1.65;margin-top:1rem}
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="sec-lbl">📦 Donasi Logistik</div>
    <h1>Input Barang & Pengiriman</h1>
    <p>Isi data barang yang ingin kamu kirimkan beserta informasi pengiriman ke lokasi bencana.</p>
</div>

<div class="barang-wrap fade-in">
    <form action="{{ route('barang.store') }}" method="POST">
    @csrf

    {{-- TARGET --}}
    <div class="card" style="margin-bottom:1.5rem">
        <div class="card-header"><h3 style="font-family:'Fraunces',serif;font-size:1.1rem;font-weight:700">🎯 Tujuan Pengiriman</h3></div>
        <div class="card-body">
            <div class="row-2">
                <div class="form-group">
                    <label class="form-label">Pilih Program / Lokasi Bencana</label>
                    <select name="program" class="form-control">
                        <option value="">-- Pilih Program --</option>
                        <option>Korban Banjir Kalsel — Banjarmasin</option>
                        <option>Korban Gempa Cianjur — Jawa Barat</option>
                        <option>Pengungsi Erupsi Gunung Awu — Sulut</option>
                        <option>Korban Kebakaran Tambora — Jakarta</option>
                        <option>Panti Asuhan Al-Ikhlas — Semarang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Prioritas Kebutuhan</label>
                    <select name="prioritas" class="form-control">
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
    <div class="card" style="margin-bottom:1.5rem">
        <div class="card-header"><h3 style="font-family:'Fraunces',serif;font-size:1.1rem;font-weight:700">📋 Kategori Barang</h3></div>
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
    <div class="card" style="margin-bottom:1.5rem">
        <div class="card-header">
            <h3 style="font-family:'Fraunces',serif;font-size:1.1rem;font-weight:700">📝 Daftar Barang</h3>
            <p style="font-size:.8rem;color:var(--muted);margin-top:.3rem">Isi nama, jumlah, dan satuan untuk setiap barang yang akan dikirim</p>
        </div>
        <div class="card-body">
            <div style="display:grid;grid-template-columns:2fr 1fr 1fr auto;gap:.7rem;margin-bottom:.5rem">
                <div style="font-size:.78rem;font-weight:700;color:var(--muted);text-transform:uppercase">Nama Barang</div>
                <div style="font-size:.78rem;font-weight:700;color:var(--muted);text-transform:uppercase">Jumlah</div>
                <div style="font-size:.78rem;font-weight:700;color:var(--muted);text-transform:uppercase">Satuan</div>
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
            <button type="button" class="btn-add-row" onclick="addRow()">+ Tambah Barang</button>
        </div>
    </div>

    {{-- DATA PENGIRIM --}}
    <div class="card" style="margin-bottom:1.5rem">
        <div class="card-header"><h3 style="font-family:'Fraunces',serif;font-size:1.1rem;font-weight:700">👤 Data Pengirim</h3></div>
        <div class="card-body">
            <div class="row-2">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_pengirim" class="form-control" value="{{ auth()->user()->name ?? '' }}" placeholder="Nama lengkap" required>
                </div>
                <div class="form-group">
                    <label class="form-label">No. HP / WhatsApp</label>
                    <input type="text" name="hp_pengirim" class="form-control" placeholder="08xxxxxxxxxx" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Alamat Asal Pengiriman</label>
                <textarea name="alamat_pengirim" class="form-control" rows="2" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan..." required></textarea>
            </div>
            <div class="row-3">
                <div class="form-group">
                    <label class="form-label">Kota / Kabupaten</label>
                    <input type="text" name="kota_pengirim" class="form-control" placeholder="Jakarta Selatan">
                </div>
                <div class="form-group">
                    <label class="form-label">Provinsi</label>
                    <input type="text" name="provinsi_pengirim" class="form-control" placeholder="DKI Jakarta">
                </div>
                <div class="form-group">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" name="kodepos_pengirim" class="form-control" placeholder="12345">
                </div>
            </div>
        </div>
    </div>

    {{-- PENGIRIMAN --}}
    <div class="card" style="margin-bottom:1.5rem">
        <div class="card-header"><h3 style="font-family:'Fraunces',serif;font-size:1.1rem;font-weight:700">🚚 Metode Pengiriman</h3></div>
        <div class="card-body">
            <div class="row-2">
                <div class="form-group">
                    <label class="form-label">Ekspedisi</label>
                    <select name="ekspedisi" class="form-control">
                        <option>JNE</option>
                        <option>J&T Express</option>
                        <option>SiCepat</option>
                        <option>POS Indonesia</option>
                        <option>Antar Langsung</option>
                        <option>Titip ke Relawan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Estimasi Berat Total</label>
                    <div style="display:flex;gap:.5rem;align-items:center">
                        <input type="number" name="berat" class="form-control" placeholder="5" min="0">
                        <span style="font-weight:600;color:var(--muted);white-space:nowrap">kg</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Catatan Pengiriman (opsional)</label>
                <textarea name="catatan" class="form-control" rows="2" placeholder="Instruksi khusus, kondisi barang, dsb..."></textarea>
            </div>
            <div class="info-box">
                ℹ️ Setelah form dikirim, tim kami akan menghubungimu dalam <strong>1×24 jam</strong> untuk konfirmasi alamat penerimaan dan panduan pengiriman selanjutnya.
            </div>
        </div>
    </div>

    <div style="display:flex;justify-content:space-between;align-items:center">
        <a href="{{ route('program.index') }}" class="btn btn-outline">← Kembali</a>
        @auth
        <button type="submit" class="btn btn-primary" style="background:var(--orange)">📦 Kirim Data Barang</button>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary">Masuk untuk Kirim →</a>
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