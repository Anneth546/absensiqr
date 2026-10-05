<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Jadwal | ABSENSI QR</title>


    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            min-height: 100vh;

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            background:
                radial-gradient(
                    circle at 20% 10%,
                    rgba(118, 87, 255, 0.13),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 85% 20%,
                    rgba(77, 156, 255, 0.10),
                    transparent 28%
                ),
                #070b16;

            color: #f8fafc;

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
           VARIABLES
        ===================================================== */

        :root {

            --bg:
                #070b16;

            --sidebar:
                rgba(9, 13, 27, 0.96);

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
           GLOBAL SCROLLBAR
        ===================================================== */

        *::-webkit-scrollbar {
            width: 8px;
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
           LAYOUT
        ===================================================== */

        .dashboard-layout {

            min-height: 100vh;

            display: flex;
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
            height: 100dvh;

            padding:
                28px 18px;

            background:
                linear-gradient(
                    180deg,
                    rgba(15, 20, 38, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            z-index: 1000;

            display: flex;

            flex-direction: column;

            /*
             * Sidebar utama tidak scroll.
             * Yang scroll hanya area menu.
             */

            overflow: hidden;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo {

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                0 10px;

            margin-bottom:
                22px;

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

            font-size: 20px;

            font-weight: 800;

            box-shadow:
                0 10px 25px
                rgba(118, 87, 255, 0.28);
        }


        .logo-text {

            font-size: 18px;

            font-weight: 800;

            letter-spacing: 0.4px;
        }


        .logo-text span {

            color:
                var(--purple-light);
        }


        /* =====================================================
           SIDEBAR SCROLL AREA
        ===================================================== */

        .sidebar-menu-scroll {

            flex: 1;

            min-height: 0;

            overflow-y: auto;

            overflow-x: hidden;

            padding-right: 4px;

            scrollbar-width: thin;

            scrollbar-color:
                #7657ff transparent;

            /*
             * Membuat scroll nyaman pada touch screen.
             */
            -webkit-overflow-scrolling: touch;
        }


        .sidebar-menu-scroll::-webkit-scrollbar {

            width: 5px;
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

            border-radius: 20px;
        }


        .sidebar-menu-scroll::-webkit-scrollbar-thumb:hover {

            background:
                linear-gradient(
                    180deg,
                    #927cff,
                    #62adff
                );
        }


        /* =====================================================
           MENU
        ===================================================== */

        .menu-title {

            padding:
                0 12px;

            margin-bottom:
                10px;

            color:
                var(--muted);

            font-size:
                10px;

            font-weight:
                700;

            text-transform:
                uppercase;

            letter-spacing:
                1.2px;
        }


        .menu {

            display:
                flex;

            flex-direction:
                column;

            gap:
                5px;

            padding-bottom:
                10px;
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

            padding:
                11px 12px;

            border-radius:
                12px;

            color:
                var(--muted-light);

            font-size:
                13px;

            font-weight:
                600;

            flex-shrink:
                0;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }


        .menu a:hover {

            background:
                rgba(118, 87, 255, 0.09);

            color:
                var(--text);

            transform:
                translateX(2px);
        }


        .menu a.active {

            background:
                var(--gradient);

            color:
                #ffffff;

            box-shadow:
                0 10px 25px
                rgba(118, 87, 255, 0.22);
        }


        .menu-icon {

            width:
                20px;

            display:
                flex;

            justify-content:
                center;

            align-items:
                center;

            font-size:
                16px;

            flex-shrink:
                0;
        }


        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .sidebar-bottom {

            margin-top:
                15px;

            padding-top:
                20px;

            border-top:
                1px solid var(--border);

            flex-shrink:
                0;

            background:
                rgba(9, 13, 27, 0.96);
        }


        .logout-btn {

            width:
                100%;

            border:
                0;

            background:
                transparent;

            color:
                #ff7f96;

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            padding:
                11px 12px;

            border-radius:
                12px;

            cursor:
                pointer;

            font-size:
                13px;

            font-weight:
                600;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }


        .logout-btn:hover {

            background:
                rgba(255, 80, 110, 0.08);

            color:
                #ff98aa;
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


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            margin-bottom:
                30px;
        }


        .page-title small {

            display:
                block;

            color:
                var(--muted);

            font-size:
                12px;

            margin-bottom:
                5px;
        }


        .page-title h1 {

            font-size:
                27px;

            line-height:
                1.2;

            font-weight:
                800;
        }


        .profile-mini {

            display:
                flex;

            align-items:
                center;

            gap:
                12px;
        }


        .profile-info {

            text-align:
                right;
        }


        .profile-name {

            font-size:
                13px;

            font-weight:
                700;
        }


        .profile-role {

            margin-top:
                3px;

            font-size:
                11px;

            color:
                var(--muted);
        }


        .avatar {

            width:
                42px;

            height:
                42px;

            border-radius:
                50%;

            background:
                var(--gradient);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                14px;

            font-weight:
                800;

            box-shadow:
                0 8px 20px
                rgba(118, 87, 255, 0.22);
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {

            margin-bottom:
                22px;

            padding:
                14px 18px;

            border-radius:
                14px;

            border:
                1px solid
                rgba(74, 222, 128, 0.25);

            background:
                rgba(34, 197, 94, 0.08);

            color:
                #86efac;

            font-size:
                13px;

            display:
                flex;

            align-items:
                center;

            gap:
                10px;
        }


        /* =====================================================
           INTRO CARD
        ===================================================== */

        .intro-card {

            position:
                relative;

            overflow:
                hidden;

            padding:
                26px;

            margin-bottom:
                25px;

            border-radius:
                var(--radius);

            background:
                linear-gradient(
                    135deg,
                    rgba(118, 87, 255, 0.16),
                    rgba(77, 156, 255, 0.08)
                ),
                var(--card);

            border:
                1px solid var(--border);

            box-shadow:
                var(--shadow);
        }


        .intro-card::after {

            content:
                "";

            position:
                absolute;

            width:
                180px;

            height:
                180px;

            right:
                -60px;

            top:
                -80px;

            border-radius:
                50%;

            background:
                rgba(118, 87, 255, 0.12);

            filter:
                blur(5px);
        }


        .intro-content {

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

            gap:
                20px;
        }


        .intro-text h2 {

            font-size:
                21px;

            margin-bottom:
                8px;
        }


        .intro-text p {

            color:
                var(--muted-light);

            font-size:
                13px;

            line-height:
                1.6;

            max-width:
                650px;
        }


        .btn-primary {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                8px;

            padding:
                12px 17px;

            border-radius:
                12px;

            background:
                var(--gradient);

            color:
                #ffffff;

            font-size:
                12px;

            font-weight:
                700;

            border:
                0;

            cursor:
                pointer;

            white-space:
                nowrap;

            box-shadow:
                0 10px 25px
                rgba(118, 87, 255, 0.22);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .btn-primary:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 15px 30px
                rgba(118, 87, 255, 0.3);
        }


        /* =====================================================
           SECTION HEADER
        ===================================================== */

        .section-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            margin-bottom:
                16px;
        }


        .section-title h2 {

            font-size:
                18px;

            font-weight:
                800;
        }


        .section-title p {

            margin-top:
                4px;

            color:
                var(--muted);

            font-size:
                12px;
        }


        .total-badge {

            padding:
                7px 11px;

            border-radius:
                10px;

            background:
                rgba(118, 87, 255, 0.1);

            border:
                1px solid
                rgba(118, 87, 255, 0.2);

            color:
                var(--purple-light);

            font-size:
                11px;

            font-weight:
                700;
        }


        /* =====================================================
           SCHEDULE GRID
        ===================================================== */

        .schedule-grid {

            display:
                grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap:
                18px;
        }


        /* =====================================================
           SCHEDULE CARD
        ===================================================== */

        .schedule-card {

            position:
                relative;

            padding:
                20px;

            border-radius:
                var(--radius);

            background:
                var(--card);

            border:
                1px solid var(--border);

            box-shadow:
                0 12px 30px
                rgba(0, 0, 0, 0.18);

            transition:
                transform 0.25s ease,
                background 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }


        .schedule-card:hover {

            transform:
                translateY(-3px);

            background:
                var(--card-hover);

            border-color:
                var(--border-hover);

            box-shadow:
                0 18px 38px
                rgba(0, 0, 0, 0.25);
        }


        .schedule-top {

            display:
                flex;

            align-items:
                flex-start;

            justify-content:
                space-between;

            gap:
                15px;

            margin-bottom:
                18px;
        }


        .course-code {

            display:
                inline-flex;

            padding:
                5px 9px;

            margin-bottom:
                9px;

            border-radius:
                8px;

            background:
                rgba(118, 87, 255, 0.1);

            border:
                1px solid
                rgba(118, 87, 255, 0.2);

            color:
                var(--purple-light);

            font-size:
                10px;

            font-weight:
                800;

            letter-spacing:
                0.5px;
        }


        .course-name {

            font-size:
                17px;

            line-height:
                1.35;

            font-weight:
                800;
        }


        .sks-badge {

            flex-shrink:
                0;

            padding:
                7px 10px;

            border-radius:
                9px;

            background:
                rgba(77, 156, 255, 0.09);

            border:
                1px solid
                rgba(77, 156, 255, 0.18);

            color:
                #7db7ff;

            font-size:
                10px;

            font-weight:
                700;
        }


        /* =====================================================
           INFO
        ===================================================== */

        .schedule-info {

            display:
                grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap:
                10px;

            padding-top:
                15px;

            border-top:
                1px solid var(--border);
        }


        .info-item {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                9px;

            min-width:
                0;
        }


        .info-icon {

            width:
                29px;

            height:
                29px;

            flex-shrink:
                0;

            border-radius:
                9px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                rgba(118, 87, 255, 0.08);

            color:
                var(--purple-light);

            font-size:
                12px;
        }


        .info-text {

            min-width:
                0;
        }


        .info-label {

            color:
                var(--muted);

            font-size:
                9px;

            text-transform:
                uppercase;

            letter-spacing:
                0.7px;

            margin-bottom:
                3px;
        }


        .info-value {

            color:
                var(--muted-light);

            font-size:
                11px;

            font-weight:
                600;

            word-break:
                break-word;
        }


        /* =====================================================
           CARD FOOTER
        ===================================================== */

        .schedule-footer {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                12px;

            margin-top:
                18px;

            padding-top:
                15px;

            border-top:
                1px solid var(--border);
        }


        .schedule-status {

            display:
                flex;

            align-items:
                center;

            gap:
                7px;

            color:
                #86efac;

            font-size:
                10px;

            font-weight:
                700;
        }


        .status-dot {

            width:
                7px;

            height:
                7px;

            border-radius:
                50%;

            background:
                #4ade80;

            box-shadow:
                0 0 10px
                rgba(74, 222, 128, 0.5);
        }


        .btn-session {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                9px 12px;

            border-radius:
                10px;

            background:
                rgba(118, 87, 255, 0.1);

            border:
                1px solid
                rgba(118, 87, 255, 0.2);

            color:
                var(--purple-light);

            font-size:
                10px;

            font-weight:
                700;

            transition:
                0.2s ease;
        }


        .btn-session:hover {

            background:
                var(--gradient);

            border-color:
                transparent;

            color:
                #ffffff;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {

            padding:
                55px 25px;

            text-align:
                center;

            border-radius:
                var(--radius);

            background:
                var(--card);

            border:
                1px solid var(--border);

            box-shadow:
                var(--shadow);
        }


        .empty-icon {

            width:
                58px;

            height:
                58px;

            margin:
                0 auto 17px;

            border-radius:
                16px;

            background:
                rgba(118, 87, 255, 0.1);

            border:
                1px solid
                rgba(118, 87, 255, 0.18);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                24px;
        }


        .empty-state h3 {

            font-size:
                16px;

            margin-bottom:
                7px;
        }


        .empty-state p {

            color:
                var(--muted);

            font-size:
                12px;

            line-height:
                1.6;

            margin-bottom:
                20px;
        }


        /* =====================================================
           MOBILE HEADER
        ===================================================== */

        .mobile-header {

            display:
                none;

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

            background:
                rgba(7, 11, 22, 0.92);

            border-bottom:
                1px solid var(--border);

            backdrop-filter:
                blur(16px);

            -webkit-backdrop-filter:
                blur(16px);

            z-index:
                900;

            align-items:
                center;

            justify-content:
                space-between;
        }


        .mobile-logo {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;
        }


        .mobile-logo-icon {

            width:
                35px;

            height:
                35px;

            border-radius:
                10px;

            background:
                var(--gradient);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                15px;

            font-weight:
                800;
        }


        .mobile-logo-text {

            font-size:
                15px;

            font-weight:
                800;
        }


        .hamburger {

            width:
                40px;

            height:
                40px;

            border-radius:
                11px;

            border:
                1px solid var(--border);

            background:
                rgba(17, 24, 39, 0.8);

            color:
                var(--text);

            cursor:
                pointer;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                20px;

            transition:
                0.2s ease;
        }


        .hamburger:hover {

            border-color:
                var(--border-hover);

            background:
                rgba(118, 87, 255, 0.1);
        }


        /* =====================================================
           OVERLAY
        ===================================================== */

        .sidebar-overlay {

            display:
                none;

            position:
                fixed;

            inset:
                0;

            background:
                rgba(0, 0, 0, 0.55);

            z-index:
                950;

            opacity:
                0;

            transition:
                opacity 0.3s ease;
        }


        .sidebar-overlay.show {

            display:
                block;

            opacity:
                1;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .schedule-grid {

                grid-template-columns:
                    1fr;
            }
        }


        @media (max-width: 760px) {


            /* SIDEBAR */

            .sidebar {

                width:
                    270px;

                height:
                    100vh;

                height:
                    100dvh;

                transform:
                    translateX(-100%);

                box-shadow:
                    20px 0 50px
                    rgba(0, 0, 0, 0.35);
            }


            .sidebar.open {

                transform:
                    translateX(0);
            }


            /*
             * Scroll menu tetap aktif
             * saat sidebar dibuka di HP.
             */

            .sidebar-menu-scroll {

                overflow-y:
                    auto;

                -webkit-overflow-scrolling:
                    touch;
            }


            /* MOBILE HEADER */

            .mobile-header {

                display:
                    flex;
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


            /* TOPBAR */

            .topbar {

                margin-bottom:
                    22px;
            }


            .page-title h1 {

                font-size:
                    23px;
            }


            .profile-mini {

                display:
                    none;
            }


            /* INTRO */

            .intro-card {

                padding:
                    21px;
            }


            .intro-content {

                align-items:
                    flex-start;

                flex-direction:
                    column;
            }


            .btn-primary {

                width:
                    100%;
            }


            /* SCHEDULE */

            .schedule-grid {

                grid-template-columns:
                    1fr;
            }
        }


        @media (max-width: 430px) {

            .main {

                padding-left:
                    13px;

                padding-right:
                    13px;
            }


            .page-title h1 {

                font-size:
                    21px;
            }


            .intro-text h2 {

                font-size:
                    18px;
            }


            .schedule-card {

                padding:
                    17px;
            }


            .course-name {

                font-size:
                    15px;
            }


            .schedule-info {

                grid-template-columns:
                    1fr;
            }


            .schedule-footer {

                align-items:
                    stretch;

                flex-direction:
                    column;
            }


            .btn-session {

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


            <div class="mobile-logo-text">
                ABSENSI QR
            </div>

        </div>


        <button
            type="button"
            class="hamburger"
            onclick="toggleSidebar()"
            aria-label="Buka menu"
        >
            ☰
        </button>


    </header>



    <!-- =====================================================
         SIDEBAR OVERLAY
    ===================================================== -->

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
        onclick="closeSidebar()"
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
                ABSENSI <span>QR</span>
            </div>


        </div>



        <!-- =================================================
             MENU SCROLL AREA
        ================================================== -->

        <div class="sidebar-menu-scroll">


            <div class="menu-title">
                Menu Dosen
            </div>


            <nav class="menu">


                <!-- Dashboard -->

                <a
                    href="{{ url('/dosen/dashboard') }}"
                >

                    <span class="menu-icon">
                        ▦
                    </span>

                    <span>
                        Dashboard
                    </span>

                </a>


                <!-- Mata Kuliah -->

                <a
                    href="{{ route('dosen.mata-kuliah') }}"
                >

                    <span class="menu-icon">
                        ▤
                    </span>

                    <span>
                        Mata Kuliah
                    </span>

                </a>


                <!-- Jadwal -->

                <a
                    href="{{ route('dosen.jadwal') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        ◫
                    </span>

                    <span>
                        Jadwal
                    </span>

                </a>


                <!-- Sesi Absensi -->

                <a
                    href="{{ route('dosen.sesi-absensi') }}"
                >

                    <span class="menu-icon">
                        ▣
                    </span>

                    <span>
                        Sesi Absensi
                    </span>

                </a>


                <!-- Daftar Kehadiran -->

                <a
                    href="{{ route('dosen.kehadiran') }}"
                >

                    <span class="menu-icon">
                        ✓
                    </span>

                    <span>
                        Daftar Kehadiran
                    </span>

                </a>


                <!-- Izin / Sakit -->

                <a
                    href="{{ route('dosen.pengajuan-absensi') }}"
                >

                    <span class="menu-icon">
                        ◉
                    </span>

                    <span>
                        Izin / Sakit
                    </span>

                </a>


                <!-- Riwayat -->

                <a
                    href="{{ route('dosen.riwayat') }}"
                >

                    <span class="menu-icon">
                        ◷
                    </span>

                    <span>
                        Riwayat
                    </span>

                </a>


                <!-- Profil -->

                <a
                    href="{{ route('dosen.profil') }}"
                >

                    <span class="menu-icon">
                        ◎
                    </span>

                    <span>
                        Profil
                    </span>

                </a>


            </nav>


        </div>



        <!-- =================================================
             SIDEBAR BOTTOM
        ================================================== -->

        <div class="sidebar-bottom">


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf


                <button
                    type="submit"
                    class="logout-btn"
                >

                    <span class="menu-icon">
                        ↪
                    </span>


                    <span>
                        Logout
                    </span>

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


                <small>
                    Dosen
                </small>


                <h1>
                    Jadwal
                </h1>


            </div>


            <div class="profile-mini">


                <div class="profile-info">


                    <div class="profile-name">
                        {{ $dosen->nama }}
                    </div>


                    <div class="profile-role">
                        Dosen
                    </div>


                </div>


                <div class="avatar">


                    {{ strtoupper(
                        substr(
                            $dosen->nama,
                            0,
                            1
                        )
                    ) }}


                </div>


            </div>


        </div>



        <!-- =================================================
             SUCCESS MESSAGE
        ================================================== -->

        @if(session('success'))

            <div class="alert">


                <span>
                    ✓
                </span>


                <span>

                    {{ session('success') }}

                </span>


            </div>

        @endif



        <!-- =================================================
             INTRO
        ================================================== -->

        <section class="intro-card">


            <div class="intro-content">


                <div class="intro-text">


                    <h2>
                        Jadwal Mengajar
                    </h2>


                    <p>

                        Kelola jadwal mata kuliah yang kamu ajarkan.
                        Jadwal yang dibuat di sini nantinya dapat digunakan
                        untuk membuat sesi absensi dan QR Code.

                    </p>


                </div>


                <a
                    href="{{ route('dosen.jadwal.create') }}"
                    class="btn-primary"
                >

                    <span>
                        ＋
                    </span>

                    <span>
                        Tambah Jadwal
                    </span>

                </a>


            </div>


        </section>



        <!-- =================================================
             SECTION HEADER
        ================================================== -->

        <div class="section-header">


            <div class="section-title">


                <h2>
                    Daftar Jadwal
                </h2>


                <p>
                    Jadwal yang terhubung dengan akun dosen kamu.
                </p>


            </div>


            <div class="total-badge">

                {{ $jadwals->count() }}

                Jadwal

            </div>


        </div>



        <!-- =================================================
             JADWAL
        ================================================== -->

        @if($jadwals->count() > 0)


            <div class="schedule-grid">


                @foreach($jadwals as $jadwal)


                    <div class="schedule-card">


                        <!-- =================================================
                             TOP
                        ================================================== -->

                        <div class="schedule-top">


                            <div>


                                <div class="course-code">

                                    {{ $jadwal->mataKuliah->kode ?? 'KODE' }}

                                </div>


                                <div class="course-name">

                                    {{ $jadwal->mataKuliah->nama ?? 'Mata Kuliah' }}

                                </div>


                            </div>


                            <div class="sks-badge">

                                {{ $jadwal->mataKuliah->sks ?? 0 }}

                                SKS

                            </div>


                        </div>



                        <!-- =================================================
                             INFO
                        ================================================== -->

                        <div class="schedule-info">


                            <!-- KELAS -->

                            <div class="info-item">


                                <div class="info-icon">
                                    ◉
                                </div>


                                <div class="info-text">


                                    <div class="info-label">
                                        Kelas
                                    </div>


                                    <div class="info-value">

                                        {{ $jadwal->kelas->nama ?? '-' }}

                                    </div>


                                </div>


                            </div>



                            <!-- HARI -->

                            <div class="info-item">


                                <div class="info-icon">
                                    ◷
                                </div>


                                <div class="info-text">


                                    <div class="info-label">
                                        Hari
                                    </div>


                                    <div class="info-value">

                                        {{ $jadwal->hari }}

                                    </div>


                                </div>


                            </div>



                            <!-- JAM -->

                            <div class="info-item">


                                <div class="info-icon">
                                    ⏱
                                </div>


                                <div class="info-text">


                                    <div class="info-label">
                                        Waktu
                                    </div>


                                    <div class="info-value">

                                        {{
                                            \Carbon\Carbon::parse(
                                                $jadwal->jam_mulai
                                            )->format('H:i')
                                        }}

                                        -

                                        {{
                                            \Carbon\Carbon::parse(
                                                $jadwal->jam_selesai
                                            )->format('H:i')
                                        }}

                                    </div>


                                </div>


                            </div>



                            <!-- RUANGAN -->

                            <div class="info-item">


                                <div class="info-icon">
                                    ▣
                                </div>


                                <div class="info-text">


                                    <div class="info-label">
                                        Ruangan
                                    </div>


                                    <div class="info-value">

                                        {{ $jadwal->ruangan ?: '-' }}

                                    </div>


                                </div>


                            </div>


                        </div>



                        <!-- =================================================
                             FOOTER
                        ================================================== -->

                        <div class="schedule-footer">


                            <div class="schedule-status">


                                <span class="status-dot"></span>


                                <span>
                                    Jadwal Aktif
                                </span>


                            </div>


                            <a
                                href="{{ route('dosen.sesi-absensi') }}"
                                class="btn-session"
                            >

                                Buat Sesi Absensi

                            </a>


                        </div>


                    </div>


                @endforeach


            </div>


        @else


            <!-- =================================================
                 EMPTY
            ================================================== -->

            <div class="empty-state">


                <div class="empty-icon">
                    ◫
                </div>


                <h3>
                    Belum Ada Jadwal
                </h3>


                <p>

                    Kamu belum memiliki jadwal mengajar.
                    Tambahkan jadwal terlebih dahulu sebelum
                    membuat sesi absensi.

                </p>


                <a
                    href="{{ route('dosen.jadwal.create') }}"
                    class="btn-primary"
                >

                    ＋ Tambah Jadwal

                </a>


            </div>


        @endif


    </main>


</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>


    const sidebar =
        document.getElementById('sidebar');

    const sidebarOverlay =
        document.getElementById('sidebarOverlay');


    /*
     * Buka / tutup sidebar
     */

    function toggleSidebar() {

        sidebar.classList.toggle(
            'open'
        );

        sidebarOverlay.classList.toggle(
            'show'
        );

    }


    /*
     * Tutup sidebar
     */

    function closeSidebar() {

        sidebar.classList.remove(
            'open'
        );

        sidebarOverlay.classList.remove(
            'show'
        );

    }


    /*
     * Tombol Escape
     */

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


    /*
     * Tutup sidebar setelah
     * memilih menu di HP
     */

    document
        .querySelectorAll('.sidebar a')
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


    /*
     * Reset sidebar ketika
     * kembali ke desktop
     */

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


</script>


</body>

</html>