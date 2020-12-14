<?php
$location = $formModel->location;
$fieldValue = sprintf('%s (%s)', $location->location_name, format_address($location->getAddress(), false));
?>
<?php if($this->previewMode): ?>
    <p class="form-control-static"><?php echo e($fieldValue ?: '&nbsp;'); ?></p>
<?php else: ?>
    <input
        type="text"
        name="<?php echo e($field->getName()); ?>"
        id="<?php echo e($field->getId()); ?>"
        value="<?php echo e($fieldValue); ?>"
        placeholder="<?php echo e($field->placeholder); ?>"
        class="form-control"
        autocomplete="off"
        <?php echo $field->hasAttribute('maxlength') ? '' : 'maxlength="255"'; ?>

        <?php echo $field->getAttributes(); ?>

    />
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/views/orders/form/field_location.blade.php ENDPATH**/ ?>