<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan | Admin - Absensi QR</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {

            --bg: #070b16;

            --sidebar: rgba(9, 13, 27, 0.97);

            --card: rgba(17, 24, 39, 0.78);

            --card-hover: rgba(22, 30, 48, 0.92);

            --border: rgba(148, 163, 184, 0.16);

            --border-hover: rgba(124, 92, 255, 0.50);

            --text: #f8fafc;

            --muted: #8b95aa;

            --muted-light: #a9b2c5;

            --purple: #7657ff;

            --blue: #4d9cff;

            --gradient:
                linear-gradient(
                    135deg,
                    #7657ff 0%,
                    #4d9cff 100%
                );

            --green: #4ade80;

            --red: #ff5d73;

            --yellow: #facc15;

            --radius: 18px;

            --shadow:
                0 20px 50px rgba(0, 0, 0, 0.30);
        }


        html {
            min-height: 100%;
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

            color: var(--text);

            overflow-x: hidden;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        button,
        input {
            font: inherit;
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

            padding: 28px 18px 20px;

            display: flex;

            flex-direction: column;

            background:
                linear-gradient(
                    180deg,
                    rgba(13, 17, 35, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            z-index: 1000;

            overflow: hidden;

            transition:
                transform .35s ease;
        }


        .logo {

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 5px 10px;

            margin-bottom: 25px;
        }


        .logo-icon {

            width: 42px;
            height: 42px;

            border-radius: 12px;

            background: var(--gradient);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 16px;

            color: white;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, .35);
        }


        .logo-text {

            font-size: 18px;

            font-weight: 900;

            letter-spacing: -.4px;
        }


        .logo-text span {

            background:
                linear-gradient(
                    90deg,
                    #927cff,
                    #4d9cff
                );

            -webkit-background-clip: text;

            background-clip: text;

            color: transparent;
        }


        .sidebar-menu {

            flex: 1;

            overflow-y: auto;

            padding-right: 4px;

            scrollbar-width: thin;

            scrollbar-color:
                #7657ff
                transparent;
        }


        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }


        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }


        .sidebar-menu::-webkit-scrollbar-thumb {

            background:
                linear-gradient(
                    180deg,
                    #7657ff,
                    #4d9cff
                );

            border-radius: 20px;
        }


        .menu-label {

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.4px;

            text-transform: uppercase;

            color: #5f6980;

            padding: 0 13px;

            margin-top: 4px;

            margin-bottom: 9px;
        }


        .menu-label:not(:first-child) {
            margin-top: 24px;
        }


        .menu a {

            position: relative;

            display: flex;

            align-items: center;

            gap: 12px;

            min-height: 45px;

            padding: 11px 13px;

            margin-bottom: 5px;

            color: #8993a8;

            border-radius: 11px;

            font-size: 12px;

            font-weight: 700;

            transition:
                all .25s ease;
        }


        .menu a:hover {

            background:
                rgba(118, 87, 255, .09);

            color: white;

            transform:
                translateX(3px);
        }


        .menu a.active {

            color: white;

            background:
                linear-gradient(
                    90deg,
                    rgba(118, 87, 255, .22),
                    rgba(77, 156, 255, .08)
                );

            box-shadow:
                inset 0 0 0 1px
                rgba(118, 87, 255, .18);
        }


        .menu a.active::before {

            content: "";

            position: absolute;

            left: 0;

            top: 9px;
            bottom: 9px;

            width: 3px;

            border-radius: 10px;

            background:
                linear-gradient(
                    180deg,
                    #7657ff,
                    #4d9cff
                );

            box-shadow:
                0 0 12px
                rgba(118, 87, 255, .80);
        }


        .menu-icon {

            width: 20px;
            min-width: 20px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 14px;
        }


        /* =====================================================
           SIDEBAR FOOTER
        ===================================================== */

        .sidebar-footer {

            margin-top: 12px;

            padding-top: 16px;

            border-top:
                1px solid var(--border);
        }


        .user-card {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 9px;

            border-radius: 12px;

            background:
                rgba(255,255,255,.025);

            border:
                1px solid var(--border);
        }


        .user-avatar {

            width: 35px;
            height: 35px;

            flex-shrink: 0;

            border-radius: 10px;

            background:
                var(--gradient);

            display: flex;

            align-items: center;
            justify-content: center;

            color: white;

            font-size: 13px;

            font-weight: 900;
        }


        .user-info {

            display: flex;

            flex-direction: column;

            min-width: 0;
        }


        .user-info strong {

            font-size: 11px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .user-info span {

            margin-top: 2px;

            font-size: 9px;

            color: var(--muted);
        }


        .logout {

            margin-top: 10px;

            padding-top: 12px;
        }


        .logout button {

            width: 100%;

            min-height: 42px;

            border:
                1px solid var(--border);

            background:
                rgba(255,255,255,.025);

            color: #a7afc0;

            padding: 10px;

            border-radius: 11px;

            font-size: 11px;

            font-weight: 700;

            cursor: pointer;

            transition: .25s ease;
        }


        .logout button:hover {

            color: white;

            background:
                rgba(239,68,68,.08);

            border-color:
                rgba(239,68,68,.35);

            transform:
                translateY(-2px);
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            width:
                calc(100% - 255px);

            margin-left: 255px;

            min-height: 100vh;

            padding:
                32px 35px 50px;

            position: relative;
        }


        .main::before {

            content: "";

            position: fixed;

            width: 420px;
            height: 420px;

            border-radius: 50%;

            background:
                rgba(118,87,255,.07);

            filter: blur(80px);

            top: -180px;
            right: -150px;

            pointer-events: none;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .page-title {

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .mobile-menu {

            display: none;
        }


        .page-title h1 {

            font-size: 22px;

            font-weight: 850;

            letter-spacing: -.4px;
        }


        .page-title p {

            margin-top: 4px;

            color: var(--muted);

            font-size: 11px;
        }


        .topbar-actions {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .icon-button {

            width: 39px;
            height: 39px;

            border:
                1px solid var(--border);

            background:
                rgba(255,255,255,.025);

            color: #9ba6ba;

            border-radius: 11px;

            cursor: pointer;

            transition: .25s ease;
        }


        .icon-button:hover {

            color: white;

            border-color:
                rgba(118,87,255,.4);

            background:
                rgba(118,87,255,.08);
        }


        .top-profile {

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 6px 10px;

            border:
                1px solid var(--border);

            border-radius: 11px;

            background:
                rgba(255,255,255,.025);
        }


        .top-avatar {

            width: 29px;
            height: 29px;

            border-radius: 9px;

            background:
                var(--gradient);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 11px;

            font-weight: 900;
        }


        .top-profile span {

            font-size: 11px;

            font-weight: 700;

            color: #dce2ef;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    115deg,
                    rgba(42,32,93,.90),
                    rgba(22,34,71,.78)
                );

            border:
                1px solid
                rgba(124,92,255,.20);

            border-radius: 20px;

            padding:
                29px 32px;

            margin-bottom: 20px;

            box-shadow:
                0 20px 55px
                rgba(0,0,0,.22);
        }


        .page-header::after {

            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background:
                rgba(77,156,255,.12);

            filter: blur(45px);

            right: -80px;
            top: -100px;

            pointer-events: none;
        }


        .page-header-content {

            position: relative;

            z-index: 2;
        }


        .page-header h2 {

            font-size: 29px;

            line-height: 1.2;

            font-weight: 850;

            letter-spacing: -.7px;

            margin-bottom: 8px;
        }


        .page-header h2 span {

            background:
                linear-gradient(
                    90deg,
                    #a58fff,
                    #62adff
                );

            -webkit-background-clip: text;

            background-clip: text;

            color: transparent;
        }


        .page-header p {

            color: #9ba6ba;

            font-size: 13px;

            line-height: 1.6;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {

            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 18px;

            padding: 13px 15px;

            border-radius: 12px;

            font-size: 11px;
        }


        .alert-success {

            background:
                rgba(74,222,128,.08);

            border:
                1px solid rgba(74,222,128,.18);

            color: #8ef0ae;
        }


        .alert-danger {

            background:
                rgba(255,93,115,.08);

            border:
                1px solid rgba(255,93,115,.20);

            color: #ff9ba8;

            align-items: flex-start;
        }


        .alert-danger ul {

            padding-left: 17px;
        }


        /* =====================================================
           SETTINGS GRID
        ===================================================== */

        .settings-grid {

            position: relative;

            z-index: 2;

            display: grid;

            grid-template-columns:
                minmax(0, 1.35fr)
                minmax(320px, .65fr);

            gap: 18px;

            align-items: start;
        }


        .settings-card {

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius);

            box-shadow:
                var(--shadow);

            overflow: hidden;

            transition:
                .25s ease;
        }


        .settings-card:hover {

            border-color:
                rgba(118,87,255,.22);
        }


        .settings-card-header {

            display: flex;

            align-items: center;

            gap: 13px;

            padding:
                20px 22px;

            border-bottom:
                1px solid var(--border);
        }


        .settings-icon {

            width: 42px;
            height: 42px;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    rgba(118,87,255,.18),
                    rgba(77,156,255,.10)
                );

            border:
                1px solid
                rgba(118,87,255,.18);

            color: #a58fff;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 16px;
        }


        .settings-card-header h3 {

            font-size: 14px;

            font-weight: 850;
        }


        .settings-card-header p {

            margin-top: 4px;

            color: var(--muted);

            font-size: 10px;
        }


        .settings-card-body {

            padding: 22px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-row {

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 15px;
        }


        .form-group {

            margin-bottom: 17px;
        }


        .form-group:last-child {
            margin-bottom: 0;
        }


        .form-label {

            display: block;

            margin-bottom: 7px;

            color: #a9b2c5;

            font-size: 10px;

            font-weight: 750;
        }


        .form-control {

            width: 100%;

            padding:
                12px 13px;

            background:
                rgba(7,11,22,.65);

            border:
                1px solid var(--border);

            border-radius:
                10px;

            outline: none;

            color: white;

            font-size: 11px;

            transition:
                .25s ease;
        }


        .form-control::placeholder {
            color: #555f72;
        }


        .form-control:focus {

            border-color:
                var(--purple);

            box-shadow:
                0 0 0 3px
                rgba(118,87,255,.10);
        }


        .form-hint {

            display: block;

            margin-top: 6px;

            color: #5f6980;

            font-size: 9px;
        }


        /* =====================================================
           PASSWORD
        ===================================================== */

        .password-wrapper {

            position: relative;
        }


        .password-wrapper .form-control {

            padding-right: 42px;
        }


        .password-toggle {

            position: absolute;

            right: 12px;

            top: 50%;

            transform:
                translateY(-50%);

            border: none;

            background: transparent;

            color: #69748a;

            cursor: pointer;

            font-size: 11px;
        }


        .password-toggle:hover {
            color: white;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .form-actions {

            display: flex;

            justify-content: flex-end;

            padding-top: 19px;

            margin-top: 19px;

            border-top:
                1px solid var(--border);
        }


        .btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding:
                11px 16px;

            border: none;

            border-radius: 10px;

            font-size: 10px;

            font-weight: 800;

            cursor: pointer;

            transition:
                .25s ease;
        }


        .btn-primary {

            color: white;

            background:
                var(--gradient);

            box-shadow:
                0 8px 20px
                rgba(91,76,255,.20);
        }


        .btn-primary:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 12px 25px
                rgba(91,76,255,.30);
        }


        .btn-dark {

            color: white;

            background:
                rgba(255,255,255,.06);

            border:
                1px solid var(--border);
        }


        .btn-dark:hover {

            background:
                rgba(255,255,255,.10);

            border-color:
                rgba(118,87,255,.35);
        }


        /* =====================================================
           ACCOUNT INFO
        ===================================================== */

        .account-box {

            display: flex;

            align-items: center;

            gap: 14px;

            padding: 15px;

            border:
                1px solid var(--border);

            border-radius: 14px;

            background:
                rgba(7,11,22,.45);

            margin-bottom: 18px;
        }


        .large-avatar {

            width: 54px;
            height: 54px;

            flex-shrink: 0;

            border-radius: 15px;

            background:
                var(--gradient);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 19px;

            font-weight: 900;

            box-shadow:
                0 8px 25px
                rgba(100,80,255,.25);
        }


        .account-info {

            min-width: 0;
        }


        .account-info strong {

            display: block;

            font-size: 13px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .account-info span {

            display: block;

            margin-top: 4px;

            color: var(--muted);

            font-size: 10px;
        }


        .role-badge {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            margin-top: 7px;

            padding:
                4px 8px;

            border-radius: 20px;

            background:
                rgba(118,87,255,.10);

            border:
                1px solid
                rgba(118,87,255,.20);

            color: #a58fff;

            font-size: 8px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .5px;
        }


        /* =====================================================
           SYSTEM INFO
        ===================================================== */

        .info-list {

            display: flex;

            flex-direction: column;

            gap: 1px;
        }


        .info-item {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:
                12px 0;

            border-bottom:
                1px solid var(--border);
        }


        .info-item:last-child {
            border-bottom: none;
        }


        .info-label {

            display: flex;

            align-items: center;

            gap: 9px;

            color: var(--muted);

            font-size: 10px;
        }


        .info-label i {

            width: 18px;

            color: #7180a0;

            text-align: center;
        }


        .info-value {

            color: #e2e8f0;

            font-size: 10px;

            font-weight: 700;

            text-align: right;
        }


        .status-online {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            color: #8ef0ae;
        }


        .status-dot {

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #4ade80;

            box-shadow:
                0 0 8px
                rgba(74,222,128,.8);
        }


        /* =====================================================
           SECURITY TIPS
        ===================================================== */

        .security-tips {

            margin-top: 18px;

            padding: 15px;

            border-radius: 13px;

            background:
                rgba(118,87,255,.06);

            border:
                1px solid
                rgba(118,87,255,.13);
        }


        .security-tips-title {

            display: flex;

            align-items: center;

            gap: 7px;

            color: #b9adff;

            font-size: 10px;

            font-weight: 800;

            margin-bottom: 8px;
        }


        .security-tips ul {

            padding-left: 17px;

            color: #737e93;

            font-size: 9px;

            line-height: 1.8;
        }


        /* =====================================================
           FOOTER NOTE
        ===================================================== */

        .page-note {

            position: relative;

            z-index: 2;

            margin-top: 18px;

            padding: 15px 18px;

            border:
                1px solid var(--border);

            border-radius: 13px;

            background:
                rgba(255,255,255,.02);

            color: #667187;

            font-size: 9px;

            line-height: 1.6;
        }


        .page-note i {

            color: #6f7da0;

            margin-right: 6px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1100px) {

            .settings-grid {

                grid-template-columns:
                    1fr;
            }

        }


        @media (max-width: 850px) {

            .sidebar {

                transform:
                    translateX(-100%);
            }


            .sidebar.open {

                transform:
                    translateX(0);

                box-shadow:
                    15px 0 50px
                    rgba(0,0,0,.45);
            }


            .main {

                width: 100%;

                margin-left: 0;

                padding:
                    25px 20px 40px;
            }


            .mobile-menu {

                display: inline-flex;

                align-items: center;

                justify-content: center;
            }

        }


        @media (max-width: 650px) {

            .page-header {

                padding: 23px;
            }


            .page-header h2 {

                font-size: 23px;
            }


            .form-row {

                grid-template-columns: 1fr;
            }


            .settings-card-body {

                padding: 18px;
            }


            .top-profile span {

                display: none;
            }


            .top-profile {

                padding: 5px;
            }

        }


        @media (max-width: 480px) {

            .main {

                padding:
                    20px 14px 35px;
            }


            .page-title h1 {

                font-size: 18px;
            }


            .page-title p {

                font-size: 9px;
            }


            .page-header {

                border-radius: 16px;

                padding: 20px;
            }


            .settings-card {

                border-radius: 15px;
            }


            .settings-card-header {

                padding:
                    17px;
            }


            .settings-card-body {

                padding:
                    17px;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="sidebar" id="sidebar">


        <!-- LOGO -->

        <div class="logo">

            <div class="logo-icon">

                <i class="fas fa-qrcode"></i>

            </div>

            <div class="logo-text">

                Absensi <span>QR</span>

            </div>

        </div>


        <!-- MENU -->

        <div class="sidebar-menu">

            <div class="menu">


                <div class="menu-label">
                    Menu Utama
                </div>


                <a
                    href="{{ route('admin.dashboard') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-th-large"></i>
                    </span>

                    Dashboard

                </a>


                <a
                    href="{{ route('admin.mahasiswa') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-user-graduate"></i>
                    </span>

                    Mahasiswa

                </a>


                <a
                    href="{{ route('admin.dosen') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </span>

                    Dosen

                </a>


                <a
                    href="{{ route('admin.kelas') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-users"></i>
                    </span>

                    Kelas

                </a>


                <a
                    href="{{ route('admin.mata-kuliah') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-book"></i>
                    </span>

                    Mata Kuliah

                </a>



                <div class="menu-label">
                    Absensi
                </div>


                <a
                    href="{{ route('admin.sesi-absensi') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-qrcode"></i>
                    </span>

                    Sesi Absensi

                </a>


                <a
                    href="{{ route('admin.kehadiran') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-calendar-check"></i>
                    </span>

                    Data Kehadiran

                </a>


                <a
                    href="{{ route('admin.pengajuan-absensi') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-file-circle-check"></i>
                    </span>

                    Pengajuan Absensi

                </a>


                <a
                    href="{{ route('admin.laporan') }}"
                >

                    <span class="menu-icon">
                        <i class="fas fa-chart-bar"></i>
                    </span>

                    Laporan

                </a>



                <div class="menu-label">
                    Sistem
                </div>


                <a
                    href="{{ route('admin.pengaturan') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        <i class="fas fa-sliders"></i>
                    </span>

                    Pengaturan

                </a>


            </div>

        </div>


        <!-- USER -->

        <div class="sidebar-footer">

            <div class="user-card">

                <div class="user-avatar">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>


                <div class="user-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>

            </div>


            <div class="logout">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button type="submit">

                        <i class="fas fa-right-from-bracket"></i>

                        &nbsp;

                        Keluar dari Sistem

                    </button>

                </form>

            </div>

        </div>

    </aside>



    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main">


        <!-- TOPBAR -->

        <header class="topbar">


            <div class="page-title">


                <button
                    type="button"
                    class="icon-button mobile-menu"
                    id="mobileMenu"
                >

                    <i class="fas fa-bars"></i>

                </button>


                <div>

                    <h1>
                        Pengaturan
                    </h1>

                    <p>
                        Kelola konfigurasi dan keamanan akun administrator
                    </p>

                </div>

            </div>


            <div class="topbar-actions">


                <button
                    type="button"
                    class="icon-button"
                    onclick="window.location.reload()"
                    title="Refresh"
                >

                    <i class="fas fa-sync-alt"></i>

                </button>


                <div class="top-profile">

                    <div class="top-avatar">

                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                    </div>

                    <span>

                        {{ auth()->user()->name ?? 'Administrator' }}

                    </span>

                </div>

            </div>

        </header>



        <!-- =====================================================
             PAGE HEADER
        ====================================================== -->

        <section class="page-header">

            <div class="page-header-content">

                <h2>
                    Pengaturan <span>Admin</span>
                </h2>

                <p>
                    Atur informasi profil administrator dan keamanan
                    akun untuk menjaga sistem Absensi QR tetap aman.
                </p>

            </div>

        </section>



        <!-- =====================================================
             SUCCESS
        ====================================================== -->

        @if(session('success'))

            <div class="alert alert-success">

                <i class="fas fa-circle-check"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif



        <!-- =====================================================
             ERROR
        ====================================================== -->

        @if($errors->any())

            <div class="alert alert-danger">

                <i class="fas fa-circle-exclamation"></i>

                <div>

                    <strong>
                        Terjadi kesalahan:
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        @endif



        <!-- =====================================================
             SETTINGS
        ====================================================== -->

        <div class="settings-grid">


            <!-- =================================================
                 LEFT COLUMN
            ================================================== -->

            <div>


                <!-- PROFIL -->

                <section class="settings-card">


                    <div class="settings-card-header">

                        <div class="settings-icon">

                            <i class="fas fa-user-gear"></i>

                        </div>


                        <div>

                            <h3>
                                Profil Administrator
                            </h3>

                            <p>
                                Kelola informasi dasar akun administrator.
                            </p>

                        </div>

                    </div>


                    <div class="settings-card-body">


                        <!-- ACCOUNT PREVIEW -->

                        <div class="account-box">

                            <div class="large-avatar">

                                {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}

                            </div>


                            <div class="account-info">

                                <strong>
                                    {{ $user->name ?? 'Administrator' }}
                                </strong>

                                <span>
                                    {{ $user->email ?? '-' }}
                                </span>


                                <div class="role-badge">

                                    <i class="fas fa-shield-halved"></i>

                                    Administrator

                                </div>

                            </div>

                        </div>


                        <!-- FORM PROFIL -->

                        <form
                            action="{{ route('admin.pengaturan.profile.update') }}"
                            method="POST"
                        >

                            @csrf

                            @method('PUT')


                            <div class="form-row">


                                <div class="form-group">

                                    <label class="form-label">

                                        Nama Administrator

                                    </label>


                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Masukkan nama"
                                        required
                                    >

                                    <span class="form-hint">

                                        Nama yang ditampilkan pada sistem.

                                    </span>

                                </div>


                                <div class="form-group">

                                    <label class="form-label">

                                        Email

                                    </label>


                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email', $user->email) }}"
                                        placeholder="Masukkan email"
                                        required
                                    >

                                    <span class="form-hint">

                                        Email digunakan untuk identitas akun.

                                    </span>

                                </div>


                            </div>


                            <div class="form-actions">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >

                                    <i class="fas fa-save"></i>

                                    Simpan Perubahan

                                </button>

                            </div>


                        </form>

                    </div>

                </section>



                <!-- PASSWORD -->

                <section
                    class="settings-card"
                    style="margin-top:18px;"
                >


                    <div class="settings-card-header">

                        <div class="settings-icon">

                            <i class="fas fa-lock"></i>

                        </div>


                        <div>

                            <h3>
                                Keamanan Akun
                            </h3>

                            <p>
                                Perbarui password administrator.
                            </p>

                        </div>

                    </div>


                    <div class="settings-card-body">


                        <form
                            action="{{ route('admin.pengaturan.password.update') }}"
                            method="POST"
                        >

                            @csrf

                            @method('PUT')


                            <div class="form-group">

                                <label class="form-label">

                                    Password Lama

                                </label>


                                <div class="password-wrapper">

                                    <input
                                        type="password"
                                        name="current_password"
                                        id="current_password"
                                        class="form-control"
                                        placeholder="Masukkan password lama"
                                        required
                                    >


                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword('current_password', this)"
                                    >

                                        <i class="fas fa-eye"></i>

                                    </button>

                                </div>

                            </div>


                            <div class="form-row">


                                <div class="form-group">

                                    <label class="form-label">

                                        Password Baru

                                    </label>


                                    <div class="password-wrapper">

                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control"
                                            placeholder="Minimal 8 karakter"
                                            required
                                        >


                                        <button
                                            type="button"
                                            class="password-toggle"
                                            onclick="togglePassword('password', this)"
                                        >

                                            <i class="fas fa-eye"></i>

                                        </button>

                                    </div>

                                    <span class="form-hint">

                                        Gunakan password minimal 8 karakter.

                                    </span>

                                </div>


                                <div class="form-group">

                                    <label class="form-label">

                                        Konfirmasi Password

                                    </label>


                                    <div class="password-wrapper">

                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            class="form-control"
                                            placeholder="Ulangi password baru"
                                            required
                                        >


                                        <button
                                            type="button"
                                            class="password-toggle"
                                            onclick="togglePassword('password_confirmation', this)"
                                        >

                                            <i class="fas fa-eye"></i>

                                        </button>

                                    </div>

                                </div>


                            </div>


                            <div class="form-actions">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >

                                    <i class="fas fa-key"></i>

                                    Ubah Password

                                </button>

                            </div>


                        </form>


                        <!-- SECURITY TIPS -->

                        <div class="security-tips">

                            <div class="security-tips-title">

                                <i class="fas fa-shield-halved"></i>

                                Tips Keamanan

                            </div>


                            <ul>

                                <li>
                                    Gunakan password yang sulit ditebak.
                                </li>

                                <li>
                                    Jangan menggunakan password yang sama untuk akun lain.
                                </li>

                                <li>
                                    Jangan membagikan password administrator kepada pengguna lain.
                                </li>

                                <li>
                                    Lakukan perubahan password secara berkala.
                                </li>

                            </ul>

                        </div>

                    </div>

                </section>


            </div>



            <!-- =================================================
                 RIGHT COLUMN
            ================================================== -->

            <div>


                <!-- STATUS AKUN -->

                <section class="settings-card">


                    <div class="settings-card-header">

                        <div class="settings-icon">

                            <i class="fas fa-server"></i>

                        </div>


                        <div>

                            <h3>
                                Informasi Sistem
                            </h3>

                            <p>
                                Informasi akun dan sistem Absensi QR.
                            </p>

                        </div>

                    </div>


                    <div class="settings-card-body">


                        <div class="info-list">


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-user"></i>

                                    Nama

                                </div>


                                <div class="info-value">

                                    {{ $user->name ?? '-' }}

                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-envelope"></i>

                                    Email

                                </div>


                                <div class="info-value">

                                    {{ $user->email ?? '-' }}

                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-user-shield"></i>

                                    Role

                                </div>


                                <div class="info-value">

                                    Administrator

                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-circle-check"></i>

                                    Status

                                </div>


                                <div class="info-value">

                                    <span class="status-online">

                                        <span class="status-dot"></span>

                                        Aktif

                                    </span>

                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-calendar"></i>

                                    Akun Dibuat

                                </div>


                                <div class="info-value">

                                    {{ optional($user->created_at)->format('d M Y') ?? '-' }}

                                </div>

                            </div>


                        </div>

                    </div>

                </section>



                <!-- KEAMANAN -->

                <section
                    class="settings-card"
                    style="margin-top:18px;"
                >


                    <div class="settings-card-header">

                        <div class="settings-icon">

                            <i class="fas fa-shield-halved"></i>

                        </div>


                        <div>

                            <h3>
                                Keamanan
                            </h3>

                            <p>
                                Status keamanan akun administrator.
                            </p>

                        </div>

                    </div>


                    <div class="settings-card-body">


                        <div class="info-list">


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-lock"></i>

                                    Password

                                </div>


                                <div class="info-value">

                                    Terlindungi

                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-user-shield"></i>

                                    Hak Akses

                                </div>


                                <div class="info-value">

                                    Admin

                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-database"></i>

                                    Database

                                </div>


                                <div class="info-value">

                                    MySQL

                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-label">

                                    <i class="fas fa-circle-check"></i>

                                    Sistem

                                </div>


                                <div class="info-value">

                                    <span class="status-online">

                                        <span class="status-dot"></span>

                                        Online

                                    </span>

                                </div>

                            </div>


                        </div>


                    </div>

                </section>



                <!-- CATATAN -->

                <div class="page-note">

                    <i class="fas fa-circle-info"></i>

                    Halaman ini digunakan untuk mengelola informasi
                    administrator dan keamanan akun. Pastikan informasi
                    yang digunakan selalu benar dan password tidak
                    dibagikan kepada pengguna lain.

                </div>


            </div>


        </div>


    </main>



    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        /*
        |--------------------------------------------------------------------------
        | MOBILE SIDEBAR
        |--------------------------------------------------------------------------
        */

        const mobileMenu =
            document.getElementById('mobileMenu');

        const sidebar =
            document.getElementById('sidebar');


        if (mobileMenu) {

            mobileMenu.addEventListener(
                'click',
                function () {

                    sidebar.classList.toggle('open');

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | PASSWORD TOGGLE
        |--------------------------------------------------------------------------
        */

        function togglePassword(
            inputId,
            button
        ) {

            const input =
                document.getElementById(inputId);

            const icon =
                button.querySelector('i');


            if (input.type === 'password') {

                input.type = 'text';

                icon.classList.remove('fa-eye');

                icon.classList.add('fa-eye-slash');

            } else {

                input.type = 'password';

                icon.classList.remove('fa-eye-slash');

                icon.classList.add('fa-eye');

            }

        }


        /*
        |--------------------------------------------------------------------------
        | CLOSE SIDEBAR WHEN CLICK OUTSIDE
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'click',
            function(event) {

                if (
                    window.innerWidth <= 850 &&
                    sidebar.classList.contains('open') &&
                    !sidebar.contains(event.target) &&
                    !mobileMenu.contains(event.target)
                ) {

                    sidebar.classList.remove('open');

                }

            }
        );

    </script>


</body>

</html>