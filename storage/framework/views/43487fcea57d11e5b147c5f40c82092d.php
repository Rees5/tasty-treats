<?php if($customerReservation): ?>
    <?php if($showReviews AND !empty($reviewable)): ?>
        <div class="mb-3">
            <?php echo controller()->renderPartial('localReview::form'); ?>
        </div>
    <?php endif; ?>

    <?php echo controller()->renderPartial($__SELF__.'::preview'); ?>
<?php else: ?>
    <?php echo controller()->renderPartial('@list'); ?>
<?php endif; ?>

