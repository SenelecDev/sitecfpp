<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <?php echo $__env->make('backend.partials.datatable.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Works')); ?>

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
                        <h4 class="header-title"><?php echo e(__('Works Items')); ?>

                          <a class="btn btn-info btn-sm pull-right" href="<?php echo e(route('admin.work.add')); ?>">Add New Work</a>
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
                            <?php $__currentLoopData = $all_works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"  data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                                </li>
                                <?php $a++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            <?php $b=0; ?>
                            <?php $__currentLoopData = $all_works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                         <th><?php echo e(__('Category')); ?></th>
                                         <th><?php echo e(__('Status')); ?></th>
                                         <th><?php echo e(__('Action')); ?></th>
                                         </thead>
                                         <tbody>
                                         <?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                 <td>
                                                     <div class="bulk-checkbox-wrapper">
                                                         <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="<?php echo e($data->id); ?>">
                                                     </div>
                                                 </td>
                                                 <td><?php echo e($data->id); ?></td>
                                                 <td><?php echo e($data->title); ?></td>
                                                 <td>
                                                     <?php echo render_attachment_preview($data->image,'',true); ?>

                                                 </td>
                                                 <td>
                                                     <?php echo get_work_category_by_id($data->id,'string'); ?>

                                                 </td>
                                                 <td>
                                                     <?php if($data->status == 'draft' || empty($data->status)): ?>
                                                         <div class="alert alert-warning" style="display: inline-block;"><?php echo e(__('Draft')); ?></div>
                                                     <?php elseif($data->status == 'publish'): ?>
                                                         <div class="alert alert-success" style="display: inline-block;"><?php echo e(ucwords($data->status)); ?></div>
                                                     <?php endif; ?>
                                                 </td>
                                                 <td>
                                                     <a tabindex="0" class="btn btn-danger btn-xs mb-3 mr-1"
                                                        role="button"
                                                        data-toggle="popover"
                                                        data-trigger="focus"
                                                        data-html="true"
                                                        title=""
                                                        data-content="
                                                        <h6><?php echo e(__('Are you sure to delete this work item ?')); ?></h6>
                                                        <form method='post' action='<?php echo e(route('admin.work.delete',$data->id)); ?>'>
                                                        <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                                        <br>
                                                         <input type='submit' class='btn btn-danger btn-sm' value='Yes,Please'>
                                                         </form>
                                                         ">
                                                         <i class="ti-trash"></i>
                                                     </a>
                                                     <a href="<?php echo e(route('admin.work.edit',$data->id)); ?>" class="btn btn-lg btn-light btn-xs mb-3 mr-1">
                                                         <i class="ti-pencil"></i>
                                                     </a>
                                                     <a class="btn btn-lg btn-primary btn-xs mb-3 mr-1" target="_blank"
                                                        href="<?php echo e(route('frontend.work.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>">
                                                         <i class="ti-eye"></i>
                                                     </a>
                                                     <form action="<?php echo e(route('admin.work.clone')); ?>" method="post">
                                                         <?php echo csrf_field(); ?>
                                                         <input type="hidden" name="item_id" value="<?php echo e($data->id); ?>">
                                                         <button type="submit" title="<?php echo e(__('clone this to new draft')); ?>" class="btn btn-xs btn-secondary btn-sm mb-3 mr-1">
                                                             <i class="far fa-copy"></i>
                                                         </button>
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
        <?php echo $__env->make('backend.partials.datatable.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/jquery.nice-select.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click','.work_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var description = el.data('description');
                var form = $('#works_edit_modal_form');
                var allCat = el.data('category');
                var image = el.data('image');
                var imageid = el.data('imageid');

                form.find('#work_id').val(id);
                form.find('#edit_title').val(title);
                form.find('#edit_location').val(el.data('location'));
                form.find('#edit_clients').val(el.data('clients'));
                form.find('#edit_start_date').val(el.data('startdate'));
                form.find('#edit_end_date').val(el.data('enddate'));
                form.find('#edit_description').val(description);
                form.find('#preview_image').attr('src',el.data('imgurl'));
                form.find('.summernote').summernote('code', description);
                form.find('#edit_language option[value="'+el.data('lang')+'"]').attr('selected',true);

                $.ajax({
                    url : "<?php echo e(route('admin.work.category.by.slug')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang: el.data('lang')
                    },
                    success:function (data) {
                        $('#edit_category').niceSelect();
                        $('#edit_category').html('');
                        $.each(data,function (index,value) {
                            var selected = $.inArray(value.id.toString() ,allCat) != -1 ? 'selected' : '';
                            $('#edit_category').append('<option '+selected+' value="'+value.id+'">'+value.name+'</option>');
                            $('#edit_category').niceSelect('update');
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

            if($('.nice-select').length > 0){
                $('.nice-select').niceSelect();
            }


            $(document).on('change','#language',function (e) {
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                    url : "<?php echo e(route('admin.work.category.by.slug')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang: selectedLang
                    },
                    success:function (data) {
                        $('#category').html('');
                        $.each(data,function (index,value) {
                            $('#category').append('<option value="'+value.id+'">'+value.name+'</option>');
                            $('.nice-select').niceSelect('update');
                        });
                    }
                });
            });

            $(document).on('change','#edit_language',function (e) {
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                    url : "<?php echo e(route('admin.work.category.by.slug')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang: selectedLang
                    },
                    success:function (data) {
                        $('#edit_category').html('');
                        $.each(data,function (index,value) {
                            $('#edit_category').append('<option value="'+value.id+'">'+value.name+'</option>');
                            $('.nice-select').niceSelect('update');
                        })
                    }
                });
            })
        });
    </script>

    <script>
    $(document).ready(function() {

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
                    'url' : "<?php echo e(route('admin.work.bulk.action')); ?>",
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


    } );
</script>


        <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
        <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/zixer/@core/resources/views/backend/pages/works/index.blade.php ENDPATH**/ ?>