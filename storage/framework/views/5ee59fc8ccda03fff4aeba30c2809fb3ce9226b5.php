<div
    class="input-group"
    data-control="clockpicker"
    data-autoclose="true">
    <input
        type="text"
        name="<?php echo e($field->getName()); ?>"
        id="<?php echo e($this->getId('time')); ?>"
        class="form-control"
        autocomplete="off"
        value="<?php echo e($value ? $value->format($timeFormat) : null); ?>"
        <?php echo $field->getAttributes(); ?>

        <?php if($this->previewMode): ?> readonly="readonly" <?php endif; ?>
    />
    <div class="input-group-append">
        <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/datepicker/picker_time.blade.php ENDPATH**/ ?>