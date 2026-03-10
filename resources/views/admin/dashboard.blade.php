<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Minimal Studio</title>

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
            line-height: 1.5;
        }

        nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .logo { font-size: 1.25rem; font-weight: 700; color: var(--text-main); text-decoration: none; }
        .nav-links { display: flex; gap: 1.5rem; }
        .nav-links a { text-decoration: none; font-size: 0.85rem; font-weight: 700; }
        .btn-upload { color: var(--primary); }
        .btn-logout { color: var(--danger); }

        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }

        .alert {
            background: #f0fdf4; color: #166534; padding: 1rem 1.5rem;
            border-radius: 12px; margin-bottom: 2rem; font-size: 0.875rem; border: 1px solid #bbf7d0;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 2.5rem;
        }

        .card {
            background: var(--card-bg); border-radius: 24px; overflow: hidden;
            border: 1px solid var(--border); transition: 0.4s; display: flex; flex-direction: column;
        }

        .card:hover { transform: translateY(-10px); box-shadow: 0 20px 30px -10px rgba(0,0,0,0.08); }
        .img-wrapper { width: 100%; overflow: hidden; }
        .img-wrapper img { width: 100%; height: auto; display: block; transition: transform .5s ease; }
        .card:hover .img-wrapper img { transform: scale(1.05); }

        .card-content { padding: 1.5rem; }
        .card-content h3 { margin: 0; font-size: 1.15rem; font-weight: 700; }
        .card-content p { color: var(--text-muted); font-size: 0.9rem; margin: .6rem 0 1.25rem; }

        .interaction {
            display: flex; justify-content: space-between; align-items: center;
            padding-top: 1.25rem; border-top: 1px solid #f1f5f9;
        }

        .like-group { display: flex; align-items: center; gap: .6rem; }
        .btn-like { background: none; border: none; cursor: pointer; font-size: 1.5rem; }
        .count { font-size: .9rem; font-weight: 700; }

        .admin-actions { display: flex; gap: 1rem; }
        .admin-actions a { font-size: .7rem; font-weight: 800; text-decoration: none; }
        .edit { color: var(--text-muted); }
        .hapus { color: var(--danger); }

        /* KOMENTAR */
        .comment-section { background: #fcfcfc; padding: 1.25rem 1.5rem; border-top: 1px solid #f8fafc; }
        .comment-list { max-height: 100px; overflow-y: auto; margin-bottom: 1rem; }
        
        .comment-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: .5rem;
            font-size: .8rem;
            color: #475569;
        }
        
        .comment-item strong { color: var(--text-main); margin-right: 4px; }
        .btn-del-com { color: var(--danger); font-size: 11px; text-decoration: none; font-weight: 600; }

        /* FORM KOMENTAR */
        .form-comment { display: flex; gap: .75rem; }
        .form-comment input {
            flex: 1; background: #f1f5f9; border: none; padding: .75rem 1.25rem;
            border-radius: 99px; font-size: .85rem; outline: none;
        }
        .form-comment button {
            background: var(--primary); color: white; border: none;
            padding: .75rem 1.25rem; border-radius: 99px; font-weight: 700; cursor: pointer;
        }

        .empty-comments { color: #cbd5e1; font-style: italic; font-size: .75rem; }
    </style>
</head>

<body>

<nav>
    <a href="/dashboard" class="logo">STUDIO.</a>
    <div class="nav-links">
        <a href="/admin/tambah" class="btn-upload">UPLOAD</a>
        <a href="/logout" class="btn-logout" onclick="return confirm('Yakin ingin keluar?')">LOGOUT</a>
    </div>
</nav>

<div class="container">

    @if(session('success'))
    <div class="alert">
        ✨ {{ session('success') }}
    </div>
    @endif

    <div class="photo-grid">
        @foreach($foto as $f)
        <div class="card">
            <div class="img-wrapper">
                <img src="/foto/{{ $f->LokasiFile }}" alt="{{ $f->JudulFoto }}">
            </div>

            <div class="card-content">
                <h3>{{ $f->JudulFoto }}</h3>
                <p>{{ Str::limit($f->DeskripsiFoto, 85) }}</p>

                <div class="interaction">
                    <div class="like-group">
                        @php
                            $sudahLike = $f->like->where('UserID', session('UserID'))->count();
                        @endphp

                        <form action="/like/{{ $f->FotoID }}" method="POST">
                            @csrf
                            <button class="btn-like">
                                {{ $sudahLike ? '❤️' : '🤍' }}
                            </button>
                        </form>

                        <span class="count">{{ $f->like->count() }}</span>
                    </div>

                    <div class="admin-actions">
                        <a href="/admin/edit/{{ $f->FotoID }}" class="edit">Edit</a>
                        <a href="/admin/hapus/{{ $f->FotoID }}" class="hapus" onclick="return confirm('Hapus karya ini?')">Hapus</a>
                    </div>
                </div>
            </div>

            <div class="comment-section">
                <div class="comment-list">
                    @forelse($f->komentar as $k)
                    <div class="comment-item">
                        <span>
                            <strong>{{ $k->user->Username ?? 'User' }}</strong> {{ $k->IsiKomentar }}
                        </span>
                        
                        {{-- Tombol Hapus Komentar --}}
                        <a href="/admin/hapus-komentar/{{ $k->KomentarID }}" 
                           class="btn-del-com" 
                           onclick="return confirm('Hapus komentar ini?')">
                            hapus
                        </a>
                    </div>
                    @empty
                    <span class="empty-comments">Belum ada diskusi...</span>
                    @endforelse
                </div>

                <form action="/komentar/{{ $f->FotoID }}" method="POST" class="form-comment">
                    @csrf
                    <input type="text" name="komentar" placeholder="Tulis komentar..." required>
                    <button type="submit">Post</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>