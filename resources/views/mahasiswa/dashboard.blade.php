<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Mahasiswa | Absensi QR</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #080c16;
            --sidebar: #0d1220;
            --card: #111827;
            --card-light: #151d2d;
            --border: rgba(255,255,255,0.08);
            --text: #f8fafc;
            --muted: #8993a7;
            --purple: #7c5cff;
            --blue: #4d9cff;
            --green: #32d583;
            --orange: #ffb547;
            --red: #ff6b7a;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(124, 92, 255, 0.14),
                    transparent 35%
                ),
                var(--sidebar);

            border-right: 1px solid var(--border);

            display: flex;
            flex-direction: column;

            z-index: 1000;

            transition: 0.3s ease;
        }

        .sidebar-header {
            padding: 25px 22px;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 43px;
            height: 43px;
            border-radius: 13px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 900;
            font-size: 17px;

            background: linear-gradient(
                135deg,
                var(--purple),
                var(--blue)
            );

            box-shadow:
                0 10px 30px rgba(92, 91, 255, 0.3);
        }

        .brand-text h2 {
            font-size: 17px;
            letter-spacing: 0.5px;
        }

        .brand-text p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        /* =========================================
           SIDEBAR MENU
        ========================================= */

        .sidebar-menu {
            padding: 22px 14px;
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overscroll-behavior: contain;
            scrollbar-width: thin;
            scrollbar-color: #55627a transparent;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: #55627a;
            border-radius: 10px;
        }

        .menu-label {
            color: #5f687a;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.4px;
            margin: 0 12px 10px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 13px;

            width: 100%;
            padding: 12px 13px;

            margin-bottom: 5px;

            color: #9ba5b7;
            text-decoration: none;

            border-radius: 11px;

            font-size: 13px;
            font-weight: 600;

            transition: 0.2s;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.05);
            color: white;
        }

        .nav-item.active {
            color: white;

            background:
                linear-gradient(
                    90deg,
                    rgba(124, 92, 255, 0.22),
                    rgba(77, 156, 255, 0.08)
                );

            border: 1px solid rgba(124,92,255,0.18);

            box-shadow:
                inset 3px 0 0 var(--purple);
        }

        .nav-icon {
            width: 23px;
            text-align: center;
            font-size: 16px;
        }

        /* =========================================
           SIDEBAR PROFILE
        ========================================= */

        .sidebar-profile {
            flex-shrink: 0;
            padding: 17px;
            border-top: 1px solid var(--border);
        }

        .profile-box {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 10px;

            background: rgba(255,255,255,0.035);

            border: 1px solid var(--border);

            border-radius: 12px;
        }

        .profile-avatar {
            width: 36px;
            height: 36px;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #7c5cff,
                #4d9cff
            );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: 800;

            flex-shrink: 0;
        }

        .profile-info {
            min-width: 0;
        }

        .profile-info strong {
            display: block;

            font-size: 12px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .profile-info span {
            display: block;

            color: var(--muted);

            font-size: 10px;

            margin-top: 3px;
        }

        /* =========================================
           MAIN
        ========================================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
            padding: 28px 32px;
        }

        /* =========================================
           MOBILE HEADER
        ========================================= */

        .mobile-header {
            display: none;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }

        .mobile-brand {
            font-weight: 800;
            font-size: 17px;
        }

        .menu-toggle {
            width: 42px;
            height: 42px;

            border: 1px solid var(--border);

            border-radius: 10px;

            background: var(--card);

            color: white;

            cursor: pointer;

            font-size: 20px;
        }

        /* =========================================
           TOP HEADER
        ========================================= */

        .topbar {
            display: flex;

            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 27px;
            letter-spacing: -0.5px;
        }

        .page-title p {
            color: var(--muted);

            font-size: 13px;

            margin-top: 7px;
        }

        .top-profile {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 8px 12px;

            border: 1px solid var(--border);

            border-radius: 12px;

            background: rgba(255,255,255,0.025);
        }

        .top-avatar {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 800;
            font-size: 12px;

            background: linear-gradient(
                135deg,
                var(--purple),
                var(--blue)
            );
        }

        .top-profile div:last-child {
            font-size: 12px;
        }

        .top-profile small {
            display: block;

            color: var(--muted);

            margin-top: 3px;
        }

        /* =========================================
           WELCOME BANNER
        ========================================= */

        .welcome-card {
            position: relative;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 80% 20%,
                    rgba(77,156,255,0.23),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 20% 100%,
                    rgba(124,92,255,0.25),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #171d3a,
                    #11192b
                );

            border: 1px solid rgba(124,92,255,0.17);

            border-radius: 20px;

            padding: 27px 30px;

            margin-bottom: 24px;

            box-shadow:
                0 20px 50px rgba(0,0,0,0.18);
        }

        .welcome-card::after {
            content: "QR";

            position: absolute;

            right: 35px;
            top: 15px;

            font-size: 90px;

            font-weight: 900;

            color: rgba(255,255,255,0.025);

            transform: rotate(-12deg);
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-badge {
            display: inline-flex;

            align-items: center;

            padding: 6px 11px;

            border-radius: 30px;

            background: rgba(124,92,255,0.13);

            border: 1px solid rgba(124,92,255,0.25);

            color: #b9aaff;

            font-size: 11px;

            margin-bottom: 13px;
        }

        .welcome-card h2 {
            font-size: 23px;
        }

        .welcome-card p {
            color: #9ba5b7;

            font-size: 13px;

            margin-top: 8px;
        }

        /* =========================================
           STATISTICS
        ========================================= */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 17px;

            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: 16px;

            padding: 19px;

            position: relative;

            overflow: hidden;

            transition: 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);

            border-color: rgba(255,255,255,0.13);
        }

        .stat-top {
            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .stat-icon {
            width: 38px;
            height: 38px;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
        }

        .icon-green {
            background: rgba(50,213,131,0.12);
            color: var(--green);
        }

        .icon-orange {
            background: rgba(255,181,71,0.12);
            color: var(--orange);
        }

        .icon-red {
            background: rgba(255,107,122,0.12);
            color: var(--red);
        }

        .icon-blue {
            background: rgba(77,156,255,0.12);
            color: var(--blue);
        }

        .stat-label {
            color: var(--muted);

            font-size: 11px;

            margin-top: 16px;
        }

        .stat-number {
            font-size: 25px;

            font-weight: 800;

            margin-top: 5px;
        }

        .stat-info {
            color: #697386;

            font-size: 10px;

            margin-top: 5px;
        }

        /* =========================================
           CONTENT GRID
        ========================================= */

        .content-grid {
            display: grid;

            grid-template-columns: 1.5fr 1fr;

            gap: 20px;
        }

        .panel {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: 17px;

            overflow: hidden;
        }

        .panel-header {
            padding: 18px 20px;

            border-bottom: 1px solid var(--border);

            display: flex;

            align-items: center;
            justify-content: space-between;
        }

        .panel-header h3 {
            font-size: 14px;
        }

        .panel-header a {
            color: #8d7cff;

            text-decoration: none;

            font-size: 11px;

            font-weight: 700;
        }

        /* =========================================
           QUICK ACTIONS
        ========================================= */

        .quick-actions {
            padding: 16px;
        }

        .action {
            display: flex;

            align-items: center;

            gap: 13px;

            padding: 14px;

            border: 1px solid var(--border);

            border-radius: 12px;

            margin-bottom: 10px;

            text-decoration: none;

            color: white;

            transition: 0.2s;
        }

        .action:last-child {
            margin-bottom: 0;
        }

        .action:hover {
            background: rgba(255,255,255,0.035);

            transform: translateX(2px);
        }

        .action-icon {
            width: 40px;
            height: 40px;

            border-radius: 11px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    rgba(124,92,255,0.2),
                    rgba(77,156,255,0.12)
                );

            font-size: 18px;
        }

        .action-info {
            flex: 1;
        }

        .action-info strong {
            display: block;

            font-size: 12px;
        }

        .action-info span {
            display: block;

            color: var(--muted);

            font-size: 10px;

            margin-top: 4px;
        }

        .action-arrow {
            color: #647084;

            font-size: 16px;
        }

        /* =========================================
           ATTENDANCE SUMMARY
        ========================================= */

        .attendance-body {
            padding: 20px;
        }

        .progress-wrapper {
            display: flex;

            align-items: center;

            gap: 20px;
        }

        .progress-circle {
            width: 105px;
            height: 105px;

            flex-shrink: 0;

            border-radius: 50%;

            background:
                conic-gradient(
                    var(--purple) 0deg,
                    var(--purple) calc(var(--attendance) * 1deg),
                    #20293a calc(var(--attendance) * 1deg),
                    #20293a 360deg
                );

            display: flex;

            align-items: center;
            justify-content: center;

            position: relative;
        }

        .progress-circle::before {
            content: "";

            width: 79px;
            height: 79px;

            border-radius: 50%;

            background: var(--card);

            position: absolute;
        }

        .progress-circle span {
            position: relative;

            z-index: 2;

            font-size: 20px;

            font-weight: 800;
        }

        .progress-info h4 {
            font-size: 14px;
        }

        .progress-info p {
            color: var(--muted);

            font-size: 11px;

            line-height: 1.6;

            margin-top: 6px;
        }

        .legend {
            margin-top: 18px;

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 10px;
        }

        .legend-item {
            display: flex;

            align-items: center;

            gap: 7px;

            color: var(--muted);

            font-size: 10px;
        }

        .legend-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;
        }

        .dot-green {
            background: var(--green);
        }

        .dot-orange {
            background: var(--orange);
        }

        .dot-red {
            background: var(--red);
        }

        .dot-gray {
            background: #566174;
        }

        /* =========================================
           MOBILE OVERLAY
        ========================================= */

        .overlay {
            display: none;

            position: fixed;

            inset: 0;

            background: rgba(0,0,0,0.55);

            z-index: 900;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .overlay.active {
                display: block;
            }

            .main {
                margin-left: 0;

                padding: 20px;
            }

            .mobile-header {
                display: flex;
            }

            .topbar {
                display: none;
            }
        }

        @media (max-width: 550px) {

            .main {
                padding: 15px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;

                gap: 10px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-number {
                font-size: 22px;
            }

            .welcome-card {
                padding: 22px;
            }

            .welcome-card h2 {
                font-size: 20px;
            }

            .progress-wrapper {
                flex-direction: column;

                align-items: flex-start;
            }

            .legend {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- =========================================
     SIDEBAR
========================================= -->

<aside class="sidebar" id="sidebar">

    <div class="sidebar-header">

        <div class="brand">

            <div class="brand-logo">
                QR
            </div>

            <div class="brand-text">
                <h2>ABSENSI QR</h2>
                <p>Smart Attendance System</p>
            </div>

        </div>

    </div>


    <div class="sidebar-menu">

        <div class="menu-label">
            MENU UTAMA
        </div>

        <a href="{{ route('mahasiswa.dashboard') }}" class="nav-item active">
            <span class="nav-icon">⌂</span>
            <span>Ringkasan</span>
        </a>

        <a href="{{ route('mahasiswa.scan') }}" class="nav-item">
    <span class="nav-icon">▣</span>
    <span>Scan Absensi</span>
</a>

        <a href="{{ route('mahasiswa.kartu-qr') }}" class="nav-item">
    <span class="nav-icon">▦</span>
    <span>Kartu QR</span>
</a>

       <a href="{{ route('mahasiswa.riwayat') }}" class="nav-item">
            <span class="nav-icon">◷</span>
            <span>Riwayat</span>
        </a>


        <div class="menu-label" style="margin-top: 27px;">
            LAINNYA
        </div>

        <a href="{{ route('mahasiswa.izin-sakit') }}" class="nav-item">
            <span class="nav-icon">✎</span>
            <span>Izin / Sakit</span>
        </a>

         <a href="{{ route('mahasiswa.profil') }}" class="nav-item">
            <span class="nav-icon">◎</span>
            <span>Profil</span>
        </a>

    </div>


    <div class="sidebar-profile">

        <div class="profile-box">

            <div class="profile-avatar">
                {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
            </div>

            <div class="profile-info">
                <strong>{{ $mahasiswa->nama }}</strong>
                <span>NPM: {{ $mahasiswa->npm }}</span>
            </div>

        </div>

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
            @csrf

            <button
                type="submit"
                class="nav-item"
                style="
                    border: none;
                    background: transparent;
                    cursor: pointer;
                    text-align: left;
                "
            >
                <span class="nav-icon">↪</span>
                <span>Logout</span>
            </button>
        </form>

    </div>

</aside>


<div class="overlay" id="overlay"></div>


<!-- =========================================
     MAIN
========================================= -->

<main class="main">

    <!-- MOBILE HEADER -->

    <div class="mobile-header">

        <div class="mobile-brand">
            ABSENSI QR
        </div>

        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
        >
            ☰
        </button>

    </div>


    <!-- TOP BAR -->

    <div class="topbar">

        <div class="page-title">

            <h1>
                Dashboard
            </h1>

            <p>
                Kelola aktivitas dan kehadiran kamu di sini.
            </p>

        </div>


        <div class="top-profile">

            <div class="top-avatar">
                {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
            </div>

            <div>
                {{ $mahasiswa->nama }}
                <small>NPM: {{ $mahasiswa->npm }}</small>
            </div>

        </div>

    </div>


    <!-- =========================================
         WELCOME
    ========================================== -->

    <section class="welcome-card">

        <div class="welcome-content">

            <div class="welcome-badge">
                ● SISTEM ABSENSI DIGITAL
            </div>

            <h2>
                Selamat datang kembali, {{ $mahasiswa->nama }} 👋
            </h2>

            <p>
                Pantau kehadiran kamu dan lakukan absensi
                dengan cepat menggunakan QR Code.
            </p>

        </div>

    </section>


    <!-- =========================================
         STATISTICS
    ========================================== -->

    <section class="stats-grid">

        <!-- HADIR -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-green">
                    ✓
                </div>

            </div>

            <div class="stat-label">
                TOTAL HADIR
            </div>

            <div class="stat-number">
                {{ $hadir }}
            </div>

            <div class="stat-info">
                Kehadiran tercatat
            </div>

        </div>


        <!-- IZIN -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-orange">
                    ◷
                </div>

            </div>

            <div class="stat-label">
                IZIN
            </div>

            <div class="stat-number">
                {{ $izin }}
            </div>

            <div class="stat-info">
                Pengajuan izin
            </div>

        </div>


        <!-- SAKIT -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-red">
                    +
                </div>

            </div>

            <div class="stat-label">
                SAKIT
            </div>

            <div class="stat-number">
                {{ $sakit }}
            </div>

            <div class="stat-info">
                Pengajuan sakit
            </div>

        </div>


        <!-- PERSENTASE -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-blue">
                    %
                </div>

            </div>

            <div class="stat-label">
                PERSENTASE HADIR
            </div>

            <div class="stat-number">
                {{ $persentaseHadir }}%
            </div>

            <div class="stat-info">
                Tingkat kehadiran
            </div>

        </div>

    </section>


    <!-- =========================================
         CONTENT
    ========================================== -->

    <section class="content-grid">


        <!-- QUICK ACTION -->

        <div class="panel">

            <div class="panel-header">

                <h3>
                    Akses Cepat
                </h3>

            </div>


            <div class="quick-actions">

                <a href="/mahasiswa/scan" class="action">

                    <div class="action-icon">
                        📷
                    </div>

                    <div class="action-info">

                        <strong>
                            Scan Absensi
                        </strong>

                        <span>
                            Scan QR Code untuk melakukan absensi
                        </span>

                    </div>

                    <div class="action-arrow">
                        →
                    </div>

                </a>


                <a href="/mahasiswa/kartu-qr" class="action">

                    <div class="action-icon">
                        🪪
                    </div>

                    <div class="action-info">

                        <strong>
                            Kartu QR Saya
                        </strong>

                        <span>
                            Tampilkan QR Code identitas kamu
                        </span>

                    </div>

                    <div class="action-arrow">
                        →
                    </div>

                </a>


                <a href="/mahasiswa/riwayat" class="action">

                    <div class="action-icon">
                        📋
                    </div>

                    <div class="action-info">

                        <strong>
                            Riwayat Absensi
                        </strong>

                        <span>
                            Lihat seluruh riwayat kehadiran
                        </span>

                    </div>

                    <div class="action-arrow">
                        →
                    </div>

                </a>


                <a href="/mahasiswa/izin-sakit" class="action">

                    <div class="action-icon">
                        📝
                    </div>

                    <div class="action-info">

                        <strong>
                            Izin / Sakit
                        </strong>

                        <span>
                            Buat pengajuan ketidakhadiran
                        </span>

                    </div>

                    <div class="action-arrow">
                        →
                    </div>

                </a>

            </div>

        </div>


        <!-- ATTENDANCE -->

        <div class="panel">

            <div class="panel-header">

                <h3>
                    Ringkasan Kehadiran
                </h3>

                <a href="{{ route('mahasiswa.riwayat') }}">
                    Detail
                </a>

            </div>


            <div class="attendance-body">

                <div class="progress-wrapper">

                    <div
                        class="progress-circle"
                        style="--attendance: {{ $persentaseHadir * 3.6 }};"
                    >

                        <span>
                            {{ $persentaseHadir }}%
                        </span>

                    </div>


                    <div class="progress-info">

                        <h4>
                            Tingkat Kehadiran
                        </h4>

                        <p>
                            Data kehadiran kamu akan
                            diperbarui otomatis setiap kali
                            melakukan absensi.
                        </p>

                    </div>

                </div>


                <div class="legend">

                    <div class="legend-item">

                        <span class="legend-dot dot-green"></span>

                        Hadir

                    </div>

                    <div class="legend-item">

                        <span class="legend-dot dot-orange"></span>

                        Izin

                    </div>

                    <div class="legend-item">

                        <span class="legend-dot dot-red"></span>

                        Sakit

                    </div>

                    <div class="legend-item">

                        <span class="legend-dot dot-gray"></span>

                        Belum ada data

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>


<script>

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuToggle = document.getElementById('menuToggle');

    menuToggle.addEventListener('click', function () {

        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');

    });

    overlay.addEventListener('click', function () {

        sidebar.classList.remove('open');
        overlay.classList.remove('active');

    });

</script>

</body>

</html>