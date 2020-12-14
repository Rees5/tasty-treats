<?php if($__SELF__->resetCode()): ?>
    <?php echo controller()->renderPartial('@reset'); ?>
<?php else: ?>
    <?php echo controller()->renderPartial('@forgot'); ?>
<?php endif; ?>

