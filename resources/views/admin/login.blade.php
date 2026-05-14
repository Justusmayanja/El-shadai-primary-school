<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <style>
    body { font-family: ui-sans-serif, system-ui, sans-serif; background: linear-gradient(160deg, #0f172a 0%, #1e293b 100%); color: #f8fafc; min-height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0; padding: 1rem; }
    .box { background: rgba(30, 41, 59, 0.85); padding: 2rem; border-radius: 14px; width: 100%; max-width: 400px; border: 1px solid #334155; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35); }
    label { display: block; margin-top: 1rem; font-size: 0.875rem; font-weight: 500; color: #cbd5e1; }
    input { width: 100%; margin-top: 0.35rem; padding: 0.6rem 0.75rem; border-radius: 8px; border: 1px solid #475569; background: #0f172a; color: #f8fafc; font: inherit; box-sizing: border-box; transition: border-color 0.15s, box-shadow 0.15s; }
    input:focus { outline: none; border-color: #0ea5e9; box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.25); }
    button { width: 100%; margin-top: 1.25rem; padding: 0.65rem; border: none; border-radius: 8px; background: #0ea5e9; color: #fff; font: inherit; cursor: pointer; font-weight: 600; transition: background 0.15s; }
    button:hover { background: #0284c7; }
    .err { color: #fca5a5; font-size: 0.875rem; margin-top: 0.5rem; }
    a { color: #7dd3fc; }
  </style>
</head>
<body>
  <div class="box">
    <h1 style="margin:0 0 0.5rem;font-size:1.25rem;font-weight:800;letter-spacing:-0.02em;">{{ config('app.name') }}</h1>
    <p class="muted" style="margin:0;color:#a1a1aa;font-size:0.875rem;">Sign in to manage content and enquiries.</p>
    <form method="post" action="{{ route('admin.login.store') }}">
      @csrf
      <label for="email">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
      @error('email')
        <p class="err">{{ $message }}</p>
      @enderror
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required autocomplete="current-password">
      <label style="display:flex;align-items:center;gap:0.5rem;margin-top:0.75rem;">
        <input type="checkbox" name="remember" value="1" style="width:auto;">
        Remember me
      </label>
      <button type="submit">Log in</button>
    </form>
    <p style="margin-top:1.5rem;font-size:0.8rem;color:#71717a;"><a href="{{ route('home') }}">← Back to website</a></p>
  </div>
</body>
</html>
