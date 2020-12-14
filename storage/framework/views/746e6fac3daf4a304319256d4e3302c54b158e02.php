<?php echo form_open(current_url(),
    [
        'id' => 'list-form',
        'role' => 'form',
        'method' => 'POST',
    ]
); ?>


<div class="list-extensions page-x-spacer">
        <?php if(count($records)): ?>
            <?php echo $this->makePartial('lists/list_body'); ?>

        <?php else: ?>
            <div class="card bg-light border-none">
                <div class="card-body p-3"><?php echo e($emptyMessage); ?></div>
            </div>
        <?php endif; ?>
</div>

<?php echo form_close(); ?>


<?php echo $this->makePartial('lists/list_pagination'); ?>

<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/extensions/lists/list.blade.php ENDPATH**/ ?>