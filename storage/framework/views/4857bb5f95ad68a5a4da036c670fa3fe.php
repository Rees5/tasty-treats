<div class="card">
    <div class="card-header">
        <h5><?php echo app('translator')->get('igniter.local::default.text_locations_filter_title'); ?></h5>
    </div>
    <div class="list-group list-group-flush">
        <?php $__currentLoopData = $filterSorters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a
                class="list-group-item<?php echo e($key == $filterSorted ? ' disabled' : ''); ?>"
                href="<?php echo e($filter['href']); ?>"
            ><?php echo e($filter['name']); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

