<div id="ratings-field">
    <table class="table">
        <thead>
        <tr>
            <th class="list-action"></th>
            <th class="list-action"></th>
            <th><?php echo app('translator')->get('admin::lang.label_name'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $table_row = 1;
        ?>
        <?php $__currentLoopData = (array)$formValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="table-row<?php echo e($table_row); ?>">
                <td class="list-action text-center handle"><i class="fa fa-arrows-alt-v"></i></td>
                <td class="list-action">
                    <a
                        class="btn btn-outline-danger border-none"
                        role="button"
                        onclick="confirm('<?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?>') ? $(this).parent().parent().remove() : false"
                    ><i class="fa fa-trash-alt"></i></a>
                </td>
                <td>
                    <input
                        type="text"
                        name="<?php echo e($field->getName()); ?>[<?php echo e($table_row); ?>]"
                        class="form-control"
                        value="<?php echo e(set_value('ratings['.$table_row.']', $value)); ?>"
                    />
                    <?php echo form_error('ratings['.$table_row.']', '<span class="text-danger">', '</span>'); ?>

                </td>
            </tr>
            <?php
                $table_row++;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
        <tr id="tfoot">
            <td class="list-action text-center">
                <a
                    class="btn btn-primary"
                    role="button"
                    data-control="ratings"
                    data-table-row="<?php echo e($table_row); ?>"
                    data-confirm-message="<?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?>"
                ><i class="fa fa-plus"></i></a>
            </td>
            <td></td>
            <td></td>
        </tr>
        </tfoot>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master\extensions/igniter/local/views/reviews/ratings.blade.php ENDPATH**/ ?>