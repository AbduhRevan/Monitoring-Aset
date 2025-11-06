<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIMASTER</title>
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

    /* =========================================
       🟥 SIDEBAR & HEADER SECTION
    ========================================== */

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

    /* =========================================
       🟦 MAIN CONTENT (Dashboard & Cards)
    ========================================== */

    .main-content {
        margin-left: var(--sidebar-width);
        min-height: 100vh;
        transition: all 0.3s ease;
    }

    .dashboard-content {
        padding: 30px;
    }

    /* Stats Cards */
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-top: 4px solid var(--primary-color);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(102,7,8,0.15);
    }

    .stat-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .stat-card-header h6 {
        color: var(--primary-color);
        font-weight: 700;
        margin: 0;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
    }

    .stat-total {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 12px;
    }

    .stat-details {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .stat-item {
        flex: 1;
        min-width: 70px;
        padding: 8px;
        background: var(--light-bg);
        border-radius: 8px;
        text-align: center;
    }

    .stat-item-value {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 2px;
    }

    .stat-item-label {
        font-size: 0.7rem;
        color: #6c757d;
        text-transform: uppercase;
    }

    .stat-item.active .stat-item-value { color: #28a745; }
    .stat-item.inactive .stat-item-value { color: #dc3545; }
    .stat-item.maintenance .stat-item-value { color: #ffc107; }

    /* Charts Section */
    .charts-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .chart-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .chart-card h6 {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 1.1rem;
    }

    /* Grafik ukuran */
    #serverChart {
        max-width: 100%;
        height: auto;
        display: block;
    }

    #websiteChart {
        max-width: 800px;
        max-height: 800px;
        margin: 0 auto;
        display: block;
    }

    /* Activity Log */
    .activity-log {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .activity-log h6 {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 1.1rem;
    }

    .activity-item {
        display: flex;
        align-items: start;
        padding: 15px;
        border-left: 3px solid var(--primary-color);
        margin-bottom: 12px;
        background: var(--light-bg);
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        background: #e9ecef;
        transform: translateX(5px);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .activity-icon.create { background: #d4edda; color: #28a745; }
    .activity-icon.update { background: #d1ecf1; color: #17a2b8; }
    .activity-icon.delete { background: #f8d7da; color: #dc3545; }
    .activity-icon.login { background: #fff3cd; color: #ffc107; }

    .activity-content strong {
        color: var(--primary-color);
    }

    .activity-time {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 5px;
    }

    /* =========================================
       🟨 RESPONSIVE SECTION
    ========================================== */

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
                <h5>Dashboard Super Admin</h5>
                <p>Selamat datang di Sistem Informasi Manajemen Aset Terpadu</p>
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

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Stats Cards -->
            <div class="stats-cards">
                <!-- Card 1: Website -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h6><i class="bi bi-globe"></i> Website</h6>
                        <div class="stat-icon">
                            <i class="bi bi-globe2"></i>
                        </div>
                    </div>
                    <div class="stat-total">127</div>
                    <div class="stat-details">
                        <div class="stat-item active">
                            <div class="stat-item-value">98</div>
                            <div class="stat-item-label">Aktif</div>
                        </div>
                        <div class="stat-item inactive">
                            <div class="stat-item-value">15</div>
                            <div class="stat-item-label">Tidak Aktif</div>
                        </div>
                        <div class="stat-item maintenance">
                            <div class="stat-item-value">14</div>
                            <div class="stat-item-label">Maintenance</div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Server -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h6><i class="bi bi-hdd-rack"></i> Server</h6>
                        <div class="stat-icon">
                            <i class="bi bi-server"></i>
                        </div>
                    </div>
                    <div class="stat-total">45</div>
                    <div class="stat-details">
                        <div class="stat-item active">
                            <div class="stat-item-value">38</div>
                            <div class="stat-item-label">Online</div>
                        </div>
                        <div class="stat-item inactive">
                            <div class="stat-item-value">5</div>
                            <div class="stat-item-label">Offline</div>
                        </div>
                        <div class="stat-item maintenance">
                            <div class="stat-item-value">2</div>
                            <div class="stat-item-label">Standby</div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Pemeliharaan -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h6><i class="bi bi-tools"></i> Pemeliharaan</h6>
                        <div class="stat-icon">
                            <i class="bi bi-wrench-adjustable"></i>
                        </div>
                    </div>
                    <div class="stat-total">28</div>
                    <div class="stat-details">
                        <div class="stat-item active">
                            <div class="stat-item-value">12</div>
                            <div class="stat-item-label">Bulan Ini</div>
                        </div>
                        <div class="stat-item maintenance">
                            <div class="stat-item-value">8</div>
                            <div class="stat-item-label">Terjadwal</div>
                        </div>
                        <div class="stat-item inactive">
                            <div class="stat-item-value">8</div>
                            <div class="stat-item-label">Tertunda</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="charts-section">
                <div class="chart-card">
                    <h6><i class="bi bi-bar-chart-line"></i> Statistik Server</h6>
                    <canvas id="serverChart"></canvas>
                </div>
                <div class="chart-card">
                    <h6><i class="bi bi-pie-chart"></i> Statistik Website</h6>
                    <canvas id="websiteChart"></canvas>
                </div>
            </div>

            <!-- Activity Log -->
            <div class="activity-log">
                <h6><i class="bi bi-clock-history"></i> Riwayat Aktivitas Terbaru</h6>
                
                <div class="activity-item">
                    <div class="activity-icon create">
                        <i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="activity-content">
                        <strong>Admin Bidang TI</strong> menambahkan server baru <strong>SERVER-WEB-01</strong>
                        <div class="activity-time">
                            <i class="bi bi-clock"></i> 5 menit yang lalu
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon update">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="activity-content">
                        <strong>Admin Bidang Humas</strong> mengupdate status website <strong>humas.jakarta.go.id</strong> menjadi maintenance
                        <div class="activity-time">
                            <i class="bi bi-clock"></i> 15 menit yang lalu
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon login">
                        <i class="bi bi-box-arrow-in-right"></i>
                    </div>
                    <div class="activity-content">
                        <strong>Pimpinan</strong> melakukan login ke sistem
                        <div class="activity-time">
                            <i class="bi bi-clock"></i> 30 menit yang lalu
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon create">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div class="activity-content">
                        <strong>Admin Bidang TI</strong> menambahkan jadwal pemeliharaan untuk <strong>SERVER-DB-03</strong>
                        <div class="activity-time">
                            <i class="bi bi-clock"></i> 1 jam yang lalu
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon delete">
                        <i class="bi bi-trash"></i>
                    </div>
                    <div class="activity-content">
                        <strong>Super Admin</strong> menghapus website <strong>old.jakarta.go.id</strong>
                        <div class="activity-time">
                            <i class="bi bi-clock"></i> 2 jam yang lalu
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon update">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div class="activity-content">
                        <strong>Admin Bidang Keuangan</strong> mengupdate spesifikasi <strong>SERVER-APP-02</strong>
                        <div class="activity-time">
                            <i class="bi bi-clock"></i> 3 jam yang lalu
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Server Chart
        const serverCtx = document.getElementById('serverChart').getContext('2d');
        new Chart(serverCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Online',
                    data: [35, 36, 38, 37, 39, 38],
                    backgroundColor: '#28a745',
                    borderRadius: 8
                }, {
                    label: 'Offline',
                    data: [5, 4, 3, 5, 4, 5],
                    backgroundColor: '#dc3545',
                    borderRadius: 8
                }, {
                    label: 'Standby',
                    data: [2, 2, 1, 2, 2, 2],
                    backgroundColor: '#ffc107',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });

        // Website Chart
        const websiteCtx = document.getElementById('websiteChart').getContext('2d');
        new Chart(websiteCtx, {
            type: 'doughnut',
            data: {
                labels: ['Aktif', 'Tidak Aktif', 'Maintenance'],
                datasets: [{
                    data: [98, 15, 14],
                    backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>
</body>
</html>