<?php if(!$order): ?>
    <div class="card mb-1">
        <div class="card-body text-center" id="ti-order-status">
            No order found
        </div>
    </div>
<?php else: ?>
    <div class="card mb-1">
        <div class="card-body text-center" id="ti-order-status">
            <?php echo controller()->renderPartial($__SELF__.'::status'); ?>
        </div>
    </div>

    <?php if($session AND !$session->customer()): ?>
        <div class="card mb-1">
            <div class="card-body text-center">
                <a
                    href="<?php echo e($session->loginUrl()); ?>"
                ><?php echo app('translator')->get('igniter.cart::default.orders.text_login_to_view_more'); ?></a>
            </div>
        </div>
    <?php else: ?>
        <?php if($showReviews AND !empty($reviewable)): ?>
            <div class="card mb-1">
                <div class="card-body">
                    <?php echo controller()->renderPartial('localReview::form'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row no-gutters">
            <div class="col-sm-7 pr-sm-1">
                <div class="card mb-1">
                    <div class="card-body">
                        <?php echo controller()->renderPartial($__SELF__.'::restaurant', ['location' => $order->location]); ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <?php echo controller()->renderPartial($__SELF__.'::items'); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <?php echo controller()->renderPartial($__SELF__.'::details'); ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

