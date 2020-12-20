<?php $__currentLoopData = $menuItem->allergens->where('status', 1) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a
        class="badge <?php echo e(!($hasMedia = $allergen->hasMedia('thumb')) ? 'badge-light' : ''); ?> rounded mt-2 mr-1"
        data-toggle="tooltip"
        title="<?php echo e($allergen->name); ?>: <?php echo e($allergen->description); ?>"
    >
        <?php if($hasMedia): ?>
            <img
                class="img-responsive img-rounded"
                alt="<?php echo e($allergen->name); ?>"
                src="<?php echo e($allergen->getThumb(['width' => $menuAllergenImageWidth, 'height' => $menuAllergenImageHeight])); ?>"
            >
        <?php else: ?>
            <?php echo e($allergen->name); ?>

        <?php endif; ?>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
