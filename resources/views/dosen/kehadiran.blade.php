<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Kehadiran | Absensi QR</title>

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =====================================================
           VARIABLES
        ===================================================== */

        :root {

            --bg: #070b16;

            --sidebar:
                rgba(9, 13, 27, 0.97);

            --card:
                rgba(17, 24, 39, 0.78);

            --card-hover:
                rgba(22, 30, 48, 0.92);

            --border:
                rgba(148, 163, 184, 0.16);

            --border-hover:
                rgba(124, 92, 255, 0.5);

            --text:
                #f8fafc;

            --muted:
                #8b95aa;

            --muted-light:
                #a9b2c5;

            --purple:
                #7657ff;

            --purple-light:
                #927cff;

            --blue:
                #4d9cff;

            --gradient:
                linear-gradient(
                    135deg,
                    #7657ff 0%,
                    #4d9cff 100%
                );

            --shadow:
                0 20px 50px
                rgba(0, 0, 0, 0.3);

            --radius:
                18px;
        }


        /* =====================================================
           HTML
        ===================================================== */

        html {
            min-height: 100%;
            scroll-behavior: smooth;
        }


        /* =====================================================
           BODY
        ===================================================== */

        body {

            min-height: 100vh;

            font-family:
                Inter,
                Arial,
                Helvetica,
                sans-serif;

            color:
                var(--text);

            background:

                radial-gradient(
                    circle at 15% 10%,
                    rgba(118, 87, 255, 0.13),
                    transparent 30%
                ),

                radial-gradient(
                    circle at 90% 20%,
                    rgba(77, 156, 255, 0.10),
                    transparent 30%
                ),

                var(--bg);

            overflow-x: hidden;
        }


        /* =====================================================
           GLOBAL SCROLLBAR
        ===================================================== */

        *::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        *::-webkit-scrollbar-track {
            background: #070b16;
        }

        *::-webkit-scrollbar-thumb {

            background:
                linear-gradient(
                    180deg,
                    #7657ff,
                    #4d9cff
                );

            border-radius: 20px;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 255px;
            height: 100vh;

            padding:
                28px 18px 20px;

            display: flex;
            flex-direction: column;

            background:

                linear-gradient(
                    180deg,
                    rgba(12, 17, 34, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            z-index: 1000;

            overflow: hidden;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }


        /* =====================================================
           SIDEBAR LOGO
        ===================================================== */

        .logo {

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                0 10px;

            margin-bottom:
                20px;

            flex-shrink: 0;
        }


        .logo-icon {

            width: 42px;
            height: 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background:
                var(--gradient);

            font-size: 18px;

            font-weight: 800;

            color: #ffffff;

            box-shadow:
                0 10px 30px
                rgba(118, 87, 255, 0.30);

            flex-shrink: 0;
        }


        .logo-text {

            color:
                #ffffff;

            font-size:
                18px;

            font-weight:
                800;

            letter-spacing:
                0.3px;
        }


        .logo-text span {
            color:
                var(--blue);
        }


        /* =====================================================
           SIDEBAR MENU SCROLL
        ===================================================== */

        .sidebar-menu-scroll {

            flex: 1;

            min-height: 0;

            overflow-y: auto;

            overflow-x: hidden;

            padding-right: 4px;

            scrollbar-width: thin;

            scrollbar-color:
                #7657ff
                transparent;

            -webkit-overflow-scrolling: touch;

            overscroll-behavior: contain;
        }


        .sidebar-menu-scroll::-webkit-scrollbar {
            width: 5px;
        }


        .sidebar-menu-scroll::-webkit-scrollbar-track {
            background: transparent;
        }


        .sidebar-menu-scroll::-webkit-scrollbar-thumb {

            background:
                linear-gradient(
                    180deg,
                    #7657ff,
                    #4d9cff
                );

            border-radius:
                20px;
        }


        /* =====================================================
           MENU
        ===================================================== */

        .menu {

            display: flex;

            flex-direction: column;

            gap: 6px;

            padding-bottom:
                10px;
        }


        .menu-title {

            padding:
                0 12px;

            margin-bottom:
                12px;

            margin-top:
                3px;

            color:
                var(--muted);

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                1.2px;
        }


        .menu a {

            position:
                relative;

            display:
                flex;

            align-items:
                center;

            gap:
                13px;

            min-height:
                47px;

            padding:
                12px 13px;

            color:
                var(--muted-light);

            text-decoration:
                none;

            border-radius:
                12px;

            font-size:
                13px;

            font-weight:
                600;

            transition:
                color 0.2s ease,
                background 0.2s ease,
                transform 0.2s ease;
        }


        .menu a:hover {

            color:
                #ffffff;

            background:
                rgba(255, 255, 255, 0.04);

            transform:
                translateX(2px);
        }


        .menu a.active {

            color:
                #ffffff;

            background:
                var(--gradient);

            box-shadow:
                0 10px 25px
                rgba(118, 87, 255, 0.25);
        }


        .menu-icon {

            width:
                20px;

            min-width:
                20px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                16px;

            text-align:
                center;
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-area {

            margin-top:
                12px;

            padding-top:
                18px;

            border-top:
                1px solid var(--border);

            flex-shrink: 0;
        }


        .logout-btn {

            width:
                100%;

            min-height:
                47px;

            border:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.03);

            color:
                var(--muted-light);

            padding:
                12px;

            border-radius:
                12px;

            cursor:
                pointer;

            font-size:
                13px;

            font-weight:
                600;

            transition:
                all 0.2s ease;
        }


        .logout-btn:hover {

            color:
                #ffffff;

            border-color:
                rgba(239, 68, 68, 0.40);

            background:
                rgba(239, 68, 68, 0.08);

            transform:
                translateY(-1px);
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            width:
                calc(100% - 255px);

            min-height:
                100vh;

            margin-left:
                255px;

            padding:
                32px 35px 45px;

            position:
                relative;
        }


        .main::before {

            content:
                "";

            position:
                fixed;

            width:
                420px;

            height:
                420px;

            border-radius:
                50%;

            background:
                rgba(118, 87, 255, 0.06);

            filter:
                blur(80px);

            top:
                -180px;

            right:
                -150px;

            pointer-events:
                none;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            position:
                relative;

            z-index:
                2;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            margin-bottom:
                30px;
        }


        .page-title h1 {

            font-size:
                28px;

            font-weight:
                800;

            letter-spacing:
                -0.5px;

            margin-bottom:
                7px;
        }


        .page-title p {

            color:
                var(--muted);

            font-size:
                13px;

            line-height:
                1.5;
        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .profile {

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            padding:
                7px 11px;

            border:
                1px solid var(--border);

            border-radius:
                12px;

            background:
                rgba(255, 255, 255, 0.025);
        }


        .profile-avatar {

            width:
                42px;

            height:
                42px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                50%;

            background:
                var(--gradient);

            color:
                #ffffff;

            font-weight:
                800;

            flex-shrink:
                0;
        }


        .profile-name {

            font-size:
                13px;

            font-weight:
                700;

            color:
                #ffffff;
        }


        .profile-role {

            color:
                var(--muted);

            font-size:
                11px;

            margin-top:
                3px;
        }


        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats {

            position:
                relative;

            z-index:
                2;

            display:
                grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap:
                18px;

            margin-bottom:
                24px;
        }


        .stat-card {

            padding:
                20px;

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius);

            box-shadow:
                var(--shadow);

            transition:
                all 0.2s ease;
        }


        .stat-card:hover {

            transform:
                translateY(-2px);

            border-color:
                var(--border-hover);

            background:
                var(--card-hover);
        }


        .stat-label {

            color:
                var(--muted);

            font-size:
                12px;

            font-weight:
                600;

            margin-bottom:
                10px;
        }


        .stat-value {

            color:
                #ffffff;

            font-size:
                28px;

            font-weight:
                800;
        }


        /* =====================================================
           CONTENT CARD
        ===================================================== */

        .card {

            position:
                relative;

            z-index:
                2;

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius);

            box-shadow:
                var(--shadow);

            overflow:
                hidden;
        }


        .card-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            padding:
                22px 24px;

            border-bottom:
                1px solid var(--border);
        }


        .card-header h2 {

            font-size:
                17px;

            font-weight:
                800;

            color:
                #ffffff;
        }


        .card-header p {

            color:
                var(--muted);

            font-size:
                12px;

            margin-top:
                5px;

            line-height:
                1.5;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {

            width:
                100%;

            overflow-x:
                auto;

            -webkit-overflow-scrolling:
                touch;
        }


        table {

            width:
                100%;

            min-width:
                850px;

            border-collapse:
                collapse;
        }


        th {

            padding:
                15px 20px;

            text-align:
                left;

            color:
                var(--muted);

            font-size:
                11px;

            text-transform:
                uppercase;

            letter-spacing:
                0.5px;

            background:
                rgba(255, 255, 255, 0.02);

            border-bottom:
                1px solid var(--border);

            white-space:
                nowrap;
        }


        td {

            padding:
                16px 20px;

            color:
                var(--muted-light);

            font-size:
                13px;

            border-bottom:
                1px solid var(--border);

            vertical-align:
                middle;
        }


        tbody tr {

            transition:
                background 0.2s ease;
        }


        tbody tr:hover {

            background:
                rgba(255, 255, 255, 0.025);
        }


        tbody tr:last-child td {
            border-bottom:
                none;
        }


        /* =====================================================
           STUDENT
        ===================================================== */

        .student-name {

            color:
                #ffffff;

            font-weight:
                700;
        }


        .student-npm {

            color:
                var(--muted);

            font-size:
                11px;

            margin-top:
                4px;
        }


        /* =====================================================
           COURSE
        ===================================================== */

        .course-name {

            color:
                #ffffff;

            font-weight:
                600;
        }


        .course-class {

            color:
                var(--muted);

            font-size:
                11px;

            margin-top:
                4px;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                6px 10px;

            border-radius:
                999px;

            font-size:
                11px;

            font-weight:
                700;

            text-transform:
                capitalize;

            white-space:
                nowrap;
        }


        .status-hadir {

            color:
                #86efac;

            background:
                rgba(34, 197, 94, 0.10);

            border:
                1px solid
                rgba(34, 197, 94, 0.18);
        }


        .status-terlambat {

            color:
                #fcd34d;

            background:
                rgba(234, 179, 8, 0.10);

            border:
                1px solid
                rgba(234, 179, 8, 0.18);
        }


        .status-izin {

            color:
                #93c5fd;

            background:
                rgba(59, 130, 246, 0.10);

            border:
                1px solid
                rgba(59, 130, 246, 0.18);
        }


        .status-sakit {

            color:
                #c4b5fd;

            background:
                rgba(139, 92, 246, 0.10);

            border:
                1px solid
                rgba(139, 92, 246, 0.18);
        }


        .status-alpha {

            color:
                #fca5a5;

            background:
                rgba(239, 68, 68, 0.10);

            border:
                1px solid
                rgba(239, 68, 68, 0.18);
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {

            padding:
                65px 25px;

            text-align:
                center;
        }


        .empty-icon {

            width:
                60px;

            height:
                60px;

            margin:
                0 auto 15px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                18px;

            background:
                rgba(118, 87, 255, 0.10);

            border:
                1px solid
                rgba(118, 87, 255, 0.18);

            font-size:
                25px;
        }


        .empty h3 {

            color:
                #ffffff;

            font-size:
                16px;

            margin-bottom:
                7px;
        }


        .empty p {

            color:
                var(--muted);

            font-size:
                12px;
        }


        /* =====================================================
           MOBILE HEADER
        ===================================================== */

        .mobile-header {
            display:
                none;
        }


        /* =====================================================
           OVERLAY
        ===================================================== */

        .overlay {
            display:
                none;
        }


        /* =====================================================
           RESPONSIVE TABLET
        ===================================================== */

        @media (max-width: 1100px) {

            .stats {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }


        /* =====================================================
           RESPONSIVE MOBILE
        ===================================================== */

        @media (max-width: 760px) {

            /* SIDEBAR */

            .sidebar {

                width:
                    270px;

                transform:
                    translateX(-100%);

                box-shadow:
                    20px 0 60px
                    rgba(0, 0, 0, 0.45);
            }


            .sidebar.open {

                transform:
                    translateX(0);
            }


            /* OVERLAY */

            .overlay.show {

                display:
                    block;

                position:
                    fixed;

                inset:
                    0;

                background:
                    rgba(0, 0, 0, 0.58);

                backdrop-filter:
                    blur(3px);

                -webkit-backdrop-filter:
                    blur(3px);

                z-index:
                    999;
            }


            /* MAIN */

            .main {

                width:
                    100%;

                margin-left:
                    0;

                padding:
                    85px 16px 35px;
            }


            /* MOBILE HEADER */

            .mobile-header {

                position:
                    fixed;

                top:
                    0;

                left:
                    0;

                right:
                    0;

                height:
                    65px;

                padding:
                    0 16px;

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    space-between;

                background:
                    rgba(7, 11, 22, 0.94);

                backdrop-filter:
                    blur(15px);

                -webkit-backdrop-filter:
                    blur(15px);

                border-bottom:
                    1px solid var(--border);

                z-index:
                    900;
            }


            .mobile-logo {

                display:
                    flex;

                align-items:
                    center;

                gap:
                    10px;

                color:
                    #ffffff;

                font-size:
                    15px;

                font-weight:
                    800;
            }


            .mobile-logo-icon {

                width:
                    34px;

                height:
                    34px;

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    center;

                border-radius:
                    9px;

                background:
                    var(--gradient);

                color:
                    #ffffff;

                font-size:
                    14px;

                font-weight:
                    800;
            }


            .hamburger {

                width:
                    40px;

                height:
                    40px;

                border:
                    1px solid var(--border);

                border-radius:
                    10px;

                background:
                    rgba(255, 255, 255, 0.04);

                color:
                    #ffffff;

                font-size:
                    20px;

                cursor:
                    pointer;

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    center;

                transition:
                    all 0.2s ease;
            }


            .hamburger:hover {

                background:
                    rgba(118, 87, 255, 0.12);

                border-color:
                    rgba(118, 87, 255, 0.35);
            }


            /* PROFILE */

            .profile {
                display:
                    none;
            }


            /* PAGE TITLE */

            .page-title h1 {

                font-size:
                    23px;
            }


            .topbar {

                margin-bottom:
                    25px;
            }
        }


        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 430px) {

            .main {

                padding-left:
                    13px;

                padding-right:
                    13px;
            }


            .stats {

                grid-template-columns:
                    1fr;
            }


            .stat-card {

                padding:
                    17px;
            }


            .card-header {

                padding:
                    18px;
            }


            .empty {

                padding:
                    50px 18px;
            }
        }

    </style>
</head>


<body>


    <!-- =====================================================
         MOBILE HEADER
    ===================================================== -->

    <header class="mobile-header">

        <div class="mobile-logo">

            <div class="mobile-logo-icon">
                QR
            </div>

            ABSENSI QR

        </div>


        <button
            type="button"
            class="hamburger"
            id="hamburgerButton"
            aria-label="Buka menu"
        >
            ☰
        </button>

    </header>


    <!-- =====================================================
         OVERLAY
    ===================================================== -->

    <div
        class="overlay"
        id="overlay"
    ></div>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside
        class="sidebar"
        id="sidebar"
    >


        <!-- =================================================
             LOGO
        ================================================== -->

        <div class="logo">

            <div class="logo-icon">
                QR
            </div>


            <div class="logo-text">

                ABSENSI
                <span>QR</span>

            </div>

        </div>


        <!-- =================================================
             SCROLLABLE MENU
        ================================================== -->

        <div class="sidebar-menu-scroll">

            <nav class="menu">


                <div class="menu-title">
                    Menu Utama
                </div>


                <!-- DASHBOARD -->

                <a
                    href="{{ route('dosen.dashboard') }}"
                >

                    <span class="menu-icon">
                        ⌂
                    </span>

                    Dashboard

                </a>


                <!-- MATA KULIAH -->

                <a
                    href="{{ route('dosen.mata-kuliah') }}"
                >

                    <span class="menu-icon">
                        ▣
                    </span>

                    Mata Kuliah

                </a>


                <!-- JADWAL -->

                <a
                    href="{{ route('dosen.jadwal') }}"
                >

                    <span class="menu-icon">
                        ◫
                    </span>

                    Jadwal

                </a>


                <!-- SESI ABSENSI -->

                <a
                    href="{{ route('dosen.sesi-absensi') }}"
                >

                    <span class="menu-icon">
                        ◈
                    </span>

                    Sesi Absensi

                </a>


                <!-- DAFTAR KEHADIRAN -->

                <a
                    href="{{ route('dosen.kehadiran') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        ▤
                    </span>

                    Daftar Kehadiran

                </a>


                <!-- IZIN / SAKIT -->

                <a
                    href="{{ route('dosen.pengajuan-absensi') }}"
                >

                    <span class="menu-icon">
                        ◌
                    </span>

                    Izin / Sakit

                </a>


                <!-- RIWAYAT -->

                <a
                    href="{{ route('dosen.riwayat') }}"
                >

                    <span class="menu-icon">
                        ◷
                    </span>

                    Riwayat

                </a>


                <!-- PROFIL -->

                <a
                    href="{{ route('dosen.profil') }}"
                >

                    <span class="menu-icon">
                        ◎
                    </span>

                    Profil

                </a>


            </nav>

        </div>


        <!-- =================================================
             LOGOUT
        ================================================== -->

        <div class="logout-area">

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf


                <button
                    type="submit"
                    class="logout-btn"
                >

                    ↪ &nbsp; Keluar dari Sistem

                </button>

            </form>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="main">


        <!-- =================================================
             TOPBAR
        ================================================== -->

        <div class="topbar">

            <div class="page-title">

                <h1>
                    Daftar Kehadiran
                </h1>


                <p>
                    Lihat data kehadiran mahasiswa dari sesi absensi Anda.
                </p>

            </div>


            <!-- PROFILE -->

            <div class="profile">

                <div class="profile-avatar">

                    {{ strtoupper(substr($dosen->nama, 0, 1)) }}

                </div>


                <div>

                    <div class="profile-name">
                        {{ $dosen->nama }}
                    </div>


                    <div class="profile-role">
                        Dosen
                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             STATISTIK
        ================================================== -->

        @php

            $totalKehadiran =
                $absensis->count();

            $totalHadir =
                $absensis
                    ->where('status', 'hadir')
                    ->count();

            $totalTerlambat =
                $absensis
                    ->where('status', 'terlambat')
                    ->count();

            $totalIzin =
                $absensis
                    ->where('status', 'izin')
                    ->count();

            $totalSakit =
                $absensis
                    ->where('status', 'sakit')
                    ->count();

        @endphp


        <section class="stats">


            <!-- TOTAL -->

            <div class="stat-card">

                <div class="stat-label">
                    Total Kehadiran
                </div>


                <div class="stat-value">
                    {{ $totalKehadiran }}
                </div>

            </div>


            <!-- HADIR -->

            <div class="stat-card">

                <div class="stat-label">
                    Hadir
                </div>


                <div class="stat-value">
                    {{ $totalHadir }}
                </div>

            </div>


            <!-- TERLAMBAT -->

            <div class="stat-card">

                <div class="stat-label">
                    Terlambat
                </div>


                <div class="stat-value">
                    {{ $totalTerlambat }}
                </div>

            </div>


            <!-- IZIN / SAKIT -->

            <div class="stat-card">

                <div class="stat-label">
                    Izin / Sakit
                </div>


                <div class="stat-value">
                    {{ $totalIzin + $totalSakit }}
                </div>

            </div>


        </section>


        <!-- =================================================
             DATA KEHADIRAN
        ================================================== -->

        <section class="card">


            <!-- CARD HEADER -->

            <div class="card-header">

                <div>

                    <h2>
                        Data Kehadiran Mahasiswa
                    </h2>


                    <p>
                        Semua mahasiswa yang telah melakukan absensi.
                    </p>

                </div>

            </div>


            @if($absensis->count() > 0)


                <!-- =================================================
                     TABLE
                ================================================== -->

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Mahasiswa
                                </th>


                                <th>
                                    Mata Kuliah
                                </th>


                                <th>
                                    Kelas
                                </th>


                                <th>
                                    Tanggal
                                </th>


                                <th>
                                    Waktu Scan
                                </th>


                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @foreach($absensis as $absensi)


                                @php

                                    $mahasiswa =
                                        $absensi->mahasiswa;

                                    $sesi =
                                        $absensi->sesiAbsensi;

                                    $jadwal =
                                        $sesi?->jadwal;

                                    $mataKuliah =
                                        $jadwal?->mataKuliah;

                                    $kelas =
                                        $jadwal?->kelas;

                                @endphp


                                <tr>


                                    <!-- MAHASISWA -->

                                    <td>

                                        <div class="student-name">

                                            {{ $mahasiswa?->nama ?? '-' }}

                                        </div>


                                        <div class="student-npm">

                                            NPM:
                                            {{ $mahasiswa?->npm ?? '-' }}

                                        </div>

                                    </td>


                                    <!-- MATA KULIAH -->

                                    <td>

                                        <div class="course-name">

                                            {{ $mataKuliah?->nama ?? '-' }}

                                        </div>


                                        <div class="course-class">

                                            {{ $mataKuliah?->kode ?? '-' }}

                                        </div>

                                    </td>


                                    <!-- KELAS -->

                                    <td>

                                        {{ $kelas?->nama ?? '-' }}

                                    </td>


                                    <!-- TANGGAL -->

                                    <td>

                                        @if($sesi?->tanggal)

                                            {{ $sesi->tanggal->format('d M Y') }}

                                        @else

                                            -

                                        @endif

                                    </td>


                                    <!-- WAKTU SCAN -->

                                    <td>

                                        @if($absensi->waktu_scan)

                                            {{ $absensi->waktu_scan->format('H:i') }}

                                        @else

                                            -

                                        @endif

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        <span
                                            class="status status-{{ $absensi->status }}"
                                        >

                                            {{ ucfirst($absensi->status) }}

                                        </span>

                                    </td>


                                </tr>


                            @endforeach


                        </tbody>

                    </table>

                </div>


            @else


                <!-- =================================================
                     EMPTY STATE
                ================================================== -->

                <div class="empty">

                    <div class="empty-icon">
                        ✓
                    </div>


                    <h3>
                        Belum Ada Data Kehadiran
                    </h3>


                    <p>
                        Data akan muncul setelah mahasiswa melakukan scan QR.
                    </p>

                </div>


            @endif


        </section>


    </main>


    <!-- =====================================================
         JAVASCRIPT
    ===================================================== -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {


                /* =================================================
                   ELEMENT
                ================================================= */

                const sidebar =
                    document.getElementById('sidebar');

                const overlay =
                    document.getElementById('overlay');

                const hamburger =
                    document.getElementById('hamburgerButton');


                /* =================================================
                   TOGGLE SIDEBAR
                ================================================= */

                function toggleSidebar() {

                    if (!sidebar || !overlay) {
                        return;
                    }

                    sidebar.classList.toggle('open');

                    overlay.classList.toggle('show');
                }


                /* =================================================
                   CLOSE SIDEBAR
                ================================================= */

                function closeSidebar() {

                    if (!sidebar || !overlay) {
                        return;
                    }

                    sidebar.classList.remove('open');

                    overlay.classList.remove('show');
                }


                /* =================================================
                   HAMBURGER
                ================================================= */

                if (hamburger) {

                    hamburger.addEventListener(
                        'click',
                        function () {

                            toggleSidebar();

                        }
                    );

                }


                /* =================================================
                   OVERLAY
                ================================================= */

                if (overlay) {

                    overlay.addEventListener(
                        'click',
                        function () {

                            closeSidebar();

                        }
                    );

                }


                /* =================================================
                   ESCAPE
                ================================================= */

                document.addEventListener(
                    'keydown',
                    function (event) {

                        if (event.key === 'Escape') {

                            closeSidebar();

                        }

                    }
                );


                /* =================================================
                   MENU CLICK MOBILE
                ================================================= */

                document
                    .querySelectorAll('.menu a')
                    .forEach(
                        function (link) {

                            link.addEventListener(
                                'click',
                                function () {

                                    if (
                                        window.innerWidth <= 760
                                    ) {

                                        closeSidebar();

                                    }

                                }
                            );

                        }
                    );


                /* =================================================
                   RESIZE
                ================================================= */

                window.addEventListener(
                    'resize',
                    function () {

                        if (
                            window.innerWidth > 760
                        ) {

                            closeSidebar();

                        }

                    }
                );


            }
        );

    </script>


</body>

</html>