
<div class="container">
    <div class="row py-5">
        <div class="col-sm-3">
            <?php echo controller()->renderPartial('account/sidebar'); ?>
        </div>

        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <?php echo controller()->renderComponent('accountAddressBook'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
