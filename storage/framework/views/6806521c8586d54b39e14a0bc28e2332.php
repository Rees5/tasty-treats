<button
    class="btn btn-light btn-sm btn-cart<?php echo e($menuItemObject->mealtimeIsNotAvailable ? ' disabled' : ''); ?>"
    <?php if(!$menuItemObject->mealtimeIsNotAvailable): ?>
    <?php if($menuItemObject->hasOptions): ?>
    data-cart-control="load-item"
    data-menu-id="<?php echo e($menuItem->menu_id); ?>"
    data-quantity="<?php echo e($menuItem->minimum_qty); ?>"
    <?php else: ?>
    data-request="<?php echo e($updateCartItemEventHandler); ?>"
    data-request-data="menuId: '<?php echo e($menuItem->menu_id); ?>', quantity: '<?php echo e($menuItem->minimum_qty); ?>'"
    data-replace-loading="fa fa-spinner fa-spin"
    <?php endif; ?>
    <?php else: ?>
    title="<?php echo e(implode("\r\n", $menuItemObject->mealtimeTitles)); ?>"
    <?php endif; ?>
>
    <i class="fa fa-<?php echo e($menuItemObject->mealtimeIsNotAvailable ? 'clock-o' : 'plus'); ?>"></i>
</button>
