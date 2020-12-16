Hi <?php echo e($first_name); ?> <?php echo e($last_name); ?>,

Your reservation **<?php echo e($reservation_number); ?>** at **<?php echo e($location_name); ?>** has been updated to the following status: <br>
**<?php echo e($status_name); ?>**

The comments for your reservation are: <br>
<?php echo e($status_comment); ?>


<?php \System\Classes\MailManager::instance()->startPartial('button', ['url' => '<?php echo e($reservation_view_url); ?>', 'type' => 'primary']); ?>
View your reservation status
<?php echo \System\Classes\MailManager::instance()->renderPartial(); ?>