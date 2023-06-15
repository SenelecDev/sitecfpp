<!DOCTYPE html>
<html lang="<?php echo e(get_user_lang()); ?>" dir="<?php echo e(get_user_lang_direction()); ?>">
<head>
    <?php if(!empty(get_static_option('site_google_analytics'))): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(get_static_option('site_google_analytics')); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "<?php echo e(get_static_option('site_google_analytics')); ?>");
    </script>
    <?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo e(get_static_option('site_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('site_meta_tags')); ?>">
    <?php echo render_favicon_by_id(get_static_option('site_favicon')); ?>


    <!-- load fonts dynamically -->
    <?php echo load_google_fonts(); ?>

    <!-- all stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/dynamic-style.css')); ?>">
    <style>
        :root {
            --main-color-one: <?php echo e(get_static_option('site_color')); ?>;
            --secondary-color: <?php echo e(get_static_option('site_main_color_two')); ?>;
            <?php $heading_font_family = !empty(get_static_option('heading_font')) ? get_static_option('heading_font_family') :  get_static_option('body_font_family') ?>
            --heading-font: "<?php echo e($heading_font_family); ?>",sans-serif;
            --body-font:"<?php echo e(get_static_option('body_font_family')); ?>",sans-serif;
        }
    </style>
    <?php echo $__env->yieldContent('style'); ?>

        <?php if(get_user_lang_direction() === 'rtl'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/rtl.css')); ?>">
        <?php endif; ?>

    <?php if(request()->is('blog/*') || request()->is('work/*') || request()->is('service/*')): ?>
    <?php echo $__env->yieldContent('og-meta'); ?>
    <title><?php echo $__env->yieldContent('site-title'); ?></title>
    <?php elseif(request()->is('about') || request()->is('service') || request()->is('work') || request()->is('team') || request()->is('faq') || request()->is('blog') || request()->is('contact') || request()->is('p/*')): ?>
    <title><?php echo $__env->yieldContent('site-title'); ?> - <?php echo e(get_static_option('site_'.get_user_lang().'_title')); ?> </title>
    <?php else: ?>
    <title><?php echo e(get_static_option('site_'.get_user_lang().'_title')); ?> - <?php echo e(get_static_option('site_'.get_user_lang().'_tag_line')); ?></title>
    <?php endif; ?>
</head>
<body>
<?php if(!empty(get_static_option('home_page_support_bar_section_status'))): ?>
<?php echo $__env->make('frontend.partials.support', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/xgenxchi/public_html/laravel/zixer/@core/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>