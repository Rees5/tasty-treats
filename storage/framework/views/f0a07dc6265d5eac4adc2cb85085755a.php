<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="first-name"><?php echo app('translator')->get('igniter.cart::default.checkout.label_first_name'); ?></label>
            <input
                type="text"
                name="first_name"
                id="first-name"
                class="form-control"
                value="<?php echo e(set_value('first_name', $order->first_name)); ?>"/>
            <?php echo form_error('first_name', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="last-name"><?php echo app('translator')->get('igniter.cart::default.checkout.label_last_name'); ?></label>
            <input
                type="text"
                name="last_name"
                id="last-name"
                class="form-control"
                value="<?php echo e(set_value('last_name', $order->last_name)); ?>"/>
            <?php echo form_error('last_name', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="email"><?php echo app('translator')->get('igniter.cart::default.checkout.label_email'); ?></label>
            <input
                type="text"
                name="email"
                id="email"
                class="form-control"
                value="<?php echo e(set_value('email', $order->email)); ?>"
                <?php echo $customer ? 'disabled' : ''; ?> />
            <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="telephone"><?php echo app('translator')->get('igniter.cart::default.checkout.label_telephone'); ?></label>
            <input
                type="text"
                name="telephone"
                id="telephone"
                class="form-control"
                value="<?php echo e(set_value('telephone', $order->telephone)); ?>"/>
            <?php echo form_error('telephone', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>
</div>

