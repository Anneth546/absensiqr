<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Jadwal | ABSENSI QR</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #070b16;
            --sidebar: rgba(9, 13, 27, 0.96);
            --card: rgba(17, 24, 39, 0.78);
            --card-hover: rgba(22, 30, 48, 0.92);
            --border: rgba(148, 163, 184, 0.16);
            --border-hover: rgba(124, 92, 255, 0.5);
            --text: #f8fafc;
            --muted: #8b95aa;
            --muted-light: #a9b2c5;
            --purple: #7657ff;
            --purple-light: #927cff;
            --blue: #4d9cff;
            --gradient: linear-gradient(
                135deg,
                #7657ff 0%,
                #4d9cff 100%
            );
            --shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            --radius: 18px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(
                    circle at 20% 10%,
                    rgba(118, 87, 255, 0.13),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 85% 20%,
                    rgba(77, 156, 255, 0.10),
                    transparent 28%
                ),
                var(--bg);
            color: var(--text);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 255px;
            height: 100vh;
            padding: 28px 18px;
            background:
                linear-gradient(
                    180deg,
                    rgba(15, 20, 38, 0.98),
                    rgba(7, 11, 22, 0.98)
                );
            border-right: 1px solid var(--border);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            box-shadow: 0 10px 25px rgba(118, 87, 255, 0.28);
        }

        .logo-text {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.4px;
        }

        .logo-text span {
            color: var(--purple-light);
        }

        .menu-title {
            padding: 0 12px;
            margin-bottom: 10px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 12px;
            color: var(--muted-light);
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .menu a:hover {
            background: rgba(118, 87, 255, 0.09);
            color: var(--text);
            transform: translateX(2px);
        }

        .menu a.active {
            background: var(--gradient);
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(118, 87, 255, 0.22);
        }

        .menu-icon {
            width: 20px;
            display: flex;
            justify-content: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .logout-btn {
            width: 100%;
            border: 0;
            background: transparent;
            color: #ff7f96;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 80, 110, 0.08);
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            width: calc(100% - 255px);
            margin-left: 255px;
            min-height: 100vh;
            padding: 32px 35px 45px;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .page-title small {
            display: block;
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 5px;
        }

        .page-title h1 {
            font-size: 27px;
            line-height: 1.2;
            font-weight: 800;
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-info {
            text-align: right;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 700;
        }

        .profile-role {
            margin-top: 3px;
            font-size: 11px;
            color: var(--muted);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(118, 87, 255, 0.22);
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 28px;
            max-width: 850px;
        }

        .form-header {
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .form-header h2 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .form-header p {
            color: var(--muted-light);
            font-size: 13px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            color: var(--muted-light);
            font-size: 12px;
            font-weight: 700;
        }

        .form-label span {
            color: #ff7f96;
        }

        .form-control {
            width: 100%;
            padding: 13px 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: rgba(7, 11, 22, 0.75);
            color: var(--text);
            outline: none;
            font-size: 13px;
            transition: 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 3px rgba(118, 87, 255, 0.10);
        }

        .form-control::placeholder {
            color: var(--muted);
        }

        select.form-control {
            cursor: pointer;
        }

        select.form-control option {
            background: #111827;
            color: #ffffff;
        }

        .error {
            color: #ff8fa3;
            font-size: 11px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-secondary {
            background: rgba(148, 163, 184, 0.07);
            border: 1px solid var(--border);
            color: var(--muted-light);
        }

        .btn-secondary:hover {
            background: rgba(148, 163, 184, 0.12);
            color: var(--text);
        }

        .btn-primary {
            background: var(--gradient);
            border: 0;
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(118, 87, 255, 0.22);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(118, 87, 255, 0.3);
        }

        /* =========================
           MOBILE HEADER
        ========================= */

        .mobile-header {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 65px;
            padding: 0 16px;
            background: rgba(7, 11, 22, 0.92);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(16px);
            z-index: 900;
            align-items: center;
            justify-content: space-between;
        }

        .mobile-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mobile-logo-icon {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 800;
        }

        .mobile-logo-text {
            font-size: 15px;
            font-weight: 800;
        }

        .hamburger {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            border: 1px solid var(--border);
            background: rgba(17, 24, 39, 0.8);
            color: var(--text);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: 950;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 760px) {

            .sidebar {
                width: 270px;
                transform: translateX(-100%);
                box-shadow: 20px 0 50px rgba(0, 0, 0, 0.35);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .mobile-header {
                display: flex;
            }

            .main {
                width: 100%;
                margin-left: 0;
                padding: 85px 16px 35px;
            }

            .profile-mini {
                display: none;
            }

            .page-title h1 {
                font-size: 23px;
            }

            .form-card {
                padding: 21px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 430px) {

            .main {
                padding-left: 13px;
                padding-right: 13px;
            }

            .page-title h1 {
                font-size: 21px;
            }

            .form-card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

    {{-- MOBILE HEADER --}}
    <header class="mobile-header">

        <div class="mobile-logo">
            <div class="mobile-logo-icon">
                QR
            </div>

            <div class="mobile-logo-text">
                ABSENSI QR
            </div>
        </div>

        <button
            type="button"
            class="hamburger"
            onclick="toggleSidebar()"
            aria-label="Buka menu"
        >
            ☰
        </button>

    </header>


    {{-- SIDEBAR OVERLAY --}}
    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
        onclick="closeSidebar()"
    ></div>


    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">

        <div class="logo">

            <div class="logo-icon">
                QR
            </div>

            <div class="logo-text">
                ABSENSI <span>QR</span>
            </div>

        </div>


        <div class="menu-title">
            Menu Dosen
        </div>


        <nav class="menu">

            {{-- Dashboard --}}
            <a href="{{ url('/dosen/dashboard') }}">
                <span class="menu-icon">▦</span>
                <span>Dashboard</span>
            </a>

            {{-- Mata Kuliah --}}
            <a href="{{ route('dosen.mata-kuliah') }}">
                <span class="menu-icon">▤</span>
                <span>Mata Kuliah</span>
            </a>

            {{-- Jadwal --}}
            <a
                href="{{ route('dosen.jadwal') }}"
                class="active"
            >
                <span class="menu-icon">◫</span>
                <span>Jadwal</span>
            </a>

            {{-- Sesi Absensi --}}
            <a href="{{ route('dosen.sesi-absensi') }}">
                <span class="menu-icon">▣</span>
                <span>Sesi Absensi</span>
            </a>

            {{-- Daftar Kehadiran --}}
            <a href="{{ route('dosen.kehadiran') }}">
                <span class="menu-icon">✓</span>
                <span>Daftar Kehadiran</span>
            </a>

            {{-- Izin / Sakit --}}
            <a href="{{ route('dosen.pengajuan-absensi') }}">
                <span class="menu-icon">◉</span>
                <span>Izin / Sakit</span>
            </a>

            {{-- Riwayat --}}
            <a href="{{ route('dosen.riwayat') }}">
                <span class="menu-icon">◷</span>
                <span>Riwayat</span>
            </a>

            {{-- Profil --}}
            <a href="{{ route('dosen.profil') }}">
                <span class="menu-icon">◎</span>
                <span>Profil</span>
            </a>

        </nav>


        {{-- LOGOUT --}}
        <div class="sidebar-bottom">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    <span class="menu-icon">↪</span>
                    <span>Logout</span>
                </button>

            </form>

        </div>

    </aside>


    {{-- MAIN --}}
    <main class="main">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="page-title">

                <small>
                    Dosen
                </small>

                <h1>
                    Tambah Jadwal
                </h1>

            </div>


            <div class="profile-mini">

                <div class="profile-info">

                    <div class="profile-name">
                        {{ $dosen->nama }}
                    </div>

                    <div class="profile-role">
                        Dosen
                    </div>

                </div>

                <div class="avatar">
                    {{ strtoupper(substr($dosen->nama, 0, 1)) }}
                </div>

            </div>

        </div>


        {{-- FORM --}}
        <section class="form-card">

            <div class="form-header">

                <h2>
                    Buat Jadwal Mengajar
                </h2>

                <p>
                    Isi informasi jadwal mata kuliah yang akan kamu ajarkan.
                    Jadwal ini nantinya dapat digunakan untuk membuat sesi
                    absensi dan QR Code.
                </p>

            </div>


            <form
                action="{{ route('dosen.jadwal.store') }}"
                method="POST"
            >

                @csrf


                <div class="form-grid">

                    {{-- MATA KULIAH --}}
                    <div class="form-group">

                        <label class="form-label">
                            Mata Kuliah <span>*</span>
                        </label>

                        <select
                            name="mata_kuliah_id"
                            class="form-control"
                            required
                        >

                            <option value="">
                                -- Pilih Mata Kuliah --
                            </option>

                            @foreach($mataKuliahs as $mataKuliah)

                                <option
                                    value="{{ $mataKuliah->id }}"
                                    {{ old('mata_kuliah_id') == $mataKuliah->id ? 'selected' : '' }}
                                >
                                    {{ $mataKuliah->kode }}
                                    -
                                    {{ $mataKuliah->nama }}
                                    ({{ $mataKuliah->sks }} SKS)
                                </option>

                            @endforeach

                        </select>

                        @error('mata_kuliah_id')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- KELAS --}}
                    <div class="form-group">

                        <label class="form-label">
                            Kelas <span>*</span>
                        </label>

                        <select
                            name="kelas_id"
                            class="form-control"
                            required
                        >

                            <option value="">
                                -- Pilih Kelas --
                            </option>

                            @foreach($kelass as $kelas)

                                <option
                                    value="{{ $kelas->id }}"
                                    {{ old('kelas_id') == $kelas->id ? 'selected' : '' }}
                                >
                                    {{ $kelas->nama }}

                                    @if($kelas->program_studi)
                                        - {{ $kelas->program_studi }}
                                    @endif

                                    @if($kelas->angkatan)
                                        ({{ $kelas->angkatan }})
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        @error('kelas_id')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- HARI --}}
                    <div class="form-group">

                        <label class="form-label">
                            Hari <span>*</span>
                        </label>

                        <select
                            name="hari"
                            class="form-control"
                            required
                        >

                            <option value="">
                                -- Pilih Hari --
                            </option>

                            @foreach([
                                'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu',
                                'Minggu'
                            ] as $hari)

                                <option
                                    value="{{ $hari }}"
                                    {{ old('hari') == $hari ? 'selected' : '' }}
                                >
                                    {{ $hari }}
                                </option>

                            @endforeach

                        </select>

                        @error('hari')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- RUANGAN --}}
                    <div class="form-group">

                        <label class="form-label">
                            Ruangan
                        </label>

                        <input
                            type="text"
                            name="ruangan"
                            class="form-control"
                            value="{{ old('ruangan') }}"
                            placeholder="Contoh: Lab RPL / Ruang 201"
                        >

                        @error('ruangan')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JAM MULAI --}}
                    <div class="form-group">

                        <label class="form-label">
                            Jam Mulai <span>*</span>
                        </label>

                        <input
                            type="time"
                            name="jam_mulai"
                            class="form-control"
                            value="{{ old('jam_mulai') }}"
                            required
                        >

                        @error('jam_mulai')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JAM SELESAI --}}
                    <div class="form-group">

                        <label class="form-label">
                            Jam Selesai <span>*</span>
                        </label>

                        <input
                            type="time"
                            name="jam_selesai"
                            class="form-control"
                            value="{{ old('jam_selesai') }}"
                            required
                        >

                        @error('jam_selesai')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="form-actions">

                    <a
                        href="{{ route('dosen.jadwal') }}"
                        class="btn btn-secondary"
                    >
                        ← Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        ✓ Simpan Jadwal
                    </button>

                </div>

            </form>

        </section>

    </main>


    <script>

        const sidebar =
            document.getElementById('sidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        function toggleSidebar() {

            sidebar.classList.toggle('open');

            sidebarOverlay.classList.toggle('show');

        }


        function closeSidebar() {

            sidebar.classList.remove('open');

            sidebarOverlay.classList.remove('show');

        }


        document.addEventListener(
            'keydown',
            function(event) {

                if (event.key === 'Escape') {
                    closeSidebar();
                }

            }
        );


        document
            .querySelectorAll('.sidebar a')
            .forEach(function(link) {

                link.addEventListener(
                    'click',
                    function() {

                        if (window.innerWidth <= 760) {
                            closeSidebar();
                        }

                    }
                );

            });


        window.addEventListener(
            'resize',
            function() {

                if (window.innerWidth > 760) {
                    closeSidebar();
                }

            }
        );

    </script>

</body>

</html>