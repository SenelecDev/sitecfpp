<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Faq')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Faq')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="faq-page-content-area">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_faqs->chunk(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunked_faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6">
                    <div class="accordion-wrapper">
                        <?php $rand_number = rand(9999,99999999); ?>
                        <div id="accordion_<?php echo e($rand_number); ?>">
                            <?php $__currentLoopData = $chunked_faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $aria_expanded = 'false';
                                    if($data->is_open == 'on'){ $aria_expanded = 'true'; }
                                ?>
                                <div class="card">
                                    <div class="card-header" id="headingOne_<?php echo e($key); ?>">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-target="#collapseOne_<?php echo e($key); ?>" role="button"
                                               aria-expanded="<?php echo e($aria_expanded); ?>" aria-controls="collapseOne_<?php echo e($key); ?>">
                                                <?php echo e($data->title); ?>

                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne_<?php echo e($key); ?>" class="collapse <?php if($data->is_open == 'on'): ?> show <?php endif; ?> "
                                         aria-labelledby="headingOne_<?php echo e($key); ?>" data-parent="#accordion_<?php echo e($rand_number); ?>">
                                        <div class="card-body">
                                            <?php echo e($data->description); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <section class="testimonial-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title"><?php echo e(get_static_option('home_page_01_'.get_user_lang().'_testimonial_title')); ?></h2>
                        <div class="separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="testimonial-carousel">
                        <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-tesitmoial-item">
                                <div class="thumb">
                                    <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-content-area">
                        <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-testimonial-quote <?php if($key == 0): ?> active <?php endif; ?>" data-owl-item="<?php echo e($key); ?>">
                                <p><?php echo e($data->description); ?></p>
                                <h4 class="title"><?php echo e($data->name); ?></h4>
                                <span class="post"><?php echo e($data->designation); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="brand-carousel-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-carousel">
                        <?php $__currentLoopData = $all_brand_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-brand-item">
                                <?php if(file_exists('assets/uploads/brands/brand-image-'.$data->id.'.'.$data->image)): ?>
                                    <img src="<?php echo e(asset('assets/uploads/brands/brand-image-'.$data->id.'.'.$data->image)); ?>" alt="<?php echo e($data->title); ?>">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/frontend/pages/faq-page.blade.php ENDPATH**/ ?>