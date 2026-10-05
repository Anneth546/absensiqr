<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mahasiswa | Admin Absensi QR</title>


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
           HTML + BODY
        ===================================================== */

        html {
            min-height: 100%;
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
                sans-serif;

            color:
                var(--text);

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

            color:
                #ffffff;

            font-size:
                16px;

            font-weight:
                900;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, 0.35);

            flex-shrink:
                0;
        }


        .logo-text {

            color:
                #ffffff;

            font-size:
                18px;

            font-weight:
                900;

            letter-spacing:
                -0.4px;
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

            padding:
                0 13px;

            margin:
                3px 0 9px;

            color:
                #5f6980;

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                1.4px;
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
                #ffffff;

            transform:
                translateX(3px);
        }


        .menu a.active {

            background:
                linear-gradient(
                    90deg,
                    rgba(118, 87, 255, 0.22),
                    rgba(77, 156, 255, 0.08)
                );

            color:
                #ffffff;

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

            border-radius:
                11px;

            background:
                rgba(255, 255, 255, 0.025);

            color:
                #a7afc0;

            padding:
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
                #ffffff;

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

            position:
                relative;

            width:
                calc(100% - 255px);

            margin-left:
                255px;

            min-height:
                100vh;

            padding:
                32px 35px 45px;
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

            top:
                -180px;

            right:
                -150px;

            border-radius:
                50%;

            background:
                rgba(118, 87, 255, 0.07);

            filter:
                blur(80px);

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

            font-size:
                12px;

            font-weight:
                900;

            color:
                #ffffff;
        }


        .top-profile span {

            color:
                #dce2ef;

            font-size:
                12px;

            font-weight:
                700;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            position:
                relative;

            z-index:
                2;

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

            right:
                -80px;

            top:
                -100px;

            border-radius:
                50%;

            background:
                rgba(77, 156, 255, 0.12);

            filter:
                blur(45px);

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

            margin-bottom:
                20px;

            border-radius:
                13px;

            font-size:
                12px;

            font-weight:
                700;
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
           TOOLBAR
        ===================================================== */

        .toolbar {

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
                15px;

            margin-bottom:
                18px;
        }


        .search-box {

            position:
                relative;

            flex:
                1;

            max-width:
                420px;
        }


        .search-box input {

            width:
                100%;

            min-height:
                44px;

            padding:
                11px 14px 11px 40px;

            border:
                1px solid var(--border);

            border-radius:
                11px;

            outline:
                none;

            background:
                var(--card);

            color:
                #ffffff;

            font-family:
                inherit;

            font-size:
                12px;

            transition:
                all 0.25s ease;
        }


        .search-box input::placeholder {

            color:
                #68738a;
        }


        .search-box input:focus {

            border-color:
                rgba(118, 87, 255, 0.5);

            background:
                rgba(22, 30, 48, 0.92);
        }


        .search-icon {

            position:
                absolute;

            left:
                14px;

            top:
                50%;

            transform:
                translateY(-50%);

            color:
                #68738a;

            font-size:
                14px;

            pointer-events:
                none;
        }


        .add-btn {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                8px;

            min-height:
                44px;

            padding:
                11px 17px;

            border:
                none;

            border-radius:
                11px;

            background:
                var(--gradient);

            color:
                #ffffff;

            text-decoration:
                none;

            font-size:
                11px;

            font-weight:
                850;

            box-shadow:
                0 10px 25px
                rgba(118, 87, 255, 0.22);

            transition:
                all 0.25s ease;
        }


        .add-btn:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 14px 30px
                rgba(118, 87, 255, 0.30);
        }


        /* =====================================================
           DATA CARD
        ===================================================== */

        .data-card {

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


        .data-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            padding:
                21px 23px;

            border-bottom:
                1px solid var(--border);
        }


        .data-header h2 {

            color:
                #ffffff;

            font-size:
                16px;

            font-weight:
                850;
        }


        .data-header span {

            color:
                #727d93;

            font-size:
                11px;

            font-weight:
                600;
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
                900px;

            border-collapse:
                collapse;
        }


        thead {

            background:
                rgba(255, 255, 255, 0.025);
        }


        th {

            padding:
                14px;

            text-align:
                left;

            color:
                #727d93;

            font-size:
                10px;

            font-weight:
                850;

            text-transform:
                uppercase;

            letter-spacing:
                0.8px;

            border-bottom:
                1px solid var(--border);

            white-space:
                nowrap;
        }


        td {

            padding:
                15px 14px;

            color:
                #dce2ed;

            font-size:
                12px;

            font-weight:
                600;

            border-bottom:
                1px solid
                rgba(148, 163, 184, 0.08);

            vertical-align:
                middle;
        }


        tbody tr {

            transition:
                background 0.2s ease;
        }


        tbody tr:hover {

            background:
                rgba(118, 87, 255, 0.045);
        }


        tbody tr:last-child td {

            border-bottom:
                none;
        }


        /* =====================================================
           STUDENT
        ===================================================== */

        .student {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;
        }


        .student-avatar {

            width:
                36px;

            height:
                36px;

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

            color:
                #ffffff;

            font-size:
                12px;

            font-weight:
                900;

            flex-shrink:
                0;
        }


        .student-info {

            min-width:
                150px;
        }


        .student-name {

            color:
                #f8fafc;

            font-size:
                12px;

            font-weight:
                800;
        }


        .student-email {

            color:
                #68738a;

            font-size:
                10px;

            margin-top:
                3px;

            overflow-wrap:
                anywhere;
        }


        /* =====================================================
           TEXT DATA
        ===================================================== */

        .npm {

            color:
                #dce2ed;

            font-size:
                11px;

            font-weight:
                750;
        }


        .regular-text {

            color:
                #a9b2c5;

            font-size:
                11px;
        }


        .muted-text {

            color:
                #68738a;

            font-size:
                10px;
        }


        /* =====================================================
           ACTION
        ===================================================== */

        .actions {

            display:
                flex;

            align-items:
                center;

            gap:
                6px;

            white-space:
                nowrap;
        }


        .action-btn {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            min-height:
                32px;

            padding:
                7px 10px;

            border-radius:
                8px;

            text-decoration:
                none;

            font-size:
                9px;

            font-weight:
                800;

            cursor:
                pointer;

            transition:
                all 0.2s ease;
        }


        .edit-btn {

            color:
                #9dbfff;

            background:
                rgba(77, 156, 255, 0.08);

            border:
                1px solid
                rgba(77, 156, 255, 0.18);
        }


        .edit-btn:hover {

            background:
                rgba(77, 156, 255, 0.15);

            transform:
                translateY(-1px);
        }


        .delete-btn {

            color:
                #ff9a9a;

            background:
                rgba(239, 68, 68, 0.08);

            border:
                1px solid
                rgba(239, 68, 68, 0.18);
        }


        .delete-btn:hover {

            background:
                rgba(239, 68, 68, 0.15);

            transform:
                translateY(-1px);
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {

            text-align:
                center;

            padding:
                65px 20px;
        }


        .empty-icon {

            width:
                60px;

            height:
                60px;

            margin:
                0 auto 15px;

            border-radius:
                17px;

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
                rgba(118, 87, 255, 0.17);

            color:
                #a58fff;

            font-size:
                24px;
        }


        .empty h3 {

            color:
                #e9edf5;

            font-size:
                15px;

            font-weight:
                800;

            margin-bottom:
                7px;
        }


        .empty p {

            color:
                #69748a;

            font-size:
                11px;

            line-height:
                1.6;
        }


        .no-result {

            display:
                none;

            text-align:
                center;

            padding:
                40px 20px;
        }


        .no-result.show {
            display:
                block;
        }


        .no-result h3 {

            color:
                #e9edf5;

            font-size:
                14px;

            margin-bottom:
                6px;
        }


        .no-result p {

            color:
                #69748a;

            font-size:
                11px;
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

        @media (max-width: 950px) {

            .toolbar {

                align-items:
                    stretch;

                flex-direction:
                    column;
            }


            .search-box {

                max-width:
                    none;
            }


            .add-btn {

                width:
                    100%;
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
                    #ffffff;

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

                color:
                    #ffffff;

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


            .data-header {

                align-items:
                    flex-start;

                flex-direction:
                    column;

                gap:
                    5px;
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


            .page-header h1 {

                font-size:
                    21px;
            }


            .data-header {

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


            <!-- MENU -->

            <div class="sidebar-menu-scroll">

                <nav class="menu">


                    <div class="menu-label">
                        Menu Utama
                    </div>


                    <!-- DASHBOARD -->

                    <a
                        href="{{ route('admin.dashboard') }}"
                    >

                        <span class="menu-icon">
                            ⌂
                        </span>

                        Dashboard

                    </a>


                    <!-- MAHASISWA -->

                    <a
                        href="{{ route('admin.mahasiswa') }}"
                        class="active"
                    >

                        <span class="menu-icon">
                            ◉
                        </span>

                        Mahasiswa

                    </a>


                    <!-- DOSEN -->

                    <a
                        href="{{ route('admin.dosen') }}"
                    >

                        <span class="menu-icon">
                            ◎
                        </span>

                        Dosen

                    </a>


                    <!-- MATA KULIAH -->

                    <a
                        href="{{ route('admin.mata-kuliah') }}"
                    >

                        <span class="menu-icon">
                            ▣
                        </span>

                        Mata Kuliah

                    </a>


                    <!-- KELAS -->

                    <a
                        href="{{ route('admin.kelas') }}"
                    >

                        <span class="menu-icon">
                            ▤
                        </span>

                        Kelas

                    </a>


                    <!-- JADWAL -->

                    <a
                        href="{{ route('admin.jadwal') }}"
                    >

                        <span class="menu-icon">
                            ◫
                        </span>

                        Jadwal

                    </a>


                    <!-- SESI ABSENSI -->

                    <a
                        href="{{ route('admin.sesi-absensi') }}"
                    >

                        <span class="menu-icon">
                            ◈
                        </span>

                        Sesi Absensi

                    </a>


                    <!-- KEHADIRAN -->

                    <a
                        href="{{ route('admin.kehadiran') }}"
                    >

                        <span class="menu-icon">
                            ▤
                        </span>

                        Kehadiran

                    </a>


                    <!-- PENGAJUAN -->

                    <a
                        href="{{ route('admin.pengajuan-absensi') }}"
                    >

                        <span class="menu-icon">
                            ◌
                        </span>

                        Pengajuan Absensi

                    </a>


                    <!-- LAPORAN -->

                    <a
                        href="{{ route('admin.laporan') }}"
                    >

                        <span class="menu-icon">
                            ◷
                        </span>

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
                        Mahasiswa
                    </strong>

                </div>


                <div class="top-profile">

                    <div class="top-avatar">

                        {{ strtoupper(substr(auth()->user()->admin->nama ?? 'A', 0, 1)) }}

                    </div>


                    <span>

                        {{ auth()->user()->admin->nama ?? 'Administrator' }}

                    </span>

                </div>


            </div>


            <!-- =================================================
                 PAGE HEADER
            ================================================== -->

            <section class="page-header">

                <div class="page-header-content">


                    <h1>

                        Kelola
                        <span>Mahasiswa</span>

                    </h1>


                    <p>

                        Tambah, lihat, ubah, dan hapus
                        data mahasiswa yang terdaftar dalam sistem.

                    </p>


                </div>

            </section>


            <!-- =================================================
                 SUCCESS
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
                 ERROR
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
                 TOOLBAR
            ================================================== -->

            <div class="toolbar">


                <!-- SEARCH -->

                <div class="search-box">

                    <span class="search-icon">
                        ⌕
                    </span>


                    <input
                        type="text"
                        id="searchMahasiswa"
                        placeholder="Cari nama, NPM, email, atau kelas..."
                        autocomplete="off"
                    >

                </div>


                <!-- ADD -->

                <a
                    href="{{ route('admin.mahasiswa.create') }}"
                    class="add-btn"
                >

                    <span>
                        +
                    </span>

                    Tambah Mahasiswa

                </a>


            </div>


            <!-- =================================================
                 DATA CARD
            ================================================== -->

            <section class="data-card">


                <div class="data-header">

                    <h2>
                        Daftar Mahasiswa
                    </h2>


                    <span>

                        <span id="totalVisible">
                            {{ $mahasiswa->count() }}
                        </span>

                        mahasiswa

                    </span>

                </div>


                @if($mahasiswa->count() > 0)


                    <!-- TABLE -->

                    <div class="table-wrapper">

                        <table id="mahasiswaTable">


                            <thead>

                                <tr>

                                    <th>
                                        Mahasiswa
                                    </th>

                                    <th>
                                        NPM
                                    </th>

                                    <th>
                                        Program Studi
                                    </th>

                                    <th>
                                        Kelas
                                    </th>

                                    <th>
                                        No. HP
                                    </th>

                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach($mahasiswa as $item)


                                    <tr
                                        class="mahasiswa-row"
                                        data-search="{{ strtolower(
                                            ($item->nama ?? '') . ' ' .
                                            ($item->npm ?? '') . ' ' .
                                            ($item->user->email ?? '') . ' ' .
                                            ($item->program_studi ?? '') . ' ' .
                                            ($item->kelas ?? '') . ' ' .
                                            ($item->no_hp ?? '')
                                        ) }}"
                                    >


                                        <!-- MAHASISWA -->

                                        <td>

                                            <div class="student">


                                                <div class="student-avatar">

                                                    {{ strtoupper(
                                                        substr(
                                                            $item->nama ?? 'M',
                                                            0,
                                                            1
                                                        )
                                                    ) }}

                                                </div>


                                                <div class="student-info">

                                                    <div class="student-name">

                                                        {{ $item->nama ?? '-' }}

                                                    </div>


                                                    <div class="student-email">

                                                        {{ $item->user->email ?? '-' }}

                                                    </div>

                                                </div>


                                            </div>

                                        </td>


                                        <!-- NPM -->

                                        <td>

                                            <div class="npm">

                                                {{ $item->npm ?? '-' }}

                                            </div>

                                        </td>


                                        <!-- PROGRAM STUDI -->

                                        <td>

                                            @if($item->program_studi)

                                                <div class="regular-text">

                                                    {{ $item->program_studi }}

                                                </div>

                                            @else

                                                <div class="muted-text">
                                                    Belum diisi
                                                </div>

                                            @endif

                                        </td>


                                        <!-- KELAS -->

                                        <td>

                                            @if($item->kelas)

                                                <div class="regular-text">

                                                    {{ $item->kelas }}

                                                </div>

                                            @else

                                                <div class="muted-text">
                                                    Belum diisi
                                                </div>

                                            @endif

                                        </td>


                                        <!-- NO HP -->

                                        <td>

                                            @if($item->no_hp)

                                                <div class="regular-text">

                                                    {{ $item->no_hp }}

                                                </div>

                                            @else

                                                <div class="muted-text">
                                                    -
                                                </div>

                                            @endif

                                        </td>


                                        <!-- AKSI -->

                                        <td>

                                            <div class="actions">


                                                <!-- EDIT -->

                                                <a
                                                    href="{{ route('admin.mahasiswa.edit', $item->id) }}"
                                                    class="action-btn edit-btn"
                                                >

                                                    Edit

                                                </a>


                                                <!-- DELETE -->

                                                <form
                                                    action="{{ route('admin.mahasiswa.destroy', $item->id) }}"
                                                    method="POST"
                                                    class="delete-form"
                                                >

                                                    @csrf

                                                    @method('DELETE')


                                                    <button
                                                        type="submit"
                                                        class="action-btn delete-btn"
                                                    >

                                                        Hapus

                                                    </button>

                                                </form>


                                            </div>

                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>


                        </table>

                    </div>


                    <!-- SEARCH NO RESULT -->

                    <div
                        class="no-result"
                        id="noResult"
                    >

                        <h3>
                            Data Tidak Ditemukan
                        </h3>


                        <p>
                            Tidak ada mahasiswa yang cocok dengan pencarian.
                        </p>

                    </div>


                @else


                    <!-- EMPTY -->

                    <div class="empty">


                        <div class="empty-icon">
                            ◉
                        </div>


                        <h3>
                            Belum Ada Mahasiswa
                        </h3>


                        <p>
                            Belum ada data mahasiswa yang terdaftar.
                            Silakan tambahkan mahasiswa baru.
                        </p>


                    </div>


                @endif


            </section>


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
                   SIDEBAR ELEMENT
                ================================================= */

                const sidebar =
                    document.getElementById('sidebar');

                const overlay =
                    document.getElementById('sidebarOverlay');

                const hamburger =
                    document.getElementById('hamburgerButton');


                /* =================================================
                   SIDEBAR TOGGLE
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
                   SIDEBAR CLOSE
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
                   MENU MOBILE
                ================================================= */

                document
                    .querySelectorAll('.menu a:not(.menu-disabled)')
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


                /* =================================================
                   SEARCH MAHASISWA
                ================================================= */

                const searchInput =
                    document.getElementById('searchMahasiswa');

                const rows =
                    document.querySelectorAll('.mahasiswa-row');

                const noResult =
                    document.getElementById('noResult');

                const totalVisible =
                    document.getElementById('totalVisible');


                if (searchInput) {

                    searchInput.addEventListener(
                        'input',
                        function () {

                            const keyword =
                                this.value
                                    .trim()
                                    .toLowerCase();

                            let visibleCount = 0;


                            rows.forEach(
                                function (row) {

                                    const searchData =
                                        row.dataset.search || '';


                                    const matched =
                                        searchData.includes(
                                            keyword
                                        );


                                    row.style.display =
                                        matched
                                            ? ''
                                            : 'none';


                                    if (matched) {

                                        visibleCount++;

                                    }

                                }
                            );


                            if (totalVisible) {

                                totalVisible.textContent =
                                    visibleCount;

                            }


                            if (noResult) {

                                if (
                                    rows.length > 0 &&
                                    visibleCount === 0
                                ) {

                                    noResult.classList.add('show');

                                } else {

                                    noResult.classList.remove(
                                        'show'
                                    );

                                }

                            }

                        }
                    );

                }


                /* =================================================
                   DELETE CONFIRMATION
                ================================================= */

                document
                    .querySelectorAll('.delete-form')
                    .forEach(
                        function (form) {

                            form.addEventListener(
                                'submit',
                                function (event) {

                                    const confirmed =
                                        window.confirm(
                                            'Yakin ingin menghapus mahasiswa ini? Data akun login mahasiswa juga akan dihapus.'
                                        );


                                    if (!confirmed) {

                                        event.preventDefault();

                                    }

                                }
                            );

                        }
                    );


            }
        );

    </script>


</body>

</html>