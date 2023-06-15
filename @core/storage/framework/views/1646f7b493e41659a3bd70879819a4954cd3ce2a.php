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
    <section class="pricing-plan-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('service_page_'.get_user_lang().'_price_plan_section_title')); ?></h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $all_price_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-price-plan-01">
                        <div class="price-header">
                            <div class="icon">
                                <i class="<?php echo e($data->icon ?? ''); ?>"></i>
                            </div>
                            <h4 class="name"><?php echo e($data->title ?? ''); ?></h4>
                            <div class="price"> <?php echo e(amount_with_currency_symbol($data->price ?? 0)); ?> </div>
                        </div>
                        <div class="price-body">
                            <ul>
                                <?php
                                    $features = explode(';',$data->features);
                                ?>
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($feat); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <?php $button_url = !empty($data->url_status) ? route('frontend.plan.order',$data->id) : $data->btn_url ;  ?>
                            <a href="<?php echo e($button_url); ?>" class="btn-boxed blank"><?php echo e($data->btn_text); ?></a>
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

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/zixer/@core/resources/views/frontend/pages/service.blade.php ENDPATH**/ ?>