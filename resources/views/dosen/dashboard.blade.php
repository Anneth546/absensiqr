<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Dosen | Absensi QR</title>


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

            color: #f8fafc;

            min-height: 100vh;

            overflow-x: hidden;
        }


        /* =====================================================
           VARIABLES
        ===================================================== */

        :root {

            --bg: #070b16;

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
                0 20px 50px rgba(0, 0, 0, 0.3);

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

            left: 0;
            top: 0;

            width: 255px;
            height: 100vh;
            height: 100dvh;

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

            z-index: 1000;

            display: flex;

            flex-direction: column;

            /*
             * PENTING:
             * Sidebar TIDAK ikut scroll.
             * Yang scroll hanya area menu.
             */
            overflow: hidden;

            transition:
                transform 0.35s ease;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo {

            display: flex;

            align-items: center;

            gap: 11px;

            padding:
                5px 10px;

            margin-bottom:
                22px;

            flex-shrink: 0;
        }


        .logo-icon {

            width: 42px;
            height: 42px;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #7657ff,
                    #4d9cff
                );

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 16px;

            font-weight: 900;

            color: white;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, 0.35);
        }


        .logo-text {

            font-size: 18px;

            font-weight: 900;

            letter-spacing: -0.4px;

            color: #fff;
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
           AREA MENU SCROLL
        ===================================================== */

        .sidebar-menu-scroll {

            flex: 1;

            min-height: 0;

            overflow-y: auto;

            overflow-x: hidden;

            padding-right: 4px;

            /*
             * Firefox
             */
            scrollbar-width: thin;

            scrollbar-color:
                #7657ff
                transparent;
        }


        /*
         * Chrome / Edge / Opera
         */

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

            display: flex;

            flex-direction: column;

            gap: 6px;

            padding-bottom: 8px;
        }


        .menu-label {

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.4px;

            text-transform: uppercase;

            color: #5f6980;

            padding:
                0 13px;

            margin-bottom:
                9px;

            margin-top:
                3px;
        }


        .menu a {

            position: relative;

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                12px 13px;

            color: #8993a8;

            text-decoration: none;

            border-radius:
                11px;

            font-size: 13px;

            font-weight: 700;

            transition:
                background 0.25s ease,
                color 0.25s ease,
                transform 0.25s ease;

            flex-shrink: 0;
        }


        .menu-icon {

            width: 20px;

            text-align: center;

            font-size: 16px;

            opacity: 0.9;

            flex-shrink: 0;
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

            flex-shrink: 0;

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
           MOBILE HEADER
        ===================================================== */

        .mobile-header {

            display:
                none;
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
                26px;
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
           WELCOME
        ===================================================== */

        .welcome {

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

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                20px;
        }


        .welcome::after {

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


        .welcome-text {

            position:
                relative;

            z-index:
                2;
        }


        .welcome-text h1 {

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


        .welcome-text h1 span {

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


        .welcome-text p {

            color:
                #9ba6ba;

            font-size:
                13px;

            line-height:
                1.6;
        }


        /* =====================================================
           ROLE BADGE
        ===================================================== */

        .role-badge {

            position:
                relative;

            z-index:
                2;

            padding:
                9px 15px;

            border-radius:
                10px;

            border:
                1px solid
                rgba(145, 124, 255, 0.35);

            background:
                rgba(118, 87, 255, 0.12);

            color:
                #b8aaff;

            font-size:
                10px;

            font-weight:
                900;

            letter-spacing:
                0.9px;

            box-shadow:
                0 8px 25px
                rgba(60, 40, 160, 0.15);
        }


        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats-grid {

            display:
                grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap:
                15px;

            margin-bottom:
                22px;
        }


        .stat-card {

            position:
                relative;

            overflow:
                hidden;

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius);

            padding:
                20px;

            box-shadow:
                var(--shadow);

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                background 0.3s ease;
        }


        .stat-card::before {

            content:
                "";

            position:
                absolute;

            width:
                80px;

            height:
                80px;

            border-radius:
                50%;

            background:
                rgba(118, 87, 255, 0.1);

            filter:
                blur(28px);

            right:
                -25px;

            top:
                -25px;
        }


        .stat-card:hover {

            transform:
                translateY(-4px);

            border-color:
                var(--border-hover);

            background:
                var(--card-hover);
        }


        .stat-label {

            position:
                relative;

            color:
                #7f899e;

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                0.8px;

            margin-bottom:
                11px;
        }


        .stat-number {

            position:
                relative;

            font-size:
                30px;

            font-weight:
                850;

            line-height:
                1;

            color:
                #f8fafc;
        }


        .stat-icon {

            position:
                absolute;

            right:
                17px;

            bottom:
                17px;

            width:
                34px;

            height:
                34px;

            border-radius:
                10px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                rgba(118, 87, 255, 0.1);

            border:
                1px solid
                rgba(118, 87, 255, 0.15);

            font-size:
                15px;
        }


        /* =====================================================
           CONTENT GRID
        ===================================================== */

        .content-grid {

            display:
                grid;

            grid-template-columns:
                minmax(0, 1.25fr)
                minmax(300px, 0.75fr);

            gap:
                18px;
        }


        /* =====================================================
           CARD
        ===================================================== */

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

            transition:
                border-color 0.3s ease,
                background 0.3s ease;
        }


        .card:hover {

            border-color:
                rgba(148, 163, 184, 0.22);
        }


        .card-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            margin-bottom:
                22px;
        }


        .card-header h2 {

            font-size:
                16px;

            font-weight:
                850;

            color:
                #f8fafc;
        }


        .card-header span {

            color:
                #727d93;

            font-size:
                11px;

            font-weight:
                600;
        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .profile-info {

            display:
                flex;

            align-items:
                center;

            gap:
                15px;

            margin-bottom:
                20px;

            padding-bottom:
                20px;

            border-bottom:
                1px solid var(--border);
        }


        .avatar {

            width:
                57px;

            height:
                57px;

            border-radius:
                15px;

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
                21px;

            font-weight:
                900;

            color:
                #fff;

            box-shadow:
                0 10px 25px
                rgba(77, 100, 255, 0.25);

            flex-shrink:
                0;
        }


        .profile-name {

            font-size:
                17px;

            font-weight:
                800;

            color:
                #fff;

            margin-bottom:
                4px;
        }


        .profile-role {

            font-size:
                12px;

            color:
                #7f8aa0;
        }


        /* =====================================================
           INFO LIST
        ===================================================== */

        .info-list {

            display:
                flex;

            flex-direction:
                column;
        }


        .info-row {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                20px;

            padding:
                13px 0;

            border-bottom:
                1px solid
                rgba(148, 163, 184, 0.09);
        }


        .info-row:last-child {

            border-bottom:
                none;

            padding-bottom:
                0;
        }


        .info-label {

            color:
                #737e94;

            font-size:
                12px;

            font-weight:
                600;
        }


        .info-value {

            color:
                #dce2ed;

            font-size:
                12px;

            font-weight:
                750;

            text-align:
                right;

            max-width:
                65%;

            overflow-wrap:
                anywhere;
        }


        /* =====================================================
           QUICK ACTION
        ===================================================== */

        .quick-actions {

            display:
                grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap:
                11px;
        }


        .action-card {

            position:
                relative;

            overflow:
                hidden;

            display:
                block;

            text-decoration:
                none;

            background:
                rgba(255, 255, 255, 0.025);

            border:
                1px solid var(--border);

            border-radius:
                14px;

            padding:
                17px;

            color:
                #fff;

            transition:
                transform 0.3s ease,
                background 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }


        .action-card::before {

            content:
                "";

            position:
                absolute;

            width:
                80px;

            height:
                80px;

            border-radius:
                50%;

            background:
                rgba(118, 87, 255, 0.1);

            filter:
                blur(25px);

            right:
                -35px;

            bottom:
                -35px;
        }


        .action-card:hover {

            transform:
                translateY(-4px);

            background:
                rgba(118, 87, 255, 0.08);

            border-color:
                rgba(118, 87, 255, 0.35);

            box-shadow:
                0 15px 35px
                rgba(0, 0, 0, 0.2);
        }


        .action-icon {

            position:
                relative;

            width:
                37px;

            height:
                37px;

            border-radius:
                11px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                rgba(118, 87, 255, 0.12);

            border:
                1px solid
                rgba(118, 87, 255, 0.16);

            font-size:
                17px;

            margin-bottom:
                13px;
        }


        .action-title {

            position:
                relative;

            font-size:
                13px;

            font-weight:
                800;

            margin-bottom:
                5px;
        }


        .action-description {

            position:
                relative;

            color:
                #707b91;

            font-size:
                10px;

            line-height:
                1.5;
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

            .stats-grid {

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0, 1fr)
                    );
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
             * Tetap bisa scroll di HP
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
                    opacity: 0;
                }

                to {
                    opacity: 1;
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


            /* WELCOME */

            .welcome {

                padding:
                    22px;

                border-radius:
                    17px;

                flex-direction:
                    column;

                align-items:
                    flex-start;

                gap:
                    17px;
            }


            .welcome-text h1 {

                font-size:
                    24px;
            }


            .welcome-text p {

                font-size:
                    12px;
            }


            /* STATISTICS */

            .stats-grid {

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0, 1fr)
                    );

                gap:
                    11px;
            }


            .stat-card {

                padding:
                    17px;

                border-radius:
                    15px;
            }


            .stat-number {

                font-size:
                    26px;
            }


            .stat-icon {

                display:
                    none;
            }


            /* CONTENT */

            .card {

                padding:
                    19px;

                border-radius:
                    16px;
            }


            .content-grid {

                gap:
                    15px;
            }


            /* INFO */

            .info-row {

                align-items:
                    flex-start;

                flex-direction:
                    column;

                gap:
                    5px;
            }


            .info-value {

                max-width:
                    100%;

                text-align:
                    left;
            }


            /* ACTION */

            .quick-actions {

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0, 1fr)
                    );
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
                    1fr 1fr;
            }


            .stat-card {

                padding:
                    15px;
            }


            .stat-label {

                font-size:
                    9px;
            }


            .stat-number {

                font-size:
                    24px;
            }


            .welcome-text h1 {

                font-size:
                    21px;
            }


            .quick-actions {

                grid-template-columns:
                    1fr;
            }


            .profile-info {

                align-items:
                    flex-start;
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


            <nav class="menu">


                <div class="menu-label">
                    Menu Utama
                </div>


                <!-- DASHBOARD -->

                <a
                    href="{{ url('/dosen/dashboard') }}"
                    class="active"
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


                <!-- KEHADIRAN -->

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
                    Dosen
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
             WELCOME
        ================================================== -->

        <section class="welcome">


            <div class="welcome-text">

                <h1>

                    Halo,

                    <span>

                        {{ $dosen->nama }}

                    </span>

                    👋

                </h1>


                <p>

                    Kelola kegiatan perkuliahan dan absensi
                    mahasiswa dengan mudah.

                </p>

            </div>


            <div class="role-badge">

                DOSEN

            </div>


        </section>


        <!-- =================================================
             STATISTICS
        ================================================== -->

        <section class="stats-grid">


            <!-- HADIR -->

            <div class="stat-card">

                <div class="stat-label">

                    Total Hadir

                </div>


                <div class="stat-number">

                    {{ $hadir }}

                </div>


                <div class="stat-icon">

                    ✓

                </div>

            </div>


            <!-- TERLAMBAT -->

            <div class="stat-card">

                <div class="stat-label">

                    Terlambat

                </div>


                <div class="stat-number">

                    {{ $terlambat }}

                </div>


                <div class="stat-icon">

                    ◷

                </div>

            </div>


            <!-- IZIN -->

            <div class="stat-card">

                <div class="stat-label">

                    Izin

                </div>


                <div class="stat-number">

                    {{ $izin }}

                </div>


                <div class="stat-icon">

                    !

                </div>

            </div>


            <!-- SAKIT -->

            <div class="stat-card">

                <div class="stat-label">

                    Sakit

                </div>


                <div class="stat-number">

                    {{ $sakit }}

                </div>


                <div class="stat-icon">

                    +

                </div>

            </div>


        </section>


        <!-- =================================================
             CONTENT
        ================================================== -->

        <section class="content-grid">


            <!-- =================================================
                 DATA DOSEN
            ================================================== -->

            <div class="card">


                <div class="card-header">

                    <h2>

                        Data Dosen

                    </h2>


                    <span>

                        Biodata

                    </span>

                </div>


                <div class="profile-info">


                    <div class="avatar">

                        {{ strtoupper(
                            substr(
                                $dosen->nama,
                                0,
                                1
                            )
                        ) }}

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


                <div class="info-list">


                    <div class="info-row">

                        <div class="info-label">

                            NIDN

                        </div>


                        <div class="info-value">

                            {{ $dosen->nidn }}

                        </div>

                    </div>


                    <div class="info-row">

                        <div class="info-label">

                            Program Studi

                        </div>


                        <div class="info-value">

                            {{ $dosen->program_studi ?: '-' }}

                        </div>

                    </div>


                    <div class="info-row">

                        <div class="info-label">

                            No. HP

                        </div>


                        <div class="info-value">

                            {{ $dosen->no_hp ?: '-' }}

                        </div>

                    </div>


                </div>


            </div>


            <!-- =================================================
                 MENU CEPAT
            ================================================== -->

            <div class="card">


                <div class="card-header">

                    <h2>

                        Menu Cepat

                    </h2>


                    <span>

                        Akses cepat

                    </span>

                </div>


                <div class="quick-actions">


                    <!-- BUAT SESI -->

                    <a
                        href="{{ route('dosen.sesi-absensi') }}"
                        class="action-card"
                    >

                        <div class="action-icon">
                            📱
                        </div>


                        <div class="action-title">

                            Buat Sesi

                        </div>


                        <div class="action-description">

                            Buat sesi absensi baru.

                        </div>

                    </a>


                    <!-- KEHADIRAN -->

                    <a
                        href="{{ route('dosen.kehadiran') }}"
                        class="action-card"
                    >

                        <div class="action-icon">
                            📊
                        </div>


                        <div class="action-title">

                            Kehadiran

                        </div>


                        <div class="action-description">

                            Lihat mahasiswa yang hadir.

                        </div>

                    </a>


                    <!-- RIWAYAT -->

                    <a
                        href="{{ route('dosen.riwayat') }}"
                        class="action-card"
                    >

                        <div class="action-icon">
                            📋
                        </div>


                        <div class="action-title">

                            Riwayat

                        </div>


                        <div class="action-description">

                            Lihat riwayat absensi.

                        </div>

                    </a>


                    <!-- PROFIL -->

                    <a
                        href="{{ route('dosen.profil') }}"
                        class="action-card"
                    >

                        <div class="action-icon">
                            👤
                        </div>


                        <div class="action-title">

                            Profil

                        </div>


                        <div class="action-description">

                            Kelola profil dosen.

                        </div>

                    </a>


                </div>

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


        sidebar.classList.toggle('open');

        overlay.classList.toggle('show');

    }


    function closeSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');


        sidebar.classList.remove('open');

        overlay.classList.remove('show');

    }


    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                closeSidebar();

            }

        }
    );


    window.addEventListener(
        'resize',
        function () {

            if (window.innerWidth > 760) {

                closeSidebar();

            }

        }
    );


    /*
     * Tutup sidebar ketika menu diklik
     * pada perangkat HP.
     */

    document
        .querySelectorAll('.menu a')
        .forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    if (window.innerWidth <= 760) {

                        closeSidebar();

                    }

                }
            );

        });


</script>


</body>

</html>