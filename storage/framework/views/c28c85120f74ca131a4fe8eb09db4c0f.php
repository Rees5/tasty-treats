<form
    method="POST"
    accept-charset="utf-8"
    data-request="<?php echo e($submitAddressEventHandler); ?>"
    role="form"
>
    <input
        type="hidden"
        name="address[address_id]"
        value="<?php echo e(set_value('address[address_id]', $address->address_id)); ?>"
    />
    <div class="form-group">
        <label><?php echo app('translator')->get('igniter.user::default.account.label_address_1'); ?></label>
        <input
            type="text"
            name="address[address_1]"
            class="form-control"
            value="<?php echo e(set_value('address[address_1]', $address->address_1)); ?>"
        />
        <?php echo form_error('address.address_1', '<span class="text-danger">', '</span>'); ?>

    </div>

    <div class="form-group">
        <label><?php echo app('translator')->get('igniter.user::default.account.label_address_2'); ?></label>
        <input
            type="text"
            name="address[address_2]"
            class="form-control"
            value="<?php echo e(set_value('address[address_2]', $address->address_2)); ?>"
        />
        <?php echo form_error('address.address_2', '<span class="text-danger">', '</span>'); ?>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label><?php echo app('translator')->get('igniter.user::default.account.label_city'); ?></label>
                <input
                    type="text"
                    class="form-control"
                    name="address[city]"
                    value="<?php echo e(set_value('address[city]', $address->city)); ?>"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.account.label_city'); ?>"
                >
                <?php echo form_error('address.city', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label><?php echo app('translator')->get('igniter.user::default.account.label_state'); ?></label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo e(set_value('address[state]', $address->state)); ?>"
                    name="address[state]"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.account.label_state'); ?>"
                >
                <?php echo form_error('address.state', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label><?php echo app('translator')->get('igniter.user::default.account.label_postcode'); ?></label>
                <input
                    type="text"
                    class="form-control"
                    name="address[postcode]"
                    value="<?php echo e(set_value('address[postcode]', $address->postcode)); ?>"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.account.label_postcode'); ?>"
                >
                <?php echo form_error('address.postcode', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
    </div>

    <div class="form-group">
        <label><?php echo app('translator')->get('igniter.user::default.account.label_country'); ?></label>
        <select name="address[country_id]" class="form-control">
            <?php $__currentLoopData = countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($key); ?>"
                    <?php echo $key == $address->country_id ? ' selected="selected"' : ''; ?>

                ><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php echo form_error('address.country', '<span class="text-danger">', '</span>'); ?>

    </div>

    <div class="d-flex justify-content-between">
        <button
            type="submit"
            class="btn btn-primary"
        ><?php echo app('translator')->get('igniter.user::default.account.button_update'); ?></button>
        <a
            class="btn btn-light"
            href="<?php echo e(site_url('account/address')); ?>"
        ><?php echo app('translator')->get('igniter.user::default.account.button_back'); ?></a>
    </div>
</form>

