<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Gallery</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            min-height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px; 
        }

        .register-container {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 450px;
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

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 6px;
            margin-left: 4px;
        }

        input, textarea {
            width: 100%;
            padding: 12px 16px;
            background-color: #f7fafc;
            border: 1px solid #edf2f7;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #4a5568;
            transition: all 0.2s ease-in-out;
            box-sizing: border-box;
            outline: none;
            font-family: inherit;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input:focus, textarea:focus {
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

        .footer-text {
            margin-top: 1.5rem;
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

<div class="register-container">
    <h2>Buat Akun</h2>
    <p class="subtitle">Bergabunglah dengan komunitas Gallery kami</p>

    <form action="/register" method="POST">
        @csrf

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="contoh@mail.com" required>
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama lengkap Anda" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" placeholder="Alamat lengkap saat ini"></textarea>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 8 karakter" required>
        </div>

        <button type="submit">Daftar Sekarang</button>
    </form>
    
    <p class="footer-text">Sudah punya akun? <a href="/login">Login di sini</a></p>
</div>

</body>
</html>