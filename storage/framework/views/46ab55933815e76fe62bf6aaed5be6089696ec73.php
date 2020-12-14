<div
    id="<?php echo e($filterId); ?>"
    class="list-filter <?php echo e($cssClasses); ?>"
    data-store-name="<?php echo e($cookieStoreName); ?>"
    <?php echo !$this->isActiveState() ? ' style="display:none"' : ''; ?>

>
    <?php if(count($scopes)): ?>
        <form
            id="filter-form"
            class="form-inline"
            accept-charset="utf-8"
            method="POST"
            action="<?php echo e(current_url()); ?>"
            role="form"
        >
            <?php echo csrf_field(); ?>
            <input type="hidden" name="_handler" value="<?php echo e($onSubmitHandler); ?>">

            <?php echo $this->makePartial('filter/filter_scopes'); ?>

        </form>
    <?php endif; ?>

    <?php if($search): ?>
        <div class="d-flex mt-3">
            <div class="mr-3">
                <button
                    class="btn btn-outline-danger"
                    type="button"
                    data-request="<?php echo e($onClearHandler); ?>"
                    data-attach-loading
                ><i class="fa fa-times"></i>&nbsp;&nbsp;<?php echo app('translator')->get('admin::lang.text_clear'); ?></button>
            </div>
            <div class="flex-fill">
                <div class="filter-search"><?php echo $search; ?></div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/filter/filter.blade.php ENDPATH**/ ?>