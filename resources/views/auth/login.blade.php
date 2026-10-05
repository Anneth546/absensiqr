<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Absensi QR</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #070b14;
            --card: rgba(15, 22, 38, 0.88);
            --border: rgba(255, 255, 255, 0.10);
            --text: #f5f7ff;
            --muted: #8d97aa;

            --primary: #7c5cff;
            --blue: #35a7ff;

            --danger: #ff5f6d;
        }

        body {
            min-height: 100vh;

            font-family: Arial, Helvetica, sans-serif;

            color: var(--text);

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(124, 92, 255, 0.18),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(53, 167, 255, 0.14),
                    transparent 30%
                ),
                var(--bg);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;

            overflow-x: hidden;
        }

        /* Background glow */

        .glow {
            position: fixed;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            filter: blur(100px);

            opacity: 0.25;

            pointer-events: none;
        }

        .glow-one {
            top: -150px;
            left: -120px;

            background: #7c5cff;
        }

        .glow-two {
            right: -150px;
            bottom: -150px;

            background: #168cff;
        }


        /* LOGIN WRAPPER */

        .login-wrapper {
            width: 100%;
            max-width: 1050px;

            min-height: 650px;

            display: grid;

            grid-template-columns: 1fr 1fr;

            background: rgba(10, 15, 27, 0.72);

            border: 1px solid var(--border);

            border-radius: 28px;

            overflow: hidden;

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.55),
                inset 0 1px 0 rgba(255, 255, 255, 0.04);

            backdrop-filter: blur(20px);

            animation: containerShow 0.7s ease;
        }


        /* LEFT */

        .login-info {
            position: relative;

            padding: 60px;

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            background:
                linear-gradient(
                    145deg,
                    rgba(124, 92, 255, 0.18),
                    rgba(53, 167, 255, 0.05)
                );

            border-right: 1px solid var(--border);
        }


        /* BRAND */

        .brand {
            display: flex;

            align-items: center;

            gap: 14px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background:
                linear-gradient(
                    135deg,
                    var(--primary),
                    var(--blue)
                );

            font-size: 17px;

            font-weight: 900;

            box-shadow:
                0 10px 30px rgba(124, 92, 255, 0.3);
        }

        .brand-name {
            font-size: 18px;

            font-weight: 700;

            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            color: var(--muted);

            font-size: 12px;

            margin-top: 3px;
        }


        /* HERO */

        .hero-content {
            margin-top: 50px;
        }

        .hero-badge {
            display: inline-flex;

            padding: 8px 13px;

            border: 1px solid rgba(124, 92, 255, 0.3);

            border-radius: 50px;

            color: #bcaeff;

            background: rgba(124, 92, 255, 0.08);

            font-size: 12px;

            margin-bottom: 22px;
        }

        .hero-content h1 {
            font-size: clamp(38px, 4vw, 58px);

            line-height: 1.05;

            letter-spacing: -2px;

            margin-bottom: 20px;
        }

        .hero-content h1 span {
            background:
                linear-gradient(
                    90deg,
                    #9b84ff,
                    #45b5ff
                );

            -webkit-background-clip: text;

            background-clip: text;

            color: transparent;
        }

        .hero-content p {
            max-width: 430px;

            color: var(--muted);

            line-height: 1.8;

            font-size: 15px;
        }


        /* FEATURES */

        .features {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            margin-top: 35px;
        }

        .feature {
            padding: 15px;

            border: 1px solid var(--border);

            background: rgba(255, 255, 255, 0.025);

            border-radius: 14px;

            transition: 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-3px);

            background: rgba(255, 255, 255, 0.05);

            border-color: rgba(124, 92, 255, 0.35);
        }

        .feature-icon {
            font-size: 20px;

            margin-bottom: 8px;
        }

        .feature strong {
            display: block;

            font-size: 13px;

            margin-bottom: 4px;
        }

        .feature span {
            color: var(--muted);

            font-size: 11px;
        }

        .copyright {
            color: #5d6678;

            font-size: 11px;
        }


        /* RIGHT */

        .login-section {
            display: flex;

            align-items: center;

            justify-content: center;

            padding: 60px;
        }

        .login-card {
            width: 100%;

            max-width: 390px;
        }


        /* HEADER */

        .login-header {
            margin-bottom: 32px;
        }

        .login-header h2 {
            font-size: 30px;

            margin-bottom: 9px;
        }

        .login-header p {
            color: var(--muted);

            font-size: 13px;
        }


        /* ERROR */

        .error-box {
            padding: 13px 15px;

            margin-bottom: 20px;

            border-radius: 12px;

            border: 1px solid rgba(255, 95, 109, 0.3);

            background: rgba(255, 95, 109, 0.08);

            color: #ff9da5;

            font-size: 13px;

            line-height: 1.5;
        }


        /* FORM */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 9px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 15px;

            top: 50%;

            transform: translateY(-50%);

            color: #68738a;

            font-size: 16px;

            pointer-events: none;
        }

        .form-control {
            width: 100%;

            height: 50px;

            padding: 0 15px 0 45px;

            color: var(--text);

            background: rgba(255, 255, 255, 0.035);

            border: 1px solid rgba(255, 255, 255, 0.10);

            border-radius: 12px;

            outline: none;

            font-size: 14px;

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .form-control::placeholder {
            color: #596276;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.055);

            border-color: var(--primary);

            box-shadow:
                0 0 0 4px rgba(124, 92, 255, 0.10),
                0 0 25px rgba(124, 92, 255, 0.08);
        }


        /* SELECT */

        select.form-control {
            appearance: none;

            cursor: pointer;

            padding-right: 40px;
        }

        select.form-control option {
            background: #111827;

            color: white;
        }

        .select-arrow {
            position: absolute;

            right: 15px;

            top: 50%;

            transform: translateY(-50%);

            color: #69748a;

            pointer-events: none;
        }


        /* BUTTON */

        .login-button {
            width: 100%;

            height: 52px;

            margin-top: 5px;

            border: none;

            border-radius: 12px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    var(--primary),
                    #4b9cff
                );

            font-size: 14px;

            font-weight: 700;

            letter-spacing: 0.3px;

            cursor: pointer;

            box-shadow:
                0 10px 30px rgba(91, 63, 212, 0.25);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                filter 0.25s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 15px 35px rgba(91, 63, 212, 0.38);

            filter: brightness(1.08);
        }

        .login-button:active {
            transform: translateY(0);
        }


        /* BACK */

        .back-home {
            display: block;

            text-align: center;

            margin-top: 22px;

            color: #7e889b;

            text-decoration: none;

            font-size: 12px;

            transition: 0.25s ease;
        }

        .back-home:hover {
            color: white;
        }


        /* ANIMATION */

        @keyframes containerShow {

            from {
                opacity: 0;

                transform:
                    translateY(20px)
                    scale(0.98);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }
        }


        /* TABLET */

        @media (max-width: 850px) {

            .login-wrapper {
                grid-template-columns: 1fr;

                max-width: 520px;

                min-height: auto;
            }

            .login-info {
                display: none;
            }

            .login-section {
                padding: 45px 30px;
            }
        }


        /* MOBILE */

        @media (max-width: 480px) {

            body {
                padding: 15px;
            }

            .login-wrapper {
                border-radius: 20px;
            }

            .login-section {
                padding: 35px 22px;
            }

            .login-header h2 {
                font-size: 26px;
            }

            .form-control {
                height: 48px;
            }

            .login-button {
                height: 50px;
            }
        }
    </style>
