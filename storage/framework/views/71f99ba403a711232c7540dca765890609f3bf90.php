<tr>
    <?php if($showDragHandle): ?>
        <th class="list-action"></th>
    <?php endif; ?>

    <?php if($showCheckboxes): ?>
        <th class="list-action">
            <div class="custom-control custom-checkbox">
                <input
                    type="checkbox" id="<?php echo e('checkboxAll-'.$listId); ?>"
                    class="custom-control-input" onclick="$('input[name*=\'checked\']').prop('checked', this.checked)"/>
                <label class="custom-control-label" for="<?php echo e('checkboxAll-'.$listId); ?>">&nbsp;</label>
            </div>
        </th>
    <?php endif; ?>

    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($column->type != 'button') continue; ?>
        <th class="list-action <?php echo e($column->cssClass); ?>"></th>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($column->type == 'button') continue; ?>

        <?php if($showSorting AND $column->sortable): ?>
            <th
                class="list-cell-name-<?php echo e($column->getName()); ?> list-cell-type-<?php echo e($column->type); ?> <?php echo e($column->cssClass); ?>"
                <?php if($column->width): ?> style="width: <?php echo e($column->width); ?>" <?php endif; ?>>
                <a
                    class="sort-col"
                    data-request="<?php echo e($this->getEventHandler('onSort')); ?>"
                    data-request-form="#list-form"
                    data-request-data="sort_by: '<?php echo e($column->columnName); ?>'">
                    <?php echo e($this->getHeaderValue($column)); ?>

                    <i class="fa fa-sort-<?php echo e(($sortColumn == $column->columnName) ? strtoupper($sortDirection).' active' : 'ASC'); ?>"></i>
                </a>
            </th>
        <?php else: ?>
            <th
                class="list-cell-name-<?php echo e($column->getName()); ?> list-cell-type-<?php echo e($column->type); ?>"
                <?php if($column->width): ?> style="width: <?php echo e($column->width); ?>" <?php endif; ?>
            >
                <span><?php echo e($this->getHeaderValue($column)); ?></span>
            </th>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($showFilter): ?>
        <th class="list-setup">
            <button
                type="button"
                class="btn btn-outline-default btn-sm border-none"
                title="<?php echo app('translator')->get('admin::lang.button_filter'); ?>"
                data-toggle="list-filter"
                data-target=".list-filter"
            ><i class="fa fa-filter"></i></button>
        </th>
    <?php endif; ?>
    <?php if($showSetup): ?>
        <th class="list-setup">
            <button
                type="button"
                class="btn btn-outline-default btn-sm border-none"
                title="<?php echo app('translator')->get('admin::lang.list.text_setup'); ?>"
                data-toggle="modal"
                data-target="#<?php echo e($listId); ?>-setup-modal"
                data-request="<?php echo e($this->getEventHandler('onLoadSetup')); ?>"
            ><i class="fa fa-sliders"></i></button>
        </th>
    <?php endif; ?>
</tr>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/lists/list_head.blade.php ENDPATH**/ ?>