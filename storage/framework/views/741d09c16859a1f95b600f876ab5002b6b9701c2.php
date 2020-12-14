<div
    id="<?php echo e($this->getId()); ?>"
    data-control="map-area"
    data-alias="<?php echo e($this->alias); ?>"
    data-remove-handler="<?php echo e($this->getEventHandler('onDeleteArea')); ?>"
>
    <div class="map-area-container my-3">
        <?php echo $this->makePartial('maparea/areas'); ?>

    </div>

    <div
        id="<?php echo e($this->getId('toolbar')); ?>"
        class="map-area-toolbar"
    >
        <?php echo $this->makePartial('maparea/toolbar'); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/maparea/maparea.blade.php ENDPATH**/ ?>