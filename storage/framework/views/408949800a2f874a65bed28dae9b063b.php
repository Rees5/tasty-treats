<ul class="nav navbar-nav">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(Auth::isLogged() AND in_array($navItem->code, ['login', 'register'])) continue; ?>
        <?php if(!Auth::isLogged() AND in_array($navItem->code, ['account', 'recent-orders'])) continue; ?>
        <li
            class="nav-item<?php echo e(($navItem->items ? ' dropdown' : '').(($navItem->isActive OR $navItem->isChildActive) ? ' active' : '')); ?>"
        >
            <a
                class="nav-link<?php echo e(($navItem->items ? ' dropdown-toggle' : '')); ?>"
                href="<?php echo e($navItem->items ? '#' : $navItem->url); ?>"
                <?php if($navItem->items): ?> data-toggle="dropdown" <?php endif; ?>
                <?php echo $navItem->extraAttributes; ?>

            ><?php echo app('translator')->get($navItem->title); ?> <?php if($navItem->items): ?> <span class="caret"></span> <?php endif; ?></a>
            <?php if($navItem->items): ?>
                <div
                    class="dropdown-menu"
                    aria-labelledby="navbar-<?php echo e($navItem->code); ?>"
                    role="menu"
                >
                    <?php $__currentLoopData = $navItem->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a
                            class="dropdown-item<?php echo e(($item->isActive ? ' active' : '')); ?>"
                            href="<?php echo e($item->url); ?>"
                            <?php echo $item->extraAttributes; ?>

                        ><?php echo app('translator')->get($item->title); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>