<footer class="footer-area footer-bg"<?php echo render_background_image_markup_by_attachment_id(get_static_option('footer_background_image')); ?>>
    <div class="footer-top">
        <div class="container">
            <div class="row">
              <?php echo render_frontend_sidebar('footer',['column' => true]); ?>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-bottom-inner">
                        <div class="copyright-area">
                            <span class="copyright-text">
                                 <?php
                                     $footer_text = get_static_option('site_'.get_user_lang().'_footer_copyright');
                                     $footer_text = str_replace('{copy}','&copy;',$footer_text);
                                     $footer_text = str_replace('{year}',date('Y'),$footer_text);
                                 ?>
                                <?php echo $footer_text; ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
</div>

<div class="back-to-top">
    <i class="fas fa-angle-up"></i>
</div>

<!-- jquery -->
<script src="<?php echo e(asset('assets/frontend/js/jquery-3.4.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery-migrate-3.1.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
<script>
    (function($){
        "use strict";
        $(document).ready(function(){
            $(document).on('change','#langchange',function(e){
                $.ajax({
                    url : "<?php echo e(route('frontend.langchange')); ?>",
                    type: "GET",
                    data:{
                        'lang' : $(this).val()
                    },
                    success:function (data) {
                        location.reload();
                    }
                })
            });
        });

    $(document).on('click', '.newsletter-form-wrap .submit-btn', function (e) {
       e.preventDefault();
       var email = $('.newsletter-form-wrap input[type="email"]').val();
       var errrContaner = $(this).parent().parent().parent().find('.form-message-show');
       errrContaner.html('');

       $.ajax({
           url: "<?php echo e(route('frontend.subscribe.newsletter')); ?>",
           type: "POST",
           data: {
               _token: "<?php echo e(csrf_token()); ?>",
               email: email
           },
           success: function (data) {
               errrContaner.html('<div class="alert alert-'+data.type+'">' + data.msg + '</div>');
           },
           error: function (data) {
               var errors = data.responseJSON.errors;
               errrContaner.html('<div class="alert alert-danger">' + errors.email[0] + '</div>');
           }
       });
   });

}(jQuery));
</script>
<?php echo $__env->yieldContent('scripts'); ?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src="https://embed.tawk.to/<?php echo e(get_static_option('tawk_api_key')); ?>/default";
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>

</html>
<?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>