<?php if($locationCurrent->hasDelivery() OR $locationCurrent->hasCollection()): ?>
    <?php
        $deliveryTime = make_carbon($location->deliverySchedule()->getOpenTime());
        $collectionTime = make_carbon($location->collectionSchedule()->getOpenTime());
    ?>
    <div
        class="btn-group btn-group-toggle w-100 text-center"
        data-toggle="buttons"
        data-control="order-type-toggle"
        data-handler="<?php echo e($orderTypeEventHandler); ?>"
    >
        <?php if($locationCurrent->hasDelivery()): ?>
            <label
                class="btn btn-light w-50 <?php echo e($location->orderTypeIsDelivery() ? 'active' : ''); ?>">
                <input
                    type="radio"
                    name="order_type"
                    value="delivery" <?php echo e($location->orderTypeIsDelivery() ? 'checked="checked"' : ''); ?>

                />&nbsp;&nbsp;
                <strong><?php echo app('translator')->get('igniter.local::default.text_delivery'); ?></strong>
                <span class="small center-block">
                    <?php if($location->deliverySchedule()->isOpen()): ?>
                        <?php echo sprintf(lang('igniter.local::default.text_in_min'), $locationCurrent->deliveryMinutes()); ?>

                    <?php elseif($location->deliverySchedule()->isOpening()): ?>
                        <?php echo sprintf(lang('igniter.local::default.text_starts'), $deliveryTime->isoFormat($openingTimeFormat)); ?>

                    <?php else: ?>
                        <?php echo app('translator')->get('igniter.cart::default.text_is_closed'); ?>
                    <?php endif; ?>
                </span>
            </label>
        <?php endif; ?>
        <?php if($locationCurrent->hasCollection()): ?>
            <label class="btn btn-light w-50 <?php echo e($location->orderTypeIsCollection() ? 'active' : ''); ?>">
                <input
                    type="radio"
                    name="order_type"
                    value="collection"
                    <?php echo $location->orderTypeIsCollection() ? 'checked="checked"' : ''; ?>

                />&nbsp;&nbsp;
                <strong><?php echo app('translator')->get('igniter.local::default.text_collection'); ?></strong>
                <span
                    class="small center-block">
                        <?php if($location->collectionSchedule()->isOpen()): ?>
                        <?php echo sprintf(lang('igniter.local::default.text_in_min'), $locationCurrent->collectionMinutes()); ?>

                    <?php elseif($location->collectionSchedule()->isOpening()): ?>
                        <?php echo sprintf(lang('igniter.local::default.text_starts'), $collectionTime->isoFormat($openingTimeFormat)); ?>

                    <?php else: ?>
                        <?php echo app('translator')->get('igniter.cart::default.text_is_closed'); ?>
                    <?php endif; ?>
                </span>
            </label>
        <?php endif; ?>
    </div>
    <?php if($location->orderTypeIsDelivery()): ?>
        <p class="text-muted text-center my-2">
            <?php if($minOrderTotal = $location->minimumOrder($cart->subtotal())): ?>
                <?php echo app('translator')->get('igniter.local::default.text_min_total'); ?>: <?php echo e(currency_format($minOrderTotal)); ?>

            <?php else: ?>
                <?php echo app('translator')->get('igniter.local::default.text_no_min_total'); ?>
            <?php endif; ?>
        </p>
    <?php endif; ?>
<?php endif; ?>

