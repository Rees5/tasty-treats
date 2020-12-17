<div
    class="filter-scope daterange form-group"
    data-control="datepicker"
    data-single-date-picker="false"
    data-opens="<?php echo e(array_get($scope->config, 'pickerPosition', 'left')); ?>"
    data-time-picker="<?php echo e(($showTimePicker = array_get($scope->config, 'showTimePicker', FALSE)) ? 'true' : 'false'); ?>"
    data-locale='{"format": "<?php echo e($pickerFormat = array_get($scope->config, 'pickerFormat', $showTimePicker ? 'MMM D, YYYY hh:mm A' : 'MMM D, YYYY')); ?>"}'
>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-icon"><i class="fa fa-calendar"></i></span>
        </div>
        <input
            type="text"
            id="<?php echo e($this->getScopeName($scope)); ?>-daterangepicker"
            class="form-control"
            value="<?php echo e($scope->value ? sprintf('%s - %s', make_carbon($scope->value[0])->isoFormat($pickerFormat), make_carbon($scope->value[1])->isoFormat($pickerFormat)) : ''); ?>"
            placeholder="<?php echo app('translator')->get($scope->label); ?>"
            data-datepicker-trigger
            autocomplete="off"
            <?php echo $scope->disabled ? 'disabled="disabled"' : ''; ?>

        >
        <input data-datepicker-range-start type="hidden" name="<?php echo e($this->getScopeName($scope)); ?>[]" value="<?php echo e($scope->value[0] ?? ''); ?>">
        <input data-datepicker-range-end type="hidden" name="<?php echo e($this->getScopeName($scope)); ?>[]" value="<?php echo e($scope->value[1] ?? ''); ?>">
    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/filter/scope_daterange.blade.php ENDPATH**/ ?>