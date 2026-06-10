@extends('layouts.app')
@section('title','Daftar — Mari Berbagi')
@section('styles')
<style>
.auth-wrap{min-height:calc(100vh - 70px);display:flex;align-items:center;justify-content:center;padding:3rem 5%}
.auth-card{background:var(--white);border-radius:24px;box-shadow:var(--shadow);width:100%;max-width:480px;overflow:hidden}
.auth-top{background:linear-gradient(135deg,var(--teal-dark),var(--teal));padding:2.5rem 2.5rem 2rem;text-align:center}
.auth-logo{font-family:'Fraunces',serif;font-weight:900;font-size:1.6rem;color:var(--white);margin-bottom:.3rem}
.auth-logo span{color:#FFD580}
.auth-subtitle{color:rgba(255,255,255,.8);font-size:.88rem}
.auth-body{padding:2.5rem}
.auth-footer{text-align:center;margin-top:1.5rem;font-size:.85rem;color:var(--muted)}
.auth-footer a{color:var(--teal);font-weight:600;text-decoration:none}
.row-2{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
</style>
@endsection

@section('content')
<div class="auth-wrap fade-in">
    <div class="auth-card">
        <div class="auth-top">
            <div class="auth-logo"><span>♥</span> Mari Berbagi</div>
            <div class="auth-subtitle">Bergabung dan mulai berbagi kebaikan</div>
        </div>
        <div class="auth-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nama kamu" value="{{ old('name') }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@kamu.com" value="{{ old('email') }}" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="08xxxxxxxxxx" value="{{ old('phone') }}">
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row-2">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Min. 8 karakter" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:.5rem">Daftar Sekarang →</button>
            </form>
            <div class="auth-footer">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>
</div>
@endsection