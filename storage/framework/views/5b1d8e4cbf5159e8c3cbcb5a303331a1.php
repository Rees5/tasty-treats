<ul class="list-unstyled small">
    <?php $__currentLoopData = $itemOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="text-muted"><?php echo e($itemOption->name); ?></li>
        <?php $__currentLoopData = $itemOption->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php if($optionValue->qty > 1): ?>
                    <?php echo e($optionValue->qty); ?> <?php echo app('translator')->get('igniter.cart::default.text_times'); ?>
                <?php endif; ?>
                <?php echo e($optionValue->name); ?>&nbsp;
                <?php if($optionValue->price > 0): ?>
                    (<?php echo e(currency_format($optionValue->subtotal())); ?>)
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

