<p>
    <?php echo e(sprintf(lang('igniter.reservation::default.text_time_msg'), $longDateTime, $guestSize)); ?>

</p>

<?php echo form_open($__SELF__->getFormAction(), [
    'id' => 'picker-form',
    'role' => 'form',
    'method' => 'GET',
]); ?>

<input type="hidden" name="picker_step" value="2">
<input type="hidden" name="location" value="<?php echo e($__SELF__->location->getKey()); ?>">
<input type="hidden" name="date" value="<?php echo e($selectedDate->format('Y-m-d')); ?>">
<input type="hidden" name="time" value="<?php echo e($selectedDate->format('H:i')); ?>">
<input type="hidden" name="guest" value="<?php echo e($guestSize); ?>">

<?php if(count($timeSlots = $__SELF__->getReducedTimeSlots())): ?>
    <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button
            type="<?php echo e(!$slot->fullyBooked ? 'submit' : 'button'); ?>"
            name="sdateTime"
            value="<?php echo e($selectedDate->format('Y-m-d').' '.$slot->rawTime); ?>"
            class="timeslot btn btn-primary d-block d-sm-inline-block<?php echo e($slot->fullyBooked ? ' disabled' : ''); ?>"
        ><?php echo e($slot->time); ?></button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <?php echo app('translator')->get('igniter.reservation::default.text_no_time_slot'); ?>
<?php endif; ?>

<div class="form-row">
    <div class="col">
        <?php echo form_error('sdateTime', '<span class="help-block text-danger">', '</span>'); ?>

    </div>
</div>

<?php echo form_close(); ?>


