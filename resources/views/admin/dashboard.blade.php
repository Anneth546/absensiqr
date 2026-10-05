<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard | Absensi QR</title>


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

                #070b16;

            color:
                #f8fafc;

            overflow-x:
                hidden;
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

            border-radius:
                20px;
        }


        /* =====================================================
           LAYOUT
        ===================================================== */

        .dashboard-layout {

            min-height:
                100vh;

            display:
                flex;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position:
                fixed;

            top:
                0;

            left:
                0;

            width:
                255px;

            height:
                100vh;

            padding:
                28px 18px 20px;

            display:
                flex;

            flex-direction:
                column;

            background:

                linear-gradient(
                    180deg,
                    rgba(13, 17, 35, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            z-index:
                1000;

            overflow:
                hidden;

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo {

            display:
                flex;

            align-items:
                center;

            gap:
                11px;

            padding:
                5px 10px;

            margin-bottom:
                20px;

            flex-shrink:
                0;
        }


        .logo-icon {

            width:
                42px;

            height:
                42px;

            border-radius:
                12px;

            background:
                var(--gradient);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                16px;

            font-weight:
                900;

            color:
                #fff;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, 0.35);

            flex-shrink:
                0;
        }


        .logo-text {

            font-size:
                18px;

            font-weight:
                900;

            letter-spacing:
                -0.4px;

            color:
                #fff;
        }


        .logo-text span {

            background:
                linear-gradient(
                    90deg,
                    #927cff,
                    #4d9cff
                );

            -webkit-background-clip:
                text;

            background-clip:
                text;

            color:
                transparent;
        }


        /* =====================================================
           SIDEBAR SCROLL AREA
        ===================================================== */

        .sidebar-menu-scroll {

            flex:
                1;

            min-height:
                0;

            overflow-y:
                auto;

            overflow-x:
                hidden;

            padding-right:
                4px;

            scrollbar-width:
                thin;

            scrollbar-color:
                #7657ff
                transparent;

            -webkit-overflow-scrolling:
                touch;

            overscroll-behavior:
                contain;
        }


        .sidebar-menu-scroll::-webkit-scrollbar {
            width:
                5px;
        }


        .sidebar-menu-scroll::-webkit-scrollbar-track {
            background:
                transparent;
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

            display:
                flex;

            flex-direction:
                column;

            gap:
                6px;

            padding-bottom:
                10px;
        }


        .menu-label {

            font-size:
                10px;

            font-weight:
                800;

            letter-spacing:
                1.4px;

            text-transform:
                uppercase;

            color:
                #5f6980;

            padding:
                0 13px;

            margin-bottom:
                9px;

            margin-top:
                3px;
        }


        .menu a {

            position:
                relative;

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            min-height:
                45px;

            padding:
                11px 13px;

            color:
                #8993a8;

            text-decoration:
                none;

            border-radius:
                11px;

            font-size:
                12px;

            font-weight:
                700;

            transition:
                all 0.25s ease;
        }


        .menu a:hover {

            background:
                rgba(118, 87, 255, 0.09);

            color:
                #fff;

            transform:
                translateX(3px);
        }


        .menu a.active {

            color:
                #fff;

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

            content:
                "";

            position:
                absolute;

            left:
                0;

            top:
                9px;

            bottom:
                9px;

            width:
                3px;

            border-radius:
                10px;

            background:
                linear-gradient(
                    180deg,
                    #7657ff,
                    #4d9cff
                );

            box-shadow:
                0 0 12px
                rgba(118, 87, 255, 0.8);
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
                15px;
        }


        .menu-disabled {

            opacity:
                0.45;

            cursor:
                default;
        }


        .menu-disabled:hover {

            background:
                transparent !important;

            transform:
                none !important;
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout {

            margin-top:
                12px;

            padding-top:
                18px;

            border-top:
                1px solid var(--border);

            flex-shrink:
                0;
        }


        .logout form {
            width:
                100%;
        }


        .logout button {

            width:
                100%;

            min-height:
                45px;

            border:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.025);

            color:
                #a7afc0;

            padding:
                11px;

            border-radius:
                11px;

            font-size:
                12px;

            font-weight:
                700;

            cursor:
                pointer;

            transition:
                all 0.25s ease;
        }


        .logout button:hover {

            color:
                #fff;

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

            margin-left:
                255px;

            min-height:
                100vh;

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
                rgba(118, 87, 255, 0.07);

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
                26px;
        }


        .breadcrumb {

            color:
                var(--muted);

            font-size:
                13px;

            font-weight:
                600;
        }


        .breadcrumb strong {

            color:
                #fff;

            font-weight:
                800;
        }


        .top-profile {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            padding:
                7px 11px;

            border:
                1px solid var(--border);

            border-radius:
                12px;

            background:
                rgba(255, 255, 255, 0.025);
        }


        .top-avatar {

            width:
                30px;

            height:
                30px;

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
                12px;

            font-weight:
                900;
        }


        .top-profile span {

            font-size:
                12px;

            font-weight:
                700;

            color:
                #dce2ef;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            position:
                relative;

            overflow:
                hidden;

            background:
                linear-gradient(
                    115deg,
                    rgba(42, 32, 93, 0.9),
                    rgba(22, 34, 71, 0.78)
                );

            border:
                1px solid
                rgba(124, 92, 255, 0.2);

            border-radius:
                20px;

            padding:
                30px 32px;

            margin-bottom:
                22px;

            box-shadow:
                0 20px 55px
                rgba(0, 0, 0, 0.22);
        }


        .page-header::after {

            content:
                "";

            position:
                absolute;

            width:
                260px;

            height:
                260px;

            border-radius:
                50%;

            background:
                rgba(77, 156, 255, 0.12);

            filter:
                blur(45px);

            right:
                -80px;

            top:
                -100px;

            pointer-events:
                none;
        }


        .page-header-content {

            position:
                relative;

            z-index:
                2;
        }


        .page-header h1 {

            font-size:
                29px;

            line-height:
                1.2;

            font-weight:
                850;

            letter-spacing:
                -0.7px;

            margin-bottom:
                9px;
        }


        .page-header h1 span {

            background:
                linear-gradient(
                    90deg,
                    #a58fff,
                    #62adff
                );

            -webkit-background-clip:
                text;

            background-clip:
                text;

            color:
                transparent;
        }


        .page-header p {

            color:
                #9ba6ba;

            font-size:
                13px;

            line-height:
                1.6;
        }


        /* =====================================================
           STAT CARDS
        ===================================================== */

        .stats-grid {

            position:
                relative;

            z-index:
                2;

            display:
                grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap:
                15px;

            margin-bottom:
                18px;
        }


        .stat-card {

            position:
                relative;

            overflow:
                hidden;

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
                all 0.25s ease;
        }


        .stat-card::after {

            content:
                "";

            position:
                absolute;

            width:
                100px;

            height:
                100px;

            border-radius:
                50%;

            background:
                rgba(118, 87, 255, 0.08);

            filter:
                blur(30px);

            right:
                -30px;

            top:
                -30px;

            pointer-events:
                none;
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

            position:
                relative;

            z-index:
                2;

            color:
                var(--muted);

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                0.8px;

            margin-bottom:
                9px;
        }


        .stat-value {

            position:
                relative;

            z-index:
                2;

            color:
                #fff;

            font-size:
                28px;

            font-weight:
                900;
        }


        .stat-link {

            position: relative;

            z-index: 2;

            display: inline-flex;

            align-items: center;

            gap: 5px;

            margin-top: 9px;

            color: #a58fff;

            font-size: 10px;

            font-weight: 800;

            text-decoration: none;

            transition: all 0.2s ease;
        }


        .stat-link:hover {

            color: #fff;

            transform: translateX(2px);
        }


        /* =====================================================
           TWO COLUMN AREA
        ===================================================== */

        .content-grid {

            position:
                relative;

            z-index:
                2;

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                18px;

            align-items: stretch;
        }


        .content-grid > .card {

            height: 100%;
        }


        .card {

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius);

            padding:
                23px;

            box-shadow:
                var(--shadow);
        }


        .card-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            margin-bottom:
                20px;
        }


        .card-header h2 {

            font-size:
                16px;

            font-weight:
                850;

            color:
                #fff;
        }


        .card-header span {

            color:
                #727d93;

            font-size:
                10px;

            font-weight:
                700;
        }


        /* =====================================================
           QUICK ACTIONS
        ===================================================== */

        .quick-actions {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                10px;
        }


        .quick-action {

            min-height:
                88px;

            padding:
                15px;

            border:
                1px solid var(--border);

            border-radius:
                13px;

            background:
                rgba(255, 255, 255, 0.025);

            text-decoration:
                none;

            transition:
                all 0.25s ease;
        }


        .quick-action:hover {

            transform:
                translateY(-2px);

            background:
                rgba(118, 87, 255, 0.07);

            border-color:
                rgba(118, 87, 255, 0.3);
        }


        .quick-icon {

            width:
                32px;

            height:
                32px;

            margin-bottom:
                9px;

            border-radius:
                9px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                var(--gradient);

            color:
                #fff;

            font-size:
                12px;

            font-weight:
                900;
        }


        .quick-title {

            color:
                #f0f3f8;

            font-size:
                11px;

            font-weight:
                800;
        }


        .quick-description {

            color:
                #68738a;

            font-size:
                9px;

            margin-top:
                3px;

            line-height:
                1.4;
        }


        /* =====================================================
           INFO CARD
        ===================================================== */

        .info-list {

            display:
                flex;

            flex-direction:
                column;

            gap:
                9px;
        }


        .info-item {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                10px;

            padding:
                11px 12px;

            border:
                1px solid var(--border);

            border-radius:
                10px;

            background:
                rgba(255, 255, 255, 0.02);
        }


        .info-label {

            color:
                #68738a;

            font-size:
                10px;

            font-weight:
                700;
        }


        .info-value {

            color:
                #dce2ed;

            font-size:
                11px;

            font-weight:
                800;
        }


        /* =====================================================
           MOBILE HEADER
        ===================================================== */

        .mobile-header {

            display:
                none;
        }


        .sidebar-overlay {

            display:
                none;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1000px) {

            .stats-grid {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }


            .content-grid {

                grid-template-columns:
                    1fr;
            }
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 760px) {

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


            .sidebar-overlay.show {

                display:
                    block;

                position:
                    fixed;

                inset:
                    0;

                background:
                    rgba(2, 5, 12, 0.68);

                backdrop-filter:
                    blur(3px);

                -webkit-backdrop-filter:
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

                background:
                    rgba(7, 11, 22, 0.9);

                backdrop-filter:
                    blur(18px);

                -webkit-backdrop-filter:
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

                color:
                    #fff;

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
                    rgba(255, 255, 255, 0.03);

                color:
                    #fff;

                cursor:
                    pointer;

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    center;

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

                border-radius:
                    17px;
            }


            .page-header h1 {

                font-size:
                    24px;
            }


            .page-header p {

                font-size:
                    12px;
            }


            .stats-grid {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }


            .quick-actions {

                grid-template-columns:
                    1fr;
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


            .stats-grid {

                grid-template-columns:
                    1fr;
            }


            .stat-card {

                padding:
                    17px;
            }


            .card {

                padding:
                    18px;
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


        <!-- =====================================================
             OVERLAY
        ===================================================== -->

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


            <!-- LOGO -->

            <div class="logo">

                <div class="logo-icon">
                    QR
                </div>


                <div class="logo-text">

                    ABSENSI
                    <span>QR</span>

                </div>

            </div>


            <!-- MENU SCROLL -->

            <div class="sidebar-menu-scroll">

                <nav class="menu">


                    <div class="menu-label">
                        Menu Utama
                    </div>


                    <!-- DASHBOARD -->

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="active"
                    >

                        <span class="menu-icon">
                            ⌂
                        </span>

                        Dashboard

                    </a>


                    <!-- MAHASISWA -->

                    <a
    href="{{ route('admin.mahasiswa') }}"
>
    <span class="menu-icon">
        ◉
    </span>

    Mahasiswa
</a>


                    <!-- DOSEN -->

                    <a
    href="{{ route('admin.dosen') }}"
    class="menu-item"
>
    <span class="menu-icon">◎</span>
    Dosen
</a>


                    <!-- MATA KULIAH -->

                    <a
    href="{{ route('admin.mata-kuliah') }}"
    class="menu-item"
>
    <span class="menu-icon">▣</span>
    Mata Kuliah
</a>


                    <!-- KELAS -->

                   <a
    href="{{ route('admin.kelas') }}"
    class="menu-item"
>
    <span class="menu-icon">▤</span>
    Kelas
</a>


                    <!-- JADWAL -->

                    <a
    href="{{ route('admin.jadwal') }}"
    class="menu-item"
>
    <span class="menu-icon">◷</span>
    Jadwal
</a>


                    <!-- SESI ABSENSI -->

                    <a
    href="{{ route('admin.sesi-absensi') }}"
    class="menu-item"
>
    <span class="menu-icon">▥</span>
    Sesi Absensi
</a>


                    <!-- KEHADIRAN -->
<a href="{{ route('admin.kehadiran') }}">
    <span class="menu-icon">✓</span>
    Kehadiran
</a>


                    <!-- PENGAJUAN -->

                    <a href="{{ route('admin.pengajuan-absensi') }}">
    <span class="menu-icon">
        ◌
    </span>

    Pengajuan Absensi
</a>

                    <!-- LAPORAN -->

                    <a href="{{ route('admin.laporan') }}">
    <span class="menu-icon">◷</span>
    Laporan
</a>


                    <!-- PENGATURAN -->

                    <a
                        href="{{ route('admin.pengaturan') }}"
                    >

                        <span class="menu-icon">
                            ⚙
                        </span>

                        Pengaturan

                    </a>


                    <!-- PROFIL -->

                    <a
                        href="{{ route('admin.profil') }}"
                    >

                        <span class="menu-icon">
                            ◎
                        </span>

                        Profil

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


                    <button
                        type="submit"
                    >

                        Keluar dari Sistem

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


                <div class="breadcrumb">

                    Admin

                    <span>
                        /
                    </span>

                    <strong>
                        Dashboard
                    </strong>

                </div>


                <!-- PROFILE -->

                <div class="top-profile">

                    <div class="top-avatar">

                        {{ strtoupper(substr($admin->nama, 0, 1)) }}

                    </div>


                    <span>

                        {{ $admin->nama }}

                    </span>

                </div>


            </div>


            <!-- =================================================
                 PAGE HEADER
            ================================================== -->

            <section class="page-header">

                <div class="page-header-content">


                    <h1>

                        Dashboard
                        <span>Admin</span>

                    </h1>


                    <p>

                        Kelola data dan aktivitas
                        sistem Absensi QR dari satu tempat.

                    </p>


                </div>

            </section>


            <!-- =================================================
                 STATISTICS
            ================================================== -->

            <section class="stats-grid">


                <!-- MAHASISWA -->

                <div class="stat-card">

                    <div class="stat-label">
                        Total Mahasiswa
                    </div>


                    <div class="stat-value">
                        {{ $totalMahasiswa }}
                    </div>

                </div>


                <!-- DOSEN -->

                <div class="stat-card">

                    <div class="stat-label">
                        Total Dosen
                    </div>


                    <div class="stat-value">
                        {{ $totalDosen }}
                    </div>

                </div>


                <!-- MATA KULIAH -->

                <div class="stat-card">

                    <div class="stat-label">
                        Mata Kuliah
                    </div>


                    <div class="stat-value">
                        {{ $totalMataKuliah }}
                    </div>

                </div>


                <!-- KELAS -->

                <div class="stat-card">

                    <div class="stat-label">
                        Total Kelas
                    </div>


                    <div class="stat-value">
                        {{ $totalKelas }}
                    </div>

                </div>


                <!-- SESI -->

                <div class="stat-card">

                    <div class="stat-label">
                        Sesi Absensi
                    </div>


                    <div class="stat-value">
                        {{ $totalSesiAbsensi }}
                    </div>

                </div>


                <!-- KEHADIRAN -->

                <div class="stat-card">

                    <div class="stat-label">
                        Total Kehadiran
                    </div>


                    <div class="stat-value">
                        {{ $totalKehadiran }}
                    </div>


                    <a
                        href="{{ route('admin.kehadiran') }}"
                        class="stat-link"
                    >
                        Lihat data kehadiran →
                    </a>

                </div>


            </section>


            <!-- =================================================
                 CONTENT GRID
            ================================================== -->

            <div class="content-grid">


                <!-- =================================================
                     QUICK ACTIONS
                ================================================== -->

                <section class="card">


                    <div class="card-header">

                        <h2>
                            Menu Cepat
                        </h2>


                        <span>
                            Admin
                        </span>

                    </div>


                                        <div class="quick-actions">


                        <a
                            href="{{ route('admin.mahasiswa') }}"
                            class="quick-action"
                        >

                            <div class="quick-icon">
                                M
                            </div>

                            <div class="quick-title">
                                Kelola Mahasiswa
                            </div>

                            <div class="quick-description">
                                Data mahasiswa
                            </div>

                        </a>


                        <a
                            href="{{ route('admin.jadwal') }}"
                            class="quick-action"
                        >

                            <div class="quick-icon">
                                J
                            </div>

                            <div class="quick-title">
                                Jadwal
                            </div>

                            <div class="quick-description">
                                Kelola jadwal kuliah
                            </div>

                        </a>


                        <a
                            href="{{ route('admin.sesi-absensi') }}"
                            class="quick-action"
                        >

                            <div class="quick-icon">
                                Q
                            </div>

                            <div class="quick-title">
                                Sesi Absensi
                            </div>

                            <div class="quick-description">
                                Pantau sesi dan QR
                            </div>

                        </a>


                        <a
                            href="{{ route('admin.kehadiran') }}"
                            class="quick-action"
                        >

                            <div class="quick-icon">
                                ✓
                            </div>

                            <div class="quick-title">
                                Kehadiran
                            </div>

                            <div class="quick-description">
                                Lihat seluruh data presensi
                            </div>

                        </a>


                    </div>

                </section>


                <!-- =================================================
                     SYSTEM INFO
                ================================================== -->

                <section class="card">


                    <div class="card-header">

                        <h2>
                            Informasi Sistem
                        </h2>

                    </div>


                    <div class="info-list">


                        <div class="info-item">

                            <span class="info-label">
                                Role
                            </span>


                            <span class="info-value">
                                Admin
                            </span>

                        </div>


                        <div class="info-item">

                            <span class="info-label">
                                Nama
                            </span>


                            <span class="info-value">
                                {{ $admin->nama }}
                            </span>

                        </div>


                        <div class="info-item">

                            <span class="info-label">
                                Email
                            </span>


                            <span class="info-value">
                                {{ $user->email }}
                            </span>

                        </div>


                        <div class="info-item">

                            <span class="info-label">
                                Status
                            </span>


                            <span class="info-value">
                                Aktif
                            </span>

                        </div>


                    </div>


                </section>


            </div>


        </main>


    </div>


    <!-- =====================================================
         JAVASCRIPT
    ===================================================== -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {


                const sidebar =
                    document.getElementById('sidebar');

                const overlay =
                    document.getElementById('sidebarOverlay');

                const hamburger =
                    document.getElementById('hamburgerButton');

                const menuLinks =
                    document.querySelectorAll(
                        '.sidebar-menu-scroll .menu a:not(.menu-disabled)'
                    );


                /* =================================================
                   TOGGLE SIDEBAR
                ================================================= */

                function toggleSidebar() {

                    if (
                        !sidebar ||
                        !overlay
                    ) {
                        return;
                    }


                    sidebar.classList.toggle('open');

                    overlay.classList.toggle('show');

                }


                /* =================================================
                   CLOSE SIDEBAR
                ================================================= */

                function closeSidebar() {

                    if (
                        !sidebar ||
                        !overlay
                    ) {
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
                   MENU CLICK
                ================================================= */

                menuLinks.forEach(
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
                   ESCAPE
                ================================================= */

                document.addEventListener(
                    'keydown',
                    function (event) {

                        if (
                            event.key === 'Escape'
                        ) {

                            closeSidebar();

                        }

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