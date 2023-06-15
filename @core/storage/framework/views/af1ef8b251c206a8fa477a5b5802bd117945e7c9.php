<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('A Propos')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('A Propos')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="about-page-conent about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content-area">
                       <?php echo render_image_markup_by_attachment_id(get_static_option('about_page_'.$user_select_lang_slug.'_about_section_left_image')); ?>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content-area">
                        <h2 class="title"><?php echo e(get_static_option('about_page_'.get_user_lang().'_about_section_title')); ?></h2>
                        <p><?php echo e(get_static_option('about_page_'.get_user_lang().'_about_section_description')); ?></p>
                        <?php if(!empty(get_static_option('about_page_'.get_user_lang().'_about_section_btn_status'))): ?>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(get_static_option('about_page_'.get_user_lang().'_about_section_btn_url')); ?>" class="boxed-btn"><?php echo e(get_static_option('about_page_'.get_user_lang().'_about_section_btn_text')); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counterup-area counterup-bg"
            <?php echo render_background_image_markup_by_attachment_id(get_static_option('home_01_counterup_bg_image')); ?>

    >
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_counterup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-counterup-item">
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>
                            <div class="content">
                                <div class="count-num"><?php echo e($data->number); ?></div>
                                <h5 class="name"><?php echo e($data->title); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <div class="team-member-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('about_page_'.get_user_lang().'_team_section_title')); ?></h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $all_team_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-team-member">
                        <div class="thumb">
                            <?php echo render_image_markup_by_attachment_id($data->image); ?>

                        </div>
                        <div class="content">
                            <h4 class="name"><?php echo e($data->name); ?></h4>
                            <span class="post"><?php echo e($data->designation); ?></span>
                            <p><?php echo e($data->description); ?></p>
                            <ul class="social-icon">
                                <?php if(!empty($data->icon_one) && !empty($data->icon_one_url)): ?>
                                    <li><a href="<?php echo e($data->icon_one_url); ?>"><i class="<?php echo e($data->icon_one); ?>"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty($data->icon_two) && !empty($data->icon_two_url)): ?>
                                    <li><a href="<?php echo e($data->icon_two_url); ?>"><i class="<?php echo e($data->icon_two); ?>"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty($data->icon_three) && !empty($data->icon_three_url)): ?>
                                    <li><a href="<?php echo e($data->icon_three_url); ?>"><i class="<?php echo e($data->icon_three); ?>"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="brand-carousel-area gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-carousel">
                        <?php $__currentLoopData = $all_brand_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-brand-item">
                                <?php echo render_image_markup_by_attachment_id($data->image); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/frontend/pages/about.blade.php ENDPATH**/ ?>