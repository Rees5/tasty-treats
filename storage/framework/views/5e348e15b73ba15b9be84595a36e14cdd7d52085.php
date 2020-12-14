<?php
    $menuItems = $model->getOrderMenus();
    $menuItemsOptions = $model->getOrderMenuOptions();
    $orderTotals = $model->getOrderTotals();
?>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th width="65%"><?php echo app('translator')->get('admin::lang.orders.column_name_option'); ?></th>
            <th class="text-left"><?php echo app('translator')->get('admin::lang.orders.column_price'); ?></th>
            <th class="text-right"><?php echo app('translator')->get('admin::lang.orders.column_total'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($menuItem->quantity); ?>x</td>
                <td><b><?php echo e($menuItem->name); ?></b>
                    <?php if($menuItemOptions = $menuItemsOptions->get($menuItem->order_menu_id)): ?>
                        <ul class="list-unstyled">
                            <?php $__currentLoopData = $menuItemOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItemOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php echo e($menuItemOption->quantity); ?>x
                                    <?php echo e($menuItemOption->order_option_name); ?>&nbsp;
                                    <?php if($menuItemOption->order_option_price > 0): ?>
                                        (<?php echo e(currency_format($menuItemOption->quantity * $menuItemOption->order_option_price)); ?>

                                        )
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(!empty($menuItem->comment)): ?>
                        <p class="font-weight-bold"><?php echo e($menuItem->comment); ?></p>
                    <?php endif; ?>
                </td>
                <td class="text-left"><?php echo e(currency_format($menuItem->price)); ?></td>
                <td class="text-right"><?php echo e(currency_format($menuItem->subtotal)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="border-top p-0" colspan="99999"></td>
        </tr>
        <?php $__currentLoopData = $orderTotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($model->isCollectionType() AND $total->code == 'delivery') continue; ?>
            <?php $thickLine = ($total->code == 'order_total' OR $total->code == 'total') ?>
            <tr>
                <td
                    class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'lead font-weight-bold' : 'text-muted'); ?>" width="1"
                ></td>
                <td
                    class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'lead font-weight-bold' : 'text-muted'); ?>"
                ></td>
                <td
                    class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'lead font-weight-bold' : 'text-muted'); ?> text-left"
                ><?php echo e($total->title); ?></td>
                <td
                    class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'lead font-weight-bold' : ''); ?> text-right"
                ><?php echo e(currency_format($total->value)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/views/orders/form/order_menus.blade.php ENDPATH**/ ?>