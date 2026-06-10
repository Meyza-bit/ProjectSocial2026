@extends('layouts.app')
@section('title','Program Donasi — Mari Berbagi')
@section('styles')
<style>
.filter-bar{background:var(--white);padding:1.5rem 5%;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:1rem;flex-wrap:wrap}
.filter-btn{padding:.45rem 1.1rem;border-radius:50px;border:2px solid var(--border);background:transparent;color:var(--muted);font-size:.82rem;font-weight:600;cursor:pointer;transition:all .2s;font-family:'Plus Jakarta Sans',sans-serif}
.filter-btn:hover,.filter-btn.active{background:var(--teal);color:var(--white);border-color:var(--teal)}
.filter-search{flex:1;min-width:200px;padding:.6rem 1rem;border:2px solid var(--border);border-radius:50px;font-family:'Plus Jakarta Sans',sans-serif;font-size:.88rem;outline:none;transition:border-color .2s}
.filter-search:focus{border-color:var(--teal)}

.programs-wrap{padding:2.5rem 5%}
.programs-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(310px,1fr));gap:1.5rem}
.prog-card{background:var(--white);border-radius:20px;overflow:hidden;box-shadow:0 2px 16px rgba(13,110,110,.08);transition:transform .25s,box-shadow .25s;display:flex;flex-direction:column}
.prog-card:hover{transform:translateY(-5px);box-shadow:0 12px 36px rgba(13,110,110,.14)}
.prog-card-img{width:100%;aspect-ratio:16/9;background:linear-gradient(135deg,var(--teal-light),rgba(232,98,42,.1));display:flex;align-items:center;justify-content:center;font-size:3.5rem;position:relative}
.badge-cat{position:absolute;top:.8rem;left:.8rem;background:var(--white);color:var(--teal);font-size:.68rem;font-weight:700;padding:.25rem .6rem;border-radius:50px;text-transform:uppercase}
.badge-urgent{position:absolute;top:.8rem;right:.8rem;background:var(--orange);color:var(--white);font-size:.68rem;font-weight:700;padding:.25rem .6rem;border-radius:50px}
.prog-card-body{padding:1.3rem;flex:1;display:flex;flex-direction:column}
.prog-card-org{font-size:.75rem;color:var(--muted);margin-bottom:.35rem;font-weight:500}
.prog-card-title{font-family:'Fraunces',serif;font-size:1.05rem;font-weight:700;line-height:1.3;margin-bottom:.5rem}
.prog-card-desc{font-size:.82rem;color:var(--muted);line-height:1.65;margin-bottom:1rem;flex:1}
.prog-pbar-wrap{background:var(--teal-light);border-radius:50px;height:6px;margin-bottom:.7rem;overflow:hidden}
.prog-pbar{background:linear-gradient(90deg,var(--teal),var(--orange));height:100%;border-radius:50px}
.prog-card-foot{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:1rem}
.prog-amt{font-weight:700;color:var(--teal);font-size:.9rem}
.prog-tgt{font-size:.72rem;color:var(--muted)}
.prog-pct{font-family:'Fraunces',serif;font-size:1.2rem;font-weight:900;color:var(--teal)}
.prog-card-actions{display:flex;gap:.7rem}
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="sec-lbl">📋 Katalog Program</div>
    <h1>Program Donasi Bencana</h1>
    <p>Pilih program yang ingin kamu bantu. Semua dana dikelola secara transparan dan akuntabel.</p>
</div>

<div class="filter-bar">
    <input type="text" class="filter-search" placeholder="🔍  Cari program...">
    <button class="filter-btn active" onclick="filterProg(this,'semua')">Semua</button>
    <button class="filter-btn" onclick="filterProg(this,'banjir')">🌊 Banjir</button>
    <button class="filter-btn" onclick="filterProg(this,'gempa')">🏚️ Gempa</button>
    <button class="filter-btn" onclick="filterProg(this,'erupsi')">🌋 Erupsi</button>
    <button class="filter-btn" onclick="filterProg(this,'kebakaran')">🔥 Kebakaran</button>
</div>

