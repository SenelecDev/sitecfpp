<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="recent-works-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-nav-area">
                        <ul>
                            <li class="active" data-filter="*"><?php echo e(__('All work')); ?></li>
                            <?php $__currentLoopData = $all_work_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-filter=".<?php echo e(Str::slug($data->name)); ?>"><?php echo e($data->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-work-masonry" >
                        <?php $__currentLoopData = $all_work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-recent-wrok-item col-lg-4  col-md-6 <?php echo e(get_work_category_by_id($data->id,'slug')); ?>">
                                <div class="thumb">
                                  <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                  <?php
                                    $image_id = get_attachment_image_by_id($data->image);
                                    $image_url = isset($image_id["img_url"]) ? $image_id["img_url"] : '';
                                  ?>
                                    <div class="hover">
                                        <ul>
                                            <li><a href="<?php echo e($image_url); ?>" class="image-popup"> <i class="flaticon-image"></i> </a></li>
                                            <li><a href="<?php echo e(route('frontend.work.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"> <i class="flaticon-link-symbol"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="pagination-wrapper">
                        <?php echo e($all_work->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/zixer/@core/resources/views/frontend/pages/work.blade.php ENDPATH**/ ?>