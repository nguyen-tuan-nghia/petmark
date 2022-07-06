@extends('layout.home')
@section('content')
    @include('public.banner')
    <main id="main" class="">
        <div class="container section-title-container">
            <h2 class="section-title section-title-normal"><b></b><span class="section-title-main">các sản phẩm bán
                    chạy</span><b></b></h2>
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
                                    aria-label="">
                                    <img width="300" height="300"
                                        src="{{asset('product/thumbnails/'.$val->gallery[0]->image)}}"
                                        data-src="{{asset('product/thumbnails/'.$val->gallery[0]->image)}}"
                                        class="lazy-load attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                        alt="" loading="lazy" srcset=""
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
                        data-gtm4wp_product_name=""
                        data-gtm4wp_product_price="50000" data-gtm4wp_product_cat="Bánh thưởng cho chó"
                        data-gtm4wp_product_url="{{url('home/'.$val->slug)}}"
                        data-gtm4wp_product_listposition="1" data-gtm4wp_productlist_name="General Product List"
                        data-gtm4wp_product_stocklevel="" data-gtm4wp_product_brand=""></span> --}}
                </div>
            </div>
            @endforeach
        </div>
        </div>
        <div class="container section-title-container">
            <h2 class="section-title section-title-normal"><b></b><span class="section-title-main">địa chỉ hệ thống cửa
                    hàng</span><b></b></h2>
        </div>
        <div class="row row-small dnw-box-shadow" id="row-1807101465">
            <div id="col-704129" class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <h2>Pet Mart tại Hà Nội</h2>
                    <ul>
                        <li><strong>3 Đại Cồ Việt</strong>, Phường Cầu Dền, Quận Hai Bà Trưng</li>
                        <li><strong>476 Minh Khai</strong>, Phường Vĩnh Tuy, Quận Hai Bà Trưng</li>
                        <li><strong>83 Nghi Tàm</strong>, Phường Yên Phụ, Quận Tây Hồ</li>
                        <li><strong>206 Kim Mã</strong>, Phường Kim Mã, Quận Ba Đình</li>
                        <li><strong>18 Chả Cá</strong>, Phường Hàng Đào, Quận Hoàn Kiếm</li>
                        <li><strong>242 Nguyễn Trãi</strong>, Phường Thanh Xuân Trung, Quận Thanh Xuân</li>
                        <li><strong>290 Nguyễn Văn Cừ</strong>, Phường Bồ Đề, Quận Long Biên</li>
                        <li><strong>Villa E10 Đỗ Đình Thiện</strong>, Phường Mỹ Đình, Quận Nam Từ Liêm</li>
                        <li><strong>81 Quang Trung</strong>, Phường Quang Trung, Quận Hà Đông</li>
                    </ul>
                    <h2>Pet Mart tại Đà Nẵng</h2>
                    <ul>
                        <li><strong>151 Nguyễn Văn Linh</strong>, Phường Nam Dương, Quận Hải Châu</li>
                    </ul>
                    <h2>Pet Mart tại Hải Phòng</h2>
                    <ul>
                        <li><strong>129 Tô Hiệu</strong>, Phường Trại Cau, Quận Lê Chân</li>
                    </ul>
                </div>
            </div>
            <div id="col-1781722985" class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <h2>Pet Mart tại TP. Hồ Chí Minh</h2>
                    <ul>
                        <li><strong>116 Ba Tháng Hai</strong>, Phường 12, Quận 10</li>
                        <li><strong>341 Nguyễn Trãi</strong>, Phường 7, Quận 5</li>
                        <li><strong>244 Khánh Hội</strong>, Phường 6, Quận 4</li>
                        <li><strong>312 Quang Trung</strong>, Phường 10, Quận Gò Vấp</li>
                        <li><strong>892 Cách Mạng Tháng 8</strong>, Phường 5, Quận Tân Bình</li>
                        <li><strong>222 Phan Đăng Lưu</strong>, Phường 3, Quận Phú Nhuận</li>
                        <li><strong>180 Hậu Giang</strong>, Phường 6, Quận 6</li>
                        <li><strong>179 Xô Viết Nghệ Tĩnh</strong>, Phường 17, Quận Bình Thạnh</li>
                        <li><strong>359 Lũy Bán Bích</strong>, Phường Hiệp Tân, Quận Tân Phú</li>
                        <li><strong>167 Lê Đại Hành</strong>, Phường 13, Quận 11</li>
                        <li><strong>266 Võ Văn Ngân</strong>, Phường Bình Thọ, Quận Thủ Đức</li>
                        <li><strong>14P Quốc Hương</strong>, Phường Thảo Điền, Quận 2</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container section-title-container">
            <h2 class="section-title section-title-normal"><b></b><span class="section-title-main">những bài viết hữu
                    ích</span><b></b></h2>
        </div>
        <div class="row dnw-box-shadow large-columns-3 medium-columns- small-columns-1 has-shadow row-box-shadow-1">
            <div class="col post-item">
                    @foreach ($post as $key)
                        <div class="col post-item">
                            <div class="col-inner">
                                <a href="{{ url('tin-tuc/' . $key->slug) }}" class="plain">
                                    <div class="box box-text-bottom box-blog-post has-hover">
                                        <div class="box-image">
                                            <div class="image-cover" style="padding-top:56%;">
                                                <img width="764" height="400" src="{{ asset('post/' . $key->image) }}"
                                                    alt="{{ $key->name }}" sizes="(max-width: 764px) 100vw, 764px">
                                            </div>
                                        </div>
                                        <div class="box-text text-left">
                                            <div class="box-text-inner blog-post-inner">
                                                <h5 class="post-title is-large ">{{ $key->name }}</h5>
                                                <div class="is-divider"></div>
                                                <p class="from_the_blog_excerpt ">Giống chó Alaskan Malamute hay chó
                                                    Alaska,
                                                    là một trong những giống chó kéo xe ... </p>
                                            </div>
                                        </div>
                                        <div class="badge absolute top post-date badge-square">
                                            <div class="badge-inner">
                                                <span class="post-date-day">18</span><br>
                                                <span class="post-date-month is-xsmall">Th2</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>

        </div>
    </main>
@endsection
