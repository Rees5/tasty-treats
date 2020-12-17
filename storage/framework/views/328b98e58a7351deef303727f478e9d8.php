<div
    id="authorizeNetAimPaymentForm"
    class="payment-form w-100"
    data-button-selector=".AcceptUI"
    data-error-selector="#authorizenetaim-errors"
    data-accept-js-endpoint="<?php echo e($paymentMethod->getEndPoint()); ?>"
>
    <?php $__currentLoopData = $paymentMethod->getHiddenFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($paymentProfile = $paymentMethod->findPaymentProfile($order->customer)): ?>
        <div class="form-group">
            <input type="hidden" name="pay_from_profile" value="1">
            <div>
                <i class="fab fa-fw fa-cc-<?php echo e($paymentProfile->card_brand); ?>"></i>&nbsp;&nbsp;
                <b>************&nbsp;<?php echo e($paymentProfile->card_last4); ?></b>
                &nbsp;&nbsp;-&nbsp;&nbsp;
                <a
                    class="text-danger"
                    href="javascript:;"
                    data-checkout-control="delete-payment-profile"
                    data-payment-code="<?php echo e($paymentMethod->code); ?>"
                ><?php echo app('translator')->get('igniter.payregister::default.button_delete_card'); ?></a>
            </div>
        </div>
    <?php else: ?>
        <button
            type="button"
            class="AcceptUI hide"
            data-billingAddressOptions='{"show":true, "required":false}'
            data-apiLoginID="<?php echo e($paymentMethod->getApiLoginID()); ?>"
            data-clientKey="<?php echo e($paymentMethod->getClientKey()); ?>"
            data-paymentOptions='{"showCreditCard": true, "showBankAccount": false}'
            data-acceptUIFormHeaderTxt="Card Information"
            data-responseHandler="authorizeNetAimResponseHandler"
        ></button>
        <div id="authorizenetaim-errors" class="text-danger"></div>
    <?php endif; ?>
</div>