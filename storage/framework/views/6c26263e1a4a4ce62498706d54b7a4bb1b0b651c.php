<div class="d-flex">
    <div class="mr-3 flex-fill">
        <label class="control-label">
            <?php echo app('translator')->get('admin::lang.orders.label_order_id'); ?>
        </label>
        <h3>#<?php echo e($formModel->order_id); ?></h3>
    </div>
    <div class="mr-3 flex-fill text-center">
        <label class="control-label">
            <?php echo app('translator')->get('admin::lang.orders.label_total_items'); ?>
        </label>
        <h3><?php echo e($formModel->total_items); ?></h3>
    </div>
    <div class="flex-fill text-center">
        <label class="control-label">
            <?php echo app('translator')->get('admin::lang.orders.label_order_total'); ?>
        </label>
        <h3><?php echo e(currency_format($formModel->order_total)); ?></h3>
    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/views/orders/form/info.blade.php ENDPATH**/ ?>