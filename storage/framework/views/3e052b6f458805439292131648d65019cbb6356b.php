<?php
    $fieldOptions = $field->options();
    $isCheckboxMode = $field->config['mode'] ?? 'checkbox';
    $selectMultiple = $isCheckboxMode == 'checkbox';
    $checkedValues = (array)$field->value;
    $enableFilter = (count($fieldOptions) > 20);
?>
<div class="control-selectlist">
    <select
        data-control="selectlist"
        id="<?php echo e($field->getId()); ?>"
        name="<?php echo $field->getName().($selectMultiple ? '[]' : ''); ?>"
        <?php if($field->placeholder): ?>data-non-selected-text="<?php echo app('translator')->get($field->placeholder); ?>" <?php endif; ?>
        <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

        <?php echo $selectMultiple ? 'multiple="multiple"' : ''; ?>

        data-enable-filtering="<?php echo e($enableFilter); ?>"
        data-enable-case-insensitive-filtering="<?php echo e($enableFilter); ?>"
        <?php echo $field->getAttributes(); ?>

    >

        <?php if($field->placeholder): ?>
            <option value=""><?php echo app('translator')->get($field->placeholder); ?></option>
        <?php endif; ?>

        <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($field->disabled AND !in_array($value, $checkedValues)) continue; ?>
            <?php
                if (!is_array($option)) $option = [$option];
            ?>
            <option
                <?php echo in_array($value, $checkedValues) ? 'selected="selected"' : ''; ?>

                value="<?php echo e($value); ?>">
                <?php echo e(is_lang_key($option[0]) ? lang($option[0]) : $option[0]); ?>

                <?php if(isset($option[1])): ?>
                    <span><?php echo e(is_lang_key($option[1]) ? lang($option[1]) : $option[1]); ?></span>
                <?php endif; ?>
            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/form/field_selectlist.blade.php ENDPATH**/ ?>