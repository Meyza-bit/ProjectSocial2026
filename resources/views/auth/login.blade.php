@extends('layouts.app')
@section('title','Masuk — Mari Berbagi')
@section('styles')
<style>
.auth-wrap{min-height:calc(100vh - 70px);display:flex;align-items:center;justify-content:center;padding:3rem 5%}
.auth-card{background:var(--white);border-radius:24px;box-shadow:var(--shadow);width:100%;max-width:440px;overflow:hidden}
.auth-top{background:linear-gradient(135deg,var(--teal-dark),var(--teal));padding:2.5rem 2.5rem 2rem;text-align:center}
.auth-logo{font-family:'Fraunces',serif;font-weight:900;font-size:1.6rem;color:var(--white);margin-bottom:.3rem}
.auth-logo span{color:#FFD580}
.auth-subtitle{color:rgba(255,255,255,.8);font-size:.88rem}
.auth-body{padding:2.5rem}
.auth-footer{text-align:center;margin-top:1.5rem;font-size:.85rem;color:var(--muted)}
.auth-footer a{color:var(--teal);font-weight:600;text-decoration:none}
.divider{display:flex;align-items:center;gap:.8rem;margin:1.5rem 0;color:var(--muted);font-size:.8rem}
.divider::before,.divider::after{content:'';flex:1;height:1px;background:var(--border)}
</style>
@endsection

@section('content')
<div class="auth-wrap fade-in">
    <div class="auth-card">
        <div class="auth-top">
            <div class="auth-logo"><span>♥</span> Mari Berbagi</div>
            <div class="auth-subtitle">Masuk untuk mulai berdonasi</div>
        </div>
        <div class="auth-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@kamu.com" value="{{ old('email') }}" required autofocus>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
                    <label style="display:flex;align-items:center;gap:.5rem;font-size:.84rem;cursor:pointer">
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center">Masuk →</button>
            </form>
            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection