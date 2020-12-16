<li
    id="<?php echo e($item->getId()); ?>"
    class="nav-item">
    <a <?php echo $item->getAttributes(); ?>>
        <i class="fa <?php echo e($item->icon); ?>"></i>
        <?php if($item->badge): ?>
            <span class="label <?php echo e($item->badge); ?>"></span>
        <?php endif; ?>
        <?php if($item->label): ?>
            <span><?php echo app('translator')->get($item->label); ?></span>
        <?php endif; ?>
    </a>
</li>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/menu/item_link.blade.php ENDPATH**/ ?>