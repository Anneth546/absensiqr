<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mata Kuliah | Absensi QR</title>


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

            min-height:
                100vh;

            overflow-x:
                hidden;
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

            width:
                8px;
        }


        *::-webkit-scrollbar-track {

            background:
                #070b16;
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

            left:
                0;

            top:
                0;

            width:
                255px;

            height:
                100vh;

            height:
                100dvh;

            background:

                linear-gradient(
                    180deg,
                    rgba(13, 17, 35, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            padding:
                28px 18px;

            z-index:
                1000;

            display:
                flex;

            flex-direction:
                column;

            /*
             * Sidebar utama tidak ikut scroll.
             * Hanya area menu yang dapat di-scroll.
             */

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
                22px;

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
                linear-gradient(
                    135deg,
                    #7657ff,
                    #4d9cff
                );

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
                white;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, 0.35);
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
           SCROLLABLE MENU
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
                #7657ff transparent;
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

        .menu {

            display:
                flex;

            flex-direction:
                column;

            gap:
                6px;

            padding-bottom:
                8px;
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

            padding:
                12px 13px;

            color:
                #8993a8;

            text-decoration:
                none;

            border-radius:
                11px;

            font-size:
                13px;

            font-weight:
                700;

            flex-shrink:
                0;

            transition:
                background 0.25s ease,
                color 0.25s ease,
                transform 0.25s ease;
        }


        .menu-icon {

            width:
                20px;

            text-align:
                center;

            font-size:
                16px;

            opacity:
                0.9;

            flex-shrink:
                0;
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


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout {

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


        .logout button {

            width:
                100%;

            border:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.025);

            color:
                #a7afc0;

            padding:
                12px;

            border-radius:
                11px;

            font-size:
                13px;

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

            border-color:
                rgba(118, 87, 255, 0.4);

            background:
                rgba(118, 87, 255, 0.1);

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


        /* =====================================================
           BACKGROUND GLOW
        ===================================================== */

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
           TOP BAR
        ===================================================== */

        .topbar {

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            margin-bottom:
                30px;
        }


        .page-title {

            font-size:
                13px;

            color:
                var(--muted);

            font-weight:
                600;
        }


        .page-title strong {

            color:
                #fff;

            font-weight:
                800;
        }


        .page-title span {

            margin:
                0 4px;

            color:
                #59647a;
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

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                flex-end;

            gap:
                20px;

            margin-bottom:
                25px;
        }


        .page-heading h1 {

            font-size:
                31px;

            line-height:
                1.2;

            font-weight:
                850;

            letter-spacing:
                -0.8px;

            margin-bottom:
                8px;
        }


        .page-heading h1 span {

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


        .page-heading p {

            color:
                #8e99ae;

            font-size:
                13px;

            line-height:
                1.6;
        }


        .course-count {

            padding:
                10px 16px;

            border:
                1px solid
                rgba(118, 87, 255, 0.28);

            background:
                rgba(118, 87, 255, 0.08);

            color:
                #b7aaff;

            border-radius:
                11px;

            font-size:
                11px;

            font-weight:
                800;

            white-space:
                nowrap;
        }


        /* =====================================================
           COURSE CONTAINER
        ===================================================== */

        .course-container {

            position:
                relative;

            background:
                rgba(17, 24, 39, 0.62);

            border:
                1px solid var(--border);

            border-radius:
                20px;

            padding:
                25px;

            box-shadow:
                var(--shadow);

            overflow:
                hidden;
        }


        .course-container::before {

            content:
                "";

            position:
                absolute;

            width:
                300px;

            height:
                300px;

            border-radius:
                50%;

            background:
                rgba(118, 87, 255, 0.06);

            filter:
                blur(70px);

            right:
                -150px;

            top:
                -150px;

            pointer-events:
                none;
        }


        /* =====================================================
           COURSE HEADER
        ===================================================== */

        .course-header {

            position:
                relative;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                15px;

            padding-bottom:
                20px;

            margin-bottom:
                22px;

            border-bottom:
                1px solid
                rgba(148, 163, 184, 0.10);
        }


        .course-header-left {

            display:
                flex;

            align-items:
                center;

            gap:
                13px;
        }


        .course-header-icon {

            width:
                46px;

            height:
                46px;

            border-radius:
                13px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                linear-gradient(
                    135deg,
                    rgba(118, 87, 255, 0.20),
                    rgba(77, 156, 255, 0.10)
                );

            border:
                1px solid
                rgba(118, 87, 255, 0.20);

            font-size:
                21px;

            box-shadow:
                0 10px 25px
                rgba(0, 0, 0, 0.18);
        }


        .course-header h2 {

            font-size:
                17px;

            font-weight:
                850;

            color:
                #f8fafc;

            margin-bottom:
                3px;
        }


        .course-header p {

            font-size:
                11px;

            color:
                #727d93;
        }


        /* =====================================================
           COURSE GRID
        ===================================================== */

        .course-grid {

            position:
                relative;

            display:
                grid;

            grid-template-columns:
                repeat(
                    3,
                    minmax(0, 1fr)
                );

            gap:
                15px;
        }


        /* =====================================================
           COURSE CARD
        ===================================================== */

        .course-card {

            position:
                relative;

            overflow:
                hidden;

            background:
                rgba(255, 255, 255, 0.025);

            border:
                1px solid
                rgba(148, 163, 184, 0.13);

            border-radius:
                16px;

            padding:
                20px;

            min-height:
                190px;

            display:
                flex;

            flex-direction:
                column;

            justify-content:
                space-between;

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                background 0.3s ease,
                box-shadow 0.3s ease;

            text-decoration:
                none;

            color:
                inherit;

            cursor:
                pointer;
        }


        .course-card::before {

            content:
                "";

            position:
                absolute;

            left:
                0;

            right:
                0;

            top:
                0;

            height:
                2px;

            background:
                linear-gradient(
                    90deg,
                    #7657ff,
                    #4d9cff
                );

            opacity:
                0.9;
        }


        .course-card::after {

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
                -50px;

            bottom:
                -50px;

            pointer-events:
                none;
        }


        .course-card:hover {

            transform:
                translateY(-5px);

            border-color:
                rgba(118, 87, 255, 0.38);

            background:
                rgba(22, 30, 48, 0.90);

            box-shadow:
                0 18px 40px
                rgba(0, 0, 0, 0.25);
        }


        /* =====================================================
           COURSE TOP
        ===================================================== */

        .course-top {

            position:
                relative;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                10px;

            margin-bottom:
                18px;
        }


        .course-code {

            display:
                inline-flex;

            align-items:
                center;

            padding:
                7px 10px;

            border-radius:
                9px;

            background:
                rgba(118, 87, 255, 0.10);

            border:
                1px solid
                rgba(118, 87, 255, 0.20);

            color:
                #a99aff;

            font-size:
                10px;

            font-weight:
                900;

            letter-spacing:
                0.4px;
        }


        .course-sks {

            color:
                #667188;

            font-size:
                10px;

            font-weight:
                700;
        }


        /* =====================================================
           COURSE NAME
        ===================================================== */

        .course-name {

            position:
                relative;

            color:
                #f4f7fb;

            font-size:
                16px;

            font-weight:
                800;

            line-height:
                1.45;

            letter-spacing:
                -0.2px;

            min-height:
                70px;
        }


        /* =====================================================
           COURSE FOOTER
        ===================================================== */

        .course-footer {

            position:
                relative;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                10px;

            padding-top:
                15px;

            border-top:
                1px solid
                rgba(148, 163, 184, 0.09);
        }


        .course-type {

            color:
                #737e94;

            font-size:
                10px;

            font-weight:
                600;
        }


        .course-arrow {

            width:
                29px;

            height:
                29px;

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

            border:
                1px solid
                rgba(118, 87, 255, 0.15);

            color:
                #9b88ff;

            font-size:
                13px;

            transition:
                all 0.25s ease;
        }


        .course-card:hover .course-arrow {

            background:
                rgba(118, 87, 255, 0.18);

            border-color:
                rgba(118, 87, 255, 0.35);

            transform:
                translateX(3px);
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {

            grid-column:
                1 / -1;

            padding:
                60px 20px;

            text-align:
                center;

            border:
                1px dashed
                rgba(148, 163, 184, 0.18);

            border-radius:
                15px;

            background:
                rgba(255, 255, 255, 0.015);
        }


        .empty-icon {

            width:
                58px;

            height:
                58px;

            margin:
                0 auto 15px;

            border-radius:
                16px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                rgba(118, 87, 255, 0.09);

            border:
                1px solid
                rgba(118, 87, 255, 0.15);

            font-size:
                24px;
        }


        .empty-state h3 {

            font-size:
                15px;

            font-weight:
                800;

            margin-bottom:
                6px;
        }


        .empty-state p {

            color:
                #737e94;

            font-size:
                11px;
        }


        /* =====================================================
           SIDEBAR OVERLAY
        ===================================================== */

        .sidebar-overlay {

            display:
                none;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1150px) {

            .course-grid {

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0, 1fr)
                    );
            }
        }


        /* =====================================================
           MOBILE
        ===================================================== */

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
                    20px 0 60px
                    rgba(0, 0, 0, 0.45);
            }


            .sidebar.open {

                transform:
                    translateX(0);
            }


            /*
             * Area menu tetap bisa di-scroll
             * saat sidebar dibuka di HP.
             */

            .sidebar-menu-scroll {

                overflow-y:
                    auto;

                -webkit-overflow-scrolling:
                    touch;
            }


            /* OVERLAY */

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

                z-index:
                    900;

                animation:
                    fadeIn 0.25s ease;
            }


            @keyframes fadeIn {

                from {
                    opacity:
                        0;
                }

                to {
                    opacity:
                        1;
                }
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


            .mobile-logo span {

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

                transition:
                    all 0.25s ease;
            }


            .hamburger:hover {

                background:
                    rgba(118, 87, 255, 0.12);

                border-color:
                    rgba(118, 87, 255, 0.35);
            }


            /* TOPBAR */

            .topbar {

                margin-bottom:
                    20px;
            }


            .top-profile {

                display:
                    none;
            }


            /* PAGE HEADER */

            .page-header {

                align-items:
                    flex-start;

                flex-direction:
                    column;

                gap:
                    15px;

                margin-bottom:
                    20px;
            }


            .page-heading h1 {

                font-size:
                    25px;
            }


            .page-heading p {

                font-size:
                    12px;
            }


            /* COURSE CONTAINER */

            .course-container {

                padding:
                    18px;

                border-radius:
                    17px;
            }


            .course-header {

                align-items:
                    flex-start;
            }


            .course-header-icon {

                width:
                    42px;

                height:
                    42px;
            }


            .course-header h2 {

                font-size:
                    15px;
            }


            .course-header p {

                font-size:
                    10px;
            }


            /* COURSE GRID */

            .course-grid {

                grid-template-columns:
                    1fr;

                gap:
                    12px;
            }


            .course-card {

                min-height:
                    175px;

                padding:
                    18px;
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


            .page-heading h1 {

                font-size:
                    22px;
            }


            .course-container {

                padding:
                    15px;
            }


            .course-header-left {

                gap:
                    10px;
            }


            .course-header-icon {

                width:
                    39px;

                height:
                    39px;

                font-size:
                    18px;
            }


            .course-card {

                min-height:
                    165px;

                padding:
                    17px;
            }


            .course-name {

                font-size:
                    15px;

                min-height:
                    65px;
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

            ABSENSI <span>QR</span>

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


        <!-- LOGO -->

        <div class="logo">

            <div class="logo-icon">
                QR
            </div>


            <div class="logo-text">
                ABSENSI <span>QR</span>
            </div>

        </div>



        <!-- =================================================
             MENU SCROLL
        ================================================== -->

        <div class="sidebar-menu-scroll">


            <nav class="menu">


                <div class="menu-label">
                    Menu Utama
                </div>


                <!-- DASHBOARD -->

                <a
                    href="{{ url('/dosen/dashboard') }}"
                >

                    <span class="menu-icon">
                        ⌂
                    </span>

                    Dashboard

                </a>


                <!-- MATA KULIAH -->

                <a
                    href="{{ route('dosen.mata-kuliah') }}"
                    class="active"
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
                        ◉
                    </span>

                    Profil

                </a>


            </nav>


        </div>



        <!-- =================================================
             LOGOUT
        ================================================== -->

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
             TOP BAR
        ================================================== -->

        <div class="topbar">


            <div class="page-title">

                Dashboard

                <span>
                    /
                </span>

                <strong>
                    Mata Kuliah
                </strong>

            </div>


            <div class="top-profile">


                <div class="top-avatar">

                    {{ strtoupper(
                        substr(
                            $dosen->nama,
                            0,
                            1
                        )
                    ) }}

                </div>


                <span>

                    {{ $dosen->nama }}

                </span>


            </div>


        </div>



        <!-- =================================================
             PAGE HEADER
        ================================================== -->

        <section class="page-header">


            <div class="page-heading">


                <h1>

                    Mata <span>Kuliah</span>

                </h1>


                <p>

                    Pilih mata kuliah untuk melihat jadwal
                    dan mengatur kegiatan perkuliahan.

                </p>


            </div>


            <div class="course-count">

                {{ $mataKuliahs->count() }}

                Mata Kuliah

            </div>


        </section>



        <!-- =================================================
             COURSE CONTAINER
        ================================================== -->

        <section class="course-container">


            <!-- COURSE HEADER -->

            <div class="course-header">


                <div class="course-header-left">


                    <div class="course-header-icon">
                        📚
                    </div>


                    <div>


                        <h2>
                            Daftar Mata Kuliah
                        </h2>


                        <p>
                            Mata kuliah yang tersedia
                            dalam sistem
                        </p>


                    </div>


                </div>


            </div>



            <!-- =================================================
                 COURSE GRID
            ================================================== -->

            <div class="course-grid">


                @forelse ($mataKuliahs as $mataKuliah)


                    <!-- COURSE CARD -->

                    <a
                        href="{{ route(
                            'dosen.jadwal',
                            [
                                'mata_kuliah_id' =>
                                    $mataKuliah->id
                            ]
                        ) }}"
                        class="course-card"
                        title="Lihat jadwal {{ $mataKuliah->nama }}"
                    >


                        <!-- COURSE TOP -->

                        <div class="course-top">


                            <div class="course-code">

                                {{ $mataKuliah->kode }}

                            </div>


                            <div class="course-sks">

                                {{ $mataKuliah->sks }}
                                SKS

                            </div>


                        </div>



                        <!-- COURSE NAME -->

                        <div class="course-name">

                            {{ $mataKuliah->nama }}

                        </div>



                        <!-- COURSE FOOTER -->

                        <div class="course-footer">


                            <div class="course-type">

                                Lihat Jadwal

                            </div>


                            <div class="course-arrow">

                                →

                            </div>


                        </div>


                    </a>


                @empty


                    <!-- EMPTY STATE -->

                    <div class="empty-state">


                        <div class="empty-icon">
                            📚
                        </div>


                        <h3>

                            Belum ada mata kuliah

                        </h3>


                        <p>

                            Data mata kuliah belum tersedia
                            dalam sistem.

                        </p>


                    </div>


                @endforelse


            </div>


        </section>


    </main>


</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>


    function toggleSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');


        sidebar.classList.toggle(
            'open'
        );

        overlay.classList.toggle(
            'show'
        );

    }


    function closeSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');


        sidebar.classList.remove(
            'open'
        );

        overlay.classList.remove(
            'show'
        );

    }


    /*
     * Tutup sidebar menggunakan tombol Escape.
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
     * Ketika ukuran layar kembali
     * ke desktop, tutup sidebar mobile.
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


    /*
     * Tutup sidebar setelah memilih
     * menu pada perangkat HP.
     */

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


</script>


</body>

</html>