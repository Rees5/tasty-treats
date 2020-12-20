<div
    class="input-group control-colorpicker"
    data-control="colorpicker"
    data-swatches-colors='<?php echo json_encode($availableColors, 15, 512) ?>'
>
    <div class="component input-group-prepend input-group-icon"><i class="fa fa-square"></i></div>
    <input
        type="text"
        id="<?php echo e($this->getId('input')); ?>"
        name="<?php echo e($name); ?>"
        class="form-control"
        value="<?php echo e($value); ?>"
        <?php echo ($this->previewMode) ? 'disabled="disabled"' : ''; ?>>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/formwidgets/colorpicker/colorpicker.blade.php ENDPATH**/ ?>