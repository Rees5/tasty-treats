<div class="row mb-3">
    <div class="media bg-light p-4 w-100 border border-danger text-danger">
        <a class="media-left align-self-center mr-4 preview-thumb"
           style="width:200px;">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo e($theme->name); ?></h4>
            <p class="description"><?php echo app('translator')->get('system::lang.themes.error_config_no_found'); ?></p>
            <div class="list-action my-4">
                <?php echo $this->makePartial('lists/list_button', ['record' => $theme, 'column' => $this->getColumn('delete')]); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/themes/lists/not_found.blade.php ENDPATH**/ ?>