<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Mahasiswa - Admin</title>

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
            --border-hover: rgba(124, 92, 255, 0.5);

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

            --shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            --radius: 18px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

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

            color: var(--text);

            min-height: 100vh;
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
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            width: 255px;

            background: var(--sidebar);

            border-right: 1px solid var(--border);

            position: fixed;

            top: 0;
            left: 0;
            bottom: 0;

            display: flex;
            flex-direction: column;

            padding: 20px 16px;

            z-index: 1000;

            overflow: hidden;

            backdrop-filter: blur(20px);
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

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

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
            font-size: 11px;
            color: var(--muted);
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
            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1.5px;

            color: var(--muted);

            margin: 18px 10px 9px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;

            width: 100%;

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
           LOGOUT
        ========================== */

        .sidebar-bottom {
            margin-top: 12px;

            padding-top: 12px;

            border-top: 1px solid var(--border);
        }

        .logout-button {
            width: 100%;

            border: 1px solid rgba(255, 255, 255, 0.08);

            background: rgba(255, 255, 255, 0.03);

            color: var(--muted-light);

            border-radius: 12px;

            padding: 11px 12px;

            display: flex;
            align-items: center;
            gap: 12px;

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
            margin-left: 255px;

            width: calc(100% - 255px);

            padding: 30px;
        }

        .page-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 24px;
        }

        .page-header-left h1 {
            font-size: 28px;

            margin-bottom: 7px;
        }

        .page-header-left p {
            color: var(--muted);

            font-size: 14px;
        }

        .back-button {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 10px 15px;

            border: 1px solid var(--border);

            background: rgba(255, 255, 255, 0.03);

            border-radius: 12px;

            color: var(--muted-light);

            font-size: 13px;

            transition: 0.2s ease;
        }

        .back-button:hover {
            border-color: var(--border-hover);

            color: #ffffff;

            background: rgba(118, 87, 255, 0.06);
        }

        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            backdrop-filter: blur(20px);

            padding: 28px;

            max-width: 1000px;
        }

        .form-section {
            margin-bottom: 28px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 16px;

            font-weight: 600;

            margin-bottom: 5px;
        }

        .section-description {
            color: var(--muted);

            font-size: 12px;

            margin-bottom: 20px;
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
            font-size: 13px;

            color: var(--muted-light);

            font-weight: 500;
        }

        .form-label span {
            color: #ff7b8d;
        }

        .form-input {
            width: 100%;

            padding: 12px 14px;

            background: rgba(7, 11, 22, 0.75);

            border: 1px solid var(--border);

            border-radius: 12px;

            outline: none;

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

            border-radius: 12px;

            background: rgba(255, 93, 115, 0.08);

            border: 1px solid rgba(255, 93, 115, 0.20);

            color: #ff9ba8;

            font-size: 13px;
        }

        .info-box {
            margin-top: 8px;

            padding: 11px 13px;

            border-radius: 10px;

            background: rgba(77, 156, 255, 0.06);

            border: 1px solid rgba(77, 156, 255, 0.12);

            color: var(--muted);

            font-size: 11px;

            line-height: 1.5;
        }

        .form-actions {
            margin-top: 30px;

            padding-top: 20px;

            border-top: 1px solid var(--border);

            display: flex;

            justify-content: flex-end;

            gap: 12px;
        }

        .button {
            border: none;

            border-radius: 12px;

            padding: 12px 18px;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .button-secondary {
            background: rgba(255, 255, 255, 0.04);

            border: 1px solid var(--border);

            color: var(--muted-light);
        }

        .button-secondary:hover {
            color: #ffffff;

            background: rgba(255, 255, 255, 0.07);
        }

        .button-primary {
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
                margin-left: 0;

                width: 100%;

                padding: 20px;

                padding-top: 75px;
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

                background: rgba(255, 255, 255, 0.04);

                border-radius: 10px;

                color: #ffffff;

                cursor: pointer;

                font-size: 19px;
            }

            .overlay.show {
                display: block;

                position: fixed;

                inset: 0;

                background: rgba(0, 0, 0, 0.55);

                z-index: 950;
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

            .page-header-left h1 {
                font-size: 24px;
            }

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .button,
            .back-button {
                width: 100%;

                justify-content: center;
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
                <span class="menu-icon">
                    ⌂
                </span>

                Dashboard
            </a>


            <a
                href="{{ route('admin.mahasiswa') }}"
                class="menu-item active"
            >
                <span class="menu-icon">
                    ◉
                </span>

                Mahasiswa
            </a>


            <a
                href="{{ route('admin.dosen') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ◌
                </span>

                Dosen
            </a>


            <a
                href="{{ route('admin.mata-kuliah') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ▣
                </span>

                Mata Kuliah
            </a>


            <a
                href="{{ route('admin.kelas') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ▤
                </span>

                Kelas
            </a>


            <a
                href="{{ route('admin.jadwal') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ◷
                </span>

                Jadwal
            </a>


            <a
                href="{{ route('admin.sesi-absensi') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ▥
                </span>

                Sesi Absensi
            </a>


            <a
                href="{{ route('admin.kehadiran') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ✓
                </span>

                Kehadiran
            </a>


            <a
                href="{{ route('admin.pengajuan-absensi') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ▨
                </span>

                Pengajuan Absensi
            </a>


            <a
                href="{{ route('admin.laporan') }}"
                class="menu-item"
            >
                <span class="menu-icon">
                    ◫
                </span>

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
                    <span class="menu-icon">
                        ↪
                    </span>

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
            Edit Mahasiswa
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

            <div class="page-header-left">

                <h1>
                    Edit Mahasiswa
                </h1>

                <p>
                    Ubah informasi mahasiswa yang dipilih.
                </p>

            </div>


            <a
                href="{{ route('admin.mahasiswa') }}"
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
                action="{{ route('admin.mahasiswa.update', $mahasiswa->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <!-- =========================
                     DATA MAHASISWA
                ========================== -->

                <div class="form-section">

                    <div class="section-title">
                        Data Mahasiswa
                    </div>

                    <div class="section-description">
                        Perbarui informasi identitas mahasiswa.
                    </div>


                    <div class="form-grid">

                        <!-- NAMA -->

                        <div class="form-group">

                            <label class="form-label">
                                Nama Lengkap <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-input"
                                placeholder="Contoh: Nada Farhah Fadhilah"
                                value="{{ old('nama', $mahasiswa->nama) }}"
                                required
                            >

                            @error('nama')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- NPM -->

                        <div class="form-group">

                            <label class="form-label">
                                NPM <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="npm"
                                class="form-input"
                                placeholder="Contoh: 230123456"
                                value="{{ old('npm', $mahasiswa->npm) }}"
                                required
                            >

                            @error('npm')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- NO HP -->

                        <div class="form-group">

                            <label class="form-label">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                name="no_hp"
                                class="form-input"
                                placeholder="Contoh: 081234567890"
                                value="{{ old('no_hp', $mahasiswa->no_hp) }}"
                            >

                            @error('no_hp')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- PROGRAM STUDI -->

                        <div class="form-group">

                            <label class="form-label">
                                Program Studi
                            </label>

                            <input
                                type="text"
                                name="program_studi"
                                class="form-input"
                                placeholder="Contoh: Teknik Informatika"
                                value="{{ old('program_studi', $mahasiswa->program_studi) }}"
                            >

                            @error('program_studi')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- KELAS -->

                        <div class="form-group full">

                            <label class="form-label">
                                Kelas
                            </label>

                            <input
                                type="text"
                                name="kelas"
                                class="form-input"
                                placeholder="Contoh: 5.2"
                                value="{{ old('kelas', $mahasiswa->kelas) }}"
                            >

                            @error('kelas')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <!-- =========================
                     AKUN LOGIN
                ========================== -->

                <div class="form-section">

                    <div class="section-title">
                        Akun Login
                    </div>

                    <div class="section-description">
                        Email dapat diubah. Password boleh dikosongkan jika tidak ingin menggantinya.
                    </div>


                    <div class="form-grid">

                        <!-- EMAIL -->

                        <div class="form-group full">

                            <label class="form-label">
                                Email <span>*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-input"
                                placeholder="mahasiswa@email.com"
                                value="{{ old('email', $mahasiswa->user->email ?? '') }}"
                                required
                            >

                            @error('email')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- PASSWORD -->

                        <div class="form-group">

                            <label class="form-label">
                                Password Baru
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-input"
                                placeholder="Kosongkan jika tidak diganti"
                            >

                            @error('password')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- CONFIRM PASSWORD -->

                        <div class="form-group">

                            <label class="form-label">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-input"
                                placeholder="Ulangi password baru"
                            >

                        </div>

                    </div>


                    <div class="info-box">
                        Password lama mahasiswa tidak ditampilkan.
                        Isi Password Baru hanya ketika ingin mengganti password.
                    </div>

                </div>


                <!-- =========================
                     ACTION
                ========================== -->

                <div class="form-actions">

                    <a
                        href="{{ route('admin.mahasiswa') }}"
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

    const sidebar = document.getElementById('sidebar');
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const overlay = document.getElementById('overlay');

    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('show');
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    }

    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', openSidebar);
    }

    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

</script>

</body>
</html>