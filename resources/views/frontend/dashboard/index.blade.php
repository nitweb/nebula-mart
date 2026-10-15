@extends('frontend.dashboard.dashboard')
@section('frontend_contents')

    <h1 class="sr-only">{{ $setting('store_name') }}: online shopping in Bangladesh</h1>

    @include('frontend.home.01_banner')

    @include('frontend.home.02_shop_by_category')

    @include('frontend.home.03_flash_deals')

    @include('frontend.home.04_top_brands')

    <section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-medical">
        <div class="flex items-end justify-between mb-6 gap-4">
            <h2 id="h-medical" class="font-display font-extrabold text-3xl">Medical</h2>
            <a href="shop.html" class="font-bold underline underline-offset-4 shrink-0">View all</a>
        </div>
        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">




            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/accu-chek-instant-blood-glucose-meter-bluetooth.webp" referrerpolicy="no-referrer" alt="Accu-Chek Instant Blood Glucose Meter (Bluetooth)" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-27%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Accu-Chek Instant Blood Glucose Meter (Bluetooth) to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Accu-Chek Instant Blood Glucose Meter (Bluetooth)" data-name="Accu-Chek Instant Blood Glucose Meter (Bluetooth)" data-price="3252" data-old="3,285" data-img="assets/images/products/accu-chek-instant-blood-glucose-meter-bluetooth.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Accu-Chek Instant Blood Glucose Meter (Bluetooth)</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳3,252</span><s class="text-sm text-ink/50">৳3,285</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Accu-Chek Instant Blood Glucose Meter (Bluetooth) to cart">Add to cart</button>
                </article>
            </li>

            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/digital-thermometer-lcd.webp" referrerpolicy="no-referrer" alt="Digital Thermometer LCD" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-35%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Digital Thermometer LCD to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Digital Thermometer LCD" data-name="Digital Thermometer LCD" data-price="105" data-old="150" data-img="assets/images/products/digital-thermometer-lcd.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Digital Thermometer LCD</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳105</span><s class="text-sm text-ink/50">৳150</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Digital Thermometer LCD to cart">Add to
                        cart</button>
                </article>
            </li>

            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/omron-hn-289-digital-personal-body-weight-scale.webp" referrerpolicy="no-referrer" alt="Omron HN-289 Digital Personal Body Weight Scale" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-44%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Omron HN-289 Digital Personal Body Weight Scale to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Omron HN-289 Digital Personal Body Weight Scale" data-name="Omron HN-289 Digital Personal Body Weight Scale" data-price="3155" data-old="3,506" data-img="assets/images/products/omron-hn-289-digital-personal-body-weight-scale.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2">
                            <a href="product.html" class="hover:text-primary">Omron HN-289 Digital Personal Body Weight Scale</a>
                        </h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳3,155</span><s class="text-sm text-ink/50">৳3,506</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Omron HN-289 Digital Personal Body Weight Scale to cart">Add to cart</button>
                </article>
            </li>

            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/omron-ne-c28.webp" referrerpolicy="no-referrer" alt="Omron NE-C28 Compressor Nebulizer Machine" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-32%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Omron NE-C28 Compressor Nebulizer Machine to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Omron NE-C28 Compressor Nebulizer Machine" data-name="Omron NE-C28 Compressor Nebulizer Machine" data-price="5674" data-old="6400" data-img="assets/images/products/omron-ne-c28.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Omron NE-C28 Compressor Nebulizer Machine</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳5674</span><s class="text-sm text-ink/50">৳6400</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Omron NE-C28 Compressor Nebulizer Machine to cart">Add to cart</button>
                </article>
            </li>

            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/fingertip-pulse-oximeter-oled-version-jumper-jpd-500d.webp" referrerpolicy="no-referrer" alt="Fingertip Pulse Oximeter OLED Version Jumper JPD-500D" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-18%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Fingertip Pulse Oximeter OLED Version Jumper JPD-500D to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Fingertip Pulse Oximeter OLED Version Jumper JPD-500D" data-name="Fingertip Pulse Oximeter OLED Version Jumper JPD-500D" data-price="1600" data-old="1,650" data-img="assets/images/products/fingertip-pulse-oximeter-oled-version-jumper-jpd-500d.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Fingertip Pulse Oximeter OLED Version Jumper JPD-500D</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳1,600</span><s class="text-sm text-ink/50">৳1,650</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Fingertip Pulse Oximeter OLED Version Jumper JPD-500D to cart">Add to cart</button>
                </article>
            </li>

            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/omron-hem-7156t.webp" referrerpolicy="no-referrer" alt="Omron HEM 7156T Digital Blood Pressure Monitor with Bluetooth" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-21%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Omron HEM 7156T Digital Blood Pressure Monitor with Bluetooth to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Omron HEM 7156T Digital Blood Pressure Monitor with Bluetooth" data-name="Omron HEM 7156T Digital Blood Pressure Monitor with Bluetooth" data-price="5572" data-old="7,388" data-img="assets/images/products/omron-hem-7156t.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Omron HEM 7156T Digital Blood Pressure Monitor with Bluetooth</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳5,572</span><s class="text-sm text-ink/50">৳7,388</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Omron HEM 7156T Digital Blood Pressure Monitor with Bluetooth to cart">Add to
                        cart</button>
                </article>
            </li>

            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/novopen-4-silver-reusable-insulin-pen.webp" referrerpolicy="no-referrer" alt="Novopen 4 Silver Reusable Insulin Pen" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-30%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Novopen 4 Silver Reusable Insulin Pen to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Novopen 4 Silver Reusable Insulin Pen" data-name="Novopen 4 Silver Reusable Insulin Pen" data-price="400" data-old="400" data-img="assets/images/products/novopen-4-silver-reusable-insulin-pen.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Novopen 4 Silver Reusable Insulin Pen</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳400</span><s class="text-sm text-ink/50">৳400</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Novopen 4 Silver Reusable Insulin Pen to cart">Add to cart</button>
                </article>
            </li>

            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/tynor-abdominal-support-9-l-a-01.webp" referrerpolicy="no-referrer" alt="Tynor Abdominal Support 9″ L (A-01)" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-33%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Tynor Abdominal Support 9″ L (A-01) to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Tynor Abdominal Support 9″ L (A-01)" data-name="Tynor Abdominal Support 9″ L (A-01)" data-price="952" data-old="1,097" data-img="assets/images/products/tynor-abdominal-support-9-l-a-01.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Medical</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Tynor Abdominal Support 9″ L (A-01)</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳952</span><s class="text-sm text-ink/50">৳1,097</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Tynor Abdominal Support 9″ L (A-01) to cart">Add to cart</button>
                </article>
            </li>

        </ul>
    </section>

    <section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-new">
        <h2 id="h-new" class="font-display font-extrabold text-3xl mb-6">New arrivals</h2>
        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/himalaya-moisturizing-aloe-vera-face-gel-100ml.webp" referrerpolicy="no-referrer" alt="Himalaya Moisturizing Aloe Vera Face Gel – 100ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-32%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Himalaya Moisturizing Aloe Vera Face Gel – 100ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Himalaya Moisturizing Aloe Vera Face Gel – 100ml" data-name="Himalaya Moisturizing Aloe Vera Face Gel – 100ml" data-price="135" data-old="199" data-img="assets/images/products/himalaya-moisturizing-aloe-vera-face-gel-100ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Himalaya Moisturizing Aloe Vera Face Gel – 100ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳135</span><s class="text-sm text-ink/50">৳199</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Himalaya Moisturizing Aloe Vera Face Gel – 100ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/kumarika-anti-hair-fall-serum-30ml.webp" referrerpolicy="no-referrer" alt="Kumarika Anti-Hair Fall Serum – 30ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-18%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Kumarika Anti-Hair Fall Serum – 30ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Kumarika Anti-Hair Fall Serum – 30ml" data-name="Kumarika Anti-Hair Fall Serum – 30ml" data-price="799" data-old="980" data-img="assets/images/products/kumarika-anti-hair-fall-serum-30ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Kumarika Anti-Hair Fall Serum – 30ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳799</span><s class="text-sm text-ink/50">৳980</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Kumarika Anti-Hair Fall Serum – 30ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/simple-refreshing-facial-wash-gel-150ml.webp" referrerpolicy="no-referrer" alt="Simple Refreshing Facial Wash Gel – 150ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-21%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Simple Refreshing Facial Wash Gel – 150ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Simple Refreshing Facial Wash Gel – 150ml" data-name="Simple Refreshing Facial Wash Gel – 150ml" data-price="749" data-old="950" data-img="assets/images/products/simple-refreshing-facial-wash-gel-150ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Simple Refreshing Facial Wash Gel – 150ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳749</span><s class="text-sm text-ink/50">৳950</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Simple Refreshing Facial Wash Gel – 150ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" referrerpolicy="no-referrer" alt="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-30%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-name="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-price="489" data-old="700" data-img="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Vaseline Gluta Hya Dewy Radiance Lotion – 200ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳489</span><s class="text-sm text-ink/50">৳700</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to cart">Add to cart</button>
                </article>
            </li>
        </ul>
    </section>
    <section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-cat0">
        <div class="flex items-end justify-between mb-6 gap-4">
            <h2 id="h-cat0" class="font-display font-extrabold text-3xl">Fashion</h2>
            <a href="shop.html" class="font-bold underline underline-offset-4 shrink-0">View all</a>
        </div>
        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" referrerpolicy="no-referrer" alt="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-30%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-name="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-price="489" data-old="700" data-img="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Vaseline Gluta Hya Dewy Radiance Lotion – 200ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳489</span><s class="text-sm text-ink/50">৳700</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/the-ordinary-niacinamide-10-percent-plus-zinc-1-percent-30ml.webp" referrerpolicy="no-referrer" alt="The Ordinary Niacinamide 10% + Zinc 1% – 30ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-33%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add The Ordinary Niacinamide 10% + Zinc 1% – 30ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view The Ordinary Niacinamide 10% + Zinc 1% – 30ml" data-name="The Ordinary Niacinamide 10% + Zinc 1% – 30ml" data-price="1,099" data-old="1,650" data-img="assets/images/products/the-ordinary-niacinamide-10-percent-plus-zinc-1-percent-30ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">The
                                Ordinary Niacinamide 10% + Zinc 1% – 30ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳1,099</span><s class="text-sm text-ink/50">৳1,650</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add The Ordinary Niacinamide 10% + Zinc 1% – 30ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/oxxo-premium-cotton-panjabi-for-men.webp" referrerpolicy="no-referrer" alt="OXXO Premium Cotton Panjabi for Men" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-27%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add OXXO Premium Cotton Panjabi for Men to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view OXXO Premium Cotton Panjabi for Men" data-name="OXXO Premium Cotton Panjabi for Men" data-price="946" data-old="1,300" data-img="assets/images/products/oxxo-premium-cotton-panjabi-for-men.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Fashion</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">OXXO Premium Cotton Panjabi for Men</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳946</span><s class="text-sm text-ink/50">৳1,300</s></div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add OXXO Premium Cotton Panjabi for Men to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/axis-y-dark-spot-correcting-glow-serum-50ml.webp" referrerpolicy="no-referrer" alt="AXIS-Y Dark Spot Correcting Glow Serum – 50ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-35%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add AXIS-Y Dark Spot Correcting Glow Serum – 50ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view AXIS-Y Dark Spot Correcting Glow Serum – 50ml" data-name="AXIS-Y Dark Spot Correcting Glow Serum – 50ml" data-price="1,299" data-old="2,000" data-img="assets/images/products/axis-y-dark-spot-correcting-glow-serum-50ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">AXIS-Y Dark Spot Correcting Glow Serum – 50ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳1,299</span><s class="text-sm text-ink/50">৳2,000</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add AXIS-Y Dark Spot Correcting Glow Serum – 50ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/dot-and-key-vitamin-c-plus-e-sunscreen-spf-50-plus-80gm.webp" referrerpolicy="no-referrer" alt="Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-44%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm" data-name="Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm" data-price="999" data-old="1,800" data-img="assets/images/products/dot-and-key-vitamin-c-plus-e-sunscreen-spf-50-plus-80gm.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Dot
                                &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳999</span><s class="text-sm text-ink/50">৳1,800</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/himalaya-moisturizing-aloe-vera-face-gel-100ml.webp" referrerpolicy="no-referrer" alt="Himalaya Moisturizing Aloe Vera Face Gel – 100ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-32%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Himalaya Moisturizing Aloe Vera Face Gel – 100ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Himalaya Moisturizing Aloe Vera Face Gel – 100ml" data-name="Himalaya Moisturizing Aloe Vera Face Gel – 100ml" data-price="135" data-old="199" data-img="assets/images/products/himalaya-moisturizing-aloe-vera-face-gel-100ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Himalaya Moisturizing Aloe Vera Face Gel – 100ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳135</span><s class="text-sm text-ink/50">৳199</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Himalaya Moisturizing Aloe Vera Face Gel – 100ml to cart">Add to cart</button>
                </article>
            </li>
        </ul>
    </section>

    <section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-cat1">
        <div class="flex items-end justify-between mb-6 gap-4">
            <h2 id="h-cat1" class="font-display font-extrabold text-3xl">Electronics</h2>
            <a href="shop.html" class="font-bold underline underline-offset-4 shrink-0">View all</a>
        </div>
        <ul id="electronics-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5" aria-live="polite"></ul>
    </section>

    <section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-cat2">
        <div class="flex items-end justify-between mb-6 gap-4">
            <h2 id="h-cat2" class="font-display font-extrabold text-3xl">Beauty</h2>
            <a href="shop.html" class="font-bold underline underline-offset-4 shrink-0">View all</a>
        </div>
        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/axis-y-dark-spot-correcting-glow-serum-50ml.webp" referrerpolicy="no-referrer" alt="AXIS-Y Dark Spot Correcting Glow Serum – 50ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-35%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add AXIS-Y Dark Spot Correcting Glow Serum – 50ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view AXIS-Y Dark Spot Correcting Glow Serum – 50ml" data-name="AXIS-Y Dark Spot Correcting Glow Serum – 50ml" data-price="1,299" data-old="2,000" data-img="assets/images/products/axis-y-dark-spot-correcting-glow-serum-50ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">AXIS-Y Dark Spot Correcting Glow Serum – 50ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳1,299</span><s class="text-sm text-ink/50">৳2,000</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add AXIS-Y Dark Spot Correcting Glow Serum – 50ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/dot-and-key-vitamin-c-plus-e-sunscreen-spf-50-plus-80gm.webp" referrerpolicy="no-referrer" alt="Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-44%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm" data-name="Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm" data-price="999" data-old="1,800" data-img="assets/images/products/dot-and-key-vitamin-c-plus-e-sunscreen-spf-50-plus-80gm.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Dot
                                &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳999</span><s class="text-sm text-ink/50">৳1,800</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Dot &amp; Key Vitamin C + E Sunscreen SPF 50+ – 80gm to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/himalaya-moisturizing-aloe-vera-face-gel-100ml.webp" referrerpolicy="no-referrer" alt="Himalaya Moisturizing Aloe Vera Face Gel – 100ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-32%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Himalaya Moisturizing Aloe Vera Face Gel – 100ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Himalaya Moisturizing Aloe Vera Face Gel – 100ml" data-name="Himalaya Moisturizing Aloe Vera Face Gel – 100ml" data-price="135" data-old="199" data-img="assets/images/products/himalaya-moisturizing-aloe-vera-face-gel-100ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Himalaya Moisturizing Aloe Vera Face Gel – 100ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳135</span><s class="text-sm text-ink/50">৳199</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Himalaya Moisturizing Aloe Vera Face Gel – 100ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/kumarika-anti-hair-fall-serum-30ml.webp" referrerpolicy="no-referrer" alt="Kumarika Anti-Hair Fall Serum – 30ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-18%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Kumarika Anti-Hair Fall Serum – 30ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Kumarika Anti-Hair Fall Serum – 30ml" data-name="Kumarika Anti-Hair Fall Serum – 30ml" data-price="799" data-old="980" data-img="assets/images/products/kumarika-anti-hair-fall-serum-30ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Kumarika Anti-Hair Fall Serum – 30ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳799</span><s class="text-sm text-ink/50">৳980</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Kumarika Anti-Hair Fall Serum – 30ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/simple-refreshing-facial-wash-gel-150ml.webp" referrerpolicy="no-referrer" alt="Simple Refreshing Facial Wash Gel – 150ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-21%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Simple Refreshing Facial Wash Gel – 150ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Simple Refreshing Facial Wash Gel – 150ml" data-name="Simple Refreshing Facial Wash Gel – 150ml" data-price="749" data-old="950" data-img="assets/images/products/simple-refreshing-facial-wash-gel-150ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Simple Refreshing Facial Wash Gel – 150ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳749</span><s class="text-sm text-ink/50">৳950</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Simple Refreshing Facial Wash Gel – 150ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" referrerpolicy="no-referrer" alt="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-30%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-name="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-price="489" data-old="700" data-img="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Vaseline Gluta Hya Dewy Radiance Lotion – 200ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳489</span><s class="text-sm text-ink/50">৳700</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to cart">Add to cart</button>
                </article>
            </li>
        </ul>
    </section>

    <section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-cat3">
        <div class="flex items-end justify-between mb-6 gap-4">
            <h2 id="h-cat3" class="font-display font-extrabold text-3xl">Home and Living</h2>
            <a href="shop.html" class="font-bold underline underline-offset-4 shrink-0">View all</a>
        </div>
        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/kumarika-anti-hair-fall-serum-30ml.webp" referrerpolicy="no-referrer" alt="Kumarika Anti-Hair Fall Serum – 30ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-18%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Kumarika Anti-Hair Fall Serum – 30ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Kumarika Anti-Hair Fall Serum – 30ml" data-name="Kumarika Anti-Hair Fall Serum – 30ml" data-price="799" data-old="980" data-img="assets/images/products/kumarika-anti-hair-fall-serum-30ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Kumarika Anti-Hair Fall Serum – 30ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳799</span><s class="text-sm text-ink/50">৳980</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Kumarika Anti-Hair Fall Serum – 30ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/simple-refreshing-facial-wash-gel-150ml.webp" referrerpolicy="no-referrer" alt="Simple Refreshing Facial Wash Gel – 150ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-21%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Simple Refreshing Facial Wash Gel – 150ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Simple Refreshing Facial Wash Gel – 150ml" data-name="Simple Refreshing Facial Wash Gel – 150ml" data-price="749" data-old="950" data-img="assets/images/products/simple-refreshing-facial-wash-gel-150ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Simple Refreshing Facial Wash Gel – 150ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳749</span><s class="text-sm text-ink/50">৳950</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Simple Refreshing Facial Wash Gel – 150ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" referrerpolicy="no-referrer" alt="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-30%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-name="Vaseline Gluta Hya Dewy Radiance Lotion – 200ml" data-price="489" data-old="700" data-img="assets/images/products/vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">Vaseline Gluta Hya Dewy Radiance Lotion – 200ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳489</span><s class="text-sm text-ink/50">৳700</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add Vaseline Gluta Hya Dewy Radiance Lotion – 200ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/the-ordinary-niacinamide-10-percent-plus-zinc-1-percent-30ml.webp" referrerpolicy="no-referrer" alt="The Ordinary Niacinamide 10% + Zinc 1% – 30ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-33%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add The Ordinary Niacinamide 10% + Zinc 1% – 30ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view The Ordinary Niacinamide 10% + Zinc 1% – 30ml" data-name="The Ordinary Niacinamide 10% + Zinc 1% – 30ml" data-price="1,099" data-old="1,650" data-img="assets/images/products/the-ordinary-niacinamide-10-percent-plus-zinc-1-percent-30ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">The
                                Ordinary Niacinamide 10% + Zinc 1% – 30ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳1,099</span><s class="text-sm text-ink/50">৳1,650</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add The Ordinary Niacinamide 10% + Zinc 1% – 30ml to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/oxxo-premium-cotton-panjabi-for-men.webp" referrerpolicy="no-referrer" alt="OXXO Premium Cotton Panjabi for Men" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-27%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add OXXO Premium Cotton Panjabi for Men to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view OXXO Premium Cotton Panjabi for Men" data-name="OXXO Premium Cotton Panjabi for Men" data-price="946" data-old="1,300" data-img="assets/images/products/oxxo-premium-cotton-panjabi-for-men.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Fashion</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">OXXO Premium Cotton Panjabi for Men</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳946</span><s class="text-sm text-ink/50">৳1,300</s></div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add OXXO Premium Cotton Panjabi for Men to cart">Add to cart</button>
                </article>
            </li>
            <li>
                <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
                    <div class="relative overflow-hidden bg-primary-soft">
                        <a href="product.html" class="block aspect-square" tabindex="-1" aria-hidden="true"><img src="assets/images/products/axis-y-dark-spot-correcting-glow-serum-50ml.webp" referrerpolicy="no-referrer" alt="AXIS-Y Dark Spot Correcting Glow Serum – 50ml" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-35%</span>
                        <div class="card-actions"><button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add AXIS-Y Dark Spot Correcting Glow Serum – 50ml to wishlist" aria-pressed="false"><svg class="w-5 h-5">
                                    <use href="#i-heart" />
                                </svg></button><button type="button" class="qv" aria-label="Quick view AXIS-Y Dark Spot Correcting Glow Serum – 50ml" data-name="AXIS-Y Dark Spot Correcting Glow Serum – 50ml" data-price="1,299" data-old="2,000" data-img="assets/images/products/axis-y-dark-spot-correcting-glow-serum-50ml.webp" data-href="product.html"><svg class="w-5 h-5">
                                    <use href="#i-eye" />
                                </svg></button></div>
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs font-bold text-primary">Beauty</p>
                        <h3 class="font-bold leading-snug mt-1 line-clamp-2"><a href="product.html" class="hover:text-primary">AXIS-Y Dark Spot Correcting Glow Serum – 50ml</a></h3>
                        <p class="ldesc hidden text-sm text-ink/70 mt-2">7-day returns and official warranty.</p>
                        <div class="mt-auto pt-3 flex items-baseline gap-2"><span class="font-display font-extrabold text-xl">৳1,299</span><s class="text-sm text-ink/50">৳2,000</s>
                        </div>
                    </div>
                    <button type="button" class="addcart card-cart" aria-label="Add AXIS-Y Dark Spot Correcting Glow Serum – 50ml to cart">Add to cart</button>
                </article>
            </li>
        </ul>
    </section>

@endsection
