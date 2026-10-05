<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Izin / Sakit | Absensi QR</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #080c16;
            color: #fff;
            overflow-x: hidden;
        }

        body.sidebar-open {
            overflow: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }


        /* =====================================================
           LAYOUT
        ====================================================== */

        .dashboard-layout {
            min-height: 100vh;
        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 240px;
            height: 100vh;

            display: flex;
            flex-direction: column;

            background: #0c1120;
            border-right: 1px solid #20283a;

            z-index: 1100;

            transition: transform 0.3s ease;
        }


        /* =====================================================
           LOGO
        ====================================================== */

        .sidebar-logo {
            height: 100px;

            display: flex;
            align-items: center;

            gap: 13px;
            padding: 0 20px;

            border-bottom: 1px solid #20283a;

            flex-shrink: 0;
        }

        .logo-icon {
            width: 44px;
            height: 44px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: linear-gradient(
                135deg,
                #7657ff,
                #5c8dff
            );

            color: #fff;

            font-size: 18px;
            font-weight: 800;
        }

        .logo-title {
            color: #fff;
            font-size: 17px;
            font-weight: 700;
        }

        .logo-subtitle {
            margin-top: 4px;
            color: #8b9aba;
            font-size: 10px;
        }


        /* =====================================================
           SIDEBAR MENU
        ====================================================== */

        .sidebar-menu {
            flex: 1;
            min-height: 0;

            overflow-y: auto;
            overscroll-behavior: contain;
            scrollbar-width: thin;
            scrollbar-color: #555d6d transparent;

            padding: 23px 16px 15px;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: #555d6d;
            border-radius: 10px;
        }

        .menu-title {
            padding-left: 13px;
            margin-bottom: 10px;

            color: #66748f;

            font-size: 10px;
            font-weight: 700;

            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;

            gap: 4px;

            margin-bottom: 25px;
        }

        .nav-item {
            min-height: 46px;

            display: flex;
            align-items: center;

            gap: 13px;

            padding: 0 14px;

            border-radius: 11px;

            color: #9ba9c1;

            font-size: 13px;
            font-weight: 600;

            transition: 0.2s;

            cursor: pointer;
        }

        .nav-item:hover {
            background: #151c30;
            color: #fff;
        }

        .nav-item.active {
            background: #1b2441;
            color: #fff;

            box-shadow:
                inset 3px 0 0 #7657ff;
        }

        .nav-icon {
            width: 21px;
            min-width: 21px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;
        }


        /* =====================================================
           SIDEBAR BOTTOM
        ====================================================== */

        .sidebar-bottom {
            flex-shrink: 0;

            padding: 15px 16px 17px;

            border-top: 1px solid #20283a;
        }


        /* =====================================================
           USER
        ====================================================== */

        .user-card {
            display: flex;
            align-items: center;

            gap: 9px;

            padding: 10px;
            margin-bottom: 9px;

            background: #151b2b;

            border: 1px solid #242d40;
            border-radius: 12px;
        }

        .user-avatar {
            width: 37px;
            height: 37px;

            min-width: 37px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #7258ff,
                #608dff
            );

            font-size: 14px;
            font-weight: 700;
        }

        .user-info {
            min-width: 0;
        }

        .user-name {
            max-width: 145px;

            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;

            font-size: 11px;
            font-weight: 700;
        }

        .user-npm {
            margin-top: 3px;

            color: #8290aa;
            font-size: 9px;
        }


        /* =====================================================
           LOGOUT
        ====================================================== */

        .logout-form {
            margin: 0;
        }

        .logout-button {
            width: 100%;
            height: 41px;

            display: flex;
            align-items: center;

            gap: 13px;

            padding: 0 14px;

            border: none;
            border-radius: 10px;

            background: transparent;

            color: #9ba9c1;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
            text-align: left;

            transition: 0.2s;
        }

        .logout-button:hover {
            background: #171522;
            color: #ff899b;
        }


        /* =====================================================
           MAIN
        ====================================================== */

        .main {
            margin-left: 240px;

            width: calc(100% - 240px);

            min-height: 100vh;

            padding: 30px 34px 45px;
        }


        /* =====================================================
           MOBILE HEADER
        ====================================================== */

        .mobile-header {
            display: none;

            height: 58px;

            align-items: center;
            justify-content: space-between;

            padding: 0 4px;

            margin: -30px -34px 25px;

            background: #0c1120;

            border-bottom: 1px solid #20283a;

            position: relative;

            z-index: 100;
        }

        .mobile-logo {
            color: #fff;

            font-size: 17px;
            font-weight: 700;
        }

        .hamburger-button {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #29344a;
            border-radius: 11px;

            background: #151d2e;

            color: #fff;

            cursor: pointer;

            font-size: 23px;

            line-height: 1;

            transition: 0.2s;

            flex-shrink: 0;
        }

        .hamburger-button:hover {
            background: #1c2740;
            border-color: #7657ff;
        }

        .hamburger-button:active {
            transform: scale(0.95);
        }


        /* =====================================================
           OVERLAY MOBILE
        ====================================================== */

        .sidebar-overlay {
            position: fixed;

            inset: 0;

            background: rgba(0, 0, 0, 0.60);

            z-index: 1050;

            opacity: 0;
            visibility: hidden;

            transition:
                opacity 0.3s ease,
                visibility 0.3s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }


        /* =====================================================
           PAGE HEADER
        ====================================================== */

        .page-header {
            margin-bottom: 25px;
        }

        .page-title h1 {
            color: #fff;

            font-size: 32px;
            font-weight: 700;

            letter-spacing: -0.5px;
        }

        .page-title p {
            margin-top: 7px;

            color: #8da0c0;

            font-size: 14px;
        }


        /* =====================================================
           ALERT SUCCESS
        ====================================================== */

        .alert-success {
            display: flex;
            align-items: center;

            gap: 10px;

            margin-bottom: 20px;

            padding: 13px 16px;

            background: #102d21;

            border: 1px solid #23563e;
            border-radius: 12px;

            color: #72dfa2;

            font-size: 13px;
        }


        /* =====================================================
           ERROR
        ====================================================== */

        .error-box {
            margin-bottom: 20px;

            padding: 13px 16px;

            background: #321b23;

            border: 1px solid #63313e;
            border-radius: 12px;

            color: #ff91a5;

            font-size: 13px;
        }

        .error-box ul {
            margin-left: 18px;
        }


        /* =====================================================
           CONTENT GRID
        ====================================================== */

        .content-grid {
            display: grid;

            grid-template-columns:
                minmax(300px, 0.8fr)
                minmax(360px, 1.2fr);

            gap: 20px;

            align-items: start;
        }


        /* =====================================================
           CARD
        ====================================================== */

        .card {
            background: #111827;

            border: 1px solid #202a3d;
            border-radius: 16px;

            overflow: hidden;

            min-width: 0;
        }

        .card-header {
            min-height: 62px;

            display: flex;
            align-items: center;

            padding: 0 22px;

            border-bottom: 1px solid #202a3d;
        }

        .card-title {
            color: #fff;

            font-size: 17px;
            font-weight: 700;
        }

        .card-body {
            padding: 22px;
        }


        /* =====================================================
           FORM
        ====================================================== */

        .form-group {
            margin-bottom: 17px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;

            margin-bottom: 7px;

            color: #b8c4d8;

            font-size: 12px;
            font-weight: 600;
        }

        .required {
            color: #ff758d;
        }

        .form-control {
            width: 100%;
            height: 44px;

            padding: 0 13px;

            background: #0c1220;

            border: 1px solid #29344a;
            border-radius: 10px;

            color: #fff;

            font-size: 13px;

            outline: none;

            transition: 0.2s;

            min-width: 0;
        }

        .form-control:focus {
            border-color: #7657ff;

            box-shadow:
                0 0 0 3px rgba(118, 87, 255, 0.10);
        }

        textarea.form-control {
            height: 105px;

            padding: 12px 13px;

            resize: vertical;
        }

        .form-control option {
            background: #111827;
            color: #fff;
        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .submit-button {
            width: 100%;
            height: 45px;

            margin-top: 5px;

            border: none;
            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #7657ff,
                #5c8dff
            );

            color: #fff;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.2s;
        }

        .submit-button:hover {
            transform: translateY(-1px);

            box-shadow:
                0 8px 20px rgba(92, 93, 255, 0.20);
        }


        /* =====================================================
           LIST PENGAJUAN
        ====================================================== */

        .submission-list {
            display: flex;
            flex-direction: column;

            gap: 12px;
        }

        .submission-item {
            padding: 15px;

            background: #0c1220;

            border: 1px solid #252f43;
            border-radius: 12px;

            min-width: 0;
        }

        .submission-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            gap: 15px;

            margin-bottom: 9px;
        }

        .submission-course {
            color: #fff;

            font-size: 13px;
            font-weight: 700;

            line-height: 1.4;

            overflow-wrap: anywhere;
        }

        .submission-date {
            margin-top: 4px;

            color: #7f8faa;

            font-size: 11px;
        }

        .submission-info {
            display: flex;

            flex-wrap: wrap;

            gap: 7px;

            margin-bottom: 9px;
        }

        .info-badge {
            padding: 5px 8px;

            background: #181f31;

            border-radius: 7px;

            color: #94a4bf;

            font-size: 10px;

            max-width: 100%;

            overflow-wrap: anywhere;
        }

        .submission-reason {
            color: #8998b1;

            font-size: 11px;

            line-height: 1.5;

            overflow-wrap: anywhere;
        }


        /* =====================================================
           JENIS
        ====================================================== */

        .jenis {
            display: inline-flex;

            padding: 5px 8px;

            border-radius: 7px;

            font-size: 10px;
            font-weight: 700;

            max-width: 100%;
        }

        .jenis-sakit {
            background: #321e2b;
            color: #ff8ca3;
        }

        .jenis-izin {
            background: #172d45;
            color: #78b8ff;
        }

        .jenis-terlambat {
            background: #3a2d18;
            color: #f4c86c;
        }

        .jenis-default {
            background: #252036;
            color: #bd9fff;
        }


        /* =====================================================
           STATUS
        ====================================================== */

        .status {
            display: inline-flex;

            padding: 5px 8px;

            border-radius: 7px;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;

            flex-shrink: 0;
        }

        .status-menunggu {
            background: #3a2d18;
            color: #f5c86b;
        }

        .status-disetujui {
            background: #123524;
            color: #62d995;
        }

        .status-ditolak {
            background: #3a2020;
            color: #ff8b8b;
        }


        /* =====================================================
           EMPTY
        ====================================================== */

        .empty-state {
            min-height: 300px;

            display: flex;
            flex-direction: column;

            align-items: center;
            justify-content: center;

            padding: 30px;

            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 15px;

            background: #181c46;

            border-radius: 15px;

            font-size: 29px;
        }

        .empty-state h3 {
            margin-bottom: 7px;

            color: #fff;

            font-size: 17px;
        }

        .empty-state p {
            max-width: 320px;

            color: #8494b1;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =====================================================
           TABLET / LAPTOP KECIL
        ====================================================== */

        @media (max-width: 1100px) {

            .content-grid {
                grid-template-columns: 1fr;
            }

        }


        /* =====================================================
           TABLET + MOBILE
        ====================================================== */

        @media (max-width: 900px) {

            /* SIDEBAR MENJADI DRAWER */

            .sidebar {
                transform: translateX(-100%);

                box-shadow:
                    10px 0 35px rgba(0, 0, 0, 0.35);
            }

            .sidebar.open {
                transform: translateX(0);
            }


            /* MAIN FULL WIDTH */

            .main {
                width: 100%;
                margin-left: 0;

                padding: 24px 24px 40px;
            }


            /* HEADER MOBILE MUNCUL */

            .mobile-header {
                display: flex;

                margin:
                    -24px -24px 25px;

                padding:
                    0 18px;
            }


            /* HAMBURGER SELALU TERLIHAT */

            .hamburger-button {
                display: flex;
            }


            .page-title h1 {
                font-size: 29px;
            }

        }


        /* =====================================================
           MOBILE BESAR
        ====================================================== */

        @media (max-width: 600px) {

            .main {
                padding: 18px 15px 30px;
            }

            .mobile-header {
                height: 56px;

                margin:
                    -18px -15px 22px;

                padding:
                    0 15px;
            }

            .mobile-logo {
                font-size: 16px;
            }

            .hamburger-button {
                width: 42px;
                height: 42px;

                font-size: 22px;
            }

            .page-header {
                margin-bottom: 20px;
            }

            .page-title h1 {
                font-size: 25px;
                letter-spacing: -0.3px;
            }

            .page-title p {
                font-size: 12px;
                line-height: 1.5;
            }

            .content-grid {
                gap: 15px;
            }

            .card {
                border-radius: 14px;
            }

            .card-header {
                min-height: 56px;

                padding: 0 17px;
            }

            .card-title {
                font-size: 15px;
            }

            .card-body {
                padding: 17px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-control {
                height: 43px;
                font-size: 12px;
            }

            textarea.form-control {
                height: 110px;
            }

            .submit-button {
                height: 44px;
            }

            .empty-state {
                min-height: 250px;
                padding: 25px 18px;
            }

            .submission-top {
                gap: 10px;
            }

            .submission-course {
                font-size: 12px;
            }

        }


        /* =====================================================
           MOBILE KECIL
        ====================================================== */

        @media (max-width: 400px) {

            .main {
                padding-left: 12px;
                padding-right: 12px;
            }

            .mobile-header {
                margin-left: -12px;
                margin-right: -12px;

                padding-left: 12px;
                padding-right: 12px;
            }

            .page-title h1 {
                font-size: 23px;
            }

            .page-title p {
                font-size: 11px;
            }

            .card-header {
                padding-left: 14px;
                padding-right: 14px;
            }

            .card-body {
                padding: 14px;
            }

            .submission-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .status {
                margin-top: 2px;
            }

            .sidebar {
                width: min(290px, 88vw);
            }

        }

    </style>

</head>


<body>


<div class="dashboard-layout">


    {{-- =====================================================
         OVERLAY MOBILE
    ====================================================== --}}

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
    ></div>


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside
        class="sidebar"
        id="sidebar"
    >

        {{-- LOGO --}}

        <div class="sidebar-logo">

            <div class="logo-icon">
                QR
            </div>

            <div>

                <div class="logo-title">
                    ABSENSI QR
                </div>

                <div class="logo-subtitle">
                    Smart Attendance System
                </div>

            </div>

        </div>


        {{-- MENU --}}

        <div class="sidebar-menu">


            <div class="menu-title">
                Menu Utama
            </div>


            <nav class="nav-menu">


                <a
                    href="{{ url('/mahasiswa/dashboard') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ♢
                    </span>

                    <span>
                        Ringkasan
                    </span>

                </a>


                <a
                    href="{{ url('/mahasiswa/scan') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ▣
                    </span>

                    <span>
                        Scan Absensi
                    </span>

                </a>


                <a
                    href="{{ url('/mahasiswa/kartu-qr') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ▦
                    </span>

                    <span>
                        Kartu QR
                    </span>

                </a>


                <a
                    href="{{ url('/mahasiswa/riwayat') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ◷
                    </span>

                    <span>
                        Riwayat
                    </span>

                </a>


            </nav>


            <div class="menu-title">
                Lainnya
            </div>


            <nav class="nav-menu">


                {{-- AKTIF --}}

                <a
                    href="{{ url('/mahasiswa/izin-sakit') }}"
                    class="nav-item active"
                >

                    <span class="nav-icon">
                        ◇
                    </span>

                    <span>
                        Izin / Sakit
                    </span>

                </a>


                <a
                    href="{{ route('mahasiswa.profil') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ◎
                    </span>

                    <span>
                        Profil
                    </span>

                </a>


            </nav>


        </div>


        {{-- =====================================================
             USER + LOGOUT
        ====================================================== --}}

        <div class="sidebar-bottom">


            <div class="user-card">

                <div class="user-avatar">

                    {{ strtoupper(substr(Auth::user()->name ?? 'N', 0, 1)) }}

                </div>


                <div class="user-info">

                    <div class="user-name">

                        {{ Auth::user()->name ?? 'Mahasiswa' }}

                    </div>


                    <div class="user-npm">

                        NPM:

                        {{ Auth::user()->mahasiswa->npm ?? '-' }}

                    </div>

                </div>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST"
                class="logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span class="nav-icon">
                        ↪
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>


        </div>


    </aside>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="main">


        {{-- =====================================================
             MOBILE HEADER
        ====================================================== --}}

        <div class="mobile-header">


            <div class="mobile-logo">
                ABSENSI QR
            </div>


            <button
                type="button"
                class="hamburger-button"
                id="hamburgerButton"
                aria-label="Buka menu"
                aria-expanded="false"
            >

                <span id="hamburgerIcon">
                    ☰
                </span>

            </button>


        </div>


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="page-header">

            <div class="page-title">

                <h1>
                    Izin / Sakit
                </h1>

                <p>
                    Ajukan izin, sakit, atau kendala absensi.
                </p>

            </div>

        </div>


        {{-- =====================================================
             SUCCESS
        ====================================================== --}}

        @if(session('success'))

            <div class="alert-success">

                <span>
                    ✓
                </span>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- =====================================================
             ERROR
        ====================================================== --}}

        @if($errors->any())

            <div class="error-box">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- =====================================================
             CONTENT
        ====================================================== --}}

        <div class="content-grid">


            {{-- =================================================
                 FORM PENGAJUAN
            ================================================== --}}

            <div class="card">


                <div class="card-header">

                    <h2 class="card-title">
                        Buat Pengajuan
                    </h2>

                </div>


                <div class="card-body">


                    <form
                        action="{{ route('mahasiswa.izin-sakit.store') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- JADWAL --}}

                        <div class="form-group">

                            <label
                                for="jadwal_id"
                                class="form-label"
                            >

                                Mata Kuliah / Jadwal

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <select
                                name="jadwal_id"
                                id="jadwal_id"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Pilih mata kuliah
                                </option>


                                @foreach($jadwals as $jadwal)

                                    <option
                                        value="{{ $jadwal->id }}"
                                        {{ old('jadwal_id') == $jadwal->id ? 'selected' : '' }}
                                    >

                                        {{ $jadwal->mataKuliah->nama ?? 'Mata Kuliah' }}

                                        -

                                        {{ $jadwal->hari }}

                                        {{ substr($jadwal->jam_mulai, 0, 5) }}

                                        -

                                        {{ substr($jadwal->jam_selesai, 0, 5) }}

                                    </option>

                                @endforeach


                            </select>

                        </div>


                        {{-- TANGGAL --}}

                        <div class="form-group">

                            <label
                                for="tanggal"
                                class="form-label"
                            >

                                Tanggal

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="form-control"
                                value="{{ old('tanggal') }}"
                                required
                            >

                        </div>


                        {{-- JENIS --}}

                        <div class="form-group">

                            <label
                                for="jenis"
                                class="form-label"
                            >

                                Jenis Pengajuan

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <select
                                name="jenis"
                                id="jenis"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Pilih jenis pengajuan
                                </option>


                                <option
                                    value="tidak_hadir"
                                    {{ old('jenis') == 'tidak_hadir' ? 'selected' : '' }}
                                >
                                    Tidak Hadir
                                </option>


                                <option
                                    value="sakit"
                                    {{ old('jenis') == 'sakit' ? 'selected' : '' }}
                                >
                                    Sakit
                                </option>


                                <option
                                    value="terlambat"
                                    {{ old('jenis') == 'terlambat' ? 'selected' : '' }}
                                >
                                    Terlambat
                                </option>


                                <option
                                    value="qr_bermasalah"
                                    {{ old('jenis') == 'qr_bermasalah' ? 'selected' : '' }}
                                >
                                    QR Bermasalah
                                </option>


                                <option
                                    value="kendala_teknis"
                                    {{ old('jenis') == 'kendala_teknis' ? 'selected' : '' }}
                                >
                                    Kendala Teknis
                                </option>


                                <option
                                    value="lainnya"
                                    {{ old('jenis') == 'lainnya' ? 'selected' : '' }}
                                >
                                    Lainnya
                                </option>


                            </select>

                        </div>


                        {{-- ALASAN --}}

                        <div class="form-group">

                            <label
                                for="alasan"
                                class="form-label"
                            >

                                Alasan

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <textarea
                                name="alasan"
                                id="alasan"
                                class="form-control"
                                placeholder="Jelaskan alasan pengajuan kamu..."
                                required
                            >{{ old('alasan') }}</textarea>

                        </div>


                        {{-- SUBMIT --}}

                        <button
                            type="submit"
                            class="submit-button"
                        >

                            Kirim Pengajuan

                        </button>


                    </form>


                </div>

            </div>


            {{-- =================================================
                 RIWAYAT PENGAJUAN
            ================================================== --}}

            <div class="card">


                <div class="card-header">

                    <h2 class="card-title">
                        Pengajuan Saya
                    </h2>

                </div>


                @if($pengajuan->count() === 0)


                    <div class="empty-state">

                        <div class="empty-icon">
                            📄
                        </div>

                        <h3>
                            Belum Ada Pengajuan
                        </h3>

                        <p>
                            Pengajuan izin atau sakit yang kamu kirim
                            akan muncul di sini.
                        </p>

                    </div>


                @else


                    <div class="card-body">

                        <div class="submission-list">


                            @foreach($pengajuan as $item)


                                <div class="submission-item">


                                    <div class="submission-top">


                                        <div>

                                            <div class="submission-course">

                                                {{ $item->jadwal->mataKuliah->nama ?? 'Mata Kuliah' }}

                                            </div>


                                            <div class="submission-date">

                                                {{ $item->tanggal->format('d M Y') }}

                                            </div>

                                        </div>


                                        {{-- STATUS --}}

                                        <span
                                            class="status status-{{ $item->status }}"
                                        >

                                            @if($item->status === 'menunggu')

                                                Menunggu

                                            @elseif($item->status === 'disetujui')

                                                Disetujui

                                            @else

                                                Ditolak

                                            @endif

                                        </span>


                                    </div>


                                    <div class="submission-info">


                                        {{-- JENIS --}}

                                        @php

                                            $jenisClass = match($item->jenis) {

                                                'sakit' => 'jenis-sakit',

                                                'terlambat' => 'jenis-terlambat',

                                                'tidak_hadir' => 'jenis-izin',

                                                default => 'jenis-default',

                                            };


                                            $jenisLabel = match($item->jenis) {

                                                'tidak_hadir' => 'Tidak Hadir',

                                                'sakit' => 'Sakit',

                                                'terlambat' => 'Terlambat',

                                                'qr_bermasalah' => 'QR Bermasalah',

                                                'kendala_teknis' => 'Kendala Teknis',

                                                'lainnya' => 'Lainnya',

                                                default => ucfirst($item->jenis),

                                            };

                                        @endphp


                                        <span
                                            class="jenis {{ $jenisClass }}"
                                        >

                                            {{ $jenisLabel }}

                                        </span>


                                        {{-- DOSEN --}}

                                        <span class="info-badge">

                                            Dosen:

                                            {{ $item->jadwal->dosen->nama ?? '-' }}

                                        </span>


                                    </div>


                                    {{-- ALASAN --}}

                                    <div class="submission-reason">

                                        <strong>
                                            Alasan:
                                        </strong>

                                        {{ $item->alasan }}

                                    </div>


                                    {{-- CATATAN ADMIN --}}

                                    @if($item->catatan_admin)

                                        <div
                                            class="submission-reason"
                                            style="margin-top: 8px;"
                                        >

                                            <strong>
                                                Catatan:
                                            </strong>

                                            {{ $item->catatan_admin }}

                                        </div>

                                    @endif


                                </div>


                            @endforeach


                        </div>

                    </div>


                @endif


            </div>


        </div>


    </main>


