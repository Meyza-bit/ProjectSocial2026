@extends('layouts.app')
@section('title','Ulasan — Mari Berbagi')
@section('styles')
<style>
.feedback-wrap{max-width:860px;margin:0 auto;padding:3rem 5%}
.feedback-form-card{background:var(--white);border-radius:20px;box-shadow:var(--shadow);overflow:hidden;margin-bottom:2.5rem}
.fform-top{background:linear-gradient(135deg,var(--teal-dark),var(--teal));padding:1.8rem 2rem;color:var(--white)}
.fform-top h3{font-family:'Fraunces',serif;font-size:1.3rem;font-weight:700;margin-bottom:.3rem}
.fform-top p{font-size:.85rem;opacity:.85}
.fform-body{padding:2rem}
.star-row{display:flex;gap:.4rem;margin-bottom:.5rem}
.star-btn{font-size:1.8rem;cursor:pointer;transition:transform .15s;background:none;border:none;padding:0;line-height:1;filter:grayscale(1);opacity:.4}
.star-btn:hover,.star-btn.lit{filter:grayscale(0);opacity:1;transform:scale(1.15)}
.star-label{font-size:.78rem;color:var(--muted);margin-bottom:1rem}

/* ULASAN CARDS */
.ulasan-grid{display:flex;flex-direction:column;gap:1rem}
.ulasan-card{background:var(--white);border-radius:16px;padding:1.3rem;box-shadow:0 2px 12px rgba(13,110,110,.07);border-left:4px solid var(--teal);transition:box-shadow .2s}
.ulasan-card:hover{box-shadow:0 6px 24px rgba(13,110,110,.12)}
.ulasan-header{display:flex;align-items:center;gap:.8rem;margin-bottom:.7rem}
.ulasan-avatar{width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.9rem;color:var(--white);flex-shrink:0}
.ulasan-meta{flex:1}
.ulasan-name{font-weight:700;font-size:.9rem}
.ulasan-time{font-size:.73rem;color:var(--muted)}
.ulasan-stars{color:#F59E0B;font-size:.9rem;letter-spacing:.1em}
.ulasan-text{font-size:.88rem;line-height:1.7;color:var(--ink)}
.ulasan-tag{display:inline-block;background:var(--teal-light);color:var(--teal);font-size:.7rem;font-weight:600;padding:.2rem .55rem;border-radius:50px;margin-top:.6rem}
.ulasan-filter{display:flex;gap:.7rem;margin-bottom:1.5rem;flex-wrap:wrap}
.ufilter-btn{padding:.4rem 1rem;border-radius:50px;border:2px solid var(--border);background:transparent;color:var(--muted);font-size:.8rem;font-weight:600;cursor:pointer;transition:all .2s;font-family:'Plus Jakarta Sans',sans-serif}
.ufilter-btn:hover,.ufilter-btn.active{background:var(--teal);color:var(--white);border-color:var(--teal)}
.rating-summary{background:var(--white);border-radius:16px;padding:1.5rem;box-shadow:var(--shadow);margin-bottom:2rem;display:flex;gap:2rem;align-items:center;flex-wrap:wrap}
.rating-big{text-align:center}
.rating-num{font-family:'Fraunces',serif;font-size:3.5rem;font-weight:900;color:var(--teal);line-height:1}
.rating-stars{color:#F59E0B;font-size:1.2rem}
.rating-count{font-size:.78rem;color:var(--muted);margin-top:.2rem}
.rating-bars{flex:1;min-width:200px}
.rbar-row{display:flex;align-items:center;gap:.7rem;margin-bottom:.4rem;font-size:.78rem}
.rbar-lbl{width:32px;text-align:right;color:var(--muted)}
.rbar-wrap{flex:1;background:var(--teal-light);border-radius:50px;height:7px;overflow:hidden}
.rbar-fill{background:var(--teal);height:100%;border-radius:50px}
.rbar-count{width:24px;color:var(--muted)}
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="sec-lbl">⭐ Ulasan</div>
    <h1>Ulasan & Umpan Balik</h1>
    <p>Bagikan pengalaman dan pesanmu untuk mendukung gerakan kebaikan bersama.</p>
</div>

<div class="feedback-wrap fade-in">

    {{-- FORM TULIS ULASAN --}}
    @auth
    <div class="feedback-form-card">
        <div class="fform-top">
            <h3>💬 Tulis Ulasanmu</h3>
            <p>Pesanmu berarti bagi donatur lain dan penerima bantuan</p>
        </div>
        <div class="fform-body">
            <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Program yang diulas</label>
                <select name="program" class="form-control">
                    <option value="">-- Platform Umum --</option>
                    <option>Bantuan Darurat Banjir Kalimantan Selatan</option>
                    <option>Rekonstruksi Rumah Korban Gempa Cianjur</option>
                    <option>Evakuasi & Bantuan Erupsi Gunung Awu</option>
                    <option>Pemulihan Korban Kebakaran Tambora</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Rating</label>
                <div class="star-row" id="starRow">
                    <button type="button" class="star-btn" onclick="setRating(1)">⭐</button>
                    <button type="button" class="star-btn" onclick="setRating(2)">⭐</button>
                    <button type="button" class="star-btn" onclick="setRating(3)">⭐</button>
                    <button type="button" class="star-btn" onclick="setRating(4)">⭐</button>
                    <button type="button" class="star-btn" onclick="setRating(5)">⭐</button>
                </div>
                <div class="star-label" id="starLabel">Klik bintang untuk memberi rating</div>
                <input type="hidden" name="rating" id="inputRating" value="0">
            </div>
            <div class="form-group">
                <label class="form-label">Ulasan / Pesan Moral</label>
                <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="4"
                    placeholder="Ceritakan pengalamanmu berdonasi, tulis saran, kritik membangun, atau pesan dukungan untuk para penerima bantuan..."></textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div style="display:flex;justify-content:flex-end">
                <button type="submit" class="btn btn-primary">Kirim Ulasan →</button>
            </div>
            </form>
        </div>
    </div>
    @else
    <div style="background:var(--white);border-radius:16px;padding:2rem;text-align:center;margin-bottom:2rem;box-shadow:var(--shadow)">
        <p style="color:var(--muted);margin-bottom:1rem">Masuk untuk menulis ulasan dan mendukung gerakan kebaikan.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Masuk untuk Menulis Ulasan</a>
    </div>
    @endauth

    {{-- RATING SUMMARY --}}
    <div class="rating-summary">
        <div class="rating-big">
            <div class="rating-num">4.8</div>
            <div class="rating-stars">⭐⭐⭐⭐⭐</div>
            <div class="rating-count">dari 1.240 ulasan</div>
        </div>
        <div class="rating-bars">
            @foreach([5=>82,4=>12,3=>4,2=>1,1=>1] as $star => $pct)
            <div class="rbar-row">
                <span class="rbar-lbl">{{ $star }}★</span>
                <div class="rbar-wrap"><div class="rbar-fill" style="width:{{ $pct }}%"></div></div>
                <span class="rbar-count">{{ $pct }}%</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- FILTER --}}
    <div class="ulasan-filter">
        <button class="ufilter-btn active">Semua</button>
        <button class="ufilter-btn">⭐⭐⭐⭐⭐ 5 Bintang</button>
        <button class="ufilter-btn">Terbaru</button>
        <button class="ufilter-btn">Donasi Dana</button>
        <button class="ufilter-btn">Donasi Barang</button>
    </div>

    {{-- ULASAN LIST --}}
    <div class="ulasan-grid">
        @php
        $ulasans = [
            ['name'=>'Budi Santoso','init'=>'B','color'=>'#0D6E6E','time'=>'2 jam lalu','rating'=>5,'tag'=>'Banjir Kalsel','text'=>'Luar biasa! Donasi saya sampai tepat waktu dan ada laporan lengkap bagaimana dana digunakan. Platform ini benar-benar transparan dan profesional.'],
            ['name'=>'Siti Rahayu','init'=>'S','color'=>'#E8622A','time'=>'1 hari lalu','rating'=>5,'tag'=>'Gempa Cianjur','text'=>'Alhamdulillah bisa ikut berbagi. Prosesnya mudah, konfirmasi cepat, dan update perkembangan program selalu dikirim. Recommended banget!'],
            ['name'=>'Ahmad Fauzi','init'=>'A','color'=>'#6366F1','time'=>'2 hari lalu','rating'=>4,'tag'=>'Platform Umum','text'=>'Saran: tambahkan fitur notifikasi real-time saat kampanye yang didukung mencapai target. Overall sangat bagus dan mudah digunakan!'],
            ['name'=>'Dewi Kartika','init'=>'D','color'=>'#16A34A','time'=>'3 hari lalu','rating'=>5,'tag'=>'Kirim Barang','text'=>'Sudah kirim 3 dus pakaian layak pakai ke korban gempa. Tim relawan sangat membantu proses koordinasi pengirimannya. Terima kasih Mari Berbagi!'],
            ['name'=>'Rizal Hakim','init'=>'R','color'=>'#DC2626','time'=>'4 hari lalu','rating'=>5,'tag'=>'Banjir Kalsel','text'=>'Platform donasi terbaik yang pernah saya gunakan. Transparan, amanah, dan dampaknya nyata terasa. Semoga terus berkembang!'],
            ['name'=>'Anonim','init'=>'?','color'=>'#6B7B7B','time'=>'5 hari lalu','rating'=>4,'tag'=>'Gempa Cianjur','text'=>'Semoga seluruh korban bencana segera bisa bangkit kembali. Tetap semangat, kalian tidak sendirian. Kami selalu mendukung dari jauh.'],
        ];
        @endphp
        @foreach($ulasans as $u)
        <div class="ulasan-card">
            <div class="ulasan-header">
                <div class="ulasan-avatar" style="background:{{ $u['color'] }}">{{ $u['init'] }}</div>
                <div class="ulasan-meta">
                    <div class="ulasan-name">{{ $u['name'] }}</div>
                    <div class="ulasan-time">{{ $u['time'] }}</div>
                </div>
                <div class="ulasan-stars">{{ str_repeat('⭐', $u['rating']) }}</div>
            </div>
            <div class="ulasan-text">{{ $u['text'] }}</div>
            <span class="ulasan-tag">{{ $u['tag'] }}</span>
        </div>
        @endforeach
    </div>

    <div style="text-align:center;margin-top:2rem">
        <button class="btn btn-outline">Muat Lebih Banyak</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
const ratingLabels = ['','Buruk','Kurang','Cukup','Bagus','Sangat Bagus!'];
function setRating(n) {
    document.querySelectorAll('.star-btn').forEach((s,i) => {
        s.classList.toggle('lit', i < n);
    });
    document.getElementById('inputRating').value = n;
    document.getElementById('starLabel').textContent = ratingLabels[n];
}
document.querySelectorAll('.ufilter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.ufilter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>
@endsection