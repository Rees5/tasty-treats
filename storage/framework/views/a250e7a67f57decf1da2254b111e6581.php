<div class="form-row mb-4">
    <?php if($bookingLocation->hasMedia()): ?>
        <div class="col-sm-2">
            <img class="img-responsive img-rounded" src="<?php echo e($bookingLocation->getThumb()); ?>">
        </div>
    <?php endif; ?>
    <div class="col-sm-3">
        <h5 class="text-muted"><?php echo app('translator')->get('igniter.reservation::default.label_guest_num'); ?></h5>
        <h4 class="font-weight-normal"><?php echo e($__SELF__->getGuestSizeOptions($guestSize)); ?></h4>
    </div>
    <div class="col-sm-2">
        <h5 class="text-muted"><?php echo app('translator')->get('igniter.reservation::default.label_date'); ?></h5>
        <h4 class="font-weight-normal"><?php echo e($selectedDate->isoFormat($bookingDateFormat)); ?></h4>
    </div>
    <div class="col-sm-2">
        <h5 class="text-muted"><?php echo app('translator')->get('igniter.reservation::default.label_time'); ?></h5>
        <h4 class="font-weight-normal"><?php echo e($selectedDate->isoFormat($bookingTimeFormat)); ?></h4>
    </div>
    <div class="col-sm-3">
        <h5 class="text-muted"><?php echo app('translator')->get('igniter.reservation::default.label_location'); ?></h5>
        <h4 class="font-weight-normal"><?php echo e($bookingLocation->getName()); ?></h4>
    </div>
</div>
