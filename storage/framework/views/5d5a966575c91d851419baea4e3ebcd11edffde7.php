<div
    id="<?php echo e($this->getId('form-modal-content')); ?>"
    class="modal-dialog"
    role="document"
>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo e($formTitle ? lang($formTitle) : ''); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <?php echo form_open(
            [
                'id' => 'status-editor-form',
                'role' => 'form',
                'method' => 'PATCH',
                'data-request' => $this->alias.'::onSaveRecord',
            ]
        ); ?>

        <div
            id="<?php echo e($this->getId('form-modal-fields')); ?>"
            class="modal-body progress-indicator-container"
        >
            <?php echo $this->makePartial('statuseditor/fields', ['formWidget' => $formWidget]); ?>

        </div>
        <div class="modal-footer text-right">
            <button
                type="button"
                class="btn btn-link"
                data-dismiss="modal"
            ><?php echo app('translator')->get('admin::lang.button_close'); ?></button>
            <button
                type="submit"
                class="btn btn-primary"
                data-attach-loading
            ><?php echo app('translator')->get('admin::lang.button_save'); ?></button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/statuseditor/form.blade.php ENDPATH**/ ?>