<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload | Minimal Studio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background: var(--card-bg);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.03);
            border: 1px solid var(--border);
        }

        h2 {
            margin-top: 0;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.5px;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-main);
            font-size: 0.875rem;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 14px 16px;
            background-color: #f1f5f9;
            border: 1px solid transparent;
            border-radius: 12px;
            box-sizing: border-box;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.2s;
            color: var(--text-main);
        }

        input[type="text"]:focus,
        textarea:focus {
            background-color: #fff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        textarea {
            height: 120px;
            resize: none;
        }

        input[type="file"] {
            padding: 10px;
            font-size: 0.8rem;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background: var(--text-main);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            margin-right: 10px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: 0.2s;
        }

        input[type="file"]::file-selector-button:hover {
            background: #000;
        }

        .btn-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 14px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            font-size: 1rem;
            transition: all 0.2s ease;
            margin-top: 10px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
        }

        .btn-back {
            display: block;
            margin-top: 24px;
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: var(--text-main);
        }

        .file-hint {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 8px;
            line-height: 1.4;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>📸 Bagikan Karya</h2>

    <form action="/admin/simpan" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Judul Karya</label>
            <input type="text" name="judul" placeholder="Beri judul yang menarik..." required>
        </div>

        <div class="form-group">
            <label>Deskripsi Cerita</label>
            <textarea name="deskripsi" placeholder="Tuliskan cerita singkat atau latar belakang foto ini..." required></textarea>
        </div>

        <div class="form-group">
            <label>Visual Utama</label>
            <input type="file" name="foto" accept="image/*" required>
            <div class="file-hint">Format: JPG, PNG, atau JPEG. Maksimal 2MB.</div>
        </div>

        <button type="submit" class="btn-submit">Terbitkan Sekarang</button>
    </form>

    <a href="/admin" class="btn-back">← Kembali ke Dashboard</a>
</div>

</body>
</html>