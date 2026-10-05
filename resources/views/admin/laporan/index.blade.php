<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan | Admin - Absensi QR</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #070b16;
            --sidebar: rgba(9, 13, 27, 0.97);
            --card: rgba(17, 24, 39, 0.78);
            --card-hover: rgba(22, 30, 48, 0.92);

            --border: rgba(148, 163, 184, 0.16);
            --border-hover: rgba(124, 92, 255, 0.50);

            --text: #f8fafc;
            --muted: #8b95aa;
            --muted-light: #a9b2c5;

            --purple: #7657ff;
            --blue: #4d9cff;

            --gradient:
                linear-gradient(
                    135deg,
                    #7657ff 0%,
                    #4d9cff 100%
                );

            --green: #4ade80;
            --yellow: #facc15;
            --red: #ff5d73;

            --radius: 18px;

            --shadow:
                0 20px 50px rgba(0, 0, 0, 0.30);
        }

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Arial,
                sans-serif;

            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgba(102, 73, 255, 0.16),
                    transparent 32%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(52, 157, 255, 0.13),
                    transparent 30%
                ),
                var(--bg);

            color: var(--text);

            overflow-x: hidden;
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

        /* =====================================================
           LAYOUT
        ===================================================== */

        .dashboard-layout {
            min-height: 100vh;
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

            padding: 28px 18px 20px;

            display: flex;
            flex-direction: column;

            background:
                linear-gradient(
                    180deg,
                    rgba(13, 17, 35, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            z-index: 1000;

            overflow: hidden;

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease;
        }

        .logo {
            display: flex;
            align-items: center;

            gap: 11px;

            padding: 5px 10px;

            margin-bottom: 20px;

            flex-shrink: 0;
        }

        .logo-icon {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            background:
                var(--gradient);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;
            font-weight: 900;

            color: #fff;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, 0.35);
        }

        .logo-text {
            font-size: 18px;

            font-weight: 900;

            letter-spacing: -0.4px;
        }

        .logo-text span {
            background:
                linear-gradient(
                    90deg,
                    #927cff,
                    #4d9cff
                );

            -webkit-background-clip: text;
            background-clip: text;

            color: transparent;
        }

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

            border-radius: 20px;
        }

        .menu {
            display: flex;

            flex-direction: column;

            gap: 6px;

            padding-bottom: 10px;
        }

        .menu-label {
            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.4px;

            text-transform: uppercase;

            color: #5f6980;

            padding: 0 13px;

            margin-top: 3px;
            margin-bottom: 9px;
        }

        .menu a {
            position: relative;

            display: flex;

            align-items: center;

            gap: 12px;

            min-height: 45px;

            padding: 11px 13px;

            color: #8993a8;

            border-radius: 11px;

            font-size: 12px;

            font-weight: 700;

            transition:
                all 0.25s ease;
        }

        .menu a:hover {
            background:
                rgba(118, 87, 255, 0.09);

            color: #fff;

            transform:
                translateX(3px);
        }

        .menu a.active {
            color: #fff;

            background:
                linear-gradient(
                    90deg,
                    rgba(118, 87, 255, 0.22),
                    rgba(77, 156, 255, 0.08)
                );

            box-shadow:
                inset 0 0 0 1px
                rgba(118, 87, 255, 0.18);
        }

        .menu a.active::before {
            content: "";

            position: absolute;

            left: 0;

            top: 9px;
            bottom: 9px;

            width: 3px;

            border-radius: 10px;

            background:
                linear-gradient(
                    180deg,
                    #7657ff,
                    #4d9cff
                );

            box-shadow:
                0 0 12px
                rgba(118, 87, 255, 0.80);
        }

        .menu-icon {
            width: 20px;
            min-width: 20px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 15px;
        }

        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout {
            margin-top: 12px;

            padding-top: 18px;

            border-top:
                1px solid var(--border);

            flex-shrink: 0;
        }

        .logout form {
            width: 100%;
        }

        .logout button {
            width: 100%;

            min-height: 45px;

            border:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.025);

            color: #a7afc0;

            padding: 11px;

            border-radius: 11px;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            transition:
                all 0.25s ease;
        }

        .logout button:hover {
            color: #fff;

            background:
                rgba(239, 68, 68, 0.08);

            border-color:
                rgba(239, 68, 68, 0.35);

            transform:
                translateY(-2px);
        }

        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            width:
                calc(100% - 255px);

            margin-left: 255px;

            min-height: 100vh;

            padding:
                32px 35px 45px;

            position: relative;
        }

        .main::before {
            content: "";

            position: fixed;

            width: 420px;
            height: 420px;

            border-radius: 50%;

            background:
                rgba(118, 87, 255, 0.07);

            filter:
                blur(80px);

            top: -180px;
            right: -150px;

            pointer-events: none;
        }

        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 26px;
        }

        .breadcrumb {
            color:
                var(--muted);

            font-size: 13px;

            font-weight: 600;
        }

        .breadcrumb span {
            margin:
                0 8px;

            color: #4f5a70;
        }

        .breadcrumb strong {
            color: #fff;

            font-weight: 800;
        }

        .top-profile {
            display: flex;

            align-items: center;

            gap: 10px;

            padding:
                7px 11px;

            border:
                1px solid var(--border);

            border-radius: 12px;

            background:
                rgba(255, 255, 255, 0.025);
        }

        .top-avatar {
            width: 30px;
            height: 30px;

            border-radius: 9px;

            background:
                var(--gradient);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 12px;

            font-weight: 900;
        }

        .top-profile span {
            font-size: 12px;

            font-weight: 700;

            color: #dce2ef;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .page-header {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    115deg,
                    rgba(42, 32, 93, 0.90),
                    rgba(22, 34, 71, 0.78)
                );

            border:
                1px solid
                rgba(124, 92, 255, 0.20);

            border-radius: 20px;

            padding:
                30px 32px;

            margin-bottom: 22px;

            box-shadow:
                0 20px 55px
                rgba(0,0,0,.22);
        }

        .page-header::after {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background:
                rgba(77, 156, 255, 0.12);

            filter: blur(45px);

            right: -80px;
            top: -100px;

            pointer-events: none;
        }

        .page-header-content {
            position: relative;

            z-index: 2;
        }

        .page-header h1 {
            font-size: 29px;

            line-height: 1.2;

            font-weight: 850;

            letter-spacing: -0.7px;

            margin-bottom: 9px;
        }

        .page-header h1 span {
            background:
                linear-gradient(
                    90deg,
                    #a58fff,
                    #62adff
                );

            -webkit-background-clip: text;
            background-clip: text;

            color: transparent;
        }

        .page-header p {
            color: #9ba6ba;

            font-size: 13px;

            line-height: 1.6;
        }

        /* =====================================================
           ALERT
        ===================================================== */

        .alert-success {
            position: relative;

            z-index: 2;

            margin-bottom: 18px;

            padding:
                13px 15px;

            border-radius: 12px;

            background:
                rgba(74,222,128,.08);

            border:
                1px solid
                rgba(74,222,128,.18);

            color: #8ef0ae;

            font-size: 12px;
        }

        /* =====================================================
           STATS
        ===================================================== */

        .stats-grid {
            position: relative;

            z-index: 2;

            display: grid;

            grid-template-columns:
                repeat(6, minmax(0, 1fr));

            gap: 15px;

            margin-bottom: 18px;
        }

        .stat-card {
            padding: 18px;

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius);

            box-shadow:
                var(--shadow);

            transition:
                all .25s ease;
        }

        .stat-card:hover {
            transform:
                translateY(-3px);

            border-color:
                var(--border-hover);

            background:
                var(--card-hover);
        }

        .stat-label {
            color: var(--muted);

            font-size: 9px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .7px;

            margin-bottom: 9px;
        }

        .stat-value {
            color: #fff;

            font-size: 25px;

            font-weight: 900;
        }

        .stat-value.green {
            color: #8ef0ae;
        }

        .stat-value.yellow {
            color: #fde68a;
        }

        .stat-value.blue {
            color: #8fc2ff;
        }

        .stat-value.red {
            color: #ff9ba8;
        }

        /* =====================================================
           CARD
        ===================================================== */

        .card {
            position: relative;

            z-index: 2;

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius);

            box-shadow:
                var(--shadow);

            overflow: hidden;
        }

        /* =====================================================
           FILTER
        ===================================================== */

        .filter-section {
            padding:
                22px;

            border-bottom:
                1px solid var(--border);
        }

        .section-title {
            margin-bottom:
                14px;

            font-size: 15px;

            font-weight: 850;
        }

        .filter-form {
            display: grid;

            grid-template-columns:
                repeat(5, minmax(0, 1fr));

            gap: 12px;

            align-items: end;
        }

        .form-group {
            display: flex;

            flex-direction: column;

            gap: 7px;
        }

        .form-label {
            color:
                var(--muted);

            font-size: 10px;

            font-weight: 700;
        }

        .form-control {
            width: 100%;

            padding:
                11px 12px;

            background:
                rgba(7,11,22,.65);

            border:
                1px solid var(--border);

            border-radius:
                10px;

            outline: none;

            color:
                #fff;

            font-size: 11px;
        }

        .form-control:focus {
            border-color:
                var(--purple);

            box-shadow:
                0 0 0 3px
                rgba(118,87,255,.10);
        }

        .form-control option {
            background:
                #111827;

            color: #fff;
        }

        .filter-actions {
            display: flex;

            gap: 8px;
        }

        .btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding:
                11px 14px;

            border-radius:
                10px;

            border: none;

            cursor: pointer;

            font-size: 10px;

            font-weight: 800;
        }

        .btn-primary {
            background:
                var(--gradient);

            color: #fff;
        }

        .btn-reset {
            border:
                1px solid var(--border);

            background:
                rgba(255,255,255,.04);

            color:
                var(--muted-light);
        }

        /* =====================================================
           TOOLBAR
        ===================================================== */

        .toolbar {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding:
                20px 22px;

            border-bottom:
                1px solid var(--border);
        }

        .toolbar-title {
            font-size: 15px;

            font-weight: 850;
        }

        .toolbar-subtitle {
            margin-top: 4px;

            color:
                var(--muted);

            font-size: 10px;
        }

        .toolbar-actions {
            display: flex;

            align-items: center;

            gap: 9px;
        }

        .search-box {
            width: 280px;

            position: relative;
        }

        .search-box input {
            width: 100%;

            padding:
                11px 12px 11px 36px;

            background:
                rgba(7,11,22,.65);

            border:
                1px solid var(--border);

            border-radius:
                10px;

            outline: none;

            color: #fff;

            font-size: 11px;
        }

        .search-box input::placeholder {
            color:
                #5f687b;
        }

        .search-icon {
            position: absolute;

            left: 12px;

            top: 50%;

            transform:
                translateY(-50%);

            color:
                var(--muted);

            pointer-events: none;
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            min-width: 1100px;

            border-collapse:
                collapse;
        }

        th {
            padding:
                14px 16px;

            text-align:
                left;

            color:
                var(--muted);

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                .7px;

            background:
                rgba(255,255,255,.015);

            border-bottom:
                1px solid var(--border);
        }

        td {
            padding:
                14px 16px;

            color:
                var(--muted-light);

            font-size:
                11px;

            vertical-align:
                top;

            border-bottom:
                1px solid
                rgba(148,163,184,.08);
        }

        tbody tr:hover {
            background:
                rgba(255,255,255,.025);
        }

        tbody tr:last-child td {
            border-bottom:
                none;
        }

        .student-name {
            color:
                #fff;

            font-weight:
                800;

            margin-bottom:
                4px;
        }

        .course-name {
            color:
                #fff;

            font-weight:
                800;

            margin-bottom:
                3px;
        }

        .secondary {
            color:
                var(--muted);

            font-size:
                9px;

            line-height:
                1.5;
        }

        .date-main {
            color:
                #fff;

            font-weight:
                750;

            margin-bottom:
                3px;
        }

        .time-main {
            color:
                #fff;

            font-weight:
                750;

            margin-bottom:
                3px;
        }

        .badge {
            display: inline-flex;

            padding:
                6px 8px;

            border-radius:
                8px;

            font-size:
                9px;

            font-weight:
                800;
        }

        .badge-hadir {
            background:
                rgba(74,222,128,.08);

            border:
                1px solid
                rgba(74,222,128,.15);

            color:
                #8ef0ae;
        }

        .badge-terlambat {
            background:
                rgba(250,204,21,.08);

            border:
                1px solid
                rgba(250,204,21,.15);

            color:
                #fde68a;
        }

        .badge-izin {
            background:
                rgba(77,156,255,.08);

            border:
                1px solid
                rgba(77,156,255,.15);

            color:
                #8fc2ff;
        }

        .badge-sakit {
            background:
                rgba(255,93,115,.08);

            border:
                1px solid
                rgba(255,93,115,.15);

            color:
                #ff9ba8;
        }

        .badge-alpha {
            background:
                rgba(148,163,184,.07);

            border:
                1px solid
                rgba(148,163,184,.12);

            color:
                #a9b2c5;
        }

        .empty {
            padding:
                55px 20px !important;

            text-align:
                center;

            color:
                var(--muted);
        }

        .search-empty {
            display:
                none;

            padding:
                50px 20px;

            text-align:
                center;

            color:
                var(--muted);
        }

        .search-empty strong {
            display:
                block;

            margin-bottom:
                6px;

            color:
                #fff;

            font-size:
                14px;
        }

        /* =====================================================
           MOBILE
        ===================================================== */

        .mobile-header {
            display:
                none;
        }

        .sidebar-overlay {
            display:
                none;
        }

        @media (max-width: 1350px) {

            .stats-grid {
                grid-template-columns:
                    repeat(3, minmax(0,1fr));
            }

            .filter-form {
                grid-template-columns:
                    repeat(3, minmax(0,1fr));
            }
        }

        @media (max-width: 1000px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, minmax(0,1fr));
            }

            .filter-form {
                grid-template-columns:
                    repeat(2, minmax(0,1fr));
            }

            .filter-actions {
                grid-column:
                    1 / -1;
            }
        }

        @media (max-width: 760px) {

            .sidebar {
                width:
                    270px;

                transform:
                    translateX(-100%);
            }

            .sidebar.open {
                transform:
                    translateX(0);
            }

            .sidebar-overlay.show {
                display:
                    block;

                position:
                    fixed;

                inset:
                    0;

                background:
                    rgba(2,5,12,.68);

                backdrop-filter:
                    blur(3px);

                z-index:
                    900;
            }

            .main {
                width:
                    100%;

                margin-left:
                    0;

                padding:
                    85px 16px 35px;
            }

            .mobile-header {
                position:
                    fixed;

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    space-between;

                top: 0;
                left: 0;
                right: 0;

                height: 65px;

                padding:
                    0 16px;

                background:
                    rgba(7,11,22,.90);

                backdrop-filter:
                    blur(18px);

                border-bottom:
                    1px solid var(--border);

                z-index:
                    800;
            }

            .mobile-logo {
                display:
                    flex;

                align-items:
                    center;

                gap:
                    9px;

                font-size:
                    16px;

                font-weight:
                    900;
            }

            .mobile-logo-icon {
                width:
                    33px;

                height:
                    33px;

                border-radius:
                    9px;

                background:
                    var(--gradient);

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    center;

                font-size:
                    11px;

                font-weight:
                    900;
            }

            .hamburger {
                width:
                    40px;

                height:
                    40px;

                border:
                    1px solid var(--border);

                border-radius:
                    11px;

                background:
                    rgba(255,255,255,.03);

                color:
                    #fff;

                cursor:
                    pointer;

                font-size:
                    21px;
            }

            .top-profile {
                display:
                    none;
            }

            .page-header {
                padding:
                    22px;
            }

            .page-header h1 {
                font-size:
                    24px;
            }

            .filter-form {
                grid-template-columns:
                    1fr;
            }

            .filter-actions {
                grid-column:
                    auto;
            }

            .toolbar {
                flex-direction:
                    column;

                align-items:
                    stretch;
            }

            .toolbar-actions {
                width:
                    100%;

                flex-direction:
                    column;

                align-items:
                    stretch;
            }

            .search-box {
                width:
                    100%;
            }
        }

        @media (max-width: 480px) {

            .main {
                padding-left:
                    13px;

                padding-right:
                    13px;
            }

            .stats-grid {
                grid-template-columns:
                    1fr;
            }

            .filter-actions {
                flex-direction:
                    column;
            }

            .btn {
                width:
                    100%;
            }
        }
    </style>
