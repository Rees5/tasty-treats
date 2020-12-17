<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $model->invoice_number.' - '.lang('admin::lang.orders.text_invoice').' - '.setting('site_name'); ?></title>
    <?php echo get_style_tags(); ?>

    <style>
        body {
            background-color: #FFF;
            color: #000;
        }
    </style>
</head>
<body>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col">
            <div class="invoice-title">
                <h3 class="pull-right"><?php echo app('translator')->get('admin::lang.orders.label_order_id'); ?><?php echo e($model->order_id); ?></h3>
                <h2><?php echo app('translator')->get('admin::lang.orders.text_invoice'); ?></h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col py-3">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <strong><?php echo app('translator')->get('admin::lang.orders.text_restaurant'); ?></strong><br>
            <span><?php echo e($model->location->getName()); ?></span><br>
            <address><?php echo format_address($model->location->getAddress(), TRUE); ?></address>
        </div>
        <div class="col-6 text-right">
            <img class="img-responsive" src="<?php echo e(uploads_url(setting('site_logo'))); ?>" alt="" style="max-height:120px;"/>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <p>
                <strong><?php echo app('translator')->get('admin::lang.orders.text_customer'); ?></strong><br>
                <?php echo e($model->first_name.' '.$model->last_name.' ('.$model->email.')'); ?>

            </p>
            <?php if($model->isDeliveryType()): ?>
                <div>
                    <strong><?php echo app('translator')->get('admin::lang.orders.text_deliver_to'); ?></strong><br>
                    <address><?php echo e($model->formatted_address); ?></address>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-3 text-left">
            <p>
                <strong><?php echo app('translator')->get('admin::lang.orders.text_invoice_no'); ?></strong><br>
                <?php echo e($model->invoice_number); ?>

            </p>
            <p>
                <strong><?php echo app('translator')->get('admin::lang.orders.text_invoice_date'); ?></strong><br>
                <?php echo e($model->invoice_date->format(lang('system::lang.php.date_format'))); ?><br><br>
            </p>
        </div>
        <div class="col-3 text-right">
            <p>
                <strong><?php echo app('translator')->get('admin::lang.orders.text_payment'); ?></strong><br>
                <?php echo e($model->payment_method->name); ?>

            </p>
            <p>
                <strong><?php echo app('translator')->get('admin::lang.orders.text_order_date'); ?></strong><br>
                <?php echo e($model->order_date->setTimeFromTimeString($model->order_time)->format(lang('system::lang.php.date_time_format'))); ?>

            </p>
        </div>
    </div>

    <?php
        $menuItemsOptions = $model->getOrderMenuOptions();
        $orderTotals = $model->getOrderTotals();
    ?>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="2%"></th>
                        <th class="text-left" width="65%">
                            <b><?php echo app('translator')->get('admin::lang.orders.column_name_option'); ?></b>
                        </th>
                        <th class="text-left"><b><?php echo app('translator')->get('admin::lang.orders.column_price'); ?></b></th>
                        <th class="text-right"><b><?php echo app('translator')->get('admin::lang.orders.column_total'); ?></b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $model->getOrderMenus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($menuItem->quantity); ?>x</td>
                            <td class="text-left"><?php echo e($menuItem->name); ?><br/>
                                <?php if($menuItemOptions = $menuItemsOptions->get($menuItem->order_menu_id)): ?>
                                    <div>
                                        <?php $__currentLoopData = $menuItemOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItemOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <small>
                                                <?php echo e($menuItemOption->quantity); ?>x
                                                <?php echo e($menuItemOption->order_option_name); ?>

                                                =
                                                <?php echo e(currency_format($menuItemOption->quantity * $menuItemOption->order_option_price)); ?>

                                            </small><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($menuItem->comment)): ?>
                                    <div>
                                        <small><b><?php echo e($menuItem->comment); ?></b></small>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="text-left"><?php echo e(currency_format($menuItem->price)); ?></td>
                            <td class="text-right"><?php echo e(currency_format($menuItem->subtotal)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    <?php $__currentLoopData = $orderTotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($model->isCollectionType() AND $total->code == 'delivery') continue; ?>
                        <?php $thickLine = ($total->code == 'order_total' OR $total->code == 'total') ?>
                        <tr>
                            <td class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'thick' : 'no'); ?>-line" width="1"></td>
                            <td class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'thick' : 'no'); ?>-line"></td>
                            <td class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'thick' : 'no'); ?>-line text-left"><?php echo e($total->title); ?></td>
                            <td class="<?php echo e(($loop->iteration === 1 OR $thickLine) ? 'thick' : 'no'); ?>-line text-right"><?php echo e(currency_format($total->value)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="text-center"><?php echo app('translator')->get('admin::lang.orders.text_invoice_thank_you'); ?></p>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/views/orders/invoice.blade.php ENDPATH**/ ?>