<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style type="text/css">
        <?php echo e($custom_css); ?>

        <?php echo e($layout_css); ?>

    </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                    <?php \System\Classes\MailManager::instance()->startPartial('header'); ?>
                        <?php if(isset($site_logo)): ?>
                        <img
                            src="<?php echo e(\Main\Models\Image_tool_model::resize($site_logo, ['height' => 90])); ?>"
                            alt="<?php echo e($site_name); ?>"
                        >
                        <?php endif; ?>
                    <?php echo \System\Classes\MailManager::instance()->renderPartial(); ?>
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        <?php echo e($body); ?>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php \System\Classes\MailManager::instance()->startPartial('footer'); ?>
                        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($site_name); ?>. All rights reserved.</p>
                    <?php echo \System\Classes\MailManager::instance()->renderPartial(); ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>