<div class="d-flex">
    <div class="mr-3 flex-fill text-center">
        <label class="control-label">
            <?php echo app('translator')->get('admin::lang.label_status'); ?>
        </label>
        <a
            class="d-flex align-items-center justify-content-center"
            role="button"
            data-editor-control="load-status"
        >
            <h3
                style="border-bottom: 2px dashed;<?php echo e($status ? 'color: '.$status->status_color : ''); ?>;"
            ><?php echo e($status ? lang($status->status_name) : '--'); ?></h3>
        </a>
    </div>
    <div class="mr-3 flex-fill text-center">
        <label class="control-label">
            <?php echo e(lang('admin::lang.orders.label_assign_staff')); ?>

        </label>
        <a
            class="d-flex align-items-center justify-content-center"
            role="button"
            data-editor-control="load-assignee"
        >
            <h3
                style="border-bottom: 2px dashed;"
            ><?php echo e($assignee ? $assignee->staff_name : '--'); ?></h3>
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/statuseditor/info.blade.php ENDPATH**/ ?>