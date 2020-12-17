<?php
    $fieldOptions = $field->options();
?>
<div class="field-radio">
    <?php if($fieldCount = count($fieldOptions)): ?>
        <div
            id="<?php echo e($field->getId()); ?>"
            class="btn-group btn-group-toggle bg-light"
            data-toggle="buttons">
            <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label
                    class="btn btn-light text-nowrap <?php echo e(($field->value == $key ? 'active' : '').($this->previewMode ? 'disabled' : '')); ?>">
                    <input
                        type="radio"
                        id="<?php echo e($field->getId($loop->iteration)); ?>"
                        name="<?php echo e($field->getName()); ?>"
                        value="<?php echo e($key); ?>"
                        <?php echo $field->value == $key ? 'checked="checked"' : ''; ?>

                        <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

                        <?php echo $field->getAttributes(); ?>

                    />
                    <?php echo e(is_lang_key($value) ? lang($value) : $value); ?>

                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/form/field_radiotoggle.blade.php ENDPATH**/ ?>