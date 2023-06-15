<div class="support-bar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="left-content-area"><!-- left content area -->
                    <ul>
                        <?php $__currentLoopData = $all_support_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><i class="<?php echo e($data->icon); ?>"></i> <?php echo e($data->details); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><!-- //.left conten tarea -->
                <div class="right-content-area"><!-- left content area -->
                    <ul class="social-icons">
                        <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($data->url); ?>"><i class="<?php echo e($data->icon); ?>"></i></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <ul>
                        <?php if(auth()->guard('web')->check()): ?>
                        <li><a href="<?php echo e(route('user.home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                            <li> <a href="<?php echo e(route('user.logout')); ?>"
                                    onclick="event.preventDefault();
                                   document.getElementById('logout-menu-form').submit();">
                                <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-menu-form" action="<?php echo e(route('user.logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form></li>
                            <?php else: ?>
                            <li><a href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Login')); ?></a></li>
                            <li><a href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                    <?php if(!empty(get_static_option('hide_frontend_language_change_option'))): ?>
                    <select id="langchange">
                        <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(session()->get('lang') == $lang->slug): ?> selected <?php endif; ?> value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php endif; ?>
                </div><!-- //.left conten tarea -->
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/frontend/partials/support.blade.php ENDPATH**/ ?>