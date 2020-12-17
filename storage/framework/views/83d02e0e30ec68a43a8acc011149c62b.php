<div id="address-book">
        <?php if($addressIdParam): ?>
                <?php echo controller()->renderPartial('@form'); ?>
        <?php else: ?>
                <?php echo controller()->renderPartial('@list'); ?>
        <?php endif; ?>
</div>

