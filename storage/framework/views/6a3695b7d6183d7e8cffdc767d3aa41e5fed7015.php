<div class="container-fluid">
    <div class="login-container">
        <div class="card">
            <div class="card-body">
                <h5><?php echo app('translator')->get('admin::lang.login.text_reset_password_title'); ?></h5>
                <?php echo form_open(current_url(),
                    [
                        'id' => 'edit-form',
                        'role' => 'form',
                        'method' => 'POST',
                        'data-request' => empty($resetCode) ? 'onRequestResetPassword' : 'onResetPassword',
                    ]
                ); ?>


                <?php if(empty($resetCode)): ?>
                    <div class="form-group">
                        <label
                            for="input-user"
                            class="control-label"
                        ><?php echo app('translator')->get('admin::lang.label_email'); ?></label>
                        <div class="">
                            <input name="email" type="text" id="input-user" class="form-control"/>
                            <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>

                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="code" value="<?php echo e($resetCode); ?>">
                    <div class="form-group">
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="<?php echo app('translator')->get('admin::lang.login.label_password'); ?>"
                        />
                        <?php echo form_error('password', '<span class="text-danger">', '</span>'); ?>

                    </div>
                    <div class="form-group">
                        <input
                            type="password"
                            id="password-confirm"
                            class="form-control"
                            name="password_confirm"
                            placeholder="<?php echo app('translator')->get('admin::lang.login.label_password_confirm'); ?>"
                        />
                        <?php echo form_error('password_confirm', '<span class="text-danger">', '</span>'); ?>

                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <div class="pull-left">
                        <a
                            class="btn btn-default"
                            href="<?php echo e(admin_url('login')); ?>"
                        ><?php echo app('translator')->get('admin::lang.login.text_back_to_login'); ?></a>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary pull-right"
                        data-attach-loading=""
                    ><?php echo app('translator')->get('admin::lang.login.button_reset_password'); ?></button>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/views/auth/reset.blade.php ENDPATH**/ ?>