<p><?php echo app('translator')->get('igniter.user::default.reset.text_summary'); ?></p>

<?php echo form_open([
    'role' => 'form',
    'method' => 'POST',
    'data-request' => $__SELF__.'::onForgotPassword',
]); ?>

<div class="form-group">
    <input
        name="email"
        type="text"
        id="email"
        class="form-control input-lg"
        value="<?php echo e(set_value('email')); ?>"
        placeholder="<?php echo app('translator')->get('igniter.user::default.reset.label_email'); ?>"
    />
    <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>

</div>

<div class="clearfix">
    <a
        class="btn btn-link btn-lg pull-left"
        href="<?php echo e(site_url('account/login')); ?>"
    ><?php echo app('translator')->get('igniter.user::default.reset.button_login'); ?></a>
    <button
        type="submit"
        class="btn btn-primary btn-lg pull-right"
    ><?php echo app('translator')->get('igniter.user::default.reset.button_reset'); ?></button>
</div>
<?php echo form_close(); ?>


