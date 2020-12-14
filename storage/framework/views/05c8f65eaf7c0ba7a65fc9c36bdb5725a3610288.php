<?php if($this->previewMode): ?>
    <p class="form-control-static"><?php echo e($field->value ? currency_format($field->value) : '0'); ?></p>
<?php else: ?>
    <div class="field-money">
        <div class="input-group">
            <span class="input-group-prepend">
                <span class="input-group-icon"><i class="fa fa-money"></i></span>
            </span>
            <input
                type="number"
                name="<?php echo e($field->getName()); ?>"
                id="<?php echo e($field->getId()); ?>"
                value="<?php echo e(number_format($field->value, 2, '.', '')); ?>"
                placeholder="<?php echo app('translator')->get($field->placeholder); ?>"
                class="form-control"
                autocomplete="off"
                step="any"
                <?php echo $field->hasAttribute('pattern') ? '' : 'pattern="-?\d+(\.\d+)?"'; ?>

                <?php echo $field->hasAttribute('maxlength') ? '' : 'maxlength="255"'; ?>

                <?php echo $field->getAttributes(); ?>

            />
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/form/field_money.blade.php ENDPATH**/ ?>