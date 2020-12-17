<select
    name="time"
    id="time"
    class="form-control"
>
    <?php $__currentLoopData = $timeOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option
            value="<?php echo e($value->rawTime); ?>"
            <?php echo set_select('time', $value->rawTime); ?>

            <?php echo $value->fullyBooked ? 'disabled="disabled"' : ''; ?>

        ><?php echo e($value->time); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

