
@extends('frontend::layouts.master')

@section('content')
    <div class="container">
        <div class="page blog-list-page blog-single-page right-sidebar">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="page_body">
                        <div>
                            <div class="blog_single-head" style="margin-top: 50px;">
                                <div class="blog_single-head_top" style="background-image: url({{$data->img}})">

                                    <h1 class="title">{{$data->title}}</h1>
                                </div>
                                <div class="blog_single-head_bottom">
                                    <div>
                                        <h6 class="name">Əlavə edilib: {{$data->created_at}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="blog_single-body">
                                {!! $data->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="title_wrap">
                        <h2 class="title">Digər bloqlar</h2>
                    </div>
                    <div class="section_content">
                        @foreach($blog as $key)
                            <a href="{{route('single-blog',$key->slug)}}" class="blog_item">
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
                                        <p class="date">{{$key->created_at}}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
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

