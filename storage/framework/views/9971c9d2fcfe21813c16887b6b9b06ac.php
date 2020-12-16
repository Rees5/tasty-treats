<div id="menu<?php echo e($menuItem->menu_id); ?>" class="menu-item">
    <div class="d-flex flex-row">
        <?php if($showMenuImages == 1 AND $menuItemObject->hasThumb): ?>
            <div
                class="menu-thumb align-self-center mr-3"
                style="width: <?php echo e($menuImageWidth); ?>px"
            >
                <img
                    class="img-responsive img-rounded"
                    alt="<?php echo e($menuItem->menu_name); ?>"
                    src="<?php echo e($menuItem->getThumb(['width' => $menuImageWidth, 'height' => $menuImageHeight])); ?>"
                />
            </div>
        <?php endif; ?>

        <div class="menu-content flex-grow-1 mr-3">
            <h6 class="menu-name"><?php echo e($menuItem->menu_name); ?></h6>
            <p class="menu-desc text-muted mb-0">
                <?php echo nl2br($menuItem->menu_description); ?>

            </p>
        </div>
        <div class="menu-detail d-flex justify-content-end col-3 p-0">
            <?php if($menuItemObject->specialIsActive): ?>
                <div class="menu-meta text-muted pr-2">
                    <i
                        class="fa fa-star text-warning"
                        title="<?php echo sprintf(lang('igniter.local::default.text_end_elapsed'), $menuItemObject->specialDaysRemaining); ?>"
                    ></i>
                </div>
            <?php endif; ?>

            <div class="menu-price pr-3">
                <b><?php echo $menuItemObject->menuPrice > 0 ? currency_format($menuItemObject->menuPrice) : lang('main::lang.text_free'); ?></b>
            </div>

            <?php if(isset($updateCartItemEventHandler)): ?>
                <div class="menu-button">
                    <?php echo controller()->renderPartial('@button', ['menuItem' => $menuItem, 'menuItemObject' => $menuItemObject ]); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="d-flex flex-wrap align-items-center allergens">
        <?php echo controller()->renderPartial('@allergens', ['menuItem' => $menuItem, 'menuItemObject' => $menuItemObject]); ?>
    </div>
</div>

