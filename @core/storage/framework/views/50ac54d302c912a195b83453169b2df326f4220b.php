<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Call TO Action Section')); ?>

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
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Call To Action Section Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.service.page.cta')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="nav-item nav-link <?php if($key == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#nav-home-<?php echo e($lang->slug); ?>" role="tab"  aria-selected="true"><?php echo e($lang->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="nav-home-<?php echo e($lang->slug); ?>" role="tabpanel">
                                    <div class="form-group">
                                        <label for="service_page_<?php echo e($lang->slug); ?>_cta_title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="service_page_<?php echo e($lang->slug); ?>_cta_title" value="<?php echo e(get_static_option('service_page_'.$lang->slug.'_cta_title')); ?>" class="form-control" id="service_page_<?php echo e($lang->slug); ?>_cta_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="service_page_<?php echo e($lang->slug); ?>_cta_description"><?php echo e(__('Description')); ?></label>
                                        <textarea rows="5" name="service_page_<?php echo e($lang->slug); ?>_cta_description" class="form-control" id="service_page_<?php echo e($lang->slug); ?>_cta_description"><?php echo e(get_static_option('service_page_'.$lang->slug.'_cta_description')); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_page_<?php echo e($lang->slug); ?>_cta_button_status"><strong><?php echo e(__('Button Show/Hide')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="service_page_<?php echo e($lang->slug); ?>_cta_button_status"  <?php if(!empty(get_static_option('service_page_'.$lang->slug.'_cta_button_status'))): ?> checked <?php endif; ?> id="service_page_<?php echo e($lang->slug); ?>_cta_button_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_page_<?php echo e($lang->slug); ?>_cta_button_text"><?php echo e(__('Button Text')); ?></label>
                                        <input type="text" name="service_page_<?php echo e($lang->slug); ?>_cta_button_text" value="<?php echo e(get_static_option('service_page_'.$lang->slug.'_cta_button_text')); ?>" class="form-control" id="service_page_<?php echo e($lang->slug); ?>_cta_button_text">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/backend/pages/service-page/cta-section.blade.php ENDPATH**/ ?>