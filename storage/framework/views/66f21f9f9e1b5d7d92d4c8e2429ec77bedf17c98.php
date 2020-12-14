<div class="filter-scope switch form-group">
    <select
        name="<?php echo $this->getScopeName($scope); ?>"
        class="form-control"
        <?php echo $scope->disabled ? 'disabled="disabled"' : ''; ?>

    >
        <option value=""><?php echo app('translator')->get($scope->label); ?></option>
        <option value="1" <?php echo ($scope->value == '1') ? 'selected="selected"' : ''; ?>><?php echo app('translator')->get('admin::lang.text_enabled'); ?></option>
        <option value="0" <?php echo ($scope->value == '0') ? 'selected="selected"' : ''; ?>><?php echo app('translator')->get('admin::lang.text_disabled'); ?></option>
    </select>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/filter/scope_switch.blade.php ENDPATH**/ ?>