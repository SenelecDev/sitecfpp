<a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
   role="button"
   data-toggle="popover"
   data-trigger="focus"
   data-html="true"
   title=""
   data-content="
    <h6>Are you sure to delete this service item ?</h6>
    <form method='post' action='<?php echo e($route); ?>'>
    <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
    <br>
    <input type='submit' class='btn btn-danger btn-sm' value='Yes, Delete'>
    </form>
    ">
    <i class="ti-trash"></i>
</a>
<?php /**PATH C:\laragon\www\c\@core\resources\views/components/delete-alert.blade.php ENDPATH**/ ?>