<div class="programs-wrap">
    <div class="programs-grid">
        @php
        $programs = [
            ['icon'=>'🌊','cat'=>'Banjir','org'=>'BNPB Kalimantan','title'=>'Bantuan Darurat Banjir Kalimantan Selatan','desc'=>'Ratusan keluarga kehilangan tempat tinggal akibat banjir besar yang melanda Kalsel. Butuh bantuan pangan, pakaian, dan obat-obatan.','pct'=>65,'amt'=>'65.000.000','tgt'=>'100.000.000','days'=>7,'urgent'=>true],
            ['icon'=>'🏚️','cat'=>'Gempa','org'=>'Relawan Cianjur','title'=>'Rekonstruksi Rumah Korban Gempa Cianjur','desc'=>'Gempa 5,6 SR meratakan ribuan rumah di Cianjur. Kami membantu membangun kembali hunian sementara bagi warga terdampak.','pct'=>78,'amt'=>'78.000.000','tgt'=>'100.000.000','days'=>14,'urgent'=>true],
            ['icon'=>'🌋','cat'=>'Erupsi','org'=>'PMI Sulawesi','title'=>'Evakuasi & Bantuan Erupsi Gunung Awu','desc'=>'Ribuan warga dievakuasi pasca erupsi Gunung Awu. Bantuan logistik, tempat pengungsian dan kesehatan sangat dibutuhkan.','pct'=>42,'amt'=>'42.000.000','tgt'=>'100.000.000','days'=>21,'urgent'=>false],
            ['icon'=>'🔥','cat'=>'Kebakaran','org'=>'Tagana Jakarta','title'=>'Pemulihan Korban Kebakaran Tambora','desc'=>'Kebakaran besar menghanguskan ratusan rumah di Tambora, Jakarta. Warga membutuhkan bantuan pangan dan pakaian darurat.','pct'=>33,'amt'=>'33.000.000','tgt'=>'100.000.000','days'=>10,'urgent'=>true],
            ['icon'=>'🌊','cat'=>'Banjir','org'=>'Relawan NTT','title'=>'Bantuan Banjir Bandang Flores NTT','desc'=>'Banjir bandang yang melanda Flores merusak ribuan hektare sawah dan ratusan rumah penduduk. Butuh bantuan segera.','pct'=>25,'amt'=>'25.000.000','tgt'=>'100.000.000','days'=>30,'urgent'=>false],
            ['icon'=>'🏚️','cat'=>'Gempa','org'=>'BPBD Sulbar','title'=>'Pemulihan Gempa Mamuju Sulawesi Barat','desc'=>'Pasca gempa bumi, infrastruktur dan tempat tinggal warga Mamuju perlu dibangun kembali dari awal.','pct'=>55,'amt'=>'55.000.000','tgt'=>'100.000.000','days'=>18,'urgent'=>false],
        ];
        @endphp

        @foreach($programs as $prog)
        <div class="prog-card fade-in">
            <div class="prog-card-img">
                {{ $prog['icon'] }}
                <span class="badge-cat">{{ $prog['cat'] }}</span>
                @if($prog['urgent'])<span class="badge-urgent">🔴 Darurat</span>@endif
            </div>
            <div class="prog-card-body">
                <div class="prog-card-org">{{ $prog['org'] }}</div>
                <div class="prog-card-title">{{ $prog['title'] }}</div>
                <div class="prog-card-desc">{{ $prog['desc'] }}</div>
                <div class="prog-pbar-wrap"><div class="prog-pbar" style="width:{{ $prog['pct'] }}%"></div></div>
                <div class="prog-card-foot">
                    <div><div class="prog-amt">Rp {{ $prog['amt'] }}</div><div class="prog-tgt">dari Rp {{ $prog['tgt'] }}</div></div>
                    <div class="prog-pct">{{ $prog['pct'] }}%</div>
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;font-size:.78rem;color:var(--muted);margin-bottom:1rem">
                    <span>⏱ {{ $prog['days'] }} hari lagi</span>
                </div>
                <div class="prog-card-actions">
                    <a href="{{ route('donasi.create') }}" class="btn btn-primary btn-sm" style="flex:1;justify-content:center">💳 Donasi Dana</a>
                    <a href="{{ route('barang.create') }}" class="btn btn-outline btn-sm" style="flex:1;justify-content:center">📦 Kirim Barang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
function filterProg(btn, cat) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
}
document.querySelector('.filter-search').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.prog-card').forEach(card => {
        const title = card.querySelector('.prog-card-title').textContent.toLowerCase();
        card.style.display = title.includes(q) ? '' : 'none';
    });
});
</script>
@endsection