<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(__('Account Verify')); ?></title>
    <style>
        .mail-container {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
        }

        .mail-container .logo-wrapper {
            background-color: #1d2228;
            padding: 20px 0 20px;
        }

        footer {
            margin: 20px 0;
            font-size: 10px;
        }
        .mail-container .message-box{
            text-align: center;
            margin: 40px 0;
        }
        .btn{
            background-color:#444;
            color:#fff;
            text-decoration:none;
            padding: 10px 15px;
            border-radius: 3px;
            display: block;
            width: 130px;
            margin-top: 20px;
        }
        .verify-code{
            background-color:#f2f2f2;
            color:#333;
            padding: 10px 15px;
            border-radius: 3px;
            display: block;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="mail-container">
    <div class="logo-wrapper">
        <a href="<?php echo e(url('/')); ?>">
            <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

        </a>
    </div>
    <div class="message-box">
        <?php
            $message = get_static_option('site_global_email_template_'.get_user_lang());
            $message = str_replace('@username',$data->username,$message);
            $message = str_replace('@message','Here is your verification code <span class="verify-code">'.$data->email_verify_token.'</span>',$message);
            $message = str_replace('@company',get_static_option('site_'.get_default_language().'_title'),$message);
        ?>

        <?php echo $message; ?>



    </div>
    <footer>
        <?php echo render_footer_copyright_text(); ?>

    </footer>
</div>
</body>
</html>
<?php /**PATH /home/xgenxchi/public_html/laravel/zixer/@core/resources/views/mail/user-mail-verify.blade.php ENDPATH**/ ?>