@extends('layout.home')
@section('content')
<main id="main" class="" style="padding: 30px">
    <div class="container section-title-container">
        <h2 class="section-title section-title-normal"><b></b><span class="section-title-main">Sản phẩm đang tìm kiếm</span><b></b></h2>
    </div>
<div class="row products large-columns-5 medium-columns-3 small-columns-1 row-small">
    @foreach($product as $key=>$val)
    <div
        class="product-small col has-hover product type-product post-48847 status-publish first instock product_cat-banh-thuong-cho has-post-thumbnail shipping-taxable purchasable product-type-simple">
        <div class="col-inner">
            <div class="badge-container absolute left top z-1">
            </div>
            <div class="product-small box ">
                <div class="box-image">
                    <div class="image-none">
                        <a href="{{url('home/'.$val->slug)}}"
                            aria-label="Bánh thưởng cho chó vị sữa VEGEBRAND Mini Milky Bone">
                            <img width="300" height="300"
                                src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%20300%20300%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E"
                                data-src="{{asset('product/thumbnails/'.$val->gallery[0]->image)}}"
                                class="lazy-load attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                alt="Bánh thưởng cho chó vị sữa Vegebrand Mini Milky Bone" loading="lazy" srcset=""
                                data-srcset="{{asset('product/thumbnails/'.$val->gallery[0]->image)}}"
                                sizes="(max-width: 300px) 100vw, 300px" title="PET MART 4"> </a>
                    </div>
                    <div class="image-tools is-small top right show-on-hover">
                    </div>
                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                    </div>
                </div>
                <div class="box-text box-text-products">
                    <div class="title-wrapper">
                        <p class="name product-title woocommerce-loop-product__title"><a
                                href="{{url('home/'.$val->slug)}}"
                                class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{$val->name}}</a></p>
                    </div>
                    <div class="price-wrapper">
                        <div class="star-rating"><span style="width:0%">Được xếp hạng <strong class="rating">0</strong> 5 sao</span></div>
                        <span class="price"><span
                                class="woocommerce-Price-amount amount"><bdi>{{number_format($val->price),0,',','.'}}&nbsp;<span
                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
                    </div>
                </div>
            </div>
            {{-- <span class="gtm4wp_productdata" style="display:none; visibility:hidden;" data-gtm4wp_product_id="48847"
                data-gtm4wp_product_name="Bánh thưởng cho chó vị sữa VEGEBRAND Mini Milky Bone"
                data-gtm4wp_product_price="50000" data-gtm4wp_product_cat="Bánh thưởng cho chó"
                data-gtm4wp_product_url="{{url('home/'.$val->slug)}}"
                data-gtm4wp_product_listposition="1" data-gtm4wp_productlist_name="General Product List"
                data-gtm4wp_product_stocklevel="" data-gtm4wp_product_brand=""></span> --}}
        </div>
    </div>
    @endforeach
</div>
</main>
@endsection

