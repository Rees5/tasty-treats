<div class="modal-dialog modal-dialog-scrollable">
    <?php echo form_open([]); ?>

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo e(sprintf(lang('admin::lang.list.setup_title'), lang($this->getConfig('title')))); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">
                    <?php echo app('translator')->get('admin::lang.list.label_visible_columns'); ?>
                    <span class="help-block"><?php echo app('translator')->get('admin::lang.list.help_visible_columns'); ?></span>
                </label>
                <div
                    id="lists-setup-sortable"
                    class="list-group list-group-flush"
                >
                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($column->type == 'button'): ?>
                            <input
                                type="hidden"
                                id="list-setup-<?php echo e($column->columnName); ?>"
                                name="visible_columns[]"
                                value="<?php echo e($column->columnName); ?>"
                            />
                        <?php else: ?>
                            <div class="list-group-item px-2">
                                <div class="btn btn-handle form-check-handle mr-2">
                                    <i class="fa fa-arrows-alt-v text-muted"></i>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input
                                        type="checkbox"
                                        id="list-setup-<?php echo e($column->columnName); ?>"
                                        class="custom-control-input"
                                        name="visible_columns[]"
                                        value="<?php echo e($column->columnName); ?>"
                                        <?php echo $column->invisible ? '' : 'checked="checked"'; ?>

                                    />
                                    <input
                                        type="hidden"
                                        name="column_order[]"
                                        value="<?php echo e($column->columnName); ?>"
                                    />
                                    <label
                                        class="custom-control-label"
                                        for="list-setup-<?php echo e($column->columnName); ?>"
                                    ><b><?php echo app('translator')->get($column->label); ?></b></label>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php if($this->showPagination): ?>
                <div class="form-group">
                    <label class="control-label">
                        <?php echo app('translator')->get('admin::lang.list.label_page_limit'); ?>
                        <span class="help-block"><?php echo app('translator')->get('admin::lang.list.help_page_limit'); ?></span>
                    </label>
                    <div
                        class="btn-group btn-group-toggle"
                        data-toggle="buttons"
                    >
                        <?php $__currentLoopData = $perPageOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <label class="btn btn-light <?php echo e($optionValue == $pageLimit ? 'active' : ''); ?>">
                                <input
                                    type="radio"
                                    id="checkbox_page_limit_<?php echo e($optionValue); ?>"
                                    name="page_limit"
                                    value="<?php echo e($optionValue); ?>"
                                    <?php echo $optionValue == $pageLimit ? 'checked="checked"' : ''; ?>>
                                <?php echo e($optionValue); ?>

                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="modal-footer progress-indicator-container">
            <button
                type="button"
                class="btn btn-link text-danger mr-sm-auto"
                data-request="<?php echo e($this->getEventHandler('onResetSetup')); ?>"
                data-progress-indicator="<?php echo app('translator')->get('admin::lang.text_resetting'); ?>"
            ><?php echo app('translator')->get('admin::lang.list.button_reset_setup'); ?></button>
            <button
                type="button"
                class="btn btn-link"
                data-dismiss="modal"
            ><?php echo app('translator')->get('admin::lang.list.button_cancel_setup'); ?></button>
            <button
                type="button"
                class="btn btn-primary"
                data-request="<?php echo e($this->getEventHandler('onApplySetup')); ?>"
                data-progress-indicator="<?php echo app('translator')->get('admin::lang.text_saving'); ?>"
            ><?php echo app('translator')->get('admin::lang.list.button_apply_setup'); ?></button>
        </div>
    </div>
    <?php echo form_close(); ?>

</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/lists/list_setup_form.blade.php ENDPATH**/ ?>