</head>


<body>

    <div class="glow glow-one"></div>
    <div class="glow glow-two"></div>


    <div class="login-wrapper">


        <!-- =====================================
             BAGIAN KIRI
        ====================================== -->

        <section class="login-info">

            <div>

                <div class="brand">

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


                <div class="hero-content">

                    <div class="hero-badge">
                        ● Sistem Absensi Digital
                    </div>

                    <h1>
                        Absensi lebih
                        <span>cepat & mudah.</span>
                    </h1>

                    <p>
                        Kelola kehadiran mahasiswa dengan sistem
                        QR Code yang praktis, aman, dan terintegrasi.
                    </p>


                    <div class="features">

                        <div class="feature">

                            <div class="feature-icon">
                                ◈
                            </div>

                            <strong>
                                QR Attendance
                            </strong>

                            <span>
                                Scan QR untuk melakukan absensi.
                            </span>

                        </div>


                        <div class="feature">

                            <div class="feature-icon">
                                ◉
                            </div>

                            <strong>
                                Real-time
                            </strong>

                            <span>
                                Data kehadiran tercatat langsung.
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="copyright">
                © {{ date('Y') }} Absensi QR. All rights reserved.
            </div>

        </section>



        <!-- =====================================
             BAGIAN LOGIN
        ====================================== -->

        <section class="login-section">

            <div class="login-card">


                <div class="login-header">

                    <h2>
                        Selamat datang 👋
                    </h2>

                    <p>
                        Silakan masuk untuk melanjutkan.
                    </p>

                </div>


                <!-- ERROR -->

                @if ($errors->any())

                    <div class="error-box">

                        @foreach ($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                @endif



                <!-- FORM LOGIN -->

                <form
                    action="{{ route('login.process') }}"
                    method="POST"
                >

                    @csrf


                    <!-- ROLE -->

                    <div class="form-group">

                        <label for="role">
                            Masuk sebagai
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ◉
                            </span>

                            <select
                                name="role"
                                id="role"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Pilih role
                                </option>

                                <option
                                    value="mahasiswa"
                                    {{ old('role') == 'mahasiswa' ? 'selected' : '' }}
                                >
                                    Mahasiswa
                                </option>

                                <option
                                    value="dosen"
                                    {{ old('role') == 'dosen' ? 'selected' : '' }}
                                >
                                    Dosen
                                </option>

                                <option
                                    value="admin"
                                    {{ old('role') == 'admin' ? 'selected' : '' }}
                                >
                                    Admin
                                </option>

                            </select>

                            <span class="select-arrow">
                                ▼
                            </span>

                        </div>

                    </div>



                    <!-- IDENTITY -->

                    <div class="form-group">

                        <label for="identity" id="identityLabel">
                            NPM
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon" id="identityIcon">
                                #
                            </span>

                            <input
                                type="text"
                                name="identity"
                                id="identity"
                                class="form-control"
                                placeholder="Masukkan NPM"
                                value="{{ old('identity') }}"
                                autocomplete="username"
                                required
                            >

                        </div>

                    </div>



                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ●
                            </span>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                autocomplete="current-password"
                                required
                            >

                        </div>

                    </div>



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="login-button"
                    >
                        Masuk ke Sistem
                    </button>

                </form>

                <div style="text-align: center; margin-top: 20px; margin-bottom: 16px;">
    <span style="color: #8b93a7;">
        Belum punya akun?
    </span>

    <a href="{{ route('register') }}"
       style="
           color: #8b7cff;
           font-weight: 700;
           text-decoration: none;
           margin-left: 5px;
       ">
        Daftar sekarang
    </a>
</div>


                <a
                    href="{{ url('/') }}"
                    class="back-home"
                >
                    ← Kembali ke halaman utama
                </a>

            </div>

        </section>

    </div>



    <!-- =====================================
         JAVASCRIPT ROLE
    ====================================== -->

    <script>

        const roleSelect = document.getElementById('role');

        const identityLabel =
            document.getElementById('identityLabel');

        const identityInput =
            document.getElementById('identity');

        const identityIcon =
            document.getElementById('identityIcon');


        function updateIdentityField() {

            const role = roleSelect.value;


            if (role === 'mahasiswa') {

                identityLabel.textContent = 'NPM';

                identityInput.placeholder =
                    'Masukkan NPM';

                identityInput.inputMode =
                    'numeric';

                identityIcon.textContent = '#';

            }


            else if (role === 'dosen') {

                identityLabel.textContent = 'NIDN';

                identityInput.placeholder =
                    'Masukkan NIDN';

                identityInput.inputMode =
                    'numeric';

                identityIcon.textContent = '#';

            }


            else if (role === 'admin') {

                identityLabel.textContent =
                    'Email';

                identityInput.placeholder =
                    'Masukkan email admin';

                identityInput.inputMode =
                    'email';

                identityIcon.textContent =
                    '@';

            }


            else {

                identityLabel.textContent =
                    'Identitas';

                identityInput.placeholder =
                    'Masukkan identitas';

                identityInput.inputMode =
                    'text';

                identityIcon.textContent =
                    '#';
            }

        }


        roleSelect.addEventListener(
            'change',
            updateIdentityField
        );


        // Mempertahankan role setelah error login
        updateIdentityField();

    </script>

</body>

</html>