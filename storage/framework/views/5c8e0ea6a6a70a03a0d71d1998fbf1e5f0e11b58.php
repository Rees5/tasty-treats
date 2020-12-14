<?php $__currentLoopData = $fieldItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $this->makePartial('connector/connector_item', [
        'item' => $fieldItem,
        'index' => $loop->iteration,
    ]); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/connector/connector_items.blade.php ENDPATH**/ ?>