</div>


{{-- =====================================================
     JAVASCRIPT SIDEBAR MOBILE
====================================================== --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const sidebar = document.getElementById('sidebar');

        const hamburgerButton =
            document.getElementById('hamburgerButton');

        const hamburgerIcon =
            document.getElementById('hamburgerIcon');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');

        const navItems =
            document.querySelectorAll('.sidebar .nav-item');


        function openSidebar() {

            sidebar.classList.add('open');

            sidebarOverlay.classList.add('show');

            document.body.classList.add('sidebar-open');

            hamburgerButton.setAttribute(
                'aria-expanded',
                'true'
            );

            hamburgerButton.setAttribute(
                'aria-label',
                'Tutup menu'
            );

            hamburgerIcon.textContent = '✕';

        }


        function closeSidebar() {

            sidebar.classList.remove('open');

            sidebarOverlay.classList.remove('show');

            document.body.classList.remove('sidebar-open');

            hamburgerButton.setAttribute(
                'aria-expanded',
                'false'
            );

            hamburgerButton.setAttribute(
                'aria-label',
                'Buka menu'
            );

            hamburgerIcon.textContent = '☰';

        }


        function toggleSidebar() {

            if (sidebar.classList.contains('open')) {

                closeSidebar();

            } else {

                openSidebar();

            }

        }


        hamburgerButton.addEventListener(
            'click',
            toggleSidebar
        );


        sidebarOverlay.addEventListener(
            'click',
            closeSidebar
        );


        /*
         * Ketika menu diklik di HP,
         * sidebar otomatis tertutup.
         */

        navItems.forEach(function (item) {

            item.addEventListener('click', function () {

                if (window.innerWidth <= 900) {

                    closeSidebar();

                }

            });

        });


        /*
         * Tombol ESC untuk menutup sidebar.
         */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    window.innerWidth <= 900
                ) {

                    closeSidebar();

                }

            }
        );


        /*
         * Kalau layar dibesarkan kembali ke desktop,
         * sidebar dikembalikan ke kondisi normal.
         */

        window.addEventListener(
            'resize',
            function () {

                if (window.innerWidth > 900) {

                    closeSidebar();

                }

            }
        );

    });

</script>


</body>

</html>