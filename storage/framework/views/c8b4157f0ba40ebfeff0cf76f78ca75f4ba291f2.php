<ul <?php echo isset($navAttributes) ? Html::attributes($navAttributes) : ''; ?>>
    <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($menu['child']) AND empty($menu['child'])): ?>
            <?php continue; ?>;
        <?php endif; ?>
        <?php
            // Don't display items filtered by user permissions
            $hasChild = isset($menu['child']) AND count($menu['child'])
        ?>
        <li class="nav-item<?php echo e(($isActive = $this->isActiveNavItem($code)) ? ' active' : ''); ?>">
            <a
                class="nav-link<?php echo e(isset($menu['class']) ? ' '.$menu['class'] : ''); ?><?php echo e($hasChild ? ' has-arrow' : ''); ?>"
                href="<?php echo e($menu['href'] ?: '#'); ?>"
                aria-expanded="<?php echo e($isActive ? 'true' : 'false'); ?>"
            >
                <?php if(isset($menu['icon'])): ?>
                    <i class="fa <?php echo e($menu['icon']); ?> fa-fw"></i>
                <?php endif; ?>

                <?php if(isset($menu['icon'], $menu['title'])): ?>
                    <span class="content"><?php echo e($menu['title']); ?></span>
                <?php else: ?>
                    <?php echo e($menu['title']); ?>

                <?php endif; ?>
            </a>

            <?php if($hasChild): ?>
                <?php echo $this->makePartial('side_nav_items', [
                    'navItems'      => $menu['child'],
                    'navAttributes' => [
                        'class'         => 'nav collapse'.($isActive ? ' show' : ''),
                        'aria-expanded' => $isActive ? 'true' : 'false',
                    ],
                ]); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/views/_partials/side_nav_items.blade.php ENDPATH**/ ?>