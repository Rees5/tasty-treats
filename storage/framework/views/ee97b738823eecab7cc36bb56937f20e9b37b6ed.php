<script type="text/template" data-media-new-folder-form>
    <form method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label><?php echo app('translator')->get('main::lang.media_manager.text_folder_name'); ?></label>
            <input type="text" class="form-control" name="name"/>
        </div>
    </form>
</script>

<script type="text/template" data-media-rename-folder-form>
    <form method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label><?php echo app('translator')->get('main::lang.media_manager.text_folder_name'); ?></label>
            <input type="text" class="form-control" name="name"/>
        </div>
    </form>
</script>

<script type="text/template" data-media-rename-file-form>
    <form method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label><?php echo app('translator')->get('main::lang.media_manager.text_file_name'); ?></label>
            <input type="text" class="form-control" name="name"/>
        </div>
    </form>
</script>

<script type="text/template" data-media-move-folder-form>
    <form method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label><?php echo app('translator')->get('main::lang.media_manager.text_destination_folder'); ?></label>
            <select name="destination" class="form-control">
                <option value=""><?php echo app('translator')->get('admin::lang.text_please_select'); ?></option>
                <?php $__currentLoopData = $folderList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </form>
</script>

<script type="text/template" data-media-move-file-form>
    <form method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label><?php echo app('translator')->get('main::lang.media_manager.text_destination_folder'); ?></label>
            <select name="destination" class="form-control">
                <option value=""><?php echo app('translator')->get('admin::lang.text_please_select'); ?></option>
                <?php $__currentLoopData = $folderList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </form>
</script>

<script type="text/template" data-media-delete-folder-form>
    <form method="POST" accept-charset="UTF-8">
        <p><b><?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?></b></p>
    </form>
</script>

<script type="text/template" data-media-delete-file-form>
    <form method="POST" accept-charset="UTF-8">
        <p><b><?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?></b></p>
    </form>
</script>

<script type="text/template" data-media-copy-file-form>
    <form method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label><?php echo app('translator')->get('main::lang.media_manager.text_destination_folder'); ?></label>
            <select name="destination" class="form-control">
                <option value=""><?php echo app('translator')->get('admin::lang.text_please_select'); ?></option>
                <?php $__currentLoopData = $folderList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </form>
</script>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/main/widgets/mediamanager/forms.blade.php ENDPATH**/ ?>