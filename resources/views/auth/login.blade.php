<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - SIMASTER</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #660708 0%, #7a0a0a 50%, #9b111e 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .login-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }
        
        .login-header {
            background: linear-gradient(135deg, #660708 0%, #9b111e 100%);
            padding: 60px 30px 45px;
            text-align: center;
            color: white;
        }
        
        .logo-container {
            width: 130px;
            height: 130px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-container img {
            width: 120px;
            height: 120px;
            object-fit: contain;
        }
        
        .login-header h1 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }
        
        .login-header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .login-body {
            padding: 45px 35px;
        }
        
        .welcome-text {
            text-align: center;
            margin-bottom: 35px;
        }
        
        .welcome-text h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 8px;
        }
        
        .welcome-text p {
            color: #666;
            font-size: 14px;
        }
        
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-danger {
            background-color: #fee;
            border: 1px solid #fcc;
            color: #c33;
        }
        
        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .alert-icon {
            font-size: 18px;
        }
        
        .form-group {
            margin-bottom: 28px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #660708;
            font-size: 18px;
        }
        
        .form-group input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #660708;
            box-shadow: 0 0 0 3px rgba(102, 7, 8, 0.15);
        }
        
        .form-group input.is-invalid {
            border-color: #dc3545;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .remember-me label {
            font-size: 14px;
            color: #666;
            cursor: pointer;
            margin: 0;
        }
        
        .forgot-password {
            color: #660708;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #660708 0%, #9b111e 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 7, 8, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 7, 8, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            padding: 25px 30px;
            background: #f8f9fa;
            color: #666;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-header">
            <div class="logo-container">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" onerror="this.style.display='none'">
            </div>
            <h1>SIMASTER</h1>
            <p>Sistem Informasi Manajemen Aset Terpadu</p>
        </div>

        <div class="login-body">
            <div class="welcome-text">
                <h2>Selamat Datang</h2>
                <p>Silakan masuk untuk melanjutkan</p>
            </div>

            @if(session('status'))
                <div class="alert alert-success">
                    <span class="alert-icon">✓</span>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if($errors->has('username') || $errors->has('password') || $errors->has('role'))
                <div class="alert alert-danger">
                    <span class="alert-icon">⚠</span>
                    <span>
                        @if($errors->has('username'))
                            {{ $errors->first('username') }}
                        @elseif($errors->has('password'))
                            {{ $errors->first('password') }}
                        @elseif($errors->has('role'))
                            {{ $errors->first('role') }}
                        @endif
                    </span>
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" autocomplete="off">
                @csrf
                
                <div class="form-group">
                    <label for="username">Username / Email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            value="{{ old('username') }}" 
                            placeholder="Masukkan username"
                            required 
                            autofocus
                            class="@error('username') is-invalid @enderror"
                        >
                    </div>
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password"
                            required
                            class="@error('password') is-invalid @enderror"
                        >
                    </div>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat Saya</label>
                    </div>
                    <a href="#" class="forgot-password">Lupa Password?</a>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>
        </div>

        <div class="login-footer">
            © 2024 SIMASTER. All rights reserved.
        </div>
    </div>
</body>
</html>
