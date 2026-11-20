<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SAKURA | ساكورا - Japanese Restaurant</title>

{{-- الخطوط: عربي خط رقعة للعناوين + نسخ للنص، وإنجليزي/ياباني Shippori Mincho --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Noto+Naskh+Arabic:wght@400;500;700&family=Shippori+Mincho:wght@500;700;800&display=swap" rel="stylesheet">

<style>
/* ============ الألوان اليابانية ============ */
:root {
    --washi:  #F5EFE6;   /* ورق ياباني */
    --paper:  #FBF7F0;   /* ورق فاتح للكروت */
    --sumi:   #1C1C1C;   /* حبر أسود */
    --torii:  #B3261E;   /* أحمر بوابة التوري */
    --beni:   #8E1B16;   /* أحمر غامق */
    --matcha: #6B7F4E;   /* أخضر ماتشا */
    --gold:   #B8934A;   /* ذهبي */
    --muted:  #7A6F64;   /* رمادي دافئ للنصوص الصغيرة */
}

* { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }

body {
    background:
        radial-gradient(circle at 15% 10%, rgba(184,147,74,.08), transparent 40%),
        radial-gradient(circle at 85% 90%, rgba(179,38,30,.06), transparent 40%),
        var(--washi);
    color: var(--sumi);
    font-family: 'Noto Naskh Arabic', 'Shippori Mincho', serif;
    font-size: 17px;
    line-height: 1.9;
}

.en { font-family: 'Shippori Mincho', serif; letter-spacing: .06em; }

/* ============ الشريط العلوي ============ */
header {
    background: var(--sumi);
    border-bottom: 3px solid var(--gold);
    padding: 16px 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 10;
}

.logo {
    font-family: 'Shippori Mincho', serif;
    font-weight: 800;
    font-size: 26px;
    letter-spacing: 4px;
    color: var(--washi);
}
.logo span { color: var(--torii); margin-left: 8px; }

nav { display: flex; gap: 26px; align-items: center; }
nav a {
    color: var(--washi);
    text-decoration: none;
    font-size: 15px;
    padding-bottom: 2px;
    border-bottom: 2px solid transparent;
    transition: .3s;
}
nav a:hover { color: var(--gold); border-bottom-color: var(--gold); }
nav a.cta {
    background: var(--torii);
    padding: 6px 18px;
    border-radius: 2px;
    border-bottom: 0;
}
nav a.cta:hover { background: var(--beni); color: #fff; }

/* ============ الواجهة الرئيسية ============ */
.hero {
    position: relative;
    min-height: 520px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 80px 8%;
    color: var(--washi);
    overflow: hidden;
    /* خلفية بدون صورة: تدرج + نقش أمواج يابانية خفيف */
    background:
        repeating-radial-gradient(circle at 50% 100%, transparent 0 18px, rgba(184,147,74,.10) 18px 20px),
        linear-gradient(180deg, #1C1C1C 0%, #2B1B19 60%, #3A1B18 100%);
}

/* الشمس الحمراء مثل علم اليابان */
.hero::before {
    content: "";
    position: absolute;
    width: 300px; height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, var(--torii) 0%, var(--beni) 100%);
    top: 50%; left: 50%;
    transform: translate(-50%, -55%);
    opacity: .85;
    box-shadow: 0 0 90px rgba(179,38,30,.45);
}

.hero-content { position: relative; max-width: 640px; }

.hero .jp {
    font-family: 'Shippori Mincho', serif;
    font-size: 20px;
    letter-spacing: 10px;
    color: var(--gold);
    margin-bottom: 4px;
}
.hero h1 {
    font-family: 'Shippori Mincho', serif;
    font-weight: 800;
    font-size: 78px;
    letter-spacing: 10px;
    line-height: 1.2;
    margin-bottom: 14px;
    text-shadow: 0 3px 20px rgba(0,0,0,.6);
}
.hero p {
    font-size: 20px;
    margin-bottom: 8px;
    text-shadow: 0 2px 12px rgba(0,0,0,.7);
}
.hero .en-line {
    font-family: 'Shippori Mincho', serif;
    font-size: 16px;
    letter-spacing: .08em;
    color: #E8DCC8;
    margin-bottom: 28px;
}
.hero a.btn {
    display: inline-block;
    background: var(--torii);
    color: #fff;
    text-decoration: none;
    padding: 12px 38px;
    border: 1px solid var(--gold);
    border-radius: 2px;
    font-family: 'Aref Ruqaa', serif;
    font-size: 19px;
    transition: .3s;
}
.hero a.btn:hover { background: var(--gold); color: var(--sumi); }

/* ============ المنيو ============ */
.menu { padding: 70px 8%; }

.section-title { text-align: center; margin-bottom: 50px; }
.section-title h2 {
    font-family: 'Aref Ruqaa', serif;
    font-size: 42px;
    color: var(--torii);
    line-height: 1.5;
}
.section-title h2 .en { font-size: 24px; color: var(--sumi); }
.section-title p { color: var(--muted); }
.section-title::after {
    content: "";
    display: block;
    width: 140px; height: 2px;
    margin: 16px auto 0;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
}

.category { margin-bottom: 60px; scroll-margin-top: 90px; }

.category-title {
    display: flex;
    align-items: baseline;
    gap: 14px;
    border-right: 5px solid var(--torii);
    padding-right: 16px;
    margin-bottom: 28px;
}
.category-title h3 {
    font-family: 'Aref Ruqaa', serif;
    font-size: 30px;
    color: var(--torii);
}
.category-title .en { color: var(--muted); font-size: 18px; }
.category-title .jp {
    font-family: 'Shippori Mincho', serif;
    color: var(--gold);
    font-size: 18px;
    margin-right: auto;
}

.products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 26px;
}

.card {
    background: var(--paper);
    border: 1px solid rgba(184,147,74,.55);
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 5px 5px 0 rgba(28,28,28,.10);
    transition: .3s;
}
.card:hover {
    transform: translate(-3px, -5px);
    box-shadow: 8px 10px 0 rgba(179,38,30,.18);
}

a.card { display: block; text-decoration: none; color: inherit; }
/* مكان الصورة (فاضي الحين). لما تجهز الصور استبدلي div.photo بوسم img */
.photo,
.card img {
    width: 100%;
    height: 190px;
    object-fit: cover;
    display: block;
}
.photo {
    display: flex;
    align-items: center;
    justify-content: center;
    background:
        repeating-radial-gradient(circle at 50% 120%, transparent 0 14px, rgba(184,147,74,.18) 14px 15px),
        linear-gradient(135deg, #EFE3D0, #E4D2B8);
    border-bottom: 1px solid rgba(184,147,74,.55);
}
.photo span {
    font-family: 'Shippori Mincho', serif;
    font-weight: 800;
    font-size: 54px;
    color: rgba(179,38,30,.30);
    letter-spacing: 4px;
}

.card-content { padding: 20px; }
.card h4 {
    font-family: 'Aref Ruqaa', serif;
    font-size: 24px;
    color: var(--sumi);
    line-height: 1.5;
}
.english-name {
    font-family: 'Shippori Mincho', serif;
    color: var(--torii);
    font-size: 16px;
    font-weight: 700;
    letter-spacing: .05em;
    margin-bottom: 8px;
}
.description { color: var(--muted); font-size: 15px; min-height: 34px; }
.price {
    display: inline-block;
    margin-top: 14px;
    padding: 2px 16px;
    background: var(--matcha);
    color: #fff;
    border-radius: 2px;
    font-family: 'Shippori Mincho', serif;
    font-weight: 700;
    font-size: 17px;
    direction: ltr;
}

/* ============ التوصيل والاستلام + خطوات الطلب ============ */
.service { padding: 70px 8%; background: linear-gradient(180deg, transparent, rgba(184,147,74,.12)); }
.service-grid { display: grid; grid-template-columns: 1.1fr .9fr; gap: 40px; align-items: center; }
.service-cards { display: grid; gap: 22px; }
.info-card {
    background: var(--paper);
    border: 1px solid rgba(184,147,74,.55);
    border-right: 5px solid var(--torii);
    border-radius: 4px;
    padding: 22px 24px;
    box-shadow: 5px 5px 0 rgba(28,28,28,.10);
}
.info-card h3 { font-family: 'Aref Ruqaa', serif; font-size: 28px; color: var(--torii); line-height: 1.5; }
.info-card h3 .en { font-size: 17px; color: var(--muted); }
.info-card h3 .jp { font-family: 'Shippori Mincho', serif; font-size: 16px; color: var(--gold); margin-right: 8px; }
.info-card p { color: var(--sumi); }
.info-card .en { color: var(--muted); font-size: 15px; }
.fee {
    display: inline-block; margin-top: 10px; padding: 2px 16px;
    background: var(--matcha); color: #fff; border-radius: 2px;
    font-family: 'Shippori Mincho', serif; font-weight: 700; font-size: 15px;
}

.van { max-width: 440px; margin: auto; width: 100%; }
.van svg { width: 100%; height: auto; overflow: visible; }
.van .body { animation: drive 2.4s ease-in-out infinite; transform-box: fill-box; transform-origin: center; }
@keyframes drive {
    0%, 100% { transform: translateY(0); }
    50%      { transform: translateY(-4px); }
}
@media (prefers-reduced-motion: reduce) { .van .body { animation: none; } }

.order-flow { display: grid; grid-template-columns: 230px 1fr; gap: 36px; align-items: center; margin-top: 70px; }
.carton { max-width: 230px; margin: auto; width: 100%; }
.carton svg { width: 100%; height: auto; }
.flow-title { font-family: 'Aref Ruqaa', serif; font-size: 34px; color: var(--torii); line-height: 1.5; margin-bottom: 18px; }
.flow-title .en { font-size: 20px; color: var(--sumi); }
.steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); gap: 18px; }
.step {
    background: var(--paper);
    border: 1px solid rgba(184,147,74,.55);
    border-radius: 4px;
    padding: 18px 16px;
    text-align: center;
    box-shadow: 4px 4px 0 rgba(28,28,28,.08);
}
.step .num {
    width: 38px; height: 38px; margin: 0 auto 10px;
    border-radius: 50%; background: var(--torii); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Shippori Mincho', serif; font-weight: 800; font-size: 19px;
    border: 2px solid var(--gold);
}
.step h4 { font-family: 'Aref Ruqaa', serif; font-size: 21px; line-height: 1.5; }
.step .en { color: var(--muted); font-size: 14px; }

/* ============ نافذة تفاصيل الطبق ============ */
.card { cursor: pointer; }
.card:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
.card .more {
    display: inline-block;
    margin-right: 10px;
    color: var(--torii);
    font-size: 14px;
    border-bottom: 1px solid var(--torii);
}

.modal {
    position: fixed; inset: 0;
    background: rgba(28,28,28,.68);
    display: none;
    align-items: center; justify-content: center;
    padding: 20px;
    z-index: 100;
}
.modal.open { display: flex; animation: fadeIn .25s ease; }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

.modal-box {
    position: relative;
    background: var(--paper);
    border: 2px solid var(--gold);
    border-radius: 4px;
    box-shadow: 10px 10px 0 rgba(179,38,30,.25);
    width: 100%; max-width: 860px; max-height: 92vh;
    overflow: auto;
    display: grid; grid-template-columns: 1fr 1.1fr;
}
.modal-close {
    position: absolute; top: 10px; left: 12px;
    width: 38px; height: 38px;
    background: var(--sumi); color: var(--washi);
    border: 1px solid var(--gold); border-radius: 50%;
    font-size: 22px; line-height: 1; cursor: pointer; z-index: 2;
}
.modal-close:hover { background: var(--torii); }

.modal-photo {
    min-height: 360px;
    display: flex; align-items: center; justify-content: center;
    background:
        repeating-radial-gradient(circle at 50% 120%, transparent 0 16px, rgba(184,147,74,.20) 16px 17px),
        linear-gradient(135deg, #EFE3D0, #E4D2B8);
    border-left: 1px solid rgba(184,147,74,.55);
}
.modal-photo img { width: 100%; height: 100%; object-fit: cover; }
.modal-photo span {
    font-family: 'Shippori Mincho', serif; font-weight: 800;
    font-size: 100px; color: rgba(179,38,30,.32); letter-spacing: 6px;
}

.modal-info { padding: 34px 30px; }
.m-badge {
    display: inline-block; background: var(--sumi); color: var(--gold);
    padding: 0 14px; border-radius: 2px; font-size: 14px; margin-bottom: 8px;
}
.m-badge .en { color: var(--washi); margin-right: 6px; font-size: 13px; }
.modal-info h2 { font-family: 'Aref Ruqaa', serif; font-size: 44px; color: var(--torii); line-height: 1.4; }
.m-en { font-family: 'Shippori Mincho', serif; font-size: 22px; font-weight: 700; letter-spacing: .06em; }
.m-jp { font-family: 'Shippori Mincho', serif; color: var(--gold); font-size: 18px; letter-spacing: 5px; margin-bottom: 6px; }
.m-desc { margin: 10px 0; }
.m-ing { margin: 12px 0; }
.m-ing strong { font-family: 'Aref Ruqaa', serif; color: var(--torii); font-size: 20px; }
.m-ing ul { list-style: none; display: flex; flex-wrap: wrap; gap: 8px; margin-top: 6px; }
.m-ing li {
    background: var(--washi); border: 1px solid rgba(184,147,74,.6);
    border-radius: 2px; padding: 0 12px; font-size: 14px;
}
.m-row { display: flex; align-items: center; justify-content: space-between; gap: 14px; margin: 18px 0; flex-wrap: wrap; }
.qty { display: flex; align-items: center; border: 1px solid var(--gold); border-radius: 2px; background: #fff; }
.qty button {
    width: 40px; height: 40px; border: 0; background: transparent;
    font-size: 22px; color: var(--torii); cursor: pointer;
}
.qty button:hover { background: var(--washi); }
.qty span { min-width: 40px; text-align: center; font-family: 'Shippori Mincho', serif; font-weight: 700; font-size: 18px; }
.m-total {
    background: var(--matcha); color: #fff; padding: 2px 20px; border-radius: 2px;
    font-family: 'Shippori Mincho', serif; font-weight: 800; font-size: 24px; direction: ltr;
}
.m-add {
    width: 100%; background: var(--torii); color: #fff; border: 1px solid var(--gold);
    padding: 12px; border-radius: 2px; cursor: pointer;
    font-family: 'Aref Ruqaa', serif; font-size: 20px; transition: .3s;
}
.m-add:hover { background: var(--gold); color: var(--sumi); }

.toast {
    position: fixed; bottom: 26px; right: 50%; transform: translateX(50%) translateY(30px);
    background: var(--sumi); color: var(--washi); border: 1px solid var(--gold);
    padding: 10px 26px; border-radius: 2px; opacity: 0; pointer-events: none;
    transition: .35s; z-index: 200;
}
.toast.show { opacity: 1; transform: translateX(50%) translateY(0); }

@media (max-width: 760px) {
    .modal-box { grid-template-columns: 1fr; }
    .modal-photo { min-height: 190px; border-left: 0; border-bottom: 1px solid rgba(184,147,74,.55); }
    .modal-photo span { font-size: 70px; }
    .modal-info { padding: 22px 20px; }
    .modal-info h2 { font-size: 36px; }
}

/* ============ الفوتر ============ */
footer {
    background: var(--sumi);
    border-top: 3px solid var(--gold);
    color: var(--washi);
    text-align: center;
    padding: 40px 20px;
}
footer h3 {
    font-family: 'Shippori Mincho', serif;
    font-size: 24px;
    letter-spacing: 4px;
    color: var(--gold);
    margin-bottom: 8px;
}
footer .small { color: #A99C8A; font-size: 14px; margin-top: 10px; }

/* ============ الجوال ============ */
@media (max-width: 700px) {
    header { flex-direction: column; gap: 12px; position: static; }
    nav { gap: 14px; flex-wrap: wrap; justify-content: center; }
    .hero { min-height: 440px; }
    .hero h1 { font-size: 50px; letter-spacing: 6px; }
    .hero::before { width: 220px; height: 220px; }
    .section-title h2 { font-size: 34px; }
    .service-grid, .order-flow { grid-template-columns: 1fr; }
    .flow-title { text-align: center; }
}
</style>
</head>

<body>

{{-- ============ الشريط العلوي ============ --}}
<header>
    <div class="logo">SAKURA <span>桜</span></div>

    <nav>
        <a href="#home">الرئيسية | Home</a>
        <a href="#menu">القائمة | Menu</a>
        <a href="#main">الأطباق الرئيسية</a>
        <a href="#desserts">الحلويات</a>
        <a href="#drinks">المشروبات</a>
        <a href="#service">التوصيل والاستلام</a>

        {{-- روابط الدخول والتسجيل جاهزة من الـ starter kit --}}
        @auth
            <a href="{{ route('dashboard') }}" class="cta">حسابي | Account</a>
        @else
            <a href="{{ route('login') }}">دخول | Login</a>
            <a href="{{ route('register') }}" class="cta">تسجيل | Register</a>
        @endauth
    </nav>
</header>

{{-- ============ الواجهة الرئيسية ============ --}}
<section class="hero" id="home">
    <div class="hero-content">
        <div class="jp">さくら</div>
        <h1>SAKURA</h1>
        <p>اكتشفوا جمال المطبخ الياباني</p>
        <div class="en-line">Discover the beauty of Japanese cuisine</div>
        <a href="#menu" class="btn">استكشف القائمة | Explore Menu</a>
    </div>
</section>

{{-- ============ قائمة الطعام (مكتوبة يدوي الحين) ============ --}}
<section class="menu" id="menu">

    <div class="section-title">
        <h2>قائمة الطعام <span class="en">| Our Menu</span></h2>
        <p>اضغط على أي طبق لتشوف تفاصيله | Tap any dish for details</p>
    </div>

    {{-- ===== الأطباق الرئيسية ===== --}}
    <div class="category" id="main">
        <div class="category-title">
            <h3>الأطباق الرئيسية</h3>
            <span class="en">Main Dishes</span>
            <span class="jp">主菜</span>
        </div>

        <div class="products">

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="السوشي" data-en="Sushi" data-jp="寿司"
                 data-desc="أرز ياباني مع السمك الطازج" data-price="28"
                 data-cat="الأطباق الرئيسية" data-cat-en="Main Dishes"
                 data-ing-ar="أرز، سمك طازج، أعشاب بحرية" data-ing-en="Rice, fresh fish, nori">
                <div class="photo"><span>寿司</span></div>
                <div class="card-content">
                    <h4>السوشي</h4>
                    <div class="english-name">Sushi</div>
                    <p class="description">أرز ياباني مع السمك الطازج</p>
                    <div class="price">28 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="الرامن" data-en="Ramen" data-jp="拉麺"
                 data-desc="شوربة يابانية مع النودلز" data-price="32"
                 data-cat="الأطباق الرئيسية" data-cat-en="Main Dishes"
                 data-ing-ar="نودلز، مرق، بيض" data-ing-en="Noodles, broth, egg">
                <div class="photo"><span>拉麺</span></div>
                <div class="card-content">
                    <h4>الرامن</h4>
                    <div class="english-name">Ramen</div>
                    <p class="description">شوربة يابانية مع النودلز</p>
                    <div class="price">32 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="دجاج الترياكي" data-en="Teriyaki Chicken" data-jp="照焼"
                 data-desc="دجاج بصوص الترياكي" data-price="35"
                 data-cat="الأطباق الرئيسية" data-cat-en="Main Dishes"
                 data-ing-ar="دجاج، صوص ترياكي، أرز" data-ing-en="Chicken, teriyaki sauce, rice">
                <div class="photo"><span>照焼</span></div>
                <div class="card-content">
                    <h4>دجاج الترياكي</h4>
                    <div class="english-name">Teriyaki Chicken</div>
                    <p class="description">دجاج بصوص الترياكي</p>
                    <div class="price">35 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="البنتو" data-en="Bento Box" data-jp="弁当"
                 data-desc="وجبة يابانية متنوعة" data-price="42"
                 data-cat="الأطباق الرئيسية" data-cat-en="Main Dishes"
                 data-ing-ar="أرز، دجاج، خضار" data-ing-en="Rice, chicken, vegetables">
                <div class="photo"><span>弁当</span></div>
                <div class="card-content">
                    <h4>البنتو</h4>
                    <div class="english-name">Bento Box</div>
                    <p class="description">وجبة يابانية متنوعة</p>
                    <div class="price">42 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

        </div>
    </div>

    {{-- ===== الحلويات ===== --}}
    <div class="category" id="desserts">
        <div class="category-title">
            <h3>الحلويات</h3>
            <span class="en">Desserts</span>
            <span class="jp">甘味</span>
        </div>

        <div class="products">

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="كيكة الماتشا" data-en="Matcha Cake" data-jp="抹茶"
                 data-desc="كيكة يابانية بنكهة الشاي الأخضر" data-price="22"
                 data-cat="الحلويات" data-cat-en="Desserts"
                 data-ing-ar="دقيق، بيض، ماتشا" data-ing-en="Flour, eggs, matcha">
                <div class="photo"><span>抹茶</span></div>
                <div class="card-content">
                    <h4>كيكة الماتشا</h4>
                    <div class="english-name">Matcha Cake</div>
                    <p class="description">كيكة يابانية بنكهة الشاي الأخضر</p>
                    <div class="price">22 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="آيس كريم الماتشا" data-en="Matcha Ice Cream" data-jp="氷菓"
                 data-desc="آيس كريم بنكهة الماتشا" data-price="18"
                 data-cat="الحلويات" data-cat-en="Desserts"
                 data-ing-ar="حليب، ماتشا، سكر" data-ing-en="Milk, matcha, sugar">
                <div class="photo"><span>氷菓</span></div>
                <div class="card-content">
                    <h4>آيس كريم الماتشا</h4>
                    <div class="english-name">Matcha Ice Cream</div>
                    <p class="description">آيس كريم بنكهة الماتشا</p>
                    <div class="price">18 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="دوراياكي" data-en="Dorayaki" data-jp="銅鑼"
                 data-desc="فطائر يابانية بحشوة حلوة" data-price="20"
                 data-cat="الحلويات" data-cat-en="Desserts"
                 data-ing-ar="دقيق، بيض، حشوة حلوة" data-ing-en="Flour, eggs, sweet filling">
                <div class="photo"><span>銅鑼</span></div>
                <div class="card-content">
                    <h4>دوراياكي</h4>
                    <div class="english-name">Dorayaki</div>
                    <p class="description">فطائر يابانية بحشوة حلوة</p>
                    <div class="price">20 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

        </div>
    </div>

    {{-- ===== المشروبات ===== --}}
    <div class="category" id="drinks">
        <div class="category-title">
            <h3>المشروبات</h3>
            <span class="en">Drinks</span>
            <span class="jp">飲物</span>
        </div>

        <div class="products">

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="شاي الماتشا" data-en="Matcha Tea" data-jp="茶"
                 data-desc="شاي أخضر ياباني تقليدي" data-price="15"
                 data-cat="المشروبات" data-cat-en="Drinks"
                 data-ing-ar="ماتشا، ماء" data-ing-en="Matcha, water">
                <div class="photo"><span>茶</span></div>
                <div class="card-content">
                    <h4>شاي الماتشا</h4>
                    <div class="english-name">Matcha Tea</div>
                    <p class="description">شاي أخضر ياباني تقليدي</p>
                    <div class="price">15 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="القهوة المثلجة" data-en="Iced Coffee" data-jp="珈琲"
                 data-desc="قهوة باردة منعشة" data-price="17"
                 data-cat="المشروبات" data-cat-en="Drinks"
                 data-ing-ar="قهوة، ثلج" data-ing-en="Coffee, ice">
                <div class="photo"><span>珈琲</span></div>
                <div class="card-content">
                    <h4>القهوة المثلجة</h4>
                    <div class="english-name">Iced Coffee</div>
                    <p class="description">قهوة باردة منعشة</p>
                    <div class="price">17 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

            {{-- الكرت: البيانات داخل data-* وتطلع في النافذة لما تضغطين عليه --}}
            <div class="card" tabindex="0" role="button"
                 data-ar="عصير الليمون" data-en="Lemon Juice" data-jp="檸檬"
                 data-desc="عصير ليمون طازج" data-price="12"
                 data-cat="المشروبات" data-cat-en="Drinks"
                 data-ing-ar="ليمون، ماء، سكر" data-ing-en="Lemon, water, sugar">
                <div class="photo"><span>檸檬</span></div>
                <div class="card-content">
                    <h4>عصير الليمون</h4>
                    <div class="english-name">Lemon Juice</div>
                    <p class="description">عصير ليمون طازج</p>
                    <div class="price">12 SAR</div>
                    <span class="more">التفاصيل | Details ›</span>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- ============ التوصيل والاستلام وطريقة الطلب ============ --}}
<section class="service" id="service">

    <div class="section-title">
        <h2>التوصيل والاستلام <span class="en">| Delivery &amp; Pickup</span></h2>
        <p>اختر الطريقة اللي تناسبك</p>
    </div>

    <div class="service-grid">

        <div class="service-cards">
            <div class="info-card">
                <h3>التوصيل <span class="jp">配達</span><span class="en">Delivery</span></h3>
                <p>نوصل طلبك لباب بيتك وهو ساخن وطازج.</p>
                <p class="en">We bring your order to your door, hot and fresh.</p>
                <div class="fee">رسوم التوصيل 10 SAR</div>
            </div>

            <div class="info-card">
                <h3>الاستلام من الفرع <span class="jp">持帰</span><span class="en">Pickup</span></h3>
                <p>اطلب من الموقع واستلم طلبك من المطعم بدون رسوم توصيل.</p>
                <p class="en">Order online and collect it from the restaurant, no delivery fee.</p>
                <div class="fee">بدون رسوم | Free</div>
            </div>
        </div>

        {{-- رسمة سيارة التوصيل (SVG) --}}
        <div class="van">
            <svg viewBox="0 0 340 170" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Delivery van">
                <ellipse cx="170" cy="150" rx="150" ry="7" fill="#1C1C1C" opacity=".12"/>
                <g stroke="#B8934A" stroke-width="3" stroke-linecap="round" opacity=".7">
                    <line x1="4" y1="70" x2="30" y2="70"/>
                    <line x1="0" y1="92" x2="24" y2="92"/>
                    <line x1="8" y1="114" x2="30" y2="114"/>
                </g>
                <g class="body">
                    <rect x="40" y="40" width="170" height="82" rx="6" fill="#B3261E"/>
                    <rect x="40" y="104" width="170" height="7" fill="#B8934A"/>
                    <path d="M210 58 H262 L300 92 V122 H210 Z" fill="#8E1B16"/>
                    <path d="M220 66 H258 L282 90 H220 Z" fill="#F5EFE6" opacity=".92"/>
                    <circle cx="125" cy="70" r="22" fill="#F5EFE6"/>
                    <text x="125" y="79" text-anchor="middle" font-family="Shippori Mincho, serif" font-size="26" font-weight="800" fill="#B3261E">桜</text>
                    <text x="125" y="98" text-anchor="middle" font-family="Shippori Mincho, serif" font-size="11" font-weight="700" fill="#F5EFE6" letter-spacing="2">SAKURA</text>
                    <rect x="292" y="104" width="12" height="8" rx="2" fill="#B8934A"/>
                </g>
                <g>
                    <circle cx="90" cy="126" r="17" fill="#1C1C1C"/><circle cx="90" cy="126" r="7" fill="#B8934A"/>
                    <circle cx="256" cy="126" r="17" fill="#1C1C1C"/><circle cx="256" cy="126" r="7" fill="#B8934A"/>
                </g>
            </svg>
        </div>

    </div>

    {{-- ===== طريقة الطلب مع كرتون الطلب ===== --}}
    <div class="order-flow">

        {{-- رسمة كرتون الطلب (SVG) --}}
        <div class="carton">
            <svg viewBox="0 0 200 190" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Order box">
                <ellipse cx="100" cy="176" rx="70" ry="6" fill="#1C1C1C" opacity=".12"/>
                <path d="M68 52 Q100 -2 132 52" fill="none" stroke="#1C1C1C" stroke-width="4" stroke-linecap="round"/>
                <polygon points="38,56 162,56 149,170 51,170" fill="#B3261E"/>
                <polygon points="32,44 168,44 162,60 38,60" fill="#8E1B16"/>
                <polygon points="45,128 155,128 152,142 48,142" fill="#B8934A" opacity=".85"/>
                <circle cx="100" cy="96" r="27" fill="#F5EFE6"/>
                <text x="100" y="107" text-anchor="middle" font-family="Shippori Mincho, serif" font-size="32" font-weight="800" fill="#B3261E">桜</text>
                <text x="100" y="160" text-anchor="middle" font-family="Shippori Mincho, serif" font-size="11" font-weight="700" fill="#F5EFE6" letter-spacing="3">SAKURA</text>
            </svg>
        </div>

        <div>
            <div class="flow-title">كيف تطلب؟ <span class="en">| How to Order</span></div>
            <div class="steps">
                <div class="step"><div class="num">1</div><h4>اختر طبقك</h4><div class="en">Choose your dish</div></div>
                <div class="step"><div class="num">2</div><h4>توصيل أو استلام</h4><div class="en">Delivery or pickup</div></div>
                <div class="step"><div class="num">3</div><h4>ادفع كاش أو بطاقة</h4><div class="en">Pay cash or card</div></div>
                <div class="step"><div class="num">4</div><h4>استلم طلبك</h4><div class="en">Enjoy your meal</div></div>
            </div>
        </div>

    </div>

</section>

{{-- ============ نافذة تفاصيل الطبق (تظهر لما تضغطين على أي كرت) ============ --}}
<div class="modal" id="modal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true">
        <button class="modal-close" id="mClose" aria-label="إغلاق | Close">&times;</button>

        {{-- الصورة: لاحقًا تحطين img مكان الكلمة اليابانية --}}
        <div class="modal-photo" id="mPhoto"><span id="mJp"></span></div>

        <div class="modal-info">
            <div class="m-badge" id="mCat"></div>
            <h2 id="mAr"></h2>
            <div class="m-en" id="mEn"></div>
            <div class="m-jp" id="mJpName"></div>

            <p class="m-desc" id="mDesc"></p>

            <div class="m-ing">
                <strong>المكونات | Ingredients</strong>
                <ul id="mIng"></ul>
            </div>

            <div class="m-row">
                <div class="qty">
                    <button type="button" id="qMinus" aria-label="نقص | Less">&minus;</button>
                    <span id="qNum">1</span>
                    <button type="button" id="qPlus" aria-label="زيادة | More">+</button>
                </div>
                <div class="m-total" id="mTotal"></div>
            </div>

            {{-- زر السلة شكلي الحين، والطالبة المسؤولة عن السلة تربطه --}}
            <button type="button" class="m-add" id="mAdd">أضف للسلة | Add to Cart</button>
        </div>
    </div>
</div>

<div class="toast" id="toast">تمت الإضافة للسلة | Added to cart</div>

{{-- ============ الفوتر ============ --}}
<footer>
    <h3>SAKURA 桜</h3>
    <p>نكهة اليابان في كل لقمة</p>
    <p class="en">Japanese Taste in Every Bite</p>
    <p class="small en">© 2026 SAKURA Restaurant</p>
</footer>

<script>
// ===== نافذة تفاصيل الطبق =====
(function () {
    var modal = document.getElementById('modal');
    var price = 0, qty = 1;

    function $(id) { return document.getElementById(id); }

    // تحديث الكمية والمجموع
    function render() {
        $('qNum').textContent = qty;
        $('mTotal').textContent = (price * qty) + ' SAR';
    }

    // فتح النافذة وتعبئتها ببيانات الكرت (من data-*)
    function openModal(card) {
        var d = card.dataset;
        price = parseFloat(d.price);
        qty = 1;

        $('mJp').textContent = d.jp;
        $('mCat').innerHTML = d.cat + ' <span class="en">' + d.catEn + '</span>';
        $('mAr').textContent = d.ar;
        $('mEn').textContent = d.en;
        $('mJpName').textContent = d.jp;
        $('mDesc').textContent = d.desc;

        // المكونات: كل مكوّن في مربع صغير
        var ar = d.ingAr.split('، '), en = d.ingEn.split(', ');
        var list = $('mIng');
        list.innerHTML = '';
        ar.forEach(function (item, i) {
            var li = document.createElement('li');
            li.textContent = item + ' · ' + (en[i] || '');
            list.appendChild(li);
        });

        render();
        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // الضغط على أي كرت يفتح النافذة (وبالكيبورد: Enter)
    document.querySelectorAll('.card').forEach(function (card) {
        card.addEventListener('click', function () { openModal(card); });
        card.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openModal(card); }
        });
    });

    // الإغلاق: زر X، أو الضغط خارج النافذة، أو Esc
    $('mClose').addEventListener('click', closeModal);
    modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModal(); });

    // زيادة ونقصان الكمية
    $('qPlus').addEventListener('click', function () { qty++; render(); });
    $('qMinus').addEventListener('click', function () { if (qty > 1) { qty--; render(); } });

    // زر السلة (شكلي): يعرض رسالة صغيرة. الطالبة المسؤولة عن السلة تربطه لاحقًا
    $('mAdd').addEventListener('click', function () {
        closeModal();
        var t = $('toast');
        t.classList.add('show');
        setTimeout(function () { t.classList.remove('show'); }, 2200);
    });
})();
</script>

</body>
</html>
