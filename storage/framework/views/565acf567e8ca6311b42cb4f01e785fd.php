<?php if(count($customerOrders)): ?>
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th><?php echo app('translator')->get('igniter.cart::default.orders.column_location'); ?></th>
                <th><?php echo app('translator')->get('igniter.cart::default.orders.column_status'); ?></th>
                <th><?php echo app('translator')->get('igniter.cart::default.orders.column_date'); ?></th>
                <th><?php echo app('translator')->get('igniter.cart::default.orders.column_total'); ?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $customerOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->location ? $order->location->location_name : ''); ?></td>
                    <td><b><?php echo e($order->status ? $order->status->status_name : ''); ?></b></td>
                    <td><?php echo e($order->order_date->setTimeFromTimeString($order->order_time)->isoFormat($orderDateTimeFormat)); ?></td>
                    <td><?php echo e(currency_format($order->order_total)); ?>

                        (<?php echo $order->total_items.' '.lang('igniter.cart::default.orders.column_items'); ?>)
                    </td>
                    <td>
                        <a
                            class="btn btn-light"
                            href="<?php echo e(site_url($orderPage, ['orderId' => $order->order_id, 'hash' => $order->hash])); ?>"
                        ><i class="fa fa-receipt"></i>&nbsp;&nbsp;<?php echo app('translator')->get('igniter.cart::default.orders.button_view_order'); ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-bar text-right">
        <div class="links"><?php echo $customerOrders->links(); ?></div>
    </div>
<?php else: ?>
    <p><?php echo app('translator')->get('igniter.cart::default.orders.text_empty'); ?></p>
<?php endif; ?>
