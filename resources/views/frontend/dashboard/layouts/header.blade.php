<header id="site-header" class="sticky top-0 z-50">

    <!-- Announcement marquee -->
    <div class="bg-ink text-white overflow-hidden text-[13px] font-medium">
        <div class="flex whitespace-nowrap marquee w-max py-2">
            <div class="flex gap-10 pr-10 items-center">
                <span>Pay with <b class="text-accent">cash on delivery</b></span>
                <span class="text-primary">●</span>
                <span>7-day easy returns on everything</span>
                <span class="text-primary">●</span>
            </div>
            <div class="flex gap-10 pr-10 items-center" aria-hidden="true">
                <span>Pay with <b class="text-accent">cash on delivery</b></span>
                <span class="text-primary">●</span>
                <span>7-day easy returns on everything</span>
                <span class="text-primary">●</span>
            </div>
        </div>
    </div>

    <!-- Main bar -->
    <div class="bg-white border-b-4 border-line">

        <div class="max-w-7xl mx-auto px-4 lg:px-6">

            <div class="flex items-center gap-3 lg:gap-6 h-16 lg:h-20">

                <!-- Mobile menu button -->
                <button id="open-menu" class="lg:hidden -ml-2 p-2 rounded-lg hover:bg-primary-soft" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false">
                    <svg class="w-7 h-7">
                        <use href="#i-menu" />
                    </svg>
                </button>

                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0" aria-label="NEBULA MART home">
                    <span class="relative grid place-items-center w-10 h-10 lg:w-11 lg:h-11 rounded-xl bg-primary -rotate-6">
                        <span class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-accent border border-white"></span>
                        <span class="absolute -bottom-1 -left-1 w-3 h-3 rounded-full bg-primary border border-white"></span>
                        <span class="logo-mark font-display font-extrabold text-white">NM</span>
                    </span>
                    <span class="font-display font-extrabold text-2xl lg:text-[28px] tracking-tight">NEBULA MART</span>
                </a>

                <!-- Search (desktop) -->
                <form action="shop.html" method="GET" role="search" class="hidden lg:flex flex-1 max-w-2xl mx-auto">
                    <div class="flex w-full rounded-2xl border border-line bg-paper overflow-hidden focus-within:shadow-md transition-shadow">
                        <label class="sr-only" for="search-q">Search products</label>
                        <input id="search-q" type="search" name="q" placeholder="Search for shoes, phones, skincare…" class="flex-1 bg-transparent px-4 py-3 text-[15px] placeholder:text-ink/50 focus:outline-none">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 grid place-items-center transition-colors" aria-label="Search">
                            <svg class="w-5 h-5">
                                <use href="#i-search" />
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Actions -->
                <div class="ml-auto lg:ml-0 flex items-center gap-1 sm:gap-2">

                    <!-- Account dropdown -->
                    <div class="drop relative hidden sm:block">
                        <a href="account.html" class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-primary-soft font-bold text-sm">
                            <svg class="w-6 h-6">
                                <use href="#i-user" />
                            </svg>
                            <span class="hidden xl:block leading-tight text-left">
                                <span class="block text-[11px] font-medium text-ink/60">Hello, guest</span>
                                Account
                            </span>
                        </a>
                        <div class="drop-panel absolute right-0 top-full pt-2 w-60">
                            <div class="bg-white border border-line rounded-2xl shadow-sm p-3">
                                <a href="login.html" class="block text-center bg-primary text-white font-bold rounded-xl py-2.5 hover:bg-primary-dark">Sign
                                    in</a>
                                <a href="register.html" class="block text-center mt-2 bg-accent text-ink font-bold rounded-xl py-2.5 hover:brightness-95">Create
                                    account</a>
                                <div class="mt-3 pt-3 border-t-2 border-dashed border-line text-sm font-medium grid gap-1">
                                    <a href="orders.html" class="px-2 py-1.5 rounded-lg hover:bg-primary-soft">My orders</a>
                                    <a href="track.html" class="px-2 py-1.5 rounded-lg hover:bg-primary-soft">Track a package</a>
                                    <a href="addresses.html" class="px-2 py-1.5 rounded-lg hover:bg-primary-soft">Saved addresses</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <a href="wishlist.html" class="relative p-2.5 rounded-xl hover:bg-primary-soft hidden sm:grid place-items-center" aria-label="Wishlist, 3 items">
                        <svg class="w-6 h-6">
                            <use href="#i-heart" />
                        </svg>
                        <span class="absolute top-0.5 right-0.5 min-w-[18px] h-[18px] px-1 rounded-full bg-primary text-white text-[10px] font-bold grid place-items-center">3</span>
                    </a>

                    <!-- Cart -->
                    <button id="open-cart" class="flex items-center gap-2 bg-ink text-white rounded-xl pl-3 pr-3.5 py-2.5 font-bold text-sm hover:bg-primary transition-colors" aria-label="Open cart, 2 items" aria-controls="cart-drawer" aria-expanded="false">
                        <span class="relative">
                            <svg class="w-6 h-6">
                                <use href="#i-bag" />
                            </svg>
                            <span class="absolute -top-2 -right-2 min-w-[18px] h-[18px] px-1 rounded-full bg-accent text-ink text-[10px] font-extrabold grid place-items-center">2</span>
                        </span>
                        <span class="hidden md:block">৳3,480</span>
                    </button>

                </div>

            </div>

            <!-- Search (mobile) -->
            <form action="shop.html" method="GET" role="search" class="lg:hidden pb-3">
                <div class="flex rounded-xl border border-line bg-paper overflow-hidden">
                    <label class="sr-only" for="search-m">Search products</label>
                    <input id="search-m" type="search" name="q" placeholder="Search products…" class="flex-1 bg-transparent px-4 py-2.5 text-[15px] focus:outline-none">
                    <button type="submit" class="bg-primary text-white px-4 grid place-items-center" aria-label="Search">
                        <svg class="w-5 h-5">
                            <use href="#i-search" />
                        </svg>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <!-- ===== Desktop nav + MEGA MENU ===== -->
    <nav class="hidden lg:block bg-white border-b border-line relative" aria-label="Main">

        <div class="max-w-7xl mx-auto px-6">

            <ul class="flex items-center gap-1 py-2">

                <!-- Medical -->
                <li>
                    <a href="shop.html" class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-bold text-[15px] transition-colors hover:bg-primary-soft">Medical</a>
                </li>

                <!-- Fashion -->
                <li class="mega-item static">
                    <button class="mega-trigger flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-bold text-[15px] transition-colors" aria-haspopup="true">
                        Fashion
                        <svg class="chev w-4 h-4 transition-transform">
                            <use href="#i-chev" />
                        </svg>
                    </button>
                    <div class="mega-panel absolute left-0 right-0 top-full z-40">
                        <div class="max-w-7xl mx-auto px-6">
                            <div class="bg-white border border-line rounded-3xl shadow-sm mt-1 p-8 grid grid-cols-12 gap-8">
                                <div class="col-span-2">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Women</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Sarees &amp; Salwar</a></li>
                                        <li><a href="shop.html" class="link-u">Dresses &amp; Tops</a></li>
                                        <li><a href="shop.html" class="link-u">Kurtis</a></li>
                                        <li><a href="shop.html" class="link-u">Handbags</a></li>
                                        <li><a href="shop.html" class="link-u">Jewellery</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-2">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Men</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Panjabi</a></li>
                                        <li><a href="shop.html" class="link-u">Shirts &amp; T-shirts</a></li>
                                        <li><a href="shop.html" class="link-u">Jeans &amp; Pants</a></li>
                                        <li><a href="shop.html" class="link-u">Watches</a></li>
                                        <li><a href="shop.html" class="link-u">Wallets</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-2">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Footwear</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Sneakers</a></li>
                                        <li><a href="shop.html" class="link-u">Sandals</a></li>
                                        <li><a href="shop.html" class="link-u">Formal shoes</a></li>
                                        <li><a href="shop.html" class="link-u">Kids' shoes</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <a href="shop.html" class="block h-full rounded-2xl bg-primary p-5 text-white relative overflow-hidden group">
                                        <span class="absolute -right-6 -bottom-6 w-28 h-28 rounded-full bg-accent"></span>
                                        <span class="relative inline-block bg-white text-primary text-xs font-bold px-2.5 py-1 rounded-full">New season</span>
                                        <p class="relative font-display font-extrabold text-2xl leading-tight mt-3">Eid-ready outfits, up to 40% off</p>
                                        <span class="relative inline-block mt-4 font-bold underline underline-offset-4">Shop fashion</span>
                                    </a>
                                </div>
                                <div class="col-span-3">
                                    <a href="shop.html" class="block h-full rounded-2xl bg-accent p-5 relative overflow-hidden">
                                        <span class="absolute -left-5 -top-5 w-24 h-24 rounded-full bg-accent"></span>
                                        <span class="relative inline-block bg-ink text-white text-xs font-bold px-2.5 py-1 rounded-full">Trending</span>
                                        <p class="relative font-display font-extrabold text-2xl leading-tight mt-3">Sneakers under ৳2,500</p>
                                        <span class="relative inline-block mt-4 font-bold underline underline-offset-4">See the picks</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Electronics -->
                <li class="mega-item static">
                    <button class="mega-trigger flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-bold text-[15px] transition-colors" aria-haspopup="true">
                        Electronics
                        <svg class="chev w-4 h-4 transition-transform">
                            <use href="#i-chev" />
                        </svg>
                    </button>
                    <div class="mega-panel absolute left-0 right-0 top-full z-40">
                        <div class="max-w-7xl mx-auto px-6">
                            <div class="bg-white border border-line rounded-3xl shadow-sm mt-1 p-8 grid grid-cols-12 gap-8">
                                <div class="col-span-2">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Phones</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Smartphones</a></li>
                                        <li><a href="shop.html" class="link-u">Tablets</a></li>
                                        <li><a href="shop.html" class="link-u">Cases &amp; covers</a></li>
                                        <li><a href="shop.html" class="link-u">Power banks</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-2">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Computing</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Laptops</a></li>
                                        <li><a href="shop.html" class="link-u">Monitors</a></li>
                                        <li><a href="shop.html" class="link-u">Keyboards &amp; mice</a></li>
                                        <li><a href="shop.html" class="link-u">Routers</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-2">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Audio</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Earbuds</a></li>
                                        <li><a href="shop.html" class="link-u">Headphones</a></li>
                                        <li><a href="shop.html" class="link-u">Bluetooth speakers</a></li>
                                        <li><a href="shop.html" class="link-u">Smartwatches</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <a href="shop.html" class="block h-full rounded-2xl bg-primary p-5 text-white relative overflow-hidden">
                                        <span class="absolute -right-8 top-6 w-32 h-32 rounded-full bg-primary-200/80"></span>
                                        <span class="relative inline-block bg-accent text-ink text-xs font-bold px-2.5 py-1 rounded-full">Official warranty</span>
                                        <p class="relative font-display font-extrabold text-2xl leading-tight mt-3">New phones, 0% EMI up to 12 months</p>
                                        <span class="relative inline-block mt-4 font-bold underline underline-offset-4">Browse phones</span>
                                    </a>
                                </div>
                                <div class="col-span-3">
                                    <a href="shop.html" class="block h-full rounded-2xl bg-accent p-5 relative overflow-hidden">
                                        <span class="absolute -left-6 -bottom-6 w-28 h-28 rounded-full bg-accent"></span>
                                        <span class="relative inline-block bg-ink text-white text-xs font-bold px-2.5 py-1 rounded-full">Hot deal</span>
                                        <p class="relative font-display font-extrabold text-2xl leading-tight mt-3">Earbuds from ৳990</p>
                                        <span class="relative inline-block mt-4 font-bold underline underline-offset-4">Grab a pair</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Home & Living -->
                <li class="mega-item static">
                    <button class="mega-trigger flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-bold text-[15px] transition-colors" aria-haspopup="true">
                        Home &amp; Living
                        <svg class="chev w-4 h-4 transition-transform">
                            <use href="#i-chev" />
                        </svg>
                    </button>
                    <div class="mega-panel absolute left-0 right-0 top-full z-40">
                        <div class="max-w-7xl mx-auto px-6">
                            <div class="bg-white border border-line rounded-3xl shadow-sm mt-1 p-8 grid grid-cols-12 gap-8">
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Furniture</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Beds &amp; mattresses</a></li>
                                        <li><a href="shop.html" class="link-u">Sofas &amp; chairs</a></li>
                                        <li><a href="shop.html" class="link-u">Desks &amp; storage</a></li>
                                        <li><a href="shop.html" class="link-u">Shelves</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Kitchen</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Cookware</a></li>
                                        <li><a href="shop.html" class="link-u">Appliances</a></li>
                                        <li><a href="shop.html" class="link-u">Dinnerware</a></li>
                                        <li><a href="shop.html" class="link-u">Storage boxes</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Decor</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Wall art</a></li>
                                        <li><a href="shop.html" class="link-u">Lighting</a></li>
                                        <li><a href="shop.html" class="link-u">Curtains &amp; rugs</a></li>
                                        <li><a href="shop.html" class="link-u">Plants &amp; planters</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <a href="shop.html" class="block h-full rounded-2xl bg-accent p-5 relative overflow-hidden">
                                        <span class="absolute -right-6 -bottom-6 w-28 h-28 rounded-full bg-primary"></span>
                                        <span class="relative inline-block bg-ink text-white text-xs font-bold px-2.5 py-1 rounded-full">Free assembly</span>
                                        <p class="relative font-display font-extrabold text-2xl leading-tight mt-3">Refresh your room for less</p>
                                        <span class="relative inline-block mt-4 font-bold underline underline-offset-4">Shop home</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Beauty -->
                <li class="mega-item static">
                    <button class="mega-trigger flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-bold text-[15px] transition-colors" aria-haspopup="true">
                        Beauty
                        <svg class="chev w-4 h-4 transition-transform">
                            <use href="#i-chev" />
                        </svg>
                    </button>
                    <div class="mega-panel absolute left-0 right-0 top-full z-40">
                        <div class="max-w-7xl mx-auto px-6">
                            <div class="bg-white border border-line rounded-3xl shadow-sm mt-1 p-8 grid grid-cols-12 gap-8">
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Skincare</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Cleansers</a></li>
                                        <li><a href="shop.html" class="link-u">Moisturizers</a></li>
                                        <li><a href="shop.html" class="link-u">Sunscreen</a></li>
                                        <li><a href="shop.html" class="link-u">Serums</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Makeup</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Lips</a></li>
                                        <li><a href="shop.html" class="link-u">Eyes</a></li>
                                        <li><a href="shop.html" class="link-u">Face</a></li>
                                        <li><a href="shop.html" class="link-u">Nails</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Hair &amp; body</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Shampoo &amp; oil</a></li>
                                        <li><a href="shop.html" class="link-u">Perfume &amp; attar</a></li>
                                        <li><a href="shop.html" class="link-u">Grooming for men</a></li>
                                        <li><a href="shop.html" class="link-u">Body care</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <a href="shop.html" class="block h-full rounded-2xl bg-primary p-5 text-white relative overflow-hidden">
                                        <span class="absolute -left-6 -top-6 w-28 h-28 rounded-full bg-primary"></span>
                                        <span class="relative inline-block bg-white text-primary text-xs font-bold px-2.5 py-1 rounded-full">100% authentic</span>
                                        <p class="relative font-display font-extrabold text-2xl leading-tight mt-3">Skincare sets, buy 2 get 1</p>
                                        <span class="relative inline-block mt-4 font-bold underline underline-offset-4">Shop beauty</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Grocery -->
                <li class="mega-item static">
                    <button class="mega-trigger flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-bold text-[15px] transition-colors" aria-haspopup="true">
                        Grocery
                        <svg class="chev w-4 h-4 transition-transform">
                            <use href="#i-chev" />
                        </svg>
                    </button>
                    <div class="mega-panel absolute left-0 right-0 top-full z-40">
                        <div class="max-w-7xl mx-auto px-6">
                            <div class="bg-white border border-line rounded-3xl shadow-sm mt-1 p-8 grid grid-cols-12 gap-8">
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Fresh</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Fruits</a></li>
                                        <li><a href="shop.html" class="link-u">Vegetables</a></li>
                                        <li><a href="shop.html" class="link-u">Fish &amp; meat</a></li>
                                        <li><a href="shop.html" class="link-u">Eggs &amp; dairy</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Pantry</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Rice, dal &amp; oil</a></li>
                                        <li><a href="shop.html" class="link-u">Spices</a></li>
                                        <li><a href="shop.html" class="link-u">Snacks</a></li>
                                        <li><a href="shop.html" class="link-u">Tea &amp; coffee</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <h3 class="font-display font-extrabold text-lg mb-3">Household</h3>
                                    <ul class="grid gap-2 text-[15px]">
                                        <li><a href="shop.html" class="link-u">Cleaning</a></li>
                                        <li><a href="shop.html" class="link-u">Tissue &amp; paper</a></li>
                                        <li><a href="shop.html" class="link-u">Baby care</a></li>
                                        <li><a href="shop.html" class="link-u">Pet supplies</a></li>
                                    </ul>
                                </div>
                                <div class="col-span-3">
                                    <a href="shop.html" class="block h-full rounded-2xl bg-accent p-5 relative overflow-hidden">
                                        <span class="absolute -right-6 -bottom-6 w-28 h-28 rounded-full bg-accent"></span>
                                        <span class="relative inline-block bg-ink text-white text-xs font-bold px-2.5 py-1 rounded-full">Same-day</span>
                                        <p class="relative font-display font-extrabold text-2xl leading-tight mt-3">Order by 2 PM, get it today</p>
                                        <span class="relative inline-block mt-4 font-bold underline underline-offset-4">Start shopping</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li><a href="shop.html" class="block px-4 py-2.5 rounded-xl font-bold text-[15px] hover:bg-primary-soft">Sports</a></li>

                <li class="ml-auto">
                    <a href="track.html" class="flex items-center gap-2 px-4 py-2.5 rounded-xl font-bold text-[15px] border-2 border-line hover:border-primary hover:text-primary hover:bg-primary-soft transition-colors">
                        <svg viewBox="0 0 24 24" class="w-5 h-5" aria-hidden="true">
                            <path fill="currentColor" d="M3 7h11v8H3zM14 10h4l3 3v2h-7z" />
                            <circle cx="7" cy="17" r="2" fill="currentColor" />
                            <circle cx="17" cy="17" r="2" fill="currentColor" />
                        </svg>
                        Track order
                    </a>
                </li>

                <li>
                    <a href="shop.html" class="flex items-center gap-2 px-4 py-2.5 rounded-xl font-extrabold text-[15px] bg-primary text-white hover:brightness-95">
                        Flash deals <span class="bg-accent text-ink text-[11px] px-1.5 py-0.5 rounded-md">HOT</span>
                    </a>
                </li>

            </ul>

        </div>

    </nav>

</header>
