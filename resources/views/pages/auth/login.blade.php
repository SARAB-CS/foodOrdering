<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>دخول | Login - SAKURA</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Noto+Naskh+Arabic:wght@400;500;700&family=Shippori+Mincho:wght@500;700;800&display=swap" rel="stylesheet">

<style>
/* ============ الألوان اليابانية ============ */
:root {
    --washi:#F5EFE6; --paper:#FBF7F0; --sumi:#1C1C1C; --torii:#B3261E;
    --beni:#8E1B16; --matcha:#6B7F4E; --gold:#B8934A; --muted:#7A6F64;
}
* { margin:0; padding:0; box-sizing:border-box; }
body {
    min-height:100vh;
    display:grid; grid-template-columns:1fr 1fr;
    background:var(--washi); color:var(--sumi);
    font-family:'Noto Naskh Arabic','Shippori Mincho',serif;
    font-size:17px; line-height:1.9;
}
.en { font-family:'Shippori Mincho',serif; letter-spacing:.06em; }

/* ===== الجانب الياباني (الشمس الحمراء + الشعار) ===== */
.side {
    position:relative; overflow:hidden;
    display:flex; flex-direction:column; align-items:center; justify-content:center;
    text-align:center; padding:50px 30px; color:var(--washi);
    background:
        repeating-radial-gradient(circle at 50% 100%, transparent 0 18px, rgba(184,147,74,.10) 18px 20px),
        linear-gradient(180deg,#1C1C1C 0%,#2B1B19 60%,#3A1B18 100%);
    border-left:4px solid var(--gold);
}
.side::before {
    content:""; position:absolute; width:280px; height:280px; border-radius:50%;
    background:radial-gradient(circle,var(--torii),var(--beni));
    top:50%; left:50%; transform:translate(-50%,-55%);
    opacity:.85; box-shadow:0 0 90px rgba(179,38,30,.45);
}
.side > * { position:relative; }
.side .jp { font-family:'Shippori Mincho',serif; color:var(--gold); letter-spacing:10px; font-size:20px; }
.side h1 {
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:62px;
    letter-spacing:8px; line-height:1.2; text-shadow:0 3px 20px rgba(0,0,0,.6);
}
.side p { font-size:19px; text-shadow:0 2px 12px rgba(0,0,0,.7); }
.side .en-line { font-family:'Shippori Mincho',serif; color:#E8DCC8; font-size:15px; }

/* ===== بطاقة النموذج ===== */
.main { display:flex; align-items:center; justify-content:center; padding:40px 24px; }
.form-card {
    width:100%; max-width:440px;
    background:var(--paper); border:1px solid rgba(184,147,74,.55);
    border-top:5px solid var(--torii); border-radius:4px;
    box-shadow:8px 8px 0 rgba(28,28,28,.10); padding:34px 32px;
}
.form-card h2 { font-family:'Aref Ruqaa',serif; font-size:40px; color:var(--torii); line-height:1.4; }
.form-card h2 .en { font-size:20px; color:var(--sumi); }
.sub { color:var(--muted); margin-bottom:18px; }
.divider { height:2px; border:0; margin:10px 0 20px; background:linear-gradient(90deg,var(--gold),transparent); }

label { display:block; font-weight:700; margin-top:14px; }
label .en { font-weight:500; color:var(--muted); font-size:14px; }
input[type=text], input[type=email], input[type=password] {
    width:100%; margin-top:4px; padding:10px 14px;
    background:#fff; border:1px solid var(--gold); border-radius:2px;
    font-family:inherit; font-size:17px; color:var(--sumi); transition:.25s;
}
input:focus { outline:none; border-color:var(--torii); box-shadow:0 0 0 3px rgba(179,38,30,.15); }

.remember { display:flex; align-items:center; gap:8px; margin-top:14px; font-weight:400; }
.remember input { accent-color:var(--torii); width:17px; height:17px; }

.btn {
    width:100%; margin-top:22px; padding:12px;
    background:var(--torii); color:#fff; border:1px solid var(--gold); border-radius:2px;
    font-family:'Aref Ruqaa',serif; font-size:21px; cursor:pointer; transition:.3s;
}
.btn:hover { background:var(--gold); color:var(--sumi); }

.links { margin-top:18px; text-align:center; font-size:16px; }
.links a { color:var(--torii); text-decoration:none; border-bottom:1px solid var(--torii); }
.links a:hover { color:var(--beni); }
.links .row { margin-top:6px; }
.back { display:inline-block; margin-top:16px; color:var(--muted); font-size:14px; text-decoration:none; }
.back:hover { color:var(--torii); }

.alert {
    background:#FBE9E7; border:1px solid var(--torii); border-right:5px solid var(--torii);
    color:var(--beni); padding:8px 14px; margin-bottom:12px; border-radius:2px; font-size:15px;
}
.status {
    background:#EEF3E6; border:1px solid var(--matcha); border-right:5px solid var(--matcha);
    color:#44552C; padding:8px 14px; margin-bottom:12px; border-radius:2px; font-size:15px;
}

/* ===== الجوال ===== */
@media (max-width:820px) {
    body { grid-template-columns:1fr; }
    .side { padding:34px 20px; border-left:0; border-bottom:4px solid var(--gold); }
    .side::before { width:170px; height:170px; }
    .side h1 { font-size:42px; }
    .side p, .side .en-line { font-size:15px; }
    .form-card { padding:26px 20px; }
}
</style>
</head>

<body>

{{-- ===== الجانب الياباني ===== --}}
<div class="side">
    <div class="jp">さくら</div>
    <h1>SAKURA 桜</h1>
    <p>أصالة المطبخ الياباني على مائدتك</p>
    <div class="en-line">Authentic Japanese cuisine at your table</div>
</div>

<div class="main">
<div class="form-card">

    <h2>تسجيل الدخول <span class="en">| Login</span></h2>
    <p class="sub">أهلًا بعودتك | Welcome back</p>
    <hr class="divider">

    @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    {{-- رسائل الأخطاء: تظهر تلقائي إذا البيانات غلط --}}
    @if ($errors->any())
        <div class="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- النموذج: الأسماء email و password هي اللي يقرأها Laravel --}}
    <form method="POST" action="{{ Route::has('login.store') ? route('login.store') : url('/login') }}">
        @csrf

        <label for="email">البريد الإلكتروني <span class="en">Email</span></label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">

        <label for="password">كلمة المرور <span class="en">Password</span></label>
        <input type="password" id="password" name="password" required autocomplete="current-password">

        <label class="remember">
            <input type="checkbox" name="remember" value="1"> تذكرني <span class="en">Remember me</span>
        </label>

        <button type="submit" class="btn">دخول | Login</button>
    </form>

    <div class="links">
        @if (Route::has('password.request'))
<div class="row"><a href="{{ route('password.request') }}">نسيت كلمة المرور؟ | <span dir="ltr">Forgot password?</span></a></div>
        @endif
        <div class="row">ما عندك حساب؟ <a href="{{ route('register') }}">سجّل الآن | Register</a></div>
    </div>

    <a href="{{ url('/') }}" class="back">← الرجوع للرئيسية | Back to Home</a>

</div>
</div>

</body>
</html>
