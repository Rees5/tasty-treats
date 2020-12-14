<div class="row-fluid">
    <?php echo form_open(current_url(),
        [
            'id' => 'edit-form',
            'role' => 'form',
            'method' => 'PATCH',
        ]
    ); ?>


    <?php echo $this->toolbarWidget->render(); ?>

    <?php echo $this->formWidget->render(); ?>


    <?php echo form_close(); ?>

</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/extensions/edit.blade.php ENDPATH**/ ?>