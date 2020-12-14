<div class="folder-tree"
     data-tree-data='<?php echo json_encode($folderTree, 15, 512) ?>'>
    <button>Go to root folder</button>
</div>
<select class="hide">
    <option value=""><?php echo app('translator')->get('admin::lang.text_please_select'); ?></option>
    <?php $__currentLoopData = $folderList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/main/widgets/mediamanager/folder_tree.blade.php ENDPATH**/ ?>