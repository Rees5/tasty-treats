<?php
$itemOptions = $itemOptions['items'] ?? $itemOptions;
?>
<ul class="menu menu-lg">
    <?php if(count($itemOptions)): ?>
        <?php $__currentLoopData = $itemOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="menu-item<?php echo e($activity->isUnread() ? ' active' : ''); ?>">
                <a href="<?php echo e($activity['url']); ?>" class="menu-link">
                    <div class="menu-item-meta"><?php echo $activity['message']; ?></div>
                    <span class="small menu-item-meta text-muted">
                        <?php echo e(mdate('%h:%i %A', strtotime($activity['date_added']))); ?>&nbsp;-&nbsp;
                        <?php echo e(time_elapsed($activity['date_added'])); ?>

                    </span>
                </a>
            </li>
            <li class="divider"></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <li class="text-center"><?php echo app('translator')->get('admin::lang.text_empty_activity'); ?></li>
    <?php endif; ?>
</ul>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/activities/latest.blade.php ENDPATH**/ ?>