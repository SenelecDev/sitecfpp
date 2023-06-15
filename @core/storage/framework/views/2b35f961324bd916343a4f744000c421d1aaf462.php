<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="<?php echo e(url('/')); ?>" class="logo">
                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#zixer_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="zixer_main_menu">
            <ul class="navbar-nav">
                <?php echo render_menu_by_id($primary_menu_id); ?>

            </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/frontend/partials/navbar.blade.php ENDPATH**/ ?>