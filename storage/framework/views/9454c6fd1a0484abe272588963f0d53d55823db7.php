<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card <?php echo e(($record->status) ? 'bg-light shadow-sm' : 'disabled'); ?> mb-3">
        <div class="card-body p-3">
            <div class="d-flex w-100 align-items-center">
                <div class="mr-4">
                    <span
                        class="extension-icon rounded"
                        style="<?php echo e($record->icon['styles'] ?? ''); ?>"
                    ><i class="<?php echo e($record->icon['class'] ?? ''); ?>"></i></span>
                </div>
                <div class="list-action mr-3">
                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($column->type != 'button') continue; ?>
                        <?php if(($key == 'install' AND $record->status) OR ($key == 'uninstall' AND !$record->status)) continue; ?>
                        <?php echo $this->makePartial('lists/list_button', ['record' => $record, 'column' => $column]); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($column->type == 'button') continue; ?>
                    <div class="flex-grow-1">
                        <?php echo $this->getColumnValue($record, $column); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/system/views/extensions/lists/list_body.blade.php ENDPATH**/ ?>