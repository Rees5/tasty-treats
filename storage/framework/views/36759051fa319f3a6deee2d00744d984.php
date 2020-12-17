
<?php echo controller()->renderPartial('nav/local_tabs', ['activeTab' => 'menus']); ?>

<div class="panel">
    <div class="d-block d-sm-none">
        <div class="panel-body categories">
            <?php echo controller()->renderComponent('categories'); ?>
        </div>
    </div>

    <?php echo controller()->renderComponent('localMenu'); ?>
</div>