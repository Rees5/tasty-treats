<div class="panel panel-search">
    <div class="panel-body">
        <div id="marketplace-search" class="form-group search-group has-feedback">
            <input
                type="text"
                class="form-control search input-lg"
                placeholder="<?php echo e(sprintf(lang('system::lang.updates.text_search'), str_plural($itemType))); ?>"
                data-search-type="<?php echo e($itemType); ?>"
                data-search-action="<?php echo e($searchActionUrl); ?>"
                data-search-ready="false"
            >
            <i class="form-control-feedback fa fa-search fa-icon"></i>
            <i class="form-control-feedback fa fa-spinner fa-icon loading" style="display: none"></i>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/updates/search.blade.php ENDPATH**/ ?>