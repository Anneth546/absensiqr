@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Sesi Absensi | Absensi QR</title>


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

            color:
                #f8fafc;

            min-height:
                100vh;

            overflow-x:
                hidden;
        }


        /* =====================================================
           VARIABLES
        ===================================================== */

        :root {

            --bg:
                #070b16;

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
           GLOBAL SCROLLBAR
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

            left:
                0;

            top:
                0;

            width:
                255px;

            height:
                100vh;

            height:
                100dvh;

            background:
                linear-gradient(
                    180deg,
                    rgba(13, 17, 35, 0.98),
                    rgba(7, 11, 22, 0.98)
                );

            border-right:
                1px solid var(--border);

            padding:
                28px 18px;

            z-index:
                1000;

            display:
                flex;

            flex-direction:
                column;

            /*
             * Sidebar utama tidak ikut scrolling.
             * Hanya area menu yang bisa scrolling.
             */

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
                22px;

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
                #fff;

            box-shadow:
                0 8px 25px
                rgba(100, 80, 255, 0.35);
        }


        .logo-text {

            font-size:
                18px;

            font-weight:
                900;

            color:
                #fff;
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
                #7657ff transparent;

            -webkit-overflow-scrolling:
                touch;
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
                8px;
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

            flex-shrink:
                0;

            transition:
                background 0.25s ease,
                color 0.25s ease,
                transform 0.25s ease;
        }


        .menu-icon {

            width:
                20px;

            text-align:
                center;

            font-size:
                16px;

            opacity:
                0.9;

            flex-shrink:
                0;
        }


        .menu a:hover {

            background:
                rgba(118, 87, 255, 0.09);

            color:
                #fff;

            transform:
                translateX(3px);
        }


        .menu a.active {

            color:
                #fff;

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
                var(--gradient);

            box-shadow:
                0 0 12px
                rgba(118, 87, 255, 0.8);
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout {

            margin-top:
                15px;

            padding-top:
                20px;

            border-top:
                1px solid var(--border);

            flex-shrink:
                0;

            background:
                rgba(9, 13, 27, 0.96);
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
                #fff;

            border-color:
                rgba(118, 87, 255, 0.4);

            background:
                rgba(118, 87, 255, 0.1);

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
                32px 35px 50px;

            position:
                relative;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            margin-bottom:
                28px;
        }


        .page-title {

            font-size:
                13px;

            color:
                #8b95aa;

            font-weight:
                600;
        }


        .page-title strong {

            color:
                #fff;

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

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                flex-end;

            gap:
                20px;

            margin-bottom:
                24px;
        }


        .page-header h1 {

            font-size:
                32px;

            font-weight:
                900;

            letter-spacing:
                -0.8px;

            margin-bottom:
                8px;
        }


        .page-header p {

            color:
                #8b95aa;

            font-size:
                13px;

            line-height:
                1.6;
        }


        .role-badge {

            padding:
                9px 15px;

            border-radius:
                10px;

            border:
                1px solid
                rgba(145, 124, 255, 0.35);

            background:
                rgba(118, 87, 255, 0.12);

            color:
                #b8aaff;

            font-size:
                10px;

            font-weight:
                900;

            letter-spacing:
                0.9px;

            white-space:
                nowrap;
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
                18px;

            padding:
                24px;

            box-shadow:
                var(--shadow);

            margin-bottom:
                20px;
        }


        .card-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                15px;

            margin-bottom:
                22px;
        }


        .card-header h2 {

            font-size:
                17px;

            font-weight:
                850;
        }


        .card-header span {

            color:
                #727d93;

            font-size:
                11px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-grid {

            display:
                grid;

            grid-template-columns:
                1.5fr
                1fr
                1fr
                1fr;

            gap:
                15px;
        }


        .form-group {

            display:
                flex;

            flex-direction:
                column;

            gap:
                8px;
        }


        .form-group label {

            color:
                #9ba6ba;

            font-size:
                11px;

            font-weight:
                800;
        }


        .form-group select,
        .form-group input {

            width:
                100%;

            padding:
                13px 14px;

            border-radius:
                11px;

            border:
                1px solid
                rgba(148, 163, 184, 0.16);

            background:
                rgba(5, 9, 20, 0.7);

            color:
                #f8fafc;

            outline:
                none;

            font-size:
                12px;

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }


        .form-group select:focus,
        .form-group input:focus {

            border-color:
                rgba(118, 87, 255, 0.6);

            box-shadow:
                0 0 0 3px
                rgba(118, 87, 255, 0.08);
        }


        .form-group option {

            background:
                #101629;

            color:
                white;
        }


        .form-footer {

            display:
                flex;

            justify-content:
                flex-end;

            margin-top:
                18px;
        }


        .btn-primary {

            border:
                none;

            padding:
                12px 19px;

            border-radius:
                11px;

            background:
                var(--gradient);

            color:
                white;

            font-size:
                12px;

            font-weight:
                850;

            cursor:
                pointer;

            box-shadow:
                0 10px 25px
                rgba(89, 75, 255, 0.25);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }


        .btn-primary:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 15px 32px
                rgba(89, 75, 255, 0.35);
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {

            padding:
                13px 15px;

            border-radius:
                12px;

            margin-bottom:
                20px;

            font-size:
                12px;
        }


        .alert-success {

            background:
                rgba(34, 197, 94, 0.08);

            border:
                1px solid
                rgba(34, 197, 94, 0.2);

            color:
                #86efac;
        }


        .alert-error {

            background:
                rgba(239, 68, 68, 0.08);

            border:
                1px solid
                rgba(239, 68, 68, 0.2);

            color:
                #fca5a5;
        }


        /* =====================================================
           SESSION LIST
        ===================================================== */

        .session-list {

            display:
                grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap:
                15px;
        }


        .session-card {

            position:
                relative;

            background:
                rgba(255, 255, 255, 0.025);

            border:
                1px solid var(--border);

            border-radius:
                15px;

            padding:
                19px;

            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                background 0.25s ease;
        }


        .session-card:hover {

            transform:
                translateY(-3px);

            border-color:
                rgba(118, 87, 255, 0.35);

            background:
                rgba(118, 87, 255, 0.045);
        }


        .session-top {

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                flex-start;

            gap:
                15px;

            margin-bottom:
                15px;
        }


        .course-code {

            display:
                inline-block;

            padding:
                6px 9px;

            border-radius:
                8px;

            background:
                rgba(118, 87, 255, 0.1);

            border:
                1px solid
                rgba(118, 87, 255, 0.2);

            color:
                #a99aff;

            font-size:
                10px;

            font-weight:
                900;
        }


        .session-status {

            padding:
                5px 8px;

            border-radius:
                7px;

            font-size:
                9px;

            font-weight:
                900;
        }


        .session-status.active {

            color:
                #86efac;

            background:
                rgba(34, 197, 94, 0.08);

            border:
                1px solid
                rgba(34, 197, 94, 0.18);
        }


        .session-status.inactive {

            color:
                #94a3b8;

            background:
                rgba(148, 163, 184, 0.08);

            border:
                1px solid
                rgba(148, 163, 184, 0.14);
        }


        .session-title {

            font-size:
                16px;

            font-weight:
                850;

            margin-bottom:
                5px;

            line-height:
                1.4;
        }


        .session-class {

            color:
                #788399;

            font-size:
                11px;

            margin-bottom:
                15px;
        }


        /* =====================================================
           SESSION INFO
        ===================================================== */

        .session-info {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                8px;

            margin-bottom:
                15px;
        }


        .session-info-item {

            padding:
                10px;

            border-radius:
                10px;

            background:
                rgba(255, 255, 255, 0.025);

            border:
                1px solid
                rgba(148, 163, 184, 0.08);
        }


        .session-info-item small {

            display:
                block;

            color:
                #68738a;

            font-size:
                9px;

            margin-bottom:
                4px;
        }


        .session-info-item strong {

            color:
                #dce2ed;

            font-size:
                11px;
        }


        /* =====================================================
           QR TOKEN
        ===================================================== */

        .qr-token {

            padding:
                10px;

            background:
                rgba(4, 8, 18, 0.6);

            border:
                1px dashed
                rgba(118, 87, 255, 0.2);

            border-radius:
                9px;

            color:
                #8490a7;

            font-size:
                9px;

            word-break:
                break-all;

            margin-bottom:
                13px;
        }


        /* =====================================================
           SESSION ACTIONS
        ===================================================== */

        .session-actions {

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            gap:
                10px;
        }


        .btn-qr {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                9px 13px;

            border-radius:
                9px;

            background:
                rgba(118, 87, 255, 0.1);

            border:
                1px solid
                rgba(118, 87, 255, 0.2);

            color:
                #a99aff;

            text-decoration:
                none;

            font-size:
                10px;

            font-weight:
                800;

            cursor:
                pointer;

            transition:
                all 0.2s ease;
        }


        .btn-qr:hover {

            background:
                rgba(118, 87, 255, 0.2);

            border-color:
                rgba(118, 87, 255, 0.4);

            transform:
                translateY(-2px);
        }


        .btn-danger {

            border:
                1px solid
                rgba(239, 68, 68, 0.15);

            background:
                rgba(239, 68, 68, 0.06);

            color:
                #fca5a5;

            padding:
                9px 13px;

            border-radius:
                9px;

            font-size:
                10px;

            font-weight:
                800;

            cursor:
                pointer;

            transition:
                all 0.2s ease;
        }


        .btn-danger:hover {

            background:
                rgba(239, 68, 68, 0.12);

            border-color:
                rgba(239, 68, 68, 0.3);
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {

            padding:
                45px 20px;

            text-align:
                center;

            color:
                #69748a;
        }


        .empty-icon {

            font-size:
                35px;

            margin-bottom:
                12px;
        }


        .empty h3 {

            color:
                #dce2ed;

            font-size:
                15px;

            margin-bottom:
                6px;
        }


        .empty p {

            font-size:
                11px;

            line-height:
                1.6;
        }


        /* =====================================================
           QR MODAL
        ===================================================== */

        .qr-modal {

            display:
                none;

            position:
                fixed;

            inset:
                0;

            z-index:
                5000;

            background:
                rgba(2, 5, 15, 0.82);

            backdrop-filter:
                blur(10px);

            align-items:
                center;

            justify-content:
                center;

            padding:
                20px;
        }


        .qr-modal.show {

            display:
                flex;
        }


        .qr-modal-box {

            width:
                min(430px, 100%);

            max-height:
                95vh;

            overflow-y:
                auto;

            background:
                linear-gradient(
                    145deg,
                    rgba(20, 27, 47, 0.98),
                    rgba(9, 14, 28, 0.98)
                );

            border:
                1px solid
                rgba(148, 163, 184, 0.18);

            border-radius:
                22px;

            padding:
                28px;

            box-shadow:
                0 30px 90px
                rgba(0, 0, 0, 0.6);

            text-align:
                center;

            animation:
                qrModalShow 0.25s ease;
        }


        @keyframes qrModalShow {

            from {

                opacity:
                    0;

                transform:
                    translateY(15px)
                    scale(0.96);
            }

            to {

                opacity:
                    1;

                transform:
                    translateY(0)
                    scale(1);
            }
        }


        .qr-modal-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                15px;

            margin-bottom:
                20px;
        }


        .qr-modal-header h2 {

            font-size:
                20px;

            font-weight:
                900;

            text-align:
                left;
        }


        .qr-close {

            width:
                36px;

            height:
                36px;

            border:
                1px solid
                rgba(148, 163, 184, 0.16);

            border-radius:
                10px;

            background:
                rgba(255, 255, 255, 0.04);

            color:
                #aeb8ca;

            font-size:
                20px;

            cursor:
                pointer;
        }


        .qr-close:hover {

            color:
                white;

            background:
                rgba(239, 68, 68, 0.12);
        }


        .qr-course {

            color:
                #9da8bd;

            font-size:
                12px;

            line-height:
                1.6;

            margin-bottom:
                18px;
        }


        .qr-wrapper {

            display:
                flex;

            justify-content:
                center;

            align-items:
                center;

            width:
                100%;

            background:
                white;

            border-radius:
                16px;

            padding:
                18px;

            margin-bottom:
                18px;

            box-shadow:
                0 15px 40px
                rgba(0, 0, 0, 0.35);

            overflow:
                hidden;
        }


        .qr-wrapper svg {

            display:
                block;

            width:
                280px;

            height:
                280px;

            max-width:
                100%;
        }


        .qr-token-modal {

            padding:
                11px 13px;

            background:
                rgba(4, 8, 18, 0.75);

            border:
                1px dashed
                rgba(118, 87, 255, 0.3);

            border-radius:
                10px;

            color:
                #8d99af;

            font-size:
                9px;

            word-break:
                break-all;

            text-align:
                left;

            margin-bottom:
                15px;
        }


        .qr-instruction {

            color:
                #7f8ba2;

            font-size:
                11px;

            line-height:
                1.6;

            margin-bottom:
                18px;
        }


        .qr-close-bottom {

            width:
                100%;

            border:
                none;

            padding:
                12px;

            border-radius:
                11px;

            background:
                var(--gradient);

            color:
                white;

            font-size:
                12px;

            font-weight:
                800;

            cursor:
                pointer;
        }


        .qr-close-bottom:hover {

            opacity:
                0.9;
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

        @media (max-width: 1050px) {

            .form-grid {

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0, 1fr)
                    );
            }


            .session-list {

                grid-template-columns:
                    1fr;
            }
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 760px) {


            /* SIDEBAR */

            .sidebar {

                width:
                    270px;

                height:
                    100vh;

                height:
                    100dvh;

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


            .sidebar-menu-scroll {

                overflow-y:
                    auto;

                -webkit-overflow-scrolling:
                    touch;
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
                    white;

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

                align-items:
                    flex-start;

                flex-direction:
                    column;

                gap:
                    15px;
            }


            .page-header h1 {

                font-size:
                    27px;
            }


            .form-grid {

                grid-template-columns:
                    1fr;
            }


            .card {

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


            .page-header h1 {

                font-size:
                    24px;
            }


            .session-info {

                grid-template-columns:
                    1fr;
            }


            .session-actions {

                align-items:
                    stretch;

                flex-direction:
                    column;
            }


            .btn-qr,
            .btn-danger {

                width:
                    100%;
            }


            .qr-modal-box {

                padding:
                    20px;
            }


            .qr-wrapper {

                padding:
                    12px;
            }


            .qr-wrapper svg {

                width:
                    240px;

                height:
                    240px;
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


            ABSENSI <span>QR</span>

        </div>


        <button
            type="button"
            class="hamburger"
            onclick="toggleSidebar()"
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
        onclick="closeSidebar()"
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
             MENU SCROLL
        ================================================== -->

        <div class="sidebar-menu-scroll">


            <nav class="menu">


                <div class="menu-label">
                    Menu Utama
                </div>


                <!-- DASHBOARD -->

                <a
                    href="{{ url('/dosen/dashboard') }}"
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
                    class="active"
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
                /
                <strong>
                    Sesi Absensi
                </strong>

            </div>


            <div class="top-profile">


                <div class="top-avatar">

                    {{
                        strtoupper(
                            substr(
                                $dosen->nama,
                                0,
                                1
                            )
                        )
                    }}

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


            <div>


                <h1>
                    Sesi Absensi
                </h1>


                <p>

                    Buat dan kelola sesi absensi QR
                    untuk kegiatan perkuliahan.

                </p>


            </div>


            <div class="role-badge">

                DOSEN

            </div>


        </section>



        <!-- =================================================
             SUCCESS
        ================================================== -->

        @if(session('success'))

            <div class="alert alert-success">

                ✓

                {{ session('success') }}

            </div>

        @endif



        <!-- =================================================
             ERROR
        ================================================== -->

        @if($errors->any())

            <div class="alert alert-error">

                @foreach($errors->all() as $error)

                    <div>
                        • {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif



        <!-- =================================================
             BUAT SESI
        ================================================== -->

        <section class="card">


            <div class="card-header">


                <h2>
                    Buat Sesi Absensi
                </h2>


                <span>
                    Sesi baru
                </span>


            </div>



            @if($jadwals->count() > 0)


                <form
                    action="{{ route('dosen.sesi-absensi.store') }}"
                    method="POST"
                >

                    @csrf


                    <div class="form-grid">


                        <!-- JADWAL -->

                        <div class="form-group">


                            <label for="jadwal_id">

                                Mata Kuliah / Jadwal

                            </label>


                            <select
                                name="jadwal_id"
                                id="jadwal_id"
                                required
                            >


                                <option value="">

                                    Pilih mata kuliah

                                </option>


                                @foreach($jadwals as $jadwal)


                                    <option
                                        value="{{ $jadwal->id }}"
                                        @selected(
                                            old('jadwal_id')
                                            == $jadwal->id
                                        )
                                    >

                                        {{ $jadwal->mataKuliah->kode }}

                                        -

                                        {{ $jadwal->mataKuliah->nama }}

                                        |

                                        {{ $jadwal->kelas->nama }}

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
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                required
                            >


                        </div>



                        <!-- JAM MULAI -->

                        <div class="form-group">


                            <label for="jam_mulai">

                                Jam Mulai

                            </label>


                            <input
                                type="time"
                                name="jam_mulai"
                                id="jam_mulai"
                                value="{{ old('jam_mulai') }}"
                                required
                            >


                        </div>



                        <!-- JAM SELESAI -->

                        <div class="form-group">


                            <label for="jam_selesai">

                                Jam Selesai

                            </label>


                            <input
                                type="time"
                                name="jam_selesai"
                                id="jam_selesai"
                                value="{{ old('jam_selesai') }}"
                                required
                            >


                        </div>


                    </div>



                    <div class="form-footer">


                        <button
                            type="submit"
                            class="btn-primary"
                        >

                            + Buat Sesi Absensi

                        </button>


                    </div>


                </form>


            @else


                <div class="empty">


                    <div class="empty-icon">
                        📚
                    </div>


                    <h3>
                        Belum ada jadwal
                    </h3>


                    <p>

                        Belum ada jadwal mata kuliah
                        yang diberikan kepada akun dosen ini.
                        Buat jadwal terlebih dahulu sebelum
                        membuat sesi absensi.

                    </p>


                </div>


            @endif


        </section>



        <!-- =================================================
             DAFTAR SESI
        ================================================== -->

        <section class="card">


            <div class="card-header">


                <h2>
                    Daftar Sesi Absensi
                </h2>


                <span>

                    {{ $sesiAbsensis->count() }}
                    sesi

                </span>


            </div>



            @if($sesiAbsensis->count() > 0)


                <div class="session-list">


                    @foreach($sesiAbsensis as $sesi)


                        <!-- SESSION CARD -->

                        <div class="session-card">


                            <!-- TOP -->

                            <div class="session-top">


                                <div>


                                    <span class="course-code">

                                        {{ $sesi->jadwal->mataKuliah->kode }}

                                    </span>


                                </div>


                                @if($sesi->aktif)


                                    <span class="session-status active">

                                        AKTIF

                                    </span>


                                @else


                                    <span class="session-status inactive">

                                        NONAKTIF

                                    </span>


                                @endif


                            </div>



                            <!-- COURSE -->

                            <div class="session-title">

                                {{ $sesi->jadwal->mataKuliah->nama }}

                            </div>



                            <!-- CLASS -->

                            <div class="session-class">

                                Kelas
                                {{ $sesi->jadwal->kelas->nama }}

                            </div>



                            <!-- INFO -->

                            <div class="session-info">


                                <div class="session-info-item">


                                    <small>
                                        TANGGAL
                                    </small>


                                    <strong>

                                        {{ $sesi->tanggal->format('d M Y') }}

                                    </strong>


                                </div>



                                <div class="session-info-item">


                                    <small>
                                        WAKTU
                                    </small>


                                    <strong>

                                        {{ substr($sesi->jam_mulai, 0, 5) }}

                                        -

                                        {{ substr($sesi->jam_selesai, 0, 5) }}

                                    </strong>


                                </div>


                            </div>



                            <!-- TOKEN -->

                            <div class="qr-token">


                                Token:

                                {{ $sesi->token_qr }}


                            </div>



                            <!-- ACTION -->

                            <div class="session-actions">


                                @if($sesi->aktif)


                                    <!-- TOMBOL QR -->

                                    <button
                                        type="button"
                                        class="btn-qr"
                                        data-modal-id="qrModal{{ $sesi->id }}"
                                    >

                                        ▣ Tampilkan QR

                                    </button>



                                    <!-- NONAKTIFKAN -->

                                    <form
                                        action="{{ route(
                                            'dosen.sesi-absensi.deactivate',
                                            $sesi->id
                                        ) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @method('PATCH')


                                        <button
                                            type="submit"
                                            class="btn-danger"
                                            onclick="return confirm('Nonaktifkan sesi ini?')"
                                        >

                                            Nonaktifkan

                                        </button>


                                    </form>


                                @else


                                    <span
                                        style="
                                            color:#667188;
                                            font-size:10px;
                                        "
                                    >

                                        Sesi sudah ditutup

                                    </span>


                                @endif


                            </div>


                        </div>



                        <!-- =================================================
                             QR MODAL
                        ================================================== -->

                        @if($sesi->aktif)


                            <div
                                class="qr-modal"
                                id="qrModal{{ $sesi->id }}"
                                data-modal="qr"
                            >


                                <div
                                    class="qr-modal-box"
                                    onclick="event.stopPropagation()"
                                >


                                    <!-- HEADER -->

                                    <div class="qr-modal-header">


                                        <h2>
                                            QR Absensi
                                        </h2>


                                        <button
                                            type="button"
                                            class="qr-close"
                                            data-close-modal="qrModal{{ $sesi->id }}"
                                        >
                                            ×
                                        </button>


                                    </div>



                                    <!-- COURSE -->

                                    <div class="qr-course">


                                        <strong>

                                            {{ $sesi->jadwal->mataKuliah->kode }}

                                        </strong>


                                        <br>


                                        {{ $sesi->jadwal->mataKuliah->nama }}


                                        <br>


                                        Kelas

                                        {{ $sesi->jadwal->kelas->nama }}


                                        <br>


                                        {{ $sesi->tanggal->format('d M Y') }}

                                        ·

                                        {{ substr($sesi->jam_mulai, 0, 5) }}

                                        -

                                        {{ substr($sesi->jam_selesai, 0, 5) }}


                                    </div>



                                    <!-- QR CODE -->

                                    <div class="qr-wrapper">


                                        {!! QrCode::format('svg')
                                            ->size(280)
                                            ->margin(2)
                                            ->generate($sesi->token_qr)
                                        !!}


                                    </div>



                                    <!-- TOKEN -->

                                    <div class="qr-token-modal">


                                        <strong>
                                            Token QR:
                                        </strong>


                                        <br>


                                        {{ $sesi->token_qr }}


                                    </div>



                                    <!-- INSTRUCTION -->

                                    <div class="qr-instruction">


                                        Tampilkan QR Code ini di depan kelas.
                                        Mahasiswa dapat membuka menu
                                        <strong>Scan Absensi</strong>
                                        kemudian mengarahkan kamera ke QR Code ini.


                                    </div>



                                    <!-- CLOSE -->

                                    <button
                                        type="button"
                                        class="qr-close-bottom"
                                        data-close-modal="qrModal{{ $sesi->id }}"
                                    >

                                        Tutup QR

                                    </button>


                                </div>


                            </div>


                        @endif


                    @endforeach


                </div>


            @else


                <div class="empty">


                    <div class="empty-icon">
                        📱
                    </div>


                    <h3>
                        Belum ada sesi absensi
                    </h3>


                    <p>

                        Buat sesi absensi pertama untuk
                        mulai menerima kehadiran mahasiswa.

                    </p>


                </div>


            @endif


        </section>


    </main>


</div>



<script>


    /* =====================================================
       ELEMENT SIDEBAR
    ===================================================== */

    const sidebar =
        document.getElementById('sidebar');

    const sidebarOverlay =
        document.getElementById('sidebarOverlay');


    /* =====================================================
       SIDEBAR
    ===================================================== */

    function toggleSidebar() {

        sidebar.classList.toggle('open');

        sidebarOverlay.classList.toggle('show');

    }


    function closeSidebar() {

        sidebar.classList.remove('open');

        sidebarOverlay.classList.remove('show');

    }


    /* =====================================================
       ESCAPE
    ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                closeSidebar();

                closeAllQrModals();

            }

        }
    );


    /* =====================================================
       MOBILE MENU
    ===================================================== */

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


    /* =====================================================
       RESIZE
    ===================================================== */

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


    /* =====================================================
       BUKA QR MODAL
    ===================================================== */

    document
        .querySelectorAll('[data-modal-id]')
        .forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const modalId =
                            this.getAttribute(
                                'data-modal-id'
                            );

                        const modal =
                            document.getElementById(
                                modalId
                            );

                        if (!modal) {
                            return;
                        }

                        modal.classList.add(
                            'show'
                        );

                        document.body.style.overflow =
                            'hidden';

                    }
                );

            }
        );


    /* =====================================================
       TUTUP QR MODAL
    ===================================================== */

    document
        .querySelectorAll('[data-close-modal]')
        .forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const modalId =
                            this.getAttribute(
                                'data-close-modal'
                            );

                        closeQrModal(
                            modalId
                        );

                    }
                );

            }
        );


    /* =====================================================
       CLICK LUAR MODAL
    ===================================================== */

    document
        .querySelectorAll('.qr-modal')
        .forEach(
            function (modal) {

                modal.addEventListener(
                    'click',
                    function (event) {

                        if (
                            event.target === this
                        ) {

                            closeQrModal(
                                this.id
                            );

                        }

                    }
                );

            }
        );


    /* =====================================================
       CLOSE QR
    ===================================================== */

    function closeQrModal(id) {

        const modal =
            document.getElementById(id);

        if (!modal) {
            return;
        }

        modal.classList.remove(
            'show'
        );


        const anyOpenModal =
            document.querySelector(
                '.qr-modal.show'
            );


        if (!anyOpenModal) {

            document.body.style.overflow =
                '';

        }

    }


    /* =====================================================
       CLOSE ALL QR
    ===================================================== */

    function closeAllQrModals() {

        document
            .querySelectorAll('.qr-modal.show')
            .forEach(
                function (modal) {

                    modal.classList.remove(
                        'show'
                    );

                }
            );

        document.body.style.overflow =
            '';

    }


</script>


</body>

</html>