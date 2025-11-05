<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin Bidang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #660708;
            margin-bottom: 30px;
        }
        h1 {
            color: #660708;
            font-size: 28px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-details {
            text-align: right;
        }
        .user-name {
            font-weight: 600;
            color: #333;
        }
        .user-role {
            font-size: 14px;
            color: #666;
            background: #660708;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 4px;
        }
        .btn-logout {
            background: #660708;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: #A4161A;
            transform: translateY(-2px);
        }
        .content {
            padding: 20px 0;
        }
        .welcome-box {
            background: linear-gradient(135deg, #660708 0%, #A4161A 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .welcome-box h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .bidang-info {
            background: rgba(255,255,255,0.2);
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .stat-card {
            background: white;
            border: 2px solid #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .stat-card h3 {
            color: #660708;
            font-size: 36px;
            margin-bottom: 10px;
        }
        .stat-card p {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📂 Dashboard Admin Bidang</h1>
            <div class="user-info">
                <div class="user-details">
                    <div class="user-name">{{ Auth::user()->nama_lengkap }}</div>
                    <span class="user-role">{{ strtoupper(Auth::user()->role) }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>

        <div class="content">
            <div class="welcome-box">
                <h2>👋 Selamat Datang, {{ Auth::user()->nama_lengkap }}!</h2>
                <p>Anda login sebagai <strong>Admin Bidang</strong></p>
                <div class="bidang-info">
                    <strong>Bidang Anda:</strong> {{ Auth::user()->bidang ? Auth::user()->bidang->nama_bidang : '-' }}
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3>-</h3>
                    <p>Server Bidang Anda</p>
                </div>
                <div class="stat-card">
                    <h3>-</h3>
                    <p>Website Bidang Anda</p>
                </div>
                <div class="stat-card">
                    <h3>-</h3>
                    <p>Pemeliharaan Bulan Ini</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>