<?php echo form_open([
    'id' => 'list-form',
    'role' => 'form',
    'method' => 'POST',
]); ?>


<div class="list-table table-responsive">
    <table class="table table-striped mb-0 border-bottom">
        <thead>
        <?php echo $this->makePartial('lists/list_head'); ?>

        </thead>
        <tbody>
        <?php if(count($records)): ?>
            <?php echo $this->makePartial('lists/list_body'); ?>

        <?php else: ?>
            <tr>
                <td colspan="99" class="text-center"><?php echo e($emptyMessage); ?></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php echo form_close(); ?>


<?php echo $this->makePartial('lists/list_pagination'); ?>


<?php if($showSetup): ?>
    <?php echo $this->makePartial('lists/list_setup'); ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/lists/list.blade.php ENDPATH**/ ?>