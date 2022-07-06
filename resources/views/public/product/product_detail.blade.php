@extends('layout.home')
@section('content')
    <link rel="stylesheet" href="{{ asset('client/css/lightslider.css') }}" />
    <style>
        ul {
            list-style: none outside none;
            padding-left: 0;
            margin: 0;
        }

        .demo .item {
            margin-bottom: 60px;
        }

        .content-slider li {
            background-color: #ed3020;
            text-align: center;
            color: #FFF;
        }

        .content-slider h3 {
            margin: 0;
            padding: 70px 0;
        }

        .demo {
            width: 800px;
        }

    </style>
    <div class="page-title shop-page-title product-page-title">
        <div class="page-title-inner flex-row medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <div class="is-small">
                    <nav class="woocommerce-breadcrumb breadcrumbs "><a href="#">Đặt mua
                            hàng
                            Online</a> <span class="divider">/</span>
                            @if($category->count()==1)
                            @foreach($category as $item)
                            <a href="{{url('danh-muc/'.$item->slug)}}">{{$item->name}}</a> <span class="divider">/</span>
                            @endforeach
                            @else
                            @foreach($category as $item)
                            @if($item->category_parent==0)
                            <a href="{{url('danh-muc/'.$item->slug)}}">{{$item->name}}</a> <span class="divider">/</span>
                            @foreach($category as $item2)
                            @if($item2->category_parent==$item->id)
                            <a href="{{url('danh-muc/'.$item2->slug)}}">{{$item2->name}}</a> <span class="divider">/</span>
                            @foreach($category as $item3)
                            @if($item3->category_parent==$item2->id)
                            <a href="{{url('danh-muc/'.$item3->slug)}}">{{$item3->name}}</a>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <main id="main" class="">
        <div class="shop-container">
            <div class="container">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="category-filtering container text-center product-filter-row show-for-medium">
                    <a href="#product-sidebar" data-open="#product-sidebar" data-pos="left"
                        class="filter-button uppercase plain">
                        <i class="icon-equalizer"></i>
                        <strong>Xem danh mục</strong>
                    </a>
                </div>
            </div>
            <div id="product-109713"
                class="product type-product post-109713 status-publish first instock product_cat-thuc-an-hat-cho-cho has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="product-container product-stacked-custom">
                    <div class="product-main">
                        <div class="row mb-0 content-row">
                            <div class="product-gallery large-5 col">
                                <div class="row row-small">
                                    <div class="item">
                                        <div class="clearfix" style="max-width:474px;">
                                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                                @foreach ($product->gallery as $item)
                                                <li data-thumb="{{asset('product/thumbnails/'.$item->image)}}">
                                                    <img src="{{asset('product/thumbnails/'.$item->image)}}" />
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info summary col-fit col entry-summary product-summary text-left">
                                <div class="product-summary-custom">
                                    <h1 class="product-title product_title entry-title">
                                        {{$product->name}}</h1>
                                    {{-- <span class="sub-title-product">Thương hiệu <a
                                            href="https://www.petmart.vn/thuong-hieu/purina-pro-plan">PURINA PRO
                                            PLAN</a>
                                    </span> --}}
                                    <div class="woocommerce-product-rating">
                                        <div class=""><i class="fa-regular fa-star"></i><i
                                                class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i
                                                class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></div>
                                        <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span
                                                class="count">0</span> đánh giá của khách hàng)</a>
                                    </div>
                                    {{-- <a href="javascript:void(0);" class="devvn_buy_now devvn_buy_now_style"
                                        data-id="109713">
                                        <strong>Yêu cầu tư vấn</strong>
                                        <span>Gọi điện và giao hàng tận nơi</span>
                                    </a> --}}
                                </div>
                                <div class="buybox-wrapper">
                                    <div class="product-vitals">
                                        <div class="luyendev_single_price">
                                            <div>
                                                <span class="label">Giá bán:</span>
                                                <span class="luyendev_price luyendev_price_primary"><span
                                                        class="woocommerce-Price-amount amount"><bdi>{{number_format($product->price)}}&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">₫</span></bdi></span></span>
                                            </div>
                                        </div>
                                        <div class="product-code">Mã hàng: {{$product->id}}</div>
                                        <div class="availability">
                                            <div class="stock">Còn hàng</div>
                                        </div>
                                        <div class="nl-attribute-buttons">
                                        </div>
                                    </div>
                                    <div id="buybox" class="buybox">
                                        <div class="bordered">
                                            <div class="buybox__purchase">
                                                    <div class="quantity_select" style="float:left; margin-right:10px;">
                                                        <div class="buy-quantity--dropdown"><label for="quantity"
                                                                class="">Số lượng</label><select id="product_quantity{{$product->id}}"
                                                                name="quantity" title="Chọn số lượng"
                                                                class="qty">
                                                                <option value="1" selected="selected">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                            </select></div>
                                                    </div>
                                                    <button type="button" onclick="cartstore({{$product->id}})" name="add-to-cart" value="109713"
                                                        class="single_add_to_cart_button button alt">Thêm vào giỏ
                                                        hàng</button>
                                                        <input type="hidden" id="product_image{{$product->id}}" value="{{$product->gallery[0]->image}}">
                                                        <input type="hidden" id="product_price{{$product->id}}" value="{{$product->price}}">
                                                        <input type="hidden" id="product_name{{$product->id}}" value="{{$product->name}}">
                                                        <input type="hidden" id="product_slug{{$product->id}}" value="{{$product->slug}}">

                                                {{-- <a href="javascript:void(0);" class="devvn_buy_now devvn_buy_now_style"
                                                    data-id="109713">
                                                    <strong>Yêu cầu tư vấn</strong>
                                                    <span>Gọi điện và giao hàng tận nơi</span>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-bottom">
                        <section class="nl-tabs">
                            <div class="woocommerce-tabs wc-tabs-wrapper tabbed-content">
                                <ul class="tabs container wc-tabs product-tabs small-nav-collapse nav nav-uppercase nav-tabs nav-normal nav-left"
                                    role="tablist">
                                    <li class="description_tab active" id="tab-title-description" role="tab"
                                        aria-controls="tab-description">
                                        <a href="#tab-description">
                                            Mô tả </a>
                                    </li>
                                    {{-- <li class="reviews_tab" id="tab-title-reviews" role="tab"
                                        aria-controls="tab-reviews">
                                        <a href="#tab-reviews">
                                            Đánh giá (0) </a>
                                    </li> --}}
                                    <li class="ux_global_tab_tab" id="tab-title-ux_global_tab" role="tab"
                                        aria-controls="tab-ux_global_tab">
                                        <a href="#tab-ux_global_tab">
                                            Địa chỉ mua hàng </a>
                                    </li>
                                </ul>
                                <div class="tab-panels container">
                                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content active"
                                        id="tab-description" role="tabpanel" aria-labelledby="tab-title-description"
                                        style="">
                                        {!!$product->content!!}
                                    </div>
                                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--ux_global_tab panel entry-content "
                                        id="tab-ux_global_tab" role="tabpanel" aria-labelledby="tab-title-ux_global_tab"
                                        style="">
                                        <span class="nl-type__h1">Địa chỉ mua hàng</span>
                                        <div class="row row-small dnw-box-shadow" id="row-1079205484">
                                            <div id="col-1664307490" class="col medium-6 small-12 large-6">
                                                <div class="col-inner">
                                                    <h2>Pet Mart tại Hà Nội</h2>
                                                    <ul>
                                                        <li><strong>3 Đại Cồ Việt</strong>, Phường Cầu Dền, Quận Hai
                                                            Bà
                                                            Trưng</li>
                                                        <li><strong>476 Minh Khai</strong>, Phường Vĩnh Tuy, Quận
                                                            Hai Bà
                                                            Trưng</li>
                                                        <li><strong>83 Nghi Tàm</strong>, Phường Yên Phụ, Quận Tây
                                                            Hồ</li>
                                                        <li><strong>206 Kim Mã</strong>, Phường Kim Mã, Quận Ba Đình
                                                        </li>
                                                        <li><strong>18 Chả Cá</strong>, Phường Hàng Đào, Quận Hoàn
                                                            Kiếm</li>
                                                        <li><strong>242 Nguyễn Trãi</strong>, Phường Thanh Xuân
                                                            Trung, Quận
                                                            Thanh Xuân</li>
                                                        <li><strong>290 Nguyễn Văn Cừ</strong>, Phường Bồ Đề, Quận
                                                            Long Biên
                                                        </li>
                                                        <li><strong>Villa E10 Đỗ Đình Thiện</strong>, Phường Mỹ
                                                            Đình, Quận
                                                            Nam Từ Liêm</li>
                                                        <li><strong>81 Quang Trung</strong>, Phường Quang Trung,
                                                            Quận Hà
                                                            Đông</li>
                                                    </ul>
                                                    <h2>Pet Mart tại Đà Nẵng</h2>
                                                    <ul>
                                                        <li><strong>151 Nguyễn Văn Linh</strong>, Phường Nam Dương,
                                                            Quận Hải
                                                            Châu</li>
                                                    </ul>
                                                    <h2>Pet Mart tại Hải Phòng</h2>
                                                    <ul>
                                                        <li><strong>129 Tô Hiệu</strong>, Phường Trại Cau, Quận Lê
                                                            Chân</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="col-838416871" class="col medium-6 small-12 large-6">
                                                <div class="col-inner">
                                                    <h2>Pet Mart tại TP. Hồ Chí Minh</h2>
                                                    <ul>
                                                        <li><strong>116 Ba Tháng Hai</strong>, Phường 12, Quận 10
                                                        </li>
                                                        <li><strong>341 Nguyễn Trãi</strong>, Phường 7, Quận 5</li>
                                                        <li><strong>244 Khánh Hội</strong>, Phường 6, Quận 4</li>
                                                        <li><strong>312 Quang Trung</strong>, Phường 10, Quận Gò Vấp
                                                        </li>
                                                        <li><strong>892 Cách Mạng Tháng 8</strong>, Phường 5, Quận
                                                            Tân Bình
                                                        </li>
                                                        <li><strong>222 Phan Đăng Lưu</strong>, Phường 3, Quận Phú
                                                            Nhuận
                                                        </li>
                                                        <li><strong>180 Hậu Giang</strong>, Phường 6, Quận 6</li>
                                                        <li><strong>179 Xô Viết Nghệ Tĩnh</strong>, Phường 17, Quận
                                                            Bình
                                                            Thạnh</li>
                                                        <li><strong>359 Lũy Bán Bích</strong>, Phường Hiệp Tân, Quận
                                                            Tân Phú
                                                        </li>
                                                        <li><strong>167 Lê Đại Hành</strong>, Phường 13, Quận 11
                                                        </li>
                                                        <li><strong>266 Võ Văn Ngân</strong>, Phường Bình Thọ, Quận
                                                            Thủ Đức
                                                        </li>
                                                        <li><strong>14P Quốc Hương</strong>, Phường Thảo Điền, Quận
                                                            2</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="product-footer">
                        <div class="row row-large">
                            <div class="col large-12 products slider product-row-mobile">
                                <div class="related related-products-wrapper product-section">
                                    <h3
                                        class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
                                        Sản phẩm tương tự </h3>
                                    <div
                                        class="row equalize-box large-columns-5 medium-columns-3 small-columns-1 row-small">
                                        @foreach($product_all as $key=>$val)
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
                                                        <div
                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            <a href="?add-to-cart=48847" data-quantity="1"
                                                                class="add-to-cart-grid no-padding is-transparent product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                data-product_id="48847" data-product_sku="06190"
                                                                aria-label="Thêm &ldquo;Bánh thưởng cho chó vị sữa VEGEBRAND Mini Milky Bone&rdquo; vào giỏ hàng"
                                                                rel="nofollow">
                                                                <div class="cart-icon tooltip is-small" title="Thêm vào giỏ hàng"><strong>+</strong>
                                                                </div>
                                                            </a>
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
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="devvn-popup-quickbuy mfp-hide" id="popup_content_109713">
                    <div class="devvn-popup-inner">
                        <div class="devvn-popup-title">
                            <span>Thông tin yêu cầu tư vấn</span>
                            <button type="button" class="devvn-popup-close"></button>
                        </div>
                        <div class="devvn-popup-content devvn-popup-content_109713 ">
                            <div class="devvn-popup-content">
                                <form class="devvn_cusstom_info" id="devvn_cusstom_info" method="post"
                                    novalidate="novalidate">
                                    <div class="popup-customer-info">
                                        <div
                                            class="popup-customer-info-group popup-customer-info-radio popup-customer-gender">
                                            <label>
                                                <input type="radio" name="customer-gender" value="1" checked="">
                                                <span>Anh (Mr)</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="customer-gender" value="2">
                                                <span>Chị (Ms)</span>
                                            </label>
                                        </div>
                                        <div class="popup-customer-info-group">
                                            <div class="popup-customer-info-item-2 popup-customer-info-name">
                                                <input type="text" class="customer-name" name="customer-name"
                                                    placeholder="Họ và tên">
                                            </div>
                                            <div class="popup-customer-info-item-2 popup-customer-info-phone">
                                                <input type="number" class="customer-phone" name="customer-phone"
                                                    id="your-phone-1651470757" placeholder="Số điện thoại">
                                            </div>
                                        </div>
                                        <div class="popup-customer-info-group">
                                            <div class="popup-customer-info-item-1">
                                                <textarea class="customer-address" name="customer-address" placeholder="Địa chỉ "></textarea>
                                            </div>
                                        </div>
                                        <div class="popup-customer-info-group">
                                            <div class="popup-customer-info-item-1">
                                                <textarea class="order-note" name="order-note" placeholder="Ghi chú thêm yêu cầu (nếu có)"></textarea>
                                            </div>
                                        </div>
                                        <div class="popup-customer-info-group">
                                            <div class="popup-customer-info-item-1 popup_quickbuy_shipping">
                                                <div class="popup_quickbuy_shipping_title">Tổng:</div>
                                                <div class="popup_quickbuy_total_calc"></div>
                                            </div>
                                        </div>
                                        <div class="popup-customer-info-group popup-infor-submit">
                                            <div class="popup-customer-info-item-1">
                                                <button type="button" class="devvn-order-btn">GỬI THÔNG TIN
                                                    NGAY</button>
                                            </div>
                                        </div>
                                        <div class="popup-customer-info-group">
                                            <div class="popup-customer-info-item-1">
                                                <div class="devvn_quickbuy_mess"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="prod_id" id="prod_id" value="109713">
                                    <input type="hidden" name="prod_nonce" id="prod_nonce" value="">
                                    <input type="hidden" name="order_total" id="order_total" value="">
                                    <input type="hidden" name="enable_ship" id="enable_ship" value="1">
                                    <input name="require_address" id="require_address" type="hidden" value="1">
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
    <script src="{{ asset('client/js/lightslider.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop: true,
                keyPress: true
            });
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 9,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endsection
