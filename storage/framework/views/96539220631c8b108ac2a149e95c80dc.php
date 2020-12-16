<div
    id="stripePaymentForm"
    class="payment-form w-100"
    data-publishable-key="<?php echo e($paymentMethod->getPublishableKey()); ?>"
    data-card-selector="#stripe-card-element"
    data-error-selector="#stripe-card-errors"
>
    <?php $__currentLoopData = $paymentMethod->getHiddenFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="form-group">
        <?php if($paymentProfile = $paymentMethod->findPaymentProfile($order->customer)): ?>
            <input type="hidden" name="pay_from_profile" value="1">
            <div>
                <i class="fab fa-fw fa-cc-<?php echo e($paymentProfile->card_brand); ?>"></i>&nbsp;&nbsp;
                <b>&bull;&bull;&bull;&bull;&nbsp;&bull;&bull;&bull;&bull;&nbsp;&bull;&bull;&bull;&bull;&nbsp;<?php echo e($paymentProfile->card_last4); ?></b>
                &nbsp;&nbsp;-&nbsp;&nbsp;
                <a
                    class="text-danger"
                    href="javascript:;"
                    data-checkout-control="delete-payment-profile"
                    data-payment-code="<?php echo e($paymentMethod->code); ?>"
                ><?php echo app('translator')->get('igniter.payregister::default.button_delete_card'); ?></a>
            </div>
        <?php else: ?>
            <label
                for="stripe-card-element"
            ><?php echo app('translator')->get('igniter.payregister::default.stripe.text_credit_or_debit'); ?></label>
            <div id="stripe-card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="stripe-card-errors" class="text-danger" role="alert"></div>

            <?php if($paymentMethod->supportsPaymentProfiles() AND $order->customer): ?>
                <div class="custom-control custom-checkbox mt-2">
                    <input
                        id="save-customer-profile"
                        type="checkbox"
                        class="custom-control-input"
                        name="create_payment_profile"
                        value="1"
                    >
                    <label
                        class="custom-control-label"
                        for="save-customer-profile"
                    ><?php echo app('translator')->get('igniter.payregister::default.text_save_card_profile'); ?></label>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
