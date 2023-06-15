@extends('backend.admin-master')
@section('site-title')
    {{__('Faq')}}
@endsection

@section('style')
  @include('backend.partials.datatable.style')

  <style>
      .select-box-wrap select {
      height: 38px;
      border: none;
      position: relative;
      top: 2px;
      width: 150px;
      border: 1px solid #e2e2e2;
    }

    input[type="checkbox"]{
      height: 15px;
       width: 15px;
   }
  </style>
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

            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Faq Items')}}</h4>
                        <x-bulk-action/>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php $a=0; @endphp
                            @foreach($all_faqs as $key => $blog)
                                <li class="nav-item">
                                    <a class="nav-link @if($a == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{get_language_by_slug($key)}}</a>
                                </li>
                                @php $a++; @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            @php $b=0; @endphp
                            @foreach($all_faqs as $key => $faq)
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
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($faq as $data)
                                            <tr>
                                              <td>
                                                <x-bulk-checkbox :id="$data->id"/>
                                              </td>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>@if($data->status == 'publish') <span class="alert alert-success">{{__('Publish')}}</span> @else <span class="alert alert-warning">{{__('Draft')}}</span> @endif</td>
                                                <td>
                                                    <x-delete-alert :route="route('admin.faq.delete',$data->id)"/>

                                                    <a href="#"
                                                       data-toggle="modal"
                                                       data-target="#faq_item_edit_modal"
                                                       class="btn btn-lg btn-primary btn-sm mb-3 mr-1 faq_edit_btn"
                                                       data-id="{{$data->id}}"
                                                       data-title="{{$data->title}}"
                                                       data-lang="{{$data->lang}}"
                                                       data-is_open="{{$data->is_open}}"
                                                       data-description="{{$data->description}}"
                                                       data-status="{{$data->status}}"
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
                        <h4 class="header-title">{{__('New Faq')}}</h4>
                        <form action="{{route('admin.faq')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="language"><strong>{{__('Language')}}</strong></label>
                                <select name="lang" id="language" class="form-control"style="height:42px;">
                                    @foreach($all_language as $lang)
                                        <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control"  id="title"  name="title" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="is_open">{{__('Is Open')}}</label>
                                <label class="switch">
                                    <input type="checkbox" name="is_open"  id="is_open">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('Description')}}</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control max-height-150" placeholder="{{__('Description')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">{{__('Status')}}</label>
                                <select name="status" id="status" class="form-control"style="height:42px;">
                                    <option value="publish">{{__('Publish')}}</option>
                                    <option value="draft">{{__('Draft')}}</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Faq')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="faq_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Faq Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.faq.update')}}" id="faq_edit_modal_form" enctype="multipart/form-data"  method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="faq_id" value="">
                        <div class="form-group">
                            <label for="edit_language"><strong>{{__('Language')}}</strong></label>
                            <select name="lang" id="edit_language" class="form-control"style="height:42px;">
                                @foreach($all_language as $lang)
                                    <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_title">{{__('Title')}}</label>
                            <input type="text" class="form-control"  id="edit_title"  name="title" placeholder="{{__('Title')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_is_open">{{__('Is Open')}}</label>
                            <label class="switch">
                                <input type="checkbox" name="is_open" id="edit_is_open">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="edit_description">{{__('Description')}}</label>
                            <textarea name="description" id="edit_description" cols="30" rows="10" class="form-control max-height-150" placeholder="{{__('Description')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">{{__('Status')}}</label>
                            <select name="status" id="edit_status" class="form-control"style="height:42px;">
                                <option value="publish">{{__('Publish')}}</option>
                                <option value="draft">{{__('Draft')}}</option>
                            </select>
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
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $(document).on('click','.faq_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var form = $('#faq_edit_modal_form');
                form.find('#faq_id').val(id);
                form.find('#edit_title').val(title);
                form.find('#edit_description').val(el.data('description'));
                form.find('#edit_status option[value="'+el.data('status')+'"]').attr('selected',true);
                form.find('#edit_language option[value="'+el.data('lang')+'"]').attr('selected',true);
                if(el.data('is_open') != ''){
                    form.find('#edit_is_open').attr('checked',true);
                }else{
                    form.find('#edit_is_open').attr('checked',false);
                }
            });
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
                              'url' : "{{route('admin.faq.bulk.action')}}",
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
    </script>
    @include('backend.partials.datatable.script')
@endsection
