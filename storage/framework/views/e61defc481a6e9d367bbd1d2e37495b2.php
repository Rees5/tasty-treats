<?php if(count($reviewList)): ?>
    <ul class="list-group list-group-flush">
        <?php $__currentLoopData = $reviewList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item review-item">
                <?php echo controller()->renderPartial('@item', ['review' => $review]); ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <li class="list-group-item">
            <div class="pagination-bar text-right">
                <div class="links"><?php echo $reviewList->links(); ?></div>
            </div>
        </li>

    </ul>
<?php else: ?>
	<div class="panel-body">
	    <p><?php echo app('translator')->get('igniter.local::default.review.text_no_review'); ?></p>
	</div>
<?php endif; ?>

