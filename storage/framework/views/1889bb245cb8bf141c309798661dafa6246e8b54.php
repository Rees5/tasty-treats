<div class="media-finder">
    <div class="grid">
        <?php if($this->previewMode): ?>
            <a>
                <div class="img-cover">
                    <img src="<?php echo e($this->getMediaThumb($mediaItem)); ?>" class="img-responsive">
                </div>
            </a>
        <?php else: ?>
            <?php if(is_null($mediaItem)): ?>
                <a class="find-button blank-cover">
                    <i class="fa fa-plus"></i>
                </a>
            <?php else: ?>
                <i class="find-remove-button fa fa-times-circle" title="<?php echo app('translator')->get('admin::lang.text_remove'); ?>"></i>
                <div class="icon-container">
                    <span data-find-name><?php echo e($this->getMediaName($mediaItem)); ?></span>
                </div>
                <a class="<?php echo e($useAttachment ? 'find-config-button' : ''); ?>">
                    <div class="img-cover">
                        <img data-find-image
                             src="<?php echo e($this->getMediaThumb($mediaItem)); ?>"
                             class="img-responsive">
                    </div>
                </a>
            <?php endif; ?>
            <input
                type="hidden"
                <?php echo (!is_null($mediaItem) AND !$useAttachment) ? 'name="'.$fieldName.'"' : ''; ?>

                value="<?php echo e($this->getMediaPath($mediaItem)); ?>"
                data-find-value
            />
            <input
                type="hidden"
                value="<?php echo e($this->getMediaIdentifier($mediaItem)); ?>"
                data-find-identifier
            />
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/mediafinder/image_grid.blade.php ENDPATH**/ ?>