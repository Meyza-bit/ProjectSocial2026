@extends('layouts.app')
@section('title','Transparansi — Mari Berbagi')
@section('styles')
<style>
.trans-wrap{padding:2.5rem 5%}
.stats-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1.2rem;margin-bottom:2.5rem}
.stat-card{background:var(--white);border-radius:16px;padding:1.4rem;box-shadow:0 2px 12px rgba(13,110,110,.07);text-align:center}
.stat-card-num{font-family:'Fraunces',serif;font-size:2rem;font-weight:900;color:var(--teal);line-height:1;margin-bottom:.3rem}
.stat-card-lbl{font-size:.78rem;color:var(--muted);text-transform:uppercase;letter-spacing:.05em}
.stat-card-icon{font-size:1.6rem;margin-bottom:.5rem}

.filter-row{background:var(--white);border-radius:16px;padding:1.2rem 1.5rem;box-shadow:0 2px 12px rgba(13,110,110,.07);margin-bottom:1.5rem;display:flex;align-items:center;gap:1rem;flex-wrap:wrap}
.type-tabs{display:flex;gap:0;border:2px solid var(--border);border-radius:50px;overflow:hidden}
.type-tab{padding:.4rem 1.2rem;background:transparent;border:none;font-family:'Plus Jakarta Sans',sans-serif;font-size:.82rem;font-weight:600;color:var(--muted);cursor:pointer;transition:all .2s}
.type-tab.active{background:var(--teal);color:var(--white)}

