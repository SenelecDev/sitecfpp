<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Testimonial Item')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
  <?php echo $__env->make('backend.partials.datatable.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
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

            <div class="col-lg-7 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><?php echo e(__('Testimonial Items')); ?></h4>
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
                        <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-$all_price_plan">
                                <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"  data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                            </li>
                            <?php $a++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="tab-content margin-top-40" id="myTabContent">
                        <?php $b=0; ?>
                        <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <th><?php echo e(__('Image')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $testim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $img_url =''; ?>
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
                                            <td>
                                              <?php
                                                  $testimonial_img = get_attachment_image_by_id($data->image,null,true);
                                              ?>
                                               <?php if(!empty($testimonial_img)): ?>
                                                   <div class="attachment-preview">
                                                       <div class="thumbnail">
                                                           <div class="centered">
                                                               <img class="avatar user-thumb" src="<?php echo e($testimonial_img['img_url']); ?>" alt="">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <?php  $img_url = $testimonial_img['img_url']; ?>
                                               <?php endif; ?>
                                            </td>
                                            <td><?php echo e($data->name); ?></td>
                                            <td><?php echo e($data->description); ?></td>
                                            <td>
                                              <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-alert','data' => ['route' => route('admin.testimonial.delete',$data->id)]]); ?>
<?php $component->withName('delete-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.testimonial.delete',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#testimonial_item_edit_modal"
                                                   class="btn btn-lg btn-primary btn-sm mb-3 mr-1 testimonial_edit_btn"
                                                   data-id="<?php echo e($data->id); ?>"
                                                   data-action="<?php echo e(route('admin.testimonial.update')); ?>"
                                                   data-name="<?php echo e($data->name); ?>"
                                                   data-lang="<?php echo e($data->lang); ?>"
                                                   data-description="<?php echo e($data->description); ?>"
                                                   data-designation="<?php echo e($data->designation); ?>"
                                                   data-imageid="<?php echo e($data->image); ?>"
                                                   data-image="<?php echo e($img_url); ?>"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
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
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('New Testimonial')); ?></h4>
                        <form action="<?php echo e(route('admin.testimonial')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="edit_languages"><?php echo e(__('Languages')); ?></label>
                                <select name="lang" class="form-control" id="edit_languages"style="height:42px;">
                                    <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name"><?php echo e(__('Name')); ?></label>
                                <input type="text" class="form-control"  id="name"  name="name" placeholder="<?php echo e(__('Name')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="designation"><?php echo e(__('Designation')); ?></label>
                                <input type="text" class="form-control"  id="designation"  name="designation" placeholder="<?php echo e(__('Designation')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="description"><?php echo e(__('Description')); ?></label>
                                <textarea class="form-control"  id="description"  name="description" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="image"><?php echo e(__('Image')); ?></label>
                              <div class="media-upload-btn-wrapper">
                                  <div class="img-wrap"></div>
                                  <input type="hidden" name="image">
                                  <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Testimonial Image" data-modaltitle="Upload Testimonial Image" data-toggle="modal" data-target="#media_upload_modal">
                                      <?php echo e(__('Upload Image')); ?>

                                  </button>
                              </div>
                              <small><?php echo e(__('80x80 px image recommended')); ?></small>
                          </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Add  New Testimonial')); ?></button>
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
                    <h5 class="modal-title"><?php echo e(__('Edit Testimonial Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="testimonial_edit_modal_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="testimonial_id" value="">
                        <div class="form-group">
                            <label for="edit_languages"><?php echo e(__('Languages')); ?></label>
                            <select name="lang" class="form-control" id="edit_languages"style="height:42px;">
                                <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_name"><?php echo e(__('Name')); ?></label>
                            <input type="text" class="form-control"  id="edit_name"  name="name" placeholder="<?php echo e(__('Name')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_designation"><?php echo e(__('Designation')); ?></label>
                            <input type="text" class="form-control"  id="edit_designation"  name="designation" placeholder="<?php echo e(__('Designation')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_description"><?php echo e(__('Description')); ?></label>
                            <textarea class="form-control"  id="edit_description"  name="description" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10"></textarea>
                        </div>
                        <div class="img-wrapper">
                            <img src="" style="max-width: 100px" id="preview_image" alt="">
                        </div>
                        <div class="form-group">
                                <label for="image"><?php echo e(__('Image')); ?></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" id="edit_image" name="image" value="">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Testimonial Image" data-modaltitle="Upload Testimonial Image" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('80x80 px image recommended')); ?></small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
      <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

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
                      'url' : "<?php echo e(route('admin.testimonial.bulk.action')); ?>",
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

      });
  </script>

    <?php echo $__env->make('backend.partials.datatable.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
  <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/backend/pages/testimonial.blade.php ENDPATH**/ ?>