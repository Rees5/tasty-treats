<div
    class="widget-container"
>
    <div
        id="<?php echo e($this->getId('container-list')); ?>"
        class="widget-list row <?php echo e(!$this->canManage ?: 'add-delete'); ?>"
        data-container-widget
    >
        <?php echo $this->makePartial('widget_list'); ?>

    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/dashboardcontainer/widget_container.blade.php ENDPATH**/ ?>