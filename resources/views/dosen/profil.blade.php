<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Profil | Absensi QR</title>


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


        *::-webkit-scrollbar-thumb:hover {

            background:
                linear-gradient(
                    180deg,
                    #927cff,
                    #62adff
                );
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

            padding:
                28px 18px;

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

            display:
                flex;

            flex-direction:
                column;

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
                #ffffff;

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
                #ffffff;
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
           SIDEBAR MENU SCROLL
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

            transition:
                background 0.25s ease,
                color 0.25s ease,
                transform 0.25s ease;
        }


        .menu a:hover {

            background:
                rgba(118, 87, 255, 0.09);

            color:
                #ffffff;

            transform:
                translateX(3px);
        }


        .menu a.active {

            color:
                #ffffff;

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

            text-align:
                center;

            font-size:
                16px;
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout {

            margin-top:
                12px;

            padding-top:
                20px;

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
                #ffffff;

            background:
                rgba(118, 87, 255, 0.1);

            border-color:
                rgba(118, 87, 255, 0.4);

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
                #ffffff;

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

            color:
                #ffffff;

            overflow:
                hidden;

            flex-shrink:
                0;
        }


        .top-avatar img {

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;
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

            padding:
                30px 32px;

            margin-bottom:
                22px;

            border-radius:
                20px;

            background:
                linear-gradient(
                    115deg,
                    rgba(42, 32, 93, 0.9),
                    rgba(22, 34, 71, 0.78)
                );

            border:
                1px solid
                rgba(124, 92, 255, 0.2);

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


        .page-header h1 {

            position:
                relative;

            z-index:
                2;

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

            position:
                relative;

            z-index:
                2;

            color:
                #9ba6ba;

            font-size:
                13px;

            line-height:
                1.6;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {

            position:
                relative;

            z-index:
                2;

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            padding:
                14px 17px;

            border-radius:
                13px;

            margin-bottom:
                20px;

            font-size:
                13px;

            font-weight:
                650;
        }


        .alert-success {

            background:
                rgba(34, 197, 94, 0.09);

            border:
                1px solid
                rgba(34, 197, 94, 0.22);

            color:
                #8df0aa;
        }


        .alert-error {

            background:
                rgba(239, 68, 68, 0.09);

            border:
                1px solid
                rgba(239, 68, 68, 0.22);

            color:
                #ff9b9b;
        }


        /* =====================================================
           PROFILE GRID
        ===================================================== */

        .profile-grid {

            position:
                relative;

            z-index:
                2;

            display:
                grid;

            grid-template-columns:
                0.7fr 1.3fr;

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


        .card-title {

            font-size:
                16px;

            font-weight:
                850;

            color:
                #ffffff;

            margin-bottom:
                5px;
        }


        .card-subtitle {

            color:
                #727d93;

            font-size:
                11px;

            line-height:
                1.5;

            margin-bottom:
                21px;
        }


        /* =====================================================
           PROFILE LEFT
        ===================================================== */

        .profile-center {

            display:
                flex;

            flex-direction:
                column;

            align-items:
                center;

            text-align:
                center;

            padding:
                15px 10px 25px;
        }


        .profile-photo {

            width:
                125px;

            height:
                125px;

            border-radius:
                28px;

            background:
                var(--gradient);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            margin-bottom:
                17px;

            overflow:
                hidden;

            font-size:
                42px;

            font-weight:
                900;

            color:
                #ffffff;

            box-shadow:
                0 15px 40px
                rgba(85, 75, 255, 0.24);

            flex-shrink:
                0;
        }


        .profile-photo img {

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;
        }


        .profile-name {

            font-size:
                19px;

            font-weight:
                850;

            color:
                #ffffff;

            margin-bottom:
                5px;
        }


        .profile-role {

            color:
                #8792a7;

            font-size:
                11px;

            margin-bottom:
                22px;
        }


        .profile-info {

            width:
                100%;

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
                12px;

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
                #69748a;

            font-size:
                10px;

            font-weight:
                700;

            flex-shrink:
                0;
        }


        .info-value {

            color:
                #dce2ed;

            font-size:
                11px;

            font-weight:
                750;

            text-align:
                right;

            overflow-wrap:
                anywhere;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-grid {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                15px;
        }


        .form-group {

            display:
                flex;

            flex-direction:
                column;

            gap:
                7px;
        }


        .form-group.full {

            grid-column:
                1 / -1;
        }


        .form-label {

            color:
                #aeb7c8;

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                0.6px;
        }


        .form-control {

            width:
                100%;

            min-height:
                44px;

            padding:
                11px 13px;

            border:
                1px solid var(--border);

            border-radius:
                10px;

            outline:
                none;

            background:
                rgba(255, 255, 255, 0.025);

            color:
                #f8fafc;

            font-family:
                inherit;

            font-size:
                12px;

            transition:
                border-color 0.25s ease,
                background 0.25s ease;
        }


        .form-control::placeholder {

            color:
                #5f6980;
        }


        .form-control:focus {

            border-color:
                rgba(118, 87, 255, 0.55);

            background:
                rgba(118, 87, 255, 0.04);
        }


        .form-control:disabled {

            opacity:
                0.55;

            cursor:
                not-allowed;
        }


        .form-help {

            color:
                #5e6980;

            font-size:
                9px;

            line-height:
                1.5;
        }


        /* =====================================================
           FILE INPUT
        ===================================================== */

        .file-input {

            padding:
                10px;

            cursor:
                pointer;
        }


        .file-input::file-selector-button {

            margin-right:
                10px;

            border:
                1px solid var(--border);

            border-radius:
                8px;

            padding:
                7px 10px;

            background:
                rgba(255, 255, 255, 0.05);

            color:
                #dce2ed;

            font-family:
                inherit;

            font-size:
                10px;

            font-weight:
                700;

            cursor:
                pointer;
        }


        /* =====================================================
           PASSWORD SECTION
        ===================================================== */

        .section-title {

            grid-column:
                1 / -1;

            padding-top:
                10px;

            margin-top:
                4px;

            border-top:
                1px solid var(--border);

            color:
                #f1f4f9;

            font-size:
                13px;

            font-weight:
                850;
        }


        /* =====================================================
           FORM ACTION
        ===================================================== */

        .form-actions {

            grid-column:
                1 / -1;

            display:
                flex;

            justify-content:
                flex-end;

            margin-top:
                6px;
        }


        .save-btn {

            border:
                none;

            padding:
                12px 20px;

            border-radius:
                10px;

            background:
                var(--gradient);

            color:
                #ffffff;

            font-size:
                11px;

            font-weight:
                850;

            cursor:
                pointer;

            box-shadow:
                0 10px 25px
                rgba(118, 87, 255, 0.22);

            transition:
                all 0.25s ease;
        }


        .save-btn:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 14px 30px
                rgba(118, 87, 255, 0.28);
        }


        .save-btn:active {

            transform:
                translateY(0);
        }


        /* =====================================================
           MOBILE HEADER
        ===================================================== */

        .mobile-header {

            display:
                none;
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

        @media (max-width: 900px) {

            .profile-grid {

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

                color:
                    #ffffff;
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

                color:
                    #ffffff;
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
                    #ffffff;

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


            /* TOP PROFILE */

            .top-profile {

                display:
                    none;
            }


            /* HEADER */

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


            /* ALERT */

            .alert {

                align-items:
                    flex-start;

                line-height:
                    1.5;
            }


            /* FORM */

            .form-grid {

                grid-template-columns:
                    1fr;
            }


            .form-group.full {

                grid-column:
                    auto;
            }


            .section-title {

                grid-column:
                    auto;
            }


            .form-actions {

                grid-column:
                    auto;

                justify-content:
                    stretch;
            }


            .save-btn {

                width:
                    100%;
            }


            /* CARD */

            .card {

                padding:
                    20px;
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


            .card {

                padding:
                    18px;

                border-radius:
                    16px;
            }


            .profile-photo {

                width:
                    105px;

                height:
                    105px;

                border-radius:
                    23px;

                font-size:
                    35px;
            }


            .profile-name {

                font-size:
                    17px;
            }


            .info-item {

                align-items:
                    flex-start;

                flex-direction:
                    column;

                gap:
                    4px;
            }


            .info-value {

                text-align:
                    left;

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

                ABSENSI
                <span>QR</span>

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
             SIDEBAR OVERLAY
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


                    <!-- MENU LABEL -->

                    <div class="menu-label">
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
                        class="active"
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
                 TOPBAR
            ================================================== -->

            <div class="topbar">


                <div class="page-title">

                    Dashboard

                    <span>
                        /
                    </span>

                    <strong>
                        Profil
                    </strong>

                </div>


                <!-- TOP PROFILE -->

                <div class="top-profile">


                    <div class="top-avatar">

                        @if($dosen->foto)

                            <img
                                src="{{ asset('storage/' . $dosen->foto) }}"
                                alt="Foto Profil"
                            >

                        @else

                            {{ strtoupper(substr($dosen->nama, 0, 1)) }}

                        @endif

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


                <h1>

                    Profil
                    <span>Dosen</span>

                </h1>


                <p>
                    Kelola informasi akun dan data pribadi Anda.
                </p>


            </section>


            <!-- =================================================
                 SUCCESS MESSAGE
            ================================================== -->

            @if(session('success'))

                <div class="alert alert-success">

                    <span>
                        ✓
                    </span>


                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            <!-- =================================================
                 ERROR MESSAGE
            ================================================== -->

            @if($errors->any())

                <div class="alert alert-error">

                    <span>
                        !
                    </span>


                    <span>
                        {{ $errors->first() }}
                    </span>

                </div>

            @endif


            <!-- =================================================
                 PROFILE CONTENT
            ================================================== -->

            <div class="profile-grid">


                <!-- =================================================
                     PROFILE SUMMARY
                ================================================== -->

                <section class="card">


                    <div class="card-title">
                        Informasi Profil
                    </div>


                    <div class="card-subtitle">

                        Data identitas dosen yang terdaftar
                        dalam sistem.

                    </div>


                    <div class="profile-center">


                        <!-- FOTO -->

                        <div class="profile-photo">

                            @if($dosen->foto)

                                <img
                                    src="{{ asset('storage/' . $dosen->foto) }}"
                                    alt="Foto {{ $dosen->nama }}"
                                >

                            @else

                                {{ strtoupper(substr($dosen->nama, 0, 1)) }}

                            @endif

                        </div>


                        <!-- NAMA -->

                        <div class="profile-name">

                            {{ $dosen->nama }}

                        </div>


                        <!-- ROLE -->

                        <div class="profile-role">

                            Dosen

                        </div>


                        <!-- INFO -->

                        <div class="profile-info">


                            <!-- NIDN -->

                            <div class="info-item">

                                <span class="info-label">
                                    NIDN
                                </span>


                                <span class="info-value">

                                    {{ $dosen->nidn }}

                                </span>

                            </div>


                            <!-- EMAIL -->

                            <div class="info-item">

                                <span class="info-label">
                                    Email
                                </span>


                                <span class="info-value">

                                    {{ $user->email }}

                                </span>

                            </div>


                            <!-- NO HP -->

                            <div class="info-item">

                                <span class="info-label">
                                    No. HP
                                </span>


                                <span class="info-value">

                                    {{ $dosen->no_hp ?: '-' }}

                                </span>

                            </div>


                            <!-- PROGRAM STUDI -->

                            <div class="info-item">

                                <span class="info-label">
                                    Program Studi
                                </span>


                                <span class="info-value">

                                    {{ $dosen->program_studi ?: '-' }}

                                </span>

                            </div>


                        </div>


                    </div>

                </section>


                <!-- =================================================
                     EDIT PROFILE
                ================================================== -->

                <section class="card">


                    <div class="card-title">
                        Edit Profil
                    </div>


                    <div class="card-subtitle">

                        Perbarui informasi akun Anda.

                    </div>


                    <form
                        action="{{ route('dosen.profil.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        <div class="form-grid">


                            <!-- =================================================
                                 NAMA
                            ================================================== -->

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="nama"
                                >
                                    Nama Lengkap
                                </label>


                                <input
                                    type="text"
                                    name="nama"
                                    id="nama"
                                    class="form-control"
                                    value="{{ old('nama', $dosen->nama) }}"
                                    required
                                >

                            </div>


                            <!-- =================================================
                                 EMAIL
                            ================================================== -->

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="email"
                                >
                                    Email
                                </label>


                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    value="{{ old('email', $user->email) }}"
                                    required
                                >

                            </div>


                            <!-- =================================================
                                 NIDN
                            ================================================== -->

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="nidn"
                                >
                                    NIDN
                                </label>


                                <input
                                    type="text"
                                    id="nidn"
                                    class="form-control"
                                    value="{{ $dosen->nidn }}"
                                    disabled
                                >


                                <div class="form-help">

                                    NIDN tidak dapat diubah.

                                </div>

                            </div>


                            <!-- =================================================
                                 NO HP
                            ================================================== -->

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="no_hp"
                                >
                                    Nomor HP
                                </label>


                                <input
                                    type="text"
                                    name="no_hp"
                                    id="no_hp"
                                    class="form-control"
                                    value="{{ old('no_hp', $dosen->no_hp) }}"
                                    placeholder="08xxxxxxxxxx"
                                >

                            </div>


                            <!-- =================================================
                                 PROGRAM STUDI
                            ================================================== -->

                            <div class="form-group full">

                                <label
                                    class="form-label"
                                    for="program_studi"
                                >
                                    Program Studi
                                </label>


                                <input
                                    type="text"
                                    name="program_studi"
                                    id="program_studi"
                                    class="form-control"
                                    value="{{ old('program_studi', $dosen->program_studi) }}"
                                    placeholder="Contoh: Teknik Informatika"
                                >

                            </div>


                            <!-- =================================================
                                 FOTO
                            ================================================== -->

                            <div class="form-group full">

                                <label
                                    class="form-label"
                                    for="foto"
                                >
                                    Foto Profil
                                </label>


                                <input
                                    type="file"
                                    name="foto"
                                    id="foto"
                                    class="form-control file-input"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >


                                <div class="form-help">

                                    Format JPG, JPEG, PNG, atau WEBP.
                                    Maksimal 2 MB.

                                </div>

                            </div>


                            <!-- =================================================
                                 PASSWORD SECTION
                            ================================================== -->

                            <div class="section-title">

                                Ganti Password

                            </div>


                            <!-- =================================================
                                 PASSWORD BARU
                            ================================================== -->

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="password"
                                >
                                    Password Baru
                                </label>


                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Kosongkan jika tidak diganti"
                                    autocomplete="new-password"
                                >

                            </div>


                            <!-- =================================================
                                 KONFIRMASI PASSWORD
                            ================================================== -->

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="password_confirmation"
                                >
                                    Konfirmasi Password
                                </label>


                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control"
                                    placeholder="Ulangi password baru"
                                    autocomplete="new-password"
                                >

                            </div>


                            <!-- =================================================
                                 SUBMIT
                            ================================================== -->

                            <div class="form-actions">

                                <button
                                    type="submit"
                                    class="save-btn"
                                >
                                    Simpan Perubahan
                                </button>

                            </div>


                        </div>

                    </form>


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


                /* =================================================
                   ELEMENT
                ================================================= */

                const sidebar =
                    document.getElementById('sidebar');

                const overlay =
                    document.getElementById('sidebarOverlay');

                const hamburger =
                    document.getElementById('hamburgerButton');

                const menuLinks =
                    document.querySelectorAll('.menu a');


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
                   HAMBURGER BUTTON
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
                   OVERLAY CLICK
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
                   ESCAPE KEY
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