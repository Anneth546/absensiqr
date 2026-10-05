<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun | Absensi QR</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #070b14;
            --panel: #0d1421;
            --panel-left: #151832;

            --input: #111925;
            --border: #273143;

            --text: #f5f7ff;
            --muted: #8f9aae;

            --purple: #7658ff;
            --blue: #4da3ff;

            --danger: #ff7181;
            --success: #67e69a;
        }

        body {
            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: var(--text);

            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(103, 76, 255, 0.18),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(55, 155, 255, 0.12),
                    transparent 30%
                ),
                var(--bg);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 20px;
        }

        /* =================================================
           MAIN CARD
        ================================================= */

        .register-wrapper {
            width: 100%;
            max-width: 1180px;

            min-height: 720px;

            display: grid;
            grid-template-columns: 0.85fr 1.15fr;

            background: var(--panel);

            border: 1px solid rgba(118, 88, 255, 0.20);

            border-radius: 28px;

            overflow: hidden;

            box-shadow:
                0 30px 100px rgba(0, 0, 0, 0.55);

            position: relative;
        }

        /* =================================================
           LEFT SIDE
        ================================================= */

        .brand-panel {
            padding: 55px;

            background:
                radial-gradient(
                    circle at 15% 10%,
                    rgba(118, 88, 255, 0.28),
                    transparent 35%
                ),
                linear-gradient(
                    145deg,
                    #1d1b43 0%,
                    #151a37 48%,
                    #111a2d 100%
                );

            border-right: 1px solid rgba(118, 88, 255, 0.15);

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            position: relative;
            overflow: hidden;
        }

        .brand-panel::after {
            content: "";

            position: absolute;

            width: 380px;
            height: 380px;

            right: -180px;
            bottom: -180px;

            border-radius: 50%;

            background:
                rgba(77, 163, 255, 0.10);

            filter: blur(10px);

            pointer-events: none;
        }

        /* =================================================
           BRAND
        ================================================= */

        .brand-top {
            display: flex;
            align-items: center;

            gap: 14px;

            position: relative;
            z-index: 2;
        }

        .brand-icon {
            width: 54px;
            height: 54px;

            border-radius: 16px;

            background:
                linear-gradient(
                    135deg,
                    #7658ff,
                    #4da3ff
                );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
            font-weight: 900;

            box-shadow:
                0 12px 30px rgba(95, 88, 255, 0.25);
        }

        .brand-name {
            font-size: 20px;

            font-weight: 800;

            letter-spacing: 0.4px;
        }

        .brand-subtitle {
            margin-top: 4px;

            color: #8d96aa;

            font-size: 12px;
        }

        /* =================================================
           BRAND CONTENT
        ================================================= */

        .brand-content {
            margin-top: 50px;

            position: relative;
            z-index: 2;
        }

        .brand-badge {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 9px 13px;

            border-radius: 999px;

            background:
                rgba(118, 88, 255, 0.10);

            border:
                1px solid rgba(118, 88, 255, 0.35);

            color: #b8adff;

            font-size: 12px;

            margin-bottom: 25px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #a99aff;

            box-shadow:
                0 0 12px rgba(118, 88, 255, 0.9);
        }

        .brand-content h1 {
            font-size: 52px;

            line-height: 1.04;

            letter-spacing: -2px;

            font-weight: 900;

            margin-bottom: 24px;
        }

        .brand-content h1 .gradient-text {
            background:
                linear-gradient(
                    90deg,
                    #9279ff,
                    #56a8ff
                );

            -webkit-background-clip: text;
            background-clip: text;

            color: transparent;
        }

        .brand-content p {
            max-width: 440px;

            color: #949db0;

            font-size: 15px;

            line-height: 1.75;
        }

        /* =================================================
           FEATURES
        ================================================= */

        .brand-features {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 14px;

            margin-top: 38px;
        }

        .feature-card {
            min-height: 105px;

            padding: 17px;

            border-radius: 14px;

            background:
                rgba(255, 255, 255, 0.025);

            border:
                1px solid rgba(255, 255, 255, 0.08);

            transition: 0.2s;
        }

        .feature-card:hover {
            border-color:
                rgba(118, 88, 255, 0.35);

            transform: translateY(-2px);
        }

        .feature-icon {
            width: 28px;
            height: 28px;

            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                rgba(118, 88, 255, 0.13);

            color: #b9adff;

            font-size: 13px;

            margin-bottom: 12px;
        }

        .feature-card h3 {
            font-size: 13px;

            margin-bottom: 6px;
        }

        .feature-card p {
            color: #778196;

            font-size: 11px;

            line-height: 1.5;
        }

        .brand-footer {
            position: relative;
            z-index: 2;

            color: #626d82;

            font-size: 11px;

            margin-top: 35px;
        }

        /* =================================================
           RIGHT FORM
        ================================================= */

        .form-panel {
            padding: 48px 55px;

            background:
                linear-gradient(
                    135deg,
                    #0b111c,
                    #080e18
                );

            overflow-y: auto;
        }

        .form-header {
            margin-bottom: 28px;
        }

        .form-header h2 {
            font-size: 32px;

            font-weight: 900;

            letter-spacing: -0.7px;

            margin-bottom: 8px;
        }

        .form-header p {
            color: #8993a6;

            font-size: 14px;
        }

        /* =================================================
           ALERT
        ================================================= */

        .error-box {
            padding: 13px 15px;

            border-radius: 11px;

            margin-bottom: 22px;

            color: #ff8994;

            background:
                rgba(255, 89, 105, 0.07);

            border:
                1px solid rgba(255, 89, 105, 0.25);

            font-size: 13px;

            line-height: 1.6;
        }

        .error-box ul {
            padding-left: 18px;
        }

        .success-box {
            padding: 13px 15px;

            border-radius: 11px;

            margin-bottom: 22px;

            color: var(--success);

            background:
                rgba(67, 214, 130, 0.07);

            border:
                1px solid rgba(67, 214, 130, 0.25);

            font-size: 13px;
        }

        /* =================================================
           FORM SECTION
        ================================================= */

        .form-section {
            margin-bottom: 26px;
        }

        .section-title {
            display: flex;
            align-items: center;

            gap: 10px;

            padding-bottom: 12px;

            margin-bottom: 17px;

            border-bottom:
                1px solid rgba(255, 255, 255, 0.07);
        }

        .section-number {
            width: 28px;
            height: 28px;

            border-radius: 8px;

            background:
                linear-gradient(
                    135deg,
                    rgba(118, 88, 255, 0.25),
                    rgba(77, 163, 255, 0.15)
                );

            border:
                1px solid rgba(118, 88, 255, 0.25);

            display: flex;
            align-items: center;
            justify-content: center;

            color: #bcb1ff;

            font-size: 10px;

            font-weight: 800;
        }

        .section-title span:last-child {
            font-size: 12px;

            font-weight: 800;

            color: #b7bfce;

            letter-spacing: 1px;

            text-transform: uppercase;
        }

        /* =================================================
           FORM
        ================================================= */

        .form-group {
            margin-bottom: 16px;
        }

        .form-row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 14px;
        }

        label {
            display: block;

            margin-bottom: 8px;

            font-size: 13px;

            color: #e7eaf0;

            font-weight: 700;
        }

        .required {
            color: #9585ff;
        }

        input,
        select {
            width: 100%;

            height: 48px;

            padding: 0 15px;

            border-radius: 11px;

            outline: none;

            background:
                #101824;

            border:
                1px solid #293445;

            color: #f4f6fb;

            font-size: 13px;

            transition:
                border-color 0.2s,
                box-shadow 0.2s,
                background 0.2s;
        }

        input::placeholder {
            color: #626d80;
        }

        input:hover,
        select:hover {
            border-color: #39475d;
        }

        input:focus,
        select:focus {
            border-color:
                #7660ff;

            background:
                #111b2a;

            box-shadow:
                0 0 0 3px rgba(118, 88, 255, 0.10);
        }

        select {
            cursor: pointer;
        }

        select option {
            background: #111824;

            color: #ffffff;
        }

        .role-description {
            margin-top: 7px;

            color: #606b7d;

            font-size: 11px;
        }

        /* =================================================
           CONDITIONAL FIELDS
        ================================================= */

        .conditional-fields {
            overflow: hidden;

            max-height: 0;

            opacity: 0;

            transform: translateY(-8px);

            transition:
                max-height 0.30s ease,
                opacity 0.25s ease,
                transform 0.25s ease;
        }

        .conditional-fields.show {
            max-height: 400px;

            opacity: 1;

            transform: translateY(0);
        }

        /* =================================================
           BUTTON
        ================================================= */

        .btn-register {
            width: 100%;

            height: 50px;

            border: none;

            border-radius: 11px;

            background:
                linear-gradient(
                    100deg,
                    #7658ff 0%,
                    #4e89ff 55%,
                    #4da3ff 100%
                );

            color: #ffffff;

            font-size: 14px;

            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 12px 30px rgba(91, 89, 255, 0.20);

            transition:
                transform 0.2s,
                box-shadow 0.2s,
                filter 0.2s;

            margin-top: 3px;
        }

        .btn-register:hover {
            transform: translateY(-2px);

            filter: brightness(1.08);

            box-shadow:
                0 16px 35px rgba(91, 89, 255, 0.30);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        /* =================================================
           LOGIN LINK
        ================================================= */

        .login-link {
            text-align: center;

            margin-top: 20px;

            color: #687387;

            font-size: 13px;
        }

        .login-link a {
            color: #9b8bff;

            text-decoration: none;

            font-weight: 700;

            margin-left: 4px;
        }

        .login-link a:hover {
            color: #65adff;

            text-decoration: underline;
        }

        /* =================================================
           RESPONSIVE TABLET
        ================================================= */

        @media (max-width: 950px) {

            body {
                padding: 20px;
            }

            .register-wrapper {
                grid-template-columns: 1fr;

                max-width: 650px;

                min-height: auto;
            }

            .brand-panel {
                padding: 38px;

                border-right: none;

                border-bottom:
                    1px solid rgba(118, 88, 255, 0.15);
            }

            .brand-content {
                margin-top: 40px;
            }

            .brand-content h1 {
                font-size: 42px;
            }

            .brand-content p {
                max-width: 600px;
            }

            .form-panel {
                padding: 40px;
            }
        }

        /* =================================================
           RESPONSIVE MOBILE
        ================================================= */

        @media (max-width: 600px) {

            body {
                padding: 0;

                display: block;
            }

            .register-wrapper {
                width: 100%;

                min-height: 100vh;

                border: none;

                border-radius: 0;

                box-shadow: none;
            }

            .brand-panel {
                padding: 28px 20px;
            }

            .brand-icon {
                width: 45px;
                height: 45px;

                border-radius: 13px;
            }

            .brand-name {
                font-size: 17px;
            }

            .brand-subtitle {
                font-size: 10px;
            }

            .brand-content {
                margin-top: 35px;
            }

            .brand-content h1 {
                font-size: 34px;

                letter-spacing: -1px;
            }

            .brand-content p {
                font-size: 13px;
            }

            .brand-features {
                grid-template-columns: 1fr;

                gap: 10px;

                margin-top: 25px;
            }

            .feature-card {
                min-height: auto;

                padding: 14px;
            }

            .brand-footer {
                margin-top: 25px;
            }

            .form-panel {
                padding: 30px 20px 40px;
            }

            .form-header h2 {
                font-size: 27px;
            }

            .form-header p {
                font-size: 13px;
            }

            .form-row {
                grid-template-columns: 1fr;

                gap: 0;
            }

            input,
            select {
                height: 46px;
            }
        }

        @media (max-width: 360px) {

            .brand-content h1 {
                font-size: 29px;
            }

            .form-panel {
                padding-left: 16px;
                padding-right: 16px;
            }
        }
    </style>
</head>

<body>

<div class="register-wrapper">

    <!-- =================================================
         LEFT BRAND PANEL
    ================================================== -->

    <div class="brand-panel">

        <div>

            <div class="brand-top">

                <div class="brand-icon">
                    QR
                </div>

                <div>

                    <div class="brand-name">
                        ABSENSI QR
                    </div>

                    <div class="brand-subtitle">
                        Smart Attendance System
                    </div>

                </div>

            </div>


            <div class="brand-content">

                <div class="brand-badge">

                    <span class="badge-dot"></span>

                    Sistem Absensi Digital

                </div>


                <h1>
                    Buat akun<br>

                    <span class="gradient-text">
                        baru kamu.
                    </span>
                </h1>


                <p>
                    Daftarkan akun untuk menggunakan
                    sistem absensi QR yang praktis,
                    aman, dan terintegrasi.
                </p>


                <div class="brand-features">

                    <div class="feature-card">

                        <div class="feature-icon">
                            ◇
                        </div>

                        <h3>
                            QR Attendance
                        </h3>

                        <p>
                            Scan QR untuk melakukan
                            absensi dengan cepat.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div class="feature-icon">
                            ○
                        </div>

                        <h3>
                            Real-time
                        </h3>

                        <p>
                            Data kehadiran tercatat
                            langsung ke sistem.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div class="feature-icon">
                            ◆
                        </div>

                        <h3>
                            Data Terintegrasi
                        </h3>

                        <p>
                            Biodata dan riwayat
                            tersimpan dalam satu sistem.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div class="feature-icon">
                            ✓
                        </div>

                        <h3>
                            Dashboard
                        </h3>

                        <p>
                            Kelola aktivitas absensi
                            melalui dashboard pribadi.
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="brand-footer">
            © {{ date('Y') }} Absensi QR. All rights reserved.
        </div>

    </div>


    <!-- =================================================
         RIGHT FORM PANEL
    ================================================== -->

    <div class="form-panel">

        <div class="form-header">

            <h2>
                Daftar Akun
            </h2>

            <p>
                Lengkapi data untuk membuat akun baru.
            </p>

        </div>


        <!-- ERROR -->

        @if ($errors->any())

            <div class="error-box">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- SUCCESS -->

        @if (session('success'))

            <div class="success-box">
                {{ session('success') }}
            </div>

        @endif


        <form
            action="{{ route('register.process') }}"
            method="POST"
        >

            @csrf


            <!-- =================================================
                 01 JENIS AKUN
            ================================================== -->

            <div class="form-section">

                <div class="section-title">

                    <div class="section-number">
                        01
                    </div>

                    <span>
                        Jenis Akun
                    </span>

                </div>


                <div class="form-group">

                    <label for="role">
                        Daftar Sebagai
                    </label>

                    <select
                        name="role"
                        id="role"
                        required
                    >

                        <option
                            value="mahasiswa"
                            {{ old('role', 'mahasiswa') === 'mahasiswa' ? 'selected' : '' }}
                        >
                            Mahasiswa
                        </option>

                        <option
                            value="dosen"
                            {{ old('role') === 'dosen' ? 'selected' : '' }}
                        >
                            Dosen
                        </option>

                    </select>


                    <div class="role-description">
                        Pilih jenis akun yang akan digunakan.
                    </div>

                </div>

            </div>


            <!-- =================================================
                 02 DATA IDENTITAS
            ================================================== -->

            <div class="form-section">

                <div class="section-title">

                    <div class="section-number">
                        02
                    </div>

                    <span>
                        Data Identitas
                    </span>

                </div>


                <!-- =============================================
                     MAHASISWA
                ============================================== -->

                <div
                    class="conditional-fields"
                    id="mahasiswaFields"
                >

                    <div class="form-row">

                        <div class="form-group">

                            <label for="npm">
                                NPM
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="npm"
                                id="npm"
                                value="{{ old('npm') }}"
                                placeholder="Masukkan NPM"
                            >

                        </div>


                        <div class="form-group">

                            <label for="program_studi">
                                Program Studi
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="program_studi"
                                id="program_studi"
                                value="{{ old('program_studi') }}"
                                placeholder="Contoh: Informatika"
                            >

                        </div>

                    </div>


                    <div class="form-group">

                        <label for="kelas">
                            Kelas
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="kelas"
                            id="kelas"
                            value="{{ old('kelas') }}"
                            placeholder="Contoh: 5.2"
                        >

                    </div>

                </div>


                <!-- =============================================
                     DOSEN
                ============================================== -->

                <div
                    class="conditional-fields"
                    id="dosenFields"
                >

                    <div class="form-group">

                        <label for="nidn">
                            NIDN
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="nidn"
                            id="nidn"
                            value="{{ old('nidn') }}"
                            placeholder="Masukkan NIDN"
                        >

                    </div>

                </div>


                <!-- NAMA -->

                <div class="form-group">

                    <label for="nama">
                        Nama Lengkap
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                </div>

            </div>


            <!-- =================================================
                 03 INFORMASI AKUN
            ================================================== -->

            <div class="form-section">

                <div class="section-title">

                    <div class="section-number">
                        03
                    </div>

                    <span>
                        Informasi Akun
                    </span>

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                        <span class="required">*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email aktif"
                        required
                    >

                </div>

            </div>


            <!-- =================================================
                 04 KEAMANAN
            ================================================== -->

            <div class="form-section">

                <div class="section-title">

                    <div class="section-number">
                        04
                    </div>

                    <span>
                        Keamanan Akun
                    </span>

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label for="password">
                            Password
                            <span class="required">*</span>
                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Minimal 8 karakter"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="password_confirmation">
                            Konfirmasi Password
                            <span class="required">*</span>
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Ulangi password"
                            required
                        >

                    </div>

                </div>

            </div>


            <!-- =================================================
                 BUTTON
            ================================================== -->

            <button
                type="submit"
                class="btn-register"
            >
                Daftar Sekarang
            </button>

        </form>


        <!-- LOGIN -->

        <div class="login-link">

            Sudah punya akun?

            <a href="{{ route('login') }}">
                Login di sini
            </a>

        </div>

    </div>

</div>


<script>

    const roleSelect =
        document.getElementById('role');

    const mahasiswaFields =
        document.getElementById('mahasiswaFields');

    const dosenFields =
        document.getElementById('dosenFields');

    const npmInput =
        document.getElementById('npm');

    const programStudiInput =
        document.getElementById('program_studi');

    const kelasInput =
        document.getElementById('kelas');

    const nidnInput =
        document.getElementById('nidn');


    function updateRoleFields() {

        const role = roleSelect.value;


        if (role === 'mahasiswa') {

            mahasiswaFields.classList.add('show');

            dosenFields.classList.remove('show');


            npmInput.required = true;

            programStudiInput.required = true;

            kelasInput.required = true;

            nidnInput.required = false;

        }


        else if (role === 'dosen') {

            mahasiswaFields.classList.remove('show');

            dosenFields.classList.add('show');


            npmInput.required = false;

            programStudiInput.required = false;

            kelasInput.required = false;

            nidnInput.required = true;

        }

    }


    roleSelect.addEventListener(
        'change',
        updateRoleFields
    );


    updateRoleFields();

</script>

</body>

</html>