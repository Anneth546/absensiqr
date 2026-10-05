<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Dosen - Admin</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #070b16;
            --sidebar: rgba(9,13,27,.96);
            --card: rgba(17,24,39,.78);
            --card-hover: rgba(22,30,48,.92);

            --border: rgba(148,163,184,.16);
            --border-hover: rgba(124,92,255,.5);

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

            --danger: #ff5d73;

            --shadow: 0 20px 50px rgba(0,0,0,.3);

            --radius: 18px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            color: var(--text);

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(118,87,255,.12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(77,156,255,.10),
                    transparent 30%
                ),
                var(--bg);
        }

        a {
            text-decoration: none;
            color: inherit;
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

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 12px;

            background: var(--gradient);

            font-size: 20px;
            font-weight: bold;

            box-shadow:
                0 10px 25px rgba(118,87,255,.25);
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

            transition: .2s ease;
        }

        .menu-item:hover {
            background: rgba(255,255,255,.04);

            color: var(--text);
        }

        .menu-item.active {
            background:
                linear-gradient(
                    135deg,
                    rgba(118,87,255,.20),
                    rgba(77,156,255,.10)
                );

            color: #fff;

            border: 1px solid rgba(118,87,255,.20);
        }

        .menu-icon {
            width: 22px;

            text-align: center;

            font-size: 15px;
        }

        .menu-disabled {
            opacity: .45;

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

            border: 1px solid rgba(255,255,255,.08);

            border-radius: 12px;

            background: rgba(255,255,255,.03);

            color: var(--muted-light);

            cursor: pointer;

            transition: .2s ease;
        }

        .logout-button:hover {
            background: rgba(255,93,115,.08);

            border-color: rgba(255,93,115,.22);

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

        .add-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 12px 17px;

            border-radius: 12px;

            background: var(--gradient);

            color: #fff;

            font-size: 13px;

            font-weight: 600;

            box-shadow:
                0 10px 24px rgba(118,87,255,.20);

            transition: .2s ease;
        }

        .add-button:hover {
            transform: translateY(-1px);

            box-shadow:
                0 14px 28px rgba(118,87,255,.30);
        }

        /* =========================
           ALERT
        ========================== */

        .alert-success {
            margin-bottom: 20px;

            padding: 13px 15px;

            border-radius: 12px;

            background: rgba(74,222,128,.08);

            border: 1px solid rgba(74,222,128,.18);

            color: #8ef0ae;

            font-size: 13px;
        }

        /* =========================
           CONTENT CARD
        ========================== */

        .content-card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            backdrop-filter: blur(20px);

            overflow: hidden;
        }

        .toolbar {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding: 20px;

            border-bottom: 1px solid var(--border);
        }

        .toolbar-title {
            font-size: 15px;

            font-weight: 600;
        }

        .toolbar-count {
            margin-top: 4px;

            color: var(--muted);

            font-size: 11px;
        }

        .search-box {
            width: 280px;

            position: relative;
        }

        .search-box input {
            width: 100%;

            padding: 11px 13px 11px 38px;

            background: rgba(7,11,22,.65);

            border: 1px solid var(--border);

            border-radius: 11px;

            outline: none;

            color: #fff;

            font-size: 13px;
        }

        .search-box input::placeholder {
            color: #5f687b;
        }

        .search-box input:focus {
            border-color: var(--purple);

            box-shadow:
                0 0 0 3px rgba(118,87,255,.10);
        }

        .search-icon {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            color: var(--muted);

            font-size: 14px;

            pointer-events: none;
        }

        /* =========================
           TABLE
        ========================== */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 850px;
        }

        thead th {
            padding: 14px 18px;

            text-align: left;

            color: var(--muted);

            background: rgba(255,255,255,.015);

            border-bottom: 1px solid var(--border);

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: .8px;

            font-weight: 600;
        }

        tbody td {
            padding: 16px 18px;

            border-bottom: 1px solid rgba(148,163,184,.08);

            color: var(--muted-light);

            font-size: 13px;

            vertical-align: middle;
        }

        tbody tr {
            transition: .2s ease;
        }

        tbody tr:hover {
            background: rgba(255,255,255,.025);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .name-cell {
            display: flex;

            align-items: center;

            gap: 11px;
        }

        .avatar {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    rgba(118,87,255,.20),
                    rgba(77,156,255,.14)
                );

            border: 1px solid rgba(118,87,255,.18);

            color: #cfc8ff;

            font-size: 13px;

            font-weight: 700;
        }

        .name-main {
            color: #fff;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .name-sub {
            color: var(--muted);

            font-size: 11px;
        }

        .nidn-badge {
            display: inline-flex;

            padding: 5px 8px;

            border-radius: 8px;

            background: rgba(77,156,255,.08);

            border: 1px solid rgba(77,156,255,.15);

            color: #8fc2ff;

            font-size: 11px;

            font-weight: 600;
        }

        .email {
            color: var(--muted-light);
        }

        .empty-state {
            padding: 60px 20px;

            text-align: center;

            display: none;
        }

        .empty-state-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 15px;

            border-radius: 16px;

            background: rgba(255,255,255,.04);

            color: var(--muted);

            font-size: 22px;
        }

        .empty-state h3 {
            margin-bottom: 7px;

            font-size: 15px;
        }

        .empty-state p {
            color: var(--muted);

            font-size: 12px;
        }

        .action-buttons {
            display: flex;

            align-items: center;

            gap: 7px;
        }

        .action-button {
            padding: 7px 10px;

            border-radius: 8px;

            font-size: 11px;

            font-weight: 600;

            transition: .2s ease;
        }

        .action-edit {
            background: rgba(118,87,255,.09);

            border: 1px solid rgba(118,87,255,.16);

            color: #b9adff;
        }

        .action-edit:hover {
            background: rgba(118,87,255,.18);

            border-color: rgba(118,87,255,.30);
        }

        .action-delete {
            border: 1px solid rgba(255,93,115,.14);

            background: rgba(255,93,115,.07);

            color: #ff8d9b;

            cursor: pointer;
        }

        .action-delete:hover {
            background: rgba(255,93,115,.14);

            border-color: rgba(255,93,115,.25);
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

                transition: transform .25s ease;
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

                padding: 0 18px;

                z-index: 900;

                align-items: center;

                justify-content: space-between;

                background: rgba(7,11,22,.90);

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

                background: rgba(255,255,255,.04);

                color: #fff;

                font-size: 19px;

                cursor: pointer;
            }

            .overlay.show {
                display: block;

                position: fixed;

                inset: 0;

                z-index: 950;

                background: rgba(0,0,0,.55);
            }
        }

        @media (max-width: 650px) {

            .main {
                padding-left: 14px;
                padding-right: 14px;
            }

            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .page-title h1 {
                font-size: 24px;
            }

            .add-button {
                width: 100%;
            }

            .toolbar {
                align-items: stretch;

                flex-direction: column;
            }

            .search-box {
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
                <strong>Absensi QR</strong>
                <span>Panel Administrator</span>
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
                class="menu-item active"
            >
                <span class="menu-icon">◎</span>
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
                class="menu-item"
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
            Data Dosen
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
                    Data Dosen
                </h1>

                <p>
                    Kelola akun dan informasi dosen dalam sistem.
                </p>

            </div>


            <a
                href="{{ route('admin.dosen.create') }}"
                class="add-button"
            >
                + Tambah Dosen
            </a>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if (session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        <!-- =========================
             TABLE CARD
        ========================== -->

        <div class="content-card">

            <div class="toolbar">

                <div>

                    <div class="toolbar-title">
                        Daftar Dosen
                    </div>

                    <div class="toolbar-count">
                        Total {{ $dosen->count() }} dosen
                    </div>

                </div>


                <div class="search-box">

                    <span class="search-icon">
                        ⌕
                    </span>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari nama, NIDN, email..."
                    >

                </div>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Dosen</th>
                            <th>NIDN</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody id="dosenTableBody">

                        @forelse ($dosen as $item)

                            <tr
                                class="dosen-row"
                                data-search="
                                    {{ strtolower(
                                        ($item->nama ?? '') . ' ' .
                                        ($item->nidn ?? '') . ' ' .
                                        ($item->user->email ?? '') . ' ' .
                                        ($item->no_hp ?? '') . ' ' .
                                        ($item->program_studi ?? '')
                                    ) }}
                                "
                            >

                                <td>

                                    <div class="name-cell">

                                        <div class="avatar">

                                            {{
                                                strtoupper(
                                                    substr(
                                                        $item->nama ?? 'D',
                                                        0,
                                                        1
                                                    )
                                                )
                                            }}

                                        </div>


                                        <div>

                                            <div class="name-main">
                                                {{ $item->nama }}
                                            </div>

                                            <div class="name-sub">
                                                Akun Dosen
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <span class="nidn-badge">
                                        {{ $item->nidn }}
                                    </span>

                                </td>


                                <td>

                                    <span class="email">
                                        {{ $item->user->email ?? '-' }}
                                    </span>

                                </td>


                                <td>
                                    {{ $item->no_hp ?: '-' }}
                                </td>


                                <td>
                                    {{ $item->program_studi ?: '-' }}
                                </td>


                                <td>

                                    <div class="action-buttons">

                                        <a
                                            href="{{ route('admin.dosen.edit', $item->id) }}"
                                            class="action-button action-edit"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route('admin.dosen.destroy', $item->id) }}"
                                            method="POST"
                                            class="delete-form"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-button action-delete"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="6"
                                    style="
                                        text-align:center;
                                        padding:50px 20px;
                                        color:#8b95aa;
                                    "
                                >
                                    Belum ada data dosen.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>


                <div
                    class="empty-state"
                    id="searchEmpty"
                >

                    <div class="empty-state-icon">
                        ⌕
                    </div>

                    <h3>
                        Dosen tidak ditemukan
                    </h3>

                    <p>
                        Coba gunakan nama, NIDN, atau email yang berbeda.
                    </p>

                </div>

            </div>

        </div>

    </main>

</div>


<script>

    /* =========================
       SIDEBAR MOBILE
    ========================== */

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


    /* =========================
       SEARCH
    ========================== */

    const searchInput =
        document.getElementById('searchInput');

    const rows =
        document.querySelectorAll('.dosen-row');

    const searchEmpty =
        document.getElementById('searchEmpty');


    if (searchInput) {

        searchInput.addEventListener(
            'input',
            function () {

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();

                let visibleRows = 0;


                rows.forEach(function (row) {

                    const text =
                        row.dataset.search
                            .toLowerCase();

                    if (
                        text.includes(keyword)
                    ) {

                        row.style.display = '';

                        visibleRows++;

                    } else {

                        row.style.display = 'none';

                    }

                });


                if (
                    keyword !== '' &&
                    visibleRows === 0 &&
                    rows.length > 0
                ) {

                    searchEmpty.style.display =
                        'block';

                } else {

                    searchEmpty.style.display =
                        'none';

                }

            }
        );

    }


    /* =========================
       DELETE CONFIRMATION
    ========================== */

    const deleteForms =
        document.querySelectorAll('.delete-form');


    deleteForms.forEach(function (form) {

        form.addEventListener(
            'submit',
            function (event) {

                const confirmed =
                    confirm(
                        'Yakin ingin menghapus data dosen ini?'
                    );


                if (!confirmed) {

                    event.preventDefault();

                }

            }
        );

    });

</script>

</body>
</html>