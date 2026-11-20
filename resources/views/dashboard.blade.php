<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>حسابي | My Account - SAKURA</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Noto+Naskh+Arabic:wght@400;500;700&family=Shippori+Mincho:wght@500;700;800&display=swap" rel="stylesheet">

<style>
/* ============ الألوان اليابانية ============ */
:root {
    --washi:#F5EFE6; --paper:#FBF7F0; --sumi:#1C1C1C; --torii:#B3261E;
    --beni:#8E1B16; --matcha:#6B7F4E; --gold:#B8934A; --muted:#7A6F64;
}
* { margin:0; padding:0; box-sizing:border-box; }
html { scroll-behavior:smooth; }

body {
    background:
        radial-gradient(circle at 15% 10%, rgba(184,147,74,.08), transparent 40%),
        radial-gradient(circle at 85% 90%, rgba(179,38,30,.06), transparent 40%),
        var(--washi);
    color:var(--sumi);
    font-family:'Noto Naskh Arabic','Shippori Mincho',serif;
    font-size:17px; line-height:1.9;
}
.en { font-family:'Shippori Mincho',serif; letter-spacing:.06em; }

/* ============ الشريط العلوي ============ */
header {
    background:var(--sumi); border-bottom:3px solid var(--gold);
    padding:16px 8%; display:flex; justify-content:space-between; align-items:center;
    position:sticky; top:0; z-index:10;
}
.logo {
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:26px;
    letter-spacing:4px; color:var(--washi); text-decoration:none;
}
.logo span { color:var(--torii); margin-left:8px; }
nav { display:flex; gap:24px; align-items:center; }
nav a, nav button.link {
    color:var(--washi); text-decoration:none; font-size:15px;
    background:none; border:0; border-bottom:2px solid transparent;
    padding-bottom:2px; cursor:pointer; font-family:inherit; transition:.3s;
}
nav a:hover, nav button.link:hover { color:var(--gold); border-bottom-color:var(--gold); }

