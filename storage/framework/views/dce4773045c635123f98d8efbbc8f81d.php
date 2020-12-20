<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(in_array($category->getKey(), $hiddenCategories)) continue; ?>
    <?php if($hideEmptyCategory AND $category->count_menus < 1) continue; ?>

    <a
        class="nav-link<?php echo e(($selectedCategory AND $category->permalink_slug == $selectedCategory->permalink_slug) ? ' active' : ''); ?>"
        href="<?php echo e(page_url('local/menus', ['category' => $category->permalink_slug])); ?>"
    ><?php echo e($category->name); ?></a>

    <?php if(count($category->children)): ?>
        <nav class="nav nav-categories flex-column ml-3 my-1">
            <?php echo controller()->renderPartial('@items', ['categories' => $category->children]); ?>
        </nav>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

