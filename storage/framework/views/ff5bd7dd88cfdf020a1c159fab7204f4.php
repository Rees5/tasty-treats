<div class="d-block d-sm-none">
    <button
        class="btn btn-light btn-block px-3 text-left"
        data-toggle="collapse"
        data-target="#collapseCategories<?php echo e($id = uniqid('collapse')); ?>"
        aria-expanded="false"
        aria-controls="collapseCategories"
    ><i class="fa fa-bars"></i>&nbsp;&nbsp;
        <?php if($selectedCategory): ?>
            <?php echo e($selectedCategory->name); ?>

        <?php else: ?>
            <?php echo app('translator')->get('igniter.local::default.text_categories'); ?>
        <?php endif; ?>
    </button>
</div>
<div
    id="collapseCategories<?php echo e($id); ?>"
    class="collapse d-sm-block"
>
    <h2 class="h5 px-3 d-none d-sm-block"><?php echo app('translator')->get('igniter.local::default.text_categories'); ?></h2>
    <nav class="nav nav-categories flex-column">
        <?php if($selectedCategory): ?>
            <a
                class="nav-link text-danger"
                href="<?php echo e(page_url('local/menus', ['category' => null])); ?>"
            >
                <i class="fa fa-times"></i>&nbsp;&nbsp;<?php echo app('translator')->get('igniter.local::default.text_clear'); ?>
            </a>
        <?php endif; ?>

        <?php echo controller()->renderPartial('@items', ['categories' => $categories->toTree()]); ?>
    </nav>
</div>

