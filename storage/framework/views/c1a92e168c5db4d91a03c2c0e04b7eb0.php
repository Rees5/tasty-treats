
<?php echo controller()->renderPartial('nav/local_tabs', ['activeTab' => 'reviews']); ?>

<div class="panel">
    <div class="panel-body">
        <h1 class="panel-title h4">
            <?php echo e(sprintf(lang('igniter.local::default.review.text_review_heading'), $locationCurrent->location_name)); ?>

        </h1>
    </div>

    <?php echo controller()->renderComponent('localReview'); ?>
</div>
