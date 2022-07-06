@extends('layout.home')
@section('content')
<style>
    .danhmuc{
        display: flex;
  flex-wrap: nowrap;

  }
</style>
    <div class="ads-grid" style="padding: 30px">
        <div class="container row danhmuc">
            <!-- tittle heading -->
            {{-- <h3 class="tittle-w3l">{{ $category->name }}
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3> --}}
            <!-- //tittle heading -->
            <!-- product left -->
            <div class="col-md-3" style="padding-right: 30px">
                <div class="left-side">
                    <h3 class="agileits-sear-head">lọc theo giá</h3>
                    <ul style="list-style: none;">
                        <li>
                            <input type="checkbox" id="Check1" onclick="selected(this.id,10000,30000)"
                                class="checked">
                            <span class="span">10.000 - 30.000 vnđ</span>
                        </li>
                        <li>
                            <input type="checkbox" id="Check2" onclick="selected(this.id,30000,60000)"
                                class="checked">
                            <span class="span">30.000 - 60.000 vnđ</span>
                        </li>
                        <li>
                            <input type="checkbox" id="Check3" onclick="selected(this.id,60000,90000)"
                                class="checked">
                            <span class="span">60.000 - 90.000 vnđ</span>
                        </li>
                        <li>
                            <input type="checkbox" id="Check4" onclick="selected(this.id,90000,150000)"
                                class="checked">
                            <span class="span">90.000 - 150.000 vnđ</span>
                        </li>
                        <li>
                            <input type="checkbox" id="Check5" onclick="selected(this.id,150000,200000)"
                                class="checked">
                            <span class="span">150.000 - 200.000 vnđ</span>
                        </li>
                        <li>
                            <input type="checkbox" id="Check6" onclick="selected(this.id,200000,1000000000000)" class="checked">
                            <span class="span">200.000 trở lên vnđ</span>
                        </li>
                    </ul>
                </div>
                <div class="deal-leftmk left-side" style="">
                    <h3 class="agileits-sear-head">Sản phẩm được quan tâm</h3>
                    <div class="products" style="">
                        @foreach($sanpham_quantam as $key=>$val)
                        <div
                            class="product-small col has-hover product type-product post-48847 status-publish first instock product_cat-banh-thuong-cho has-post-thumbnail shipping-taxable purchasable product-type-simple">
                            <div class="col-inner">
                                <div class="badge-container absolute left top z-1">
                                </div>
                                <div class="product-small box " style="width:120px">
                                    <div class="">
                                        <div class="image-none">
                                            <a href="{{url('home/'.$val->slug)}}"
                                                aria-label="">
                                                <img
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
                <!-- //deals -->
            </div>
            <!-- //product left -->
            <!-- product right -->
            <div class="col-md-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div id="load_category" class="row product-sec1">
                        @include('public.category.ajax')
                    </div>
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>

    {{-- <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Ưu đãi Đặc biệt
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach ($sanpham_dacbiet as $kay => $val)
                        <li>
                            <div class="w3l-specilamk">
                                <div class="speioffer-agile">
                                    <a href="{{ url('home/' . $val->slug) }}">
                                        @if (count($val->gallery) > 0)
                                            <img src="{{ asset('product/thumbnails/' . $val->gallery[0]->image) }}"
                                                alt="{{ $val->gallery[0]->image }}" style="width:170px">
                                        @else
                                            <img src="{{ asset('client/images/no-image.png') }}" alt=""
                                                style="width:323px">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-name-w3l">
                                    <h4>
                                        <a href="{{ url('home/' . $val->slug) }}">{{ $val->name }}</a>
                                    </h4>
                                    <div class="w3l-pricehkj">
                                        <h6>{{ number_format($val->price, 0, ',', '.') }} VNĐ</h6>
                                        @if ($val->sale)
                                            <p>{{ number_format($val->sale, 0, ',', '.') }}</p>
                                        @endif
                                    </div>
                                    <div
                                        class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <input type="hidden" id="product_id" value="{{ $val->id }}">
                                        <input type="hidden" id="product_quantity{{ $val->id }}" value="1">
                                        <input type="hidden" id="product_name{{ $val->id }}"
                                            value="{{ $val->name }}">
                                        @if (Count($val->gallery) > 0)
                                            <input type="hidden" id="product_image{{ $val->id }}"
                                                value="{{ $val->gallery[0]->image }}">
                                        @else
                                            <input type="hidden" id="product_image{{ $val->id }}" value="">
                                        @endif
                                        <input type="hidden" id="product_price{{ $val->id }}"
                                            value="{{ $val->price }}">
                                        <input type="button" class="button"
                                            onclick="cartstore({{ $val->id }})" value="Thêm vào giỏ hàng">
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div> --}}
    <script>
        function selected(id,min,max) {
            for (var i = 1; i <= 6; i++) {
                document.getElementById("Check" + i).checked = false;
            }
            document.getElementById(id).checked = true;
            if(document.getElementById(id).checked = true){
                var min=min;
                var max=max;
                $.ajax({
                    url:"{{ url('/category/fill').'/'.$category->id }}",
                    method:"POST",
                    data:{min:min,max:max},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if(data==0){
                            $("#load_category").html("<center><h3>Sản phẩm không tồn tại</h3></center>");
                        }else{
                            $("#load_category").html(data);
                        }
                    }
                });
            }
        }
    </script>
@endsection
