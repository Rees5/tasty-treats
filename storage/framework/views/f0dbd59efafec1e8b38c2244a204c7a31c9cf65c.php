<?php if (! ($this->previewMode)): ?>
    <div
        id="<?php echo e($this->getId()); ?>"
        class="control-template-editor progress-indicator-container"
        data-control="template-editor"
        data-alias="<?php echo e($this->alias); ?>"
    >
        <?php echo $this->makePartial('templateeditor/toolbar'); ?>


        <?php echo $this->makePartial('templateeditor/modal'); ?>


        <?php if($templateWidget): ?>
            <div
                id="<?php echo e($this->getId($templatePrimaryTabs->section.'-tabs')); ?>"
                class="<?php echo e($templatePrimaryTabs->cssClass); ?>">
                <div class="py-3">
                    <?php echo $templateWidget->makePartial('form/form_fields', ['fields' => $templatePrimaryTabs]); ?>

                </div>
            </div>

            <div
                id="<?php echo e($this->getId($templateSecondaryTabs->section.'-tabs')); ?>"
                class="<?php echo e($templateSecondaryTabs->section); ?>-tabs <?php echo e($templateSecondaryTabs->cssClass); ?> mx-n3"
                data-control="form-tabs"
                data-store-name="<?php echo e($templateWidget->getCookieKey()); ?>">
                <?php echo $templateWidget->makePartial('form/form_tabs', [
                    'activeTab' => $templateWidget->getActiveTab(),
                    'tabs' => $templateSecondaryTabs
                ]); ?>

            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/main/formwidgets/templateeditor/templateeditor.blade.php ENDPATH**/ ?>