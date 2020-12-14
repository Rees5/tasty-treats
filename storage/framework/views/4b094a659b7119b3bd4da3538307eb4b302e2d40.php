<?php if(isset($items) AND count($items)): ?>
    <div class="row select-box">
        <?php $__currentLoopData = $items['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col col-sm-4 mb-4">
                <?php echo $this->makePartial('updates/browse/'.$itemType, ['item' => $item]); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/updates/browse/list.blade.php ENDPATH**/ ?>