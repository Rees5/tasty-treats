<?php if($this->previewMode): ?>
    <p class="form-control-static"><?php echo e($field->value); ?></p>
<?php else: ?>
    <div class="field-permalink">
        <div class="input-group">
            <span class="input-group-prepend">
                <span class="input-group-text"><?php echo e(root_url()); ?></span>
            </span>
            <input
                type="text"
                name="<?php echo e($field->getName()); ?>"
                id="input-slug"
                class="form-control"
                value="<?php echo e($field->value); ?>"
            />
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/form/field_permalink.blade.php ENDPATH**/ ?>