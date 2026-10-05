<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Profil | Absensi QR</title>

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
            color: #ffffff;
        }

        a {
            text-decoration: none;
            color: inherit;
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

            z-index: 1000;

            transition: transform 0.25s ease;
        }


        .sidebar-logo {
            height: 100px;

            display: flex;
            align-items: center;

            gap: 13px;

            padding: 0 22px;

            border-bottom: 1px solid #20283a;
        }


        .logo-icon {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 14px;

            background: linear-gradient(
                135deg,
                #7657ff,
                #5c8dff
            );

            font-size: 19px;
            font-weight: 800;
        }


        .logo-title {
            font-size: 17px;
            font-weight: 700;
        }


        .logo-subtitle {
            margin-top: 4px;

            color: #8b9aba;

            font-size: 11px;
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
            scrollbar-color: #656c7a transparent;

            padding: 24px 18px 15px;
        }


        .menu-title {
            padding-left: 14px;

            margin-bottom: 11px;

            color: #66748f;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 1.4px;

            text-transform: uppercase;
        }


        .nav-menu {
            display: flex;
            flex-direction: column;

            gap: 4px;

            margin-bottom: 27px;
        }


        .nav-item {
            min-height: 48px;

            display: flex;
            align-items: center;

            gap: 14px;

            padding: 0 15px;

            border-radius: 12px;

            color: #9ba9c1;

            font-size: 14px;
            font-weight: 600;

            transition: 0.2s;
        }


        .nav-item:hover {
            background: #151c30;
            color: white;
        }


        .nav-item.active {
            background: #1b2441;
            color: white;

            box-shadow:
                inset 3px 0 0 #7657ff;
        }


        .nav-icon {
            width: 22px;
            min-width: 22px;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 17px;

            color: #9ba9c1;
        }


        .nav-item.active .nav-icon {
            color: white;
        }


        /* =====================================================
           SIDEBAR BOTTOM
        ====================================================== */

        .sidebar-bottom {
            flex-shrink: 0;

            padding: 17px;

            border-top: 1px solid #20283a;
        }


        .user-card {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 11px;

            margin-bottom: 10px;

            background: #151b2b;

            border: 1px solid #242d40;

            border-radius: 13px;
        }


        .user-avatar {
            width: 39px;
            height: 39px;

            min-width: 39px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #7258ff,
                #608dff
            );

            font-size: 15px;
            font-weight: 700;
        }


        .user-info {
            min-width: 0;
        }


        .user-name {
            max-width: 150px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;

            font-size: 12px;
            font-weight: 700;
        }


        .user-npm {
            margin-top: 4px;

            color: #8290aa;

            font-size: 10px;
        }


        .logout-form {
            margin: 0;
        }


        .logout-button {
            width: 100%;
            height: 43px;

            display: flex;
            align-items: center;

            gap: 14px;

            padding: 0 15px;

            border: none;

            background: transparent;

            border-radius: 11px;

            color: #9ba9c1;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;

            text-align: left;
        }


        .logout-button:hover {
            background: #171522;

            color: #ff899b;
        }


        /* =====================================================
           OVERLAY
        ====================================================== */

        .sidebar-overlay {
            display: none;

            position: fixed;

            inset: 0;

            background: rgba(0, 0, 0, 0.65);

            z-index: 999;
        }


        .sidebar-overlay.show {
            display: block;
        }


        /* =====================================================
           MAIN
        ====================================================== */

        .main {
            margin-left: 240px;

            width: calc(100% - 240px);

            min-height: 100vh;

            padding: 30px 34px 50px;
        }


        /* =====================================================
           MOBILE HEADER
        ====================================================== */

        .mobile-header {
            display: none;
        }


        .hamburger-button {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #29344a;

            border-radius: 11px;

            background: #151c2d;

            color: white;

            font-size: 22px;

            cursor: pointer;
        }


        .mobile-logo {
            font-size: 16px;
            font-weight: 700;
        }


        /* =====================================================
           PAGE HEADER
        ====================================================== */

        .page-header {
            margin-bottom: 28px;
        }


        .page-title h1 {
            font-size: 32px;

            line-height: 1.2;

            font-weight: 700;

            letter-spacing: -0.8px;
        }


        .page-title p {
            margin-top: 8px;

            color: #8da0c0;

            font-size: 16px;
        }


        /* =====================================================
           ALERT
        ====================================================== */

        .alert-success {
            margin-bottom: 22px;

            padding: 14px 17px;

            border: 1px solid #24583c;

            border-radius: 10px;

            background: #10291d;

            color: #62d995;

            font-size: 13px;
        }


        /* =====================================================
           PROFILE TOP
        ====================================================== */

        .profile-top {
            display: grid;

            grid-template-columns: 300px 1fr;

            gap: 20px;

            margin-bottom: 20px;
        }


        .profile-card {
            background: #111827;

            border: 1px solid #202a3d;

            border-radius: 17px;

            padding: 25px;
        }


        /* =====================================================
           PROFILE IDENTITY
        ====================================================== */

        .identity-card {
            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-align: center;

            min-height: 300px;
        }


        .profile-avatar {
            width: 105px;
            height: 105px;

            margin-bottom: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #7258ff,
                #608dff
            );

            color: white;

            font-size: 38px;
            font-weight: 700;
        }


        .profile-name {
            font-size: 20px;

            font-weight: 700;

            word-break: break-word;
        }


        .profile-npm {
            margin-top: 7px;

            color: #8494b1;

            font-size: 13px;
        }


        .profile-role {
            display: inline-block;

            margin-top: 14px;

            padding: 6px 12px;

            border-radius: 20px;

            background: #181c46;

            color: #9c91ff;

            font-size: 11px;

            font-weight: 700;
        }


        /* =====================================================
           BIODATA
        ====================================================== */

        .biodata-title {
            margin-bottom: 20px;

            font-size: 18px;

            font-weight: 700;
        }


        .biodata-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 14px;
        }


        .biodata-item {
            padding: 15px;

            background: #0c1120;

            border: 1px solid #202a3d;

            border-radius: 12px;
        }


        .biodata-label {
            margin-bottom: 7px;

            color: #71809c;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.8px;
        }


        .biodata-value {
            color: #ffffff;

            font-size: 14px;

            font-weight: 600;

            word-break: break-word;
        }


        .biodata-value.empty {
            color: #59667d;

            font-weight: 400;
        }


        /* =====================================================
           EDIT PROFILE
        ====================================================== */

        .edit-card {
            margin-top: 20px;
        }


        .edit-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 22px;
        }


        .edit-title {
            font-size: 18px;

            font-weight: 700;
        }


        .edit-subtitle {
            margin-top: 5px;

            color: #71809c;

            font-size: 12px;
        }


        .form-group {
            margin-bottom: 18px;
        }


        .form-label {
            display: block;

            margin-bottom: 8px;

            color: #9ba9c1;

            font-size: 13px;

            font-weight: 600;
        }


        .form-input {
            width: 100%;

            height: 45px;

            padding: 0 14px;

            border: 1px solid #29344a;

            border-radius: 10px;

            outline: none;

            background: #0c1120;

            color: white;

            font-size: 14px;

            transition: 0.2s;
        }


        .form-input:focus {
            border-color: #7657ff;

            box-shadow:
                0 0 0 3px rgba(118, 87, 255, 0.12);
        }


        .form-input:disabled {
            color: #71809c;

            background: #0a0f1b;

            cursor: not-allowed;
        }


        .form-help {
            display: block;

            margin-top: 6px;

            color: #64728b;

            font-size: 11px;
        }


        .form-row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;
        }


        /* =====================================================
           PASSWORD
        ====================================================== */

        .password-section {
            margin-top: 10px;

            padding-top: 22px;

            border-top: 1px solid #202a3d;
        }


        .password-title {
            margin-bottom: 17px;

            color: #ffffff;

            font-size: 15px;

            font-weight: 700;
        }


        /* =====================================================
           ERROR
        ====================================================== */

        .error-message {
            margin-top: 6px;

            color: #ff879c;

            font-size: 11px;
        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            margin-top: 23px;
        }


        .save-button {
            min-width: 160px;

            height: 45px;

            padding: 0 20px;

            border: none;

            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #7657ff,
                #5c8dff
            );

            color: white;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s;
        }


        .save-button:hover {
            transform: translateY(-1px);

            box-shadow:
                0 7px 20px rgba(92, 141, 255, 0.22);
        }


        /* =====================================================
           TABLET
        ====================================================== */

        @media (max-width: 1000px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;

                width: calc(100% - 220px);

                padding: 28px;
            }

            .profile-top {
                grid-template-columns: 1fr;
            }

            .identity-card {
                min-height: auto;
            }
        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 700px) {

            .sidebar {
                display: flex;

                width: 270px;

                transform: translateX(-100%);

                box-shadow:
                    10px 0 35px rgba(0, 0, 0, 0.35);
            }


            .sidebar.open {
                transform: translateX(0);
            }


            .main {
                margin-left: 0;

                width: 100%;

                padding: 20px;
            }


            .mobile-header {
                height: 58px;

                display: flex;

                align-items: center;

                justify-content: space-between;

                margin: -20px -20px 25px;

                padding: 0 20px;

                background: #0c1120;

                border-bottom: 1px solid #20283a;
            }


            .page-title h1 {
                font-size: 28px;
            }


            .page-title p {
                font-size: 14px;

                line-height: 1.5;
            }


            .profile-top {
                grid-template-columns: 1fr;

                gap: 15px;
            }


            .profile-card {
                padding: 20px;
            }


            .biodata-grid {
                grid-template-columns: 1fr;
            }


            .form-row {
                grid-template-columns: 1fr;
            }


            .form-actions {
                justify-content: stretch;
            }


            .save-button {
                width: 100%;
            }


            .edit-header {
                display: block;
            }
        }


        /* =====================================================
           SMALL MOBILE
        ====================================================== */

        @media (max-width: 400px) {

            .main {
                padding: 16px;
            }


            .mobile-header {
                margin: -16px -16px 22px;

                padding: 0 16px;
            }


            .profile-card {
                padding: 17px;
            }


            .page-title h1 {
                font-size: 25px;
            }


            .profile-avatar {
                width: 90px;
                height: 90px;

                font-size: 32px;
            }
        }

    </style>

