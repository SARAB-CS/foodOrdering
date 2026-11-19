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

{{-- ============ قائمة الطعام ============ --}}
<section class="menu" id="menu">

    <div class="section-title">
        <h2>قائمة الطعام <span class="en">| Our Menu</span></h2>
        <p>تجربة يابانية مميزة في كل طبق</p>
    </div>

    {{-- ===== الأطباق الرئيسية ===== --}}
    <div class="category" id="main">
        <div class="category-title">
            <h3>الأطباق الرئيسية</h3>
            <span class="en">Main Dishes</span>
            <span class="jp">主菜</span>
        </div>

        <div class="products">

            <div class="card">
                {{-- مكان الصورة. لاحقًا: <img src="{{ asset('images/sushi.jpg') }}" alt="Sushi"> --}}
                <div class="photo"><span>寿司</span></div>
                <div class="card-content">
                    <h4>السوشي</h4>
                    <div class="english-name">Sushi</div>
                    <p class="description">أرز ياباني مع السمك الطازج</p>
                    <div class="price">28 SAR</div>
                </div>
            </div>

            <div class="card">
                <div class="photo"><span>拉麺</span></div>
                <div class="card-content">
                    <h4>الرامن</h4>
                    <div class="english-name">Ramen</div>
                    <p class="description">شوربة يابانية مع النودلز</p>
                    <div class="price">32 SAR</div>
                </div>
            </div>

            <div class="card">
                <div class="photo"><span>照焼</span></div>
                <div class="card-content">
                    <h4>دجاج الترياكي</h4>
                    <div class="english-name">Teriyaki Chicken</div>
                    <p class="description">دجاج بصوص الترياكي</p>
                    <div class="price">35 SAR</div>
                </div>
            </div>

            <div class="card">
                <div class="photo"><span>弁当</span></div>
                <div class="card-content">
                    <h4>البنتو</h4>
                    <div class="english-name">Bento Box</div>
                    <p class="description">وجبة يابانية متنوعة</p>
                    <div class="price">42 SAR</div>
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

            <div class="card">
                <div class="photo"><span>抹茶</span></div>
                <div class="card-content">
                    <h4>كيكة الماتشا</h4>
                    <div class="english-name">Matcha Cake</div>
                    <p class="description">كيكة يابانية بنكهة الشاي الأخضر</p>
                    <div class="price">22 SAR</div>
                </div>
            </div>

            <div class="card">
                <div class="photo"><span>氷菓</span></div>
                <div class="card-content">
                    <h4>آيس كريم الماتشا</h4>
                    <div class="english-name">Matcha Ice Cream</div>
                    <p class="description">آيس كريم بنكهة الماتشا</p>
                    <div class="price">18 SAR</div>
                </div>
            </div>

            <div class="card">
                <div class="photo"><span>銅鑼</span></div>
                <div class="card-content">
                    <h4>دوراياكي</h4>
                    <div class="english-name">Dorayaki</div>
                    <p class="description">فطائر يابانية بحشوة حلوة</p>
                    <div class="price">20 SAR</div>
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

            <div class="card">
                <div class="photo"><span>茶</span></div>
                <div class="card-content">
                    <h4>شاي الماتشا</h4>
                    <div class="english-name">Matcha Tea</div>
                    <p class="description">شاي أخضر ياباني تقليدي</p>
                    <div class="price">15 SAR</div>
                </div>
            </div>

            <div class="card">
                <div class="photo"><span>珈琲</span></div>
                <div class="card-content">
                    <h4>القهوة المثلجة</h4>
                    <div class="english-name">Iced Coffee</div>
                    <p class="description">قهوة باردة منعشة</p>
                    <div class="price">17 SAR</div>
                </div>
            </div>

            <div class="card">
                <div class="photo"><span>檸檬</span></div>
                <div class="card-content">
                    <h4>عصير الليمون</h4>
                    <div class="english-name">Lemon Juice</div>
                    <p class="description">عصير ليمون طازج</p>
                    <div class="price">12 SAR</div>
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

{{-- ============ الفوتر ============ --}}
<footer>
    <h3>SAKURA 桜</h3>
    <p>نكهة اليابان في كل لقمة</p>
    <p class="en">Japanese Taste in Every Bite</p>
    <p class="small en">© 2026 SAKURA Restaurant</p>
</footer>

</body>
</html>