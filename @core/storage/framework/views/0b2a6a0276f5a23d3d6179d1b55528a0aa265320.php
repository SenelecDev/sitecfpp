<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
<meta name="description" content="<?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<meta name="tags" content="<?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('og-meta'); ?>
<meta name="og:url" content="<?php echo e(route('frontend.about')); ?>"/>
<meta name="og:description" content="<?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<meta name="og:tags" content="<?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="contact-page-conent-aera">
        <div class="container">
            <div class="row reorder-xs">
                <div class="col-lg-6">
                    <div class="contact-form-inner">
                        <h2 class="title"><?php echo e(get_static_option('contact_page_'.get_user_lang().'_form_section_title')); ?></h2>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($message); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('frontend.contact.message')); ?>" method="post" enctype="multipart/form-data" id="contact_form_submit" class="contact-form">
                             <?php echo csrf_field(); ?>
                             <input type="hidden" name="captcha_token" id="gcaptcha_token">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <?php echo render_form_field_for_frontend(get_static_option('contact_page_form_fields')); ?>

                                 </div>
                                 <div class="col-lg-12">
                                     <button class="submit-btn" type="submit"><?php echo e(__('Send Message')); ?></button>
                                 </div>
                             </div>

                         </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contac-info-wrapper">
                        <h2 class="title"><?php echo e(get_static_option('contact_page_'.get_user_lang().'_contact_info_title')); ?></h2>
                        <ul class="contact-info-list">
                            <?php $__currentLoopData = $all_contact_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="single-contact-info">
                                    <div class="icon">
                                        <i class="<?php echo e($data->icon); ?>"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><?php echo e($data->title); ?></h4>
                                        <?php $desc = explode(';',$data->description) ?>
                                        <?php $__currentLoopData = $desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="details"><?php echo e($item); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                      <div id="map" class="contact_page_map -top-40">
                        <?php echo render_embed_google_map(get_static_option('contact_page_map_section_address'),20); ?>

                      </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <?php if(!empty(get_static_option('site_google_captcha_v3_site_key'))): ?>
 <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function(token) {
            document.getElementById('gcaptcha_token').value = token;
        });
    });
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/frontend/pages/contact-page.blade.php ENDPATH**/ ?>