</head>

<body>

<div class="dashboard-layout">


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


    <!-- OVERLAY -->

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
    ></div>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside
        class="sidebar"
        id="sidebar"
    >

        <div class="logo">

            <div class="logo-icon">
                QR
            </div>

            <div class="logo-text">
                ABSENSI <span>QR</span>
            </div>

        </div>


        <div class="sidebar-menu-scroll">

            <nav class="menu">

                <div class="menu-label">
                    Menu Utama
                </div>


                <a href="{{ route('admin.dashboard') }}">
                    <span class="menu-icon">⌂</span>
                    Dashboard
                </a>


                <a href="{{ route('admin.mahasiswa') }}">
                    <span class="menu-icon">◉</span>
                    Mahasiswa
                </a>


                <a href="{{ route('admin.dosen') }}">
                    <span class="menu-icon">◎</span>
                    Dosen
                </a>


                <a href="{{ route('admin.mata-kuliah') }}">
                    <span class="menu-icon">▣</span>
                    Mata Kuliah
                </a>


                <a href="{{ route('admin.kelas') }}">
                    <span class="menu-icon">▤</span>
                    Kelas
                </a>


                <a href="{{ route('admin.jadwal') }}">
                    <span class="menu-icon">◷</span>
                    Jadwal
                </a>


                <a href="{{ route('admin.sesi-absensi') }}">
                    <span class="menu-icon">▥</span>
                    Sesi Absensi
                </a>


                <a href="{{ route('admin.kehadiran') }}">
                    <span class="menu-icon">✓</span>
                    Kehadiran
                </a>


                <a href="{{ route('admin.pengajuan-absensi') }}">
                    <span class="menu-icon">◌</span>
                    Pengajuan Absensi
                </a>


                <a
                    href="{{ route('admin.laporan') }}"
                    class="active"
                >
                    <span class="menu-icon">◷</span>
                    Laporan
                </a>


            </nav>

        </div>


        <!-- LOGOUT -->

        <div class="logout">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button type="submit">
                    Keluar dari Sistem
                </button>

            </form>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">

            <div class="breadcrumb">

                Admin

                <span>/</span>

                <strong>
                    Laporan
                </strong>

            </div>

        </div>


        <!-- PAGE HEADER -->

        <section class="page-header">

            <div class="page-header-content">

                <h1>
                    Laporan <span>Presensi</span>
                </h1>

                <p>
                    Rekap data kehadiran mahasiswa berdasarkan
                    periode, mata kuliah, kelas, dan dosen.
                </p>

            </div>

        </section>


        <!-- SUCCESS -->

        @if (session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        <!-- =====================================================
             STATISTICS
        ===================================================== -->

        <section class="stats-grid">

            @if ($isPengajuanReport)

                <div class="stat-card">

                    <div class="stat-label">
                        Total Pengajuan
                    </div>

                    <div class="stat-value">
                        {{ $total }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Menunggu
                    </div>

                    <div class="stat-value yellow">
                        {{ $menunggu }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Disetujui
                    </div>

                    <div class="stat-value green">
                        {{ $disetujui }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Ditolak
                    </div>

                    <div class="stat-value red">
                        {{ $ditolak }}
                    </div>

                </div>

            @else

                <div class="stat-card">

                    <div class="stat-label">
                        Total Data
                    </div>

                    <div class="stat-value">
                        {{ $total }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Hadir
                    </div>

                    <div class="stat-value green">
                        {{ $hadir }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Terlambat
                    </div>

                    <div class="stat-value yellow">
                        {{ $terlambat }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Izin
                    </div>

                    <div class="stat-value blue">
                        {{ $izin }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Sakit
                    </div>

                    <div class="stat-value red">
                        {{ $sakit }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Kehadiran
                    </div>

                    <div class="stat-value">
                        {{ $persentaseHadir }}%
                    </div>

                </div>

            @endif

        </section>

        <!-- =====================================================
             MAIN CARD
        ===================================================== -->

        <section class="card">


            <!-- FILTER -->

            <div class="filter-section">

                <div class="section-title">
                    Filter Laporan
                </div>


                <form
                    action="{{ route('admin.laporan') }}"
                    method="GET"
                    class="filter-form"
                >


                    <!-- TANGGAL MULAI -->

                    <div class="form-group">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control"
                            value="{{ $tanggalMulai }}"
                        >

                    </div>


                    <!-- TANGGAL SELESAI -->

                    <div class="form-group">

                        <label class="form-label">
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            class="form-control"
                            value="{{ $tanggalSelesai }}"
                        >

                    </div>


                    <!-- MATA KULIAH -->

                    <div class="form-group">

                        <label class="form-label">
                            Mata Kuliah
                        </label>

                        <select
                            name="mata_kuliah_id"
                            class="form-control"
                        >

                            <option value="">
                                Semua Mata Kuliah
                            </option>


                            @foreach ($mataKuliahs as $mataKuliah)

                                <option
                                    value="{{ $mataKuliah->id }}"
                                    {{ (string) $mataKuliahId === (string) $mataKuliah->id ? 'selected' : '' }}
                                >

                                    {{ $mataKuliah->kode }}
                                    -
                                    {{ $mataKuliah->nama }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- KELAS -->

                    <div class="form-group">

                        <label class="form-label">
                            Kelas
                        </label>

                        <select
                            name="kelas_id"
                            class="form-control"
                        >

                            <option value="">
                                Semua Kelas
                            </option>


                            @foreach ($kelases as $kelas)

                                <option
                                    value="{{ $kelas->id }}"
                                    {{ (string) $kelasId === (string) $kelas->id ? 'selected' : '' }}
                                >

                                    {{ $kelas->nama }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- DOSEN -->

                    <div class="form-group">

                        <label class="form-label">
                            Dosen
                        </label>

                        <select
                            name="dosen_id"
                            class="form-control"
                        >

                            <option value="">
                                Semua Dosen
                            </option>


                            @foreach ($dosens as $dosen)

                                <option
                                    value="{{ $dosen->id }}"
                                    {{ (string) $dosenId === (string) $dosen->id ? 'selected' : '' }}
                                >

                                    {{ $dosen->nama }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- STATUS PENGAJUAN -->

                    <div class="form-group">

                        <label class="form-label">
                            Status Pengajuan
                        </label>

                        <select
                            name="status_pengajuan"
                            class="form-control"
                        >

                            <option value="">
                                Semua Status
                            </option>

                            <option
                                value="menunggu"
                                {{ $statusPengajuan === 'menunggu' ? 'selected' : '' }}
                            >
                                Menunggu
                            </option>

                            <option
                                value="disetujui"
                                {{ $statusPengajuan === 'disetujui' ? 'selected' : '' }}
                            >
                                Disetujui
                            </option>

                            <option
                                value="ditolak"
                                {{ $statusPengajuan === 'ditolak' ? 'selected' : '' }}
                            >
                                Ditolak
                            </option>

                        </select>

                    </div>


                    <!-- FILTER BUTTONS -->

                    <div class="filter-actions">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Terapkan Filter
                        </button>


                        <a
                            href="{{ route('admin.laporan') }}"
                            class="btn btn-reset"
                        >
                            Reset
                        </a>

                    </div>

                </form>

            </div>


            <!-- TOOLBAR -->

            <div class="toolbar">

                <div>

                    <div class="toolbar-title">
                        Rekap Presensi
                    </div>

                    <div class="toolbar-subtitle">
                        {{ $absensi->count() }} data ditampilkan
                    </div>

                </div>


                <div class="toolbar-actions">

                    <div class="search-box">

                        <span class="search-icon">
                            ⌕
                        </span>

                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari mahasiswa, NPM, mata kuliah..."
                        >

                    </div>

                    <a
                        href="{{ route('admin.laporan.export', request()->query()) }}"
                        class="btn btn-primary"
                    >
                        Export CSV
                    </a>

                    <button
                        type="button"
                        class="btn btn-primary"
                        id="printButton"
                    >
                        Cetak
                    </button>

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Mahasiswa
                            </th>

                            <th>
                                NPM
                            </th>

                            <th>
                                Mata Kuliah
                            </th>

                            <th>
                                Kelas
                            </th>

                            <th>
                                Dosen
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Waktu
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Keterangan
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse ($absensi as $item)


                            @php

                                $statusClass =
                                    match ($item->status) {

                                        'hadir'
                                            => 'badge-hadir',

                                        'terlambat'
                                            => 'badge-terlambat',

                                        'izin'
                                            => 'badge-izin',

                                        'sakit'
                                            => 'badge-sakit',

                                        'menunggu'
                                            => 'badge-terlambat',

                                        'disetujui'
                                            => 'badge-hadir',

                                        'ditolak'
                                            => 'badge-sakit',

                                        default
                                            => 'badge-alpha',

                                    };

                            @endphp


                            <tr
                                class="report-row"
                                data-search="{{ strtolower(
                                    ($item->mahasiswa->nama ?? '') . ' ' .
                                    ($item->mahasiswa->npm ?? '') . ' ' .
                                    ($item->sesiAbsensi->jadwal->mataKuliah->nama ?? '') . ' ' .
                                    ($item->sesiAbsensi->jadwal->mataKuliah->kode ?? '') . ' ' .
                                    ($item->sesiAbsensi->jadwal->kelas->nama ?? '') . ' ' .
                                    ($item->sesiAbsensi->jadwal->dosen->nama ?? '') . ' ' .
                                    ($item->status ?? '') . ' ' .
                                    ($item->keterangan ?? '')
                                ) }}"
                            >


                                <!-- MAHASISWA -->

                                <td>

                                    <div class="student-name">
                                        {{ $item->mahasiswa->nama ?? '-' }}
                                    </div>

                                    <div class="secondary">
                                        Mahasiswa
                                    </div>

                                </td>


                                <!-- NPM -->

                                <td>

                                    <div class="secondary">
                                        {{ $item->mahasiswa->npm ?? '-' }}
                                    </div>

                                </td>


                                <!-- MATA KULIAH -->

                                <td>

                                    <div class="course-name">

                                        {{
                                            $item->sesiAbsensi
                                                ->jadwal
                                                ->mataKuliah
                                                ->nama
                                            ?? '-'
                                        }}

                                    </div>

                                    <div class="secondary">

                                        {{
                                            $item->sesiAbsensi
                                                ->jadwal
                                                ->mataKuliah
                                                ->kode
                                            ?? '-'
                                        }}

                                    </div>

                                </td>


                                <!-- KELAS -->

                                <td>

                                    <div class="secondary">

                                        {{
                                            $item->sesiAbsensi
                                                ->jadwal
                                                ->kelas
                                                ->nama
                                            ?? '-'
                                        }}

                                    </div>

                                </td>


                                <!-- DOSEN -->

                                <td>

                                    <div class="secondary">

                                        {{
                                            $item->sesiAbsensi
                                                ->jadwal
                                                ->dosen
                                                ->nama
                                            ?? '-'
                                        }}

                                    </div>

                                </td>


                                <!-- TANGGAL -->

                                <td>

                                    <div class="date-main">

                                        {{
                                            $item->sesiAbsensi
                                                ->tanggal
                                                ? $item->sesiAbsensi
                                                    ->tanggal
                                                    ->format('d M Y')
                                                : '-'
                                        }}

                                    </div>

                                    <div class="secondary">

                                        {{
                                            $item->sesiAbsensi
                                                ->tanggal
                                                ? $item->sesiAbsensi
                                                    ->tanggal
                                                    ->locale('id')
                                                    ->translatedFormat('l')
                                                : '-'
                                        }}

                                    </div>

                                </td>


                                <!-- WAKTU -->

                                <td>

                                    @if ($item->waktu_scan)

                                        <div class="time-main">

                                            {{ $item->waktu_scan->format('H:i:s') }}

                                        </div>

                                    @else

                                        <span class="secondary">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <!-- STATUS -->

                                <td>

                                    <span
                                        class="badge {{ $statusClass }}"
                                    >
                                        {{ ucfirst($item->status) }}
                                    </span>

                                </td>


                                <!-- KETERANGAN -->

                                <td>

                                    <div class="secondary">

                                        {{
                                            $item->keterangan
                                            ?: '-'
                                        }}

                                    </div>

                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td
                                    colspan="9"
                                    class="empty"
                                >
                                    Belum ada data laporan presensi.
                                </td>

                            </tr>


                        @endforelse


                    </tbody>

                </table>


                <div
                    class="search-empty"
                    id="searchEmpty"
                >

                    <strong>
                        Data tidak ditemukan
                    </strong>

                    Coba gunakan nama mahasiswa,
                    NPM, mata kuliah, kelas,
                    dosen, atau status.

                </div>

            </div>

        </section>


    </main>

</div>


<script>

    /* =====================================================
       MOBILE SIDEBAR
    ===================================================== */

    const sidebar =
        document.getElementById(
            'sidebar'
        );


    const overlay =
        document.getElementById(
            'sidebarOverlay'
        );


    const hamburger =
        document.getElementById(
            'hamburgerButton'
        );


    if (hamburger) {

        hamburger.addEventListener(
            'click',
            function () {

                sidebar.classList.toggle(
                    'open'
                );

                overlay.classList.toggle(
                    'show'
                );

            }
        );

    }


    if (overlay) {

        overlay.addEventListener(
            'click',
            function () {

                sidebar.classList.remove(
                    'open'
                );

                overlay.classList.remove(
                    'show'
                );

            }
        );

    }


    /* =====================================================
       SEARCH
    ===================================================== */

    const searchInput =
        document.getElementById(
            'searchInput'
        );


    const rows =
        document.querySelectorAll(
            '.report-row'
        );


    const searchEmpty =
        document.getElementById(
            'searchEmpty'
        );


    if (searchInput) {

        searchInput.addEventListener(
            'input',
            function () {

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();


                let visible =
                    0;


                rows.forEach(
                    function (row) {

                        const text =
                            row.dataset.search
                                .toLowerCase();


                        if (
                            text.includes(
                                keyword
                            )
                        ) {

                            row.style.display =
                                '';

                            visible++;

                        } else {

                            row.style.display =
                                'none';

                        }

                    }
                );


                if (
                    keyword !== '' &&
                    visible === 0 &&
                    rows.length > 0
                ) {

                    searchEmpty.style.display =
                        'block';

                } else {

                    searchEmpty.style.display =
                        'none';

                }

            }
        );

    }


    /* =====================================================
       PRINT
    ===================================================== */

    const printButton =
        document.getElementById(
            'printButton'
        );


    if (printButton) {

        printButton.addEventListener(
            'click',
            function () {

                window.print();

            }
        );

    }


    /* =====================================================
       ESCAPE
    ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape'
            ) {

                sidebar.classList.remove(
                    'open'
                );

                overlay.classList.remove(
                    'show'
                );

            }

        }
    );

</script>

</body>
</html>