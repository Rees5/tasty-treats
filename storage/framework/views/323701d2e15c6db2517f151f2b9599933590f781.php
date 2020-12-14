<a
    class="text-reset"
    role="button"
    <?php if(empty($item['installed'])): ?>
        data-control="add-item"
        data-item-code="<?php echo e($item['code']); ?>"
        data-item-name="<?php echo e($item['name']); ?>"
        data-item-type="<?php echo e($item['type']); ?>"
        data-item-version="<?php echo e($item['version']); ?>"
        data-item-context='<?php echo json_encode($item, 15, 512) ?>'
        data-item-action="install"
    <?php endif; ?>
>
    <div class="card<?php echo e(empty($item['installed']) ? ' bg-light' : ''); ?> item-extension h-100 shadow-sm">
        <div class="d-flex align-items-center h-100 p-3">
            <div class="pr-3">
                <?php if(!empty($item['thumb'])): ?>
                    <img src="<?php echo e($item['thumb']); ?>"
                         class="img-rounded"
                         alt="No Image"
                         style="width: 64px; height: 64px;">
                <?php else: ?>
                    <span
                        class="extension-icon icon-lg rounded"
                        style="<?php echo e($item['icon']['styles'] ?? ''); ?>"
                    ><i class="<?php echo e($item['icon']['class'] ?? ''); ?>"></i></span>
                <?php endif; ?>
            </div>
            <div class="flex-grow-1 px-0 ml-auto">
                <b><?php echo e(str_limit($item['name'], 22)); ?></b>
                <p class="mb-0"><?php echo e(str_limit($item['description'], 128)); ?></p>
            </div>
        </div>
    </div>
</a>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/updates/browse/extension.blade.php ENDPATH**/ ?>