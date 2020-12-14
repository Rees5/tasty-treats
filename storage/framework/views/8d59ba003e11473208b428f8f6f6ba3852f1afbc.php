<div class="d-sm-flex flex-sm-wrap w-100 no-gutters">
    <?php $__currentLoopData = $scopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col col-sm-2 mr-3">
            <?php echo $this->renderScopeElement($scope); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/filter/filter_scopes.blade.php ENDPATH**/ ?>