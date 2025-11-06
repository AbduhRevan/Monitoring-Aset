<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Website - SIMASTER</title>
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

        .website-url {
            color: #17a2b8;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .website-url:hover {
            text-decoration: underline;
        }

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
            
            <a href="{{ route('superadmin.server') }}" class="menu-item">
                <i class="bi bi-hdd-rack"></i>
                <span>Server</span>
            </a>
            <a href="{{ route('superadmin.website') }}" class="menu-item active">
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
                <h5>Manajemen Website</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manajemen Aset</a></li>
                        <li class="breadcrumb-item active">Website</li>
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
                    <h6><i class="bi bi-globe"></i> Daftar Website</h6>
                    <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <i class="bi bi-plus-circle"></i> Tambah Website
                    </button>
                </div>
                
                <div class="card-body-custom">
                    <!-- Filter Section -->
                    <div class="filter-section">
                        <div class="search-wrapper">
                            <input type="text" class="search-input" placeholder="Cari website..." id="searchInput">
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
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 25%;">Nama Website</th>
                                    <th style="width: 20%;">URL</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 15%;">Bidang</th>
                                    <th style="width: 10%;">Tahun</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <strong>Portal Jakarta</strong>
                                        <div style="font-size: 0.85rem; color: #6c757d;">Website resmi Pemprov DKI Jakarta</div>
                                    </td>
                                    <td>
                                        <a href="https://jakarta.go.id" target="_blank" class="website-url">
                                            <i class="bi bi-link-45deg"></i> jakarta.go.id
                                        </a>
                                    </td>
                                    <td><span class="badge-custom bg-success">Aktif</span></td>
                                    <td><span class="badge-custom bg-primary">Bidang TI</span></td>
                                    <td>2020</td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailWebsite(1)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editWebsite(1)">
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
                                        <strong>Humas Jakarta</strong>
                                        <div style="font-size: 0.85rem; color: #6c757d;">Website Humas Pemprov DKI</div>
                                    </td>
                                    <td>
                                        <a href="https://humas.jakarta.go.id" target="_blank" class="website-url">
                                            <i class="bi bi-link-45deg"></i> humas.jakarta.go.id
                                        </a>
                                    </td>
                                    <td><span class="badge-custom bg-warning text-dark">Maintenance</span></td>
                                    <td><span class="badge-custom bg-primary">Bidang Humas</span></td>
                                    <td>2019</td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailWebsite(2)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editWebsite(2)">
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
                                        <strong>PPID Jakarta</strong>
                                        <div style="font-size: 0.85rem; color: #6c757d;">Pejabat Pengelola Informasi dan Dokumentasi</div>
                                    </td>
                                    <td>
                                        <a href="https://ppid.jakarta.go.id" target="_blank" class="website-url">
                                            <i class="bi bi-link-45deg"></i> ppid.jakarta.go.id
                                        </a>
                                    </td>
                                    <td><span class="badge-custom bg-success">Aktif</span></td>
                                    <td><span class="badge-custom bg-primary">Bidang TI</span></td>
                                    <td>2021</td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailWebsite(3)">
                                            <i class="bi by-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editWebsite(3)">
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
                                        <strong>Smartcity Jakarta</strong>
                                        <div style="font-size: 0.85rem; color: #6c757d;">Portal Smartcity DKI Jakarta</div>
                                    </td>
                                    <td>
                                        <a href="https://smartcity.jakarta.go.id" target="_blank" class="website-url">
                                            <i class="bi bi-link-45deg"></i> smartcity.jakarta.go.id
                                        </a>
                                    </td>
                                    <td><span class="badge-custom bg-danger">Tidak Aktif</span></td>
                                    <td><span class="badge-custom bg-primary">Bidang TI</span></td>
                                    <td>2018</td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailWebsite(4)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editWebsite(4)">
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

    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-info-circle"></i> Detail Website</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3"><i class="bi bi-globe"></i> Informasi Website</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="180"><strong>Nama Website</strong></td>
                                    <td>: Portal Jakarta</td>
                                </tr>
                                <tr>
                                    <td><strong>URL</strong></td>
                                    <td>
                                        : <a href="https://jakarta.go.id" target="_blank" class="website-url">
                                            https://jakarta.go.id <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>: <span class="badge-custom bg-success">Aktif</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tahun Pengadaan</strong></td>
                                    <td>: 2020</td>
                                </tr>
                                <tr>
                                    <td><strong>Bidang</strong></td>
                                    <td>: Bidang Teknologi Informasi</td>
                                </tr>
                                <tr>
                                    <td><strong>Satuan Kerja</strong></td>
                                    <td>: Sekretariat Daerah Jakarta</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3"><i class="bi bi-hdd-rack"></i> Server & Hosting</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="180"><strong>Server Host</strong></td>
                                    <td>: SERVER-WEB-01</td>
                                </tr>
                                <tr>
                                    <td><strong>IP Address</strong></td>
                                    <td>: 103.27.207.10</td>
                                </tr>
                                <tr>
                                    <td><strong>SSL Certificate</strong></td>
                                    <td>: <span class="badge bg-success">Valid</span> (Expires: 15 Des 2024)</td>
                                </tr>
                                <tr>
                                    <td><strong>CMS</strong></td>
                                    <td>: WordPress 6.4</td>
                                </tr>
                                <tr>
                                    <td><strong>Uptime</strong></td>
                                    <td>: <span class="text-success">99.98%</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Last Check</strong></td>
                                    <td>: 5 menit yang lalu</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-3"><i class="bi bi-file-text"></i> Keterangan</h6>
                            <div class="border rounded p-3 bg-light">
                                <p>Website resmi Pemerintah Provinsi DKI Jakarta yang menyediakan informasi layanan publik, berita, dan pengumuman resmi.</p>
                                <p class="mb-0">Dikelola oleh Tim IT Sekretariat Daerah dengan update berkala setiap hari.</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-3"><i class="bi bi-clock-history"></i> Riwayat Pemeliharaan</h6>
                            <table class="table table-sm table-striped">
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
                                        <td>20 Oktober 2024</td>
                                        <td>Update Security</td>
                                        <td>Update WordPress & Plugin ke versi terbaru</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>15 September 2024</td>
                                        <td>Backup Data</td>
                                        <td>Backup database dan file website</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>10 Agustus 2024</td>
                                        <td>Performance Tuning</td>
                                        <td>Optimasi database dan cache</td>
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
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Edit Website</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Website <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editNama" value="Portal Jakarta" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">URL <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="editUrl" value="https://jakarta.go.id" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="editStatus" required>
                                    <option value="active" selected>Aktif</option>
                                    <option value="inactive">Tidak Aktif</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bidang <span class="text-danger">*</span></label>
                                <select class="form-select" id="editBidang" required>
                                    <option value="1" selected>Bidang TI</option>
                                    <option value="2">Bidang Humas</option>
                                    <option value="3">Bidang Keuangan</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tahun Pengadaan <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="editTahun" value="2020" min="2000" max="2099" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Satuan Kerja</label>
                            <select class="form-select" id="editSatker">
                                <option value="">Pilih Satker (Opsional)</option>
                                <option value="1" selected>Sekretariat Daerah</option>
                                <option value="2">Dinas Pendidikan</option>
                                <option value="3">Dinas Kesehatan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control summernote" id="editKeterangan"></textarea>
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
                    <p>Apakah Anda yakin ingin menghapus website <strong id="deleteName">Portal Jakarta</strong>?</p>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <strong>Perhatian!</strong> Tindakan ini akan:
                        <ul class="mb-0 mt-2">
                            <li>Menghapus semua data website</li>
                            <li>Menghapus riwayat pemeliharaan terkait</li>
                            <li>Data yang dihapus tidak dapat dikembalikan</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-danger-custom" onclick="hapusData()">
                        <i class="bi bi-trash"></i> Ya, Hapus Website
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.js"></script>
    <script>
        // Initialize Summernote
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Tulis keterangan website di sini...'
            });
        });

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

        function detailWebsite(id) {
            // In real app, fetch data from server via AJAX
            new bootstrap.Modal(document.getElementById('modalDetail')).show();
        }

        function editWebsite(id) {
            // In real app, fetch data from server via AJAX
            var modal = new bootstrap.Modal(document.getElementById('modalEdit'));
            modal.show();
            
            // Set summernote content (example)
            setTimeout(function() {
                $('#editKeterangan').summernote('code', '<p>Website resmi Pemerintah Provinsi DKI Jakarta yang menyediakan informasi layanan publik, berita, dan pengumuman resmi.</p><p>Dikelola oleh Tim IT Sekretariat Daerah dengan update berkala setiap hari.</p>');
            }, 500);
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
            
            // Get summernote content
            let keterangan = $('#keteranganTambah').summernote('code');
            
            // Simulate saving
            showAlert('Data website berhasil ditambahkan!');
            bootstrap.Modal.getInstance(document.getElementById('modalTambah')).hide();
            form.reset();
            $('#keteranganTambah').summernote('code', '');
        }

        function updateData() {
            let form = document.getElementById('formEdit');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            
            // Get summernote content
            let keterangan = $('#editKeterangan').summernote('code');
            
            showAlert('Data website berhasil diupdate!');
            bootstrap.Modal.getInstance(document.getElementById('modalEdit')).hide();
        }

        function hapusData() {
            showAlert('Data website berhasil dihapus!');
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
</html></div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Website Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambah">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Website <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Contoh: Portal Jakarta" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">URL <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" placeholder="https://jakarta.go.id" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="">Pilih Status</option>
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Tidak Aktif</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bidang <span class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="">Pilih Bidang</option>
                                    <option value="1">Bidang TI</option>
                                    <option value="2">Bidang Humas</option>
                                    <option value="3">Bidang Keuangan</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tahun Pengadaan <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="2024" min="2000" max="2099" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Satuan Kerja</label>
                            <select class="form-select">
                                <option value="">Pilih Satker (Opsional)</option>
                                <option value="1">Sekretariat Daerah</option>
                                <option value="2">Dinas Pendidikan</option>
                                <option value="3">Dinas Kesehatan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control summernote" id="keteranganTambah"></textarea>
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