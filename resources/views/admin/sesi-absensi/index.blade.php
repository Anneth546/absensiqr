<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sesi Absensi - Admin</title>

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
           SIDEBAR BOTTOM
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

            justify-content: space-between;

            align-items: center;

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

            line-height: 1.5;
        }

        /* =========================
           ALERT
        ========================== */

        .alert-success {
            margin-bottom: 20px;

            padding: 13px 15px;

            border-radius: 12px;

            background: rgba(74, 222, 128, 0.08);

            border: 1px solid rgba(74, 222, 128, 0.18);

            color: #8ef0ae;

            font-size: 13px;
        }

        /* =========================
           STATS
        ========================== */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 15px;

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

            font-size: 24px;

            font-weight: 700;
        }

        .stat-value.green {
            color: #8ef0ae;
        }

        .stat-value.blue {
            color: #8fc2ff;
        }

        /* =========================
           CONTENT CARD
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

            justify-content: space-between;

            align-items: center;

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
            width: 320px;

            position: relative;
        }

        .search-box input {
            width: 100%;

            padding: 11px 13px 11px 38px;

            background: rgba(7, 11, 22, 0.65);

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
                0 0 0 3px rgba(118, 87, 255, 0.10);
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

            min-width: 1100px;

            border-collapse: collapse;
        }

        thead th {
            padding: 14px 18px;

            text-align: left;

            color: var(--muted);

            background: rgba(255, 255, 255, 0.015);

            border-bottom: 1px solid var(--border);

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 0.8px;

            font-weight: 600;
        }

        tbody td {
            padding: 16px 18px;

            border-bottom: 1px solid rgba(148, 163, 184, 0.08);

            color: var(--muted-light);

            font-size: 13px;

            vertical-align: middle;
        }

        tbody tr {
            transition: 0.2s ease;
        }

        tbody tr:hover {
            background: rgba(255, 255, 255, 0.025);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           COURSE
        ========================== */

        .course-name {
            color: #ffffff;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 4px;
        }

        .course-code {
            display: inline-flex;

            padding: 5px 8px;

            border-radius: 8px;

            background: rgba(118, 87, 255, 0.08);

            border: 1px solid rgba(118, 87, 255, 0.15);

            color: #b9adff;

            font-size: 10px;

            font-weight: 700;
        }

        /* =========================
           DOSEN
        ========================== */

        .dosen-name {
            color: #ffffff;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .dosen-nidn {
            color: var(--muted);

            font-size: 11px;
        }

        /* =========================
           KELAS
        ========================== */

        .class-badge {
            display: inline-flex;

            padding: 6px 9px;

            border-radius: 8px;

            background: rgba(77, 156, 255, 0.08);

            border: 1px solid rgba(77, 156, 255, 0.15);

            color: #8fc2ff;

            font-size: 11px;

            font-weight: 600;
        }

        /* =========================
           DATE
        ========================== */

        .date-main {
            color: #ffffff;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .date-day {
            color: var(--muted);

            font-size: 11px;
        }

        /* =========================
           TIME
        ========================== */

        .time-main {
            color: #ffffff;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .time-sub {
            color: var(--muted);

            font-size: 11px;
        }

        /* =========================
           STATUS
        ========================== */

        .status-badge {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 9px;

            border-radius: 8px;

            font-size: 11px;

            font-weight: 600;
        }

        .status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: currentColor;
        }

        .status-active {
            background: rgba(74, 222, 128, 0.09);

            border: 1px solid rgba(74, 222, 128, 0.16);

            color: #8ef0ae;
        }

        .status-inactive {
            background: rgba(148, 163, 184, 0.07);

            border: 1px solid rgba(148, 163, 184, 0.12);

            color: #a9b2c5;
        }

        /* =========================
           ATTENDANCE
        ========================== */

        .attendance-info {
            display: flex;

            flex-direction: column;

            gap: 3px;
        }

        .attendance-total {
            color: #ffffff;

            font-size: 12px;

            font-weight: 600;
        }

        .attendance-label {
            color: var(--muted);

            font-size: 10px;
        }

        /* =========================
           ACTION
        ========================== */

        .detail-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 7px 10px;

            border-radius: 8px;

            background: rgba(118, 87, 255, 0.09);

            border: 1px solid rgba(118, 87, 255, 0.16);

            color: #b9adff;

            font-size: 11px;

            font-weight: 600;

            transition: 0.2s ease;
        }

        .detail-button:hover {
            background: rgba(118, 87, 255, 0.18);

            border-color: rgba(118, 87, 255, 0.30);
        }

        /* =========================
           EMPTY
        ========================== */

        .empty-cell {
            padding: 60px 20px !important;

            text-align: center;

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

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {

            .sidebar {
                transform: translateX(-100%);

                transition: transform 0.25s ease;
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

                background: rgba(7, 11, 22, 0.90);

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

                background: rgba(255, 255, 255, 0.04);

                color: #ffffff;

                font-size: 19px;

                cursor: pointer;
            }

            .overlay.show {
                display: block;

                position: fixed;

                inset: 0;

                z-index: 950;

                background: rgba(0, 0, 0, 0.55);
            }

            .toolbar {
                align-items: stretch;

                flex-direction: column;
            }

            .search-box {
                width: 100%;
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

            .stats-grid {
                grid-template-columns: 1fr;
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
            Sesi Absensi
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

        <div class="page-header">

            <div class="page-title">

                <h1>
                    Sesi Absensi
                </h1>

                <p>
                    Pantau seluruh sesi absensi yang dibuat oleh dosen.
                </p>

            </div>

        </div>


        @if (session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        <!-- =========================
             STATISTICS
        ========================== -->

        @php

            $totalSesi =
                $sesiAbsensi->count();

            $totalAktif =
                $sesiAbsensi
                    ->where('aktif', true)
                    ->count();

            $totalAbsensi =
                $sesiAbsensi
                    ->sum(function ($sesi) {
                        return $sesi->absensi->count();
                    });

        @endphp


        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Total Sesi
                </div>

                <div class="stat-value">
                    {{ $totalSesi }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Sesi Aktif
                </div>

                <div class="stat-value green">
                    {{ $totalAktif }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Total Scan Absensi
                </div>

                <div class="stat-value blue">
                    {{ $totalAbsensi }}
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
                        Semua Sesi Absensi
                    </div>

                    <div class="toolbar-count">
                        {{ $totalSesi }} sesi terdaftar
                    </div>

                </div>


                <div class="search-box">

                    <span class="search-icon">
                        ⌕
                    </span>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari mata kuliah, dosen, kelas..."
                    >

                </div>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Mata Kuliah
                            </th>

                            <th>
                                Dosen
                            </th>

                            <th>
                                Kelas
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Waktu
                            </th>

                            <th>
                                Kehadiran
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($sesiAbsensi as $item)

                            <tr
                                class="session-row"
                                data-search="{{ strtolower(
                                    ($item->jadwal->mataKuliah->kode ?? '') . ' ' .
                                    ($item->jadwal->mataKuliah->nama ?? '') . ' ' .
                                    ($item->jadwal->dosen->nama ?? '') . ' ' .
                                    ($item->jadwal->dosen->nidn ?? '') . ' ' .
                                    ($item->jadwal->kelas->nama ?? '')
                                ) }}"
                            >

                                <!-- MATA KULIAH -->

                                <td>

                                    <div class="course-name">
                                        {{ $item->jadwal->mataKuliah->nama ?? '-' }}
                                    </div>

                                    <span class="course-code">
                                        {{ $item->jadwal->mataKuliah->kode ?? '-' }}
                                    </span>

                                </td>


                                <!-- DOSEN -->

                                <td>

                                    <div class="dosen-name">
                                        {{ $item->jadwal->dosen->nama ?? '-' }}
                                    </div>

                                    <div class="dosen-nidn">

                                        NIDN:
                                        {{ $item->jadwal->dosen->nidn ?? '-' }}

                                    </div>

                                </td>


                                <!-- KELAS -->

                                <td>

                                    <span class="class-badge">
                                        {{ $item->jadwal->kelas->nama ?? '-' }}
                                    </span>

                                </td>


                                <!-- TANGGAL -->

                                <td>

                                    <div class="date-main">

                                        {{ $item->tanggal ? $item->tanggal->format('d M Y') : '-' }}

                                    </div>

                                    <div class="date-day">

                                        {{ $item->tanggal ? $item->tanggal->locale('id')->translatedFormat('l') : '-' }}

                                    </div>

                                </td>


                                <!-- WAKTU -->

                                <td>

                                    <div class="time-main">

                                        {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}

                                        -

                                        {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}

                                    </div>

                                    <div class="time-sub">
                                        Jam sesi
                                    </div>

                                </td>


                                <!-- KEHADIRAN -->

                                <td>

                                    <div class="attendance-info">

                                        <div class="attendance-total">
                                            {{ $item->absensi->count() }} mahasiswa
                                        </div>

                                        <div class="attendance-label">
                                            sudah tercatat
                                        </div>

                                    </div>

                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if ($item->aktif)

                                        <span class="status-badge status-active">

                                            <span class="status-dot"></span>

                                            Aktif

                                        </span>

                                    @else

                                        <span class="status-badge status-inactive">

                                            <span class="status-dot"></span>

                                            Tidak Aktif

                                        </span>

                                    @endif

                                </td>


                                <!-- DETAIL -->

                                <td>

                                    <a
                                        href="{{ route('admin.sesi-absensi.show', $item->id) }}"
                                        class="detail-button"
                                    >
                                        Detail
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="empty-cell"
                                >
                                    Belum ada sesi absensi.

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
                        Sesi tidak ditemukan
                    </strong>

                    <span>
                        Coba gunakan nama mata kuliah, dosen, NIDN, atau kelas.
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
        document.querySelectorAll('.session-row');

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