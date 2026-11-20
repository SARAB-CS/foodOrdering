<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول | SAKURA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#20201e; --paper:#f7f3ea; --red:#b92b21; --cream:#fffdf8; --gold:#c49a4a; --muted:#777268; }
        * { box-sizing:border-box; margin:0; padding:0; }
        body { min-height:100vh; display:grid; grid-template-columns:minmax(320px,.85fr) 1.15fr; background:var(--paper); color:var(--ink); font-family:'Noto Naskh Arabic','Outfit',sans-serif; }
        .brand-panel { min-height:100vh; display:flex; flex-direction:column; justify-content:center; padding:56px; background:var(--ink); color:#fff; position:relative; overflow:hidden; }
        .brand-panel::after { content:'桜'; position:absolute; width:280px; height:280px; left:-85px; bottom:-100px; display:grid; place-items:center; border-radius:50%; background:var(--red); color:rgba(255,255,255,.9); font-family:'Outfit',sans-serif; font-size:92px; }
        .brand { position:absolute; top:36px; right:56px; color:#fff; text-decoration:none; font-family:'Outfit',sans-serif; font-size:22px; font-weight:700; letter-spacing:4px; }
        .brand span { color:#df4a40; }
        .brand-copy { position:relative; z-index:2; max-width:430px; }
        .brand-copy .eyebrow { color:#d6bc83; font-family:'Outfit',sans-serif; font-size:12px; letter-spacing:.2em; }
        .brand-copy h1 { margin:12px 0; font-size:48px; line-height:1.35; }
        .brand-copy p { color:#d0cabb; font-size:17px; }
        .main { display:flex; align-items:center; justify-content:center; padding:40px 24px; }
        .card { width:min(440px,100%); }
        .card h2 { font-size:38px; line-height:1.3; }
        .subtitle { margin:8px 0 26px; color:var(--muted); }
        .alert { margin-bottom:16px; padding:10px 14px; border-right:4px solid var(--red); border-radius:8px; background:#faeae7; color:#812019; }
        .status { margin-bottom:16px; padding:10px 14px; border-right:4px solid #6b7f4e; border-radius:8px; background:#edf1e7; color:#4b5c32; }
        label { display:block; margin:14px 0 6px; font-weight:700; }
        label span { color:var(--muted); font-family:'Outfit',sans-serif; font-size:12px; font-weight:400; direction:ltr; }
        input[type=email], input[type=password] { width:100%; height:52px; border:1px solid #dcd3c2; border-radius:10px; background:var(--cream); padding:0 14px; color:var(--ink); font-family:inherit; font-size:16px; }
        input:focus { outline:none; border-color:var(--red); box-shadow:0 0 0 3px rgba(185,43,33,.10); }
        .remember { display:flex; align-items:center; gap:8px; margin:16px 0; font-weight:400; }
        .remember input { width:16px; height:16px; accent-color:var(--red); }
        .btn { width:100%; height:52px; border:0; border-radius:999px; background:var(--red); color:#fff; cursor:pointer; font-family:inherit; font-size:17px; font-weight:700; }
        .links { display:flex; align-items:center; justify-content:space-between; gap:14px; margin-top:18px; font-size:14px; }
        .links a { color:var(--red); text-decoration:none; font-weight:700; }
        .back { display:inline-block; margin-top:24px; color:var(--muted); text-decoration:none; }
        @media (max-width:820px) { body { grid-template-columns:1fr; } .brand-panel { min-height:230px; padding:40px 24px; } .brand { top:24px; right:24px; } .brand-copy h1 { font-size:34px; } .brand-panel::after { width:170px; height:170px; left:-45px; bottom:-70px; font-size:58px; } .main { padding:48px 20px; } }
    </style>
</head>
<body>
    <aside class="brand-panel">
        <a class="brand" href="{{ route('home') }}">SAKURA <span>桜</span></a>
        <div class="brand-copy">
            <div class="eyebrow">WELCOME BACK</div>
            <h1>مرحبًا بعودتك</h1>
            <p>تابع طلبك واستمتع بتجربة ساكورا التي تعرفها وتحبها.</p>
        </div>
    </aside>
    <main class="main">
        <div class="card">
            <h2>تسجيل الدخول</h2>
            <p class="subtitle">Login to your Sakura account</p>
            @if (session('status')) <div class="status">{{ session('status') }}</div> @endif
            @if ($errors->any())
                <div class="alert">@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
            @endif
            <form method="POST" action="{{ Route::has('login.store') ? route('login.store') : url('/login') }}">
                @csrf
                <label for="email">البريد الإلكتروني <span>Email</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                <label for="password">كلمة المرور <span>Password</span></label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
                <label class="remember"><input type="checkbox" name="remember" value="1"> تذكرني <span>Remember me</span></label>
                <button type="submit" class="btn">دخول | Login</button>
            </form>
            <div class="links">
                @if (Route::has('password.request')) <a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a> @endif
                <a href="{{ route('register') }}">إنشاء حساب جديد</a>
            </div>
            <a class="back" href="{{ route('home') }}">← العودة للرئيسية</a>
        </div>
    </main>
</body>
</html>
