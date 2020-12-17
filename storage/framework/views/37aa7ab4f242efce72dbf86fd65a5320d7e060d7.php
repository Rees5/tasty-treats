<div class="d-flex align-items-center">
    <div class="px-2">
        <i
            class="fa fa-asterisk <?php echo e($item->isRequired() ? 'text-danger' : 'text-muted'); ?>"
            title="<?php echo e($item->isRequired()
                ? lang('admin::lang.menu_options.is_required')
                : lang('admin::lang.menu_options.is_not_required')); ?>"
        ></i>
    </div>
    <div class="px-2">
        <?php if($item->display_type == 'radio'): ?>
            <i
                title="<?php echo e(sprintf(lang('admin::lang.menu_options.text_option_summary'), $item->display_type)); ?>"
                class="fa fa-dot-circle text-muted"
            ></i>
        <?php elseif($item->display_type == 'checkbox'): ?>
            <i
                title="<?php echo e(sprintf(lang('admin::lang.menu_options.text_option_summary'), $item->display_type)); ?>"
                class="fa fa-check-square text-muted"
            ></i>
        <?php elseif($item->display_type == 'select'): ?>
            <i
                title="<?php echo e(sprintf(lang('admin::lang.menu_options.text_option_summary'), $item->display_type)); ?>"
                class="fa fa-caret-square-down text-muted"
            ></i>
        <?php elseif($item->display_type == 'quantity'): ?>
            <i
                title="<?php echo e(sprintf(lang('admin::lang.menu_options.text_option_summary'), $item->display_type)); ?>"
                class="fa fa-plus-square text-muted"
            ></i>
        <?php else: ?>
            <?php echo e(sprintf(lang('admin::lang.menu_options.text_option_summary'), $item->display_type)); ?>

        <?php endif; ?>
    </div>
    <div class="px-2">
        <p class="card-title font-weight-bold mb-1"><?php echo e($item->option_name); ?></p>
        <?php $__currentLoopData = $item->menu_option_values->sortBy('priority')->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuOptionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge border"><?php echo e($menuOptionValue->name); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/views/menus/form/menu_options.blade.php ENDPATH**/ ?>