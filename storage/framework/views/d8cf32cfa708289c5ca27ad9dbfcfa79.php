<?php $__currentLoopData = Flash::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($message['overlay']): ?>
        <div
            data-control="flash-overlay"
            data-title="<?php echo e(array_get($message, 'title')); ?>"
            data-text="<?php echo e(array_get($message, 'message')); ?>"
            data-icon="<?php echo e($message['level']); ?>"
            data-close-on-click-outside="<?php echo e($message['important'] ? 'false' : 'true'); ?>"
            data-close-on-esc="<?php echo e($message['important'] ? 'false' : 'true'); ?>"
        ></div>
<?php else: ?>
        <div
            class="alert alert-<?php echo e($message['level']); ?><?php echo e($message['important'] ? ' alert-important' : ''); ?>"
            data-control="flash-message"
            data-allow-dismiss="<?php echo e($message['important'] ? 'false' : 'true'); ?>"
            role="alert"
        ><?php echo $message['message']; ?></div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
