<ul id="nav-tabs" class="nav-menus nav nav-tabs">
    <a
        class="nav-item nav-link <?php echo e(($activeTab === 'menus') ? 'active' : ''); ?>"
        href="<?php echo e(restaurant_url('local/menus')); ?>"
    ><?php echo app('translator')->get('main::lang.local.text_tab_menu'); ?></a>
    <?php if(setting('allow_reviews', 1)): ?>
        <a
            class="nav-item nav-link <?php echo e(($activeTab === 'reviews') ? 'active' : ''); ?>"
            href="<?php echo e(restaurant_url('local/reviews')); ?>"
        ><?php echo app('translator')->get('main::lang.local.text_tab_review'); ?></a>
    <?php endif; ?>
    <a
        class="nav-item nav-link <?php echo e(($activeTab === 'info') ? 'active' : ''); ?>"
        href="<?php echo e(restaurant_url('local/info')); ?>"
    ><?php echo app('translator')->get('main::lang.local.text_tab_info'); ?></a>
    <?php if(isset($locationCurrent) AND $locationCurrent->hasGallery()): ?>
        <a
            class="nav-item nav-link <?php echo e(($activeTab === 'gallery') ? 'active' : ''); ?>"
            href="<?php echo e(restaurant_url('local/gallery')); ?>"
        ><?php echo app('translator')->get('main::lang.local.text_tab_gallery'); ?></a>
    <?php endif; ?>
</ul>