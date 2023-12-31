@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
    {{__('Edit Page')}}
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
                        <h4 class="header-title">{{__('Edit Page')}}
                            <a href="{{route('admin.page')}}" class="btn btn-primary btn-sm pull-right"><i class="fas fa-angle-double-left"></i>{{__('All Pages')}}</a>
                        </h4>

                    </div>
                    <form action="{{route('admin.page.update',$page_post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>{{__('Language')}}</label>
                                    <select name="lang" id="language" class="form-control"style="height:42px;">
                                        @foreach($all_languages as $lang)
                                        <option @if($page_post->lang == $lang->slug) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" class="form-control"  id="title" name="title" value="{{$page_post->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">{{__('Slug')}}</label>
                                    <input type="text" class="form-control"  name="slug" value="{{$page_post->slug}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <input type="hidden" name="page_content" value="{{$page_post->content}}">
                                    <div class="summernote" data-content='{{$page_post->content}}'></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>{{__('Status')}}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="publish">{{__('Publish')}}</option>
                                        <option value="draft">{{__('Draft')}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">{{__('Page Meta Title')}}</label>
                                    <input type="text" name="meta_title"  class="form-control" value="{{$page_post->meta_title}}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_tags">{{__('Page Meta Tags')}}</label>
                                    <input type="text" name="meta_tags"  class="form-control" value="{{$page_post->meta_tags}}" data-role="tagsinput" id="meta_tags">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">{{__('Page Meta Description')}}</label>
                                    <textarea name="meta_description"  class="form-control" id="meta_description">{{$page_post->meta_description}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Page')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
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
        });
    </script>
@endsection
