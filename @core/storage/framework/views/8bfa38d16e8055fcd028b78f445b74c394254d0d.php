<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Key Features')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
  <?php echo $__env->make('backend.partials.datatable.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
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
height: 15px;
width: 15px;
}
</style>
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

            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Key Features Items')); ?></h4>
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
                            <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"  data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                                </li>
                                <?php $a++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            <?php $b=0; ?>
                            <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $key_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                        <th><?php echo e(__('Icon')); ?></th>
                                        <th><?php echo e(__('Description')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $key_feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <td><i class="<?php echo e($data->icon); ?>"></i></td>
                                                <td><?php echo e($data->description); ?></td>
                                                <td>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-alert','data' => ['route' => route('admin.keyfeatures.delete',$data->id)]]); ?>
<?php $component->withName('delete-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.keyfeatures.delete',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                                    <a href="#"
                                                       data-toggle="modal"
                                                       data-target="#key_features_item_edit_modal"
                                                       class="btn btn-lg btn-primary btn-sm mb-3 mr-1 key_features_edit_btn"
                                                       data-id="<?php echo e($data->id); ?>"
                                                       data-title="<?php echo e($data->title); ?>"
                                                       data-lang="<?php echo e($data->lang); ?>"
                                                       data-description="<?php echo e($data->description); ?>"
                                                       data-icon="<?php echo e($data->icon); ?>"
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
                        <h4 class="header-title"><?php echo e(__('New Key Features')); ?></h4>
                        <form action="<?php echo e(route('admin.keyfeatures')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="languages"><?php echo e(__('Languages')); ?></label>
                                <select name="lang" class="form-control" id="languages"style="height:42px;">
                                    <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control"  id="title"  name="title" placeholder="<?php echo e(__('Title')); ?>">
                            </div>
                            <div class="form-group">
                              <label for="icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                              <div class="btn-group ">
                                  <button type="button" class="btn btn-primary iconpicker-component">
                                      <i class="fas fa-exclamation-triangle"></i>
                                  </button>
                                  <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                          data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <div class="dropdown-menu"></div>
                              </div>
                              <input type="hidden" class="form-control"  id="icon" value="fas fa-exclamation-triangle" name="icon">
                          </div>
                            <div class="form-group">
                                <label for="description"><?php echo e(__('Description')); ?></label>
                                <textarea  id="description"  name="description" class="form-control max-height-120" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Add  New Key Features')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="key_features_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Key Feature Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.keyfeatures.update')); ?>" id="key_featrues_edit_modal_form"  method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="key_features_id" value="">
                        <div class="form-group">
                            <label for="edit_languages"><?php echo e(__('Languages')); ?></label>
                            <select name="lang" class="form-control" id="edit_languages" style="height:42px;">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control"  id="edit_title" name="title" placeholder="<?php echo e(__('Title')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control"  id="edit_icon" value="fas fa-exclamation-triangle" name="icon">
                        </div>
                        <div class="form-group">
                            <label for="edit_description"><?php echo e(__('Description')); ?></label>
                            <textarea  id="edit_description"  name="description" class="form-control max-height-120" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"></textarea>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script>
      $(document).ready(function () {
          $(document).on('click','.key_features_edit_btn',function(){
              var el = $(this);
              var id = el.data('id');
              var title = el.data('title');
              var icon = el.data('icon');
              var description = el.data('description');
              var form = $('#key_featrues_edit_modal_form');
              var image = el.data('image');
              var imageid = el.data('imageid');

              form.find('#key_features_id').val(id);
              form.find('#edit_title').val(title);
              form.find('#edit_icon').val(icon);
              form.find('#edit_description').val(description);
              form.find('#edit_languages option[value="'+el.data('lang')+'"]').attr('selected',true);
              form.find('.icp-dd').attr('data-selected',el.data('icon'));
              form.find('.iconpicker-component i').attr('class',el.data('icon'));
          });

          $('.icp-dd').iconpicker();
          $('.icp-dd').on('iconpickerSelected', function (e) {
              var selectedIcon = e.iconpickerValue;
              $(this).parent().parent().children('input').val(selectedIcon);
          });
      });
  </script>

  <script>
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
                  'url' : "<?php echo e(route('admin.feature.key.bulk.action')); ?>",
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

  </script>
    <?php echo $__env->make('backend.partials.datatable.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/backend/pages/key-features.blade.php ENDPATH**/ ?>