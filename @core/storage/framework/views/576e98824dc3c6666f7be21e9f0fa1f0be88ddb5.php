<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Team')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Team')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="team-page-content-area">
        <div class="container">
            <div class="row reorder-xs justify-content-between ">
                <div class="col-lg-6">
                    <div class="left-content-area">
                        <h4 class="title"><?php echo e(get_static_option('team_page_'.get_user_lang().'_about_section_title')); ?></h4>
                        <div class="description">
                            <?php echo get_static_option('team_page_'.get_user_lang().'_about_section_description'); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-content-area">
                        <div class="img-wrapper">
                            <?php echo render_image_markup_by_attachment_id(get_static_option('team_page_'.get_user_lang().'_about_section_image')); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="team-member-area gray-bg team-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('team_page_'.get_user_lang().'_team_member_section_title')); ?></h2>
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
                <div class="col-lg-12">
                    <div class="pagination-wrapper">
                        <?php echo e($all_team_members->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/frontend/pages/team-page.blade.php ENDPATH**/ ?>