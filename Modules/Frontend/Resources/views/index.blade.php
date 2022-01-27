
@extends('frontend::layouts.master')

@section('content')
<div class="container">
    <div class="top_panel inversion">
        <div class="wrap">
            <div class="wrap_float">
                <div class="menu_wrap" id="menu_wrap">
                    <div class="scroll">
                        <div class="center">
                            <div class="menu">
                                <ul>
                                    <li><a href="{{route('index')}}">Əsas Səhifə</a></li>
                                    <li><a href="{{route('blog.index')}}">İdarə Səhifəsi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="wrap">
            <div class="wrap_float">
            </div>
        </div>
    </div>
    <div class="page blog-list-page full-width">
        <div class="wrap">
            <div class="wrap_float">
                <div class="page_head">
                    <h1 class="title">
                        Bloq
                    </h1>
                </div>
                <div class="page_body mt-5">
                    <div class="blog-list">
                        @foreach($data as $key)
                        <a class="blog_item" href="{{route('single-blog',$key->slug)}}">
                            <div class="blog_item_top" style="background-image: url({{$key->img}});">
                                <div class="sq_parent">
                                    <div class="sq_wrap">
                                        <div class="sq_content">
                                            <h3 class="_title">
                                                {{$key->title}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow js-shadow"></div>
                            </div>
                            <div class="blog_item_bottom">
                                <div class="author">
                                    <p class="date">
                                        {{$key->created_at}}
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="btn_wrap load_btn_wrap" style="width: auto;">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="wrap">
            <div class="wrap_float">
            </div>
        </div>
    </div>
</div>
@endsection
