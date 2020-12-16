<?php
    $fieldOptions = $field->options();
    $checkedValues = (array)$field->value;
?>

<div class="field-checkbox">
    <?php if($this->previewMode AND $field->value): ?>
        <div
            id="<?php echo e($field->getId()); ?>"
            class="btn-group btn-group-toggle bg-light"
            data-toggle="buttons">
            <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $checkboxId = 'checkbox_'.$field->getId().'_'.$loop->iteration;
                    if (is_string($option)) $option = [$option];
                ?>
                <label
                    class="btn btn-light text-nowrap <?php echo e(in_array($value, $checkedValues) ? 'active' : ($this->previewMode ? 'disabled' : '')); ?>">
                    <input
                        type="checkbox"
                        id="<?php echo e($checkboxId); ?>"
                        name="<?php echo e($field->getName()); ?>[]"
                        value="<?php echo e($value); ?>"
                        <?php echo in_array($value, $checkedValues) ? 'checked="checked"' : ''; ?>

                        disabled="disabled"
                    />
                    <?php echo e(is_lang_key($option[0]) ? lang($option[0]) : $option[0]); ?>

                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php elseif(!$this->previewMode AND count($fieldOptions)): ?>
        <div
            id="<?php echo e($field->getId()); ?>"
            class="btn-group btn-group-toggle bg-light"
            data-toggle="buttons">
            <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $checkboxId = 'checkbox_'.$field->getId().'_'.$loop->iteration;
                    if (is_string($option)) $option = [$option];
                ?>
                <label class="btn btn-light <?php echo e(in_array($value, $checkedValues) ? 'active' : ''); ?>">
                    <input
                        type="checkbox"
                        id="<?php echo e($checkboxId); ?>"
                        name="<?php echo e($field->getName()); ?>[]"
                        value="<?php echo e($value); ?>"
                        <?php echo $field->getAttributes(); ?>

                        <?php echo in_array($value, $checkedValues) ? 'checked="checked"' : ''; ?>

                    />
                    <?php echo e(is_lang_key($option[0]) ? lang($option[0]) : $option[0]); ?>

                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>

        <input
            type="hidden"
            name="<?php echo e($field->getName()); ?>"
            value="0"
            <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

        />

        <div class="custom-control custom-checkbox" tabindex="0">
            <input
                type="checkbox"
                class="custom-control-input"
                id="<?php echo e($field->getId()); ?>"
                name="<?php echo e($field->getName()); ?>"
                value="1"
                <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

                <?php echo $field->value == 1 ? 'checked="checked"' : ''; ?>

                <?php echo $field->getAttributes(); ?>

            />
            <label class="custom-control-label" for="<?php echo e($field->getId()); ?>">
                <?php if($field->placeholder): ?> <?php echo app('translator')->get($field->placeholder); ?> <?php else: ?> &nbsp; <?php endif; ?>
            </label>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/form/field_checkboxtoggle.blade.php ENDPATH**/ ?>