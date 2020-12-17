<div class="panel">
    <?php if(strlen($locationInfo->description)): ?>
        <div class="panel-body">
            <h1
                class="h4 wrap-bottom border-bottom"
            ><?php echo e(sprintf(lang('igniter.local::default.text_info_heading'), $locationInfo->name)); ?></h1>
            <p class="m-0"><?php echo nl2br($locationInfo->description); ?></p>
        </div>
    <?php endif; ?>

    <div class="list-group list-group-flush">
        <?php if($locationInfo->opensAllDay): ?>
            <div class="list-group-item"><?php echo app('translator')->get('igniter.local::default.text_opens_24_7'); ?></div>
        <?php endif; ?>
        <?php if($locationInfo->hasDelivery): ?>
            <div class="list-group-item">
                <?php echo app('translator')->get('igniter.local::default.text_delivery'); ?>
                <?php if($locationInfo->deliverySchedule->isOpen()): ?>
                    <?php echo sprintf(lang('igniter.local::default.text_in_minutes'), $locationInfo->deliveryMinutes); ?>

                <?php elseif($locationInfo->deliverySchedule->isOpening()): ?>
                    <span class="text-danger"><?php echo sprintf(lang('igniter.local::default.text_starts'), make_carbon($locationInfo->deliverySchedule->getOpenTime())->isoFormat($openingTimeFormat)); ?></span>
                <?php else: ?>
                    <?php echo app('translator')->get('igniter.local::default.text_closed'); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($locationInfo->hasCollection): ?>
            <div class="list-group-item">
                <?php echo app('translator')->get('igniter.local::default.text_collection'); ?>
                <?php if($locationInfo->collectionSchedule->isOpen()): ?>
                    <?php echo sprintf(lang('igniter.local::default.text_in_minutes'), $locationInfo->collectionMinutes); ?>

                <?php elseif($locationInfo->collectionSchedule->isOpening()): ?>
                    <span class="text-danger"><?php echo sprintf(lang('igniter.local::default.text_starts'), make_carbon($locationInfo->collectionSchedule->getOpenTime())->isoFormat($openingTimeFormat)); ?></span>
                <?php else: ?>
                    <?php echo app('translator')->get('igniter.local::default.text_closed'); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($locationInfo->hasDelivery): ?>
            <div class="list-group-item">
                <?php echo app('translator')->get('igniter.local::default.text_last_order_time'); ?>&nbsp;
                <b><?php echo e($locationInfo->lastOrderTime->isoFormat($lastOrderTimeFormat)); ?></b>
            </div>
        <?php endif; ?>
        <?php if($locationInfo->payments): ?>
            <div class="list-group-item">
                <i class="fas fa-credit-card fa-fw"></i>&nbsp;<b><?php echo app('translator')->get('igniter.local::default.text_payments'); ?></b><br/>
                <?php echo implode(', ', $locationInfo->payments); ?>.
            </div>
        <?php endif; ?>
    </div>

    <?php echo controller()->renderPartial('@areas'); ?>

    <h4 class="panel-title p-3"><b><?php echo app('translator')->get('igniter.local::default.text_hours'); ?></b></h4>

    <?php echo controller()->renderPartial('@hours'); ?>
</div>


