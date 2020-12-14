<tr>
    <td class="header">
        <?php if(isset($url)): ?>
        <a href="<?php echo e($url); ?>">
            <?php echo e($slot); ?>

        </a>
        <?php else: ?>
        <span>
            <?php echo e($slot); ?>

        </span>
        <?php endif; ?>
    </td>
</tr>