.log-table-wrap{background:var(--white);border-radius:16px;box-shadow:0 2px 12px rgba(13,110,110,.07);overflow:hidden;margin-bottom:2rem}
.log-table{width:100%;border-collapse:collapse}
.log-table th{text-align:left;padding:.85rem 1.1rem;background:var(--teal);color:var(--white);font-size:.78rem;font-weight:700;letter-spacing:.04em;white-space:nowrap}
.log-table th:first-child{border-radius:0}
.log-table td{padding:.82rem 1.1rem;border-bottom:1px solid var(--border);font-size:.85rem;vertical-align:middle}
.log-table tr:last-child td{border-bottom:none}
.log-table tr:hover td{background:var(--teal-light)}
.type-badge{display:inline-flex;align-items:center;gap:.3rem;font-size:.72rem;font-weight:700;padding:.2rem .6rem;border-radius:50px}
.type-dana{background:rgba(13,110,110,.1);color:var(--teal)}
.type-logistik{background:rgba(232,98,42,.1);color:var(--orange)}
.status-badge{font-size:.72rem;font-weight:700;padding:.2rem .55rem;border-radius:50px}
.status-verified{background:#DCFCE7;color:#16A34A}
.status-process{background:#FFF7ED;color:#D97706}
.donatur-cell{display:flex;align-items:center;gap:.6rem}
.donatur-av{width:28px;height:28px;border-radius:50%;background:var(--teal);color:var(--white);display:flex;align-items:center;justify-content:center;font-size:.72rem;font-weight:700;flex-shrink:0}
.pagination{display:flex;justify-content:center;gap:.5rem}
.page-btn{width:34px;height:34px;border-radius:50%;border:2px solid var(--border);background:transparent;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:.85rem;font-weight:600;transition:all .2s;font-family:'Plus Jakarta Sans',sans-serif;text-decoration:none;color:var(--ink)}
.page-btn:hover,.page-btn.active{background:var(--teal);color:var(--white);border-color:var(--teal)}
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="sec-lbl">📊 Transparansi</div>
    <h1>Riwayat Donasi Publik</h1>
    <p>Semua donasi dana dan barang tercatat terbuka di sini. Filter berdasarkan program atau jenis donasi.</p>
</div>

<div class="trans-wrap fade-in">

    {{-- STATS --}}
    <div class="stats-row">
        <div class="stat-card"><div class="stat-card-icon">💳</div><div class="stat-card-num">Rp 4,8M+</div><div class="stat-card-lbl">Total Dana Terkumpul</div></div>
        <div class="stat-card"><div class="stat-card-icon">📦</div><div class="stat-card-num">2.840</div><div class="stat-card-lbl">Item Barang Diterima</div></div>
        <div class="stat-card"><div class="stat-card-icon">👥</div><div class="stat-card-num">12.400+</div><div class="stat-card-lbl">Donatur Bergabung</div></div>
        <div class="stat-card"><div class="stat-card-icon">✅</div><div class="stat-card-num">98%</div><div class="stat-card-lbl">Dana Tepat Sasaran</div></div>
    </div>

    {{-- FILTER --}}
    <div class="filter-row">
        <div class="type-tabs">
            <button class="type-tab active" onclick="filterType('semua',this)">Semua</button>
            <button class="type-tab" onclick="filterType('dana',this)">💳 Dana</button>
            <button class="type-tab" onclick="filterType('logistik',this)">📦 Logistik</button>
        </div>
        <select class="form-control" style="border-radius:50px;width:auto;padding:.45rem 1rem;font-size:.85rem" onchange="filterProgram(this.value)">
            <option value="">Semua Program</option>
            <option>Banjir Kalsel</option>
            <option>Gempa Cianjur</option>
            <option>Erupsi Gunung Awu</option>
            <option>Kebakaran Tambora</option>
        </select>
        <input type="text" class="form-control" style="border-radius:50px;flex:1;min-width:160px;font-size:.85rem" placeholder="🔍 Cari donatur...">
        <select class="form-control" style="border-radius:50px;width:auto;padding:.45rem 1rem;font-size:.85rem">
            <option>7 Hari Terakhir</option>
            <option>30 Hari Terakhir</option>
            <option>3 Bulan Terakhir</option>
            <option>Semua Waktu</option>
        </select>
    </div>

    {{-- TABLE --}}
    <div class="log-table-wrap">
        <div style="overflow-x:auto">
        <table class="log-table" id="logTable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Donatur</th>
                    <th>Program / Tujuan</th>
                    <th>Jenis</th>
                    <th>Nominal / Barang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                $logs = [
                    ['tgl'=>'09 Jun 2026','name'=>'Budi S.','init'=>'B','color'=>'#0D6E6E','program'=>'Banjir Kalsel','jenis'=>'dana','nominal'=>'Rp 500.000','status'=>'verified'],
                    ['tgl'=>'09 Jun 2026','name'=>'Anonim','init'=>'?','color'=>'#6B7B7B','program'=>'Gempa Cianjur','jenis'=>'logistik','nominal'=>'5 kg Beras, 2 Dus Mie','status'=>'process'],
                    ['tgl'=>'08 Jun 2026','name'=>'Siti R.','init'=>'S','color'=>'#E8622A','program'=>'Gempa Cianjur','jenis'=>'dana','nominal'=>'Rp 150.000','status'=>'verified'],
                    ['tgl'=>'08 Jun 2026','name'=>'Ahmad F.','init'=>'A','color'=>'#6366F1','program'=>'Banjir Kalsel','jenis'=>'logistik','nominal'=>'3 Dus Pakaian Layak Pakai','status'=>'verified'],
                    ['tgl'=>'07 Jun 2026','name'=>'Dewi K.','init'=>'D','color'=>'#16A34A','program'=>'Erupsi Gunung Awu','jenis'=>'dana','nominal'=>'Rp 1.000.000','status'=>'verified'],
                    ['tgl'=>'07 Jun 2026','name'=>'Anonim','init'=>'?','color'=>'#6B7B7B','program'=>'Kebakaran Tambora','jenis'=>'dana','nominal'=>'Rp 250.000','status'=>'verified'],
                    ['tgl'=>'06 Jun 2026','name'=>'Rizal H.','init'=>'R','color'=>'#DC2626','program'=>'Banjir Kalsel','jenis'=>'logistik','nominal'=>'Obat-obatan P3K (10 item)','status'=>'process'],
                    ['tgl'=>'06 Jun 2026','name'=>'Maya P.','init'=>'M','color'=>'#D97706','program'=>'Gempa Cianjur','jenis'=>'dana','nominal'=>'Rp 200.000','status'=>'verified'],
                    ['tgl'=>'05 Jun 2026','name'=>'Andi S.','init'=>'A','color'=>'#0891B2','program'=>'Erupsi Gunung Awu','jenis'=>'logistik','nominal'=>'2 Karung Beras (25kg)','status'=>'verified'],
                    ['tgl'=>'05 Jun 2026','name'=>'Rina W.','init'=>'R','color'=>'#7C3AED','program'=>'Kebakaran Tambora','jenis'=>'dana','nominal'=>'Rp 75.000','status'=>'verified'],
                ];
                @endphp
                @foreach($logs as $log)
                <tr data-type="{{ $log['jenis'] }}" data-program="{{ $log['program'] }}">
                    <td style="color:var(--muted);font-size:.8rem">{{ $log['tgl'] }}</td>
                    <td>
                        <div class="donatur-cell">
                            <div class="donatur-av" style="background:{{ $log['color'] }}">{{ $log['init'] }}</div>
                            <span style="font-weight:600">{{ $log['name'] }}</span>
                        </div>
                    </td>
                    <td><span style="font-weight:500">{{ $log['program'] }}</span></td>
                    <td>
                        <span class="type-badge {{ $log['jenis']==='dana'?'type-dana':'type-logistik' }}">
                            {{ $log['jenis']==='dana'?'💳 Dana':'📦 Logistik' }}
                        </span>
                    </td>
                    <td style="font-weight:{{ $log['jenis']==='dana'?'700':'400' }};color:{{ $log['jenis']==='dana'?'var(--teal)':'var(--ink)' }}">
                        {{ $log['nominal'] }}
                    </td>
                    <td>
                        <span class="status-badge {{ $log['status']==='verified'?'status-verified':'status-process' }}">
                            {{ $log['status']==='verified'?'✅ Terverifikasi':'⏳ Diproses' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <p style="text-align:center;color:var(--muted);font-size:.82rem;margin-bottom:1.5rem">Menampilkan 10 dari 12.400+ riwayat donasi</p>

    {{-- PAGINATION --}}
    <div class="pagination">
        <a href="#" class="page-btn">‹</a>
        <a href="#" class="page-btn active">1</a>
        <a href="#" class="page-btn">2</a>
        <a href="#" class="page-btn">3</a>
        <span class="page-btn" style="cursor:default;border-color:transparent">...</span>
        <a href="#" class="page-btn">124</a>
        <a href="#" class="page-btn">›</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
function filterType(type, btn) {
    document.querySelectorAll('.type-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('#logTable tbody tr').forEach(row => {
        row.style.display = (type === 'semua' || row.dataset.type === type) ? '' : 'none';
    });
}
function filterProgram(program) {
    document.querySelectorAll('#logTable tbody tr').forEach(row => {
        row.style.display = (!program || row.dataset.program === program) ? '' : 'none';
    });
}
</script>
@endsection