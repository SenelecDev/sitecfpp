<?php $__env->startSection('content'); ?>
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="login-form-head">
                        <div class="logo-wrapper" style="margin-bottom: 40px;">
                            <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                        </div>
                        <h4><?php echo e(__('Sign In')); ?></h4>
                        <p><?php echo e(__('Hello there, Sign in and start managing your website')); ?></p>
                    </div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-msg','data' => []]); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash-msg','data' => []]); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="error-message"></div>

                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username"><?php echo e(__('Username')); ?></label>
                            <input type="text" id="username" name="username">
                            <i class="ti-email"></i>
                        </div>

                        <div class="form-gp">
                            <label for="password"><?php echo e(__('Password')); ?></label>
                            <input type="password" id="password" name="password" >
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                    <label class="custom-control-label" for="remember"><?php echo e(__('Remember Me')); ?></label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="<?php echo e(route('admin.forget.password')); ?>"><?php echo e(__('Forgot Password?')); ?></a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit"><?php echo e(__('Login')); ?> <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function ($){
            $(document).on('click','#form_submit',function (e){
                e.preventDefault();
                var el = $(this);
                var erContainer = $(".error-message");
                erContainer.html('');
                el.text("<?php echo e(__('Please Wait..')); ?>");

                $.ajax({
                   url: "<?php echo e(route('admin.login')); ?>",
                   type: "POST",
                   data: {
                       _token : "<?php echo e(csrf_token()); ?>",
                       username : $('#username').val(),
                       password : $('#password').val(),
                       remember : $('#remember').val(),
                   },
                   success:function (data){
                       $('.alert.alert-danger').remove();
                       if (data.status == 'ok'){
                           el.text('Redirecting..');
                           erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                           location.reload();
                       }else{
                           erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                           el.text("<?php echo e(__('Login')); ?>");
                       }
                   },
                   error:function(response){
                     var errors = response.responseJSON.errors;
                     $.each(errors,function(index,value){
                        erContainer.append('<div class="alert alert-danger">'+value+'</div>');
                     });

                   }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.login-screens', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\c\@core\resources\views/auth/admin/login.blade.php ENDPATH**/ ?>