/* ============ ترحيب ============ */
.welcome {
    position:relative; overflow:hidden; text-align:center; color:var(--washi);
    padding:60px 8%;
    background:
        repeating-radial-gradient(circle at 50% 100%, transparent 0 18px, rgba(184,147,74,.10) 18px 20px),
        linear-gradient(180deg,#1C1C1C 0%,#2B1B19 60%,#3A1B18 100%);
}
.welcome::before {
    content:""; position:absolute; width:240px; height:240px; border-radius:50%;
    background:radial-gradient(circle,var(--torii),var(--beni));
    top:50%; left:50%; transform:translate(-50%,-55%);
    opacity:.55; box-shadow:0 0 80px rgba(179,38,30,.4);
}
.welcome > * { position:relative; }
.avatar {
    width:84px; height:84px; margin:0 auto 12px; border-radius:50%;
    background:var(--washi); color:var(--torii);
    border:3px solid var(--gold); box-shadow:0 0 0 6px rgba(184,147,74,.25);
    display:flex; align-items:center; justify-content:center;
    font-family:'Aref Ruqaa',serif; font-weight:700; font-size:34px;
}
.welcome h1 {
    font-family:'Aref Ruqaa',serif; font-size:46px; line-height:1.5;
    text-shadow:0 3px 18px rgba(0,0,0,.6);
}
.welcome .en-line { font-family:'Shippori Mincho',serif; color:#E8DCC8; font-size:17px; }
.welcome .mail { color:var(--gold); margin-top:6px; direction:ltr; }

/* ============ المحتوى ============ */
.content { padding:56px 8% 70px; }

.section-title { text-align:center; margin-bottom:34px; }
.section-title h2 { font-family:'Aref Ruqaa',serif; font-size:38px; color:var(--torii); line-height:1.5; }
.section-title h2 .en { font-size:21px; color:var(--sumi); }
.section-title::after {
    content:""; display:block; width:140px; height:2px; margin:12px auto 0;
    background:linear-gradient(90deg,transparent,var(--gold),transparent);
}

.actions { display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:26px; }
a.action {
    display:block; text-decoration:none; color:inherit;
    background:var(--paper); border:1px solid rgba(184,147,74,.55);
    border-top:5px solid var(--torii); border-radius:4px;
    box-shadow:5px 5px 0 rgba(28,28,28,.10);
    padding:26px 22px; text-align:center; transition:.3s;
}
a.action:hover { transform:translate(-3px,-5px); box-shadow:8px 10px 0 rgba(179,38,30,.18); }
.action .kanji {
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:52px;
    color:rgba(179,38,30,.35); letter-spacing:4px; line-height:1.3;
}
.action h3 { font-family:'Aref Ruqaa',serif; font-size:26px; color:var(--torii); line-height:1.5; }
.action .en { color:var(--muted); font-size:15px; }
.action p { color:var(--muted); font-size:15px; margin-top:4px; }

/* ============ طلباتي ============ */
.orders { margin-top:64px; scroll-margin-top:90px; }
.empty {
    background:var(--paper); border:1px dashed var(--gold); border-radius:4px;
    padding:40px 20px; text-align:center;
}
.seal {
    width:68px; height:68px; margin:0 auto 10px; border-radius:50%;
    background:radial-gradient(circle,var(--torii),var(--beni));
    border:3px solid var(--gold); color:var(--washi);
    display:flex; align-items:center; justify-content:center;
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:34px;
}
.empty p { margin-bottom:4px; }
.btn {
    display:inline-block; margin-top:16px; background:var(--torii); color:#fff;
    border:1px solid var(--gold); padding:10px 30px; border-radius:2px;
    font-family:'Aref Ruqaa',serif; font-size:20px; text-decoration:none; transition:.3s;
}
.btn:hover { background:var(--gold); color:var(--sumi); }

/* جدول الطلبات (تستخدمه الطالبة المسؤولة عن الطلبات) */
.table-wrap { overflow-x:auto; }
table { width:100%; border-collapse:collapse; background:var(--paper); border:1px solid rgba(184,147,74,.55); }
th { background:var(--sumi); color:var(--gold); font-family:'Aref Ruqaa',serif; font-weight:400; font-size:19px; padding:10px 14px; text-align:right; }
td { padding:10px 14px; border-top:1px solid rgba(184,147,74,.35); }
.badge { display:inline-block; padding:0 14px; border-radius:2px; color:#fff; font-size:14px; }
.badge.pending   { background:var(--gold); }
.badge.preparing { background:var(--torii); }
.badge.delivery  { background:var(--matcha); }
.badge.done      { background:var(--sumi); }

/* ============ الفوتر ============ */
footer {
    background:var(--sumi); border-top:3px solid var(--gold); color:var(--washi);
    text-align:center; padding:36px 20px;
}
footer h3 { font-family:'Shippori Mincho',serif; font-size:24px; letter-spacing:4px; color:var(--gold); margin-bottom:6px; }
footer .small { color:#A99C8A; font-size:14px; margin-top:8px; }

/* ============ الجوال ============ */
@media (max-width:760px) {
    header { flex-direction:column; gap:12px; position:static; }
    nav { gap:14px; flex-wrap:wrap; justify-content:center; }
    .welcome { padding:44px 6%; }
    .welcome h1 { font-size:34px; }
    .welcome::before { width:170px; height:170px; }
}
</style>
</head>

<body>

{{-- ============ الشريط العلوي ============ --}}
<header>
    <a href="{{ route('home') }}" class="logo">SAKURA <span>桜</span></a>

    <nav>
        <a href="{{ route('home') }}">الرئيسية | Home</a>
        <a href="{{ route('home') }}#menu">القائمة | Menu</a>
        <a href="#orders">طلباتي | Orders</a>
        <a href="{{ Route::has('profile.edit') ? route('profile.edit') : url('/settings/profile') }}">الإعدادات | Settings</a>

        {{-- تسجيل الخروج (نموذج POST مطلوب من Laravel) --}}
        <form method="POST" action="{{ Route::has('logout') ? route('logout') : url('/logout') }}">
            @csrf
            <button type="submit" class="link">خروج | Log out</button>
        </form>
    </nav>
</header>

{{-- ============ الترحيب (اسم المستخدم من الداتا بيس) ============ --}}
<section class="welcome">
    <div class="avatar">{{ auth()->user()->initials() }}</div>
    <h1>أهلاً، {{ auth()->user()->name }}</h1>
    <div class="en-line">Welcome back to Sakura</div>
    <div class="mail">{{ auth()->user()->email }}</div>
</section>

<main class="content">

    {{-- ===== اختصارات سريعة ===== --}}
    <div class="section-title">
        <h2>حسابي <span class="en">| My Account</span></h2>
    </div>

    <div class="actions">
        <a class="action" href="{{ route('home') }}#menu">
            <div class="kanji">食</div>
            <h3>تصفح القائمة</h3>
            <div class="en">Browse Menu</div>
            <p>اختر طبقك المفضل</p>
        </a>

        <a class="action" href="#orders">
            <div class="kanji">注文</div>
            <h3>طلباتي</h3>
            <div class="en">My Orders</div>
            <p>تابع حالة طلباتك</p>
        </a>

        <a class="action" href="{{ Route::has('profile.edit') ? route('profile.edit') : url('/settings/profile') }}">
            <div class="kanji">設定</div>
            <h3>الإعدادات</h3>
            <div class="en">Settings</div>
            <p>الاسم وكلمة المرور</p>
        </a>
    </div>

    {{-- ===== طلباتي ===== --}}
    <section class="orders" id="orders">
        <div class="section-title">
            <h2>طلباتي <span class="en">| My Orders</span></h2>
        </div>

        {{-- الحالة الفارغة: تظهر الحين لأن ما فيه طلبات --}}
        <div class="empty">
            <div class="seal">桜</div>
            <p>ما عندك طلبات بعد</p>
            <p class="en">You have no orders yet</p>
            <a href="{{ route('home') }}#menu" class="btn">اطلب الآن | Order Now</a>
        </div>

        {{--
            ===== للطالبة المسؤولة عن الطلبات =====
            لما يصير فيه جدول orders، استبدلي الحالة الفارغة بهذا الجدول:

            @forelse($orders as $order)
                ... صف لكل طلب ...
            @empty
                ... الحالة الفارغة ...
            @endforelse

            شكل الجدول وألوان الحالات (جاهزة في الـ CSS: pending, preparing, delivery, done):

            <div class="table-wrap">
                <table>
                    <tr><th>رقم الطلب</th><th>التاريخ</th><th>المجموع</th><th>النوع</th><th>الحالة</th></tr>
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>{{ $order->total }} SAR</td>
                        <td>توصيل | Delivery</td>
                        <td><span class="badge pending">قيد المراجعة | Pending</span></td>
                    </tr>
                </table>
            </div>
        --}}
    </section>

</main>

{{-- ============ الفوتر ============ --}}
<footer>
    <h3>SAKURA 桜</h3>
    <p>نكهة اليابان في كل لقمة</p>
    <p class="small en">© 2026 SAKURA Restaurant</p>
</footer>

</body>
</html>

