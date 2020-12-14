<div class="row-fluid">
    <?php echo form_open(current_url(),
        [
            'id'     => 'list-form',
            'role'   => 'form',
            'method' => 'POST',
        ]
    ); ?>


    <div class="container-fluid">
        <?php echo $this->makePartial('lists/list_body'); ?>

    </div>

    <?php echo form_close(); ?>


    <?php echo $this->makePartial('lists/list_pagination'); ?>

</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/themes/lists/list.blade.php ENDPATH**/ ?>