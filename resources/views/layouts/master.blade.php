<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMASTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
    :root {
        --primary-color: #660708;
        --primary-dark: #4a0506;
        --primary-light: #a4161a;
        --secondary-color: #ba181b;
        --accent-color: #e5383b;
        --light-bg: #f8f9fa;
        --sidebar-width: 260px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--light-bg);
        overflow-x: hidden;
    }

    /* Sidebar Styles */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: var(--sidebar-width);
        background: linear-gradient(180deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: white;
        transition: all 0.3s ease;
        z-index: 1000;
        overflow-y: auto;
        box-shadow: 4px 0 10px rgba(0,0,0,0.1);
    }

    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,0.3);
        border-radius: 3px;
    }

    .sidebar-header {
        padding: 25px 20px;
        background: var(--primary-dark);
        border-bottom: 2px solid var(--secondary-color);
    }

    .sidebar-header h4 {
        margin: 0;
        font-weight: 700;
        font-size: 1.4rem;
        letter-spacing: 1px;
    }

    .sidebar-header p {
        margin: 5px 0 0;
        font-size: 0.85rem;
        opacity: 0.8;
    }

    .sidebar-menu {
        padding: 20px 0;
    }

    .menu-item {
        padding: 12px 20px;
        display: flex;
        align-items: center;
        color: rgba(255,255,255,0.9);
        text-decoration: none;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .menu-item:hover {
        background: rgba(255,255,255,0.1);
        color: white;
        border-left-color: var(--accent-color);
    }

    .menu-item.active {
        background: rgba(255,255,255,0.15);
        color: white;
        border-left-color: white;
        font-weight: 600;
    }

    .menu-item i {
        margin-right: 12px;
        font-size: 1.2rem;
        width: 24px;
    }

    .menu-divider {
        height: 1px;
        background: rgba(255,255,255,0.2);
        margin: 15px 20px;
    }

    .menu-label {
        padding: 15px 20px 8px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.6;
        font-weight: 600;
    }

    .logo-img {
        width: 90px;
        height: 90px;
        object-fit: contain;
        border-radius: 50%;
        background: white;
        padding: 1px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }

    /* Top Navbar */
    .top-navbar {
        background: white;
        padding: 15px 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .navbar-left h5 {
        margin: 0;
        color: var(--primary-color);
        font-weight: 700;
    }

    .navbar-left p {
        margin: 0;
        font-size: 0.85rem;
        color: #6c757d;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 15px;
        background: var(--light-bg);
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .user-info:hover {
        background: var(--primary-color);
        color: white;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .user-info:hover .user-avatar {
        background: white;
        color: var(--primary-color);
    }

    .main-content {
        margin-left: var(--sidebar-width);
        min-height: 100vh;
        transition: all 0.3s ease;
    }

    .dashboard-content {
        padding: 30px;
    }


    @media (max-width: 768px) {
        .sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
        .sidebar.active { margin-left: 0; }
        .main-content { margin-left: 0; }
        .stats-cards, .charts-section { grid-template-columns: 1fr; }
    }
</style>

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header text-center">
        <img src="/img/logo.png" alt="Logo SIMASTER" class="logo-img mb-2">
        <h4>SIMASTER</h4>
        <p>Sistem Informasi Manajemen Aset Terpadu</p>
    </div>

        
        <div class="sidebar-menu">
            <a href="{{ route('dashboard.superadmin') }}" class="menu-item">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            
            <div class="menu-label">Data Master</div>
            
            <a href="{{ route('superadmin.masterbidang') }}" class="menu-item">
                <i class="bi bi-building"></i>
                <span>Bidang</span>
            </a>
            <a href="{{ route('superadmin.mastersatker') }}" class="menu-item">
                <i class="bi bi-diagram-3"></i>
                <span>Satuan Kerja</span>
            </a>
            <a href="{{ route('superadmin.masterrakserver') }}" class="menu-item">
                <i class="bi bi-cabinet"></i>
                <span>Rak Server</span>
            </a>
            
            <div class="menu-divider"></div>
            <div class="menu-label">Manajemen Aset</div>
            
            <a href="{{ route('superadmin.server') }}" class="menu-item">
                <i class="bi bi-hdd-rack"></i>
                <span>Server</span>
            </a>
            <a href="{{ route('superadmin.website') }}" class="menu-item">
                <i class="bi bi-globe"></i>
                <span>Website</span>
            </a>
                <a href="{{ route('superadmin.pemeliharaan') }}" class="menu-item">
                <i class="bi bi-tools"></i>
                <span>Pemeliharaan</span>
            </a>
            
            <div class="menu-divider"></div>
            <div class="menu-label">Sistem</div>
            
            <a href="{{ route('superadmin.pengguna') }}" class="menu-item">
                <i class="bi bi-people"></i>
                <span>Pengguna</span>
            </a>
            <a href="{{ route('superadmin.logaktivitas') }}" class="menu-item">
                <i class="bi bi-clock-history"></i>
                <span>Log Aktivitas</span>
            </a>
            
            <div class="menu-divider"></div>
            
            <a href="{{ route('superadmin.pengaturan') }}" class="menu-item">
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
            </a>
            <a href="#" class="menu-item">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="navbar-left">
                <h5>Belum Konek Database</h5>
            </div>
            <div class="navbar-right">
                <div class="user-info">
                    <div class="user-avatar">SA</div>
                    <div>
                        <strong>Super Admin</strong>
                        <div style="font-size: 0.8rem; color: #6c757d;">superadmin@simaster.id</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Isi Konten -->
         <div>
            @yield('konten')
         </div>
        
       
</body>
</html>