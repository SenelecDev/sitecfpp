@extends('frontend.frontend-page-master')
@section('site-title')
    {{__('A Propos')}}
@endsection
@section('page-title')
    {{__('A Propos')}}
@endsection
@section('content')
    <section class="about-page-conent about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content-area">
                       {!! render_image_markup_by_attachment_id(get_static_option('about_page_'.$user_select_lang_slug.'_about_section_left_image')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content-area">
                        <h2 class="title">{{get_static_option('about_page_'.get_user_lang().'_about_section_title')}}</h2>
                        <p>{{get_static_option('about_page_'.get_user_lang().'_about_section_description')}}</p>
                        @if(!empty(get_static_option('about_page_'.get_user_lang().'_about_section_btn_status')))
                        <div class="btn-wrapper">
                            <a href="{{get_static_option('about_page_'.get_user_lang().'_about_section_btn_url')}}" class="boxed-btn">{{get_static_option('about_page_'.get_user_lang().'_about_section_btn_text')}}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counterup-area counterup-bg"
            {!! render_background_image_markup_by_attachment_id(get_static_option('home_01_counterup_bg_image')) !!}
    >
        <div class="container">
            <div class="row">
                @foreach($all_counterup as $data)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-counterup-item">
                            <div class="icon">
                                <i class="{{$data->icon}}"></i>
                            </div>
                            <div class="content">
                                <div class="count-num">{{$data->number}}</div>
                                <h5 class="name">{{$data->title}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="team-member-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title">{{get_static_option('about_page_'.get_user_lang().'_team_section_title')}}</h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($all_team_members as $data)
                <div class="col-lg-3 col-md-6">
                    <div class="single-team-member">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($data->image) !!}
                        </div>
                        <div class="content">
                            <h4 class="name">{{$data->name}}</h4>
                            <span class="post">{{$data->designation}}</span>
                            <p>{{$data->description}}</p>
                            <ul class="social-icon">
                                @if(!empty($data->icon_one) && !empty($data->icon_one_url))
                                    <li><a href="{{$data->icon_one_url}}"><i class="{{$data->icon_one}}"></i></a></li>
                                @endif
                                @if(!empty($data->icon_two) && !empty($data->icon_two_url))
                                    <li><a href="{{$data->icon_two_url}}"><i class="{{$data->icon_two}}"></i></a></li>
                                @endif
                                @if(!empty($data->icon_three) && !empty($data->icon_three_url))
                                    <li><a href="{{$data->icon_three_url}}"><i class="{{$data->icon_three}}"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="brand-carousel-area gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-carousel">
                        @foreach($all_brand_logo as $data)
                            <div class="single-brand-item">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
