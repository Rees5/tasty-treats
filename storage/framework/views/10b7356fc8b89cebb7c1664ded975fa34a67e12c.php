<?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widgetAlias => $widgetInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $this->makePartial('widget_item', [
        'widgetAlias' => $widgetAlias,
        'widget'      => $widgetInfo['widget'],
        'priority'    => $widgetInfo['priority'],
    ]); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/dashboardcontainer/widget_list.blade.php ENDPATH**/ ?>