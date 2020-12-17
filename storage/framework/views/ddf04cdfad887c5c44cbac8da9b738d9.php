<?php if($cart->count()): ?>
    <form
        id="tip-form"
        method="POST"
        role="form"
        data-request="<?php echo e($applyTipEventHandler); ?>"
    >
        <div class="cart-tip">
            <div class="overflow-auto">
                <?php
                    $tipAmountType = $__SELF__->tippingSelectedType();
                    $currentAmount = $__SELF__->tippingSelectedAmount();
                ?>
                <?php if($tipAmounts = $__SELF__->tippingAmounts()): ?>
                    <div class="btn-group btn-group-toggle w-100 text-center tip-amounts" data-toggle="buttons">
                        <button
                            type="button"
                            class="btn btn-light text-nowrap<?php echo e($tipAmountType == 'none' ? ' active' : ''); ?>"
                            data-cart-control="tip-amount"
                            data-tip-amount-type="none"
                        ><?php echo app('translator')->get('igniter.cart::default.text_no_tip'); ?></button>
                        <?php $__currentLoopData = $tipAmounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipAmount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button
                                type="button"
                                class="btn btn-light text-nowrap<?php echo e($currentAmount == $tipAmount->value ? ' active' : ''); ?>"
                                data-cart-control="tip-amount"
                                data-tip-amount-type="amount"
                                data-tip-value="<?php echo e($tipAmount->value); ?>"
                            ><strong><?php echo e($tipAmount->valueType != 'F' ? round($tipAmount->value).'%' : currency_format($tipAmount->value)); ?></strong></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button
                            type="button"
                            class="btn btn-light<?php echo e($tipAmountType == 'custom' ? ' active' : ''); ?>"
                            data-cart-control="tip-amount"
                            data-tip-amount-type="custom"
                        ><?php echo app('translator')->get('igniter.cart::default.text_edit_tip'); ?></button>
                    </div>
                <?php endif; ?>
                <input type="hidden" name="amount_type" value="<?php echo e($tipAmountType); ?>">
                <div
                    class="input-group<?php echo e($tipAmounts ? ' mt-2' : ''); ?>"
                    data-tip-custom
                    <?php echo ($tipAmounts AND $tipAmountType != 'custom') ? 'style="display: none;"' : ''; ?>

                >
                    <input
                        type="number"
                        name="amount"
                        class="form-control"
                        value="<?php echo e($currentAmount); ?>"
                        placeholder="<?php echo app('translator')->get('igniter.cart::default.text_apply_tip'); ?>"
                    />
                    <div class="input-group-append">
                        <button
                            type="submit"
                            class="btn btn-light"
                            data-replace-loading="fa fa-spinner fa-spin"
                            title="<?php echo app('translator')->get('igniter.cart::default.button_apply_tip'); ?>"
                        ><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endif; ?>
