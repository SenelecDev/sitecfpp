<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Build Dream Area')); ?>

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
                        <h4 class="header-title"><?php echo e(__('Build Dream Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.build.dream')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#tab_<?php echo e($key); ?>" role="tab"  aria-selected="true"><?php echo e($lang->name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="tab-content margin-top-30" id="myTabContent">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="tab_<?php echo e($key); ?>" role="tabpanel" >
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_build_dream_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_build_dream_title')); ?>" id="home_page_01_build_dream_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_description"><?php echo e(__('Description')); ?></label>
                                        <textarea name="home_page_01_<?php echo e($lang->slug); ?>_build_dream_description" class="form-control" rows="10" id="home_page_01_build_dream_description"><?php echo e(get_static_option('home_page_01_'.$lang->slug.'_build_dream_description')); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="build_dream_section_button_status"><strong><?php echo e(__('Button Show/Hide')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="build_dream_<?php echo e($lang->slug); ?>_section_button_status"  <?php if(!empty(get_static_option('build_dream_'.$lang->slug.'_section_button_status'))): ?> checked <?php endif; ?> id="build_dream_section_button_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_btn_title"><?php echo e(__('Button Title')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_build_dream_btn_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_build_dream_btn_title')); ?>" id="home_page_01_build_dream_btn_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_build_dream_btn_url"><?php echo e(__('Button URL')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_build_dream_btn_url" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_build_dream_btn_url')); ?>" id="home_page_01_build_dream_btn_url">
                                    </div>
                                    <?php if(get_static_option('home_page_variant') != '01'): ?>
                                        <div class="form-group">
                                            <label for="home_page_01_build_dream_video_url"><?php echo e(__('Video URL')); ?></label>
                                            <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_build_dream_video_url" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_build_dream_video_url')); ?>" id="home_page_01_build_dream_video_url">
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_build_dream_right_image"><?php echo e(__('Right Image')); ?></label>
                                        <?php $signature_image_upload_btn_label = 'Upload Right Image'; ?>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php
                                                    $signature_img = get_attachment_image_by_id(get_static_option('home_page_01_'.$lang->slug.'_build_dream_right_image'),null,false);
                                                ?>
                                                <?php if(!empty($signature_img)): ?>
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb" src="<?php echo e($signature_img['img_url']); ?>" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $signature_image_upload_btn_label = 'Change Right Image'; ?>
                                                <?php endif; ?>
                                            </div>
                                            <input type="hidden" name="home_page_01_<?php echo e($lang->slug); ?>_build_dream_right_image" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_build_dream_right_image')); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Right Image" data-modaltitle="Upload Right Image" data-imgid="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_build_dream_right_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e(__($signature_image_upload_btn_label)); ?>

                                            </button>
                                        </div>
                                        <small><?php echo e(__('recommended image size is 470x590 pixel')); ?></small>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/backend/pages/home/home-01/build-dream.blade.php ENDPATH**/ ?>