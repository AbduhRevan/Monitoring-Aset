<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Server - SIMASTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #660708;
            --primary-dark: #4a0506;
            --secondary-color: #ba181b;
            --accent-color: #e5383b;
            --light-bg: #f8f9fa;
            --sidebar-width: 260px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.3); border-radius: 3px; }

        .sidebar-header {
            padding: 25px 20px;
            background: var(--primary-dark);
            border-bottom: 2px solid var(--secondary-color);
            text-align: center;
        }

        .logo-img {
            width: 90px;
            height: 90px;
            object-fit: contain;
            border-radius: 50%;
            background: white;
            padding: 1px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            margin-bottom: 10px;
        }

        .sidebar-header h4 { margin: 0; font-weight: 700; font-size: 1.4rem; }
        .sidebar-header p { margin: 5px 0 0; font-size: 0.85rem; opacity: 0.8; }

        .sidebar-menu { padding: 20px 0; }

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

        .menu-item i { margin-right: 12px; font-size: 1.2rem; width: 24px; }
        .menu-divider { height: 1px; background: rgba(255,255,255,0.2); margin: 15px 20px; }
        .menu-label {
            padding: 15px 20px 8px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.6;
            font-weight: 600;
        }

        .main-content { margin-left: var(--sidebar-width); min-height: 100vh; }

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

        .navbar-left h5 { margin: 0; color: var(--primary-color); font-weight: 700; }
        .breadcrumb { margin: 0; font-size: 0.85rem; background: transparent; padding: 0; }
        .breadcrumb-item a { color: var(--primary-color); text-decoration: none; }
        .breadcrumb-item.active { color: #6c757d; }

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

        .user-info:hover { background: var(--primary-color); color: white; }

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

        .user-info:hover .user-avatar { background: white; color: var(--primary-color); }

        .content-area { padding: 30px; }

        .content-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card-header-custom h6 { margin: 0; font-size: 1.2rem; font-weight: 700; }
        .card-body-custom { padding: 25px; }

        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(102,7,8,0.3);
        }

        .btn-success-custom {
            background: #28a745;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            margin-right: 5px;
        }

        .btn-success-custom:hover { background: #218838; transform: translateY(-1px); }

        .btn-danger-custom {
            background: #dc3545;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            margin-right: 5px;
        }

        .btn-danger-custom:hover { background: #c82333; transform: translateY(-1px); }

        .btn-info-custom {
            background: #17a2b8;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            margin-right: 5px;
        }

        .btn-info-custom:hover { background: #138496; transform: translateY(-1px); }

        .filter-section {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-item {
            flex: 1;
            min-width: 200px;
        }

        .search-wrapper { position: relative; flex: 2; min-width: 250px; }

        .search-input {
            width: 100%;
            padding: 12px 45px 12px 20px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102,7,8,0.1);
        }

        .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.2rem;
        }

        .table-custom { width: 100%; margin-bottom: 0; border-collapse: collapse; }
        .table-custom thead { background: var(--light-bg); }

        .table-custom thead th {
            padding: 15px;
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
            font-size: 0.85rem;
            border-bottom: 2px solid var(--primary-color);
            text-align: left;
        }

        .table-custom tbody td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }

        .table-custom tbody tr { transition: all 0.3s ease; }
        .table-custom tbody tr:hover { background: #f8f9fa; transform: translateX(5px); }

        .badge-custom {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-badge {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .status-badge.online { background: #28a745; box-shadow: 0 0 8px #28a745; }
        .status-badge.offline { background: #dc3545; }
        .status-badge.standby { background: #ffc107; }

        .modal-header-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .form-label { font-weight: 600; color: var(--primary-color); margin-bottom: 8px; }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102,7,8,0.1);
        }

        .pagination-custom {
            display: flex;
            gap: 5px;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .page-link-custom {
            padding: 8px 15px;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-link-custom:hover { background: var(--primary-color); color: white; }
        .page-link-custom.active { background: var(--primary-color); color: white; }

        .alert-custom {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
        }

        .server-spec {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 3px;
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
            }
            
            .card-header-custom {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="/img/logo.png" alt="Logo SIMASTER" class="logo-img">
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
            
            <a href="{{ route('superadmin.server') }}" class="menu-item active">
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
                <h5>Manajemen Server</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manajemen Aset</a></li>
                        <li class="breadcrumb-item active">Server</li>
                    </ol>
                </nav>
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

        <!-- Content Area -->
        <div class="content-area">
            <!-- Success Alert -->
            <div class="alert-custom alert-success" id="successAlert" style="display: none;">
                <i class="bi bi-check-circle-fill"></i>
                <span id="successMessage"></span>
            </div>

            <!-- Content Card -->
            <div class="content-card">
                <div class="card-header-custom">
                    <h6><i class="bi bi-hdd-rack"></i> Daftar Server</h6>
                    <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <i class="bi bi-plus-circle"></i> Tambah Server
                    </button>
                </div>
                
                <div class="card-body-custom">
                    <!-- Filter Section -->
                    <div class="filter-section">
                        <div class="search-wrapper">
                            <input type="text" class="search-input" placeholder="Cari server..." id="searchInput">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                        <div class="filter-item">
                            <select class="form-select" id="filterBidang">
                                <option value="">Semua Bidang</option>
                                <option value="ti">Bidang TI</option>
                                <option value="humas">Bidang Humas</option>
                                <option value="keu">Bidang Keuangan</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <select class="form-select" id="filterStatus">
                                <option value="">Semua Status</option>
                                <option value="ON">Online</option>
                                <option value="OFF">Offline</option>
                                <option value="STANDBY">Standby</option>
                            </select>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 20%;">Nama Server</th>
                                    <th style="width: 15%;">Spesifikasi</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 10%;">Lokasi</th>
                                    <th style="width: 15%;">Bidang</th>
                                    <th style="width: 10%;">Website</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <strong>SERVER-WEB-01</strong>
                                        <div class="server-spec">Dell PowerEdge R740</div>
                                    </td>
                                    <td>
                                        <small>
                                            CPU: Xeon Gold 6230<br>
                                            RAM: 64GB<br>
                                            Storage: 2TB SSD
                                        </small>
                                    </td>
                                    <td>
                                        <span class="status-badge online"></span>
                                        <strong style="color: #28a745;">Online</strong>
                                    </td>
                                    <td>
                                        <span class="badge-custom bg-dark">RAK-A01</span><br>
                                        <small class="text-muted">U: 1-3</small>
                                    </td>
                                    <td><span class="badge-custom bg-primary">Bidang TI</span></td>
                                    <td><span class="badge-custom bg-info text-dark">3 Sites</span></td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailServer(1)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editServer(1)">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(1)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <strong>SERVER-DB-01</strong>
                                        <div class="server-spec">HP ProLiant DL380 Gen10</div>
                                    </td>
                                    <td>
                                        <small>
                                            CPU: Xeon Gold 5220<br>
                                            RAM: 128GB<br>
                                            Storage: 4TB SAS
                                        </small>
                                    </td>
                                    <td>
                                        <span class="status-badge online"></span>
                                        <strong style="color: #28a745;">Online</strong>
                                    </td>
                                    <td>
                                        <span class="badge-custom bg-dark">RAK-A01</span><br>
                                        <small class="text-muted">U: 4-7</small>
                                    </td>
                                    <td><span class="badge-custom bg-primary">Bidang TI</span></td>
                                    <td><span class="badge-custom bg-info text-dark">1 DB</span></td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailServer(2)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editServer(2)">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(2)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <strong>SERVER-APP-02</strong>
                                        <div class="server-spec">Lenovo ThinkSystem SR650</div>
                                    </td>
                                    <td>
                                        <small>
                                            CPU: Xeon Silver 4214<br>
                                            RAM: 32GB<br>
                                            Storage: 1TB SSD
                                        </small>
                                    </td>
                                    <td>
                                        <span class="status-badge standby"></span>
                                        <strong style="color: #ffc107;">Standby</strong>
                                    </td>
                                    <td>
                                        <span class="badge-custom bg-dark">RAK-A02</span><br>
                                        <small class="text-muted">U: 10-12</small>
                                    </td>
                                    <td><span class="badge-custom bg-primary">Bidang Humas</span></td>
                                    <td><span class="badge-custom bg-info text-dark">2 Sites</span></td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailServer(3)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editServer(3)">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(3)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <strong>SERVER-BACKUP-01</strong>
                                        <div class="server-spec">Dell PowerEdge R640</div>
                                    </td>
                                    <td>
                                        <small>
                                            CPU: Xeon Silver 4210<br>
                                            RAM: 64GB<br>
                                            Storage: 8TB HDD
                                        </small>
                                    </td>
                                    <td>
                                        <span class="status-badge offline"></span>
                                        <strong style="color: #dc3545;">Offline</strong>
                                    </td>
                                    <td>
                                        <span class="badge-custom bg-dark">RAK-B01</span><br>
                                        <small class="text-muted">U: 20-23</small>
                                    </td>
                                    <td><span class="badge-custom bg-primary">Bidang TI</span></td>
                                    <td><span class="badge-custom bg-secondary">Backup</span></td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailServer(4)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editServer(4)">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(4)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-custom">
                        <a href="#" class="page-link-custom active">1</a>
                        <a href="#" class="page-link-custom">2</a>
                        <a href="#" class="page-link-custom">3</a>
                        <a href="#" class="page-link-custom"><i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Server Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambah">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Server <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Contoh: SERVER-WEB-01" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Brand <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Contoh: Dell PowerEdge R740" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Spesifikasi <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="3" placeholder="CPU: ...&#10;RAM: ...&#10;Storage: ..." required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Status Power <span class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="">Pilih Status</option>
                                    <option value="ON">Online</option>
                                    <option value="OFF">Offline</option>
                                    <option value="STANDBY">Standby</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Rak Server <span class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="">Pilih Rak</option>
                                    <option value="1">RAK-A01</option>
                                    <option value="2">RAK-A02</option>
                                    <option value="3">RAK-B01</option>
                                    <option value="4">RAK-B02</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">U Slot <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Contoh: 1-3" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bidang <span class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="">Pilih Bidang</option>
                                    <option value="1">Bidang TI</option>
                                    <option value="2">Bidang Humas</option>
                                    <option value="3">Bidang Keuangan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Satuan Kerja</label>
                                <select class="form-select">
                                    <option value="">Pilih Satker (Opsional)</option>
                                    <option value="1">Sekretariat Daerah</option>
                                    <option value="2">Dinas Pendidikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Website Terkait</label>
                            <select class="form-select">
                                <option value="">Pilih Website (Opsional)</option>
                                <option value="1">jakarta.go.id</option>
                                <option value="2">humas.jakarta.go.id</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" rows="2" placeholder="Keterangan tambahan (opsional)"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-primary-custom" onclick="simpanData()">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-info-circle"></i> Detail Server</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3"><i class="bi bi-server"></i> Informasi Server</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="150"><strong>Nama Server</strong></td>
                                    <td>: SERVER-WEB-01</td>
                                </tr>
                                <tr>
                                    <td><strong>Brand</strong></td>
                                    <td>: Dell PowerEdge R740</td>
                                </tr>
                                <tr>
                                    <td><strong>Spesifikasi</strong></td>
                                    <td>
                                        : CPU: Intel Xeon Gold 6230<br>
                                        &nbsp;&nbsp;RAM: 64GB DDR4<br>
                                        &nbsp;&nbsp;Storage: 2TB NVMe SSD
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Status Power</strong></td>
                                    <td>
                                        : <span class="status-badge online"></span>
                                        <strong style="color: #28a745;">Online</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Uptime</strong></td>
                                    <td>: 45 hari 12 jam</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3"><i class="bi bi-geo-alt"></i> Lokasi & Kepemilikan</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="150"><strong>Rak Server</strong></td>
                                    <td>: RAK-A01 (Ruang Server Lt. 3)</td>
                                </tr>
                                <tr>
                                    <td><strong>U Slot</strong></td>
                                    <td>: U 1-3 (3U)</td>
                                </tr>
                                <tr>
                                    <td><strong>Bidang</strong></td>
                                    <td>: Bidang Teknologi Informasi</td>
                                </tr>
                                <tr>
                                    <td><strong>Satuan Kerja</strong></td>
                                    <td>: Sekretariat Daerah Jakarta</td>
                                </tr>
                                <tr>
                                    <td><strong>Website Terkait</strong></td>
                                    <td>
                                        : <span class="badge bg-info">3 Website</span><br>
                                        &nbsp;&nbsp;- jakarta.go.id<br>
                                        &nbsp;&nbsp;- portal.jakarta.go.id<br>
                                        &nbsp;&nbsp;- ppid.jakarta.go.id
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-3"><i class="bi bi-clock-history"></i> Riwayat Pemeliharaan</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15 Oktober 2024</td>
                                        <td>Maintenance Rutin</td>
                                        <td>Pembersihan hardware & update firmware</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>12 September 2024</td>
                                        <td>Upgrade RAM</td>
                                        <td>Upgrade RAM dari 32GB ke 64GB</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>05 Agustus 2024</td>
                                        <td>Penggantian Disk</td>
                                        <td>Penggantian disk yang rusak</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn-primary-custom" onclick="printDetail()">
                        <i class="bi bi-printer"></i> Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Edit Server</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Server <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editNama" value="SERVER-WEB-01" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Brand <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editBrand" value="Dell PowerEdge R740" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Spesifikasi <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="3" id="editSpesifikasi" required>CPU: Intel Xeon Gold 6230
RAM: 64GB DDR4
Storage: 2TB NVMe SSD</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Status Power <span class="text-danger">*</span></label>
                                <select class="form-select" id="editStatus" required>
                                    <option value="ON" selected>Online</option>
                                    <option value="OFF">Offline</option>
                                    <option value="STANDBY">Standby</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Rak Server <span class="text-danger">*</span></label>
                                <select class="form-select" id="editRak" required>
                                    <option value="1" selected>RAK-A01</option>
                                    <option value="2">RAK-A02</option>
                                    <option value="3">RAK-B01</option>
                                    <option value="4">RAK-B02</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">U Slot <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editUSlot" value="1-3" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bidang <span class="text-danger">*</span></label>
                                <select class="form-select" id="editBidang" required>
                                    <option value="1" selected>Bidang TI</option>
                                    <option value="2">Bidang Humas</option>
                                    <option value="3">Bidang Keuangan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Satuan Kerja</label>
                                <select class="form-select" id="editSatker">
                                    <option value="">Pilih Satker (Opsional)</option>
                                    <option value="1" selected>Sekretariat Daerah</option>
                                    <option value="2">Dinas Pendidikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" rows="2" id="editKeterangan"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-primary-custom" onclick="updateData()">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle"></i> Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus server <strong id="deleteName">SERVER-WEB-01</strong>?</p>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <strong>Perhatian!</strong> Tindakan ini akan:
                        <ul class="mb-0 mt-2">
                            <li>Menghapus semua data server</li>
                            <li>Menghapus riwayat pemeliharaan terkait</li>
                            <li>Data yang dihapus tidak dapat dikembalikan</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-danger-custom" onclick="hapusData()">
                        <i class="bi bi-trash"></i> Ya, Hapus Server
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter by Bidang
        document.getElementById('filterBidang').addEventListener('change', function() {
            filterTable();
        });

        // Filter by Status
        document.getElementById('filterStatus').addEventListener('change', function() {
            filterTable();
        });

        function filterTable() {
            let bidangFilter = document.getElementById('filterBidang').value.toLowerCase();
            let statusFilter = document.getElementById('filterStatus').value.toLowerCase();
            let rows = document.querySelectorAll('#tableBody tr');

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                let showBidang = !bidangFilter || text.includes(bidangFilter);
                let showStatus = !statusFilter || text.includes(statusFilter.toLowerCase());
                row.style.display = (showBidang && showStatus) ? '' : 'none';
            });
        }

        function detailServer(id) {
            // In real app, fetch data from server via AJAX
            new bootstrap.Modal(document.getElementById('modalDetail')).show();
        }

        function editServer(id) {
            // In real app, fetch data from server via AJAX
            new bootstrap.Modal(document.getElementById('modalEdit')).show();
        }

        function confirmDelete(id) {
            new bootstrap.Modal(document.getElementById('modalDelete')).show();
        }

        function simpanData() {
            let form = document.getElementById('formTambah');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            
            // Simulate saving
            showAlert('Data server berhasil ditambahkan!');
            bootstrap.Modal.getInstance(document.getElementById('modalTambah')).hide();
            form.reset();
        }

        function updateData() {
            let form = document.getElementById('formEdit');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            
            showAlert('Data server berhasil diupdate!');
            bootstrap.Modal.getInstance(document.getElementById('modalEdit')).hide();
        }

        function hapusData() {
            showAlert('Data server berhasil dihapus!');
            bootstrap.Modal.getInstance(document.getElementById('modalDelete')).hide();
        }

        function printDetail() {
            window.print();
        }

        function showAlert(message) {
            let alert = document.getElementById('successAlert');
            document.getElementById('successMessage').textContent = message;
            alert.style.display = 'flex';
            setTimeout(() => { alert.style.display = 'none'; }, 5000);
        }
    </script>
</body>
</html>