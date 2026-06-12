<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion Admin — ADéProG</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root { --accent: #e8630a; --bg: #0f1117; --surface: #1a1d27; --border: #2e3347; --text: #e2e8f0; --muted: #8892a4; }
        body { font-family: system-ui, sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1rem; }
        .login-box { width: 100%; max-width: 400px; background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 2.5rem 2rem; }
        .login-logo { text-align: center; margin-bottom: 1.75rem; }
        .login-logo img { width: 56px; height: 56px; border-radius: 50%; object-fit: cover; }
        .login-logo h1 { margin-top: .75rem; font-size: 1.2rem; font-weight: 700; }
        .login-logo p { font-size: .8rem; color: var(--muted); margin-top: .25rem; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-size: .8rem; color: var(--muted); margin-bottom: .4rem; }
        .form-control { width: 100%; background: #0f1117; border: 1px solid var(--border); color: var(--text); border-radius: 8px; padding: .65rem .9rem; font-size: .9rem; transition: border-color .15s; }
        .form-control:focus { outline: none; border-color: var(--accent); }
        .btn-login { width: 100%; background: var(--accent); color: #fff; border: none; border-radius: 8px; padding: .75rem; font-size: .95rem; font-weight: 600; cursor: pointer; margin-top: .5rem; transition: opacity .15s; }
        .btn-login:hover { opacity: .88; }
        .form-check { display: flex; align-items: center; gap: .5rem; font-size: .825rem; color: var(--muted); margin-bottom: .75rem; }
        .form-check input { accent-color: var(--accent); }
        .error-msg { background: rgba(239,68,68,.12); border: 1px solid rgba(239,68,68,.3); border-radius: 8px; padding: .6rem .9rem; font-size: .825rem; color: #fca5a5; margin-bottom: 1rem; }
        .back-link { text-align: center; margin-top: 1.25rem; font-size: .8rem; }
        .back-link a { color: var(--muted); text-decoration: none; }
        .back-link a:hover { color: var(--accent); }
    </style>
</head>
<body>
<div class="login-box">
    <div class="login-logo">
        <img src="{{ asset(config('site.images.logo')) }}" alt="ADéProG" />
        <h1>ADéProG — Admin</h1>
        <p>Accès réservé aux administrateurs</p>
    </div>

    @if($errors->any())
        <div class="error-msg">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input id="email" name="email" type="email" class="form-control"
                   value="{{ old('email') }}" required autofocus />
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input id="password" name="password" type="password" class="form-control" required />
        </div>
        <div class="form-check">
            <input id="remember" name="remember" type="checkbox" />
            <label for="remember">Se souvenir de moi</label>
        </div>
        <button type="submit" class="btn-login">Se connecter</button>
    </form>

    <div class="back-link"><a href="{{ route('home') }}">← Retour au site</a></div>
</div>
</body>
</html>
