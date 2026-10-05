<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Admin - Absensi QR</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #070b16;
            --sidebar: #0a0f1d;
            --card: rgba(16, 23, 40, 0.82);
            --card-soft: rgba(21, 29, 49, 0.72);

            --border: rgba(255,255,255,0.07);
            --text: #f4f6fb;
            --muted: #8d96aa;

            --purple: #7c5cff;
            --blue: #4d8dff;

            --success: #39d98a;
            --danger: #ff6174;
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(
                    circle at 80% 10%,
                    rgba(124, 92, 255, 0.10),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 10% 90%,
                    rgba(77, 141, 255, 0.07),
                    transparent 30%
                ),
                var(--bg);

            color: var(--text);
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 255px;
            height: 100vh;

            background:
                linear-gradient(
                    180deg,
                    rgba(11, 16, 29, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right: 1px solid var(--border);
            padding: 25px 15px;

            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 10px;
            margin-bottom: 35px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            box-shadow:
                0 10px 30px rgba(124, 92, 255, 0.25);

            color: white;
            font-size: 18px;
        }

        .brand-text h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 17px;
            font-weight: 700;
        }

        .brand-text span {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 2px;
        }

        .menu-title {
            color: #5f687c;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.3px;
            text-transform: uppercase;

            padding: 0 12px;
            margin: 22px 0 9px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            text-decoration: none;
            color: #929caf;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 11px 13px;
            border-radius: 10px;

            font-size: 13px;
            font-weight: 500;

            transition: .25s ease;
        }

        .menu a i {
            width: 18px;
            text-align: center;
            font-size: 14px;
        }

        .menu a:hover {
            color: white;
            background: rgba(255,255,255,0.04);
        }

        .menu a.active {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    rgba(124, 92, 255, 0.22),
                    rgba(77, 141, 255, 0.14)
                );

            border: 1px solid rgba(124, 92, 255, 0.15);

            box-shadow:
                inset 0 0 20px rgba(124, 92, 255, 0.04);
        }

        .menu a.active i {
            color: #9d8aff;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 255px;
            min-height: 100vh;
            padding: 25px 30px 40px;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 28px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .mobile-menu {
            display: none;

            width: 40px;
            height: 40px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: rgba(255,255,255,0.03);
            color: white;

            cursor: pointer;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 12px;
        }

        .breadcrumb span {
            color: white;
        }

        .admin-mini {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .admin-mini-info {
            text-align: right;
        }

        .admin-mini-info strong {
            display: block;
            font-size: 13px;
            font-weight: 600;
        }

        .admin-mini-info span {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 2px;
        }

        .avatar-mini {
            width: 39px;
            height: 39px;

            border-radius: 11px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            color: white;
            font-weight: 700;
            font-size: 14px;

            box-shadow:
                0 8px 20px rgba(124, 92, 255, 0.2);
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            position: relative;
            overflow: hidden;

            padding: 28px 30px;
            margin-bottom: 25px;

            border-radius: 20px;

            background:
                linear-gradient(
                    135deg,
                    rgba(124, 92, 255, 0.18),
                    rgba(77, 141, 255, 0.10),
                    rgba(16, 23, 40, 0.88)
                );

            border: 1px solid rgba(124, 92, 255, 0.15);
        }

        .page-header::after {
            content: "";

            position: absolute;
            width: 220px;
            height: 220px;

            right: -70px;
            top: -100px;

            background:
                radial-gradient(
                    circle,
                    rgba(124,92,255,0.25),
                    transparent 70%
                );
        }

        .page-header-content {
            position: relative;
            z-index: 2;
        }

        .page-header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 27px;
            font-weight: 700;

            margin-bottom: 7px;
        }

        .page-header p {
            color: #a2aabd;
            font-size: 13px;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 13px 16px;
            border-radius: 12px;

            margin-bottom: 20px;

            display: flex;
            align-items: center;
            gap: 10px;

            font-size: 13px;
        }

        .alert-success {
            background: rgba(57, 217, 138, 0.08);
            border: 1px solid rgba(57, 217, 138, 0.15);
            color: #72e8ab;
        }

        .alert-danger {
            background: rgba(255, 97, 116, 0.08);
            border: 1px solid rgba(255, 97, 116, 0.15);
            color: #ff8a99;
        }

        /* =========================
           PROFILE LAYOUT
        ========================= */

        .profile-layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 20px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);

            border-radius: 18px;

            box-shadow:
                0 20px 50px rgba(0,0,0,0.18);

            backdrop-filter: blur(15px);
        }

        /* =========================
           PROFILE CARD
        ========================= */

        .profile-card {
            padding: 28px 22px;
            text-align: center;
        }

        .profile-avatar {
            width: 105px;
            height: 105px;

            margin: 5px auto 18px;

            border-radius: 28px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            color: white;

            font-family: 'Outfit', sans-serif;
            font-size: 36px;
            font-weight: 700;

            box-shadow:
                0 15px 40px rgba(124, 92, 255, 0.25);
        }

        .profile-card h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .profile-card .email {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 16px;
            word-break: break-word;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 7px 12px;

            border-radius: 30px;

            background: rgba(124,92,255,0.10);
            border: 1px solid rgba(124,92,255,0.16);

            color: #ad9fff;

            font-size: 11px;
            font-weight: 600;
        }

        .profile-divider {
            height: 1px;
            background: var(--border);
            margin: 25px 0;
        }

        .profile-info {
            text-align: left;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 11px 0;

            border-bottom: 1px solid rgba(255,255,255,0.04);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 34px;
            height: 34px;

            flex-shrink: 0;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255,255,255,0.04);
            color: #9b8bff;

            font-size: 12px;
        }

        .info-text small {
            display: block;
            color: #697388;
            font-size: 9px;
            margin-bottom: 3px;
        }

        .info-text span {
            color: #d7dbe5;
            font-size: 11px;
        }

        /* =========================
           RIGHT SIDE
        ========================= */

        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-card {
            padding: 25px;
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 22px;
        }

        .heading-icon {
            width: 39px;
            height: 39px;

            border-radius: 11px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    rgba(124,92,255,0.18),
                    rgba(77,141,255,0.12)
                );

            color: #a596ff;
        }

        .card-heading h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 16px;
            font-weight: 600;
        }

        .card-heading p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            color: #aeb6c7;
            font-size: 11px;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: #626d82;
            font-size: 12px;
        }

        .input-wrapper input {
            width: 100%;

            height: 43px;

            padding: 0 14px 0 39px;

            border-radius: 10px;

            border: 1px solid rgba(255,255,255,0.07);

            background: rgba(255,255,255,0.035);

            color: white;

            outline: none;

            font-family: 'Inter', sans-serif;
            font-size: 12px;

            transition: .2s ease;
        }

        .input-wrapper input:focus {
            border-color: rgba(124,92,255,0.5);

            background: rgba(124,92,255,0.035);

            box-shadow:
                0 0 0 3px rgba(124,92,255,0.07);
        }

        .input-wrapper input::placeholder {
            color: #505b70;
        }

        .password-toggle {
            position: absolute;
            right: 13px;
            top: 50%;

            transform: translateY(-50%);

            border: none;
            background: transparent;

            color: #626d82;

            cursor: pointer;
        }

        .password-toggle:hover {
            color: white;
        }

        .password-note {
            color: #626d82;
            font-size: 10px;
            margin-top: -1px;
        }

        /* =========================
           BUTTON
        ========================= */

        .form-actions {
            display: flex;
            justify-content: flex-end;

            margin-top: 21px;
        }

        .btn {
            border: none;

            min-height: 40px;

            padding: 0 18px;

            border-radius: 10px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 600;

            cursor: pointer;

            transition: .25s ease;
        }

        .btn-primary {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            box-shadow:
                0 8px 25px rgba(124,92,255,0.20);
        }

        .btn-primary:hover {
            transform: translateY(-1px);

            box-shadow:
                0 12px 30px rgba(124,92,255,0.30);
        }

        /* =========================
           SECURITY INFO
        ========================= */

        .security-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .security-item {
            padding: 21px;
        }

        .security-item .security-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: rgba(57,217,138,0.08);
            color: var(--success);

            margin-bottom: 14px;
        }

        .security-item h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .security-item p {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        /* =========================
           ERROR
        ========================= */

        .error-message {
            color: #ff7f91;
            font-size: 10px;
            margin-top: 2px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1050px) {

            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-card {
                display: grid;

                grid-template-columns: 100px 1fr;
                column-gap: 20px;

                text-align: left;
                align-items: center;
            }

            .profile-avatar {
                grid-row: span 3;

                margin: 0;
            }

            .profile-card .profile-divider,
            .profile-card .profile-info {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 800px) {

            .sidebar {
                transform: translateX(-100%);
                transition: .3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .mobile-menu {
                display: block;
            }

            .form-grid,
            .security-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }

        @media (max-width: 600px) {

            .main {
                padding: 15px;
            }

            .admin-mini-info {
                display: none;
            }

            .page-header {
                padding: 22px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .profile-card {
                display: block;
                text-align: center;
            }

            .profile-avatar {
                margin: 5px auto 18px;
            }

            .profile-card .profile-info {
                text-align: left;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <div class="brand-icon">
                <i class="fa-solid fa-qrcode"></i>
            </div>

            <div class="brand-text">
                <h2>Absensi QR</h2>
                <span>Admin Panel</span>
            </div>

        </div>


        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.laporan') }}">
                <i class="fa-solid fa-chart-column"></i>
                <span>Laporan</span>
            </a>

        </nav>


        <div class="menu-title">
            Sistem
        </div>

        <nav class="menu">

            <a href="{{ route('admin.pengaturan') }}">
                <i class="fa-solid fa-gear"></i>
                <span>Pengaturan</span>
            </a>

            <a href="{{ route('admin.profil') }}" class="active">
                <i class="fa-solid fa-user"></i>
                <span>Profil Admin</span>
            </a>

        </nav>


        <div class="menu-title">
            Akun
        </div>

        <nav class="menu">

            <a
                href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </a>

        </nav>

        <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            style="display:none;"
        >
            @csrf
        </form>

    </aside>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <div class="topbar-left">

                <button
                    class="mobile-menu"
                    onclick="toggleSidebar()"
                >
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="breadcrumb">
                    Admin
                    <span>/ Profil Admin</span>
                </div>

            </div>


            <div class="admin-mini">

                <div class="admin-mini-info">
                    <strong>
                        {{ $user->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>
                </div>

                <div class="avatar-mini">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

            </div>

        </div>


        <!-- PAGE HEADER -->

        <section class="page-header">

            <div class="page-header-content">

                <h1>
                    Profil Admin
                </h1>

                <p>
                    Kelola informasi akun dan keamanan profil administrator.
                </p>

            </div>

        </section>


        <!-- ALERT SUCCESS -->

        @if(session('success'))

            <div class="alert alert-success">

                <i class="fa-solid fa-circle-check"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        <!-- ALERT ERROR -->

        @if(session('error'))

            <div class="alert alert-danger">

                <i class="fa-solid fa-circle-exclamation"></i>

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        <!-- VALIDATION ERROR -->

        @if($errors->any())

            <div class="alert alert-danger">

                <i class="fa-solid fa-triangle-exclamation"></i>

                <span>
                    Terdapat data yang belum sesuai. Silakan periksa kembali form.
                </span>

            </div>

        @endif


        <!-- PROFILE LAYOUT -->

        <div class="profile-layout">


            <!-- =========================
                 PROFILE CARD
            ========================== -->

            <div class="card profile-card">

                <div class="profile-avatar">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                <h2>
                    {{ $user->name }}
                </h2>

                <div class="email">
                    {{ $user->email }}
                </div>


                <div class="role-badge">

                    <i class="fa-solid fa-shield-halved"></i>

                    Administrator

                </div>


                <div class="profile-divider"></div>


                <div class="profile-info">

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div class="info-text">

                            <small>
                                NAMA LENGKAP
                            </small>

                            <span>
                                {{ $user->name }}
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div class="info-text">

                            <small>
                                EMAIL
                            </small>

                            <span>
                                {{ $user->email }}
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>

                        <div class="info-text">

                            <small>
                                ROLE AKUN
                            </small>

                            <span>
                                {{ ucfirst($user->role ?? 'admin') }}
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-solid fa-calendar"></i>
                        </div>

                        <div class="info-text">

                            <small>
                                TERDAFTAR SEJAK
                            </small>

                            <span>
                                {{ $user->created_at ? $user->created_at->format('d F Y') : '-' }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================
                 RIGHT COLUMN
            ========================== -->

            <div class="right-column">


                <!-- =========================
                     EDIT PROFILE
                ========================== -->

                <div class="card form-card">

                    <div class="card-heading">

                        <div class="heading-icon">
                            <i class="fa-solid fa-user-pen"></i>
                        </div>

                        <div>

                            <h3>
                                Informasi Profil
                            </h3>

                            <p>
                                Perbarui nama dan alamat email akun admin.
                            </p>

                        </div>

                    </div>


                    <form
                        action="{{ route('admin.profil.update') }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        <div class="form-grid">


                            <!-- NAMA -->

                            <div class="form-group">

                                <label>
                                    Nama Lengkap
                                </label>

                                <div class="input-wrapper">

                                    <i class="fa-solid fa-user"></i>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                    >

                                </div>

                                @error('name')

                                    <span class="error-message">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- EMAIL -->

                            <div class="form-group">

                                <label>
                                    Email
                                </label>

                                <div class="input-wrapper">

                                    <i class="fa-solid fa-envelope"></i>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        placeholder="Masukkan email"
                                        required
                                    >

                                </div>

                                @error('email')

                                    <span class="error-message">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>

                        </div>


                        <div class="form-actions">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="fa-solid fa-floppy-disk"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>


                <!-- =========================
                     CHANGE PASSWORD
                ========================== -->

                <div class="card form-card">

                    <div class="card-heading">

                        <div class="heading-icon">

                            <i class="fa-solid fa-lock"></i>

                        </div>

                        <div>

                            <h3>
                                Keamanan Akun
                            </h3>

                            <p>
                                Ubah password untuk menjaga keamanan akun admin.
                            </p>

                        </div>

                    </div>


                    <form
                        action="{{ route('admin.profil.password.update') }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        <div class="form-grid">


                            <!-- PASSWORD LAMA -->

                            <div class="form-group full">

                                <label>
                                    Password Saat Ini
                                </label>

                                <div class="input-wrapper">

                                    <i class="fa-solid fa-lock"></i>

                                    <input
                                        type="password"
                                        name="current_password"
                                        id="current_password"
                                        placeholder="Masukkan password saat ini"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword('current_password', this)"
                                    >

                                        <i class="fa-solid fa-eye"></i>

                                    </button>

                                </div>

                                @error('current_password')

                                    <span class="error-message">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- PASSWORD BARU -->

                            <div class="form-group">

                                <label>
                                    Password Baru
                                </label>

                                <div class="input-wrapper">

                                    <i class="fa-solid fa-key"></i>

                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="Minimal 8 karakter"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword('password', this)"
                                    >

                                        <i class="fa-solid fa-eye"></i>

                                    </button>

                                </div>

                                <span class="password-note">
                                    Gunakan minimal 8 karakter.
                                </span>

                                @error('password')

                                    <span class="error-message">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- KONFIRMASI -->

                            <div class="form-group">

                                <label>
                                    Konfirmasi Password Baru
                                </label>

                                <div class="input-wrapper">

                                    <i class="fa-solid fa-key"></i>

                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        placeholder="Ulangi password baru"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword('password_confirmation', this)"
                                    >

                                        <i class="fa-solid fa-eye"></i>

                                    </button>

                                </div>

                            </div>

                        </div>


                        <div class="form-actions">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="fa-solid fa-shield-halved"></i>

                                Perbarui Password

                            </button>

                        </div>

                    </form>

                </div>


                <!-- =========================
                     SECURITY INFO
                ========================== -->

                <div class="security-grid">

                    <div class="card security-item">

                        <div class="security-icon">

                            <i class="fa-solid fa-circle-check"></i>

                        </div>

                        <h4>
                            Akun Administrator
                        </h4>

                        <p>
                            Akun ini memiliki hak akses administrator
                            untuk mengelola sistem Absensi QR.
                        </p>

                    </div>


                    <div class="card security-item">

                        <div class="security-icon">

                            <i class="fa-solid fa-shield-halved"></i>

                        </div>

                        <h4>
                            Keamanan Akun
                        </h4>

                        <p>
                            Gunakan password yang kuat dan jangan
                            membagikan informasi login kepada orang lain.
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </main>


    <script>

        function toggleSidebar() {

            const sidebar =
                document.getElementById('sidebar');

            sidebar.classList.toggle('show');

        }


        function togglePassword(id, button) {

            const input =
                document.getElementById(id);

            const icon =
                button.querySelector('i');

            if (input.type === 'password') {

                input.type = 'text';

                icon.classList.remove('fa-eye');

                icon.classList.add('fa-eye-slash');

            } else {

                input.type = 'password';

                icon.classList.remove('fa-eye-slash');

                icon.classList.add('fa-eye');

            }

        }

    </script>

</body>
</html>