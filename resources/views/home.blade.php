@extends('layouts.app')
@section('title', 'The Last Deals - The Best Coupons, Promo Codes & Cash Back Offers')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-title-home-1">Shop Now With Thousands Of Discount Codes</p>
                <p class="text-title-home-2">Huge savings with a completely free discount code constantly updated,
                    over the world</p>
            </div>
            <div class="col-12 mt-4">
                <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Banner/Epomaker%20baner.jpg"
                                    class="d-block w-100" alt="Epomaker" title="Epomaker">
                            </a>
                        </div>

                        <div class="carousel-item">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Logo%20Store/Snogo%20Straws(1).png"
                                    class="d-block w-100" alt="Snogo Straws" title="Snogo Straws">
                            </a>
                        </div>

                        <div class="carousel-item">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Banner/Moft%20baner.jpg"
                                    class="d-block w-100" alt="Moft" title="Moft">
                            </a>
                        </div>

                        <div class="carousel-item">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Banner/Game%20of%20Bricks.png"
                                    class="d-block w-100" alt="Game of Bricks" title="Game of Bricks">
                            </a>
                        </div>

                        <div class="carousel-item">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Banner/Kiyo%20Studios.png"
                                    class="d-block w-100" alt="Kiyo Studios" title="Kiyo Studios">
                            </a>
                        </div>

                        <div class="carousel-item">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Banner/Gupta%20Program.png"
                                    class="d-block w-100" alt="Gupta Program" title="Gupta Program">
                            </a>
                        </div>

                        <div class="carousel-item">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Banner/Frontline%20Foam.png"
                                    class="d-block w-100" alt="Frontline Foam" title="Frontline Foam">
                            </a>
                        </div>

                        <div class="carousel-item">
                            <a href="" target="_blank">
                                <img src="https://flashdeales.com/uploads/files/Banner/Tribal%20Chimp.png"
                                    class="d-block w-100" alt="Tribal Chimp" title="Tribal Chimp">
                            </a>
                        </div>

                    </div>

                    <!-- Điều khiển chuyển slide -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Trước</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Tiếp</span>
                    </button>

                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="5"
                            aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="6"
                            aria-label="Slide 7"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="7"
                            aria-label="Slide 8"></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="home bg-home position-relative">
        <div class="container home-one">
            <h3 class="pb-2 pt-5">Popular Store</h3>
            <div class="row mb-5">
                <div class="col-12">
                    {{-- <div class="main-carousel" id="mainCaru-home">
                        <div class="carousel-cell">
                            <img width="150" height="150" src="https://flashdeales.com/uploads/images/monica.png"
                                alt="Monica">
                            <p class="text-center mb-0">Monica</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="1" data-href="https://flashdeales.com/store/monica"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150" src="https://flashdeales.com/uploads/files/images.png"
                                alt="YD Select">
                            <p class="text-center mb-0">YD Select</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="2" data-href="https://flashdeales.com/store/yd-selectth"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150" src="https://flashdeales.com/uploads/images/g2a.jpg"
                                alt="G2A">
                            <p class="text-center mb-0">G2A</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="3" data-href="https://flashdeales.com/store/g2aq"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/308128111_527073629418428_4874737275768351583_n.jpg"
                                alt="DoorStepInk">
                            <p class="text-center mb-0">DoorStepInk</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="4" data-href="https://flashdeales.com/store/doorstepinkth"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/395409286_708696027951116_3232131106006092652_n.jpg"
                                alt="RDX Sports">
                            <p class="text-center mb-0">RDX Sports</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="5" data-href="https://flashdeales.com/store/rdx-sports-th"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/images/Seibertron.jpg" alt="Seibertron">
                            <p class="text-center mb-0">Seibertron</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="6" data-href="https://flashdeales.com/store/seibertront"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/431823527_816892120479223_7654837692661503612_n.jpg"
                                alt="Ellana Cosmetics">
                            <p class="text-center mb-0">Ellana Cosmetics</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="7" data-href="https://flashdeales.com/store/ellana-cosmetics-q"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/theClothesRak.jpg" alt="theClothesRak">
                            <p class="text-center mb-0">theClothesRak</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="8" data-href="https://flashdeales.com/store/theclothesrakm"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/Gudsen%20MOZA.jpg" alt="Gudsen MOZA">
                            <p class="text-center mb-0">Gudsen MOZA</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="9" data-href="https://flashdeales.com/store/gudsen-mozam"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150" src="https://flashdeales.com/uploads/files/Mosslab.jpg"
                                alt="Mosslab">
                            <p class="text-center mb-0">Mosslab</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="10" data-href="https://flashdeales.com/store/mosslabm"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/431823527_816892120479223_7654837692661503612_n.jpg"
                                alt="Ellana Cosmetics">
                            <p class="text-center mb-0">Ellana Cosmetics</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="11" data-href="https://flashdeales.com/store/ellana-cosmeticsa"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/235252919_192450099609112_4972493814979361605_n.png"
                                alt="Watchbandt">
                            <p class="text-center mb-0">Watchbandt</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="12" data-href="https://flashdeales.com/store/watchbandth"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/DoubleSix%20Dice.png" alt="DoubleSix Dice">
                            <p class="text-center mb-0">DoubleSix Dice</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="13" data-href="https://flashdeales.com/store/doublesix-dicem"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150"
                                src="https://flashdeales.com/uploads/files/261091761_323176255996555_5072758232391530185_n.jpg"
                                alt="XNDOLL">
                            <p class="text-center mb-0">XNDOLL</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="14" data-href="https://flashdeales.com/store/xndollt"></div>
                        </div>
                        <div class="carousel-cell">
                            <img width="150" height="150" src="https://flashdeales.com/uploads/files/1.jpg"
                                alt="Lamtto">
                            <p class="text-center mb-0">Lamtto</p>
                            <div style="position:absolute;right:0;bottom:0;" class="go-clicker go-redirection go-bnrclk"
                                data-pos="15" data-href="https://flashdeales.com/store/lamttot"></div>
                        </div>
                    </div> --}}
                    <div id="carouselLogos" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach ($latestStores->chunk(4) as $chunkIndex => $chunk)
                                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                    <div class="d-flex justify-content-center flex-wrap">
                                        @foreach ($chunk as $store)
                                            <div class="text-center p-3">
                                                <a href="{{ route('view.index', ['slug' => $store->slug]) }}">
                                                    <img src="{{ asset('storage/' . $store->image) }}" width="150"
                                                        height="150" alt="{{ $store->name }}">
                                                    <p class="mb-0">{{ $store->name }}</p>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Nút điều khiển màu đen -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselLogos"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselLogos"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <h3 class="pb-2 pt-2">Offers Of Today
                <a href="/" style="float: right;"> Offers </a>
            </h3>
            <div class="row mb-2">
                @foreach ($latestOffers as $offer)
                    @php
                        $store = $offer->store;
                        $storeSlug = $store->slug ?? null;
                        $storeName = $store->name ?? 'Store';
                        $storeImg =
                            $store && $store->image
                                ? asset('storage/' . $store->image)
                                : asset('images/placeholder-store.png');
                        $offerText = $offer->offer ?: $offer->code ?: 'Offer';
                        $offerDesc = $offer->description ?: $offerText;
                        $offerColor = $offer->color ?: '#FFFFFF';
                    @endphp
                    <div class="col-6 col-md-2 px-1 mb-2">
                        <div class="card h-100 border">
                            <div class="aspect-ratio-1">
                                <img class="obj-img lazyloaded" src="{{ $storeImg }}"
                                    alt="{{ $storeName }} {{ $offerText }}">
                            </div>
                            <span class="tranding"><i class="fa fa-bolt"></i></span>
                            <div class="card-body d-flex flex-column p-2">
                                <p class="line-3 mb-2 p-title" style="font-size: .9rem;font-weight: 700;">
                                    {{ $storeName }} </p>
                                <a target="_blank" rel="nofollow"
                                    title="Troveluna-23% OFF-Long Sleeve Blouse &amp; High-Waist Pants Outfit Fashion Streetwear"
                                    href="{{ $storeSlug ? route('view.index', ['slug' => $storeSlug]) : '#' }}"
                                    class="btn btn-outline-secondary btn-sm btn-block">
                                    Get Offers
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3 class="pb-2 pt-2">Deals Of Today
                <a href="/" style="float: right;"> Deals </a>
            </h3>
            <div class="row mb-2">
                @foreach ($latestDeals as $deal)
                    @php
                        $store = $deal->store;
                        $dealSlug = $store->slug ?? null;
                        $dealName = $store->name ?? 'Store';
                        $dealImg =
                            $deal && $deal->image
                                ? asset('storage/' . $deal->image)
                                : asset('images/placeholder-store.png');
                        $dealText = $deal->name ?: 'Deal';
                        $dealDesc = $deal->short_description;
                        $dealDescShort = $deal->description;
                        $dealColor = $deal->color ?: '#FFFFFF';
                    @endphp
                    <div class="col-6 col-md-2 px-1 mb-2">
                        <div class="card h-100 border">
                            <div class="aspect-ratio-1">
                                <img class="obj-img lazyloaded" src="{{ $dealImg }}" alt="{{ $dealText }}">
                            </div>
                            <span class="tranding"><i class="fa fa-bolt"></i></span>
                            <div class="card-body d-flex flex-column p-2">
                                <p class="line-3 mb-2 p-title" style="font-size: .9rem;font-weight: 700;">
                                    {{ $dealDescShort }} </p>
                                <p class="d-flex mt-auto mb-0">
                                    <span>
                                        <s class="small text-danger">$101</s>
                                        <label class="h6 m-1 text-success">$78</label>
                                    </span>
                                    <span class="ml-auto text-secondary favorite-btn" style="z-index: 2">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </span>
                                </p>
                                <a target="_blank" rel="nofollow"
                                    title="Troveluna-23% OFF-Long Sleeve Blouse &amp; High-Waist Pants Outfit Fashion Streetwear"
                                    href="{{ $dealSlug ? route('view.index', ['slug' => $dealSlug]) : '#' }}"
                                    class="btn btn-outline-secondary btn-sm btn-block">
                                    Get Deal
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <h3 class="pb-2 pt-5">Feature Post</h3>
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card-deck home-card">
                        <div class="card mx-1 mb-4">
                            <div class="aspect-ratio-169">
                                <img class="obj-img lazyloaded"
                                    src="/uploads/files/305261265_473227944819014_3321636275663858155_n.png"
                                    alt="Review of NizKeyboard: Elevate Your Typing Experience">
                            </div>
                            <div class="card-body p-2 d-flex flex-column">
                                <h3 class="card-title">Review of NizKeyboard: Elevate Your Typing Experience</h3>
                                <p class="card-text">If you&#039;re in the market for a high-quality mechanical
                                    keyboard that combines cutting-edge technology with sleek design, look no further
                                    than NizKeyboard. This brand has...</p>
                                <button class="mt-auto btn btn-block border-top text-secondary">
                                    Continue Reading
                                </button>
                            </div>
                            <a class="overlay"
                                href="https://flashdeales.com/blog/review-of-nizkeyboard-elevate-your-typing-experience"></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-center mt-3">
                        <a class="btn btn-outline-info" href="https://flashdeales.com/blog" title="Read more blog">View
                            All Articles</a>
                    </p>
                </div>
            </div> --}}
            <h3 class="pb-2 pt-5">All Categories</h3>
            <div class="row mb-4">
                <div class="col-12">
                    @foreach ($headerCategories as $cat)
                        <a class="btn btn-light mb-2 me-2 border border-1 bg-white"
                            href="/">{{ $cat->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
