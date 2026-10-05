<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Kelas - Admin</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #070b16;
            --sidebar: rgba(9, 13, 27, 0.96);
            --card: rgba(17, 24, 39, 0.78);

            --border: rgba(148, 163, 184, 0.16);
            --border-hover: rgba(124, 92, 255, 0.50);

            --text: #f8fafc;
            --muted: #8b95aa;
            --muted-light: #a9b2c5;

            --purple: #7657ff;
            --blue: #4d9cff;

            --gradient: linear-gradient(
                135deg,
                #7657ff 0%,
                #4d9cff 100%
            );

            --shadow: 0 20px 50px rgba(0, 0, 0, 0.30);

            --radius: 18px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            color: var(--text);

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(118, 87, 255, 0.12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(77, 156, 255, 0.10),
                    transparent 30%
                ),
                var(--bg);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        /* =========================
           LAYOUT
        ========================== */

        .dashboard-layout {
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            width: 255px;

            position: fixed;

            top: 0;
            left: 0;
            bottom: 0;

            display: flex;
            flex-direction: column;

            padding: 20px 16px;

            background: var(--sidebar);

            border-right: 1px solid var(--border);

            backdrop-filter: blur(20px);

            z-index: 1000;

            overflow: hidden;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 8px 8px 22px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--gradient);

            font-size: 20px;
            font-weight: bold;

            box-shadow:
                0 10px 25px rgba(118, 87, 255, 0.25);
        }

        .logo-text strong {
            display: block;

            font-size: 15px;

            margin-bottom: 3px;
        }

        .logo-text span {
            color: var(--muted);

            font-size: 11px;
        }

        .sidebar-menu-scroll {
            flex: 1;
            min-height: 0;

            overflow-y: auto;
            overflow-x: hidden;

            padding-right: 4px;

            scrollbar-width: thin;
            scrollbar-color: #7657ff transparent;

            -webkit-overflow-scrolling: touch;

            overscroll-behavior: contain;
        }

        .sidebar-menu-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu-scroll::-webkit-scrollbar-thumb {
            background: linear-gradient(
                180deg,
                #7657ff,
                #4d9cff
            );

            border-radius: 10px;
        }

        .menu-title {
            margin: 18px 10px 9px;

            color: var(--muted);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1.5px;
        }

        .menu-item {
            width: 100%;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 11px 12px;

            margin-bottom: 5px;

            border-radius: 12px;

            color: var(--muted-light);

            font-size: 14px;

            transition: 0.2s ease;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.04);

            color: var(--text);
        }

        .menu-item.active {
            background:
                linear-gradient(
                    135deg,
                    rgba(118, 87, 255, 0.20),
                    rgba(77, 156, 255, 0.10)
                );

            color: #ffffff;

            border: 1px solid rgba(118, 87, 255, 0.20);
        }

        .menu-icon {
            width: 22px;

            text-align: center;

            font-size: 15px;
        }

        .menu-disabled {
            opacity: 0.45;

            cursor: not-allowed;
        }

        /* =========================
           SIDEBAR BOTTOM
        ========================== */

        .sidebar-bottom {
            margin-top: 12px;

            padding-top: 12px;

            border-top: 1px solid var(--border);
        }

        .logout-button {
            width: 100%;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 11px 12px;

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 12px;

            background: rgba(255, 255, 255, 0.03);

            color: var(--muted-light);

            cursor: pointer;

            transition: 0.2s ease;
        }

        .logout-button:hover {
            background: rgba(255, 93, 115, 0.08);

            border-color: rgba(255, 93, 115, 0.22);

            color: #ff8091;
        }

        /* =========================
           MAIN
        ========================== */

        .main {
            width: calc(100% - 255px);

            margin-left: 255px;

            padding: 30px;
        }

        .page-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 24px;
        }

        .page-title h1 {
            margin-bottom: 7px;

            font-size: 28px;
        }

        .page-title p {
            color: var(--muted);

            font-size: 14px;
        }

        .back-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 10px 15px;

            border: 1px solid var(--border);

            border-radius: 12px;

            background: rgba(255, 255, 255, 0.03);

            color: var(--muted-light);

            font-size: 13px;

            transition: 0.2s ease;
        }

        .back-button:hover {
            border-color: var(--border-hover);

            background: rgba(118, 87, 255, 0.06);

            color: #ffffff;
        }

        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            max-width: 850px;

            padding: 28px;

            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            backdrop-filter: blur(20px);
        }

        .form-section {
            margin-bottom: 28px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            margin-bottom: 5px;

            font-size: 16px;

            font-weight: 600;
        }

        .section-description {
            margin-bottom: 20px;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.5;
        }

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 18px;
        }

        .form-group {
            display: flex;

            flex-direction: column;

            gap: 8px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            color: var(--muted-light);

            font-size: 13px;

            font-weight: 500;
        }

        .required {
            color: #ff7b8d;
        }

        .form-input {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid var(--border);

            border-radius: 12px;

            outline: none;

            background: rgba(7, 11, 22, 0.75);

            color: #ffffff;

            font-size: 14px;

            transition: 0.2s ease;
        }

        .form-input::placeholder {
            color: #5f687b;
        }

        .form-input:focus {
            border-color: var(--purple);

            box-shadow:
                0 0 0 3px rgba(118, 87, 255, 0.10);
        }

        .error-message {
            color: #ff7d8d;

            font-size: 11px;
        }

        .global-error {
            margin-bottom: 22px;

            padding: 13px 15px;

            border: 1px solid rgba(255, 93, 115, 0.20);

            border-radius: 12px;

            background: rgba(255, 93, 115, 0.08);

            color: #ff9ba8;

            font-size: 13px;
        }

        .info-box {
            margin-top: 18px;

            padding: 13px 15px;

            border: 1px solid rgba(77, 156, 255, 0.12);

            border-radius: 12px;

            background: rgba(77, 156, 255, 0.06);

            color: var(--muted);

            font-size: 11px;

            line-height: 1.6;
        }

        .info-box strong {
            color: var(--muted-light);
        }

        /* =========================
           ACTION BUTTONS
        ========================== */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            gap: 12px;

            margin-top: 30px;

            padding-top: 20px;

            border-top: 1px solid var(--border);
        }

        .button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 12px 18px;

            border-radius: 12px;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .button-secondary {
            border: 1px solid var(--border);

            background: rgba(255, 255, 255, 0.04);

            color: var(--muted-light);
        }

        .button-secondary:hover {
            background: rgba(255, 255, 255, 0.07);

            color: #ffffff;
        }

        .button-primary {
            border: none;

            background: var(--gradient);

            color: #ffffff;

            box-shadow:
                0 10px 24px rgba(118, 87, 255, 0.20);
        }

        .button-primary:hover {
            transform: translateY(-1px);

            box-shadow:
                0 14px 28px rgba(118, 87, 255, 0.30);
        }

        /* =========================
           MOBILE
        ========================== */

        .mobile-header {
            display: none;
        }

        .overlay {
            display: none;
        }

        @media (max-width: 900px) {

            .sidebar {
                transform: translateX(-100%);

                transition: transform 0.25s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                width: 100%;

                margin-left: 0;

                padding: 75px 20px 20px;
            }

            .mobile-header {
                display: flex;

                position: fixed;

                top: 0;
                left: 0;
                right: 0;

                height: 60px;

                z-index: 900;

                align-items: center;

                justify-content: space-between;

                padding: 0 18px;

                background: rgba(7, 11, 22, 0.90);

                border-bottom: 1px solid var(--border);

                backdrop-filter: blur(15px);
            }

            .mobile-title {
                font-size: 14px;

                font-weight: 600;
            }

            .mobile-menu-button {
                width: 40px;
                height: 40px;

                border: 1px solid var(--border);

                border-radius: 10px;

                background: rgba(255, 255, 255, 0.04);

                color: #ffffff;

                font-size: 19px;

                cursor: pointer;
            }

            .overlay.show {
                display: block;

                position: fixed;

                inset: 0;

                z-index: 950;

                background: rgba(0, 0, 0, 0.55);
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }

        @media (max-width: 600px) {

            .main {
                padding: 70px 14px 20px;
            }

            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .page-title h1 {
                font-size: 24px;
            }

            .back-button {
                width: 100%;
            }

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="dashboard-layout">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <div class="sidebar-logo">

            <div class="logo-icon">
                ✦
            </div>

            <div class="logo-text">

                <strong>
                    Absensi QR
                </strong>

                <span>
                    Panel Administrator
                </span>

            </div>

        </div>


        <div class="sidebar-menu-scroll">

            <div class="menu-title">
                Menu Utama
            </div>


            <a
                href="{{ route('admin.dashboard') }}"
                class="menu-item"
            >
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>


            <a
                href="{{ route('admin.mahasiswa') }}"
                class="menu-item"
            >
                <span class="menu-icon">◉</span>
                Mahasiswa
            </a>


            <a
                href="{{ route('admin.dosen') }}"
                class="menu-item"
            >
                <span class="menu-icon">◌</span>
                Dosen
            </a>


            <a
                href="{{ route('admin.mata-kuliah') }}"
                class="menu-item"
            >
                <span class="menu-icon">▣</span>
                Mata Kuliah
            </a>


            <a
                href="{{ route('admin.kelas') }}"
                class="menu-item active"
            >
                <span class="menu-icon">▤</span>
                Kelas
            </a>


            <a
                href="{{ route('admin.jadwal') }}"
                class="menu-item"
            >
                <span class="menu-icon">◷</span>
                Jadwal
            </a>


            <a
                href="{{ route('admin.sesi-absensi') }}"
                class="menu-item"
            >
                <span class="menu-icon">▥</span>
                Sesi Absensi
            </a>


            <a
                href="{{ route('admin.kehadiran') }}"
                class="menu-item"
            >
                <span class="menu-icon">✓</span>
                Kehadiran
            </a>


            <a
                href="{{ route('admin.pengajuan-absensi') }}"
                class="menu-item"
            >
                <span class="menu-icon">▨</span>
                Pengajuan Absensi
            </a>


            <a
                href="{{ route('admin.laporan') }}"
                class="menu-item"
            >
                <span class="menu-icon">◫</span>
                Laporan
            </a>

        </div>


        <div class="sidebar-bottom">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    <span class="menu-icon">↪</span>
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- =========================
         MOBILE HEADER
    ========================== -->

    <div class="mobile-header">

        <div class="mobile-title">
            Edit Kelas
        </div>

        <button
            type="button"
            class="mobile-menu-button"
            id="mobileMenuButton"
        >
            ☰
        </button>

    </div>


    <div
        class="overlay"
        id="overlay"
    ></div>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">

        <div class="page-header">

            <div class="page-title">

                <h1>
                    Edit Kelas
                </h1>

                <p>
                    Perbarui informasi kelas yang dipilih.
                </p>

            </div>


            <a
                href="{{ route('admin.kelas') }}"
                class="back-button"
            >
                ← Kembali
            </a>

        </div>


        <div class="form-card">

            @if ($errors->any())

                <div class="global-error">

                    <strong>
                        Data belum dapat diperbarui.
                    </strong>

                    <div style="margin-top: 6px;">
                        Periksa kembali kolom yang masih salah.
                    </div>

                </div>

            @endif


            <form
                action="{{ route('admin.kelas.update', $kelas->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <!-- =========================
                     DATA KELAS
                ========================== -->

                <div class="form-section">

                    <div class="section-title">
                        Informasi Kelas
                    </div>

                    <div class="section-description">
                        Perbarui informasi kelas yang digunakan dalam sistem perkuliahan.
                    </div>


                    <div class="form-grid">

                        <!-- NAMA KELAS -->

                        <div class="form-group">

                            <label class="form-label">
                                Nama Kelas
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-input"
                                placeholder="Contoh: 5.2"
                                value="{{ old('nama', $kelas->nama) }}"
                                required
                            >

                            @error('nama')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- ANGKATAN -->

                        <div class="form-group">

                            <label class="form-label">
                                Angkatan
                            </label>

                            <input
                                type="text"
                                name="angkatan"
                                class="form-input"
                                placeholder="Contoh: 2024"
                                value="{{ old('angkatan', $kelas->angkatan) }}"
                            >

                            @error('angkatan')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- PROGRAM STUDI -->

                        <div class="form-group full">

                            <label class="form-label">
                                Program Studi
                            </label>

                            <input
                                type="text"
                                name="program_studi"
                                class="form-input"
                                placeholder="Contoh: Teknik Informatika"
                                value="{{ old('program_studi', $kelas->program_studi) }}"
                            >

                            @error('program_studi')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>


                    <div class="info-box">

                        <strong>Catatan:</strong>
                        Mengubah nama kelas, program studi, atau angkatan tidak menghapus jadwal yang sudah terhubung dengan kelas ini.

                    </div>

                </div>


                <!-- =========================
                     ACTION
                ========================== -->

                <div class="form-actions">

                    <a
                        href="{{ route('admin.kelas') }}"
                        class="button button-secondary"
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="button button-primary"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>


<script>

    const sidebar =
        document.getElementById('sidebar');

    const mobileMenuButton =
        document.getElementById('mobileMenuButton');

    const overlay =
        document.getElementById('overlay');


    function openSidebar() {

        sidebar.classList.add('open');

        overlay.classList.add('show');

    }


    function closeSidebar() {

        sidebar.classList.remove('open');

        overlay.classList.remove('show');

    }


    if (mobileMenuButton) {

        mobileMenuButton.addEventListener(
            'click',
            openSidebar
        );

    }


    if (overlay) {

        overlay.addEventListener(
            'click',
            closeSidebar
        );

    }

</script>

</body>
</html>