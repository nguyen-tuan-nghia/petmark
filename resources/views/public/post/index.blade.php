@extends('layout.home')
@section('content')
    <main id="main" class="">
        <div id="content" class="blog-wrapper blog-archive page-wrapper">
            <div class="row ">
                <div class="large-9 col">
                    <div class="row large-columns-2 medium-columns- small-columns-1">
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
                    {{ $post->links() }}
                </div>
                <div class="post-sidebar large-3 col">
                    <div class="is-sticky-column">
                        <div class="is-sticky-column__inner">
                            <div id="secondary" class="widget-area " role="complementary">
                                <aside id="categories-14" class="widget widget_categories"><span
                                        class="widget-title "><span>CHUYÊN MỤC BÀI VIẾT</span></span>
                                    <div class="is-divider small"></div>
                                    <ul>
                                        @foreach ($danh_muc_tin_tuc as $key)
                                            <li class="cat-item cat-item-1"> <a
                                                    href="{{ url('danh-muc-tin-tuc/' . $key->slug) }}">{{ $key->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
