<div class="row-fluid">

    <?php echo $this->widgets['toolbar']->render(); ?>


    <?php echo $this->makePartial('updates/search'); ?>


    <div class="panel panel-light panel-items">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e(sprintf(lang('system::lang.updates.text_popular_title'), ucwords(str_plural($itemType)))); ?></h5>
        </div>

        <div
            id="list-items"
            class="panel-body items-list"
            data-fetch-items="<?php echo e($itemType); ?>"
            data-installed-items='<?php echo json_encode($installedItems, 15, 512) ?>'
        >
            <p class="text-center">
                <i class="fa fa-spinner fa-3x fa-spin"></i>
            </p>
        </div>
    </div>
</div>

<?php echo $this->makePartial('updates/carte'); ?>

<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/system/views/updates/browse/index.blade.php ENDPATH**/ ?>