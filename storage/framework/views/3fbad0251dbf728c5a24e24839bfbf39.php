Hi <?php echo e($first_name); ?> <?php echo e($last_name); ?>,

Your order **<?php echo e($order_number); ?>** has been updated to the following status: <br>
**<?php echo e($status_name); ?>**

The comments for your order are: <br>
**<?php echo e($status_comment); ?>**

<?php \System\Classes\MailManager::instance()->startPartial('button', ['url' => $order_view_url, 'type' => 'primary']); ?>
View your order progress
<?php echo \System\Classes\MailManager::instance()->renderPartial(); ?>