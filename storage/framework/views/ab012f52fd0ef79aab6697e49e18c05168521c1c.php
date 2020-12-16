<div
    id="<?php echo e($tableId); ?>"
    data-control="table"
    class="control-table"
    data-columns='<?php echo json_encode($columns, 15, 512) ?>'
    data-data="<?php echo e($data); ?>"
    data-data-field="<?php echo e($recordsKeyFrom); ?>"
    data-alias="<?php echo e($tableAlias); ?>"
    data-field-name="<?php echo e($tableAlias); ?>"
    data-height="<?php echo e($height); ?>"
    data-dynamic-height="<?php echo e($dynamicHeight); ?>"
    data-page-size="<?php echo e($pageLimit); ?>"
    data-pagination="<?php echo e($showPagination); ?>"
></div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/table/table.blade.php ENDPATH**/ ?>