<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kartu QR - Absensi QR</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #080b12;
            --sidebar: #0d111b;
            --card: #111722;
            --card-2: #151c29;
            --border: #242d3d;
            --text: #f4f7fb;
            --muted: #8993a5;
            --blue: #4f8cff;
            --blue-dark: #2f6fe4;
            --green: #35d49a;
            --shadow: 0 18px 50px rgba(0, 0, 0, .35);
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: var(--sidebar);
            border-right: 1px solid var(--border);
            padding: 24px 16px;
            z-index: 100;
        }

        .brand {
            padding: 4px 12px 28px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 22px;
        }

        .brand h2 {
            font-size: 21px;
            letter-spacing: .5px;
        }

        .brand p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 11px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            margin-bottom: 24px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .profile-info {
            min-width: 0;
        }

        .profile-info strong {
            display: block;
            font-size: 13px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .profile-info span {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        .menu-title {
            color: #596477;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            padding: 0 12px 10px;
            text-transform: uppercase;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overscroll-behavior: contain;
            scrollbar-width: thin;
            scrollbar-color: #596477 transparent;
        }

        .nav::-webkit-scrollbar {
            width: 5px;
        }

        .nav::-webkit-scrollbar-thumb {
            background: #596477;
            border-radius: 10px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #aab3c2;
            text-decoration: none;
            padding: 12px;
            border-radius: 11px;
            font-size: 13px;
            transition: .2s ease;
        }

        .nav-item:hover {
            background: #151c29;
            color: white;
        }

        .nav-item.active {
            background: rgba(79, 140, 255, .12);
            color: #75a6ff;
            border: 1px solid rgba(79, 140, 255, .18);
        }

        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .logout {
            flex-shrink: 0;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
        }

        .logout button {
            width: 100%;
            background: transparent;
            border: none;
            color: #aab3c2;
            padding: 12px;
            border-radius: 11px;
            cursor: pointer;
            text-align: left;
            font-size: 13px;
        }

        .logout button:hover {
            background: #25171c;
            color: #ff7184;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
            padding: 30px 34px 50px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 26px;
            letter-spacing: -.5px;
        }

        .page-title p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 7px;
        }

        .top-profile {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .top-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #1d2636;
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8eb6ff;
            font-weight: bold;
        }

        .top-profile div:last-child strong {
            display: block;
            font-size: 12px;
        }

        .top-profile div:last-child span {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        /* =========================
           QR CARD
        ========================= */

        .qr-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(280px, .7fr);
            gap: 22px;
        }

        .qr-main-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header {
            padding: 22px 25px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .card-header h2 {
            font-size: 17px;
        }

        .card-header p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 5px;
        }

        .status {
            display: flex;
            align-items: center;
            gap: 7px;
            background: rgba(53, 212, 154, .08);
            border: 1px solid rgba(53, 212, 154, .18);
            color: var(--green);
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 10px;
            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            background: var(--green);
            border-radius: 50%;
        }

        .qr-content {
            padding: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 38px;
        }

        .qr-wrapper {
            width: 310px;
            height: 310px;
            padding: 18px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .qr-wrapper svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .qr-info {
            max-width: 260px;
        }

        .qr-info .small-label {
            color: #6f7a8d;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 9px;
        }

        .qr-info h3 {
            font-size: 23px;
            line-height: 1.25;
            margin-bottom: 9px;
        }

        .qr-info > p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .identity {
            display: grid;
            gap: 9px;
            margin-bottom: 22px;
        }

        .identity-item {
            background: var(--card-2);
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 11px 13px;
        }

        .identity-item span {
            display: block;
            color: #697489;
            font-size: 9px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .identity-item strong {
            font-size: 12px;
        }

        .buttons {
            display: flex;
            gap: 8px;
        }

        .btn {
            border: none;
            border-radius: 10px;
            padding: 11px 15px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: .2s ease;
        }

        .btn-primary {
            background: var(--blue);
            color: white;
        }

        .btn-primary:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #1b2331;
            color: #c4ccda;
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #242e40;
            color: white;
        }

        /* =========================
           SIDE INFO
        ========================= */

        .side-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 23px;
            box-shadow: var(--shadow);
        }

        .side-card h3 {
            font-size: 15px;
            margin-bottom: 20px;
        }

        .student-card {
            background: linear-gradient(
                145deg,
                #151e2e,
                #0e141f
            );
            border: 1px solid #29364b;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .mini-avatar {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            background: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .student-card h4 {
            font-size: 17px;
            margin-bottom: 5px;
        }

        .student-card p {
            color: var(--muted);
            font-size: 11px;
        }

        .student-line {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding-top: 14px;
            margin-top: 14px;
            border-top: 1px solid #263145;
            font-size: 11px;
        }

        .student-line span {
            color: #718096;
        }

        .student-line strong {
            text-align: right;
        }

        .instruction {
            display: flex;
            gap: 12px;
            margin-bottom: 17px;
        }

        .instruction-number {
            width: 27px;
            height: 27px;
            border-radius: 8px;
            background: rgba(79, 140, 255, .1);
            border: 1px solid rgba(79, 140, 255, .18);
            color: #75a6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .instruction-text strong {
            display: block;
            font-size: 11px;
            margin-bottom: 4px;
        }

        .instruction-text span {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        /* =========================
           MOBILE
        ========================= */

        .mobile-header {
            display: none;
        }

        @media (max-width: 1050px) {
            .qr-content {
                flex-direction: column;
            }

            .qr-info {
                max-width: 100%;
                width: 100%;
                text-align: center;
            }

            .identity {
                text-align: left;
            }

            .buttons {
                justify-content: center;
            }
        }

        @media (max-width: 850px) {
            .sidebar {
                transform: translateX(-100%);
                transition: .25s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .mobile-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 25px;
            }

            .menu-btn {
                background: var(--card);
                border: 1px solid var(--border);
                color: white;
                width: 42px;
                height: 42px;
                border-radius: 10px;
                cursor: pointer;
                font-size: 20px;
            }

            .qr-layout {
                grid-template-columns: 1fr;
            }

            .topbar {
                display: none;
            }
        }

        @media (max-width: 520px) {
            .main {
                padding: 15px;
            }

            .qr-content {
                padding: 20px 15px;
            }

            .qr-wrapper {
                width: 260px;
                height: 260px;
            }

            .card-header {
                padding: 18px;
                align-items: flex-start;
                flex-direction: column;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }

        /* =========================
           PRINT
        ========================= */

        @media print {
            body {
                background: white;
                color: black;
            }

            .sidebar,
            .mobile-header,
            .topbar,
            .side-card,
            .card-header,
            .buttons {
                display: none !important;
            }

            .main {
                margin: 0;
                padding: 0;
            }

            .qr-main-card {
                border: 2px solid #111;
                box-shadow: none;
                border-radius: 0;
            }

            .qr-content {
                padding: 35px;
            }

            .qr-wrapper {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">
            <h2>ABSENSI QR</h2>
            <p>Smart Attendance System</p>
        </div>

        <div class="profile">

            <div class="avatar">
                {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
            </div>

            <div class="profile-info">
                <strong>{{ $mahasiswa->nama }}</strong>
                <span>NPM: {{ $mahasiswa->npm }}</span>
            </div>

        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="nav">

            <a href="{{ route('mahasiswa.dashboard') }}" class="nav-item">
                <span class="nav-icon">⌂</span>
                <span>Ringkasan</span>
            </a>

            <a href="{{ route('mahasiswa.scan') }}" class="nav-item">
                <span class="nav-icon">▣</span>
                <span>Scan Absensi</span>
            </a>

            <a href="{{ route('mahasiswa.kartu-qr') }}" class="nav-item active">
                <span class="nav-icon">▦</span>
                <span>Kartu QR</span>
            </a>

            <a href="{{ route('mahasiswa.riwayat') }}" class="nav-item">
                <span class="nav-icon">◷</span>
                <span>Riwayat</span>
            </a>

            <a href="{{ route('mahasiswa.izin-sakit') }}" class="nav-item">
                <span class="nav-icon">✎</span>
                <span>Izin / Sakit</span>
            </a>

            <a href="{{ route('mahasiswa.profil') }}" class="nav-item">
                <span class="nav-icon">◎</span>
                <span>Profil</span>
            </a>

        </nav>

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit">
                    ↪ &nbsp; Keluar
                </button>
            </form>

        </div>

    </aside>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">

        <div class="mobile-header">

            <button class="menu-btn" onclick="toggleSidebar()">
                ☰
            </button>

            <strong>Kartu QR</strong>

            <div></div>

        </div>


        <div class="topbar">

            <div class="page-title">
                <h1>Kartu QR</h1>
                <p>Identitas QR pribadi untuk kebutuhan absensi mahasiswa.</p>
            </div>

            <div class="top-profile">

                <div class="top-avatar">
                    {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                </div>

                <div>
                    <strong>{{ $mahasiswa->nama }}</strong>
                    <span>Mahasiswa · {{ $mahasiswa->npm }}</span>
                </div>

            </div>

        </div>


        <!-- =========================
             CONTENT
        ========================== -->

        <div class="qr-layout">

            <!-- QR MAIN -->

            <section class="qr-main-card">

                <div class="card-header">

                    <div>
                        <h2>QR Identitas Mahasiswa</h2>
                        <p>Gunakan QR ini sesuai kebutuhan sistem.</p>
                    </div>

                    <div class="status">
                        <span class="status-dot"></span>
                        QR Aktif
                    </div>

                </div>


                <div class="qr-content">

                    <div class="qr-wrapper">

                        {!! QrCode::size(270)->margin(1)->generate($qrData) !!}

                    </div>


                    <div class="qr-info">

                        <div class="small-label">
                            Kartu Identitas
                        </div>

                        <h3>
                            {{ $mahasiswa->nama }}
                        </h3>

                        <p>
                            QR Code ini terhubung dengan identitas
                            mahasiswa di sistem Absensi QR.
                        </p>


                        <div class="identity">

                            <div class="identity-item">
                                <span>NPM</span>
                                <strong>{{ $mahasiswa->npm }}</strong>
                            </div>

                            <div class="identity-item">
                                <span>Program Studi</span>
                                <strong>
                                    {{ $mahasiswa->program_studi ?? 'Belum diisi' }}
                                </strong>
                            </div>

                            <div class="identity-item">
                                <span>Kelas</span>
                                <strong>
                                    {{ $mahasiswa->kelas ?? 'Belum diisi' }}
                                </strong>
                            </div>

                        </div>


                        <div class="buttons">

                            <button
                                type="button"
                                class="btn btn-primary"
                                onclick="window.print()"
                            >
                                🖨 Cetak Kartu
                            </button>

                            <a
                                href="{{ route('mahasiswa.dashboard') }}"
                                class="btn btn-secondary"
                            >
                                ← Dashboard
                            </a>

                        </div>

                    </div>

                </div>

            </section>


            <!-- SIDE INFORMATION -->

            <aside class="side-card">

                <h3>Informasi Mahasiswa</h3>


                <div class="student-card">

                    <div class="mini-avatar">
                        {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                    </div>

                    <h4>{{ $mahasiswa->nama }}</h4>

                    <p>Mahasiswa aktif</p>


                    <div class="student-line">
                        <span>NPM</span>
                        <strong>{{ $mahasiswa->npm }}</strong>
                    </div>

                    <div class="student-line">
                        <span>Program Studi</span>
                        <strong>
                            {{ $mahasiswa->program_studi ?? '-' }}
                        </strong>
                    </div>

                    <div class="student-line">
                        <span>Kelas</span>
                        <strong>
                            {{ $mahasiswa->kelas ?? '-' }}
                        </strong>
                    </div>

                </div>


                <h3>Cara Menggunakan</h3>


                <div class="instruction">

                    <div class="instruction-number">
                        01
                    </div>

                    <div class="instruction-text">
                        <strong>Buka Kartu QR</strong>

                        <span>
                            Tampilkan halaman ini ketika membutuhkan
                            QR identitas.
                        </span>
                    </div>

                </div>


                <div class="instruction">

                    <div class="instruction-number">
                        02
                    </div>

                    <div class="instruction-text">
                        <strong>Tunjukkan QR</strong>

                        <span>
                            Arahkan QR kepada perangkat yang melakukan
                            proses pemindaian.
                        </span>
                    </div>

                </div>


                <div class="instruction">

                    <div class="instruction-number">
                        03
                    </div>

                    <div class="instruction-text">
                        <strong>Jaga Kartu</strong>

                        <span>
                            Jangan membagikan QR kepada orang lain
                            karena QR terhubung dengan akunmu.
                        </span>
                    </div>

                </div>

            </aside>

        </div>

    </main>


    <script>
        function toggleSidebar() {
            document
                .getElementById('sidebar')
                .classList.toggle('open');
        }
    </script>

</body>
</html>