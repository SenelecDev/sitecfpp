@extends('backend.admin-master')
@section('site-title')
    {{__('Testimonial Item')}}
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
  @include('backend.partials.datatable.style')
    <style>
    .select-box-wrap select {
      height: 40px;
      border: none;
      position: relative;
      top: 2px;
      width: 150px;
      border: 1px solid #e2e2e2;
    }

    input[type="checkbox"]{
      height:15px;
      width: 15px;
    }
    </style>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
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

            <div class="col-lg-7 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('Testimonial Items')}}</h4>
                    <x-bulk-action/>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @php $a=0; @endphp
                        @foreach($all_testimonial as $key => $testim)
                            <li class="nav-$all_price_plan">
                                <a class="nav-link @if($a == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{get_language_by_slug($key)}}</a>
                            </li>
                            @php $a++; @endphp
                        @endforeach
                    </ul>
                    <div class="tab-content margin-top-40" id="myTabContent">
                        @php $b=0; @endphp
                        @foreach($all_testimonial as $key => $testim)
                            <div class="tab-pane fade @if($b == 0) show active @endif" id="slider_tab_{{$key}}" role="tabpanel" >
                                <div class="table-wrap table-responsive">
                                    <table class="table table-default">
                                    <thead>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Description')}}</th>
                                    <th>{{__('Action')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($testim as $data)
                                        @php $img_url =''; @endphp
                                        <tr>
                                            <td>
                                              <x-bulk-checkbox :id="$data->id"/>
                                            </td>
                                            <td>{{$data->id}}</td>
                                            <td>
                                              @php
                                                  $testimonial_img = get_attachment_image_by_id($data->image,null,true);
                                              @endphp
                                               @if (!empty($testimonial_img))
                                                   <div class="attachment-preview">
                                                       <div class="thumbnail">
                                                           <div class="centered">
                                                               <img class="avatar user-thumb" src="{{$testimonial_img['img_url']}}" alt="">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   @php  $img_url = $testimonial_img['img_url']; @endphp
                                               @endif
                                            </td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->description}}</td>
                                            <td>
                                              <x-delete-alert :route="route('admin.testimonial.delete',$data->id)"/>

                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#testimonial_item_edit_modal"
                                                   class="btn btn-lg btn-primary btn-sm mb-3 mr-1 testimonial_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.testimonial.update')}}"
                                                   data-name="{{$data->name}}"
                                                   data-lang="{{$data->lang}}"
                                                   data-description="{{$data->description}}"
                                                   data-designation="{{$data->designation}}"
                                                   data-imageid="{{$data->image}}"
                                                   data-image="{{$img_url}}"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            @php $b++; @endphp
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('New Testimonial')}}</h4>
                        <form action="{{route('admin.testimonial')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="edit_languages">{{__('Languages')}}</label>
                                <select name="lang" class="form-control" id="edit_languages"style="height:42px;">
                                    @foreach($all_language as $lang)
                                        <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control"  id="name"  name="name" placeholder="{{__('Name')}}">
                            </div>
                            <div class="form-group">
                                <label for="designation">{{__('Designation')}}</label>
                                <input type="text" class="form-control"  id="designation"  name="designation" placeholder="{{__('Designation')}}">
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('Description')}}</label>
                                <textarea class="form-control"  id="description"  name="description" placeholder="{{__('Description')}}" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="image">{{__('Image')}}</label>
                              <div class="media-upload-btn-wrapper">
                                  <div class="img-wrap"></div>
                                  <input type="hidden" name="image">
                                  <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Testimonial Image" data-modaltitle="Upload Testimonial Image" data-toggle="modal" data-target="#media_upload_modal">
                                      {{__('Upload Image')}}
                                  </button>
                              </div>
                              <small>{{__('80x80 px image recommended')}}</small>
                          </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add  New Testimonial')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="testimonial_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Testimonial Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="testimonial_edit_modal_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="testimonial_id" value="">
                        <div class="form-group">
                            <label for="edit_languages">{{__('Languages')}}</label>
                            <select name="lang" class="form-control" id="edit_languages"style="height:42px;">
                                @foreach($all_language as $lang)
                                    <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_name">{{__('Name')}}</label>
                            <input type="text" class="form-control"  id="edit_name"  name="name" placeholder="{{__('Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_designation">{{__('Designation')}}</label>
                            <input type="text" class="form-control"  id="edit_designation"  name="designation" placeholder="{{__('Designation')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_description">{{__('Description')}}</label>
                            <textarea class="form-control"  id="edit_description"  name="description" placeholder="{{__('Description')}}" cols="30" rows="10"></textarea>
                        </div>
                        <div class="img-wrapper">
                            <img src="" style="max-width: 100px" id="preview_image" alt="">
                        </div>
                        <div class="form-group">
                                <label for="image">{{__('Image')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" id="edit_image" name="image" value="">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Testimonial Image" data-modaltitle="Upload Testimonial Image" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__('Upload Image')}}
                                    </button>
                                </div>
                                <small>{{__('80x80 px image recommended')}}</small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
      @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')

  <script>
      $(document).ready(function () {
          $(document).on('click','.testimonial_edit_btn',function(){
              var el = $(this);
              var id = el.data('id');
              var name = el.data('name');
              var designation = el.data('designation');
              var action = el.data('action');
              var description = el.data('description');
              var image = el.data('image');
              var imageid = el.data('imageid');

              var form = $('#testimonial_edit_modal_form');
              form.attr('action',action);
              form.find('#testimonial_id').val(id);
              form.find('#edit_name').val(name);
              form.find('#edit_description').val(description);
              form.find('#edit_designation').val(designation);
              form.find('#edit_languages option[value="'+el.data('lang')+'"]').attr('selected',true);

              if(imageid != ''){
                  form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                  form.find('.media-upload-btn-wrapper input').val(imageid);
                  form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
              }
          });

          $(document).on('click','#bulk_delete_btn',function (e) {
              e.preventDefault();

              var bulkOption = $('#bulk_option').val();
              var allCheckbox =  $('.bulk-checkbox:checked');
              var allIds = [];
              allCheckbox.each(function(index,value){
                  allIds.push($(this).val());
              });
              if(allIds != ''){
                  $(this).text('Please Wait...');
                  $.ajax({
                      'type' : "POST",
                      'url' : "{{route('admin.testimonial.bulk.action')}}",
                      'data' : {
                          _token: "{{csrf_token()}}",
                          ids: allIds,
                          type: bulkOption
                      },
                      success:function (data) {
                          location.reload();
                      }
                  });
              }

          });

          $('.all-checkbox').on('change',function (e) {
              e.preventDefault();
              var value = $('.all-checkbox').is(':checked');
              var allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
              //have write code here fr
              if( value == true){
                  allChek.prop('checked',true);
              }else{
                  allChek.prop('checked',false);
              }
          });

      });
  </script>

    @include('backend.partials.datatable.script')
  <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
  @include('backend.partials.media-upload.media-js')
@endsection
