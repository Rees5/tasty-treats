<?php if(count($customerAddresses)): ?>
    <div class="list-group list-group-flush">
        <?php $__currentLoopData = $customerAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="list-group-item <?php echo e(($customer->address_id == $address->address_id) ? 'list-group-item-info' : ''); ?>"
            >
                <address class="text-left"><?php echo format_address($address); ?></address>
                <span class="">
                    <a
                        class="btn btn-outline-default"
                        href="<?php echo e(site_url('account/address', ['addressId' => $address->address_id])); ?>"
                    ><?php echo app('translator')->get('igniter.user::default.account.text_edit'); ?></a>
                </span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="pagination-bar text-right">
        <div class="links"><?php echo $customerAddresses->links(); ?></div>
    </div>
<?php else: ?>
    <p><?php echo app('translator')->get('igniter.user::default.account.text_no_address'); ?></p>
<?php endif; ?>

<div class="buttons">
    <button
        class="btn btn-primary btn-lg"
        data-request="<?php echo e($addAddressEventHandler); ?>"
    ><?php echo app('translator')->get('igniter.user::default.account.button_add'); ?></button>
</div>

