<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="service-area service-page">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service-item">
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>

                            <div class="content">
                                <a href="<?php echo e(route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"><h4 class="title"><?php echo e($data->title); ?></h4></a>
                                <div class="post-description">
                                    <p><?php echo e($data->excerpt); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    
    <section class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-one">
                        <div class="left-content-area">
                            <h3 class="title"><?php echo e(get_static_option('service_page_'.get_user_lang().'_cta_title')); ?></h3>
                            <p><?php echo e(get_static_option('service_page_'.get_user_lang().'_cta_description')); ?></p>
                        </div>
                        <?php if(!empty(get_static_option('service_page_'.get_user_lang().'_cta_button_status'))): ?>
                        <div class="right-content-area">
                            <div class="btn-wrapper">
                                <a href="<?php echo e(url('/contact')); ?>" class="boxed-btn"><?php echo e(get_static_option('service_page_'.get_user_lang().'_cta_button_text')); ?></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/frontend/pages/service.blade.php ENDPATH**/ ?>