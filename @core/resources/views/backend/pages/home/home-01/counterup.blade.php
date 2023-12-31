@extends('backend.admin-master')

@section('site-title')
    {{__('Counterup Area')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Counterup Settings')}}</h4>
                        <form action="{{route('admin.homeone.counterup')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                             <label for="home_01_counterup_bg_image">{{__('Background Image')}} </label>
                             @php $signature_image_upload_btn_label = 'Upload Background Image'; @endphp
                             <div class="media-upload-btn-wrapper">
                                 <div class="img-wrap">
                                     @php
                                         $signature_img = get_attachment_image_by_id(get_static_option('home_01_counterup_bg_image'),null,false);
                                     @endphp
                                     @if (!empty($signature_img))
                                         <div class="attachment-preview">
                                             <div class="thumbnail">
                                                 <div class="centered">
                                                     <img class="avatar user-thumb" src="{{$signature_img['img_url']}}" >
                                                 </div>
                                             </div>
                                         </div>
                                         @php $signature_image_upload_btn_label = 'Change Background Image'; @endphp
                                     @endif
                                 </div>
                                 <input type="hidden" name="home_01_counterup_bg_image" value="{{get_static_option('home_01_counterup_bg_image')}}">
                                 <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Background Image" data-modaltitle="Upload Background Image" data-imgid="{{get_static_option('home_01_counterup_bg_image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                     {{__($signature_image_upload_btn_label)}}
                                 </button>
                             </div>
                             <small>{{__('recommended image size is 1920x300 pixel')}}</small>
                         </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
