
<div class="container">
    <div class="row py-5">
        <?php if($customer): ?>
            <div class="col-sm-3">
                <?php echo controller()->renderPartial('account/sidebar'); ?>
            </div>
        <?php endif; ?>

        <div class="col-sm-9<?php echo e($customer ? '' : ' m-auto'); ?>">
            <?php echo controller()->renderComponent('orderPage'); ?>
        </div>
    </div>
</div>
