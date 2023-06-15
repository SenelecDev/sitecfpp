<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
      <?php echo $__env->make('backend.partials.datatable.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <style media="screen">
      .select-box-wrap select {
          height: 38px;
          border: none;
          position: relative;
          top: 2px;
          width: 150px;
          border: 1px solid #e2e2e2;
        }

        input[type="checkbox"] {
          width: 15px; /*Desired width*/
          height: 15px; /*Desired height*/
      }

      </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Services')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                <?php endif; ?>
            </div>


            <div class="col-lg-12 mt-5">
              <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Service Items')); ?>

                              <a class="pull-right btn btn-info btn-sm" href="<?php echo e(route('admin.services.new')); ?>"><?php echo e(__('Add New Service')); ?></a>
                        </h4>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bulk-action','data' => []]); ?>
<?php $component->withName('bulk-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $a=0; ?>
                            <?php $__currentLoopData = $all_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"  data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab"
                                       aria-controls="home" aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                                </li>
                                <?php $a++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            <?php $b=0; ?>
                            <?php $__currentLoopData = $all_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php if($b == 0): ?> show active <?php endif; ?>" id="slider_tab_<?php echo e($key); ?>" role="tabpanel" >
                                   <div class="table-wrap table-responsive">
                                    <table class="table table-default">
                                        <thead>
                                          <th class="no-sort">
                                             <div class="mark-all-checkbox">
                                                 <input type="checkbox" class="all-checkbox">
                                             </div>
                                         </th>
                                        <th><?php echo e(__('ID')); ?></th>
                                        <th><?php echo e(__('Title')); ?></th>
                                        <th><?php echo e(__('Image')); ?></th>
                                        <th><?php echo e(__('Icon')); ?></th>
                                        <th><?php echo e(__('Category')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                              <td>
                                                  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bulk-checkbox','data' => ['id' => $data->id]]); ?>
<?php $component->withName('bulk-checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                </td>
                                                <td><?php echo e($data->id); ?></td>
                                                <td><?php echo e($data->title); ?></td>
                                                <td>
                                                    <?php $img_url = '';?>
                                                    <?php
                                                        $service_section_img = get_attachment_image_by_id($data->image,null,true);
                                                        $img_url = '';
                                                    ?>
                                                    <?php if(!empty($service_section_img)): ?>
                                                        <div class="attachment-preview">
                                                            <div class="thumbnail">
                                                                <div class="centered">
                                                                    <img class="avatar user-thumb" src="<?php echo e($service_section_img['img_url']); ?>" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php  $img_url = $service_section_img['img_url']; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($data->icon_type == 'icon' || $data->icon_type == ''): ?>
                                                        <i style="font-size: 40px;" class="<?php echo e($data->icon); ?>"></i>
                                                    <?php else: ?>
                                                        <?php echo render_image_markup_by_attachment_id($data->img_icon); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(get_service_category($data->categories_id)); ?></td>
                                                <td><?php echo e(date_format($data->created_at,'d/M/Y')); ?></td>
                                                <td>
                                                    <?php if($data->status == 'draft'): ?>
                                                        <span class="alert alert-warning" style="margin-top: 20px;display: inline-block;"><?php echo e(__('Draft')); ?></span>
                                                    <?php else: ?>
                                                        <span class="alert alert-success" style="margin-top: 20px;display: inline-block;"><?php echo e(__('Publish')); ?></span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-alert','data' => ['route' => route('admin.services.delete',$data->id)]]); ?>
<?php $component->withName('delete-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.services.delete',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                                      <a href="<?php echo e(route('admin.services.edit',$data->id)); ?>"
                                                         class="btn btn-lg btn-primary btn-sm mb-3 mr-1 service_edit_btn"  >
                                                          <i class="ti-pencil"></i>
                                                      </a>

                                                    <a href="<?php echo e(route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>" target="_blank" class="btn btn-sm btn-light mb-3 mr-1 ">
                                                       <i class="ti-eye"></i>
                                                   </a>
                                                   <form action="<?php echo e(route('admin.services.clone')); ?>" method="post" style="display: inline-block">
                                                       <?php echo csrf_field(); ?>
                                                       <input type="hidden" name="item_id" value="<?php echo e($data->id); ?>">
                                                       <button type="submit" title="clone this to new draft" class="btn btn-sm btn-secondary mb-3 mr-1"><i class="far fa-copy"></i></button>
                                                   </form>
                                                      </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                                <?php $b++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

<?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click','.service_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var icon = el.data('icon');
                var description = el.data('description');
                var form = $('#services_edit_modal_form');
                var image = el.data('image');
                var imageid = el.data('imageid');

                form.find('#service_id').val(id);
                form.find('#edit_title').val(title);
                form.find('#edit_icon').val(icon);
                form.find('#edit_description').val(description);
                form.find('#edit_excerpt').val(el.data('excerpt'));
                form.find('#preview_image').attr('src',el.data('imgurl'));
                form.find('.summernote').summernote('code', description);
                form.find('#edit_language option[value="'+el.data('lang')+'"]').attr('selected',true);
                form.find('.iconpicker-component i').attr('class',icon);
                form.find('.iconpicker-element').attr('data-selected',icon);


                $.ajax({
                    url : "<?php echo e(route('admin.service.category.by.slug')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang: el.data('lang')
                    },
                    success:function (data) {
                        $('#edit_category').html('');
                        $.each(data,function (index,value) {
                            var selected = value.id == el.data('category') ? 'selected' : '';
                            $('#edit_category').append('<option '+selected+' value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });

                if(imageid != ''){
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }

            });

            $('.summernote').summernote({
                height: 250,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            $(document).on('change','#language',function (e) {
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                   url : "<?php echo e(route('admin.service.category.by.slug')); ?>",
                   type: "POST",
                   data: {
                       _token : "<?php echo e(csrf_token()); ?>",
                       lang: selectedLang
                   },
                   success:function (data) {
                       $('#category').html('');
                       $.each(data,function (index,value) {
                           $('#category').append('<option value="'+value.id+'">'+value.name+'</option>');
                       })
                   }
                });
            });

            $(document).on('change','#edit_language',function (e) {
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                    url : "<?php echo e(route('admin.service.category.by.slug')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang: selectedLang
                    },
                    success:function (data) {
                        $('#edit_category').html('');
                        $.each(data,function (index,value) {
                            $('#edit_category').append('<option value="'+value.id+'">'+value.name+'</option>');
                        })
                    }
                });
            })

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
                      'url' : "<?php echo e(route('admin.services.bulk.action')); ?>",
                      'data' : {
                          _token: "<?php echo e(csrf_token()); ?>",
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

        $('.icp-dd').iconpicker();
        $('.icp-dd').on('iconpickerSelected', function (e) {
            var selectedIcon = e.iconpickerValue;
            $(this).parent().parent().children('input').val(selectedIcon);
        });


        });

    </script>

        <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
        <?php echo $__env->make('backend.partials.datatable.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/backend/pages/service/index.blade.php ENDPATH**/ ?>