@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    {{__('Edit BLog')}}
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
                       <h4 class="header-title">{{__('Edit Blog Post')}}
                          <a href="{{route('admin.blog')}}" class="btn btn-info btn-xs pull-right"><i class="fas fa-angle-double-left"></i>{{__('All Blogs')}}</a>
                       </h4>

                       <form action="{{route('admin.blog.update',$blog_post->id)}}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="row">
                               <div class="col-lg-8">
                                   <div class="form-group">
                                       <label for="language"><strong>{{__('Language')}}</strong></label>
                                       <select name="lang" id="language" class="form-control"style="height:42px;">
                                           @foreach($all_languages as $lang)
                                               <option @if($lang->slug == $blog_post->lang) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="title">{{__('Title')}}</label>
                                       <input type="text" class="form-control"  id="title" name="title" value="{{$blog_post->title}}">
                                   </div>
                                   <div class="form-group">
                                       <label>{{__('Content')}}</label>
                                       <input type="hidden" name="blog_content" value="{{$blog_post->content}}">
                                       <div class="summernote" data-content='{{$blog_post->content}}'></div>
                                   </div>
                                   <div class="form-group">
                                       <label for="meta_title">{{__('Meta Title')}}</label>
                                       <input type="text" name="meta_title" value="{{$blog_post->meta_title}}" class="form-control">
                                   </div>
                                   <div class="form-group">
                                       <label for="meta_tags">{{__('Meta Tags')}}</label>
                                       <input type="text" name="meta_tags" value="{{$blog_post->meta_tags}}" class="form-control" data-role="tagsinput" id="meta_tags">
                                   </div>
                                   <div class="form-group">
                                       <label for="meta_description">{{__('Meta Description')}}</label>
                                       <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{$blog_post->meta_description}}</textarea>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="title">{{__('Slug')}}</label>
                                       <input type="text" class="form-control"  id="slug"  name="slug" value="{{$blog_post->slug}}">
                                   </div>
                                   <div class="form-group">
                                       <label for="title">{{__('Excerpt')}}</label>
                                       <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10">{{$blog_post->excerpt}}</textarea>
                                   </div>

                                   <div class="form-group">
                                       <label for="category">{{__('Category')}}</label>
                                       <select name="category" class="form-control" id="category" style="height:45px;">
                                           <option value="">{{__("Select Category")}}</option>
                                           @foreach($all_category as $category)
                                               <option @if($blog_post->blog_categories_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="title">{{__('Tags')}}</label>
                                       <input type="text" class="form-control" value="{{$blog_post->tags}}" name="tags" data-role="tagsinput">
                                   </div>
                                   <div class="form-group">
                                       <label for="author">{{__('Author Name')}}</label>
                                       <input type="text" class="form-control" name="author" id="author" value="{{$blog_post->author}}">
                                   </div>
                                   <div class="form-group">
                                       <label for="status">{{__('Status')}}</label>
                                       <select name="status" id="status" class="form-control">
                                           <option @if($blog_post->status == 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                           <option @if($blog_post->status == 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="image">{{__('Image')}}</label>
                                       <div class="media-upload-btn-wrapper">
                                           <div class="img-wrap">
                                               @php
                                                   $blog_img = get_attachment_image_by_id($blog_post->image,null,true);
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
                                           <input type="hidden" id="edit_image" name="image" value="{{$blog_post->image}}">
                                           <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Blog Image" data-modaltitle="Upload Blog Image" data-toggle="modal" data-target="#media_upload_modal">
                                               {{__($blog_image_btn_label)}}
                                           </button>
                                       </div>
                                       <small>{{__('Recommended image size 1920x1280')}}</small>
                                   </div>
                                   <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Post')}}</button>
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
                   url: "{{route('admin.blog.lang.cat')}}",
                   type: "POST",
                   data: {
                       _token : "{{csrf_token()}}",
                       lang : selectedLang
                   },
                   success:function (data) {
                       $('#category').html('<option value="">Select Category</option>');
                       $.each(data,function(index,value){
                           $('#category').append('<option value="'+value.id+'">'+value.name+'</option>')
                       });
                   }
               });
           });

       });
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
