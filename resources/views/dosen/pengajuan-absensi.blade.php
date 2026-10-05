<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pengajuan Absensi | Absensi QR</title>

    <style>
        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
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

            color: #f8fafc;
            min-height: 100vh;
            overflow-x: hidden;
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

            --text: #f8fafc;

            --muted: #8b95aa;

            --muted-light: #a9b2c5;

            --purple: #7657ff;

            --purple-light: #927cff;

            --blue: #4d9cff;

            --gradient:
                linear-gradient(
                    135deg,
                    #7657ff 0%,
                    #4d9cff 100%
                );

            --shadow:
                0 20px 50px rgba(0, 0, 0, 0.3);

            --radius: 18px;
        }

        /* =====================================================
           SCROLLBAR
        ===================================================== */

        *::-webkit-scrollbar {
            width: 8px;
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

            border-radius: 20px;
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
            min-height: 100vh;
            display: flex;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 255px;
            height: 100vh;

            background:
                linear-gradient(
                    180deg,
                    rgba(13, 17, 35, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            padding: 28px 18px;

            z-index: 1000;

            display: flex;
            flex-direction: column;

            overflow: hidden;

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease;
        }

        /* =====================================================
           SIDEBAR LOGO
        ===================================================== */

        .logo {
            display: flex;
            align-items: center;

            gap: 11px;

            padding: 5px 10px;

            margin-bottom: 20px;

            flex-shrink: 0;
        }

        .logo-icon {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #7657ff,
                    #4d9cff
                );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;
            font-weight: 900;

            color: white;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, 0.35);

            flex-shrink: 0;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 900;
            letter-spacing: -0.4px;
            color: #fff;
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

        /* =====================================================
           SIDEBAR MENU SCROLL
        ===================================================== */

        .sidebar-menu-scroll {
            flex: 1;
            min-height: 0;

            overflow-y: auto;
            overflow-x: hidden;

            padding-right: 4px;

            scrollbar-width: thin;
            scrollbar-color:
                #7657ff
                transparent;

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
            background:
                linear-gradient(
                    180deg,
                    #7657ff,
                    #4d9cff
                );

            border-radius: 20px;
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
            display: flex;
            flex-direction: column;
            gap: 6px;

            padding-bottom: 10px;
        }

        .menu-label {
            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.4px;
            text-transform: uppercase;

            color: #5f6980;

            padding: 0 13px;

            margin-bottom: 9px;
            margin-top: 3px;
        }

        .menu a {
            position: relative;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 12px 13px;

            color: #8993a8;

            text-decoration: none;

            border-radius: 11px;

            font-size: 13px;
            font-weight: 700;

            transition:
                background 0.25s ease,
                color 0.25s ease,
                transform 0.25s ease;
        }

        .menu-icon {
            width: 20px;

            text-align: center;

            font-size: 16px;

            opacity: 0.9;

            flex-shrink: 0;
        }

        .menu a:hover {
            background:
                rgba(118, 87, 255, 0.09);

            color: #fff;

            transform: translateX(3px);
        }

        .menu a.active {
            color: #fff;

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
                rgba(118, 87, 255, 0.8);
        }

        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout {
            margin-top: 12px;

            padding-top: 20px;

            border-top:
                1px solid var(--border);

            flex-shrink: 0;
        }

        .logout button {
            width: 100%;

            border:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.025);

            color: #a7afc0;

            padding: 12px;

            border-radius: 11px;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            transition:
                all 0.25s ease;
        }

        .logout button:hover {
            color: #fff;

            border-color:
                rgba(118, 87, 255, 0.4);

            background:
                rgba(118, 87, 255, 0.1);

            transform:
                translateY(-2px);
        }

        /* =====================================================
           MOBILE HEADER
        ===================================================== */

        .mobile-header {
            display: none;
        }

        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            width: calc(100% - 255px);

            margin-left: 255px;

            min-height: 100vh;

            padding:
                32px 35px 45px;

            position: relative;
        }

        /* =====================================================
           BACKGROUND GLOW
        ===================================================== */

        .main::before {
            content: "";

            position: fixed;

            width: 420px;
            height: 420px;

            border-radius: 50%;

            background:
                rgba(118, 87, 255, 0.07);

            filter: blur(80px);

            top: -180px;
            right: -150px;

            pointer-events: none;
        }

        /* =====================================================
           TOP BAR
        ===================================================== */

        .topbar {
            display: flex;

            justify-content: space-between;
            align-items: center;

            margin-bottom: 26px;
        }

        .page-title {
            font-size: 13px;

            color: var(--muted);

            font-weight: 600;
        }

        .page-title strong {
            color: #fff;

            font-weight: 800;
        }

        .top-profile {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 7px 11px;

            border:
                1px solid var(--border);

            border-radius: 12px;

            background:
                rgba(255, 255, 255, 0.025);
        }

        .top-avatar {
            width: 30px;
            height: 30px;

            border-radius: 9px;

            background:
                var(--gradient);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 12px;
            font-weight: 900;
        }

        .top-profile span {
            font-size: 12px;

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
                    rgba(42, 32, 93, 0.9),
                    rgba(22, 34, 71, 0.78)
                );

            border:
                1px solid
                rgba(124, 92, 255, 0.2);

            border-radius: 20px;

            padding: 30px 32px;

            margin-bottom: 22px;

            box-shadow:
                0 20px 55px
                rgba(0, 0, 0, 0.22);
        }

        .page-header::after {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background:
                rgba(77, 156, 255, 0.12);

            filter: blur(45px);

            right: -80px;
            top: -100px;

            pointer-events: none;
        }

        .page-header-content {
            position: relative;

            z-index: 2;
        }

        .page-header h1 {
            font-size: 29px;

            line-height: 1.2;

            font-weight: 850;

            letter-spacing: -0.7px;

            margin-bottom: 9px;
        }

        .page-header h1 span {
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

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 14px 17px;

            border-radius: 13px;

            margin-bottom: 20px;

            font-size: 13px;

            font-weight: 650;
        }

        .alert-success {
            background:
                rgba(34, 197, 94, 0.09);

            border:
                1px solid
                rgba(34, 197, 94, 0.22);

            color: #8df0aa;
        }

        .alert-error {
            background:
                rgba(239, 68, 68, 0.09);

            border:
                1px solid
                rgba(239, 68, 68, 0.22);

            color: #ff9b9b;
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

            padding: 23px;

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

        .card-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 22px;
        }

        .card-header h2 {
            font-size: 16px;

            font-weight: 850;

            color: #f8fafc;
        }

        .card-header span {
            color: #727d93;

            font-size: 11px;

            font-weight: 600;
        }

        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 12px;

            margin-bottom: 18px;
        }

        .summary-item {
            background:
                rgba(255, 255, 255, 0.025);

            border:
                1px solid var(--border);

            border-radius: 14px;

            padding: 17px;
        }

        .summary-label {
            color: #737e94;

            font-size: 10px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 0.8px;

            margin-bottom: 8px;
        }

        .summary-number {
            font-size: 24px;

            font-weight: 850;

            color: #f8fafc;
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;

            border:
                1px solid var(--border);

            border-radius: 14px;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }

        thead {
            background:
                rgba(255, 255, 255, 0.025);
        }

        th {
            padding: 15px 14px;

            text-align: left;

            color: #727d93;

            font-size: 10px;

            font-weight: 850;

            text-transform: uppercase;

            letter-spacing: 0.8px;

            border-bottom:
                1px solid var(--border);

            white-space: nowrap;
        }

        td {
            padding: 16px 14px;

            color: #dce2ed;

            font-size: 12px;

            font-weight: 600;

            border-bottom:
                1px solid
                rgba(148, 163, 184, 0.08);

            vertical-align: middle;
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
            border-bottom: none;
        }

        /* =====================================================
           MAHASISWA
        ===================================================== */

        .student {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .student-avatar {
            width: 35px;
            height: 35px;

            border-radius: 10px;

            background:
                var(--gradient);

            display: flex;

            align-items: center;
            justify-content: center;

            color: #fff;

            font-size: 12px;

            font-weight: 900;

            flex-shrink: 0;
        }

        .student-info {
            display: flex;

            flex-direction: column;

            gap: 3px;
        }

        .student-name {
            color: #f8fafc;

            font-size: 12px;

            font-weight: 800;
        }

        .student-npm {
            color: #68738a;

            font-size: 10px;

            font-weight: 600;
        }

        /* =====================================================
           COURSE
        ===================================================== */

        .course-name {
            color: #f0f3f8;

            font-size: 12px;

            font-weight: 750;

            margin-bottom: 3px;
        }

        .course-code {
            color: #68738a;

            font-size: 10px;
        }

        /* =====================================================
           BADGES
        ===================================================== */

        .badge {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 6px 9px;

            border-radius: 8px;

            font-size: 9px;

            font-weight: 850;

            text-transform: uppercase;

            letter-spacing: 0.5px;

            white-space: nowrap;
        }

        .badge-menunggu {
            background:
                rgba(245, 158, 11, 0.10);

            border:
                1px solid
                rgba(245, 158, 11, 0.20);

            color: #f6c76b;
        }

        .badge-disetujui {
            background:
                rgba(34, 197, 94, 0.10);

            border:
                1px solid
                rgba(34, 197, 94, 0.20);

            color: #75e99a;
        }

        .badge-ditolak {
            background:
                rgba(239, 68, 68, 0.10);

            border:
                1px solid
                rgba(239, 68, 68, 0.20);

            color: #ff9191;
        }

        .badge-jenis {
            background:
                rgba(118, 87, 255, 0.10);

            border:
                1px solid
                rgba(118, 87, 255, 0.20);

            color: #b6a9ff;
        }

        /* =====================================================
           DATE
        ===================================================== */

        .date-text {
            color: #dce2ed;

            font-size: 11px;

            font-weight: 700;
        }

        /* =====================================================
           REASON
        ===================================================== */

        .reason {
            max-width: 230px;

            color: #929db2;

            font-size: 11px;

            line-height: 1.5;
        }

        /* =====================================================
           ACTIONS
        ===================================================== */

        .actions {
            display: flex;

            align-items: center;

            gap: 7px;

            white-space: nowrap;
        }

        .action-btn {
            border: none;

            padding: 8px 11px;

            border-radius: 8px;

            font-size: 10px;

            font-weight: 800;

            cursor: pointer;

            transition:
                all 0.25s ease;
        }

        .approve-btn {
            background:
                rgba(34, 197, 94, 0.10);

            border:
                1px solid
                rgba(34, 197, 94, 0.20);

            color: #79e99c;
        }

        .approve-btn:hover {
            background:
                rgba(34, 197, 94, 0.18);

            border-color:
                rgba(34, 197, 94, 0.4);

            transform:
                translateY(-2px);
        }

        .reject-btn {
            background:
                rgba(239, 68, 68, 0.10);

            border:
                1px solid
                rgba(239, 68, 68, 0.20);

            color: #ff9292;
        }

        .reject-btn:hover {
            background:
                rgba(239, 68, 68, 0.18);

            border-color:
                rgba(239, 68, 68, 0.4);

            transform:
                translateY(-2px);
        }

        /* =====================================================
           PROCESSED
        ===================================================== */

        .processed {
            display: flex;

            flex-direction: column;

            gap: 4px;
        }

        .processed-time {
            color: #68738a;

            font-size: 9px;
        }

        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {
            text-align: center;

            padding: 65px 20px;
        }

        .empty-icon {
            width: 58px;
            height: 58px;

            margin:
                0 auto 15px;

            border-radius: 16px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                rgba(118, 87, 255, 0.09);

            border:
                1px solid
                rgba(118, 87, 255, 0.16);

            font-size: 23px;
        }

        .empty h3 {
            color: #e9edf5;

            font-size: 15px;

            font-weight: 800;

            margin-bottom: 7px;
        }

        .empty p {
            color: #69748a;

            font-size: 11px;

            line-height: 1.6;
        }

        /* =====================================================
           MODAL
        ===================================================== */

        .modal-overlay {
            display: none;

            position: fixed;

            inset: 0;

            background:
                rgba(2, 5, 12, 0.72);

            backdrop-filter:
                blur(6px);

            -webkit-backdrop-filter:
                blur(6px);

            z-index: 2000;

            align-items: center;

            justify-content: center;

            padding: 20px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal {
            width: 100%;

            max-width: 470px;

            background:
                #111827;

            border:
                1px solid var(--border);

            border-radius: 18px;

            padding: 24px;

            box-shadow:
                0 30px 80px
                rgba(0, 0, 0, 0.5);

            animation:
                modalIn 0.25s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;

                transform:
                    translateY(15px)
                    scale(0.97);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }
        }

        .modal-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 18px;
        }

        .modal-header h3 {
            font-size: 17px;

            font-weight: 850;

            color: #fff;
        }

        .close-modal {
            width: 32px;
            height: 32px;

            border:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.03);

            color: #a7afc0;

            border-radius: 9px;

            cursor: pointer;

            font-size: 16px;

            display: flex;

            align-items: center;
            justify-content: center;

            transition:
                all 0.25s ease;
        }

        .close-modal:hover {
            color: #fff;

            background:
                rgba(118, 87, 255, 0.1);
        }

        .modal-description {
            color: #8993a8;

            font-size: 12px;

            line-height: 1.6;

            margin-bottom: 17px;
        }

        .form-label {
            display: block;

            color: #aeb7c8;

            font-size: 11px;

            font-weight: 800;

            margin-bottom: 8px;
        }

        .form-textarea {
            width: 100%;

            min-height: 120px;

            resize: vertical;

            padding: 12px 13px;

            border:
                1px solid var(--border);

            border-radius: 11px;

            outline: none;

            background:
                rgba(255, 255, 255, 0.025);

            color: #f8fafc;

            font-family: inherit;

            font-size: 12px;

            line-height: 1.5;

            transition:
                border-color 0.25s ease,
                background 0.25s ease;
        }

        .form-textarea::placeholder {
            color: #59647a;
        }

        .form-textarea:focus {
            border-color:
                rgba(118, 87, 255, 0.5);

            background:
                rgba(118, 87, 255, 0.04);
        }

        .modal-actions {
            display: flex;

            justify-content: flex-end;

            gap: 9px;

            margin-top: 17px;
        }

        .modal-btn {
            border: none;

            padding: 10px 15px;

            border-radius: 9px;

            font-size: 11px;

            font-weight: 800;

            cursor: pointer;

            transition:
                all 0.25s ease;
        }

        .cancel-btn {
            background:
                rgba(255, 255, 255, 0.04);

            border:
                1px solid var(--border);

            color: #a7afc0;
        }

        .cancel-btn:hover {
            color: #fff;

            background:
                rgba(255, 255, 255, 0.07);
        }

        .confirm-reject-btn {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #dc2626
                );

            color: #fff;

            box-shadow:
                0 8px 20px
                rgba(239, 68, 68, 0.2);
        }

        .confirm-reject-btn:hover {
            transform:
                translateY(-2px);

            box-shadow:
                0 12px 25px
                rgba(239, 68, 68, 0.28);
        }

        /* =====================================================
           SIDEBAR OVERLAY
        ===================================================== */

        .sidebar-overlay {
            display: none;
        }

        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1150px) {

            .summary {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }
        }

        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 760px) {

            /* SIDEBAR */

            .sidebar {
                width: 270px;

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
                display: block;

                position: fixed;

                inset: 0;

                background:
                    rgba(2, 5, 12, 0.68);

                backdrop-filter:
                    blur(3px);

                -webkit-backdrop-filter:
                    blur(3px);

                z-index: 900;

                animation:
                    fadeIn 0.25s ease;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            /* MAIN */

            .main {
                width: 100%;

                margin-left: 0;

                padding:
                    85px 16px 35px;
            }

            /* MOBILE HEADER */

            .mobile-header {
                position: fixed;

                display: flex;

                align-items: center;

                justify-content: space-between;

                top: 0;
                left: 0;
                right: 0;

                height: 65px;

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

                z-index: 800;
            }

            .mobile-logo {
                display: flex;

                align-items: center;

                gap: 9px;

                font-size: 16px;

                font-weight: 900;
            }

            .mobile-logo-icon {
                width: 33px;
                height: 33px;

                border-radius: 9px;

                background:
                    var(--gradient);

                display: flex;

                align-items: center;
                justify-content: center;

                font-size: 11px;

                font-weight: 900;
            }

            .mobile-logo span {
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

            .hamburger {
                width: 40px;
                height: 40px;

                border:
                    1px solid var(--border);

                border-radius: 11px;

                background:
                    rgba(255, 255, 255, 0.03);

                color: #fff;

                cursor: pointer;

                display: flex;

                align-items: center;
                justify-content: center;

                font-size: 21px;

                transition:
                    all 0.25s ease;
            }

            .hamburger:hover {
                background:
                    rgba(118, 87, 255, 0.12);

                border-color:
                    rgba(118, 87, 255, 0.35);
            }

            /* TOPBAR */

            .topbar {
                margin-bottom: 20px;
            }

            .top-profile {
                display: none;
            }

            /* HEADER */

            .page-header {
                padding: 22px;

                border-radius: 17px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .page-header p {
                font-size: 12px;
            }

            /* SUMMARY */

            .summary {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));

                gap: 8px;
            }

            .summary-item {
                padding: 13px;
            }

            .summary-number {
                font-size: 20px;
            }

            /* CARD */

            .card {
                padding: 19px;

                border-radius: 16px;
            }

            /* TABLE */

            .table-wrapper {
                border-radius: 12px;
            }

            /* MODAL */

            .modal {
                padding: 20px;

                border-radius: 16px;
            }

            .modal-actions {
                flex-direction: column-reverse;
            }

            .modal-btn {
                width: 100%;
            }
        }

        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 430px) {

            .main {
                padding-left: 13px;
                padding-right: 13px;
            }

            .summary {
                grid-template-columns:
                    1fr;
            }

            .summary-item {
                display: flex;

                align-items: center;

                justify-content: space-between;
            }

            .summary-label {
                margin-bottom: 0;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .card-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 5px;
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


            <!-- MENU SCROLL -->

            <div class="sidebar-menu-scroll">

                <nav class="menu">

                    <div class="menu-label">
                        Menu Utama
                    </div>


                    <!-- DASHBOARD -->

                    <a href="{{ route('dosen.dashboard') }}">

                        <span class="menu-icon">
                            ⌂
                        </span>

                        Dashboard

                    </a>


                    <!-- MATA KULIAH -->

                    <a href="{{ route('dosen.mata-kuliah') }}">

                        <span class="menu-icon">
                            ▣
                        </span>

                        Mata Kuliah

                    </a>


                    <!-- JADWAL -->

                    <a href="{{ route('dosen.jadwal') }}">

                        <span class="menu-icon">
                            ◫
                        </span>

                        <span>
                            Jadwal
                        </span>

                    </a>


                    <!-- SESI ABSENSI -->

                    <a href="{{ route('dosen.sesi-absensi') }}">

                        <span class="menu-icon">
                            ◈
                        </span>

                        Sesi Absensi

                    </a>


                    <!-- KEHADIRAN -->

                    <a href="{{ route('dosen.kehadiran') }}">

                        <span class="menu-icon">
                            ▤
                        </span>

                        Daftar Kehadiran

                    </a>


                    <!-- PENGAJUAN -->

                    <a
                        href="{{ route('dosen.pengajuan-absensi') }}"
                        class="active"
                    >

                        <span class="menu-icon">
                            ◌
                        </span>

                        Izin / Sakit

                    </a>


                    <!-- RIWAYAT -->

                    <a href="{{ route('dosen.riwayat') }}">

                        <span class="menu-icon">
                            ◷
                        </span>

                        Riwayat

                    </a>


                    <!-- PROFIL -->

                    <a href="{{ route('dosen.profil') }}">

                        <span class="menu-icon">
                            ◉
                        </span>

                        Profil

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

                    <button type="submit">
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
                 TOP BAR
            ================================================== -->

            <div class="topbar">

                <div class="page-title">

                    Dashboard

                    <span> / </span>

                    <strong>
                        Izin / Sakit
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
                        Pengajuan
                        <span>Izin / Sakit</span>
                    </h1>

                    <p>
                        Periksa dan konfirmasi pengajuan absensi
                        mahasiswa yang mengikuti mata kuliah Anda.
                    </p>

                </div>

            </section>


            <!-- =================================================
                 SUCCESS MESSAGE
            ================================================== -->

            @if(session('success'))

                <div class="alert alert-success">

                    <span>✓</span>

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

                    <span>!</span>

                    <span>
                        {{ $errors->first() }}
                    </span>

                </div>

            @endif


            <!-- =================================================
                 SUMMARY
            ================================================== -->

            <div class="summary">

                <!-- TOTAL -->

                <div class="summary-item">

                    <div class="summary-label">
                        Total Pengajuan
                    </div>

                    <div class="summary-number">
                        {{ $pengajuan->count() }}
                    </div>

                </div>


                <!-- MENUNGGU -->

                <div class="summary-item">

                    <div class="summary-label">
                        Menunggu
                    </div>

                    <div class="summary-number">
                        {{ $pengajuan->where('status', 'menunggu')->count() }}
                    </div>

                </div>


                <!-- DIPROSES -->

                <div class="summary-item">

                    <div class="summary-label">
                        Diproses
                    </div>

                    <div class="summary-number">
                        {{ $pengajuan->whereIn('status', ['disetujui', 'ditolak'])->count() }}
                    </div>

                </div>

            </div>


            <!-- =================================================
                 MAIN CARD
            ================================================== -->

            <section class="card">

                <div class="card-header">

                    <h2>
                        Daftar Pengajuan Mahasiswa
                    </h2>

                    <span>
                        {{ $pengajuan->count() }} pengajuan
                    </span>

                </div>


                @if($pengajuan->count() > 0)

                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        Mahasiswa
                                    </th>

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
                                        Jenis
                                    </th>

                                    <th>
                                        Alasan
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($pengajuan as $item)

                                    <tr>

                                        <!-- MAHASISWA -->

                                        <td>

                                            <div class="student">

                                                <div class="student-avatar">

                                                    {{ strtoupper(substr($item->mahasiswa->nama ?? 'M', 0, 1)) }}

                                                </div>


                                                <div class="student-info">

                                                    <div class="student-name">

                                                        {{ $item->mahasiswa->nama ?? '-' }}

                                                    </div>


                                                    <div class="student-npm">

                                                        NPM:
                                                        {{ $item->mahasiswa->npm ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>

                                        </td>


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

                                            {{ $item->jadwal->kelas->nama ?? '-' }}

                                        </td>


                                        <!-- TANGGAL -->

                                        <td>

                                            <div class="date-text">

                                                {{ $item->tanggal->format('d M Y') }}

                                            </div>

                                        </td>


                                        <!-- JENIS -->

                                        <td>

                                            <span class="badge badge-jenis">

                                                @switch($item->jenis)

                                                    @case('tidak_hadir')

                                                        Tidak Hadir

                                                        @break

                                                    @case('sakit')

                                                        Sakit

                                                        @break

                                                    @case('terlambat')

                                                        Terlambat

                                                        @break

                                                    @case('qr_bermasalah')

                                                        QR Bermasalah

                                                        @break

                                                    @case('kendala_teknis')

                                                        Kendala Teknis

                                                        @break

                                                    @case('lainnya')

                                                        Lainnya

                                                        @break

                                                    @default

                                                        {{ $item->jenis }}

                                                @endswitch

                                            </span>

                                        </td>


                                        <!-- ALASAN -->

                                        <td>

                                            <div class="reason">

                                                {{ $item->alasan }}

                                            </div>

                                        </td>


                                        <!-- STATUS -->

                                        <td>

                                            @if($item->status === 'menunggu')

                                                <span class="badge badge-menunggu">
                                                    Menunggu
                                                </span>

                                            @elseif($item->status === 'disetujui')

                                                <span class="badge badge-disetujui">
                                                    Disetujui
                                                </span>

                                            @elseif($item->status === 'ditolak')

                                                <span class="badge badge-ditolak">
                                                    Ditolak
                                                </span>

                                            @else

                                                <span class="badge badge-menunggu">
                                                    {{ ucfirst($item->status) }}
                                                </span>

                                            @endif

                                        </td>


                                        <!-- AKSI -->

                                        <td>

                                            @if($item->status === 'menunggu')

                                                <div class="actions">

                                                    <!-- SETUJUI -->

                                                    <form
                                                        action="{{ route('dosen.pengajuan-absensi.approve', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menyetujui pengajuan ini?')"
                                                    >

                                                        @csrf

                                                        @method('PATCH')

                                                        <button
                                                            type="submit"
                                                            class="action-btn approve-btn"
                                                        >
                                                            ✓ Setujui
                                                        </button>

                                                    </form>


                                                    <!-- TOLAK -->

                                                    <button
                                                        type="button"
                                                        class="action-btn reject-btn"
                                                        data-id="{{ $item->id }}"
                                                    >
                                                        ✕ Tolak
                                                    </button>

                                                </div>

                                            @else

                                                <div class="processed">

                                                    <span
                                                        class="badge
                                                        @if($item->status === 'disetujui')
                                                            badge-disetujui
                                                        @else
                                                            badge-ditolak
                                                        @endif
                                                        "
                                                    >

                                                        {{ ucfirst($item->status) }}

                                                    </span>


                                                    @if($item->diproses_at)

                                                        <span class="processed-time">

                                                            {{ $item->diproses_at->format('d M Y, H:i') }}

                                                        </span>

                                                    @endif

                                                </div>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else

                    <!-- EMPTY STATE -->

                    <div class="empty">

                        <div class="empty-icon">
                            ◌
                        </div>

                        <h3>
                            Belum Ada Pengajuan
                        </h3>

                        <p>
                            Belum ada mahasiswa yang mengirim
                            pengajuan izin, sakit, atau kendala
                            absensi pada jadwal Anda.
                        </p>

                    </div>

                @endif

            </section>

        </main>

    </div>


    <!-- =========================================================
         MODAL TOLAK
    ========================================================= -->

    <div
        class="modal-overlay"
        id="rejectModal"
    >

        <div class="modal">

            <div class="modal-header">

                <h3>
                    Tolak Pengajuan
                </h3>

                <button
                    type="button"
                    class="close-modal"
                    id="closeRejectModalButton"
                    aria-label="Tutup"
                >
                    ×
                </button>

            </div>


            <div class="modal-description">

                Masukkan alasan mengapa pengajuan mahasiswa
                ditolak. Alasan ini akan dapat dilihat oleh
                mahasiswa.

            </div>


            <form
                id="rejectForm"
                method="POST"
            >

                @csrf

                @method('PATCH')


                <label
                    for="catatan_admin"
                    class="form-label"
                >
                    Alasan Penolakan
                </label>


                <textarea
                    name="catatan_admin"
                    id="catatan_admin"
                    class="form-textarea"
                    placeholder="Contoh: Bukti tidak sesuai atau alasan pengajuan tidak dapat diterima..."
                    required
                ></textarea>


                <div class="modal-actions">

                    <button
                        type="button"
                        class="modal-btn cancel-btn"
                        id="cancelRejectButton"
                    >
                        Batal
                    </button>


                    <button
                        type="submit"
                        class="modal-btn confirm-reject-btn"
                    >
                        Tolak Pengajuan
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================= -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /* =================================================
               ELEMENT
            ================================================= */

            const sidebar =
                document.getElementById('sidebar');

            const overlay =
                document.getElementById('sidebarOverlay');

            const hamburger =
                document.getElementById('hamburgerButton');

            const rejectModal =
                document.getElementById('rejectModal');

            const rejectForm =
                document.getElementById('rejectForm');

            const textarea =
                document.getElementById('catatan_admin');

            const closeRejectButton =
                document.getElementById('closeRejectModalButton');

            const cancelRejectButton =
                document.getElementById('cancelRejectButton');

            const rejectButtons =
                document.querySelectorAll('.reject-btn');

            const menuLinks =
                document.querySelectorAll('.menu a');


            /* =================================================
               SIDEBAR
            ================================================= */

            function toggleSidebar() {

                if (!sidebar || !overlay) {
                    return;
                }

                sidebar.classList.toggle('open');

                overlay.classList.toggle('show');

            }


            function closeSidebar() {

                if (!sidebar || !overlay) {
                    return;
                }

                sidebar.classList.remove('open');

                overlay.classList.remove('show');

            }


            /* =================================================
               HAMBURGER
            ================================================= */

            if (hamburger) {

                hamburger.addEventListener('click', function () {

                    toggleSidebar();

                });

            }


            /* =================================================
               OVERLAY SIDEBAR
            ================================================= */

            if (overlay) {

                overlay.addEventListener('click', function () {

                    closeSidebar();

                });

            }


            /* =================================================
               CLOSE SIDEBAR AFTER MENU CLICK
            ================================================= */

            menuLinks.forEach(function (link) {

                link.addEventListener('click', function () {

                    if (window.innerWidth <= 760) {

                        closeSidebar();

                    }

                });

            });


            /* =================================================
               REJECT MODAL
            ================================================= */

            function openRejectModal(id) {

                if (
                    !rejectModal ||
                    !rejectForm ||
                    !textarea
                ) {
                    return;
                }

                rejectForm.action =
                    "{{ url('/dosen/pengajuan-absensi') }}/"
                    + id
                    + "/reject";

                textarea.value = "";

                rejectModal.classList.add('show');

                document.body.style.overflow = 'hidden';

                setTimeout(function () {

                    textarea.focus();

                }, 100);

            }


            function closeRejectModal() {

                if (!rejectModal) {
                    return;
                }

                rejectModal.classList.remove('show');

                document.body.style.overflow = '';

            }


            /* =================================================
               REJECT BUTTON
            ================================================= */

            rejectButtons.forEach(function (button) {

                button.addEventListener('click', function () {

                    const id =
                        this.dataset.id;

                    if (!id) {
                        return;
                    }

                    openRejectModal(id);

                });

            });


            /* =================================================
               CLOSE MODAL BUTTON
            ================================================= */

            if (closeRejectButton) {

                closeRejectButton.addEventListener(
                    'click',
                    function () {

                        closeRejectModal();

                    }
                );

            }


            /* =================================================
               CANCEL MODAL
            ================================================= */

            if (cancelRejectButton) {

                cancelRejectButton.addEventListener(
                    'click',
                    function () {

                        closeRejectModal();

                    }
                );

            }


            /* =================================================
               CLICK OUTSIDE MODAL
            ================================================= */

            if (rejectModal) {

                rejectModal.addEventListener(
                    'click',
                    function (event) {

                        if (
                            event.target === rejectModal
                        ) {

                            closeRejectModal();

                        }

                    }
                );

            }


            /* =================================================
               ESCAPE KEY
            ================================================= */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (event.key === 'Escape') {

                        closeSidebar();

                        closeRejectModal();

                    }

                }
            );


            /* =================================================
               RESIZE
            ================================================= */

            window.addEventListener(
                'resize',
                function () {

                    if (window.innerWidth > 760) {

                        closeSidebar();

                    }

                }
            );

        });
    </script>

</body>

</html>