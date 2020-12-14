Hi {first_name} {last_name},

Someone requested a password reset for your {site_name} account.

If you did request a password reset, click the button below to reset your password:

<?php \System\Classes\MailManager::instance()->startPartial('button', ['url' => '{reset_link}', 'type' => 'primary']); ?>
Reset your password
<?php echo \System\Classes\MailManager::instance()->renderPartial(); ?>

Alternatively, copy and paste the link below in a new browser window: <br>
{reset_link}