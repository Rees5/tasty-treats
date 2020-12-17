<form
    role="form"
    method="POST"
    accept-charset="utf-8"
    action="<?php echo e(current_url()); ?>"
    data-request="<?php echo e($__SELF__.'::onUpdate'); ?>"
>
    <div class="form-row">
        <div class="col col-sm-6">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo e(set_value('first_name', $customer->first_name)); ?>"
                    name="first_name"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.settings.label_first_name'); ?>"
                >
                <?php echo form_error('first_name', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col col-sm-6">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo e(set_value('last_name', $customer->last_name)); ?>"
                    name="last_name"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.settings.label_last_name'); ?>"
                >
                <?php echo form_error('last_name', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col col-sm-6">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo e(set_value('telephone', $customer->telephone)); ?>"
                    name="telephone"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.settings.label_telephone'); ?>"
                >
                <?php echo form_error('telephone', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col col-sm-6">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo e(set_value('email', $customer->email)); ?>"
                    name="email"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.settings.label_email'); ?>"
                    disabled
                >
                <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input
                type="checkbox"
                name="newsletter"
                id="newsletter"
                class="custom-control-input"
                value="1"
                <?php echo set_checkbox('newsletter', '1', (bool)$customer->newsletter); ?>

            >
            <label for="newsletter" class="custom-control-label">
                <?php echo app('translator')->get('igniter.user::default.settings.label_newsletter'); ?>
            </label>
        </div>
        <?php echo form_error('newsletter', '<span class="text-danger">', '</span>'); ?>

    </div>

    <div class="my-3">
        <h5 class="font-weight-normal"><?php echo app('translator')->get('igniter.user::default.settings.text_password_heading'); ?></h5>
    </div>

    <div class="form-group">
        <input
            type="password"
            name="old_password"
            class="form-control"
            value=""
            placeholder="<?php echo app('translator')->get('igniter.user::default.settings.label_old_password'); ?>"
        />
        <?php echo form_error('old_password', '<span class="text-danger">', '</span>'); ?>

    </div>

    <div class="form-row">
        <div class="col col-sm-6">
            <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    value=""
                    name="new_password"
                    placeholder="<?php echo app('translator')->get('igniter.user::default.settings.label_password'); ?>"
                >
                <?php echo form_error('new_password', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <div class="col col-sm-6">
            <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    name="confirm_new_password"
                    value=""
                    placeholder="<?php echo app('translator')->get('igniter.user::default.settings.label_password_confirm'); ?>"
                >
                <?php echo form_error('confirm_new_password', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
    </div>

    <div class="buttons">
        <button
            type="submit"
            class="btn btn-primary"
        ><?php echo app('translator')->get('igniter.user::default.settings.button_save'); ?></button>
    </div>
</form>

