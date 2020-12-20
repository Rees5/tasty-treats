<div
    id="<?php echo e($this->getId('modal')); ?>"
    class="modal show"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newSourceModal"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4
                    class="modal-title"
                    data-modal-text="title"
                ></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><?php echo app('translator')->get('system::lang.themes.label_file'); ?></label>
                    <input data-modal-input="source-name" type="text" class="form-control" name="name"/>
                    <input data-modal-input="source-action" type="hidden" name="action"/>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                ><?php echo app('translator')->get('admin::lang.button_close'); ?></button>
                <button
                    type="button"
                    class="btn btn-primary"
                    data-request="<?php echo e($this->getEventHandler('onManageSource')); ?>"
                ><?php echo app('translator')->get('admin::lang.button_save'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/main/formwidgets/templateeditor/modal.blade.php ENDPATH**/ ?>