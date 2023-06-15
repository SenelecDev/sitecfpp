<?php $img_url = '';?>
<?php if(file_exists('assets/uploads/works/work-large-'.$work_item->id.'.'.$work_item->image)): ?>
    <?php $img_url = asset('assets/uploads/works/work-large-'.$work_item->id.'.'.$work_item->image);?>
<?php endif; ?>
<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url"  content="<?php echo e(route('frontend.work.single',['id' => $work_item->id,'any' => Str::slug($work_item->title)])); ?>" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="<?php echo e($work_item->title); ?>" />
    <meta property="og:image" content="<?php echo e($img_url); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e($work_item->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Détails de la réalisation')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="work-details-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="work-details-inner-area">
                        <div class="thumb">
                           <?php echo render_image_markup_by_attachment_id($work_item->image,'','large'); ?>

                        </div>
                        <h2 class="title"><?php echo e($work_item->title); ?></h2>
                        <div class="post-description">
                            <?php echo $work_item->description; ?>

                        </div>
                        <?php $gallery_item = $work_item->gallery ? explode('|',$work_item->gallery) : []; ?>
                        <?php if(!empty($gallery_item)): ?>
                        
                        <div class="case-study-gallery-wrapper">
                            <h2 class="title mt-4"><?php echo e(__('Galérie')); ?></h2>
                            <div class="case-study-gallery-carousel global-carousel-init"
                                 data-loop="true"
                                 data-desktopitem="1"
                                 data-mobileitem="1"
                                 data-tabletitem="1"
                                 data-nav="true"
                                 data-autoplay="true"
                                 data-margin="0"
                            >
                                <?php $__currentLoopData = $gallery_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-gallery-item">
                                    <?php echo render_image_markup_by_attachment_id($gall); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-details">
                        <h4 class="title"><?php echo e(__('Détails du projet')); ?></h4>
                        <ul class="details-list">
                            <li><strong><?php echo e(__('Date de début:')); ?></strong><?php echo e($work_item->start_date); ?> </li>
                            <li><strong><?php echo e(__('Date de fin:')); ?></strong> <?php echo e($work_item->end_date); ?></li>
                            <li><strong><?php echo e(__('Lieu:')); ?></strong> <?php echo e($work_item->location); ?></li>
                            <li><strong><?php echo e(__('Clients:')); ?></strong> <?php echo e($work_item->clients); ?></li>
                            <li><strong><?php echo e(__('Catégorie:')); ?></strong> <?php echo e(get_work_category_by_id($work_item->id,'string')); ?></li>
                        </ul>
                        <div class="share-area">
                            <h4 class="title"><?php echo e(__('Partager')); ?></h4>
                            <ul class="share-icon">
                                <?php echo single_post_share(route('frontend.work.single',['id' => $work_item->id,'any' => Str::slug($work_item->title)]),$work_item->title,$img_url); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/frontend/pages/work-single.blade.php ENDPATH**/ ?>