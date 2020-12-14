<div
    id="<?php echo e($this->getId('items-container')); ?>"
    class="field-connector"
    data-control="connector"
    data-alias="<?php echo e($this->alias); ?>"
    data-sortable-container="#<?php echo e($this->getId('items')); ?>"
    data-sortable-handle=".<?php echo e($this->getId('items')); ?>-handle"
>
    <div
        id="<?php echo e($this->getId('items')); ?>"
        role="tablist"
        aria-multiselectable="true">
        <?php echo $this->makePartial('connector/connector_items'); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/connector/connector.blade.php ENDPATH**/ ?>