<?php if($order->isDeliveryType()): ?>
    <div class="card mb-1">
        <div class="card-body">
            <h2 class="h4 font-weight-normal"><?php echo app('translator')->get('igniter.cart::default.checkout.text_delivery_address'); ?></h2>
            <b><?php echo e($order->customer_name); ?></b><br>
            <?php echo format_address($order->address); ?>

        </div>
    </div>
<?php endif; ?>

<div class="card mb-1">
    <div class="card-body">
        <h2 class="h4 font-weight-normal"><?php echo app('translator')->get('igniter.cart::default.checkout.text_comment'); ?></h2>
        <p class="mb-0"><?php echo !empty($order->comment) ? $order->comment : lang('igniter.cart::default.checkout.text_no_comment'); ?></p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h2 class="h4 font-weight-normal"><?php echo app('translator')->get('igniter.cart::default.checkout.label_payment_method'); ?></h2>
        <p class="mb-0">
            <?php echo e($order->payment_method
                ? $order->payment_method->name
                : lang('igniter.cart::default.checkout.text_no_payment')); ?>

        </p>
    </div>
</div>
