or login with
<?php $__currentLoopData = $socialiteLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a
        href="<?php echo e($link."?success={$successPage}&error={$errorPage}"); ?>"
    ><i class="fab fa-2x fa-<?php echo e($name); ?>"></i></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
