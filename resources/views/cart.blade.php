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

.item {
    display:grid; grid-template-columns:78px 1fr auto; gap:16px; align-items:center;
    padding:16px 0; border-top:1px solid rgba(184,147,74,.4);
}
.item:first-of-type { border-top:0; }
.thumb {
    width:78px; height:78px; border:1px solid rgba(184,147,74,.55); border-radius:3px;
    display:flex; align-items:center; justify-content:center;
    background:
        repeating-radial-gradient(circle at 50% 120%, transparent 0 10px, rgba(184,147,74,.20) 10px 11px),
        linear-gradient(135deg,#EFE3D0,#E4D2B8);
    font-family:'Shippori Mincho',serif; font-weight:800; font-size:26px; color:rgba(179,38,30,.35);
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
.map-frame { margin-top:8px; border:2px solid var(--gold); border-radius:3px; overflow:hidden; box-shadow:4px 4px 0 rgba(28,28,28,.10); }
.map-frame iframe { width:100%; height:190px; border:0; display:block; }
.map-frame a {
    display:block; text-align:center; padding:5px; background:var(--sumi);
    color:var(--gold); text-decoration:none; font-size:14px;
}
.map-frame a:hover { color:var(--washi); }

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

                {{-- ===== تحديد الموقع ===== --}}
                <div class="loc">
                    <button type="button" class="loc-btn" id="locBtn">حدد موقعي | Use my location</button>
                    <div class="loc-status" id="locStatus"></div>

                    <div class="map-frame" id="mapBox" style="display:none">
                        <iframe id="mapFrame" title="Map" loading="lazy"></iframe>
                        <a id="mapLink" href="#" target="_blank" rel="noopener">عرض على الخريطة | Open in Maps</a>
                    </div>

                    {{-- الإحداثيات: الطالبة المسؤولة عن الطلبات تحفظها مع الطلب (latitude, longitude) --}}
                    <input type="hidden" id="lat" name="latitude">
                    <input type="hidden" id="lng" name="longitude">
                </div>

                {{-- ===== تحديد العنوان من الخريطة ===== --}}
                <div class="map-tools">
                    <button type="button" class="btn-sm" id="locateBtn">موقعي الحالي | My Location</button>
                    <span class="map-hint">أو اضغط على الخريطة لتحديد موقع التوصيل | Or tap the map to pin your location</span>
                </div>
                <div id="map"></div>
                <input type="hidden" id="lat" name="lat">
                <input type="hidden" id="lng" name="lng">
            </div>

            <label class="field" for="phone">رقم الجوال <span class="en">Phone</span></label>
            <input type="tel" id="phone" placeholder="05xxxxxxxx" dir="ltr">

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
            <button type="button" class="btn" id="confirmBtn">تأكيد الطلب | Confirm Order</button>
        </aside>

    </div>
</main>

{{-- ============ رسالة نجاح الطلب (شكلية) ============ --}}
<div class="modal" id="doneModal">
    <div class="modal-box">
        <div class="seal">桜</div>
        <h2>شكرًا لك!</h2>
        <p>تم استلام طلبك. | Your order has been received.</p>
        <p class="en" style="color:var(--muted);font-size:14px">(نسخة تجريبية للتصميم | Design preview)</p>
        <a href="{{ url('/') }}" class="btn link">الرجوع للرئيسية | Home</a>
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
//  هذي واجهة شكلية: الأطباق أدناه بيانات تجريبية.
//  الطالبة المسؤولة عن السلة تستبدلها ببيانات السلة الحقيقية.
// ============================================================
var items = [
    { ar: 'السوشي',        en: 'Sushi',          jp: '寿司', price: 28, qty: 1 },
    { ar: 'الرامن',        en: 'Ramen',          jp: '拉麺', price: 32, qty: 2 },
    { ar: 'شاي الماتشا',   en: 'Matcha Tea',     jp: '茶',   price: 15, qty: 1 }
];
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
            return '<div class="item">' +
                '<div class="thumb">' + it.jp + '</div>' +
                '<div><h3>' + it.ar + '</h3><div class="en-name">' + it.en + '</div>' +
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

// توصيل أو استلام: نظهر/نخفي العنوان ونحدث الرسوم
document.querySelectorAll('input[name=order_type]').forEach(function (r) {
    r.addEventListener('change', function () {
        $('addressBox').style.display = isDelivery() ? 'block' : 'none';
        if (isDelivery()) { setTimeout(function () { map.invalidateSize(); }, 60); }
        renderTotals();
    });
});

// تأكيد الطلب (تحقق بسيط من الحقول)
$('confirmBtn').addEventListener('click', function () {
    var phone = $('phone'), address = $('address'), err = $('err');
    phone.classList.remove('invalid'); address.classList.remove('invalid'); err.textContent = '';

    var phoneOk = /^[0-9+\s-]{9,15}$/.test(phone.value.trim());
    // العنوان مقبول إذا كتبتيه يدوي أو حددتي موقعك
    var addrOk = !isDelivery() || address.value.trim().length >= 5 || $('lat').value !== '';
    var pinOk = !isDelivery() || $('lat').value !== '';

    if (!phoneOk) { phone.classList.add('invalid'); err.textContent = 'اكتب رقم جوال صحيح | Enter a valid phone number'; return; }
    if (!pinOk)   { err.textContent = 'حدد موقعك على الخريطة | Pin your location on the map'; return; }
    if (!addrOk)  { address.classList.add('invalid'); err.textContent = 'اكتب عنوان التوصيل أو حدد موقعك | Enter your address or use your location'; return; }

    // هنا الطالبة المسؤولة عن الطلبات ترسل البيانات للسيرفر وتحفظها في الداتا بيس
    $('doneModal').classList.add('open');
});

// ============================================================
//  الخريطة: Leaflet + OpenStreetMap
//  تغيير مركز الخريطة الافتراضي: عدلي الإحداثيات أدناه.
// ============================================================
var map = L.map('map').setView([21.5433, 39.1728], 12);   // [خط العرض، خط الطول]، 12 = مستوى التقريب

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

// دبوس بشكل ياباني (أحمر مع 桜)
var pinIcon = L.divIcon({
    className: 'pin-icon',
    html: '<div class="pin"><span>桜</span></div>',
    iconSize: [34, 34],
    iconAnchor: [17, 34]
});

var marker = null;
var addressAuto = true;   // true = العنوان معبّى تلقائي من الخريطة (ما كتبته المستخدمة)

// لما تكتب المستخدمة العنوان بنفسها ما نمسحه
$('address').addEventListener('input', function () { addressAuto = false; });

// تحويل الإحداثيات إلى عنوان مكتوب (خدمة Nominatim المجانية)
function reverseGeocode(lat, lng) {
    fetch('https://nominatim.openstreetmap.org/reverse?format=jsonv2&accept-language=ar&lat=' + lat + '&lon=' + lng)
        .then(function (r) { return r.json(); })
        .then(function (d) {
            if (d && d.display_name && (addressAuto || $('address').value.trim() === '')) {
                $('address').value = d.display_name;
                addressAuto = true;
            }
        })
        .catch(function () { /* إذا ما اشتغلت الخدمة تكتب المستخدمة العنوان بنفسها */ });
}

// وضع الدبوس وحفظ الإحداثيات (للطالبة المسؤولة عن الطلبات: lat و lng تنحفظ مع الطلب)
function setPin(lat, lng, move) {
    if (!marker) {
        marker = L.marker([lat, lng], { icon: pinIcon, draggable: true }).addTo(map);
        marker.on('dragend', function () {
            var p = marker.getLatLng();
            setPin(p.lat, p.lng, false);
        });
    } else {
        marker.setLatLng([lat, lng]);
    }
    if (move) { map.setView([lat, lng], 16); }
    $('lat').value = lat.toFixed(6);
    $('lng').value = lng.toFixed(6);
    $('err').textContent = '';
    reverseGeocode(lat, lng);
}

// الضغط على الخريطة
map.on('click', function (e) { setPin(e.latlng.lat, e.latlng.lng, false); });

// زر "موقعي الحالي"
$('locateBtn').addEventListener('click', function () {
    if (!navigator.geolocation) { $('err').textContent = 'المتصفح ما يدعم تحديد الموقع | Geolocation not supported'; return; }
    navigator.geolocation.getCurrentPosition(
        function (pos) { setPin(pos.coords.latitude, pos.coords.longitude, true); },
        function () { $('err').textContent = 'ما قدرنا نحدد موقعك، اضغطي على الخريطة | Could not get location, tap the map'; }
    );
});

// ===== تحديد الموقع (يستخدم موقع المتصفح، بدون مفتاح ولا حساب) =====
$('locBtn').addEventListener('click', function () {
    var btn = $('locBtn'), st = $('locStatus');
    st.className = 'loc-status';

    if (!navigator.geolocation) {
        st.className = 'loc-status bad';
        st.textContent = 'المتصفح لا يدعم تحديد الموقع | Geolocation is not supported';
        return;
    }

    btn.disabled = true;
    st.textContent = 'جاري تحديد موقعك... | Locating...';

    navigator.geolocation.getCurrentPosition(function (pos) {
        var lat = pos.coords.latitude.toFixed(6), lng = pos.coords.longitude.toFixed(6);
        var d = 0.004; // مساحة العرض حول الموقع على الخريطة

        $('lat').value = lat;
        $('lng').value = lng;

        // الخريطة: OpenStreetMap مع علامة على الموقع
        var bbox = (+lng - d) + ',' + (+lat - d) + ',' + (+lng + d) + ',' + (+lat + d);
        $('mapFrame').src = 'https://www.openstreetmap.org/export/embed.html?bbox=' + bbox + '&layer=mapnik&marker=' + lat + ',' + lng;
        $('mapLink').href = 'https://www.google.com/maps?q=' + lat + ',' + lng;
        $('mapBox').style.display = 'block';

        st.className = 'loc-status ok';
        st.textContent = 'تم تحديد موقعك | Location set (' + lat + ', ' + lng + ')';
        btn.disabled = false;
    }, function (e) {
        var msg = 'تعذر تحديد الموقع | Could not get your location';
        if (e.code === 1) msg = 'رفضتي السماح بالموقع. فعّليه من إعدادات المتصفح | Location permission denied';
        if (e.code === 2) msg = 'الموقع غير متاح الحين | Location unavailable';
        if (e.code === 3) msg = 'انتهت مهلة التحديد، جربي مرة ثانية | Timed out, try again';
        st.className = 'loc-status bad';
        st.textContent = msg;
        btn.disabled = false;
    }, { enableHighAccuracy: true, timeout: 12000 });
});

renderItems();
</script>

</body>
</html>
