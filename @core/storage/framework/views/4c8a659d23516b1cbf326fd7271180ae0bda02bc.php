<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Top Bar Settings')); ?>

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
              <h4 class="header-title"><?php echo e(__('Support Info Items')); ?></h4>
              <div class="right-cotnent margin-bottom-40"><a class="btn btn-primary" data-target="#add_support_info" data-toggle="modal" href="#"><?php echo e(__('Add New Support Info')); ?></a></div>
              <ul class="nav nav-tabs" role="tablist">
                  <?php $a=0; ?>
                  <?php $__currentLoopData = $all_support_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $support_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="nav-item">
                          <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"  data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                      </li>
                      <?php $a++; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <div class="tab-content margin-top-40" >
                  <?php $b=0; ?>
                  <?php $__currentLoopData = $all_support_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $support_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="tab-pane fade <?php if($b == 0): ?> show active <?php endif; ?>" id="slider_tab_<?php echo e($key); ?>" role="tabpanel" >
                          <table class="table table-default">
                              <thead>
                              <th><?php echo e(__('ID')); ?></th>
                              <th><?php echo e(__('Title')); ?></th>
                              <th><?php echo e(__('Icon')); ?></th>
                              <th><?php echo e(__('Details')); ?></th>
                              <th><?php echo e(__('Action')); ?></th>
                              </thead>
                              <tbody>
                              <?php $__currentLoopData = $support_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td><?php echo e($data->id); ?></td>
                                      <td><?php echo e($data->title); ?></td>
                                      <td><i class="<?php echo e($data->icon); ?>"></i></td>
                                      <td><?php echo e($data->details); ?></td>
                                      <td>
                                          <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
                                             role="button"
                                             data-toggle="popover"
                                             data-trigger="focus"
                                             data-html="true"
                                             title=""
                                             data-content="
                                             <h6><?php echo e(__('Are you sure to delete this support info item?')); ?></h6>
                                             <form method='post' action='<?php echo e(route('admin.delete.support.info',$data->id)); ?>'>
                                             <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                             <br>
                                              <input type='submit' class='btn btn-danger btn-sm' value='<?php echo e(__('Yes,Please')); ?>'>
                                              </form>
                                              ">
                                              <i class="ti-trash"></i>
                                          </a>
                                          <a href="#"
                                             data-toggle="modal"
                                             data-target="#support_info_item_edit_modal"
                                             class="btn btn-lg btn-primary btn-sm mb-3 mr-1 support_info_edit_btn"
                                             data-id="<?php echo e($data->id); ?>"
                                             data-title="<?php echo e($data->title); ?>"
                                             data-lang="<?php echo e($data->lang); ?>"
                                             data-details="<?php echo e($data->details); ?>"
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
                      <?php $b++; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
          </div>
      </div>
  </div>
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Social Icons')); ?></h4>
                        <div class="right-cotnent margin-bottom-40"><a class="btn btn-primary" data-target="#add_social_icon" data-toggle="modal" href="#"><?php echo e(__('Add New Social Item')); ?></a></div>
                        <table class="table table-default">
                            <thead>
                            <th><?php echo e(__('ID')); ?></th>
                            <th><?php echo e(__('Icon')); ?></th>
                            <th><?php echo e(__('URL')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $all_social_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->id); ?></td>
                                    <td><i class="<?php echo e($data->icon); ?>"></i></td>
                                    <td><?php echo e($data->url); ?></td>
                                    <td>
                                        <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
                                           role="button"
                                           data-toggle="popover"
                                           data-trigger="focus"
                                           data-html="true"
                                           title=""
                                           data-content="
                                               <h6>Are you sure to delete this social item?</h6>
                                               <form method='post' action='<?php echo e(route('admin.delete.social.item',$data->id)); ?>'>
                                               <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                               <br>
                                                <input type='submit' class='btn btn-danger btn-sm' value='Yes,Delete'>
                                                </form>
                                                ">
                                            <i class="ti-trash"></i>
                                        </a>
                                        <a href="#"
                                           data-toggle="modal"
                                           data-target="#social_item_edit_modal"
                                           class="btn btn-lg btn-primary btn-sm mb-3 mr-1 social_item_edit_btn"
                                           data-id="<?php echo e($data->id); ?>"
                                           data-url="<?php echo e($data->url); ?>"
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_support_info" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Add New Support Info')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.new.support.info')); ?>"  method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                          <label for="language"><strong><?php echo e(__('Language')); ?></strong></label>
                          <select name="lang" id="language" class="form-control"style="height:42px;">
                              <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                        <div class="form-group">
                            <label for="title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control"  id="title" name="title" placeholder="<?php echo e(__('Title')); ?>">
                        </div>
                        <div class="form-group icon">
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
                            <label for="details"><?php echo e(__('Details')); ?></label>
                            <input type="text" class="form-control"  id="details" name="details" placeholder="<?php echo e(__('Details')); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Add New Support Info Item')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="support_info_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Support Info')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.update.support.info')); ?>"  method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="support_info_id" name="id">
                        <div class="form-group">
                            <label for="edit_language"><strong><?php echo e(__('Language')); ?></strong></label>
                            <select name="lang" id="edit_language" class="form-control"style="height:42px;">
                                <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control"  id="edit_title" name="title" placeholder="<?php echo e(__('Title')); ?>">
                        </div>
                        <div class="form-group icon">
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
                           <input type="hidden" class="form-control" id="edit_icon" value="fas fa-exclamation-triangle" name="icon">
                       </div>
                        <div class="form-group">
                            <label for="edit_details"><?php echo e(__('Details')); ?></label>
                            <input type="text" class="form-control"  id="edit_details" name="details" placeholder="<?php echo e(__('Details')); ?>">
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

    <div class="modal fade" id="add_social_icon" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Add Social Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.new.social.item')); ?>"  method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group icon">
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
                            <label for="social_item_link"><?php echo e(__('URL')); ?></label>
                            <input type="text" name="url" id="social_item_link"  class="form-control" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Add Social Item')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="social_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Social Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.update.social.item')); ?>"  method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="social_item_id" value="">

                        <div class="form-group icon">
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
                           <input type="hidden" class="form-control" id="edit_icon" value="fas fa-exclamation-triangle" name="icon">
                       </div>
                        <div class="form-group">
                            <label for="social_item_edit_url"><?php echo e(__('Url')); ?></label>
                            <input type="text" class="form-control"  id="social_item_edit_url" name="url" placeholder="<?php echo e(__('Url')); ?>">
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
            $(document).on('click','.support_info_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var details = el.data('details');
                var icon = el.data('icon');
                var form = $('#support_info_item_edit_modal');
                form.find('#support_info_id').val(id);
                form.find('#edit_icon').val(icon);
                form.find('#edit_title').val(title);
                form.find('#edit_details').val(details);
                form.find('#edit_language option[value="'+el.data('lang')+'"]').attr('selected',true);
                form.find('.iconpicker-component i').attr('class',icon);
                form.find('.iconpicker-element').attr('data-selected',icon);
            });
            $(document).on('click','.social_item_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var url = el.data('url');
                var icon = el.data('icon');
                var form = $('#social_item_edit_modal');
                form.find('#social_item_id').val(id);
                form.find('#social_item_edit_icon').val(icon);
                form.find('#social_item_edit_url').val(url);
                form.find('.iconpicker-component i').attr('class',icon);
                form.find('.iconpicker-element').attr('data-selected',icon);
            });

            $('.icp-dd').iconpicker();
            $('.icp-dd').on('iconpickerSelected', function (e) {
                var selectedIcon = e.iconpickerValue;
                $(this).parent().parent().children('input').val(selectedIcon);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/backend/pages/top-bar.blade.php ENDPATH**/ ?>