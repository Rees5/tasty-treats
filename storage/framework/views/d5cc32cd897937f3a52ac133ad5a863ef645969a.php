<div
    class="page-x-spacer"
    data-control="dashboard-container"
    data-alias="<?php echo e($this->alias); ?>"
    data-sortable-container="#<?php echo e($this->getId('container-list')); ?>"
>
    <div id="<?php echo e($this->getId('container')); ?>" class="dashboard-widgets">
        <div class="progress-indicator">
            <span class="spinner"><span class="ti-loading fa-3x fa-fw"></span></span>
            <?php echo app('translator')->get('admin::lang.text_loading'); ?>
        </div>
    </div>

    <div
        id="<?php echo e($this->getId('container-toolbar')); ?>"
        class="toolbar dashboard-toolbar btn-toolbar"
        data-container-toolbar>
        <?php echo $this->makePartial('widget_toolbar'); ?>

    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/dashboardcontainer/dashboardcontainer.blade.php ENDPATH**/ ?>