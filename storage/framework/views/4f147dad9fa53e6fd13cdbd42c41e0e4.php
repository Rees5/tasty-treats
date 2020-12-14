<?php if(count($locationInfo->schedules)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th><?php echo app('translator')->get('igniter.local::default.text_opening'); ?></th>
                <th><?php echo app('translator')->get('igniter.local::default.text_delivery'); ?></th>
                <th><?php echo app('translator')->get('igniter.local::default.text_collection'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $locationInfo->schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day => $hours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($day); ?></td>
                    <?php $__currentLoopData = $hours->sortByDesc('type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($hour->type == 'delivery' AND !$locationInfo->hasDelivery): ?>
                            <td><?php echo app('translator')->get('igniter.local::default.text_closed'); ?></td>
                        <?php elseif($hour->type == 'collection' AND !$locationInfo->hasCollection): ?>
                            <td><?php echo app('translator')->get('igniter.local::default.text_closed'); ?></td>
                        <?php elseif(!$hour->isEnabled()): ?>
                            <td><?php echo app('translator')->get('igniter.local::default.text_closed'); ?></td>
                        <?php elseif($hour->isOpenAllDay()): ?>
                            <td><?php echo app('translator')->get('igniter.local::default.text_24h'); ?></td>
                        <?php else: ?>
                            <td><?php echo sprintf(
                                lang('igniter.local::default.text_working_hour'),
                                $hour->open->isoFormat($infoTimeFormat),
                                $hour->close->isoFormat($infoTimeFormat)
                            ); ?></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

