<?php
    $fieldOptions = $field->value;
?>
<div class="field-flexible-hours">
    <div class="row">
        <div class="col-sm-7">
            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th></th>
                        <th><?php echo app('translator')->get('admin::lang.locations.label_open_hour'); ?></th>
                        <th><?php echo app('translator')->get('admin::lang.locations.label_close_hour'); ?></th>
                        <th><?php echo app('translator')->get('admin::lang.label_status'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $formModel->getWeekDaysOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $hour = $fieldOptions[$key] ?? ['day' => $key, 'open' => '00:00', 'close' => '23:59', 'status' => 1]
                        ?>
                        <tr>
                            <td>
                                <span><?php echo e($day); ?></span>
                                <input
                                    type="hidden"
                                    name="<?php echo e($field->getName().'['.$loop->index.'][day]'); ?>"
                                    value="<?php echo e($hour['day']); ?>"
                                />
                            </td>
                            <td>
                                <div class="input-group" data-control="clockpicker" data-autoclose="true">
                                    <input
                                        type="text"
                                        name="<?php echo e($field->getName().'['.$loop->index.'][open]'); ?>"
                                        class="form-control"
                                        autocomplete="off"
                                        value="<?php echo e($hour['open']); ?>"
                                        <?php echo $field->getAttributes(); ?>

                                    />
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group" data-control="clockpicker" data-autoclose="true">
                                    <input
                                        type="text"
                                        name="<?php echo e($field->getName().'['.$loop->index.'][close]'); ?>"
                                        class="form-control"
                                        autocomplete="off"
                                        value="<?php echo e($hour['close']); ?>"
                                        <?php echo $field->getAttributes(); ?>

                                    />
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input
                                    type="hidden"
                                    name="<?php echo e($field->getName().'['.$loop->index.'][status]'); ?>"
                                    value="0"
                                    <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

                                >
                                <div class="custom-control custom-switch">
                                    <input
                                        type="checkbox"
                                        name="<?php echo e($field->getName().'['.$loop->index.'][status]'); ?>"
                                        id="<?php echo e($field->getId($loop->index.'status')); ?>"
                                        class="custom-control-input"
                                        value="1"
                                        <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

                                        <?php echo $hour['status'] == 1 ? 'checked="checked"' : ''; ?>

                                        <?php echo $field->getAttributes(); ?>

                                    />
                                    <label
                                        class="custom-control-label"
                                        for="<?php echo e($field->getId($loop->index.'status')); ?>"
                                    ><?php echo app('translator')->get('admin::lang.locations.text_closed'); ?>
                                        /<?php echo app('translator')->get('admin::lang.locations.text_open'); ?></label>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/views/locations/flexible_hours.blade.php ENDPATH**/ ?>