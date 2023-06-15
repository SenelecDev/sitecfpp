@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('work_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
    {{get_static_option('work_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('content')
    <section class="recent-works-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-nav-area">
                        <ul>
                            <li class="active" data-filter="*">{{__('Toutes les réalisations')}}</li>
                            @foreach($all_work_category as $data)
                                <li data-filter=".{{Str::slug($data->name)}}">{{$data->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-masonry" >
                        @foreach($all_work as $data)
                            <div class="single-recent-wrok-item col-lg-4  col-md-6 {{get_work_category_by_id($data->id,'slug')}}">
                                <div class="thumb">
                                  {!! render_image_markup_by_attachment_id($data->image) !!}
                                  @php
                                    $image_id = get_attachment_image_by_id($data->image);
                                    $image_url = isset($image_id["img_url"]) ? $image_id["img_url"] : '';
                                  @endphp
                                    <div class="hover">
                                        <ul>
                                            <li><a href="{{$image_url}}" class="image-popup"> <i class="flaticon-image"></i> </a></li>
                                            <li><a href="{{route('frontend.work.single',['id' => $data->id,'any' => Str::slug($data->title)])}}"> <i class="flaticon-link-symbol"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination-wrapper">
                        {{$all_work->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