</head>


<body>

<div class="dashboard-layout">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside
        class="sidebar"
        id="sidebar"
    >

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


        <div class="sidebar-menu">

            <div class="menu-title">
                Menu Utama
            </div>


            <nav class="nav-menu">

                <a
                    href="{{ url('/mahasiswa/dashboard') }}"
                    class="nav-item"
                    onclick="closeSidebar()"
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
                    onclick="closeSidebar()"
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
                    onclick="closeSidebar()"
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
                    onclick="closeSidebar()"
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

                <a
                    href="{{ url('/mahasiswa/izin-sakit') }}"
                    class="nav-item"
                    onclick="closeSidebar()"
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
                    class="nav-item active"
                    onclick="closeSidebar()"
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


        {{-- USER + LOGOUT --}}

        <div class="sidebar-bottom">

            <div class="user-card">

                <div class="user-avatar">

                    {{ strtoupper(substr($mahasiswa->nama ?? 'N', 0, 1)) }}

                </div>


                <div class="user-info">

                    <div class="user-name">

                        {{ $mahasiswa->nama ?? 'Mahasiswa' }}

                    </div>


                    <div class="user-npm">

                        NPM:
                        {{ $mahasiswa->npm ?? '-' }}

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
         OVERLAY
    ====================================================== --}}

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
        onclick="closeSidebar()"
    ></div>


    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="main">


        {{-- MOBILE HEADER --}}

        <div class="mobile-header">

            <div class="mobile-logo">
                ABSENSI QR
            </div>


            <button
                type="button"
                class="hamburger-button"
                onclick="toggleSidebar()"
                aria-label="Buka menu"
            >
                ☰
            </button>

        </div>


        {{-- PAGE HEADER --}}

        <div class="page-header">

            <div class="page-title">

                <h1>
                    Profil Mahasiswa
                </h1>

                <p>
                    Informasi biodata dan data akun mahasiswa.
                </p>

            </div>

        </div>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="alert-success">

                {{ session('success') }}

            </div>

        @endif


        {{-- =================================================
             IDENTITAS + BIODATA
        ================================================== --}}

        <div class="profile-top">


            {{-- =================================================
                 IDENTITY
            ================================================== --}}

            <div class="profile-card identity-card">

                <div class="profile-avatar">

                    {{ strtoupper(substr($mahasiswa->nama ?? 'N', 0, 1)) }}

                </div>


                <div class="profile-name">

                    {{ $mahasiswa->nama }}

                </div>


                <div class="profile-npm">

                    NPM: {{ $mahasiswa->npm }}

                </div>


                <div class="profile-role">

                    MAHASISWA

                </div>

            </div>


            {{-- =================================================
                 BIODATA
            ================================================== --}}

            <div class="profile-card">

                <div class="biodata-title">

                    Biodata Mahasiswa

                </div>


                <div class="biodata-grid">


                    {{-- NAMA --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            Nama Lengkap
                        </div>

                        <div class="biodata-value">

                            {{ $mahasiswa->nama ?: '-' }}

                        </div>

                    </div>


                    {{-- NPM --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            NPM
                        </div>

                        <div class="biodata-value">

                            {{ $mahasiswa->npm ?: '-' }}

                        </div>

                    </div>


                    {{-- EMAIL --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            Email
                        </div>

                        <div class="biodata-value">

                            {{ $user->email ?: '-' }}

                        </div>

                    </div>


                    {{-- PROGRAM STUDI --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            Program Studi
                        </div>

                        @if($mahasiswa->program_studi)

                            <div class="biodata-value">

                                {{ $mahasiswa->program_studi }}

                            </div>

                        @else

                            <div class="biodata-value empty">

                                Belum diisi

                            </div>

                        @endif

                    </div>


                    {{-- KELAS --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            Kelas
                        </div>

                        @if($mahasiswa->kelas)

                            <div class="biodata-value">

                                {{ $mahasiswa->kelas }}

                            </div>

                        @else

                            <div class="biodata-value empty">

                                Belum diisi

                            </div>

                        @endif

                    </div>


                    {{-- NO HP --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            No. HP
                        </div>

                        @if($mahasiswa->no_hp)

                            <div class="biodata-value">

                                {{ $mahasiswa->no_hp }}

                            </div>

                        @else

                            <div class="biodata-value empty">

                                Belum diisi

                            </div>

                        @endif

                    </div>


                    {{-- ROLE --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            Role Akun
                        </div>

                        <div class="biodata-value">

                            Mahasiswa

                        </div>

                    </div>


                    {{-- EMAIL AKUN --}}

                    <div class="biodata-item">

                        <div class="biodata-label">
                            Status Akun
                        </div>

                        <div class="biodata-value">

                            Aktif

                        </div>

                    </div>


                </div>

            </div>

        </div>


        {{-- =================================================
             EDIT PROFILE
        ================================================== --}}

        <div class="profile-card edit-card">

            <div class="edit-header">

                <div>

                    <div class="edit-title">
                        Edit Profil
                    </div>

                    <div class="edit-subtitle">
                        Perbarui informasi akun dan data diri kamu.
                    </div>

                </div>

            </div>


            <form
                action="{{ route('mahasiswa.profil.update') }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                {{-- NAMA --}}

                <div class="form-group">

                    <label class="form-label">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-input"
                        value="{{ old('nama', $mahasiswa->nama) }}"
                        required
                    >

                    @error('nama')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- NPM --}}

                <div class="form-group">

                    <label class="form-label">
                        NPM
                    </label>

                    <input
                        type="text"
                        class="form-input"
                        value="{{ $mahasiswa->npm }}"
                        disabled
                    >

                    <span class="form-help">

                        NPM merupakan identitas mahasiswa dan
                        tidak dapat diubah melalui halaman ini.

                    </span>

                </div>


                {{-- EMAIL --}}

                <div class="form-group">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email', $user->email) }}"
                        required
                    >

                    @error('email')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- NO HP + KELAS --}}

                <div class="form-row">


                    <div class="form-group">

                        <label class="form-label">
                            No. HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-input"
                            value="{{ old('no_hp', $mahasiswa->no_hp) }}"
                            placeholder="Contoh: 08123456789"
                        >

                        @error('no_hp')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Kelas
                        </label>

                        <input
                            type="text"
                            name="kelas"
                            class="form-input"
                            value="{{ old('kelas', $mahasiswa->kelas) }}"
                            placeholder="Contoh: 5.2"
                        >

                        @error('kelas')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- PROGRAM STUDI --}}

                <div class="form-group">

                    <label class="form-label">
                        Program Studi
                    </label>

                    <input
                        type="text"
                        name="program_studi"
                        class="form-input"
                        value="{{ old('program_studi', $mahasiswa->program_studi) }}"
                        placeholder="Contoh: Teknik Informatika"
                    >

                    @error('program_studi')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     PASSWORD
                ================================================== --}}

                <div class="password-section">

                    <div class="password-title">

                        Keamanan Akun

                    </div>


                    <div class="form-row">


                        <div class="form-group">

                            <label class="form-label">
                                Password Baru
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-input"
                                placeholder="Kosongkan jika tidak ingin mengubah"
                            >

                            @error('password')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-input"
                                placeholder="Ulangi password baru"
                            >

                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}

                <div class="form-actions">

                    <button
                        type="submit"
                        class="save-button"
                    >

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </main>

</div>


{{-- =====================================================
     JAVASCRIPT
====================================================== --}}

<script>

    const sidebar =
        document.getElementById('sidebar');

    const sidebarOverlay =
        document.getElementById('sidebarOverlay');


    function toggleSidebar()
    {
        sidebar.classList.toggle('open');

        sidebarOverlay.classList.toggle('show');

        if (sidebar.classList.contains('open')) {

            document.body.style.overflow = 'hidden';

        } else {

            document.body.style.overflow = '';

        }
    }


    function closeSidebar()
    {
        sidebar.classList.remove('open');

        sidebarOverlay.classList.remove('show');

        document.body.style.overflow = '';
    }


    document.addEventListener(
        'keydown',
        function(event)
        {
            if (event.key === 'Escape') {

                closeSidebar();

            }
        }
    );


    window.addEventListener(
        'resize',
        function()
        {
            if (window.innerWidth > 700) {

                closeSidebar();

            }
        }
    );

</script>


</body>

</html>