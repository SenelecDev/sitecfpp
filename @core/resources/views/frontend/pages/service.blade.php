@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('service_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
    {{get_static_option('service_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('content')
    <section class="service-area service-page">
        <div class="container">
            <div class="row">
                @foreach($all_services as $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service-item">
                            <div class="icon">
                                <i class="{{$data->icon}}"></i>
                            </div>

                            <div class="content">
                                <a href="{{route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])}}"><h4 class="title">{{$data->title}}</h4></a>
                                <div class="post-description">
                                    <p>{{$data->excerpt}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <section class="pricing-plan-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title">{{get_static_option('service_page_'.get_user_lang().'_price_plan_section_title')}}</h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($all_price_plan as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="single-price-plan-01">
                        <div class="price-header">
                            <div class="icon">
                                <i class="{{$data->icon ?? ''}}"></i>
                            </div>
                            <h4 class="name">{{$data->title ?? ''}}</h4>
                            <div class="price"> {{amount_with_currency_symbol($data->price ?? 0)}} </div>
                        </div>
                        <div class="price-body">
                            <ul>
                                @php
                                    $features = explode(';',$data->features);
                                @endphp
                                @foreach($features as $feat)
                                <li>{{$feat}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="price-footer">
                            @php $button_url = !empty($data->url_status) ? route('frontend.plan.order',$data->id) : $data->btn_url ;  @endphp
                            <a href="{{$button_url}}" class="btn-boxed blank">{{$data->btn_text}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <section class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-one">
                        <div class="left-content-area">
                            <h3 class="title">{{get_static_option('service_page_'.get_user_lang().'_cta_title')}}</h3>
                            <p>{{get_static_option('service_page_'.get_user_lang().'_cta_description')}}</p>
                        </div>
                        @if(!empty(get_static_option('service_page_'.get_user_lang().'_cta_button_status')))
                        <div class="right-content-area">
                            <div class="btn-wrapper">
                                <a href="{{url('/contact')}}" class="boxed-btn">{{get_static_option('service_page_'.get_user_lang().'_cta_button_text')}}</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
