@extends('layouts.app')
@section('title', 'The Last Deals - The Best Coupons, Promo Codes & Cash Back Offers')
@section('content')
    <section class="position-relative container-codes">
        <div class="container">
            <div class="row pt-5">
                <div class="col-xs-12 col-lg-3 bi">
                    <div class="shadow-sm bp">
                        <div class="logo">
                            <img src="{{ asset('storage/' . $deal->image) }}" title="Monica Coupons"
                                alt="Monica Coupons and Promo Code">
                        </div>
                        <a class="js-common-log-click go-store" data-click-log-flag="code-top-go-store" href="#!"
                            rel="nofollow" target="_blank">{{ $deal->name }}</a>
                        <div class="vote">
                            <div class="rate-yo jq-ry-container" data-rating="5.0" data-star-width="23px" data-read-only="1"
                                readonly="readonly" style="width: 115px;">
                                <div class="jq-ry-group-wrapper">
                                    <div class="jq-ry-normal-group jq-ry-group">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="gray">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="gray">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="gray">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="gray">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="gray">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                    </div>
                                    <div class="jq-ry-rated-group jq-ry-group" style="width: 100%;">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="#f39c12">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="#f39c12">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                            x="0px" y="0px" xml:space="preserve" width="23px" height="23px"
                                            fill="#f39c12">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                            width="23px" height="23px" fill="#f39c12">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                            width="23px" height="23px" fill="#f39c12">
                                            <polygon
                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                            </polygon>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p itemprop="ratingValue"> 5.0 </p>
                            <p>&nbsp;&nbsp;/&nbsp;&nbsp;</p>
                            <p itemprop="ratingCount">2,677</p>
                            <p>&nbsp;&nbsp;votes&nbsp;&nbsp;</p>
                            <button class="btn btn-rate js-btn-rate js-common-log-click"
                                data-click-log-flag="pc_brand_rate_it" data-target="#modal-brand-vote"
                                data-haslogin="false" data-toggle="modal" data-cookie-key="wish.com-rate"
                                data-website="wish.com">Rate it
                            </button>
                        </div>
                        <button class="btn btn-outline-primary btn-coupon-group btn-coupon-alert js-common-log-click"
                            data-click-log-flag="pc_brand_get_coupon_alert" data-toggle="modal"
                            data-target="#modal-newsletter">&nbsp;&nbsp;&nbsp;&nbsp;Get Coupon Alert
                        </button>
                    </div>
                    {{-- <div class="container-popular-brand">
                        <div class="shadow-sm brand-coupon-info">
                            <div class="coupon-info">
                                <p class="title">
                                    0 Coupons, 4 Verified Coupons
                                </p>
                                <table class="merchant-stats">
                                    <tbody>
                                        <tr>
                                            <td class="merchant-title">Coupon Codes</td>
                                            <td class="merchant-data"> 0</td>
                                        </tr>
                                        <tr>
                                            <td class="merchant-title">Deals</td>
                                            <td class="merchant-data">4</td>
                                        </tr>
                                        <tr>
                                            <td class="merchant-title">Best Offer</td>
                                            <td class="merchant-data">33% OFF</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="shop-link"></div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-xs-12 col-lg-9 cl">
                    <h3 class="pb-2">{{ $deal->name }}</h3>
                    <div class="rich-content-show-hide mb-2">
                        <p>{!! $deal->description !!}</p>
                    </div>
                    <div class="coupon-filter">
                        <div class="filter-panel">
                            <div class="filter-item js-common-log-click" data-click-log-flag="pc_brand_tab_all"
                                data-filter-type="all">
                                All
                            </div>
                        </div>
                    </div>
                    <div class="js-normal">
                        @forelse ($offers as $offer)
                            <article
                                class="shadow-sm rounded cp js-filter js-filter-coupon-type-verify js-filter-coupon-type-deals"
                                data-brand-flag="all" data-filter-flag="0" data-old-position="1">
                                <div class="deal">
                                    <div class="deal-info benefit-code">
                                        <div class="discount">
                                            {{ $offer->offer }}
                                        </div>
                                    </div>
                                    <div class="deal-desc" id="cpid-6878">
                                        <div class="type-deal">
                                            <span>Verified Code</span>
                                        </div>
                                        <h2 class="title">
                                            <a href="{{ $offer->url }}" target="_blank">
                                                {{ $offer->short_description }}
                                            </a>
                                        </h2>
                                        <div class="last-click-time-wrap mb-2">
                                            <span class="title">Don't miss out! For today time only, you can enjoy huge
                                                price
                                                discounts with this Monica coupon.</span>
                                        </div>
                                        <div class="get-deal">
                                            <a href="{{ $offer->url }}" class="" target="_blank">
                                                Get Offer
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p>No offers available at the moment.</p>
                        @endforelse
                    </div>
                    <div class="people-also-ask-container">
                        <h2 class="people-also-ask-title"> About store </h2>
                        {!! $deal->about_store !!}
                    </div>
                    <div class="people-also-ask-container">
                        <h2 class="people-also-ask-title"> How to apply Monica coupon codes</h2>
                        {!! $deal->how_to_apply !!}

                    </div>
                    <div class="people-also-ask-container">
                        <h2 class="people-also-ask-title">Monica Questions &amp; Answers</h2>
                        {!! $deal->faqs !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
