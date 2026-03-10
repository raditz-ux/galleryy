<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Gallery - Soft Edition</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #ffffff;
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
            text-align: center;
            border: 1px solid #f0f0f0;
        }

        h2 {
            color: #2d3436;
            margin-bottom: 0.5rem;
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: #a0aec0;
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 14px 20px;
            background-color: #f7fafc;
            border: 1px solid #edf2f7;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #4a5568;
            transition: all 0.2s ease-in-out;
            box-sizing: border-box;
            outline: none;
        }

        input:focus {
            background-color: #fff;
            border-color: #cbd5e0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        button {
            width: 100%;
            background-color: #2d3436; 
            color: white;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
            margin-top: 1rem;
        }

        button:hover {
            background-color: #000;
            transform: translateY(-1px);
        }

        button:active {
            transform: translateY(0);
        }

        .alert {
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
        }

        .error-msg {
            background-color: #fff5f5;
            color: #c53030;
        }

        .success-msg {
            background-color: #f0fff4;
            color: #2f855a;
        }

        .footer-text {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: #718096;
        }

        a {
            color: #2d3748;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 2px solid #e2e8f0;
            transition: all 0.2s;
        }

        a:hover {
            border-bottom-color: #2d3436;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Selamat Datang</h2>
    <p class="subtitle">Silahkan masuk ke akun Gallery Anda</p>

    @if(session('error'))
        <div class="alert error-msg">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert success-msg">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">Masuk</button>
    </form>
    
    <p class="footer-text">Belum punya akun? <a href="/register">Buat Akun</a></p>
</div>

</body>
</html>