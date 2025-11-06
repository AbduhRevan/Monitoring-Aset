<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Rak Server - SIMASTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
        }

        .sidebar-header h4 { 
            margin: 0; 
            font-weight: 700; 
            font-size: 1.4rem; 
            letter-spacing: 1px;
        }
        .sidebar-header p { margin: 5px 0 0; font-size: 0.85rem; opacity: 0.8; }

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

    .logo-img {
        width: 90px;
        height: 90px;
        object-fit: contain;
        border-radius: 50%;
        background: white;
        padding: 1px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
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
        }

        .btn-info-custom:hover { background: #138496; transform: translateY(-1px); }

        .search-wrapper { position: relative; margin-bottom: 20px; }

        .search-input {
            width: 100%;
            max-width: 400px;
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

        .table-custom { width: 100%; margin-bottom: 0; }
        .table-custom thead { background: var(--light-bg); }

        .table-custom thead th {
            padding: 15px;
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
            font-size: 0.85rem;
            border-bottom: 2px solid var(--primary-color);
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
        }

        .progress-custom {
            height: 25px;
            border-radius: 8px;
            background: #e9ecef;
            overflow: hidden;
        }

        .progress-bar-custom {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.85rem;
            transition: width 0.6s ease;
        }

        .progress-bar-success { background: #28a745; }
        .progress-bar-warning { background: #ffc107; }
        .progress-bar-danger { background: #dc3545; }

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
        }

        .alert-success {
            background: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
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
                <h5>Data Master Rak Server</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item active">Rak Server</li>
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
                    <h6><i class="bi bi-cabinet"></i> Daftar Rak Server</h6>
                    <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <i class="bi bi-plus-circle"></i> Tambah Rak Server
                    </button>
                </div>
                
                <div class="card-body-custom">
                    <!-- Search Bar -->
                    <div class="search-wrapper">
                        <input type="text" class="search-input" placeholder="Cari rak server..." id="searchInput">
                        <i class="bi bi-search search-icon"></i>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 15%;">Nomor Rak</th>
                                    <th style="width: 20%;">Ruangan</th>
                                    <th style="width: 10%;">Kapasitas</th>
                                    <th style="width: 25%;">Penggunaan</th>
                                    <th style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr>
                                    <td>1</td>
                                    <td><span class="badge-custom">RAK-A01</span></td>
                                    <td>Ruang Server Lt. 3</td>
                                    <td><span class="badge-custom bg-secondary">42U</span></td>
                                    <td>
                                        <div class="progress-custom">
                                            <div class="progress-bar-custom progress-bar-success" style="width: 60%">
                                                25U / 42U (60%)
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailRak(1)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editData(1)">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(1)">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><span class="badge-custom">RAK-A02</span></td>
                                    <td>Ruang Server Lt. 3</td>
                                    <td><span class="badge-custom bg-secondary">42U</span></td>
                                    <td>
                                        <div class="progress-custom">
                                            <div class="progress-bar-custom progress-bar-warning" style="width: 80%">
                                                34U / 42U (80%)
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailRak(2)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editData(2)">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(2)">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><span class="badge-custom">RAK-B01</span></td>
                                    <td>Ruang Server Lt. 4</td>
                                    <td><span class="badge-custom bg-secondary">48U</span></td>
                                    <td>
                                        <div class="progress-custom">
                                            <div class="progress-bar-custom progress-bar-danger" style="width: 95%">
                                                46U / 48U (95%)
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailRak(3)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editData(3)">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(3)">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><span class="badge-custom">RAK-B02</span></td>
                                    <td>Ruang Server Lt. 4</td>
                                    <td><span class="badge-custom bg-secondary">48U</span></td>
                                    <td>
                                        <div class="progress-custom">
                                            <div class="progress-bar-custom progress-bar-success" style="width: 45%">
                                                22U / 48U (45%)
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn-info-custom" onclick="detailRak(4)">
                                            <i class="bi bi-eye"></i> Detail
                                        </button>
                                        <button class="btn-success-custom" onclick="editData(4)">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <button class="btn-danger-custom" onclick="confirmDelete(4)">
                                            <i class="bi bi-trash"></i> Hapus
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
                        <a href="#" class="page-link-custom"><i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Rak Server Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambah">
                        <div class="mb-3">
                            <label class="form-label">Nomor Rak <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Contoh: RAK-A01" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruangan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Contoh: Ruang Server Lt. 3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kapasitas U Slot <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih Kapasitas</option>
                                <option value="42">42U</option>
                                <option value="45">45U</option>
                                <option value="47">47U</option>
                                <option value="48">48U</option>
                            </select>
                            <small class="text-muted">1U = 1.75 inch atau 44.45 mm</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)"></textarea>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Edit Rak Server</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit">
                        <div class="mb-3">
                            <label class="form-label">Nomor Rak <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editNomor" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruangan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editRuangan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kapasitas U Slot <span class="text-danger">*</span></label>
                            <select class="form-select" id="editKapasitas" required>
                                <option value="42">42U</option>
                                <option value="45">45U</option>
                                <option value="47">47U</option>
                                <option value="48">48U</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" id="editKeterangan" rows="3"></textarea>
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

    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title"><i class="bi bi-info-circle"></i> Detail Rak Server</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Informasi Rak</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="150"><strong>Nomor Rak</strong></td>
                                    <td>: RAK-A01</td>
                                </tr>
                                <tr>
                                    <td><strong>Ruangan</strong></td>
                                    <td>: Ruang Server Lt. 3</td>
                                </tr>
                                <tr>
                                    <td><strong>Kapasitas</strong></td>
                                    <td>: 42U</td>
                                </tr>
                                <tr>
                                    <td><strong>Terpakai</strong></td>
                                    <td>: 25U (60%)</td>
                                </tr>
                                <tr>
                                    <td><strong>Sisa</strong></td>
                                    <td>: 17U (40%)</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Server di Rak Ini</h6>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>SERVER-WEB-01</span>
                                    <span class="badge bg-primary">2U</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>SERVER-DB-01</span>
                                    <span class="badge bg-primary">4U</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>SERVER-APP-01</span>
                                    <span class="badge bg-primary">3U</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>SERVER-FILE-01</span>
                                    <span class="badge bg-primary">2U</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>SERVER-BACKUP-01</span>
                                    <span class="badge bg-primary">4U</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                    <p>Apakah Anda yakin ingin menghapus rak server ini?</p>
                    <p class="text-danger"><i class="bi bi-info-circle"></i> Pastikan tidak ada server yang terpasang di rak ini!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-danger-custom" onclick="hapusData()">
                        <i class="bi bi-trash"></i> Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });

        function detailRak(id) {
            new bootstrap.Modal(document.getElementById('modalDetail')).show();
        }

        function editData(id) {
            document.getElementById('editNomor').value = 'RAK-A01';
            document.getElementById('editRuangan').value = 'Ruang Server Lt. 3';
            document.getElementById('editKapasitas').value = '42';
            document.getElementById('editKeterangan').value = '';
            new bootstrap.Modal(document.getElementById('modalEdit')).show();
        }

        let deleteId = null;
        function confirmDelete(id) {
            deleteId = id;
            new bootstrap.Modal(document.getElementById('modalDelete')).show();
        }

        function simpanData() {
            let form = document.getElementById('formTambah');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            showAlert('Data rak server berhasil ditambahkan!');
            bootstrap.Modal.getInstance(document.getElementById('modalTambah')).hide();
            form.reset();
        }

        function updateData() {
            let form = document.getElementById('formEdit');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            showAlert('Data rak server berhasil diupdate!');
            bootstrap.Modal.getInstance(document.getElementById('modalEdit')).hide();
        }

        function hapusData() {
            showAlert('Data rak server berhasil dihapus!');
            bootstrap.Modal.getInstance(document.getElementById('modalDelete')).hide();
        }

        function showAlert(message) {
            let alert = document.getElementById('successAlert');
            document.getElementById('successMessage').textContent = message;
            alert.style.display = 'flex';
            setTimeout(() => { alert.style.display = 'none'; }, 3000);
        }
    </script>
</body>
</html>