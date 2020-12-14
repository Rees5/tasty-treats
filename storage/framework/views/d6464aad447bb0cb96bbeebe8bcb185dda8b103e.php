<?php if($this->previewMode): ?>
    <div class="form-control"><?php echo $value; ?></div>
<?php else: ?>
    <div
        id="<?php echo e($this->getId()); ?>"
        class="field-markdowneditor size-<?php echo e($size); ?>"
        data-control="markdowneditor"
    >
        <textarea
            name="<?php echo e($name); ?>"
            id="<?php echo e($this->getId('textarea')); ?>"
            rows="20"
            class="form-control"
        ><?php echo $value; ?></textarea>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/markdowneditor/markdowneditor.blade.php ENDPATH**/ ?>