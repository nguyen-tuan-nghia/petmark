    @if(Cart::count()==0)
    <a href="{{url('/cart')}}" title="Giỏ hàng" class="header-cart-link is-small">
        <span class="header-cart-title">
            Giỏ hàng </span>
        <span class="cart-icon image-icon">
            <strong>0</strong>
        </span>
    </a>
    <ul class="nav-dropdown nav-dropdown-default">
        <li class="html widget_shopping_cart">
            <div class="widget_shopping_cart_content">
                <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong
                    giỏ hàng.</p>
            </div>
        </li>
    </ul>
    @else
        <a href="{{url('/cart')}}" title="Giỏ hàng" class="header-cart-link is-small">
            <span class="header-cart-title">
                Giỏ hàng </span>
            <span class="cart-icon image-icon">
                <strong>{{Cart::count()}}</strong>
            </span>
        </a>
        <ul class="nav-dropdown nav-dropdown-default">
            <li class="html widget_shopping_cart">
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                        @php
                            $tongSoPhu=0;
                        @endphp
                        @foreach(Cart::content() as $val)
                        @php
                        $tongSoPhu +=$val->qty*$val->price;
                        @endphp
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="{{url('home/'.$val->options->slug)}}">
                                <img width="300" height="300" src="{{ asset('product/thumbnails/' . $val->options->image) }}"/>{{ $val->name }}</a>
                            <span class="quantity">{{ $val->qty }} &times; <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($val->price, 0, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
                        </li>
                        @endforeach
                    </ul>
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Tổng số phụ:</strong> <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($tongSoPhu, 0, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons"><a href="{{url('/cart')}}" class="button wc-forward">Xem giỏ hàng</a></p>
                </div>
            </li>
        </ul>
    @endif
