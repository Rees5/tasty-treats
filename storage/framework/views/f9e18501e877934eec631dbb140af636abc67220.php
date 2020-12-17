<?php if(count($records)): ?>
    <?php
    $groupedRecords = $records->groupBy(function ($item) {
        return day_elapsed($item->date_added, false);
    });
    ?>
    <ul class="timeline">
        <?php $__currentLoopData = $groupedRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateAdded => $activities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="time-label">
                <span><?php echo e($dateAdded); ?></span>
            </li>
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="timeline-item <?php echo e($activity->status ? 'read' : 'unread'); ?>">
                    <time class="timeline-time" datetime="">
                        <span><?php echo e(mdate('%h:%i %A', strtotime($activity->date_added))); ?></span>
                        <span><?php echo e(time_elapsed($activity->date_added)); ?></span>
                    </time>
                    <div class="timeline-icon"></div>
                    <div class="timeline-body"><a href="<?php echo e($activity->url); ?>"><?php echo $activity->message; ?></a></div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <p class="p-4 text-center"><?php echo app('translator')->get('system::lang.activities.text_empty'); ?></p>
<?php endif; ?>

<?php echo $this->makePartial('lists/list_pagination'); ?>

<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/system/views/activities/lists/list.blade.php ENDPATH**/ ?>