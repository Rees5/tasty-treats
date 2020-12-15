<div class="row-fluid">
    <div class="card border-none">
        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!count($categories)) continue; ?>
            <div class="card-header">
                <h5 class="card-title mb-0"><?php echo e(ucwords($item)); ?></h5>
            </div>
            <div class="list-group list-group-flush shadow-sm">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a
                        class="list-group-item list-group-item-action"
                        href="<?php echo e($category->url); ?>"
                        role="button"
                    >
                        <div class="d-flex align-items-center">
                            <div class="pr-3">
                                <h5>
                                    <?php if($item == 'core' AND count(array_get($settingItemErrors, $category->code, []))): ?>
                                        <i
                                            class="text-danger fa fa-exclamation-triangle fa-fw"
                                            title="<?php echo app('translator')->get('system::lang.settings.alert_settings_errors'); ?>"
                                        ></i>
                                    <?php elseif($category->icon): ?>
                                        <i class="text-muted <?php echo e($category->icon); ?> fa-fw"></i>
                                    <?php else: ?>
                                        <i class="text-muted fa fa-puzzle-piece fa-fw"></i>
                                    <?php endif; ?>
                                </h5>
                            </div>
                            <div class="">
                                <h5><?php echo app('translator')->get($category->label); ?></h5>
                                <p class="no-margin"><?php echo $category->description ? lang($category->description) : ''; ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/settings/index.blade.php ENDPATH**/ ?>