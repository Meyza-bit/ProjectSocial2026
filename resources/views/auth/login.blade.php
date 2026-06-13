@extends('layouts.app')
@section('title','Masuk — Mari Berbagi')
@section('styles')
<style>
    /* Earthy Color Palette Variables */
    :root {
        --primary-brown: #5C4033;      /* Deep Warm Brown */
        --accent-amber: #A0522D;       /* Sienna / Warm Terracotta */
        --bg-cream: #FAF7F2;           /* Soft Linen/Cream Background */
        --border-soft: #EAE3D8;        /* Subtle Warm Gray/Brown Border */
        --text-dark: #2F221A;          /* Very Dark Charcoal Brown */
        --text-muted: #8C7A6B;         /* Soft Muted Earthy Brown */
        --cream-light: #F4EFE6;        /* Light Cream for Hover & Highlights */
    }

    .auth-wrap {
        min-height: calc(100vh - 70px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 5%;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--text-dark);
    }

    .auth-card {
        background: #FFFFFF;
        border: 1px solid var(--border-soft);
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(92, 64, 51, 0.04);
        width: 100%;
        max-width: 440px;
        overflow: hidden;
        transition: transform 0.2s ease;
    }

    .auth-top {
        background: linear-gradient(135deg, var(--primary-brown), var(--accent-amber));
        padding: 3rem 2.5rem 2.5rem;
        text-align: center;
    }

    .auth-logo {
        font-family: 'Fraunces', serif;
        font-weight: 900;
        font-size: 1.8rem;
        color: #FFFFFF;
        margin-bottom: .4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .auth-logo span {
        color: #EEDCC5; /* Soft warm gold/cream */
        font-size: 1.6rem;
    }

    .auth-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: .9rem;
        letter-spacing: 0.01em;
    }

    .auth-body {
        padding: 2.5rem;
    }

    /* Inputs Modern Styling */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 0.4rem;
        display: block;
        color: var(--text-dark);
    }

    .form-control {
        width: 100%;
        border: 1px solid var(--border-soft);
        background-color: #FAFAFA;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        color: var(--text-dark);
        transition: all 0.2s;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: var(--primary-brown);
        background-color: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(92, 64, 51, 0.1);
        outline: none;
    }

    /* Custom Checkbox Styling */
    .remember-label {
        display: flex;
        align-items: center;
        gap: .5rem;
        font-size: .85rem;
        font-weight: 500;
        cursor: pointer;
        color: var(--text-muted);
    }

    .remember-label input[type="checkbox"] {
        accent-color: var(--primary-brown);
        width: 15px;
        height: 15px;
    }

    /* Primary Button Style */
    .btn-primary-brown {
        background: var(--primary-brown);
        color: #FFFFFF;
        width: 100%;
        padding: 0.8rem 1.5rem;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: background 0.2s, transform 0.1s;
    }

    .btn-primary-brown:hover {
        background: var(--accent-amber);
    }

    .btn-primary-brown:active {
        transform: scale(0.98);
    }

    /* Footer Links */
    .auth-footer {
        text-align: center;
        margin-top: 1.75rem;
        font-size: .85rem;
        color: var(--text-muted);
    }

    .auth-footer a {
        color: var(--accent-amber);
        font-weight: 700;
        text-decoration: none;
        transition: color 0.2s;
    }

    .auth-footer a:hover {
        color: var(--primary-brown);
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="auth-wrap fade-in">
    <div class="auth-card">
        <div class="auth-top">
            <div class="auth-logo"><span>🤎</span> Mari Berbagi</div>
            <div class="auth-subtitle">Masuk untuk mulai berdonasi</div>
        </div>
        <div class="auth-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@kamu.com" value="{{ old('email') }}" required autofocus>
                    @error('email')<div class="invalid-feedback" style="color: red; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••" required>
                    @error('password')<div class="invalid-feedback" style="color: red; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div>@enderror
                </div>
                
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.75rem">
                    <label class="remember-label">
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                </div>
                
                <button type="submit" class="btn-primary-brown">Masuk →</button>
            </form>
            
            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection