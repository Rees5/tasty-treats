<div id="local-box">
    <div class="panel local-search">
        <div class="panel-body">
            <div class="row">
                <?php if(!$hideSearch): ?>
                    <div class="col-sm-12">
                        <?php echo controller()->renderPartial('@searchbar'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-sm-12<?php echo e($hideSearch ? '' : ' mt-3 mt-sm-0'); ?> d-block d-sm-none">
                    <div class="local-timeslot">
                        <?php echo controller()->renderPartial('@timeslot'); ?>
                    </div>
                </div>
                <div class="col-sm-12 mt-3 mt-sm-0 d-block d-sm-none">
                    <div class="local-control">
                        <?php echo controller()->renderPartial('@control'); ?>
                    </div>
                </div>
            </div>
            <?php if($location->requiresUserPosition()
                AND $location->userPosition()->hasCoordinates()
                AND !$location->checkDeliveryCoverage()): ?>
                <span class="help-block"><?php echo app('translator')->get('igniter.local::default.text_delivery_coverage'); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <?php echo controller()->renderPartial($__SELF__.'::default'); ?>
</div>

