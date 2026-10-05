<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Scan Absensi | Absensi QR</title>


    <!-- =====================================================
         HTML5 QR CODE
    ====================================================== -->

    <script
        src="https://unpkg.com/html5-qrcode"
        type="text/javascript">
    </script>


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
           COLOR
        ===================================================== */

        :root {

            --bg: #080c16;

            --sidebar: #0d1220;

            --card: #111827;

            --card-light: #151d2d;

            --border: rgba(255,255,255,0.08);

            --text: #f8fafc;

            --muted: #8993a7;

            --purple: #7c5cff;

            --blue: #4d9cff;

            --green: #32d583;

            --orange: #ffb547;

            --red: #ff6b7a;

        }


        /* =====================================================
           BODY
        ===================================================== */

        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: var(--bg);

            color: var(--text);

            min-height: 100vh;

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

            top: 0;
            left: 0;

            width: 260px;

            height: 100vh;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(124, 92, 255, 0.14),
                    transparent 35%
                ),
                var(--sidebar);

            border-right:
                1px solid var(--border);

            display: flex;

            flex-direction: column;

            z-index: 1000;

            overflow: hidden;

            transition: 0.3s ease;

        }


        /* =====================================================
           BRAND
        ===================================================== */

        .brand {

            padding: 25px 22px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .brand-icon {

            width: 43px;
            height: 43px;

            border-radius: 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 900;

            font-size: 17px;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            box-shadow:
                0 10px 30px
                rgba(92, 91, 255, 0.3);

        }


        .brand-text strong {

            display: block;

            font-size: 17px;

            letter-spacing: 0.5px;

        }


        .brand-text span {

            display: block;

            color: var(--muted);

            font-size: 11px;

            margin-top: 3px;

        }


        /* =====================================================
           SIDEBAR MENU
        ===================================================== */

        .sidebar-menu {

            padding: 22px 14px;

            flex: 1;
            min-height: 0;

            overflow-y: auto;
            overscroll-behavior: contain;
            scrollbar-width: thin;
            scrollbar-color: #55627a transparent;

        }

        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: #55627a;
            border-radius: 10px;
        }


        .menu-title {

            color: #5f687a;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.4px;

            margin:
                0 12px 10px;

        }


        .nav-item {

            display: flex;

            align-items: center;

            gap: 13px;

            width: 100%;

            padding: 12px 13px;

            margin-bottom: 5px;

            color: #9ba5b7;

            text-decoration: none;

            border-radius: 11px;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s;

        }


        .nav-item:hover {

            background:
                rgba(255,255,255,0.05);

            color: white;

        }


        .nav-item.active {

            color: white;

            background:
                linear-gradient(
                    90deg,
                    rgba(124, 92, 255, 0.22),
                    rgba(77, 156, 255, 0.08)
                );

            border:
                1px solid
                rgba(124,92,255,0.18);

            box-shadow:
                inset 3px 0 0
                var(--purple);

        }


        .nav-icon {

            width: 23px;

            text-align: center;

            font-size: 16px;

            flex-shrink: 0;

        }


        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .sidebar-bottom {

            flex-shrink: 0;

            padding: 17px;

            border-top:
                1px solid var(--border);

        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .profile-box {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 10px;

            margin-bottom: 10px;

            background:
                rgba(255,255,255,0.035);

            border:
                1px solid var(--border);

            border-radius: 12px;

        }


        .profile-avatar {

            width: 36px;
            height: 36px;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 14px;

            font-weight: 800;

            flex-shrink: 0;

        }


        .profile-info {

            min-width: 0;

        }


        .profile-info strong {

            display: block;

            font-size: 12px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .profile-info span {

            display: block;

            color: var(--muted);

            font-size: 10px;

            margin-top: 3px;

        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-button {

            width: 100%;

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 12px 13px;

            border: none;

            background: transparent;

            color: #9ba5b7;

            border-radius: 11px;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            text-align: left;

            transition: 0.2s;

        }


        .logout-button:hover {

            background:
                rgba(255,255,255,0.05);

            color: white;

        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left: 260px;

            min-height: 100vh;

            padding:
                28px 32px 50px;

        }


        /* =====================================================
           MOBILE HEADER
        ===================================================== */

        .mobile-header {

            display: none;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;

        }


        .mobile-brand {

            font-weight: 800;

            font-size: 17px;

        }


        .menu-toggle {

            width: 42px;
            height: 42px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: var(--card);

            color: white;

            cursor: pointer;

            font-size: 20px;

        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 30px;

        }


        .page-title h1 {

            font-size: 27px;

            letter-spacing: -0.5px;

        }


        .page-title p {

            color: var(--muted);

            font-size: 13px;

            margin-top: 7px;

        }


        .back-dashboard {

            display: flex;

            align-items: center;

            gap: 7px;

            padding: 9px 12px;

            border:
                1px solid var(--border);

            border-radius: 12px;

            background:
                rgba(255,255,255,0.025);

            color: #cbd5e1;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            transition: 0.2s;

        }


        .back-dashboard:hover {

            background:
                rgba(255,255,255,0.05);

            color: white;

        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content-grid {

            display: grid;

            grid-template-columns:
                1.5fr 1fr;

            gap: 20px;

            align-items: start;

        }


        .card {

            background: var(--card);

            border:
                1px solid var(--border);

            border-radius: 17px;

            overflow: hidden;

        }


        /* =====================================================
           SCANNER CARD
        ===================================================== */

        .scanner-card {

            padding: 24px;

        }


        .card-header {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            margin-bottom: 22px;

        }


        .card-header h2 {

            font-size: 18px;

            margin-bottom: 6px;

        }


        .card-header p {

            color: var(--muted);

            font-size: 12px;

            line-height: 1.5;

        }


        /* =====================================================
           SCANNER BADGE
        ===================================================== */

        .scanner-badge {

            display: flex;

            align-items: center;

            gap: 7px;

            padding: 7px 11px;

            border-radius: 999px;

            background:
                rgba(50,213,131,0.08);

            border:
                1px solid
                rgba(50,213,131,0.16);

            color: #75e6a9;

            font-size: 10px;

            font-weight: 700;

            white-space: nowrap;

        }


        .dot {

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background:
                var(--green);

            box-shadow:
                0 0 8px
                rgba(50,213,131,0.7);

        }


        /* =====================================================
           CAMERA AREA
        ===================================================== */

        .camera-area {

            background: #080c16;

            border:
                1px solid var(--border);

            border-radius: 15px;

            padding: 14px;

        }


        #reader {

            width: 100%;

            max-width: 520px;

            margin: auto;

            overflow: hidden;

            border-radius: 14px;

        }


        #reader video {

            width: 100% !important;

            border-radius:
                14px !important;

        }


        #reader img {

            max-width: 100%;

        }


        #reader__scan_region {

            background:
                #050811 !important;

            border-radius: 12px;

            overflow: hidden;

        }


        #reader__dashboard {

            margin-top: 12px;

        }


        #reader__dashboard_section_csr button {

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                ) !important;

            color: white !important;

            border: none !important;

            border-radius:
                8px !important;

            padding:
                9px 14px !important;

            font-weight: bold;

            cursor: pointer;

        }


        #reader__dashboard_section_swaplink {

            color:
                #8993a7 !important;

        }


        /* =====================================================
           OR DIVIDER
        ===================================================== */

        .or-divider {

            display: flex;

            align-items: center;

            gap: 12px;

            margin: 22px 0;

            color: #697386;

            font-size: 11px;

            font-weight: 700;

        }


        .or-divider::before,
        .or-divider::after {

            content: "";

            flex: 1;

            height: 1px;

            background:
                var(--border);

        }


        /* =====================================================
           UPLOAD AREA
        ===================================================== */

        .upload-area {

            border:
                1px dashed
                rgba(124,92,255,0.4);

            background:
                rgba(124,92,255,0.04);

            border-radius: 14px;

            padding: 22px;

            text-align: center;

            transition: 0.2s;

        }


        .upload-area:hover {

            border-color:
                rgba(124,92,255,0.75);

            background:
                rgba(124,92,255,0.07);

        }


        .upload-icon {

            width: 50px;
            height: 50px;

            margin: 0 auto 12px;

            border-radius: 14px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;

            background:
                linear-gradient(
                    135deg,
                    rgba(124,92,255,0.18),
                    rgba(77,156,255,0.12)
                );

            border:
                1px solid
                rgba(124,92,255,0.18);

        }


        .upload-title {

            font-size: 14px;

            font-weight: 700;

            margin-bottom: 6px;

        }


        .upload-description {

            color: var(--muted);

            font-size: 11px;

            line-height: 1.5;

            margin-bottom: 14px;

        }


        .upload-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 10px 17px;

            border: none;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            color: white;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 8px 20px
                rgba(92,91,255,0.18);

            transition: 0.2s;

        }


        .upload-button:hover {

            transform: translateY(-1px);

            box-shadow:
                0 10px 25px
                rgba(92,91,255,0.28);

        }


        .upload-input {

            display: none;

        }


        .file-name {

            display: none;

            margin-top: 12px;

            color: #b9c3d5;

            font-size: 11px;

            word-break: break-word;

        }


        /* =====================================================
           UPLOAD PREVIEW
        ===================================================== */

        .upload-preview {

            display: none;

            margin-top: 16px;

            padding: 12px;

            border:
                1px solid var(--border);

            border-radius: 12px;

            background:
                rgba(0,0,0,0.18);

        }


        .upload-preview img {

            display: block;

            max-width: 100%;

            max-height: 250px;

            margin: auto;

            border-radius: 9px;

            object-fit: contain;

        }


        .preview-status {

            margin-top: 10px;

            text-align: center;

            color: var(--muted);

            font-size: 11px;

        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status {

            margin-top: 18px;

            padding: 14px 16px;

            border-radius: 11px;

            background:
                rgba(255,255,255,0.025);

            border:
                1px solid var(--border);

            color: #b7c0d0;

            text-align: center;

            font-size: 12px;

        }


        .status.success {

            background:
                rgba(50,213,131,0.08);

            border-color:
                rgba(50,213,131,0.18);

            color: #75e6a9;

        }


        .status.error {

            background:
                rgba(255,107,122,0.08);

            border-color:
                rgba(255,107,122,0.18);

            color: #ff929f;

        }


        .status.warning {

            background:
                rgba(255,181,71,0.08);

            border-color:
                rgba(255,181,71,0.18);

            color: #ffc76d;

        }


        /* =====================================================
           RESULT
        ===================================================== */

        .result {

            display: none;

            margin-top: 18px;

            padding: 18px;

            border-radius: 12px;

            border:
                1px solid var(--border);

        }


        .result h3 {

            margin-bottom: 8px;

            font-size: 14px;

        }


        .result p {

            color: #c6cfdd;

            line-height: 1.6;

            font-size: 12px;

        }


        .result.success {

            background:
                rgba(50,213,131,0.08);

            border-color:
                rgba(50,213,131,0.18);

        }


        .result.error {

            background:
                rgba(255,107,122,0.08);

            border-color:
                rgba(255,107,122,0.18);

        }


        .result.warning {

            background:
                rgba(255,181,71,0.08);

            border-color:
                rgba(255,181,71,0.18);

        }


        /* =====================================================
           STUDENT CARD
        ===================================================== */

        .student-card {

            padding: 20px;

            margin-bottom: 20px;

        }


        .student-label {

            color: #697386;

            text-transform: uppercase;

            letter-spacing: 1.3px;

            font-size: 10px;

            font-weight: 800;

            margin-bottom: 16px;

        }


        .student-profile {

            display: flex;

            align-items: center;

            gap: 13px;

            padding-bottom: 18px;

            border-bottom:
                1px solid var(--border);

        }


        .big-avatar {

            width: 52px;
            height: 52px;

            border-radius: 15px;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    var(--blue)
                );

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

            font-weight: 900;

        }


        .student-name {

            font-size: 15px;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .student-npm {

            color: var(--muted);

            font-size: 11px;

        }


        /* =====================================================
           INSTRUCTION CARD
        ===================================================== */

        .instruction-card {

            padding: 20px;

        }


        .instruction-card h3 {

            font-size: 14px;

            margin-bottom: 18px;

        }


        .instruction {

            display: flex;

            gap: 12px;

            margin-bottom: 17px;

        }


        .instruction:last-child {

            margin-bottom: 0;

        }


        .instruction-number {

            flex-shrink: 0;

            width: 28px;
            height: 28px;

            border-radius: 9px;

            background:
                rgba(124,92,255,0.10);

            border:
                1px solid
                rgba(124,92,255,0.18);

            color: #a99aff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 11px;

            font-weight: bold;

        }


        .instruction-text strong {

            display: block;

            font-size: 12px;

            margin-bottom: 4px;

        }


        .instruction-text span {

            color: var(--muted);

            font-size: 11px;

            line-height: 1.5;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .content-grid {

                grid-template-columns: 1fr;

            }

        }


        @media (max-width: 760px) {

            .sidebar {

                transform:
                    translateX(-100%);

            }


            .sidebar.open {

                transform:
                    translateX(0);

            }


            .main {

                margin-left: 0;

                width: 100%;

                padding: 18px;

            }


            .mobile-header {

                display: flex;

            }


            .topbar {

                align-items: flex-start;

            }


            .topbar .back-dashboard {

                display: none;

            }


            .page-title h1 {

                font-size: 23px;

            }

        }


        @media (max-width: 550px) {

            .main {

                padding: 15px;

            }


            .scanner-card {

                padding: 17px;

            }


            .card-header {

                display: block;

            }


            .scanner-badge {

                display: none;

            }


            .upload-area {

                padding: 18px;

            }

        }

    </style>

</head>


<body>


<div class="dashboard-layout">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside
        class="sidebar"
        id="sidebar"
    >


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-icon">
                QR
            </div>


            <div class="brand-text">

                <strong>
                    ABSENSI QR
                </strong>

                <span>
                    Smart Attendance System
                </span>

            </div>

        </div>


        <!-- MENU -->

        <div class="sidebar-menu">


            <div class="menu-title">
                MENU UTAMA
            </div>


            <nav>


                <!-- RINGKASAN -->

                <a
                    href="{{ route('mahasiswa.dashboard') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ⌂
                    </span>

                    <span>
                        Ringkasan
                    </span>

                </a>


                <!-- SCAN ABSENSI -->

                <a
                    href="{{ route('mahasiswa.scan') }}"
                    class="nav-item active"
                >

                    <span class="nav-icon">
                        ▣
                    </span>

                    <span>
                        Scan Absensi
                    </span>

                </a>


                <!-- KARTU QR -->

                <a
                    href="{{ route('mahasiswa.kartu-qr') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ▦
                    </span>

                    <span>
                        Kartu QR
                    </span>

                </a>


                <!-- RIWAYAT -->

                <a
                    href="{{ route('mahasiswa.riwayat') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ◷
                    </span>

                    <span>
                        Riwayat
                    </span>

                </a>


                <!-- LAINNYA -->

                <div
                    class="menu-title"
                    style="margin-top: 27px;"
                >
                    LAINNYA
                </div>


                <!-- IZIN / SAKIT -->

                <a
                    href="{{ route('mahasiswa.izin-sakit') }}"
                    class="nav-item"
                >

                    <span class="nav-icon">
                        ✎
                    </span>

                    <span>
                        Izin / Sakit
                    </span>

                </a>


                <!-- PROFIL -->

                <a
                    href="{{ route('mahasiswa.profil') }}"
                    class="nav-item"
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


        <!-- =================================================
             SIDEBAR BOTTOM
        ================================================== -->

        <div class="sidebar-bottom">


            <!-- PROFILE -->

            <div class="profile-box">


                <div class="profile-avatar">

                    {{ strtoupper(
                        substr($mahasiswa->nama, 0, 1)
                    ) }}

                </div>


                <div class="profile-info">

                    <strong>
                        {{ $mahasiswa->nama }}
                    </strong>

                    <span>
                        NPM: {{ $mahasiswa->npm }}
                    </span>

                </div>


            </div>


            <!-- LOGOUT -->

            <form
                action="{{ route('logout') }}"
                method="POST"
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



    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main">


        <!-- MOBILE HEADER -->

        <div class="mobile-header">


            <button
                type="button"
                class="menu-toggle"
                onclick="toggleSidebar()"
            >
                ☰
            </button>


            <div class="mobile-brand">
                ABSENSI QR
            </div>


        </div>



        <!-- =================================================
             TOPBAR
        ================================================== -->

        <div class="topbar">


            <div class="page-title">

                <h1>
                    Scan Absensi
                </h1>

                <p>
                    Scan QR Code untuk mencatat kehadiran kamu.
                </p>

            </div>


            <a
                href="{{ route('mahasiswa.dashboard') }}"
                class="back-dashboard"
            >

                ← Dashboard

            </a>


        </div>



        <!-- =================================================
             CONTENT
        ================================================== -->

        <div class="content-grid">


            <!-- =================================================
                 LEFT : SCANNER
            ================================================= -->

            <section class="card scanner-card">


                <div class="card-header">


                    <div>

                        <h2>
                            Scan QR Code
                        </h2>

                        <p>
                            Gunakan kamera atau upload gambar
                            QR Code yang diberikan dosen.
                        </p>

                    </div>


                    <div class="scanner-badge">

                        <span class="dot"></span>

                        <span id="scannerState">Memeriksa kamera...</span>

                    </div>


                </div>



                <!-- =================================================
                     CAMERA
                ================================================= -->

                <div class="camera-area">

                    <div id="reader"></div>

                </div>



                <!-- =================================================
                     PEMISAH
                ================================================= -->

                <div class="or-divider">

                    ATAU

                </div>



                <!-- =================================================
                     UPLOAD QR
                ================================================= -->

                <div class="upload-area">


                    <div class="upload-icon">

                        📁

                    </div>


                    <div class="upload-title">

                        Upload QR Code

                    </div>


                    <div class="upload-description">

                        Pilih gambar QR Code dari perangkat kamu.
                        <br>

                        Format JPG, JPEG, atau PNG.

                    </div>


                    <label
                        for="qrFile"
                        class="upload-button"
                    >

                        📂
                        Pilih File QR

                    </label>


                    <input
                        type="file"
                        id="qrFile"
                        class="upload-input"
                        accept="image/png,image/jpeg,image/jpg"
                    >


                    <div
                        id="fileName"
                        class="file-name"
                    ></div>


                    <!-- PREVIEW -->

                    <div
                        id="uploadPreview"
                        class="upload-preview"
                    >

                        <img
                            id="previewImage"
                            src=""
                            alt="Preview QR Code"
                        >


                        <div
                            id="previewStatus"
                            class="preview-status"
                        >
                            Membaca QR Code...
                        </div>

                    </div>


                </div>



                <!-- =================================================
                     STATUS
                ================================================== -->

                <div
                    id="status"
                    class="status"
                >

                    Tekan tombol pemindai untuk memulai kamera dan izinkan akses kamera
                    saat diminta, atau upload gambar QR.

                </div>



                <!-- =================================================
                     RESULT
                ================================================== -->

                <div
                    id="result"
                    class="result"
                >

                    <h3 id="resultTitle"></h3>

                    <p id="resultMessage"></p>

                </div>


            </section>



            <!-- =================================================
                 RIGHT SIDE
            ================================================= -->

            <aside>


                <!-- =================================================
                     STUDENT
                ================================================== -->

                <div class="card student-card">


                    <div class="student-label">

                        Mahasiswa

                    </div>


                    <div class="student-profile">


                        <div class="big-avatar">

                            {{ strtoupper(
                                substr($mahasiswa->nama, 0, 1)
                            ) }}

                        </div>


                        <div>

                            <div class="student-name">

                                {{ $mahasiswa->nama }}

                            </div>


                            <div class="student-npm">

                                NPM:
                                {{ $mahasiswa->npm }}

                            </div>

                        </div>


                    </div>


                </div>



                <!-- =================================================
                     INSTRUCTIONS
                ================================================== -->

                <div class="card instruction-card">


                    <h3>
                        Cara melakukan absensi
                    </h3>


                    <!-- STEP 1 -->

                    <div class="instruction">


                        <div class="instruction-number">

                            01

                        </div>


                        <div class="instruction-text">

                            <strong>
                                Pilih cara scan
                            </strong>

                            <span>
                                Gunakan kamera atau upload
                                gambar QR Code dari perangkat.
                            </span>

                        </div>


                    </div>


                    <!-- STEP 2 -->

                    <div class="instruction">


                        <div class="instruction-number">

                            02

                        </div>


                        <div class="instruction-text">

                            <strong>
                                Arahkan kamera
                            </strong>

                            <span>
                                Jika menggunakan kamera,
                                arahkan ke QR Code dosen.
                            </span>

                        </div>


                    </div>


                    <!-- STEP 3 -->

                    <div class="instruction">


                        <div class="instruction-number">

                            03

                        </div>


                        <div class="instruction-text">

                            <strong>
                                Tunggu validasi
                            </strong>

                            <span>
                                Sistem akan memeriksa QR
                                dan sesi absensi.
                            </span>

                        </div>


                    </div>


                    <!-- STEP 4 -->

                    <div class="instruction">


                        <div class="instruction-number">

                            04

                        </div>


                        <div class="instruction-text">

                            <strong>
                                Absensi selesai
                            </strong>

                            <span>
                                Status kehadiran akan
                                ditampilkan setelah berhasil.
                            </span>

                        </div>


                    </div>


                </div>


            </aside>


        </div>


    </main>


</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>


    /* =====================================================
       SIDEBAR MOBILE
    ===================================================== */

    function toggleSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        sidebar.classList.toggle('open');

    }



    /* =====================================================
       ELEMENT
    ===================================================== */

    const statusBox =
        document.getElementById('status');


    const resultBox =
        document.getElementById('result');


    const resultTitle =
        document.getElementById('resultTitle');


    const resultMessage =
        document.getElementById('resultMessage');


    const qrFile =
        document.getElementById('qrFile');


    const fileName =
        document.getElementById('fileName');


    const uploadPreview =
        document.getElementById('uploadPreview');


    const previewImage =
        document.getElementById('previewImage');


    const previewStatus =
        document.getElementById('previewStatus');



    /* =====================================================
       STATUS
    ===================================================== */

    function setStatus(
        message,
        type = ''
    ) {

        statusBox.textContent =
            message;


        statusBox.className =
            'status';


        if (type) {

            statusBox.classList.add(type);

        }

    }



    /* =====================================================
       HASIL ABSENSI
    ===================================================== */

    function tampilkanHasil(
        title,
        message,
        type = ''
    ) {

        resultBox.style.display =
            'block';


        resultTitle.textContent =
            title;


        resultMessage.textContent =
            message;


        resultBox.className =
            'result';


        if (type) {

            resultBox.classList.add(type);

        }

    }



    /* =====================================================
       CEGAH DOUBLE SCAN
    ===================================================== */

    let sedangProses = false;



    /* =====================================================
       KIRIM ABSENSI KE LARAVEL
    ===================================================== */

    async function kirimAbsensi(token) {


        /*
         * Jangan memproses QR lain
         * jika QR sebelumnya masih diproses.
         */

        if (sedangProses) {

            return;

        }


        sedangProses = true;



        setStatus(

            'QR berhasil dibaca. Memproses absensi...',

            'warning'

        );



        try {


            const response =

                await fetch(

                    "{{ route('mahasiswa.scan.store', [], false) }}",

                    {

                        method: "POST",


                        headers: {

                            "Content-Type":
                                "application/json",

                            "Accept":
                                "application/json",

                            "X-CSRF-TOKEN":
                                "{{ csrf_token() }}"

                        },


                        body:

                            JSON.stringify({

                                token_qr:
                                    token

                            })

                    }

                );



            const data =
                await response.json();



            /* =================================================
               BERHASIL
            ================================================== */

            if (data.success) {


                setStatus(

                    'Absensi berhasil dicatat.',

                    'success'

                );



                tampilkanHasil(

                    '✓ Absensi Berhasil',


                    data.message +

                    ' Mata Kuliah: ' +

                    (
                        data.data?.mata_kuliah
                        ?? '-'
                    ) +

                    '. Waktu: ' +

                    (
                        data.data?.waktu_scan
                        ?? '-'
                    ) +

                    '. Status: ' +

                    (
                        data.data?.status
                        ?? '-'
                    ),


                    'success'

                );


            }


            /* =================================================
               GAGAL
            ================================================== */

            else {


                setStatus(

                    data.message
                    ??
                    'Absensi gagal.',

                    'error'

                );



                tampilkanHasil(

                    '✕ Absensi Gagal',


                    data.message
                    ??
                    'Terjadi kesalahan.',


                    'error'

                );



                /*
                 * Setelah gagal,
                 * user boleh scan lagi.
                 */

                setTimeout(
                    () => {

                        sedangProses =
                            false;

                    },
                    2000
                );

            }


        }


        /* =====================================================
           NETWORK ERROR
        ===================================================== */

        catch (error) {


            console.error(error);



            setStatus(

                'Tidak dapat menghubungi server.',

                'error'

            );



            tampilkanHasil(

                '✕ Terjadi Kesalahan',


                'Tidak dapat menghubungi server Laravel.',


                'error'

            );



            setTimeout(
                () => {

                    sedangProses =
                        false;

                },
                2000
            );

        }

    }



    /* =====================================================
       CAMERA SCANNER
    ===================================================== */

    function onScanSuccess(decodedText) {


        console.log(
            'QR dari kamera:',
            decodedText
        );


        kirimAbsensi(
            decodedText
        );

    }



    /* =====================================================
       CAMERA SCAN FAILURE
    ===================================================== */

    function onScanFailure(error) {

        /*
         * Tidak perlu menampilkan error.
         *
         * Fungsi ini dipanggil berkali-kali
         * ketika QR belum terbaca.
         */

    }



    /* =====================================================
       CAMERA SCANNER
    ===================================================== */

    const scannerState =
        document.getElementById('scannerState');


    if (!window.isSecureContext) {

        scannerState.textContent =
            'Perlu HTTPS';

        setStatus(
            'Kamera membutuhkan koneksi aman. Buka halaman ini melalui HTTPS atau localhost.',
            'error'
        );

    } else if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {

        scannerState.textContent =
            'Kamera tidak didukung';

        setStatus(
            'Browser ini tidak mendukung akses kamera. Coba gunakan browser terbaru.',
            'error'
        );

    } else if (
        typeof Html5QrcodeScanner === 'undefined' ||
        typeof Html5QrcodeScanType === 'undefined'
    ) {

        scannerState.textContent =
            'Scanner gagal dimuat';

        setStatus(
            'Library pemindai QR gagal dimuat. Periksa koneksi internet lalu muat ulang halaman.',
            'error'
        );

    } else {

        scannerState.textContent =
            'Siap memulai';

        const html5QrcodeScanner =
            new Html5QrcodeScanner(
                "reader",
                {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    },
                    rememberLastUsedCamera: true,
                    supportedScanTypes: [
                        Html5QrcodeScanType.SCAN_TYPE_CAMERA
                    ]
                },
                false
            );

        html5QrcodeScanner.render(
            onScanSuccess,
            onScanFailure
        );

    }



    /* =====================================================
       UPLOAD QR CODE
    ===================================================== */

    qrFile.addEventListener(
        'change',
        async function(event) {


            const file =
                event.target.files[0];


            /*
             * Tidak ada file.
             */

            if (!file) {

                return;

            }



            /* =================================================
               VALIDASI FORMAT
            ================================================= */

            const allowedTypes = [

                'image/png',

                'image/jpeg',

                'image/jpg'

            ];


            if (
                !allowedTypes.includes(
                    file.type
                )
            ) {


                setStatus(

                    'File harus berupa JPG, JPEG, atau PNG.',

                    'error'

                );


                qrFile.value = '';

                return;

            }



            /* =================================================
               VALIDASI UKURAN
            ================================================= */

            const maxSize =
                10 * 1024 * 1024;


            if (
                file.size > maxSize
            ) {


                setStatus(

                    'Ukuran gambar maksimal 10 MB.',

                    'error'

                );


                qrFile.value = '';

                return;

            }



            /* =================================================
               TAMPILKAN NAMA FILE
            ================================================= */

            fileName.style.display =
                'block';


            fileName.textContent =
                'File: ' + file.name;



            /* =================================================
               PREVIEW
            ================================================= */

            const imageUrl =
                URL.createObjectURL(file);


            previewImage.src =
                imageUrl;


            uploadPreview.style.display =
                'block';


            previewStatus.textContent =
                'Membaca QR Code...';



            setStatus(

                'Sedang membaca QR Code dari gambar...',

                'warning'

            );



            try {


                /*
                 * Buat scanner khusus
                 * untuk membaca file.
                 */

                const fileScanner =
                    new Html5Qrcode(
                        "reader"
                    );



                /*
                 * scanFile membaca QR
                 * langsung dari file gambar.
                 */

                const decodedText =
                    await fileScanner.scanFile(
                        file,
                        true
                    );



                console.log(
                    'QR dari file:',
                    decodedText
                );



                previewStatus.textContent =
                    '✓ QR Code berhasil ditemukan.';



                setStatus(

                    'QR Code berhasil dibaca. Memproses absensi...',

                    'warning'

                );



                /*
                 * Kirim token ke Laravel.
                 */

                kirimAbsensi(
                    decodedText
                );



            }


            catch (error) {


                console.error(
                    'Gagal membaca QR:',
                    error
                );



                previewStatus.textContent =
                    '✕ QR Code tidak ditemukan.';



                setStatus(

                    'QR Code tidak ditemukan di dalam gambar. Silakan gunakan gambar QR yang lebih jelas.',

                    'error'

                );



                tampilkanHasil(

                    '✕ QR Tidak Terbaca',


                    'Pastikan gambar berisi QR Code yang jelas, tidak buram, dan seluruh QR Code terlihat.',


                    'error'

                );


                sedangProses =
                    false;

            }


            finally {


                /*
                 * Bersihkan object URL
                 * agar tidak membebani browser.
                 */

                setTimeout(
                    () => {

                        URL.revokeObjectURL(
                            imageUrl
                        );

                    },
                    1000
                );

            }

        });


</script>


</body>

</html>