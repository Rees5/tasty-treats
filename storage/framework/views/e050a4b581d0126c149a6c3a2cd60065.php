<div class="card mb-1">
    <div class="card-body">
        <h5 class="mb-0"><?php if(Auth::check()): ?> <?php echo sprintf(lang('igniter.user::default.text_welcome'), $customer->first_name); ?> <?php endif; ?></h5>
    </div>
</div>

<div class="card-group mb-1">
    <div class="card mr-sm-1">
        <div class="card-body">
            <?php if(!empty($customer->address)): ?>
                <h5 class="font-weight-normal">
                    <?php echo app('translator')->get('igniter.user::default.text_default_address'); ?>
                    <a
                        class="edit-address pull-right"
                        href="<?php echo e(site_url('account/address/'.$customer->address->getKey())); ?>"
                    ><?php echo app('translator')->get('igniter.user::default.text_edit'); ?></a>
                </h5>
                <address class="text-left text-overflow"><?php echo format_address($customer->address); ?></address>
            <?php else: ?>
                <p><?php echo app('translator')->get('igniter.user::default.text_no_default_address'); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body text-center">
            <p><i class="fa fa-shopping-basket fa-3x text-muted"></i></p>
            <?php if($__SELF__->cartCount()): ?>
                <p><?php echo sprintf(lang('igniter.user::default.text_cart_summary'), $__SELF__->cartCount(), currency_format($__SELF__->cartTotal())); ?></p>
                <a class="btn btn-primary" href="<?php echo e(site_url('checkout/checkout')); ?>">
                    <?php echo app('translator')->get('igniter.user::default.text_checkout'); ?>
                </a>
            <?php else: ?>
                <p><?php echo app('translator')->get('igniter.user::default.text_no_cart_items'); ?></p>
                <a class="btn btn-light" href="<?php echo e(restaurant_url('local/menus')); ?>">
                    <?php echo app('translator')->get('igniter.user::default.text_order'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="font-weight-normal mb-3"><?php echo app('translator')->get('igniter.user::default.text_edit_details'); ?></h5>
        <?php if(Auth::check()): ?>
            <?php echo controller()->renderPartial('@settings'); ?>
        <?php endif; ?>
    </div>
</div>

