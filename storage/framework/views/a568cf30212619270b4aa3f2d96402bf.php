<?php $customerAddresses = $order->listCustomerAddresses() ?>
<div class="form-group <?php if(!count($customerAddresses)): ?> d-none <?php endif; ?>">
    <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.text_delivery_address'); ?></label>
    <div class="input-group">
        <select
            class="form-control"
            name="address_id"
        >
            <option value="0"><?php echo app('translator')->get('igniter.cart::default.checkout.text_address'); ?></option>
            <?php $__currentLoopData = $customerAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($address->address_id); ?>"
                    data-address-1=""
                    data-address-2=""
                    data-city=""
                    data-state=""
                    data-postcode=""
                    data-country=""
                    <?php echo set_select('address_id', $address->address_id, $order->address_id == $address->address_id); ?>

                ><?php echo $address->formatted_address; ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php echo form_error('address_id', '<span class="text-danger">', '</span>'); ?>

</div>

<div
    <?php if(count($customerAddresses)): ?>
    class="mt-3" 
    data-trigger="[name='address_id']"
    data-trigger-action="show"
    data-trigger-condition="value[0]"
    data-trigger-closest-parent="form"
    <?php endif; ?>
>
    <input
        type="hidden"
        name="address[address_id]"
        value="<?php echo e(set_value('address.address_id', $order->address['address_id'] ?? '')); ?>"
    >
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.label_address_1'); ?></label>
                <input
                    type="text"
                    name="address[address_1]"
                    class="form-control"
                    value="<?php echo e(set_value('address[address_1]', $order->address['address_1'] ?? '')); ?>"/>
                <?php echo form_error('address.address_1', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.label_address_2'); ?></label>
                <input
                    type="text"
                    name="address[address_2]"
                    class="form-control"
                    value="<?php echo e(set_value('address[address_2]', $order->address['address_2'] ?? '')); ?>"/>
                <?php echo form_error('address.address_2', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.label_city'); ?></label>
                <input
                    type="text"
                    name="address[city]"
                    class="form-control"
                    value="<?php echo e(set_value('address[city]', $order->address['city'] ?? '')); ?>"/>
                <?php echo form_error('address.city', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.label_state'); ?></label>
                <input
                    type="text"
                    name="address[state]"
                    class="form-control"
                    value="<?php echo e(set_value('address[state]', $order->address['state'] ?? '')); ?>"/>
                <?php echo form_error('address.state', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.label_postcode'); ?></label>
                <input
                    type="text"
                    name="address[postcode]"
                    class="form-control"
                    value="<?php echo e(set_value('address[postcode]', $order->address['postcode'] ?? '')); ?>"/>
                <?php echo form_error('address.postcode', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
    </div>
    <?php if($showCountryField): ?>
        <div class="form-group">
            <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.label_country'); ?></label>
            <select
                name="address[country_id]"
                class="form-control"
            >
                <?php $__currentLoopData = countries('country_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        value="<?php echo e($key); ?>"
                        <?php echo ($key == $order->address['country_id']) ? 'selected="selected"' : ''; ?>

                    ><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo form_error('address.country_id', '<span class="text-danger">', '</span>'); ?>

        </div>
    <?php endif; ?>
</div>

