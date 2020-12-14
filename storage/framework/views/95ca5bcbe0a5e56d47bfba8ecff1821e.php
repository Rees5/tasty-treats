<div class="label label-light mb-3">
    <span class="h6">
        <i class="fa fa-clock"></i>&nbsp;
        <?php echo e($order->order_date->setTimeFromTimeString($order->order_time)->isoFormat($orderDateTimeFormat)); ?>

    </span>
</div>
<h5><?php echo app('translator')->get('igniter.cart::default.checkout.text_order_no'); ?><?php echo e($order->order_id); ?></h5>
<?php if($order->status): ?>
    <div class="row justify-content-center">
        <div class="col-sm-6 py-3">
            <div class="row">
                <?php $__currentLoopData = $__SELF__->getStatusWidthForProgressBars(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $width): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4">
                        <div class="progress" style="height: 8px">
                            <div
                                class="progress-bar progress-bar-striped"
                                role="progressbar"
                                data-status-group="<?php echo e($group); ?>"
                                data-status-width="<?php echo e($width); ?>"
                                style="width: <?php echo e($width); ?>%;"
                            ></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <h3 style="color: <?php echo e($order->status->status_color); ?>;"><?php echo e($order->status->status_name); ?></h3>
    <p class="lead"><?php echo $order->status->status_comment; ?></p>
<?php else: ?>
    <h3>--</h3>
<?php endif; ?>

<p class="mb-0"><?php echo app('translator')->get('igniter.cart::default.checkout.text_success_message'); ?></p>

<div class="mt-3">
    <?php if(!$hideReorderBtn): ?>
        <button
            class="btn btn-primary re-order"
            data-request="<?php echo e($__SELF__.'::onReOrder'); ?>"
            data-request-data="orderId: <?php echo e($order->order_id); ?>"
            data-attach-loading
        ><?php echo app('translator')->get('igniter.cart::default.orders.button_reorder'); ?></button>
    <?php endif; ?>
</div>
