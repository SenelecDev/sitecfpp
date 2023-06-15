<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('General Settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
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
                        <h4 class="header-title"><?php echo e(__('General Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.footer.general')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="site_logo"><strong><?php echo e(__('Footer Background Image')); ?></strong></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $blog_img = get_attachment_image_by_id(get_static_option('footer_background_image'),null,true);
                                            $blog_image_btn_label = 'Upload Image';
                                        ?>
                                        <?php if(!empty($blog_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($blog_img['img_url']); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  $blog_image_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" id="footer_background_image" name="footer_background_image" value="<?php echo e(get_static_option('footer_background_image')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Footer Background Image" data-modaltitle="Upload footer_background_image" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($blog_image_btn_label)); ?>

                                    </button>
                                </div>
                                 <small><?php echo e(__('Recommended image size 270x280')); ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
<?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/backend/pages/footer/general.blade.php ENDPATH**/ ?>