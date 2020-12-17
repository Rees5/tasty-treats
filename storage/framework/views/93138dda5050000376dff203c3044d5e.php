
<?php echo controller()->renderPartial('nav/local_tabs', ['activeTab' => 'gallery']); ?>

<div class="panel">
    <div class="panel-body">
        <?php echo controller()->renderComponent('localGallery'); ?>
    </div>
</div>
