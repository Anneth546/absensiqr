<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Absensi | Absensi QR</title>

    <style>

        /* =====================================================
           RESET
        ===================================================== */

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
        }

        a {
            text-decoration: none;
            color: inherit;
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


        /* =====================================================
           LOGO
        ===================================================== */

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

            color: white;

            font-size: 19px;
            font-weight: 800;
        }

        .logo-title {
            font-size: 17px;
            font-weight: 700;
            line-height: 1.2;
        }

        .logo-subtitle {
            margin-top: 4px;

            color: #8b9aba;
            font-size: 11px;
        }


        /* =====================================================
           MENU AREA
        ===================================================== */

        .sidebar-menu {
            flex: 1;
            min-height: 0;

            overflow-y: auto;
            overscroll-behavior: contain;
            scrollbar-width: thin;
            scrollbar-color: #656c7a transparent;

            padding: 24px 18px 15px;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: #656c7a;
            border-radius: 10px;
        }


        /* =====================================================
           MENU TITLE
        ===================================================== */

        .menu-title {
            padding-left: 14px;

            margin-bottom: 11px;

            color: #66748f;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 1.4px;
            text-transform: uppercase;
        }


        /* =====================================================
           MENU ITEM
        ===================================================== */

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
        ===================================================== */

        .sidebar-bottom {
            flex-shrink: 0;

            padding: 17px;

            border-top: 1px solid #20283a;
        }


        /* =====================================================
           USER CARD
        ===================================================== */

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


        /* =====================================================
           LOGOUT
        ===================================================== */

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
           MOBILE OVERLAY
        ===================================================== */

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
        ===================================================== */

        .main {
            margin-left: 240px;

            width: calc(100% - 240px);

            min-height: 100vh;

            padding: 30px 34px 45px;
        }


        /* =====================================================
           MOBILE HEADER
        ===================================================== */

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

            transition: 0.2s;
        }

        .hamburger-button:hover {
            background: #1d2740;
        }

        .mobile-logo {
            font-size: 17px;
            font-weight: 700;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .page-header {
            margin-bottom: 32px;
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
           STAT CARD
        ===================================================== */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 16px;

            margin-bottom: 24px;
        }

        .stat-card {
            min-height: 115px;

            padding: 22px;

            background: #111827;

            border: 1px solid #202a3d;

            border-radius: 17px;
        }

        .stat-label {
            display: block;

            margin-bottom: 15px;

            color: #8ea0bd;

            font-size: 14px;
        }

        .stat-value {
            color: white;

            font-size: 29px;

            font-weight: 700;
        }


        /* =====================================================
           HISTORY CARD
        ===================================================== */

        .history-card {
            background: #111827;

            border: 1px solid #202a3d;

            border-radius: 17px;

            overflow: hidden;
        }

        .history-header {
            height: 62px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 25px;

            border-bottom: 1px solid #202a3d;
        }

        .history-title {
            font-size: 18px;

            font-weight: 700;
        }

        .history-count {
            color: #8da5cb;

            font-size: 13px;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-state {
            min-height: 350px;

            display: flex;
            flex-direction: column;

            align-items: center;
            justify-content: center;

            padding: 40px 20px;

            text-align: center;
        }

        .empty-icon {
            width: 72px;
            height: 72px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 18px;

            background: #181c46;

            border-radius: 17px;

            font-size: 34px;
        }

        .empty-state h3 {
            margin-bottom: 8px;

            font-size: 20px;
        }

        .empty-state p {
            max-width: 450px;

            color: #8494b1;

            font-size: 14px;

            line-height: 1.6;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            overflow-x: auto;
        }

        .history-table {
            width: 100%;

            border-collapse: collapse;
        }

        .history-table th {
            padding: 16px 20px;

            color: #8292ae;

            font-size: 12px;
            font-weight: 600;

            text-align: left;

            border-bottom: 1px solid #202a3d;
        }

        .history-table td {
            padding: 17px 20px;

            color: #dbe4f3;

            font-size: 13px;

            border-bottom: 1px solid #202a3d;
        }

        .history-table tr:last-child td {
            border-bottom: none;
        }

        .history-table tbody tr:hover {
            background: #151d2d;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status {
            display: inline-flex;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;
        }

        .status-hadir {
            background: #123524;
            color: #62d995;
        }

        .status-terlambat {
            background: #3b2e13;
            color: #f5c86b;
        }

        .status-izin {
            background: #172d45;
            color: #76b8ff;
        }

        .status-sakit {
            background: #3a1d25;
            color: #ff879c;
        }

        .status-alpha {
            background: #3a2020;
            color: #ff8b8b;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1000px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;

                width: calc(100% - 220px);

                padding: 28px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 700px) {

            /* SIDEBAR */

            .sidebar {
                display: flex;

                width: 270px;

                transform: translateX(-100%);

                box-shadow: 10px 0 35px rgba(0, 0, 0, 0.35);
            }

            .sidebar.open {
                transform: translateX(0);
            }


            /* MAIN */

            .main {
                margin-left: 0;

                width: 100%;

                padding: 20px;
            }


            /* MOBILE HEADER */

            .mobile-header {
                height: 58px;

                display: flex;

                align-items: center;

                gap: 13px;

                margin: -20px -20px 25px;

                padding: 0 20px;

                background: #0c1120;

                border-bottom: 1px solid #20283a;
            }


            /* HAMBURGER */

            .hamburger-button {
                flex-shrink: 0;
            }


            /* TITLE */

            .mobile-logo {
                font-size: 16px;
            }

            .page-title h1 {
                font-size: 29px;
            }

            .page-title p {
                font-size: 14px;
            }


            /* STATS */

            .stats-grid {
                grid-template-columns: 1fr;

                gap: 12px;
            }

            .stat-card {
                min-height: 100px;

                padding: 19px;
            }

            .stat-label {
                margin-bottom: 10px;

                font-size: 13px;
            }

            .stat-value {
                font-size: 26px;
            }


            /* HISTORY */

            .history-header {
                height: 58px;

                padding: 0 18px;
            }

            .history-title {
                font-size: 16px;
            }

            .history-count {
                font-size: 12px;
            }


            /* TABLE */

            .history-table {
                min-width: 700px;
            }

            .history-table th {
                padding: 14px 16px;
            }

            .history-table td {
                padding: 15px 16px;
            }

        }


        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 400px) {

            .sidebar {
                width: 250px;
            }

            .main {
                padding: 16px;
            }

            .mobile-header {
                margin: -16px -16px 22px;

                padding: 0 16px;
            }

            .page-title h1 {
                font-size: 25px;
            }

            .page-title p {
                font-size: 13px;
            }

        }

    </style>
</head>


<body>

<div class="dashboard-layout">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="sidebar" id="sidebar">


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


                {{-- DASHBOARD --}}

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


                {{-- SCAN --}}

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


                {{-- KARTU QR --}}

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


                {{-- RIWAYAT --}}

                <a
                    href="{{ url('/mahasiswa/riwayat') }}"
                    class="nav-item active"
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


            {{-- LAINNYA --}}

            <div class="menu-title">
                Lainnya
            </div>


            <nav class="nav-menu">


                {{-- IZIN / SAKIT --}}

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


                {{-- PROFIL --}}

                <a
                    href="{{ route('mahasiswa.profil') }}"
                    class="nav-item"
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


        {{-- =================================================
             USER + LOGOUT
        ================================================== --}}

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


            {{-- LOGOUT --}}

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
         OVERLAY MOBILE
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


            {{-- HAMBURGER --}}

            <button
                type="button"
                class="hamburger-button"
                onclick="toggleSidebar()"
                aria-label="Buka menu"
            >
                ☰
            </button>


            <div class="mobile-logo">
                ABSENSI QR
            </div>


        </div>


        {{-- =================================================
             HEADER
        ================================================== --}}

        <div class="page-header">

            <div class="page-title">

                <h1>
                    Riwayat Absensi
                </h1>

                <p>
                    Lihat seluruh aktivitas kehadiran kamu.
                </p>

            </div>

        </div>


        {{-- =================================================
             STATISTIK
        ================================================== --}}

        <div class="stats-grid">


            {{-- TOTAL --}}

            <div class="stat-card">

                <span class="stat-label">
                    Total Absensi
                </span>

                <span class="stat-value">
                    {{ $totalAbsensi ?? 0 }}
                </span>

            </div>


            {{-- HADIR --}}

            <div class="stat-card">

                <span class="stat-label">
                    Hadir
                </span>

                <span class="stat-value">
                    {{ $hadir ?? 0 }}
                </span>

            </div>


            {{-- TERLAMBAT --}}

            <div class="stat-card">

                <span class="stat-label">
                    Terlambat
                </span>

                <span class="stat-value">
                    {{ $terlambat ?? 0 }}
                </span>

            </div>


        </div>


        {{-- =================================================
             HISTORY
        ================================================== --}}

        <div class="history-card">


            <div class="history-header">

                <h2 class="history-title">
                    Daftar Riwayat
                </h2>

                <span class="history-count">
                    {{ $totalAbsensi ?? 0 }} data
                </span>

            </div>


            @if(($riwayat ?? collect())->count() === 0)


                {{-- =================================================
                     BELUM ADA DATA
                ================================================== --}}

                <div class="empty-state">

                    <div class="empty-icon">
                        📋
                    </div>

                    <h3>
                        Belum Ada Riwayat
                    </h3>

                    <p>
                        Riwayat absensi kamu akan muncul setelah
                        melakukan scan QR.
                    </p>

                </div>


            @else


                {{-- =================================================
                     ADA DATA
                ================================================== --}}

                <div class="table-wrapper">

                    <table class="history-table">

                        <thead>

                            <tr>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Mata Kuliah
                                </th>

                                <th>
                                    Dosen
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

                            @foreach($riwayat as $item)

                                <tr>

                                    <td>
                                        {{ $item->sesiAbsensi->tanggal->format('d/m/Y') }}
                                    </td>

                                    <td>
                                        {{ $item->sesiAbsensi->jadwal->mataKuliah->nama }}
                                    </td>

                                    <td>
                                        {{ $item->sesiAbsensi->jadwal->dosen->nama }}
                                    </td>

                                    <td>
                                        {{ $item->waktu_scan?->format('H:i') ?? '-' }}
                                    </td>

                                    <td>

                                        <span
                                            class="status status-{{ $item->status }}"
                                        >
                                            {{ ucfirst($item->status) }}
                                        </span>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @endif


        </div>


    </main>

</div>


{{-- =====================================================
     JAVASCRIPT HAMBURGER
====================================================== --}}

<script>

    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');


    /* =====================================================
       BUKA / TUTUP SIDEBAR
    ===================================================== */

    function toggleSidebar() {

        sidebar.classList.toggle('open');

        sidebarOverlay.classList.toggle('show');

    }


    /* =====================================================
       TUTUP SIDEBAR
    ===================================================== */

    function closeSidebar() {

        sidebar.classList.remove('open');

        sidebarOverlay.classList.remove('show');

    }


    /* =====================================================
       TEKAN ESC UNTUK MENUTUP
    ===================================================== */

    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            closeSidebar();

        }

    });


    /* =====================================================
       KETIKA KEMBALI KE DESKTOP
    ===================================================== */

    window.addEventListener('resize', function() {

        if (window.innerWidth > 700) {

            closeSidebar();

        }

    });

</script>


</body>
</html>