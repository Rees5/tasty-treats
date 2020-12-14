<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="35%"><?php echo app('translator')->get('igniter.api::default.text_allow_only'); ?></th>
            <th></th>
            <th class="list-action"><?php echo app('translator')->get('admin::lang.text_disabled'); ?>/<?php echo app('translator')->get('admin::lang.text_enabled'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $fieldValue = !is_array($field->value) ? [$field->value] : $field->value;
        ?>
        <?php $__currentLoopData = $field->options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <select
                    id="<?php echo e($field->getId($action.'-authorization')); ?>"
                    name="<?php echo e($field->getName()); ?>[authorization][<?php echo e($action); ?>]"
                    class="form-control"
                >
                    <?php $__currentLoopData = $field->getConfig('authOptions'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($key); ?>"
                            <?php echo $key == array_get($fieldValue, 'authorization.'.$action) ? 'selected="selected"' : ''; ?>

                        ><?php echo app('translator')->get($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </td>
            <td><?php echo app('translator')->get($name); ?></td>
            <td class="list-action text-right">
                <div class="field-custom-container">
                    <div class="custom-control custom-switch">
                        <input
                            type="checkbox"
                            class="custom-control-input"
                            id="<?php echo e($field->getId($action.'-actions')); ?>"
                            name="<?php echo e($field->getName()); ?>[actions][]"
                            value="<?php echo e($action); ?>"
                            <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

                            <?php echo in_array($action, array_get($fieldValue, 'actions', [$action])) ? 'checked="checked"' : ''; ?>

                        />
                        <label
                            class="custom-control-label"
                            for="<?php echo e($field->getId($action.'-actions')); ?>"
                        >&nbsp;</label>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master\extensions/igniter/api/views/resources/form/field_actions.blade.php ENDPATH**/ ?>