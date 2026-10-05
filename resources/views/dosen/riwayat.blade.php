<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Riwayat | Absensi QR</title>

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
                var(--text);

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

            top:
                0;

            left:
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
           FILTER
        ===================================================== */

        .filter-card {

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

            padding:
                22px;

            margin-bottom:
                18px;

            box-shadow:
                var(--shadow);
        }


        .filter-title {

            color:
                #f8fafc;

            font-size:
                15px;

            font-weight:
                850;

            margin-bottom:
                16px;
        }


        .filter-form {

            display:
                grid;

            grid-template-columns:
                1fr 1fr auto;

            gap:
                12px;

            align-items:
                end;
        }


        .form-group {

            display:
                flex;

            flex-direction:
                column;

            gap:
                7px;
        }


        .form-group label {

            color:
                #788399;

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                0.7px;
        }


        .form-control {

            width:
                100%;

            min-height:
                42px;

            padding:
                10px 12px;

            border:
                1px solid var(--border);

            border-radius:
                10px;

            outline:
                none;

            background:
                rgba(255, 255, 255, 0.025);

            color:
                #e8edf6;

            font-family:
                inherit;

            font-size:
                12px;

            transition:
                border-color 0.25s ease,
                background 0.25s ease;
        }


        .form-control:focus {

            border-color:
                rgba(118, 87, 255, 0.55);

            background:
                rgba(118, 87, 255, 0.04);
        }


        .form-control option {

            background:
                #111827;

            color:
                #ffffff;
        }


        .filter-actions {

            display:
                flex;

            gap:
                8px;
        }


        .btn {

            min-height:
                42px;

            padding:
                10px 17px;

            border-radius:
                10px;

            font-size:
                11px;

            font-weight:
                800;

            cursor:
                pointer;

            text-decoration:
                none;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            white-space:
                nowrap;

            transition:
                all 0.25s ease;
        }


        .btn:hover {

            transform:
                translateY(-2px);
        }


        .btn-primary {

            border:
                none;

            background:
                var(--gradient);

            color:
                #ffffff;

            box-shadow:
                0 8px 20px
                rgba(118, 87, 255, 0.2);
        }


        .btn-secondary {

            border:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.035);

            color:
                #a7afc0;
        }


        .btn-secondary:hover {

            color:
                #ffffff;

            border-color:
                rgba(118, 87, 255, 0.3);
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary {

            position:
                relative;

            z-index:
                2;

            display:
                grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap:
                12px;

            margin-bottom:
                18px;
        }


        .summary-card {

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                15px;

            padding:
                18px;

            box-shadow:
                var(--shadow);

            transition:
                all 0.25s ease;
        }


        .summary-card:hover {

            border-color:
                rgba(118, 87, 255, 0.28);

            background:
                var(--card-hover);

            transform:
                translateY(-2px);
        }


        .summary-label {

            color:
                #737e94;

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                0.8px;

            margin-bottom:
                8px;
        }


        .summary-value {

            color:
                #ffffff;

            font-size:
                25px;

            font-weight:
                900;
        }


        /* =====================================================
           HISTORY CARD
        ===================================================== */

        .history-card {

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


        .history-head {

            padding:
                21px 23px;

            border-bottom:
                1px solid var(--border);

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;
        }


        .history-head h2 {

            font-size:
                16px;

            font-weight:
                850;

            color:
                #ffffff;
        }


        .history-head span {

            font-size:
                11px;

            font-weight:
                600;

            color:
                #727d93;
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

            border-collapse:
                collapse;

            min-width:
                950px;
        }


        thead {

            background:
                rgba(255, 255, 255, 0.02);
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
                16px 14px;

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
           COURSE
        ===================================================== */

        .course-name {

            color:
                #f0f3f8;

            font-size:
                12px;

            font-weight:
                800;

            margin-bottom:
                4px;
        }


        .course-code {

            color:
                #68738a;

            font-size:
                10px;
        }


        /* =====================================================
           CLASS
        ===================================================== */

        .class-name {

            color:
                #dce2ed;

            font-size:
                11px;

            font-weight:
                750;
        }


        /* =====================================================
           DATE
        ===================================================== */

        .date-wrapper {

            display:
                flex;

            flex-direction:
                column;

            gap:
                4px;
        }


        .date-main {

            color:
                #f3f5f9;

            font-size:
                11px;

            font-weight:
                750;
        }


        .date-day {

            color:
                #6d788e;

            font-size:
                10px;
        }


        /* =====================================================
           TIME
        ===================================================== */

        .time {

            color:
                #a9b2c5;

            font-size:
                11px;

            line-height:
                1.6;

            white-space:
                nowrap;
        }


        /* =====================================================
           ROOM
        ===================================================== */

        .room {

            color:
                #9ba6ba;

            font-size:
                11px;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                6px 9px;

            border-radius:
                8px;

            font-size:
                9px;

            font-weight:
                850;

            text-transform:
                uppercase;

            white-space:
                nowrap;
        }


        .status-active {

            background:
                rgba(34, 197, 94, 0.1);

            border:
                1px solid
                rgba(34, 197, 94, 0.2);

            color:
                #76e79a;
        }


        .status-finished {

            background:
                rgba(148, 163, 184, 0.08);

            border:
                1px solid
                rgba(148, 163, 184, 0.15);

            color:
                #a0aabc;
        }


        /* =====================================================
           ATTENDANCE
        ===================================================== */

        .attendance-stats {

            display:
                flex;

            flex-wrap:
                wrap;

            gap:
                5px;
        }


        .mini-stat {

            display:
                inline-flex;

            padding:
                5px 7px;

            border-radius:
                6px;

            font-size:
                9px;

            font-weight:
                800;

            white-space:
                nowrap;
        }


        .mini-hadir {

            background:
                rgba(34, 197, 94, 0.08);

            color:
                #72e499;
        }


        .mini-terlambat {

            background:
                rgba(245, 158, 11, 0.08);

            color:
                #efbd5f;
        }


        .mini-izin {

            background:
                rgba(77, 156, 255, 0.08);

            color:
                #77b7ff;
        }


        .mini-sakit {

            background:
                rgba(236, 72, 153, 0.08);

            color:
                #f58bb9;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty {

            text-align:
                center;

            padding:
                65px 20px;
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
                rgba(118, 87, 255, 0.16);

            font-size:
                23px;
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
           RESPONSIVE MOBILE
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


            /* PAGE HEADER */

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


            /* FILTER */

            .filter-card {

                padding:
                    19px;
            }


            .filter-form {

                grid-template-columns:
                    1fr;
            }


            .filter-actions {

                width:
                    100%;
            }


            .filter-actions .btn {

                flex:
                    1;
            }


            /* SUMMARY */

            .summary {

                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }


            .summary-card {

                padding:
                    13px;
            }


            .summary-value {

                font-size:
                    20px;
            }


            /* HISTORY */

            .history-head {

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


            .summary {

                grid-template-columns:
                    1fr;
            }


            .summary-card {

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    space-between;
            }


            .summary-label {

                margin-bottom:
                    0;
            }


            .page-header h1 {

                font-size:
                    21px;
            }


            .history-head {

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
                        class="active"
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
                 TOPBAR
            ================================================== -->

            <div class="topbar">


                <div class="page-title">

                    Dashboard

                    <span>
                        /
                    </span>

                    <strong>
                        Riwayat
                    </strong>

                </div>


                <div class="top-profile">

                    <div class="top-avatar">

                        {{ strtoupper(substr($dosen->nama, 0, 1)) }}

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

                <div class="page-header-content">

                    <h1>
                        Riwayat
                        <span>Absensi</span>
                    </h1>


                    <p>
                        Lihat seluruh riwayat sesi absensi
                        yang pernah dibuat untuk mata kuliah Anda.
                    </p>

                </div>

            </section>


            <!-- =================================================
                 FILTER
            ================================================== -->

            <section class="filter-card">


                <div class="filter-title">
                    Filter Riwayat
                </div>


                <form
                    action="{{ route('dosen.riwayat') }}"
                    method="GET"
                    class="filter-form"
                >


                    <!-- MATA KULIAH -->

                    <div class="form-group">

                        <label for="mata_kuliah_id">
                            Mata Kuliah
                        </label>


                        <select
                            name="mata_kuliah_id"
                            id="mata_kuliah_id"
                            class="form-control"
                        >

                            <option value="">
                                Semua Mata Kuliah
                            </option>


                            @foreach($mataKuliahs as $mataKuliah)

                                <option
                                    value="{{ $mataKuliah->id }}"
                                    @selected(request('mata_kuliah_id') == $mataKuliah->id)
                                >

                                    {{ $mataKuliah->kode }}
                                    -
                                    {{ $mataKuliah->nama }}

                                </option>

                            @endforeach


                        </select>

                    </div>


                    <!-- TANGGAL -->

                    <div class="form-group">

                        <label for="tanggal">
                            Tanggal
                        </label>


                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            class="form-control"
                            value="{{ request('tanggal') }}"
                        >

                    </div>


                    <!-- BUTTON -->

                    <div class="filter-actions">


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Terapkan Filter
                        </button>


                        <a
                            href="{{ route('dosen.riwayat') }}"
                            class="btn btn-secondary"
                        >
                            Reset
                        </a>


                    </div>


                </form>

            </section>


            <!-- =================================================
                 SUMMARY
            ================================================== -->

            <div class="summary">


                <!-- TOTAL SESI -->

                <div class="summary-card">

                    <div class="summary-label">
                        Total Sesi
                    </div>


                    <div class="summary-value">
                        {{ $totalSesi }}
                    </div>

                </div>


                <!-- TOTAL SCAN -->

                <div class="summary-card">

                    <div class="summary-label">
                        Total Scan
                    </div>


                    <div class="summary-value">
                        {{ $totalAbsensi }}
                    </div>

                </div>


                <!-- TOTAL HADIR -->

                <div class="summary-card">

                    <div class="summary-label">
                        Total Hadir
                    </div>


                    <div class="summary-value">
                        {{ $totalHadir }}
                    </div>

                </div>


            </div>


            <!-- =================================================
                 HISTORY
            ================================================== -->

            <section class="history-card">


                <!-- HEADER -->

                <div class="history-head">

                    <h2>
                        Riwayat Sesi Absensi
                    </h2>


                    <span>
                        {{ $riwayat->count() }} sesi
                    </span>

                </div>


                @if($riwayat->count() > 0)


                    <!-- =================================================
                         TABLE
                    ================================================== -->

                    <div class="table-wrapper">

                        <table>


                            <thead>

                                <tr>

                                    <th>
                                        Mata Kuliah
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
                                        Ruangan
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Kehadiran
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach($riwayat as $item)


                                    <tr>


                                        <!-- MATA KULIAH -->

                                        <td>

                                            <div class="course-name">

                                                {{ $item->jadwal->mataKuliah->nama ?? '-' }}

                                            </div>


                                            <div class="course-code">

                                                {{ $item->jadwal->mataKuliah->kode ?? '-' }}

                                            </div>

                                        </td>


                                        <!-- KELAS -->

                                        <td>

                                            <div class="class-name">

                                                {{ $item->jadwal->kelas->nama ?? '-' }}

                                            </div>

                                        </td>


                                        <!-- TANGGAL -->

                                        <td>

                                            <div class="date-wrapper">


                                                <div class="date-main">

                                                    {{ $item->tanggal->format('d M Y') }}

                                                </div>


                                                <div class="date-day">

                                                    {{ $item->tanggal->locale('id')->translatedFormat('l') }}

                                                </div>


                                            </div>

                                        </td>


                                        <!-- WAKTU -->

                                        <td>

                                            <div class="time">

                                                {{ substr($item->jam_mulai, 0, 5) }}

                                                -

                                                {{ substr($item->jam_selesai, 0, 5) }}

                                            </div>

                                        </td>


                                        <!-- RUANGAN -->

                                        <td>

                                            <div class="room">

                                                {{ $item->jadwal->ruangan ?? '-' }}

                                            </div>

                                        </td>


                                        <!-- STATUS -->

                                        <td>

                                            @if($item->aktif)

                                                <span class="status status-active">
                                                    Aktif
                                                </span>

                                            @else

                                                <span class="status status-finished">
                                                    Selesai
                                                </span>

                                            @endif

                                        </td>


                                        <!-- KEHADIRAN -->

                                        <td>

                                            <div class="attendance-stats">


                                                <!-- HADIR -->

                                                <span class="mini-stat mini-hadir">

                                                    Hadir:
                                                    {{ $item->total_hadir }}

                                                </span>


                                                <!-- TERLAMBAT -->

                                                <span class="mini-stat mini-terlambat">

                                                    Telat:
                                                    {{ $item->total_terlambat }}

                                                </span>


                                                <!-- IZIN -->

                                                <span class="mini-stat mini-izin">

                                                    Izin:
                                                    {{ $item->total_izin }}

                                                </span>


                                                <!-- SAKIT -->

                                                <span class="mini-stat mini-sakit">

                                                    Sakit:
                                                    {{ $item->total_sakit }}

                                                </span>


                                            </div>

                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>


                        </table>

                    </div>


                @else


                    <!-- =================================================
                         EMPTY STATE
                    ================================================== -->

                    <div class="empty">


                        <div class="empty-icon">
                            ◷
                        </div>


                        <h3>
                            Belum Ada Riwayat
                        </h3>


                        <p>
                            Belum ada sesi absensi yang sesuai
                            dengan filter yang dipilih.
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
                   ELEMENT
                ================================================= */

                const sidebar =
                    document.getElementById('sidebar');

                const overlay =
                    document.getElementById('sidebarOverlay');

                const hamburger =
                    document.getElementById('hamburgerButton');


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
                   ESCAPE
                ================================================= */

                document.addEventListener(
                    'keydown',
                    function (event) {

                        if (event.key === 'Escape') {

                            closeSidebar();

                        }

                    }
                );


                /* =================================================
                   MENU CLICK PADA MOBILE
                ================================================= */

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