<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ساكورا | SAKURA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#20201e; --paper:#f7f3ea; --red:#b92b21; --cream:#fffdf8; --gold:#c49a4a; --muted:#777268; }
        * { box-sizing:border-box; margin:0; padding:0; }
        html { scroll-behavior:smooth; }
        body { background:var(--paper); color:var(--ink); font-family:'Noto Naskh Arabic','Outfit',sans-serif; }
        .en { font-family:'Outfit',sans-serif; direction:ltr; }
        header { height:76px; padding:0 6%; display:flex; align-items:center; justify-content:space-between; background:rgba(255,253,248,.94); border-bottom:1px solid #e7dfd0; position:sticky; top:0; z-index:20; backdrop-filter:blur(12px); }
        .logo { color:var(--ink); text-decoration:none; font-family:'Outfit',sans-serif; font-size:25px; font-weight:700; letter-spacing:4px; }
        .logo span { color:var(--red); }
        nav { display:flex; align-items:center; gap:22px; }
        nav a { color:var(--ink); text-decoration:none; font-size:15px; font-weight:600; }
        nav a:hover { color:var(--red); }
        .nav-cta { padding:9px 17px; background:var(--red); color:#fff !important; border-radius:999px; }
        .hero { min-height:480px; display:grid; grid-template-columns:1fr 1fr; align-items:center; gap:40px; padding:60px 8%; background:linear-gradient(135deg,#20201e 0%,#32201d 100%); color:#fff; overflow:hidden; }
        .hero-copy { max-width:610px; }
        .eyebrow { color:#dfc486; font-family:'Outfit',sans-serif; font-size:13px; letter-spacing:.22em; text-transform:uppercase; }
        .hero h1 { margin:12px 0; font-size:58px; line-height:1.25; }
        .hero p { max-width:520px; color:#dcd5c8; font-size:18px; }
        .hero-actions { display:flex; gap:12px; margin-top:28px; }
        .btn { display:inline-flex; align-items:center; justify-content:center; min-height:48px; padding:0 24px; border-radius:999px; text-decoration:none; font-weight:700; }
        .btn-primary { background:var(--red); color:#fff; }
        .btn-secondary { border:1px solid #a7a093; color:#fff; }
        .hero-art { position:relative; width:min(420px,100%); aspect-ratio:1; margin:auto; border:1px solid rgba(255,255,255,.12); border-radius:50%; display:grid; place-items:center; }
        .hero-art::before { content:''; position:absolute; width:78%; height:78%; border-radius:50%; background:var(--red); box-shadow:0 30px 70px rgba(185,43,33,.35); }
        .hero-art span { position:relative; z-index:1; color:#fff; font-family:'Outfit',sans-serif; font-size:118px; font-weight:700; }
        .menu-section { max-width:1180px; margin:auto; padding:72px 24px 88px; }
        .section-heading { display:flex; align-items:end; justify-content:space-between; gap:20px; margin-bottom:28px; }
        .section-heading h2 { font-size:40px; line-height:1.25; }
        .section-heading p { color:var(--muted); }
        .filters { display:flex; flex-wrap:wrap; gap:8px; margin-bottom:24px; }
        .filter { border:1px solid #ddd4c2; background:var(--cream); color:var(--ink); border-radius:999px; padding:8px 16px; cursor:pointer; font-family:inherit; }
        .filter.active { background:var(--ink); color:#fff; border-color:var(--ink); }
        .products { display:grid; grid-template-columns:repeat(4,1fr); gap:18px; }
        .card { background:var(--cream); border:1px solid #e7dfd0; border-radius:18px; overflow:hidden; cursor:pointer; transition:.25s ease; }
        .card:hover { transform:translateY(-6px); box-shadow:0 18px 40px rgba(55,46,35,.10); }
        .photo { height:180px; display:grid; place-items:center; background:linear-gradient(145deg,#eee5d3,#ded1ba); color:var(--red); font-family:'Outfit',sans-serif; font-size:38px; }
        .card:nth-child(3n+2) .photo { background:linear-gradient(145deg,#eadfd2,#cdbdab); }
        .card:nth-child(3n+3) .photo { background:linear-gradient(145deg,#dde3d2,#bdc9ad); }
        .card-body { padding:18px; }
        .card .category-name { color:var(--red); font-size:12px; font-weight:700; }
        .card h3 { margin:5px 0 2px; font-size:21px; }
        .card .english-name { color:var(--muted); font-family:'Outfit',sans-serif; font-size:13px; direction:ltr; text-align:right; }
        .card-footer { display:flex; align-items:center; justify-content:space-between; margin-top:16px; }
        .price { color:var(--ink); font-family:'Outfit',sans-serif; font-weight:700; }
        .add { width:38px; height:38px; border:0; border-radius:50%; background:var(--red); color:#fff; font-size:22px; cursor:pointer; }
        .modal { position:fixed; inset:0; z-index:50; display:none; align-items:center; justify-content:center; padding:20px; background:rgba(20,20,18,.68); }
        .modal.open { display:flex; }
        .modal-box { width:min(720px,100%); display:grid; grid-template-columns:.9fr 1.1fr; background:var(--cream); border-radius:22px; overflow:hidden; position:relative; }
        .modal-photo { min-height:390px; display:grid; place-items:center; background:#e8dfce; color:var(--red); font-size:64px; }
        .modal-info { padding:36px 32px; }
        .modal-info h2 { font-size:32px; margin:8px 0 2px; }
        .modal-info .en-name { color:var(--muted); direction:ltr; text-align:right; }
        .modal-desc { margin:20px 0; color:#5f5b53; }
        .modal-close { position:absolute; left:16px; top:12px; z-index:2; width:36px; height:36px; border:0; border-radius:50%; background:#fff; cursor:pointer; font-size:22px; }
        .modal-row { display:flex; align-items:center; justify-content:space-between; margin-top:24px; }
        .modal-total { font-family:'Outfit',sans-serif; font-size:24px; font-weight:700; }
        .modal-add { width:100%; height:50px; margin-top:18px; border:0; border-radius:999px; background:var(--red); color:#fff; cursor:pointer; font-family:inherit; font-weight:700; }
        footer { background:var(--ink); color:#fff; text-align:center; padding:42px 20px; }
        footer .en { margin-top:4px; color:#cfc7b8; }
        @media (max-width:900px) { header { height:auto; min-height:70px; } nav a:not(.nav-cta) { display:none; } .hero { grid-template-columns:1fr; text-align:center; min-height:520px; } .hero-copy { margin:auto; } .hero-actions { justify-content:center; } .hero-art { position:absolute; width:280px; opacity:.18; } .hero-copy { position:relative; z-index:2; } .hero h1 { font-size:43px; } .products { grid-template-columns:repeat(2,1fr); } }
        @media (max-width:560px) { header { padding:0 18px; } .logo { font-size:20px; } .hero { padding:48px 20px; } .hero h1 { font-size:36px; } .section-heading { align-items:start; flex-direction:column; } .section-heading h2 { font-size:32px; } .products { grid-template-columns:1fr; } .modal-box { grid-template-columns:1fr; max-height:90vh; overflow:auto; } .modal-photo { min-height:180px; } .modal-info { padding:26px 20px; } }
    </style>
</head>
<body>
    <header>
        <a class="logo" href="{{ route('home') }}">SAKURA <span>桜</span></a>
        <nav>
            <a href="#menu">القائمة</a>
            @auth
                <a href="{{ route('dashboard') }}" class="nav-cta">حسابي</a>
            @else
                <a href="{{ route('login') }}">تسجيل الدخول</a>
                <a href="{{ route('register') }}" class="nav-cta">إنشاء حساب</a>
            @endauth
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="hero-copy">
                <div class="eyebrow">AUTHENTIC JAPANESE CUISINE</div>
                <h1>نكهة اليابان،<br>بين يديك</h1>
                <p>اختيارات يابانية طازجة تحضر بعناية وتصل إليك بطعم لا يُنسى.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="#menu">تصفح القائمة</a>
                    <a class="btn btn-secondary en" href="#menu">EXPLORE MENU</a>
                </div>
            </div>
            <div class="hero-art" aria-hidden="true"><span>桜</span></div>
        </section>

        <section class="menu-section" id="menu">
            <div class="section-heading">
                <div><div class="eyebrow">SAKURA MENU</div><h2>اختياراتنا المميزة</h2></div>
                <p>Fresh flavors, made for every craving.</p>
            </div>
            <div class="filters" aria-label="تصنيف القائمة">
                <button class="filter active" data-filter="all">الكل</button>
                <button class="filter" data-filter="main">الأطباق الرئيسية</button>
                <button class="filter" data-filter="dessert">الحلويات</button>
                <button class="filter" data-filter="drink">المشروبات</button>
            </div>
            <div class="products">
                @php
                    $dishes = [
                        ['main','السوشي','Sushi','寿司','28','أرز ياباني مع سمك طازج وخضار بحرية.'],
                        ['main','الرامن','Ramen','拉麺','32','شوربة يابانية غنية مع نودلز وبيض.'],
                        ['main','دجاج الترياكي','Teriyaki Chicken','照焼','35','دجاج مشوي بصوص الترياكي والأرز.'],
                        ['main','البنتو','Bento Box','弁当','42','وجبة يابانية متنوعة ومتكاملة.'],
                        ['dessert','كيكة الماتشا','Matcha Cake','抹茶','22','كيكة خفيفة بنكهة الشاي الأخضر.'],
                        ['dessert','آيس كريم الماتشا','Matcha Ice Cream','氷菓','18','آيس كريم كريمي بنكهة الماتشا.'],
                        ['dessert','دوراياكي','Dorayaki','銅鑼','20','فطائر يابانية بحشوة حلوة.'],
                        ['drink','شاي الماتشا','Matcha Tea','茶','15','شاي أخضر ياباني تقليدي.'],
                        ['drink','القهوة المثلجة','Iced Coffee','珈琲','17','قهوة باردة منعشة.'],
                        ['drink','عصير الليمون','Lemon Juice','檸檬','12','عصير ليمون طازج ومثلج.'],
                    ];
                @endphp
                @foreach ($dishes as $dish)
                    <article class="card" data-category="{{ $dish[0] }}" data-name="{{ $dish[1] }}" data-en="{{ $dish[2] }}" data-jp="{{ $dish[3] }}" data-price="{{ $dish[4] }}" data-desc="{{ $dish[5] }}" tabindex="0" role="button">
                        <div class="photo">{{ $dish[3] }}</div>
                        <div class="card-body">
                            <div class="category-name">{{ match($dish[0]) {'main'=>'الأطباق الرئيسية','dessert'=>'الحلويات','drink'=>'المشروبات'} }}</div>
                            <h3>{{ $dish[1] }}</h3>
                            <div class="english-name">{{ $dish[2] }}</div>
                            <div class="card-footer"><span class="price">{{ $dish[4] }} SAR</span><button class="add" type="button" aria-label="إضافة {{ $dish[1] }}">+</button></div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    <div class="modal" id="modal" aria-hidden="true">
        <div class="modal-box" role="dialog" aria-modal="true">
            <button class="modal-close" id="modalClose" aria-label="إغلاق">&times;</button>
            <div class="modal-photo" id="modalJp"></div>
            <div class="modal-info">
                <div class="category-name">SAKURA SELECTION</div>
                <h2 id="modalName"></h2>
                <div class="en-name" id="modalEn"></div>
                <p class="modal-desc" id="modalDesc"></p>
                <div class="modal-row"><span>السعر | Price</span><strong class="modal-total" id="modalPrice"></strong></div>
                <button class="modal-add" type="button" id="modalAdd">أضف إلى السلة | Add to Cart</button>
            </div>
        </div>
    </div>

    <footer>
        <h3>SAKURA 桜</h3>
        <div class="en">Japanese taste in every bite</div>
    </footer>

    <script>
        const modal = document.getElementById('modal');
        function openModal(card) {
            document.getElementById('modalJp').textContent = card.dataset.jp;
            document.getElementById('modalName').textContent = card.dataset.name;
            document.getElementById('modalEn').textContent = card.dataset.en;
            document.getElementById('modalDesc').textContent = card.dataset.desc;
            document.getElementById('modalPrice').textContent = card.dataset.price + ' SAR';
            modal.classList.add('open');
            modal.setAttribute('aria-hidden','false');
        }
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', () => openModal(card));
            card.addEventListener('keydown', event => { if (event.key === 'Enter' || event.key === ' ') openModal(card); });
        });
        document.getElementById('modalClose').addEventListener('click', () => modal.classList.remove('open'));
        modal.addEventListener('click', event => { if (event.target === modal) modal.classList.remove('open'); });
        document.addEventListener('keydown', event => { if (event.key === 'Escape') modal.classList.remove('open'); });
        document.querySelectorAll('.filter').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.filter').forEach(item => item.classList.remove('active'));
                button.classList.add('active');
                document.querySelectorAll('.card').forEach(card => {
                    card.style.display = button.dataset.filter === 'all' || card.dataset.category === button.dataset.filter ? '' : 'none';
                });
            });
        });
        document.getElementById('modalAdd').addEventListener('click', () => {
            modal.classList.remove('open');
            alert('تمت الإضافة إلى السلة | Added to cart');
        });
    </script>
</body>
</html>
