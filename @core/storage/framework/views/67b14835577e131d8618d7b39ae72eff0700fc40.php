<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Service Category: ').$category_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-100">
        <div class="container">
            <div class="row">
                <?php if(empty($service_items)): ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger"><?php echo e(__('No Post Available In This Category')); ?></div>
                    </div>
                <?php endif; ?>
                <?php $__currentLoopData = $service_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service-item-three">
                            <div class="thumb">
                                <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                <div class="icon">
                                    <i class="<?php echo e($data->icon); ?>"></i>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="<?php echo e(route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>"><?php echo e($data->title); ?></a></h4>
                                <div class="description">
                                    <?php echo Str::words($data->description,15); ?>

                                </div>
                                <a href="<?php echo e(route('frontend.services.single',['id' => $data->id,'any' => Str::slug($data->title)])); ?>" class="readmore"><?php echo e(__('Read More')); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <nav class="pagination-wrapper" aria-label="Page navigation">
                    <?php echo e($service_items->links()); ?>

                </nav>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/frontend/pages/services.blade.php ENDPATH**/ ?>