<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/colorpicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Basic Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__("Basic Settings")); ?></h4>
                        <form action="<?php echo e(route('admin.general.basic.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="nav-item nav-link <?php if($key == 0): ?> active <?php endif; ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home-<?php echo e($lang->slug); ?>" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo e($lang->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="nav-home-<?php echo e($lang->slug); ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="site_<?php echo e($lang->slug); ?>_title"><?php echo e(__('Site Title')); ?></label>
                                            <input type="text" name="site_<?php echo e($lang->slug); ?>_title"  class="form-control" value="<?php echo e(get_static_option('site_'.$lang->slug.'_title')); ?>" id="site_<?php echo e($lang->slug); ?>_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_<?php echo e($lang->slug); ?>_tag_line"><?php echo e(__('Site Tag Line')); ?></label>
                                            <input type="text" name="site_<?php echo e($lang->slug); ?>_tag_line"  class="form-control" value="<?php echo e(get_static_option('site_'.$lang->slug.'_tag_line')); ?>" id="site_<?php echo e($lang->slug); ?>_tag_line">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_<?php echo e($lang->slug); ?>_footer_copyright"><?php echo e(__('Footer Copyright')); ?></label>
                                            <input type="text" name="site_<?php echo e($lang->slug); ?>_footer_copyright"  class="form-control" value="<?php echo e(get_static_option('site_'.$lang->slug.'_footer_copyright')); ?>" id="site_<?php echo e($lang->slug); ?>_footer_copyright">
                                            <small class="form-text text-muted">{copy} Will replace by &copy; and {year} will be replaced by current year.</small>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
          
                            <div class="form-group">
                                <label for="site_admin_panel_preloader_enabled"><strong><?php echo e(__('Enable/Disable Admin Panel Preloader ')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_admin_panel_preloader_enabled"  <?php if(!empty(get_static_option('site_admin_panel_preloader_enabled'))): ?> checked <?php endif; ?>>
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_admin_dark_mode"><strong><?php echo e(__('Dark Mode For Admin Dashboard')); ?></strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_admin_dark_mode"  <?php if(!empty(get_static_option('site_admin_dark_mode'))): ?> checked <?php endif; ?> id="site_admin_dark_mode">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_maintenance_mode"><strong><?php echo e(__('Enable/Disable Maintenance Mode')); ?></strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_maintenance_mode"  <?php if(!empty(get_static_option('site_maintenance_mode'))): ?> checked <?php endif; ?> id="site_maintenance_mode">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_payment_gateway"><strong><?php echo e(__('Enable/Disable Payment Gateway')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_payment_gateway"  <?php if(!empty(get_static_option('site_payment_gateway'))): ?> checked <?php endif; ?> id="site_payment_gateway">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="hide_frontend_language_change_option"><strong><?php echo e(__('Show/Hide Languages Change Option From Frontend')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="hide_frontend_language_change_option"  <?php if(!empty(get_static_option('hide_frontend_language_change_option'))): ?> checked <?php endif; ?> >
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                             <div class="form-group">
                                <label for="disable_user_email_verify"><strong><?php echo e(__('Enable User Email Verify')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_user_email_verify"  <?php if(!empty(get_static_option('disable_user_email_verify'))): ?> checked <?php endif; ?> >
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_color"><?php echo e(__('Site Base Color Settings')); ?></label>
                                <input type="text" name="site_color" style="background-color: <?php echo e(get_static_option('site_color')); ?>;color: #fff;" class="form-control" value="<?php echo e(get_static_option('site_color')); ?>" id="site_color">
                            </div>
                            <div class="form-group">
                                <label for="site_color"><?php echo e(__('Site Base Color Two Settings')); ?></label>
                                <input type="text" name="site_main_color_two" style="background-color: <?php echo e(get_static_option('site_main_color_two')); ?>;color: #fff;" class="form-control" value="<?php echo e(get_static_option('site_main_color_two')); ?>" id="site_main_color_two">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/colorpicker.js')); ?>"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){
                $('#site_color').ColorPicker({
                    color: '#ff4249',
                    onShow: function (colpkr) {
                        $(colpkr).fadeIn(500);
                        return false;
                    },
                    onHide: function (colpkr) {
                        $(colpkr).fadeOut(500);
                        return false;
                    },
                    onChange: function (hsb, hex, rgb) {
                        $('#site_color').css('background-color', '#' + hex);
                        $('#site_color').val('#' + hex);
                    }
                });
                $('#site_main_color_two').ColorPicker({
                    color: '#852aff',
                    onShow: function (colpkr) {
                        $(colpkr).fadeIn(500);
                        return false;
                    },
                    onHide: function (colpkr) {
                        $(colpkr).fadeOut(500);
                        return false;
                    },
                    onChange: function (hsb, hex, rgb) {
                        $('#site_main_color_two').css('background-color', '#' + hex);
                        $('#site_main_color_two').val('#' + hex);
                    }
                });
            });
        }(jQuery));
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/backend/general-settings/basic.blade.php ENDPATH**/ ?>