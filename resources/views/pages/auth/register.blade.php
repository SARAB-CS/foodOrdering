<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب | SAKURA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#20201e; --paper:#f7f3ea; --red:#b92b21; --cream:#fffdf8; --muted:#777268; }
        * { box-sizing:border-box; margin:0; padding:0; }
        body { min-height:100vh; display:grid; grid-template-columns:minmax(320px,.85fr) 1.15fr; background:var(--paper); color:var(--ink); font-family:'Noto Naskh Arabic','Outfit',sans-serif; }
        .brand-panel { min-height:100vh; display:flex; flex-direction:column; justify-content:center; padding:56px; background:var(--ink); color:#fff; position:relative; overflow:hidden; }
        .brand-panel::after { content:'SAKURA'; position:absolute; width:320px; height:320px; left:-140px; bottom:-130px; display:grid; place-items:center; border-radius:50%; background:var(--red); color:rgba(255,255,255,.9); font-family:'Outfit',sans-serif; font-size:34px; letter-spacing:5px; }
        .brand { position:absolute; top:36px; right:56px; color:#fff; text-decoration:none; font-family:'Outfit',sans-serif; font-size:22px; font-weight:700; letter-spacing:4px; }
        .brand span { color:#df4a40; }
        .brand-copy { position:relative; z-index:2; max-width:430px; }
        .eyebrow { color:#d6bc83; font-family:'Outfit',sans-serif; font-size:12px; letter-spacing:.2em; }
        .brand-copy h1 { margin:12px 0; font-size:48px; line-height:1.35; }
        .brand-copy p { color:#d0cabb; font-size:17px; }
        .main { display:flex; align-items:center; justify-content:center; padding:40px 24px; }
        .card { width:min(440px,100%); }
        .card h2 { font-size:38px; line-height:1.3; }
        .subtitle { margin:8px 0 22px; color:var(--muted); }
        .alert { margin-bottom:14px; padding:10px 14px; border-right:4px solid var(--red); border-radius:8px; background:#faeae7; color:#812019; }
        label { display:block; margin:11px 0 5px; font-weight:700; }
        label span { color:var(--muted); font-family:'Outfit',sans-serif; font-size:12px; font-weight:400; direction:ltr; }
        input { width:100%; height:50px; border:1px solid #dcd3c2; border-radius:10px; background:var(--cream); padding:0 14px; color:var(--ink); font-family:inherit; font-size:16px; }
        input:focus { outline:none; border-color:var(--red); box-shadow:0 0 0 3px rgba(185,43,33,.10); }
        .btn { width:100%; height:52px; margin-top:18px; border:0; border-radius:999px; background:var(--red); color:#fff; cursor:pointer; font-family:inherit; font-size:17px; font-weight:700; }
        .links { margin-top:16px; text-align:center; font-size:14px; }
        .links a { color:var(--red); text-decoration:none; font-weight:700; }
        .back { display:inline-block; margin-top:18px; color:var(--muted); text-decoration:none; }
        @media (max-width:820px) { body { grid-template-columns:1fr; } .brand-panel { min-height:220px; padding:40px 24px; } .brand { top:24px; right:24px; } .brand-copy h1 { font-size:34px; } .brand-panel::after { width:170px; height:170px; left:-70px; bottom:-80px; font-size:18px; } .main { padding:42px 20px; } }
    </style>
</head>
<body>
    <aside class="brand-panel">
        <a class="brand" href="{{ route('home') }}">SAKURA <span>桜</span></a>
        <div class="brand-copy">
            <div class="eyebrow">JOIN SAKURA</div>
            <h1>انضم لعائلة ساكورا</h1>
            <p>أنشئ حسابك واحصل على تجربة طلب أسهل وأسرع.</p>
        </div>
    </aside>
    <main class="main">
        <div class="card">
            <h2>إنشاء حساب</h2>
            <p class="subtitle">Create your Sakura account</p>
            @if ($errors->any())
                <div class="alert">@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
            @endif
            <form method="POST" action="{{ Route::has('register.store') ? route('register.store') : url('/register') }}">
                @csrf
                <label for="name">الاسم <span>Name</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                <label for="email">البريد الإلكتروني <span>Email</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="password">كلمة المرور <span>Password</span></label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
                <label for="password_confirmation">تأكيد كلمة المرور <span>Confirm Password</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                <button type="submit" class="btn">إنشاء الحساب | Register</button>
            </form>
            <div class="links">لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></div>
            <a class="back" href="{{ route('home') }}">← العودة للرئيسية</a>
        </div>
    </main>
</body>
</html>
