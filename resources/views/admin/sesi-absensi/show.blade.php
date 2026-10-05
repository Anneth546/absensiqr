<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Sesi Absensi - Admin</title>

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

            --border: rgba(148, 163, 184, 0.16);
            --border-hover: rgba(124, 92, 255, 0.50);

            --text: #f8fafc;
            --muted: #8b95aa;
            --muted-light: #a9b2c5;

            --purple: #7657ff;
            --blue: #4d9cff;

            --gradient: linear-gradient(
                135deg,
                #7657ff 0%,
                #4d9cff 100%
            );

            --green: #4ade80;
            --yellow: #facc15;
            --red: #ff5d73;

            --shadow: 0 20px 50px rgba(0, 0, 0, 0.30);

            --radius: 18px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            color: var(--text);

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(118, 87, 255, 0.12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(77, 156, 255, 0.10),
                    transparent 30%
                ),
                var(--bg);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        /* =========================
           LAYOUT
        ========================== */

        .dashboard-layout {
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            width: 255px;

            position: fixed;

            top: 0;
            left: 0;
            bottom: 0;

            display: flex;
            flex-direction: column;

            padding: 20px 16px;

            background: var(--sidebar);

            border-right: 1px solid var(--border);

            backdrop-filter: blur(20px);

            z-index: 1000;

            overflow: hidden;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 8px 8px 22px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--gradient);

            font-size: 20px;
            font-weight: bold;

            box-shadow:
                0 10px 25px rgba(118, 87, 255, 0.25);
        }

        .logo-text strong {
            display: block;

            font-size: 15px;

            margin-bottom: 3px;
        }

        .logo-text span {
            color: var(--muted);

            font-size: 11px;
        }

        .sidebar-menu-scroll {
            flex: 1;
            min-height: 0;

            overflow-y: auto;
            overflow-x: hidden;

            padding-right: 4px;

            scrollbar-width: thin;
            scrollbar-color: #7657ff transparent;

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
            background: linear-gradient(
                180deg,
                #7657ff,
                #4d9cff
            );

            border-radius: 10px;
        }

        .menu-title {
            margin: 18px 10px 9px;

            color: var(--muted);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1.5px;
        }

        .menu-item {
            width: 100%;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 11px 12px;

            margin-bottom: 5px;

            border-radius: 12px;

            color: var(--muted-light);

            font-size: 14px;

            transition: 0.2s ease;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.04);

            color: var(--text);
        }

        .menu-item.active {
            background:
                linear-gradient(
                    135deg,
                    rgba(118, 87, 255, 0.20),
                    rgba(77, 156, 255, 0.10)
                );

            color: #ffffff;

            border: 1px solid rgba(118, 87, 255, 0.20);
        }

        .menu-icon {
            width: 22px;

            text-align: center;

            font-size: 15px;
        }

        .menu-disabled {
            opacity: 0.45;

            cursor: not-allowed;
        }

        /* =========================
           LOGOUT
        ========================== */

        .sidebar-bottom {
            margin-top: 12px;

            padding-top: 12px;

            border-top: 1px solid var(--border);
        }

        .logout-button {
            width: 100%;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 11px 12px;

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 12px;

            background: rgba(255, 255, 255, 0.03);

            color: var(--muted-light);

            cursor: pointer;

            transition: 0.2s ease;
        }

        .logout-button:hover {
            background: rgba(255, 93, 115, 0.08);

            border-color: rgba(255, 93, 115, 0.22);

            color: #ff8091;
        }

        /* =========================
           MAIN
        ========================== */

        .main {
            width: calc(100% - 255px);

            margin-left: 255px;

            padding: 30px;
        }

        .page-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 24px;
        }

        .page-title h1 {
            margin-bottom: 7px;

            font-size: 28px;
        }

        .page-title p {
            color: var(--muted);

            font-size: 14px;
        }

        .back-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 10px 15px;

            border: 1px solid var(--border);

            border-radius: 12px;

            background: rgba(255,255,255,0.03);

            color: var(--muted-light);

            font-size: 13px;

            transition: 0.2s ease;
        }

        .back-button:hover {
            border-color: var(--border-hover);

            background: rgba(118,87,255,0.06);

            color: #ffffff;
        }

        /* =========================
           SESSION INFO
        ========================== */

        .session-card {
            padding: 24px;

            margin-bottom: 20px;

            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            backdrop-filter: blur(20px);
        }

        .session-top {
            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 22px;
        }

        .course-code {
            display: inline-flex;

            padding: 6px 9px;

            margin-bottom: 10px;

            border-radius: 8px;

            background: rgba(118,87,255,0.09);

            border: 1px solid rgba(118,87,255,0.16);

            color: #b9adff;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: .4px;
        }

        .course-name {
            color: #ffffff;

            font-size: 22px;

            font-weight: 700;

            margin-bottom: 7px;
        }

        .course-meta {
            color: var(--muted);

            font-size: 13px;
        }

        .status-badge {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 8px 11px;

            border-radius: 10px;

            font-size: 11px;

            font-weight: 600;

            white-space: nowrap;
        }

        .status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: currentColor;
        }

        .status-active {
            background: rgba(74,222,128,.09);

            border: 1px solid rgba(74,222,128,.16);

            color: #8ef0ae;
        }

        .status-inactive {
            background: rgba(148,163,184,.07);

            border: 1px solid rgba(148,163,184,.12);

            color: #a9b2c5;
        }

        .session-info-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 12px;

            padding-top: 20px;

            border-top: 1px solid var(--border);
        }

        .info-item {
            padding: 13px;

            border-radius: 12px;

            background: rgba(255,255,255,.025);

            border: 1px solid rgba(148,163,184,.08);
        }

        .info-label {
            color: var(--muted);

            font-size: 10px;

            margin-bottom: 6px;
        }

        .info-value {
            color: #ffffff;

            font-size: 13px;

            font-weight: 600;

            word-break: break-word;
        }

        /* =========================
           STATISTICS
        ========================== */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0,1fr));

            gap: 14px;

            margin-bottom: 20px;
        }

        .stat-card {
            padding: 18px;

            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            backdrop-filter: blur(20px);
        }

        .stat-label {
            color: var(--muted);

            font-size: 11px;

            margin-bottom: 8px;
        }

        .stat-value {
            color: #ffffff;

            font-size: 25px;

            font-weight: 700;
        }

        .stat-value.green {
            color: #8ef0ae;
        }

        .stat-value.yellow {
            color: #fde68a;
        }

        .stat-value.red {
            color: #ff8d9b;
        }

        /* =========================
           TABLE CARD
        ========================== */

        .content-card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            backdrop-filter: blur(20px);

            overflow: hidden;
        }

        .toolbar {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding: 20px;

            border-bottom: 1px solid var(--border);
        }

        .toolbar-title {
            font-size: 15px;

            font-weight: 600;
        }

        .toolbar-count {
            margin-top: 4px;

            color: var(--muted);

            font-size: 11px;
        }

        .search-box {
            width: 300px;

            position: relative;
        }

        .search-box input {
            width: 100%;

            padding: 11px 13px 11px 38px;

            background: rgba(7,11,22,.65);

            border: 1px solid var(--border);

            border-radius: 11px;

            outline: none;

            color: #ffffff;

            font-size: 13px;
        }

        .search-box input::placeholder {
            color: #5f687b;
        }

        .search-box input:focus {
            border-color: var(--purple);

            box-shadow:
                0 0 0 3px rgba(118,87,255,.10);
        }

        .search-icon {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            color: var(--muted);

            font-size: 14px;

            pointer-events: none;
        }

        /* =========================
           TABLE
        ========================== */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            min-width: 850px;

            border-collapse: collapse;
        }

        thead th {
            padding: 14px 18px;

            text-align: left;

            color: var(--muted);

            background: rgba(255,255,255,.015);

            border-bottom: 1px solid var(--border);

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: .8px;

            font-weight: 600;
        }

        tbody td {
            padding: 15px 18px;

            border-bottom: 1px solid rgba(148,163,184,.08);

            color: var(--muted-light);

            font-size: 13px;

            vertical-align: middle;
        }

        tbody tr {
            transition: .2s ease;
        }

        tbody tr:hover {
            background: rgba(255,255,255,.025);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .student-name {
            color: #ffffff;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .student-npm {
            color: var(--muted);

            font-size: 11px;
        }

        .scan-time {
            color: #ffffff;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .scan-date {
            color: var(--muted);

            font-size: 11px;
        }

        .status-cell {
            display: inline-flex;

            padding: 6px 9px;

            border-radius: 8px;

            font-size: 11px;

            font-weight: 600;
        }

        .status-hadir {
            background: rgba(74,222,128,.09);

            border: 1px solid rgba(74,222,128,.16);

            color: #8ef0ae;
        }

        .status-terlambat {
            background: rgba(250,204,21,.08);

            border: 1px solid rgba(250,204,21,.15);

            color: #fde68a;
        }

        .status-izin {
            background: rgba(77,156,255,.08);

            border: 1px solid rgba(77,156,255,.15);

            color: #8fc2ff;
        }

        .status-sakit {
            background: rgba(255,93,115,.08);

            border: 1px solid rgba(255,93,115,.15);

            color: #ff9ba8;
        }

        .status-alpha {
            background: rgba(148,163,184,.07);

            border: 1px solid rgba(148,163,184,.12);

            color: #a9b2c5;
        }

        .empty-cell {
            text-align: center;

            padding: 60px 20px !important;

            color: var(--muted) !important;
        }

        .search-empty {
            display: none;

            padding: 50px 20px;

            text-align: center;

            color: var(--muted);
        }

        .search-empty strong {
            display: block;

            color: #ffffff;

            font-size: 14px;

            margin-bottom: 7px;
        }

        .search-empty span {
            font-size: 12px;
        }

        /* =========================
           MOBILE
        ========================== */

        .mobile-header {
            display: none;
        }

        .overlay {
            display: none;
        }

        @media (max-width: 1050px) {

            .session-info-grid {
                grid-template-columns:
                    repeat(2, minmax(0,1fr));
            }

            .stats-grid {
                grid-template-columns:
                    repeat(2, minmax(0,1fr));
            }
        }

        @media (max-width: 900px) {

            .sidebar {
                transform: translateX(-100%);

                transition: transform .25s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                width: 100%;

                margin-left: 0;

                padding: 75px 20px 20px;
            }

            .mobile-header {
                display: flex;

                position: fixed;

                top: 0;
                left: 0;
                right: 0;

                height: 60px;

                z-index: 900;

                align-items: center;

                justify-content: space-between;

                padding: 0 18px;

                background: rgba(7,11,22,.90);

                border-bottom: 1px solid var(--border);

                backdrop-filter: blur(15px);
            }

            .mobile-title {
                font-size: 14px;

                font-weight: 600;
            }

            .mobile-menu-button {
                width: 40px;
                height: 40px;

                border: 1px solid var(--border);

                border-radius: 10px;

                background: rgba(255,255,255,.04);

                color: #ffffff;

                font-size: 19px;

                cursor: pointer;
            }

            .overlay.show {
                display: block;

                position: fixed;

                inset: 0;

                z-index: 950;

                background: rgba(0,0,0,.55);
            }

            .toolbar {
                align-items: stretch;

                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .session-top {
                align-items: flex-start;

                flex-direction: column;
            }
        }

        @media (max-width: 650px) {

            .main {
                padding-left: 14px;

                padding-right: 14px;
            }

            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .page-title h1 {
                font-size: 24px;
            }

            .back-button {
                width: 100%;
            }

            .session-card {
                padding: 20px;
            }

            .session-info-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .course-name {
                font-size: 19px;
            }
        }
    </style>
</head>

<body>

<div class="dashboard-layout">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <div class="sidebar-logo">

            <div class="logo-icon">
                ✦
            </div>

            <div class="logo-text">

                <strong>
                    Absensi QR
                </strong>

                <span>
                    Panel Administrator
                </span>

            </div>

        </div>


        <div class="sidebar-menu-scroll">

            <div class="menu-title">
                Menu Utama
            </div>


            <a
                href="{{ route('admin.dashboard') }}"
                class="menu-item"
            >
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>


            <a
                href="{{ route('admin.mahasiswa') }}"
                class="menu-item"
            >
                <span class="menu-icon">◉</span>
                Mahasiswa
            </a>


            <a
                href="{{ route('admin.dosen') }}"
                class="menu-item"
            >
                <span class="menu-icon">◌</span>
                Dosen
            </a>


            <a
                href="{{ route('admin.mata-kuliah') }}"
                class="menu-item"
            >
                <span class="menu-icon">▣</span>
                Mata Kuliah
            </a>


            <a
                href="{{ route('admin.kelas') }}"
                class="menu-item"
            >
                <span class="menu-icon">▤</span>
                Kelas
            </a>


            <a
                href="{{ route('admin.jadwal') }}"
                class="menu-item"
            >
                <span class="menu-icon">◷</span>
                Jadwal
            </a>


            <a
                href="{{ route('admin.sesi-absensi') }}"
                class="menu-item active"
            >
                <span class="menu-icon">▥</span>
                Sesi Absensi
            </a>


            <a
                href="{{ route('admin.kehadiran') }}"
                class="menu-item"
            >
                <span class="menu-icon">✓</span>
                Kehadiran
            </a>


            <a
                href="{{ route('admin.pengajuan-absensi') }}"
                class="menu-item"
            >
                <span class="menu-icon">▨</span>
                Pengajuan Absensi
            </a>


            <a
                href="{{ route('admin.laporan') }}"
                class="menu-item"
            >
                <span class="menu-icon">◫</span>
                Laporan
            </a>

        </div>


        <div class="sidebar-bottom">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    <span class="menu-icon">↪</span>
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- =========================
         MOBILE HEADER
    ========================== -->

    <div class="mobile-header">

        <div class="mobile-title">
            Detail Sesi Absensi
        </div>

        <button
            type="button"
            class="mobile-menu-button"
            id="mobileMenuButton"
        >
            ☰
        </button>

    </div>


    <div
        class="overlay"
        id="overlay"
    ></div>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">

        <!-- HEADER -->

        <div class="page-header">

            <div class="page-title">

                <h1>
                    Detail Sesi Absensi
                </h1>

                <p>
                    Lihat informasi sesi dan mahasiswa yang sudah tercatat.
                </p>

            </div>


            <a
                href="{{ route('admin.sesi-absensi') }}"
                class="back-button"
            >
                ← Kembali
            </a>

        </div>


        <!-- =========================
             SESSION CARD
        ========================== -->

        <div class="session-card">

            <div class="session-top">

                <div>

                    <span class="course-code">
                        {{ $sesi->jadwal->mataKuliah->kode ?? '-' }}
                    </span>

                    <div class="course-name">
                        {{ $sesi->jadwal->mataKuliah->nama ?? '-' }}
                    </div>

                    <div class="course-meta">

                        Dosen:
                        {{ $sesi->jadwal->dosen->nama ?? '-' }}

                        &nbsp; • &nbsp;

                        Kelas:
                        {{ $sesi->jadwal->kelas->nama ?? '-' }}

                    </div>

                </div>


                @if ($sesi->aktif)

                    <span class="status-badge status-active">

                        <span class="status-dot"></span>

                        Sesi Aktif

                    </span>

                @else

                    <span class="status-badge status-inactive">

                        <span class="status-dot"></span>

                        Tidak Aktif

                    </span>

                @endif

            </div>


            <div class="session-info-grid">

                <div class="info-item">

                    <div class="info-label">
                        Tanggal
                    </div>

                    <div class="info-value">

                        {{ $sesi->tanggal
                            ? $sesi->tanggal->format('d M Y')
                            : '-'
                        }}

                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Hari
                    </div>

                    <div class="info-value">

                        {{ $sesi->tanggal
                            ? $sesi->tanggal->locale('id')->translatedFormat('l')
                            : '-'
                        }}

                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Waktu Sesi
                    </div>

                    <div class="info-value">

                        {{ \Carbon\Carbon::parse($sesi->jam_mulai)->format('H:i') }}

                        -

                        {{ \Carbon\Carbon::parse($sesi->jam_selesai)->format('H:i') }}

                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Ruangan
                    </div>

                    <div class="info-value">
                        {{ $sesi->jadwal->ruangan ?: '-' }}
                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             CALCULATE STATISTICS
        ========================== -->

        @php

            $totalAbsensi =
                $sesi->absensi->count();

            $totalHadir =
                $sesi->absensi
                    ->where('status', 'hadir')
                    ->count();

            $totalTerlambat =
                $sesi->absensi
                    ->where('status', 'terlambat')
                    ->count();

            $totalIzin =
                $sesi->absensi
                    ->where('status', 'izin')
                    ->count();

            $totalSakit =
                $sesi->absensi
                    ->where('status', 'sakit')
                    ->count();

        @endphp


        <!-- =========================
             STATISTICS
        ========================== -->

        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Total Tercatat
                </div>

                <div class="stat-value">
                    {{ $totalAbsensi }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Hadir
                </div>

                <div class="stat-value green">
                    {{ $totalHadir }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Terlambat
                </div>

                <div class="stat-value yellow">
                    {{ $totalTerlambat }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Izin / Sakit
                </div>

                <div class="stat-value red">
                    {{ $totalIzin + $totalSakit }}
                </div>

            </div>

        </div>


        <!-- =========================
             TABLE
        ========================== -->

        <div class="content-card">

            <div class="toolbar">

                <div>

                    <div class="toolbar-title">
                        Daftar Kehadiran
                    </div>

                    <div class="toolbar-count">
                        {{ $totalAbsensi }} mahasiswa tercatat
                    </div>

                </div>


                <div class="search-box">

                    <span class="search-icon">
                        ⌕
                    </span>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari nama atau NPM..."
                    >

                </div>

            </div>


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
                                Waktu Scan
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

                        @forelse ($sesi->absensi as $absensi)

                            <tr
                                class="attendance-row"
                                data-search="{{ strtolower(
                                    ($absensi->mahasiswa->nama ?? '') . ' ' .
                                    ($absensi->mahasiswa->npm ?? '')
                                ) }}"
                            >

                                <!-- MAHASISWA -->

                                <td>

                                    <div class="student-name">

                                        {{ $absensi->mahasiswa->nama ?? '-' }}

                                    </div>

                                    <div class="student-npm">

                                        Mahasiswa

                                    </div>

                                </td>


                                <!-- NPM -->

                                <td>

                                    {{ $absensi->mahasiswa->npm ?? '-' }}

                                </td>


                                <!-- WAKTU SCAN -->

                                <td>

                                    @if ($absensi->waktu_scan)

                                        <div class="scan-time">

                                            {{ $absensi->waktu_scan->format('H:i:s') }}

                                        </div>

                                        <div class="scan-date">

                                            {{ $absensi->waktu_scan->format('d M Y') }}

                                        </div>

                                    @else

                                        -

                                    @endif

                                </td>


                                <!-- STATUS -->

                                <td>

                                    @php
                                        $statusClass = match ($absensi->status) {
                                            'hadir' => 'status-hadir',
                                            'terlambat' => 'status-terlambat',
                                            'izin' => 'status-izin',
                                            'sakit' => 'status-sakit',
                                            default => 'status-alpha',
                                        };
                                    @endphp


                                    <span
                                        class="status-cell {{ $statusClass }}"
                                    >
                                        {{ ucfirst($absensi->status) }}
                                    </span>

                                </td>


                                <!-- KETERANGAN -->

                                <td>

                                    {{ $absensi->keterangan ?: '-' }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="empty-cell"
                                >
                                    Belum ada mahasiswa yang tercatat pada sesi ini.
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
                        Mahasiswa tidak ditemukan
                    </strong>

                    <span>
                        Coba cari menggunakan nama atau NPM yang berbeda.
                    </span>

                </div>

            </div>

        </div>

    </main>

</div>


<script>

    /* =========================
       MOBILE SIDEBAR
    ========================== */

    const sidebar =
        document.getElementById('sidebar');

    const mobileMenuButton =
        document.getElementById('mobileMenuButton');

    const overlay =
        document.getElementById('overlay');


    function openSidebar() {

        sidebar.classList.add('open');

        overlay.classList.add('show');

    }


    function closeSidebar() {

        sidebar.classList.remove('open');

        overlay.classList.remove('show');

    }


    if (mobileMenuButton) {

        mobileMenuButton.addEventListener(
            'click',
            openSidebar
        );

    }


    if (overlay) {

        overlay.addEventListener(
            'click',
            closeSidebar
        );

    }


    /* =========================
       SEARCH
    ========================== */

    const searchInput =
        document.getElementById('searchInput');

    const rows =
        document.querySelectorAll('.attendance-row');

    const searchEmpty =
        document.getElementById('searchEmpty');


    if (searchInput) {

        searchInput.addEventListener(
            'input',
            function () {

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();

                let visibleRows = 0;


                rows.forEach(function (row) {

                    const text =
                        row.dataset.search
                            .toLowerCase();


                    if (text.includes(keyword)) {

                        row.style.display = '';

                        visibleRows++;

                    } else {

                        row.style.display = 'none';

                    }

                });


                if (
                    keyword !== '' &&
                    visibleRows === 0 &&
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

</script>

</body>
</html>