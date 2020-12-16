
<div class="container">
    <div class="row py-5">
        <div class="col-sm-3">
            <?php echo controller()->renderPartial('account/sidebar'); ?>
        </div>

        <div class="col-sm-9">
            <?php echo controller()->renderComponent('account'); ?>
        </div>
    </div>
</div>
