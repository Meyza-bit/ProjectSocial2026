<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} — Matcha Theme</title>

        <!-- Google Fonts: Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */ 
                @layer properties {
                    @supports (((-webkit-hyphens:none)) and (not (margin-trim:inline))) or ((-moz-orient:inline) and (not (color:rgb(from red r g b)))){
                        *,:before,:after,::backdrop{
                            --tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-space-x-reverse:0;--tw-border-style:solid;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-content:""
                        }
                    }
                }
                
                @layer theme {
                    :root, :host {
                        /* Ganti Font Utama Menjadi Inter */
                        --font-sans: "Inter", ui-sans-serif, system-ui, sans-serif;
                        
                        /* RE-BRANDING VARIABEL WARNA MENJADI MATCHA TONE */
                        --color-matcha-dark: #2d4a22;    /* Matcha Pekat */
                        --color-matcha-main: #557c43;    /* Matcha Alami */
                        --color-matcha-light: #e8eedf;   /* Matcha Susu / Soft */
                        --color-matcha-bg: #f4f7f0;      /* Background Matcha Halus */
                        
                        /* Pemetaan Ulang Warna Gray Bawaan Laravel ke Khaki/Abu Hijau Muted */
                        --color-gray-50: #fbfcfb;
                        --color-gray-100: #f4f7f0;
                        --color-gray-200: #e8eedf;
                        --color-gray-300: #dee5d8;
                        --color-gray-400: #b1bfae;
                        --color-gray-500: #889981;
                        --color-gray-600: #6b7c65;
                        --color-gray-700: #4f5d4a;
                        --color-gray-800: #354131;
                        --color-gray-900: #1c2816;
                        
                        /* Mengubah Warna Aksen Merah/Orange Bawaan Laravel Menjadi Hijau Matcha */
                        --color-red-500: #557c43;
                        --color-red-600: #2d4a22;
                        --color-orange-500: #557c43;
                        --color-orange-600: #2d4a22;
                        
                        --spacing: .25rem;
                        --radius-md: .375rem;
                        --radius-lg: .5rem;
                        --radius-xl: .75rem;
                    }
                }

                @layer base {
                    *, :after, :before, ::backdrop {
                        box-sizing: border-box;
                        border: 0 solid;
                        margin: 0;
                        padding: 0;
                    }
                    html, :host {
                        -webkit-text-size-adjust: 100%;
                        tab-size: 4;
                        line-height: 1.5;
                        font-family: var(--font-sans);
                        -webkit-tap-highlight-color: transparent;
                        background-color: var(--color-gray-50);
                    }
                    body {
                        font-family: "Inter", sans-serif !important;
                    }
                }

                /* Custom Utilities Tambahan Supaya Matchanya Solid */
                .text-matcha-main { color: var(--color-matcha-main); }
                .text-matcha-dark { color: var(--color-matcha-dark); }
                .bg-matcha-light { background-color: var(--color-matcha-light); }
                .bg-matcha-main { background-color: var(--color-matcha-main); }
                .border-matcha { border-color: var(--color-gray-300); }

                /* Segala class warna custom bawaan kode kamu kita overwrite ke tema matcha */
                .bg-\[\#1b1b18\] { background-color: var(--color-matcha-dark) !important; }
                .text-\[\#1b1b18\] { color: var(--color-matcha-dark) !important; }
                .text-\[\#1B1B18\] { color: var(--color-matcha-dark) !important; }
                .text-\[\#706f6c\] { color: var(--color-gray-600) !important; }
                .bg-\[\#FDFDFC\] { background-color: #ffffff !important; }
                .border-\[\#e3e3e0\] { border-color: var(--color-gray-300) !important; }
                .text-\[\#f53003\] { color: #d32f2f !important; } /* Khusus error/alert tetap merah kalem */
            </style>
        @endif
        
        @yield('styles')
    </head>
    <body class="antialiased">
        
        <!-- Wrapper Utama Komponen Halaman -->
        <div class="min-h-screen flex flex-col justify-between bg-gray-50">
            
            <!-- Jika ini adalah File Layout Utama (app.blade.php) -->
            @if(View::hasSection('content'))
                <nav class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200 shadow-sm">
                    <div class="font-bold text-lg text-matcha-dark" style="font-family: 'Inter';">🍵 Mari Berbagi</div>
                    <div class="text-sm text-gray-500 font-medium">Branch: <span class="px-2 py-1 bg-matcha-light text-matcha-dark rounded-full font-semibold">Hira</span></div>
                </nav>
                
                <main class="flex-1">
                    @yield('content')
                </main>
            @else
                <!-- Jika ini file Welcome Page langsung (Halaman Demo Awal) -->
                <div class="flex flex-col items-center justify-center flex-1 p-6 text-center">
                    <div class="max-w-xl bg-white p-8 rounded-t-lg border border-gray-200 shadow-md">
                        <span class="text-3xl">🍵</span>
                        <h1 class="text-2xl font-bold text-gray-900 mt-2" style="font-family: 'Inter';">Project Social 2026</h1>
                        <p class="text-sm text-gray-600 mt-2">Halaman template dasar berhasil diubah ke tema Hijau Matcha & Font Inter!</p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center justify-center px-4 py-2 bg-matcha-main text-white font-semibold rounded-md shadow hover:bg-matcha-dark transition">
                                Jelajahi Program Donasi
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Footer Simpel -->
            <footer class="py-4 text-center text-xs text-gray-400 border-t border-gray-200 bg-white">
                &copy; 2026 ProjectSocial — Tema Matcha Terintegrasi (Branch Hira)
            </footer>
        </div>

        @yield('scripts')
    </body>
</html>