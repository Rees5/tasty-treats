
<div class="container">
    <div class="row py-4">
        <div class="col col-sm-8">
            <?php echo controller()->renderPartial('localBox::container'); ?>

            <div class="card my-1">
                <div class="card-body">
                    <?php echo controller()->renderPartial('account/welcome'); ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php echo controller()->renderComponent('checkout'); ?>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <?php echo controller()->renderPartial('cartBox::container'); ?>
        </div>
    </div>
</div>