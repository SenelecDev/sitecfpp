@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">

@endsection
@section('site-title')
    {{__('Edit Service')}}
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
            <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="header-wrap">
                       <h4 class="header-title">{{__('Edit Service')}}
                          <a href="{{route('admin.services')}}" class="btn btn-info btn-xs pull-right"><i class="fas fa-angle-double-left"></i>{{__('All Services')}}</a>
                       </h4>
                       <form action="{{route('admin.services.update')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{$service->id}}">
                     <div class="row">
                         <div class="col-lg-8">
                             <div class="form-group">
                                 <label for="language"><strong>{{__('Language')}}</strong></label>
                                 <select name="lang" id="language" class="form-control" style="height: 45px;">
                                     @foreach($all_languages as $lang)
                                         <option value="{{$lang->slug}}" @if($lang->slug == $service->lang) selected @endif>{{$lang->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="title">{{__('Title')}}</label>
                                 <input type="text" class="form-control"  id="title" name="title" value="{{$service->title}}">
                             </div>
                             <div class="form-group">
                                 <label>{{__('Content')}}</label>
                                 <input type="hidden" name="service_content" value="{{$service->description}}">
                                 <div class="summernote" data-content='{{$service->description}}'></div>
                             </div>
                             <div class="form-group">
                                 <label for="meta_title">{{__('Meta Title')}}</label>
                                 <input type="text" name="meta_title"  class="form-control" value="{{$service->meta_title}}">
                             </div>
                             <div class="form-group">
                                 <label for="meta_tags">{{__('Meta Tags')}}</label>
                                 <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" id="meta_tags" value="{{$service->meta_tags}}">
                             </div>
                             <div class="form-group">
                                 <label for="meta_description">{{__('Meta Description')}}</label>
                                 <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{$service->meta_description}}</textarea>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="form-group">
                                 <label for="title">{{__('Slug')}}</label>
                                 <input type="text" class="form-control"  id="slug"  name="slug" value="{{$service->slug}}">
                             </div>
                             <div class="form-group">
                                 <label for="edit_icon_type">{{__('Icon Type')}}</label>
                                 <select name="icon_type" class="form-control" id="edit_icon_type" style="height: 45px;">
                                     <option value="icon" @if($service->icon_type == 'icon') selected @endif>{{__("Font Icon")}}</option>
                                     <option value="image" @if($service->icon_type == 'image') selected @endif>{{__("Image Icon")}}</option>
                                 </select>
                             </div>
                             <div class="form-group icon">
                                 <label for="edit_icon" class="d-block">{{__('Icon')}}</label>
                                 <div class="btn-group ">
                                     <button type="button" class="btn btn-primary iconpicker-component">
                                         <i class="{{$service->icon}}"></i>
                                     </button>
                                     <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                             data-selected="{{$service->icon}}" data-toggle="dropdown">
                                         <span class="caret"></span>
                                         <span class="sr-only">Toggle Dropdown</span>
                                     </button>
                                     <div class="dropdown-menu"></div>
                                 </div>
                                 <input type="hidden" class="form-control"  id="edit_icon" value="{{$service->icon}}" name="icon">
                             </div>
                             <div class="form-group">
                                 <label for="img_icon">{{__('Icon Image')}}</label>
                                 <div class="media-upload-btn-wrapper">
                                     <div class="img-wrap">
                                         @php
                                             $blog_img = get_attachment_image_by_id($service->img_icon,null,true);
                                             $blog_image_btn_label = 'Upload Image';
                                         @endphp
                                         @if (!empty($blog_img))
                                             <div class="attachment-preview">
                                                 <div class="thumbnail">
                                                     <div class="centered">
                                                         <img class="avatar user-thumb" src="{{$blog_img['img_url']}}" alt="">
                                                     </div>
                                                 </div>
                                             </div>
                                             @php  $blog_image_btn_label = 'Change Image'; @endphp
                                         @endif
                                     </div>
                                     <input type="hidden" id="img_icon" name="img_icon" value="{{$service->img_icon}}">
                                     <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Image" data-modaltitle="Upload Image" data-toggle="modal" data-target="#media_upload_modal">
                                         {{$blog_image_btn_label}}
                                     </button>
                                 </div>
                                 <small>{{__('Recommended image size 64x64')}}</small>
                             </div>
                             <div class="form-group">
                                 <label for="title">{{__('Excerpt')}}</label>
                                 <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10">{{$service->excerpt}}</textarea>
                             </div>
                             <div class="form-group">
                                 <label for="category">{{__('Category')}}</label>
                                 <select name="categories_id" class="form-control" id="categories_id" style="height: 45px;">
                                     <option value="">{{__("Select Category")}}</option>
                                     @foreach($service_category as $category)
                                         <option value="{{$category->id}}" @if($service->categories_id == $category->id) selected @endif>{{$category->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="status">{{__('Status')}}</label>
                                 <select name="status" id="status" class="form-control" style="height:45px;">
                                     <option value="publish" @if($service->status == 'publish') selected @endif>{{__('Publish')}}</option>
                                     <option value="draft" @if($service->status == 'draft') selected @endif>{{__('Draft')}}</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="image">{{__('Image')}}</label>
                                 <div class="media-upload-btn-wrapper">
                                     <div class="img-wrap">
                                         @php
                                             $blog_img = get_attachment_image_by_id($service->image,null,true);
                                             $blog_image_btn_label = 'Upload Image';
                                         @endphp
                                         @if (!empty($blog_img))
                                             <div class="attachment-preview">
                                                 <div class="thumbnail">
                                                     <div class="centered">
                                                         <img class="avatar user-thumb" src="{{$blog_img['img_url']}}" alt="">
                                                     </div>
                                                 </div>
                                             </div>
                                             @php  $blog_image_btn_label = 'Change Image'; @endphp
                                         @endif
                                     </div>
                                     <input type="hidden" name="image" value="{{$service->image}}">
                                     <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Blog Image" data-modaltitle="Upload Blog Image" data-toggle="modal" data-target="#media_upload_modal">
                                         {{$blog_image_btn_label}}
                                     </button>
                                 </div>
                                 <small>{{__('Recommended image size 1920x1280')}}</small>
                             </div>
                             <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Service')}}</button>
                         </div>
                     </div>
                  </form>
                   </div>

                </div>
            </div>
        </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
  <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
  <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
  <script>
      $(document).ready(function () {
          $('.summernote').summernote({
              height: 400,   //set editable area's height
              codemirror: { // codemirror options
                  theme: 'monokai'
              },
              callbacks: {
                  onChange: function(contents, $editable) {
                      $(this).prev('input').val(contents);
                  }
              }
          });
          if($('.summernote').length > 0){
              $('.summernote').each(function(index,value){
                  $(this).summernote('code', $(this).data('content'));
              });
          }

          $(document).on('change','#language',function(e){
              e.preventDefault();
              var selectedLang = $(this).val();
              $.ajax({
                  url: "{{route('admin.service.category.by.slug')}}",
                  type: "POST",
                  data: {
                      _token : "{{csrf_token()}}",
                      lang : selectedLang
                  },
                  success:function (data) {
                      $('#categories_id').html('<option value="">Select Category</option>');
                      $.each(data,function(index,value){
                          $('#category').append('<option value="'+value.id+'">'+value.name+'</option>')
                      });
                  }
              });
          });

          $('.icp-dd').iconpicker();
          $('.icp-dd').on('iconpickerSelected', function (e) {
              var selectedIcon = e.iconpickerValue;
              $(this).parent().parent().children('input').val(selectedIcon);
          });

          $(document).on('change','select[name="icon_type"]',function (e){
              e.preventDefault();
              var iconType = $(this).val();
              iconTypeFieldVal(iconType);
          });
          defaultIconType();

          function defaultIconType(){
              var iconType = $('select[name="icon_type"]').val();
              iconTypeFieldVal(iconType);
          }

          function iconTypeFieldVal(iconType){
              if (iconType == 'icon'){
                  $('input[name="img_icon"]').parent().parent().hide();
                  $('input[name="icon"]').parent().show();
              }else if(iconType == 'image'){
                  $('input[name="icon"]').parent().hide();
                  $('input[name="img_icon"]').parent().parent().show();
              }
          }
      });
  </script>
  <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
  @include('backend.partials.media-upload.media-js')
@endsection
