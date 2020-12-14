<div class="card<?php echo e(empty($item['installed']) ? ' bg-light' : ''); ?> item-theme shadow-sm">
    <img
        src="<?php echo e($item['icon']); ?>"
        class="img-responsive img-rounded"
        alt="No Image"
        style="height: 200px"
    >
    <div class="panel-body">
        <b><?php echo e(str_limit($item['name'], 22)); ?></b>
        <p class="text-muted mb-0"><?php echo e(str_limit($item['description'], 72)); ?></p>
    </div>
    <div class="d-flex p-3">
        <?php if(!empty($item['installed'])): ?>
            <button class="btn btn-outline-default btn-block disabled" title="Added">
                <i class="fa fa-cloud-download"></i>
            </button>
        <?php else: ?>
            <button
                class="btn btn-outline-success btn-block btn-install"
                data-title="Add <?php echo e($item['name']); ?>"
                data-control="add-item"
                data-item-code="<?php echo e($item['code']); ?>"
                data-item-name="<?php echo e($item['name']); ?>"
                data-item-type="<?php echo e($item['type']); ?>"
                data-item-version="<?php echo e($item['version']); ?>"
                data-item-context='<?php echo json_encode($item, 15, 512) ?>'
                data-item-action="install">
                <i class="fa fa-cloud-download"></i>
            </button>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/updates/browse/theme.blade.php ENDPATH**/ ?>