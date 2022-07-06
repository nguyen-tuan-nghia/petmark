@extends('layout.home')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="container section-title-container">
                            <h2 class="section-title section-title-bold-center"><b></b><span class="section-title-main">các
                                    thương hiệu sản phẩm thú cưng</span><b></b></h2>
                        </div>
                        <div class="dnw-box-brand-product">
                            <?php
                            for ($i = 17; $i <= 81; $i++) {
                            ?>
                            <a class="item-brand" href="">
                                <figure class="dnw-image__figure">
                                    <img class="lazy-load-active" src="{{asset('thuong_hieu/images'.$i.'.jpg')}}" data-src="{{asset('thuong_hieu/images'.$i.'.jpg')}}" alt="" width="300" height="300"
                                        title="">
                                </figure>
                            </a>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
