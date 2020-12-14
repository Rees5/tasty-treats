<form
    id="search-form"
    class="form-inline"
    accept-charset="utf-8"
    method="POST"
    action="<?php echo e(current_url()); ?>"
    role="form"
>
    <?php echo csrf_field(); ?>
    <input type="hidden" name="_handler" value="<?php echo e($searchBox->getEventHandler('onSubmit')); ?>">
    <div class="input-group flex-fill">
        <input
            type="text"
            name="<?php echo e($searchBox->getName()); ?>"
            class="form-control <?php echo e($cssClasses); ?>"
            value="<?php echo e($value); ?>"
            placeholder="<?php echo e($placeholder); ?>"
            autocomplete="off"
        />
        <span class="input-group-prepend">
            <button class="btn btn-outline-default" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/searchbox/searchbox.blade.php ENDPATH**/ ?>