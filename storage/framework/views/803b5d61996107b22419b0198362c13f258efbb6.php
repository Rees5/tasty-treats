<?php if($this->previewMode): ?>
    <div class="form-control-static">********</div>
<?php else: ?>
    <input
        type="password"
        name="<?php echo e($field->getName()); ?>"
        id="<?php echo e($field->getId()); ?>"
        value=""
        class="form-control"
        autocomplete="off"
        <?php echo $field->hasAttribute('maxlength') ? '' : 'maxlength="255"'; ?>

        <?php echo $field->getAttributes(); ?>

    />
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/form/field_password.blade.php ENDPATH**/ ?>