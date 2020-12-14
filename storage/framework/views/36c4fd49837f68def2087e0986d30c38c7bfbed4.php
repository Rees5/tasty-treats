<?php if (! ($this->previewMode)): ?>
    <div
        id="<?php echo e($this->getId()); ?>"
        class="control-recordeditor"
        data-control="record-editor"
        data-alias="<?php echo e($this->alias); ?>"
    >
        <div
            class="input-group" data-toggle="modal"
            data-target="#<?php echo e($this->getId('form-modal')); ?>"
        >
            <?php if($addonLeft): ?>
                <div class="input-group-prepend"><?php echo e($addonLeft); ?></div>
            <?php endif; ?>
            <select
                id="<?php echo e($field->getId()); ?>"
                name="<?php echo e($field->getName()); ?>"
                class="form-control"
                data-control="choose-record"
                <?php echo $field->getAttributes(); ?>

            >
                <?php if($fieldPlaceholder = $field->placeholder ?: $this->emptyOption): ?>
                    <option value="0"><?php echo app('translator')->get($fieldPlaceholder); ?></option>
                <?php endif; ?>
                <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (!is_array($option)) $option = [$option] ?>
                    <option
                        <?php echo $value == $field->value ? 'selected="selected"' : ''; ?>

                        <?php if(isset($option[1])): ?> data-<?php echo e(strpos($option[1], '.') ? 'image' : 'icon'); ?>="<?php echo e($option[1]); ?>" <?php endif; ?>
                        value="<?php echo e($value); ?>"
                    ><?php echo e(is_lang_key($option[0]) ? lang($option[0]) : $option[0]); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="input-group-append ml-1">
                <?php if($addonRight): ?>
                    <?php echo $addonRight; ?>

                <?php endif; ?>
                <button
                    type="button"
                    class="btn btn-outline-default"
                    data-control="edit-record"
                    <?php echo ($this->previewMode) ? 'disabled="disabled"' : ''; ?>

                ><i class="fa fa-pencil"></i>&nbsp;&nbsp;<?php echo app('translator')->get($editLabel); ?>&nbsp;<?php echo app('translator')->get($this->formName); ?></button>
                <button
                    type="button"
                    class="btn btn-outline-danger"
                    title="<?php echo e(lang($deleteLabel).' '.lang($this->formName)); ?>"
                    data-control="delete-record"
                    data-confirm-message="<?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?>"
                    <?php echo ($this->previewMode) ? 'disabled="disabled"' : ''; ?>

                ><i class="fa fa-trash"></i></button>
                <button
                    type="button"
                    class="btn btn-outline-default"
                    data-control="create-record"
                    <?php echo ($this->previewMode) ? 'disabled="disabled"' : ''; ?>

                ><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo app('translator')->get($addLabel); ?>&nbsp;<?php echo app('translator')->get($this->formName); ?></button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/recordeditor/recordeditor.blade.php ENDPATH**/ ?>