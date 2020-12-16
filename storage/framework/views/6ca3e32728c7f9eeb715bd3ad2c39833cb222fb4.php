<div
    id="<?php echo e($toolbarId); ?>"
    class="toolbar btn-toolbar <?php echo e($cssClasses); ?>"
>
    <?php if(strlen($buttonsHtml)): ?>
        <div class="toolbar-action">
            <div class="progress-indicator-container">
                <?php echo $buttonsHtml; ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/toolbar/toolbar.blade.php ENDPATH**/ ?>