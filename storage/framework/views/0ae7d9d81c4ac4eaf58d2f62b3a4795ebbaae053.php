<div
    id="<?php echo e($this->getId('area-'.$area->area_id)); ?>"
    class="map-area card bg-light shadow-sm mb-2"
    data-control="area"
    data-area-id="<?php echo e($area->area_id); ?>"
>
    <div
        class="card-body"
        role="tab"
        id="<?php echo e($this->getId('area-header-'.$area->area_id)); ?>"
    >
        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center mr-3">
                 <span
                     class="badge"
                     style="background-color:<?php echo e($area->color); ?>"
                 >&nbsp;</span>
            </div>
            <div
                class="flex-fill align-self-center"
                data-control="load-area"
                data-handler="<?php echo e($this->getEventHandler('onLoadArea')); ?>"
                role="button"
            ><b><?php echo e($area->name); ?></b></div>
            <div class="align-self-center ml-auto">
                <a
                    class="close text-danger"
                    aria-label="Remove"
                    role="button"
                    <?php if (! ($this->previewMode)): ?>
                    data-control="remove-area"
                    data-confirm-message="<?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?>"
                    <?php endif; ?>
                ><i class="fa fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/maparea/area.blade.php ENDPATH**/ ?>