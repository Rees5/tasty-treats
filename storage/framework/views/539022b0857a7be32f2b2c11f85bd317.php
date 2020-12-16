<div
    data-control="checkout"
    data-choose-payment-handler="<?php echo e($choosePaymentEventHandler); ?>"
    data-delete-payment-handler="<?php echo e($deletePaymentEventHandler); ?>"
    data-partial="checkoutForm"
>
    <?php echo controller()->renderPartial('@form'); ?>
</div>
