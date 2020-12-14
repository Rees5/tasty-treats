<div
    id="<?php echo e($this->getId('item-'.$index)); ?>"
    class="card bg-light shadow-sm mb-2"
    data-item-index="<?php echo e($index); ?>"
>
    <div class="card-body">
        <div class="d-flex w-100 justify-content-between">
            <?php if(!$this->previewMode AND $sortable): ?>
                <input type="hidden" name="<?php echo e($sortableInputName); ?>[]" value="<?php echo e($item->getKey()); ?>">
                <div class="align-self-center">
                    <a
                        class="btn handle <?php echo e($this->getId('items')); ?>-handle"
                        role="button">
                        <i class="fa fa-arrows-alt-v text-black-50"></i>
                    </a>
                </div>
            <?php endif; ?>
            <div
                class="flex-fill"
                data-control="load-item"
                data-item-id="<?php echo e($item->getKey()); ?>"
                role="button"
            >
                <?php if($this->partial): ?>
                    <?php echo $this->makePartial($this->partial, ['item' => $item]); ?>

                <?php else: ?>
                    <p class="card-title font-weight-bold"><?php echo e($item->{$nameFrom}); ?></p>
                    <p class="card-subtitle mb-0"><?php echo e($item->{$descriptionFrom}); ?></p>
                <?php endif; ?>
            </div>
            <?php if (! ($this->previewMode)): ?>
                <div class="align-self-center ml-auto">
                    <a
                        class="close text-danger"
                        aria-label="Remove"
                        data-control="delete-item"
                        data-item-id="<?php echo e($item->getKey()); ?>"
                        data-item-selector="#<?php echo e($this->getId('item-'.$index)); ?>"
                        data-confirm-message="<?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?>"
                    ><i class="fa fa-trash-alt"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/connector/connector_item.blade.php ENDPATH**/ ?>