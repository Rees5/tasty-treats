<div class="media-finder">
    <div class="input-group">
        <div class="input-group-prepend">
            <i class="input-group-icon" style="width: 50px;">
                <?php if(!is_null($mediaItem)): ?>
                    <img
                        data-find-image
                        src="<?php echo e($this->getMediaThumb($mediaItem)); ?>"
                        class="img-responsive"
                        width="24px"
                    >
                <?php endif; ?>
            </i>
        </div>
        <span
            class="form-control<?php echo e((!is_null($mediaItem) AND $useAttachment) ? ' find-config-button' : ''); ?>"
            data-find-name><?php echo e($this->getMediaName($mediaItem)); ?></span>
        <input
            id="<?php echo e($field->getId()); ?>"
            type="hidden"
            <?php echo !$useAttachment ? 'name="'.$fieldName.'"' : ''; ?>

            data-find-value
            value="<?php echo e($this->getMediaPath($mediaItem)); ?>"
            <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

        >
        <input
            type="hidden"
            value="<?php echo e($this->getMediaIdentifier($mediaItem)); ?>"
            data-find-identifier
        />
        <?php if (! ($this->previewMode)): ?>
            <div class="input-group-append">
                <button class="btn btn-outline-primary find-button<?php echo e(!is_null($mediaItem) ? ' hide' : ''); ?>" type="button">
                    <i class="fa fa-picture-o"></i>
                </button>
                <button
                    class="btn btn-outline-danger find-remove-button<?php echo e(!is_null($mediaItem) ? '' : ' hide'); ?>"
                    type="button">
                    <i class="fa fa-times-circle"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/mediafinder/image_inline.blade.php ENDPATH**/ ?>