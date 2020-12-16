<select
    name="location"
    id="locationSelect"
    class="form-control"
>
    <?php $__currentLoopData = $__SELF__->getLocations(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option
            value="<?php echo e($key); ?>"
            <?php echo $key == $bookingLocation->getKey() ? 'selected="selected"' : ''; ?>

        ><?php echo e($value); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

