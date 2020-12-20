<div
    id="<?php echo e($sliderSelectorId); ?>"
    class="carousel slide"
    data-ride="carousel"
>
    <?php if($showSliderIndicators): ?>
        <ol class="carousel-indicators">
            <?php $__currentLoopData = $__SELF__->slides(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li
                    class="<?php echo e($loop->first ? 'active' : ''); ?>"
                    data-target="#<?php echo e($sliderSelectorId); ?>"
                    data-slide-to="<?php echo e($sliderSelectorId); ?>"
                ></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    <?php endif; ?>

    <div class="carousel-inner">
        <?php $__currentLoopData = $__SELF__->slides(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>"
                style="max-height:<?php echo e($sliderHeight); ?>;"
            >
                <img
                    src="<?php echo e($slide->getThumb()); ?>"
                    class="d-block w-100"
                    alt="<?php echo e($slide->getCustomProperty('title')); ?>"
                />

                <?php if($showSliderCaptions AND strlen($slide->getCustomProperty('description'))): ?>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo e($slide->getCustomProperty('title')); ?></h5>
                        <p><?php echo e($slide->getCustomProperty('description')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if($showSliderControls AND count($__SELF__->slides()) > 1): ?>
        <a
            class="carousel-control-prev"
            href="#<?php echo e($sliderSelectorId); ?>"
            role="button"
            data-slide="prev"
        ><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
        <a
            class="carousel-control-next"
            href="#<?php echo e($sliderSelectorId); ?>"
            role="button"
            data-slide="next"
        ><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
    <?php endif; ?>
</div>

