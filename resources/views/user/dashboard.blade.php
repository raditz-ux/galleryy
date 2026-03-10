<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore | Minimal Studio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --danger: #ef4444;
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
            padding: 0;
            line-height: 1.5;
        }

        nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo { font-size: 1.25rem; font-weight: 700; color: var(--text-main); text-decoration: none; letter-spacing: -0.5px; }
        .btn-logout { text-decoration: none; color: var(--danger); font-weight: 600; font-size: 0.875rem; transition: 0.2s; }
        .btn-logout:hover { opacity: 0.7; }

        .container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .foto-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            margin-bottom: 3rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
        }

        .foto-header { 
            padding: 1rem 1.25rem; 
            display: flex; 
            align-items: center; 
        }
        .foto-header h3 { 
            margin: 0; 
            font-size: 0.95rem; 
            font-weight: 700; 
            color: var(--text-main);
        }

        .foto-main img {
            width: 100%;
            display: block;
            background-color: #f1f5f9;
        }

        .foto-info { padding: 1.25rem; }

        .like-section {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 0.75rem;
        }
        
        .btn-like { 
            background: none; 
            border: none; 
            padding: 0; 
            cursor: pointer; 
            font-size: 1.5rem;
            transition: transform 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .btn-like:hover { transform: scale(1.2); }
        
        .jumlah-like { font-size: 0.875rem; font-weight: 700; color: var(--text-main); }

        .deskripsi { 
            font-size: 0.875rem; 
            line-height: 1.6; 
            color: var(--text-main);
        }
        .deskripsi strong { font-weight: 700; margin-right: 6px; }

        .komentar-box {
            border-top: 1px solid #f1f5f9;
            padding: 1.25rem;
            background: #fcfcfc;
        }
        .komentar-box b { font-size: 0.8rem; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.5px; }

        .komentar-list { 
            max-height: 120px; 
            overflow-y: auto; 
            margin: 0.75rem 0; 
        }
        .komentar-item { 
            font-size: 0.813rem; 
            margin-bottom: 0.5rem; 
            line-height: 1.4; 
        }
        .komentar-item strong { color: var(--text-main); font-weight: 600; }

        .form-komentar {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            background: #fff;
            border-top: 1px solid #f1f5f9;
            gap: 10px;
        }

        .form-komentar input { 
            flex: 1; 
            border: none; 
            outline: none; 
            font-size: 0.875rem; 
            padding: 0.5rem 0;
            background: transparent; 
        }
        .form-komentar button { 
            background: none; 
            border: none; 
            color: var(--primary); 
            font-weight: 700; 
            font-size: 0.875rem;
            cursor: pointer; 
            transition: 0.2s;
        }
        .form-komentar button:hover { opacity: 0.7; }

        .empty-msg { color: #cbd5e1; font-size: 0.75rem; font-style: italic; margin-top: 5px; }
    </style>
</head>
<body>

<nav>
    <a href="/dashboard" class="logo">STUDIO.</a>
    <a href="/logout" class="btn-logout">Keluar</a>
</nav>

<div class="container">
    @foreach($foto as $f)
    <div class="foto-card">
        <div class="foto-header">
            <h3>{{ $f->JudulFoto }}</h3>
        </div>

        <div class="foto-main">
            <img src="/foto/{{ $f->LokasiFile }}" alt="{{ $f->JudulFoto }}">
        </div>

        <div class="foto-info">
            <div class="like-section">
                @php
                    $sudahLike = $f->like->where('UserID', session('UserID'))->count();
                @endphp

                <form action="/like/{{ $f->FotoID }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-like">
                        {{ $sudahLike ? '❤️' : '🤍' }}
                    </button>
                </form>
                
                <span class="jumlah-like">
                    {{ $f->like->count() }} suka
                </span>
            </div>

            <div class="deskripsi">
                <strong>Admin</strong> {{ $f->DeskripsiFoto }}
            </div>
        </div>

        <div class="komentar-box">
            <b>Diskusi</b>
            <div class="komentar-list">
                @forelse($f->komentar as $k)
                    <div class="komentar-item">
                        <strong>{{ $k->user->Username ?? 'User' }}</strong> {{ $k->IsiKomentar }}
                    </div>
                @empty
                    <p class="empty-msg">Belum ada komentar.</p>
                @endforelse
            </div>
        </div>

        <form action="/komentar/{{ $f->FotoID }}" method="POST" class="form-komentar">
            @csrf
            <input type="text" name="komentar" placeholder="Tambahkan komentar..." required>
            <button type="submit">Posting</button>
        </form>
    </div>
    @endforeach
</div>

</body>
</html>