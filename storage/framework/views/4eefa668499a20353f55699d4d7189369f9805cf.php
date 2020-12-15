<?php echo form_open(current_url()); ?>

    <input type="hidden" name="alias" value="<?php echo e($widgetAlias); ?>">
    <div class="modal-header">
        <h4 class="modal-title" id="<?php echo e($widgetAlias); ?>-title">
            <?php echo app('translator')->get('admin::lang.dashboard.text_edit_widget'); ?>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div
        class="modal-body"
    >
        <?php $__currentLoopData = $widgetForm->getFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $widgetForm->renderField($field); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="modal-footer">
        <button
            type="button"
            class="btn btn-primary"
            data-dismiss="modal"
            data-request="<?php echo e($this->getEventHandler('onUpdateWidget')); ?>"
        ><?php echo app('translator')->get('admin::lang.text_save'); ?></button>
        <button
            type="button"
            class="btn btn-default"
            data-dismiss="modal"
        ><?php echo app('translator')->get('admin::lang.button_close'); ?></button>
    </div>
<?php echo form_close(); ?>

<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/dashboardcontainer/widget_form.blade.php ENDPATH**/ ?>