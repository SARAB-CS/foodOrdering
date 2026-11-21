<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>السلة | Cart - SAKURA</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Noto+Naskh+Arabic:wght@400;500;700&family=Shippori+Mincho:wght@500;700;800&display=swap" rel="stylesheet">

{{-- مكتبة الخريطة Leaflet (مجانية، بدون مفتاح API) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css">

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
nav a {
    color:var(--washi); text-decoration:none; font-size:15px;
    border-bottom:2px solid transparent; padding-bottom:2px; transition:.3s;
}
nav a:hover, nav a.active { color:var(--gold); border-bottom-color:var(--gold); }
nav a.cta { background:var(--torii); color:#fff; padding:6px 18px; border-radius:2px; border-bottom:0; }
nav a.cta:hover { background:var(--beni); }

/* ============ العنوان ============ */
.page { padding:46px 8% 70px; }
.section-title { text-align:center; margin-bottom:34px; }
.section-title h1 { font-family:'Aref Ruqaa',serif; font-size:46px; color:var(--torii); line-height:1.5; }
.section-title h1 .en { font-size:24px; color:var(--sumi); }
.section-title p { color:var(--muted); }
.section-title::after {
    content:""; display:block; width:140px; height:2px; margin:12px auto 0;
    background:linear-gradient(90deg,transparent,var(--gold),transparent);
}

/* ============ تخطيط الصفحة ============ */
.layout { display:grid; grid-template-columns:1.25fr 1fr; gap:34px; align-items:start; }

/* ============ أطباق السلة ============ */
.panel {
    background:var(--paper); border:1px solid rgba(184,147,74,.55);
    border-top:5px solid var(--torii); border-radius:4px;
    box-shadow:6px 6px 0 rgba(28,28,28,.10); padding:24px;
}
.panel h2 { font-family:'Aref Ruqaa',serif; font-size:30px; color:var(--torii); line-height:1.5; margin-bottom:8px; }
.panel h2 .en { font-size:17px; color:var(--muted); }

/* ترتيب صورة الطبق واسمه وأزرار الكمية */
.item {
    display:grid; grid-template-columns:78px minmax(0,1fr) auto;
    gap:14px; align-items:center; padding:14px 0;
    border-top:1px solid rgba(184,147,74,.30);
}
.item:first-of-type { border-top:0; }
.thumb {
    width:78px; height:78px; border:1px solid rgba(184,147,74,.55); border-radius:3px;
    display:flex; align-items:center; justify-content:center; overflow:hidden;
    background:linear-gradient(135deg,#EFE3D0,#E4D2B8);
    flex-shrink:0;
}
.thumb img { width:100%; height:100%; object-fit:cover; display:block; }
.thumb-symbol {
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:26px;
    color:rgba(179,38,30,.55);
}
.item h3 { font-family:'Aref Ruqaa',serif; font-size:23px; line-height:1.4; }
.item .en-name { font-family:'Shippori Mincho',serif; color:var(--torii); font-weight:700; font-size:15px; }
.item .unit { color:var(--muted); font-size:14px; direction:ltr; text-align:right; }

.item-side { text-align:center; }
.qty { display:inline-flex; align-items:center; border:1px solid var(--gold); border-radius:2px; background:#fff; }
.qty button {
    width:34px; height:34px; border:0; background:transparent;
    font-size:20px; color:var(--torii); cursor:pointer;
}
.qty button:hover { background:var(--washi); }
.qty span { min-width:34px; text-align:center; font-family:'Shippori Mincho',serif; font-weight:700; }
.line-total {
    margin-top:6px; font-family:'Shippori Mincho',serif; font-weight:700;
    color:var(--matcha); direction:ltr;
}
.remove {
    display:block; margin:4px auto 0; background:none; border:0; cursor:pointer;
    color:var(--muted); font-family:inherit; font-size:14px; text-decoration:underline;
}
.remove:hover { color:var(--torii); }

.empty { text-align:center; padding:44px 10px; }
.seal {
    width:68px; height:68px; margin:0 auto 10px; border-radius:50%;
    background:radial-gradient(circle,var(--torii),var(--beni));
    border:3px solid var(--gold); color:var(--washi);
    display:flex; align-items:center; justify-content:center;
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:34px;
}

/* ============ ملخص الطلب + النموذج ============ */
.summary-row { display:flex; justify-content:space-between; padding:4px 0; }
.summary-row .num { font-family:'Shippori Mincho',serif; font-weight:700; direction:ltr; }
.summary-total {
    display:flex; justify-content:space-between; align-items:center;
    margin:10px 0 4px; padding-top:10px; border-top:2px solid var(--gold);
}
.summary-total strong { font-family:'Aref Ruqaa',serif; font-size:24px; color:var(--torii); }
.summary-total .num {
    background:var(--matcha); color:#fff; padding:0 18px; border-radius:2px;
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:22px; direction:ltr;
}

.form-title { margin-top:22px; font-family:'Aref Ruqaa',serif; font-size:24px; color:var(--torii); }
label.field { display:block; font-weight:700; margin-top:12px; }
label.field .en { font-weight:500; color:var(--muted); font-size:14px; }
input[type=tel], input[type=text], textarea {
    width:100%; margin-top:4px; padding:10px 14px; background:#fff;
    border:1px solid var(--gold); border-radius:2px; font-family:inherit; font-size:16px;
    color:var(--sumi); transition:.25s;
}
textarea { resize:vertical; min-height:70px; }
input:focus, textarea:focus { outline:none; border-color:var(--torii); box-shadow:0 0 0 3px rgba(179,38,30,.15); }
.invalid { border-color:var(--torii) !important; background:#FFF6F4 !important; }

/* أزرار الاختيار (توصيل/استلام - كاش/بطاقة) */
.choice { display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-top:6px; }
.choice input { position:absolute; opacity:0; pointer-events:none; }
.choice label {
    display:block; text-align:center; padding:8px 6px; cursor:pointer;
    background:#fff; border:1px solid var(--gold); border-radius:2px; transition:.25s;
}
.choice label .en { display:block; font-size:13px; color:var(--muted); }
.choice input:checked + label { background:var(--torii); border-color:var(--torii); color:#fff; }
.choice input:checked + label .en { color:#F3D9D6; }
.choice input:focus-visible + label { outline:3px solid var(--gold); outline-offset:2px; }

.btn {
    width:100%; margin-top:20px; padding:12px; background:var(--torii); color:#fff;
    border:1px solid var(--gold); border-radius:2px; cursor:pointer;
    font-family:'Aref Ruqaa',serif; font-size:22px; transition:.3s;
}
.btn:hover { background:var(--gold); color:var(--sumi); }
.btn.link {
    display:inline-block; width:auto; padding:8px 28px; font-size:19px; text-decoration:none; margin-top:14px;
}
.err { color:var(--beni); font-size:14px; min-height:20px; }

/* ============ الخريطة ============ */
#map {
    height:280px; margin-top:8px; border:1px solid var(--gold); border-radius:2px;
    position:relative; z-index:0; isolation:isolate;
}
.map-tools { display:flex; gap:10px; align-items:center; flex-wrap:wrap; margin-top:8px; }
.btn-sm {
    background:#fff; color:var(--torii); border:1px solid var(--torii); border-radius:2px;
    padding:4px 16px; cursor:pointer; font-family:'Aref Ruqaa',serif; font-size:17px; transition:.25s;
}
.btn-sm:hover { background:var(--torii); color:#fff; }
.map-hint { color:var(--muted); font-size:14px; }
.pin-icon { background:none; border:0; }
.pin {
    width:34px; height:34px; border-radius:50% 50% 50% 0; transform:rotate(-45deg);
    background:var(--torii); border:3px solid var(--gold);
    display:flex; align-items:center; justify-content:center; box-shadow:0 3px 8px rgba(0,0,0,.4);
}
.pin span { transform:rotate(45deg); color:#fff; font-family:'Shippori Mincho',serif; font-weight:800; font-size:15px; }

/* ============ تحديد الموقع ============ */
.loc { margin-top:10px; }
.loc-btn {
    width:100%; padding:9px; background:transparent; color:var(--torii);
    border:1px solid var(--torii); border-radius:2px; cursor:pointer;
    font-family:'Aref Ruqaa',serif; font-size:19px; transition:.3s;
}
.loc-btn:hover { background:var(--torii); color:#fff; }
.loc-btn:disabled { opacity:.6; cursor:wait; }
.loc-status { font-size:14px; margin-top:6px; min-height:22px; color:var(--muted); }
.loc-status.ok  { color:var(--matcha); font-weight:700; }
.loc-status.bad { color:var(--beni); }
.phone-status { font-size:14px; min-height:22px; color:var(--muted); }
.phone-status.ok { color:var(--matcha); font-weight:700; }
.phone-status.bad { color:var(--beni); }

/* ============ رسالة نجاح الطلب ============ */
.modal {
    position:fixed; inset:0; background:rgba(28,28,28,.68);
    display:none; align-items:center; justify-content:center; padding:20px; z-index:100;
}
.modal.open { display:flex; }
.modal-box {
    background:var(--paper); border:2px solid var(--gold); border-radius:4px;
    box-shadow:10px 10px 0 rgba(179,38,30,.25); max-width:430px; width:100%;
    padding:34px 28px; text-align:center;
}
.modal-box h2 { font-family:'Aref Ruqaa',serif; font-size:34px; color:var(--torii); line-height:1.5; }

/* ============ الفوتر ============ */
footer {
    background:var(--sumi); border-top:3px solid var(--gold); color:var(--washi);
    text-align:center; padding:36px 20px;
}
footer h3 { font-family:'Shippori Mincho',serif; font-size:24px; letter-spacing:4px; color:var(--gold); margin-bottom:6px; }
footer .small { color:#A99C8A; font-size:14px; margin-top:8px; }

/* ============ الجوال ============ */
@media (max-width:860px) {
    header { flex-direction:column; gap:12px; position:static; }
    nav { gap:14px; flex-wrap:wrap; justify-content:center; }
    .layout { grid-template-columns:1fr; }
    .item { grid-template-columns:62px 1fr; }
    .thumb { width:62px; height:62px; font-size:20px; }
    .item-side { grid-column:1 / -1; display:flex; align-items:center; justify-content:space-between; gap:10px; }
    .line-total { margin-top:0; }
    .remove { display:inline; margin:0; }
    .section-title h1 { font-size:36px; }
}
</style>
</head>

<body>

{{-- ============ الشريط العلوي ============ --}}
<header>
    <a href="{{ url('/') }}" class="logo">SAKURA <span>桜</span></a>

    <nav>
        <a href="{{ url('/') }}">الرئيسية | Home</a>
        <a href="{{ url('/') }}#menu">القائمة | Menu</a>
        <a href="{{ url('/cart') }}" class="active">السلة | Cart</a>

        @auth
            <a href="{{ route('dashboard') }}" class="cta">حسابي | Account</a>
        @else
            <a href="{{ route('login') }}">دخول | Login</a>
            <a href="{{ route('register') }}" class="cta">تسجيل | Register</a>
        @endauth
    </nav>
</header>

<main class="page">

    <div class="section-title">
        <h1>السلة <span class="en">| Your Cart</span></h1>
        <p>راجع طلبك قبل التأكيد | Review your order before confirming</p>
    </div>

    <div class="layout">

        {{-- ===== أطباق السلة (تتعبى من JavaScript) ===== --}}
        <section class="panel">
            <h2>أطباقك <span class="en">Your Dishes</span></h2>
            <div id="cartItems"></div>
        </section>

        {{-- ===== الملخص + بيانات الطلب ===== --}}
        <aside class="panel" id="checkoutPanel">
            <h2>ملخص الطلب <span class="en">Order Summary</span></h2>

            <div class="summary-row"><span>المجموع الفرعي | Subtotal</span><span class="num" id="subtotal">0 SAR</span></div>
            <div class="summary-row"><span>رسوم التوصيل | Delivery</span><span class="num" id="fee">10 SAR</span></div>
            <div class="summary-total"><strong>الإجمالي | Total</strong><span class="num" id="total">0 SAR</span></div>

            <div class="form-title">طريقة الاستلام <span class="en">Order Type</span></div>
            <div class="choice">
                <input type="radio" name="order_type" id="t_delivery" value="delivery" checked>
                <label for="t_delivery">توصيل <span class="en">Delivery</span></label>
                <input type="radio" name="order_type" id="t_pickup" value="pickup">
                <label for="t_pickup">استلام من الفرع <span class="en">Pickup</span></label>
            </div>

            <div id="addressBox">
                <label class="field" for="address">العنوان <span class="en">Address</span></label>
                <textarea id="address" placeholder="الحي، الشارع، رقم المبنى"></textarea>

                {{-- ===== تحديد الموقع: خريطة واحدة وإحداثيات واحدة ===== --}}
                <div class="loc">
                    <button type="button" class="loc-btn" id="locBtn">حدد موقعي | Use my location</button>
                    <p class="loc-status" id="locStatus" role="status" aria-live="polite">
                        يمكنك الضغط على الخريطة لتحديد العنوان يدويًا إذا تعذر تحديد موقعك.
                    </p>
                </div>
                <div id="map" aria-label="خريطة تحديد موقع التوصيل"></div>
                <input type="hidden" id="lat" name="latitude">
                <input type="hidden" id="lng" name="longitude">
            </div>

            <label class="field" for="phone">رقم الجوال <span class="en">Phone</span></label>
            <input type="tel" id="phone" name="phone" placeholder="05xxxxxxxx" dir="ltr"
                   inputmode="tel" autocomplete="tel" maxlength="20" aria-describedby="phoneStatus">
            <p class="phone-status" id="phoneStatus" role="status" aria-live="polite">الرقم السعودي: 05xxxxxxxx أو +9665xxxxxxxx</p>

            <div class="form-title">الدفع <span class="en">Payment</span></div>
            <div class="choice">
                <input type="radio" name="payment" id="p_cash" value="cash" checked>
                <label for="p_cash">كاش <span class="en">Cash</span></label>
                <input type="radio" name="payment" id="p_card" value="card">
                <label for="p_card">بطاقة <span class="en">Card</span></label>
            </div>

            <label class="field" for="notes">ملاحظات <span class="en">Notes (optional)</span></label>
            <textarea id="notes" placeholder="مثال: بدون حار"></textarea>

            <div class="err" id="err"></div>
            <button type="button" class="btn" id="confirmBtn">إتمام الطلب | Place Order</button>
        </aside>

    </div>
</main>

{{-- نافذة إتمام الطلب: TODO عرضها بعد نجاح الحفظ عند ربط النظام --}}
<div class="modal" id="doneModal" role="dialog" aria-modal="true" aria-labelledby="doneModalTitle">
    <div class="modal-box">
        <div class="seal">桜</div>
        <h2 id="doneModalTitle">تم إتمام الطلب! <span class="en" lang="en" dir="ltr" style="display:block;font-size:21px;color:var(--sumi)">Order Completed!</span></h2>
        <p>شكرًا لاختيارك ساكورا! 🌸</p>
        <p class="en" lang="en" dir="ltr">Thank you for choosing SAKURA!</p>
        <button type="button" id="closeOrderModalBtn" class="btn">العودة إلى السلة | <span class="en" lang="en" dir="ltr">Back to Cart</span></button>
    </div>
</div>

{{-- ============ الفوتر ============ --}}
<footer>
    <h3>SAKURA 桜</h3>
    <p>نكهة اليابان في كل لقمة</p>
    <p class="small en">© 2026 SAKURA Restaurant</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>

<script>
// ============================================================
// بيانات واجهة السلة الحالية — الربط بالطلبات الفعلية ضمن مهام الطالبة التالية.
// المهام للطالبة التالية عند ربط Laravel:
// 1) استبدال items بمنتجات السلة الحقيقية (id, ar, en, price, qty, image).
// 2) جلب سعر كل منتج وحساب المجموع من السيرفر، وعدم الثقة بأسعار المتصفح.
// 3) إرسال بيانات الطلب إلى Route/Controller مع CSRF والتحقق بالسيرفر.
// 4) إظهار رسالة نجاح حقيقية فقط بعد نجاح حفظ الطلب فعليًا.
// 5) إتمام أي دفع حقيقي في الباك إند؛ اختيار "بطاقة" هنا شكل واجهة فقط.
// ============================================================
var items = [
    // أمثلة للعرض: لا يتم إدراج بقية القائمة في السلة تلقائيًا.
    { ar: 'السوشي',      en: 'Sushi',      jp: '寿司', price: 28, qty: 1, image: "{{ asset('images/sushi.jpg') }}" },
    { ar: 'الرامن',      en: 'Ramen',      jp: '拉麺', price: 32, qty: 2, image: "{{ asset('images/ramen.jpg') }}" },
    { ar: 'شاي الماتشا', en: 'Matcha Tea', jp: '茶',   price: 15, qty: 1, image: "{{ asset('images/matcha-tea.jpg') }}" }
];

// ===== صور كل منتجات المنيو (10 منتجات) =====
// الأسماء مطابقة لقائمة الصور الظاهرة في public/images/ في لقطة GitHub.
// يمكن للطالبة المسؤولة عن السلة إرسال it.image مباشرة لكل منتج عند الربط.
var PRODUCT_IMAGES = {
    'السوشي':          "{{ asset('images/sushi.jpg') }}",
    'الرامن':          "{{ asset('images/ramen.jpg') }}",
    'دجاج الترياكي':   "{{ asset('images/teriyaki-chicken.jpg') }}",
    'البنتو':          "{{ asset('images/bento-box.jpg') }}",
    'كيكة الماتشا':    "{{ asset('images/matcha-cake.jpg') }}",
    'آيس كريم الماتشا':"{{ asset('images/matcha-ice-cream.jpg') }}",
    'دوراياكي':        "{{ asset('images/dorayaki.jpg') }}",
    'شاي الماتشا':     "{{ asset('images/matcha-tea.jpg') }}",
    'القهوة المثلجة':  "{{ asset('images/iced-coffee.jpg') }}",
    'عصير الليمون':    "{{ asset('images/lemon-juice.jpg') }}"
};

// حماية النصوص المدخلة عند استخدامها داخل HTML.
function escapeHtml(value) {
    return String(value ?? '').replace(/[&<>"']/g, function (c) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
}

var DELIVERY_FEE = 10;

function $(id) { return document.getElementById(id); }
function isDelivery() { return $('t_delivery').checked; }

// رسم أطباق السلة
function renderItems() {
    var box = $('cartItems');
    if (items.length === 0) {
        box.innerHTML =
            '<div class="empty">' +
            '<div class="seal">桜</div>' +
            '<p>سلتك فاضية</p><p class="en">Your cart is empty</p>' +
            '<a href="/#menu" class="btn link">تصفح القائمة | Browse Menu</a>' +
            '</div>';
        $('checkoutPanel').style.opacity = '.5';
        $('confirmBtn').disabled = true;
    } else {
        $('checkoutPanel').style.opacity = '1';
        $('confirmBtn').disabled = false;
        box.innerHTML = items.map(function (it, i) {
            // إذا أُرسل رابط الصورة مع المنتج نستخدمه؛ وإلا نرجع لخريطة صور المنيو.
            var imgUrl = it.image || PRODUCT_IMAGES[it.ar] || '';
            var symbol = escapeHtml(it.jp || '桜');
            var photo = imgUrl
                ? '<img src="' + escapeHtml(imgUrl) + '" alt="' + escapeHtml(it.ar) + '" loading="lazy">'
                : '';
            return '<div class="item">' +
                '<div class="thumb">' + photo +
                    '<span class="thumb-symbol"' + (imgUrl ? ' hidden' : '') + '>' + symbol + '</span></div>' +
                '<div><h3>' + escapeHtml(it.ar) + '</h3><div class="en-name">' + escapeHtml(it.en) + '</div>' +
                '<div class="unit">' + it.price + ' SAR</div></div>' +
                '<div class="item-side">' +
                '<div class="qty">' +
                '<button type="button" data-act="minus" data-i="' + i + '" aria-label="Less">&minus;</button>' +
                '<span>' + it.qty + '</span>' +
                '<button type="button" data-act="plus" data-i="' + i + '" aria-label="More">+</button>' +
                '</div>' +
                '<div class="line-total">' + (it.price * it.qty) + ' SAR</div>' +
                '<button type="button" class="remove" data-act="remove" data-i="' + i + '">حذف | Remove</button>' +
                '</div></div>';
        }).join('');

        // في حال كان اسم الصورة أو مسارها غير صحيح، يظهر الرمز الياباني بدل صورة مكسورة.
        box.querySelectorAll('.thumb img').forEach(function (img) {
            img.addEventListener('error', function () {
                img.style.display = 'none';
                var symbol = img.parentElement.querySelector('.thumb-symbol');
                if (symbol) symbol.hidden = false;
            });
        });
    }
    renderTotals();
}

// حساب المجموع
function renderTotals() {
    var sub = items.reduce(function (s, it) { return s + it.price * it.qty; }, 0);
    var fee = (items.length && isDelivery()) ? DELIVERY_FEE : 0;
    $('subtotal').textContent = sub + ' SAR';
    $('fee').textContent = fee + ' SAR';
    $('total').textContent = (sub + fee) + ' SAR';
}

// أزرار + و - وحذف
$('cartItems').addEventListener('click', function (e) {
    var b = e.target.closest('button[data-act]');
    if (!b) return;
    var i = parseInt(b.dataset.i, 10);
    if (b.dataset.act === 'plus') items[i].qty++;
    if (b.dataset.act === 'minus' && items[i].qty > 1) items[i].qty--;
    if (b.dataset.act === 'remove') items.splice(i, 1);
    renderItems();
});

// ====== التحقق من صيغة رقم الجوال السعودي (بدون إرسال رمز SMS) ======
function normalizeSaudiPhone(value) {
    var digits = String(value || '')
        .replace(/[٠-٩]/g, function (d) { return String(d.charCodeAt(0) - 0x0660); })
        .replace(/[۰-۹]/g, function (d) { return String(d.charCodeAt(0) - 0x06F0); })
        .replace(/[\s\-()]/g, '');
    if (digits.startsWith('00966')) digits = '0' + digits.slice(5);
    else if (digits.startsWith('+966')) digits = '0' + digits.slice(4);
    else if (digits.startsWith('966')) digits = '0' + digits.slice(3);
    else if (/^5\d{8}$/.test(digits)) digits = '0' + digits;
    return digits;
}
function isValidSaudiPhone(value) {
    return /^05\d{8}$/.test(normalizeSaudiPhone(value));
}
function updatePhoneStatus() {
    var phone = $('phone'), status = $('phoneStatus');
    if (!phone.value.trim()) {
        phone.classList.remove('invalid');
        status.className = 'phone-status';
        status.textContent = 'الرقم السعودي: 05xxxxxxxx أو +9665xxxxxxxx';
        return false;
    }
    var ok = isValidSaudiPhone(phone.value);
    phone.classList.toggle('invalid', !ok);
    status.className = 'phone-status ' + (ok ? 'ok' : 'bad');
    status.textContent = ok
        ? 'صيغة رقم الجوال صحيحة ✓ | Valid number format'
        : 'رقم غير صحيح: اكتبي 10 أرقام تبدأ بـ 05 أو استخدمي +9665xxxxxxxx';
    return ok;
}
$('phone').addEventListener('input', updatePhoneStatus);

// ====== الخريطة: نسخة واحدة من Leaflet مع إمكانية اختيار نقطة يدويًا ======
var map = null;
var marker = null;
var addressAuto = true;
var geocodeRequest = null;
$('address').addEventListener('input', function () { addressAuto = false; });

function showLocationStatus(message, state) {
    var status = $('locStatus');
    status.textContent = message;
    status.className = 'loc-status' + (state ? ' ' + state : '');
}

function reverseGeocode(lat, lng) {
    // الخدمة اختيارية؛ فشلها لا يلغي اختيار الإحداثيات.
    if (!window.fetch) return;
    if (geocodeRequest) geocodeRequest.abort();
    geocodeRequest = typeof AbortController !== 'undefined' ? new AbortController() : null;
    var url = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&accept-language=ar'
            + '&lat=' + encodeURIComponent(lat) + '&lon=' + encodeURIComponent(lng);
    fetch(url, geocodeRequest ? { signal: geocodeRequest.signal } : {})
        .then(function (response) {
            if (!response.ok) throw new Error('Address lookup failed');
            return response.json();
        })
        .then(function (data) {
            if (data && data.display_name && (addressAuto || !$('address').value.trim())) {
                $('address').value = data.display_name;
                addressAuto = true;
            }
        })
        .catch(function (error) {
            if (error.name !== 'AbortError') {
                showLocationStatus('تم تحديد النقطة؛ اكتبي العنوان يدويًا إذا لم يظهر تلقائيًا.', 'ok');
            }
        });
}

function setPin(lat, lng, recenter) {
    if (!Number.isFinite(lat) || !Number.isFinite(lng)) return;
    $('lat').value = lat.toFixed(6);
    $('lng').value = lng.toFixed(6);
    if (map) {
        if (!marker) {
            marker = L.marker([lat, lng], { draggable: true }).addTo(map);
            marker.on('dragend', function () {
                var position = marker.getLatLng();
                setPin(position.lat, position.lng, false);
            });
        } else {
            marker.setLatLng([lat, lng]);
        }
        if (recenter) map.setView([lat, lng], 16);
    }
    $('err').textContent = '';
    showLocationStatus('تم تحديد موقع التوصيل ✓ ويمكنك تحريك الدبوس لتعديله.', 'ok');
    reverseGeocode(lat, lng);
}

if (typeof L !== 'undefined') {
    map = L.map('map').setView([21.5433, 39.1728], 12);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);
    map.on('click', function (event) {
        setPin(event.latlng.lat, event.latlng.lng, false);
    });
} else {
    $('map').textContent = 'تعذر تحميل الخريطة. يمكنك كتابة عنوان التوصيل يدويًا.';
    showLocationStatus('تعذر تحميل الخريطة؛ تأكدي من الاتصال بالإنترنت أو اكتبي العنوان.', 'bad');
}

$('locBtn').addEventListener('click', function () {
    var button = $('locBtn');
    if (!window.isSecureContext) {
        showLocationStatus('تحديد الموقع يحتاج HTTPS أو localhost. يمكنك الضغط على الخريطة أو كتابة العنوان.', 'bad');
        return;
    }
    if (!navigator.geolocation) {
        showLocationStatus('المتصفح لا يدعم تحديد الموقع. اضغطي على الخريطة أو اكتبي العنوان.', 'bad');
        return;
    }
    button.disabled = true;
    showLocationStatus('جاري طلب إذن الموقع وتحديد موقعك...');
    navigator.geolocation.getCurrentPosition(
        function (position) {
            setPin(position.coords.latitude, position.coords.longitude, true);
            button.disabled = false;
        },
        function (error) {
            var message = 'تعذر تحديد الموقع. اضغطي على الخريطة أو اكتبي العنوان.';
            if (error.code === 1) message = 'تم رفض إذن الموقع؛ اسمحي بالوصول للموقع من إعدادات المتصفح أو حدديه على الخريطة.';
            if (error.code === 2) message = 'موقع الجهاز غير متاح حاليًا؛ جربي تفعيل خدمات الموقع أو اختاري من الخريطة.';
            if (error.code === 3) message = 'انتهت مهلة تحديد الموقع؛ أعيدي المحاولة أو اختاري من الخريطة.';
            showLocationStatus(message, 'bad');
            button.disabled = false;
        },
        { enableHighAccuracy: true, timeout: 15000, maximumAge: 0 }
    );
});

// توصيل أو استلام: إظهار/إخفاء العنوان وتحديث رسوم التوصيل.
document.querySelectorAll('input[name=order_type]').forEach(function (radio) {
    radio.addEventListener('change', function () {
        $('addressBox').style.display = isDelivery() ? 'block' : 'none';
        if (isDelivery() && map) setTimeout(function () { map.invalidateSize(); }, 60);
        renderTotals();
    });
});

// ====== تحقق واجهة المستخدم فقط؛ الحفظ الفعلي مسؤولية الباك إند ======
$('confirmBtn').addEventListener('click', function () {
    var phone = $('phone'), address = $('address'), error = $('err');
    address.classList.remove('invalid');
    error.textContent = '';

    if (!items.length) {
        error.textContent = 'السلة فارغة | Your cart is empty';
        return;
    }
    if (!updatePhoneStatus()) {
        error.textContent = 'الرجاء إدخال رقم جوال سعودي صحيح.';
        phone.focus();
        return;
    }

    // إذا تعذر تحديد النقطة، يمكن كتابة عنوان واضح بدلًا منها.
    var hasPin = $('lat').value !== '' && $('lng').value !== '';
    var hasAddress = address.value.trim().length >= 10;
    if (isDelivery() && !hasPin && !hasAddress) {
        address.classList.add('invalid');
        error.textContent = 'حددي موقعك على الخريطة أو اكتبي عنوان التوصيل (10 أحرف على الأقل).';
        address.focus();
        return;
    }

    // تطبيع الرقم لتتمكن الطالبة المسؤولة عن الطلبات من قراءته لاحقًا.
    phone.value = normalizeSaudiPhone(phone.value);
    // TODO: عند ربط Laravel، لا تفتحي النافذة إلا بعد نجاح حفظ الطلب من السيرفر.
    // TODO للطالبة التالية: إرسال الطلب للسيرفر، واستبدال هذا الفتح بفتح بعد استجابة ناجحة.
    $('doneModal').classList.add('open');
});

$('closeOrderModalBtn').addEventListener('click', function () {
    $('doneModal').classList.remove('open');
    $('confirmBtn').focus();
});

renderItems();
</script>

</body>
</html>
