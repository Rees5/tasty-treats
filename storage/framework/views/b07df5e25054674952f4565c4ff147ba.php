<?php $__currentLoopData = $locationsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locationObject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a
        class="card w-100 p-3 mb-2"
        href="<?php echo e(page_url('local/menus', ['location' => $locationObject->permalink])); ?>"
    >
        <div class="boxes d-sm-flex no-gutters">
            <div class="col-12 col-sm-7">
                <div class="d-sm-flex">
                    <?php if($locationObject->hasThumb): ?>
                        <div class="col-sm-3 p-0 mr-sm-4 mb-3 mb-sm-0">
                            <img
                                class="img-responsive img-fluid"
                                src="<?php echo e($locationObject->thumb); ?>"
                            />
                        </div>
                    <?php endif; ?>
                    <dl class="no-spacing">
                        <dd><h2 class="h5 mb-0 text-body"><?php echo e($locationObject->name); ?></h2></dd>
                        <?php if($showReviews): ?>
                            <dd>
                                <div class="rating rating-sm text-muted">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star-half-o"></span>
                                    <span class="fa fa-star-o"></span>
                                    <span><?php echo sprintf(lang('igniter.local::default.review.text_total_review'), $locationObject->reviewsCount); ?></span>
                                </div>
                            </dd>
                        <?php endif; ?>
                        <dd class="d-none">
                        <span
                            class="text-muted text-truncate"><?php echo format_address($locationObject->address); ?></span>
                        </dd>
                        <?php if($locationObject->distance): ?>
                            <dd>
                            <span
                                class="text-muted small"
                            ><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo e(number_format($locationObject->distance, 1)); ?> <?php echo e($distanceUnit); ?></span>
                            </dd>
                        <?php endif; ?>
                    </dl>
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <dl class="no-spacing">
                    <?php if($locationObject->openingSchedule->isOpen()): ?>
                        <dt><?php echo app('translator')->get('igniter.local::default.text_is_opened'); ?></dt>
                    <?php elseif($locationObject->openingSchedule->isOpening()): ?>
                        <dt class="text-muted"><?php echo sprintf(lang('igniter.local::default.text_opening_time'), $locationObject->openingTime->isoFormat($openingTimeFormat)); ?></dt>
                    <?php else: ?>
                        <dt class="text-muted"><?php echo app('translator')->get('igniter.local::default.text_closed'); ?></dt>
                    <?php endif; ?>
                    <dd class="text-muted">
                        <?php if($locationObject->hasDelivery): ?>
                            <?php if($locationObject->deliverySchedule->isOpen()): ?>
                                <?php echo sprintf(lang('igniter.local::default.text_delivery_time_info'), sprintf(lang('igniter.local::default.text_in_minutes'), $locationObject->deliveryMinutes)); ?>

                            <?php elseif($locationObject->deliverySchedule->isOpening()): ?>
                                <?php echo sprintf(lang('igniter.local::default.text_delivery_time_info'), '<span class="text-danger">'.sprintf(lang('igniter.local::default.text_starts'), $locationObject->collectionTime->isoFormat($openingTimeFormat).'</span>')); ?>

                            <?php else: ?>
                                <?php echo sprintf(lang('igniter.local::default.text_delivery_time_info'), lang('igniter.local::default.text_is_closed')); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </dd>
                    <dd class="text-muted">
                        <?php if($locationObject->hasCollection): ?>
                            <?php if($locationObject->collectionSchedule->isOpen()): ?>
                                <?php echo sprintf(lang('igniter.local::default.text_collection_time_info'), sprintf(lang('igniter.local::default.text_in_minutes'), $locationObject->collectionMinutes)); ?>

                            <?php elseif($locationObject->collectionSchedule->isOpening()): ?>
                                <?php echo sprintf(lang('igniter.local::default.text_collection_time_info'), '<span class="text-danger">'.sprintf(lang('igniter.local::default.text_starts'), $locationObject->collectionTime->isoFormat($openingTimeFormat).'</span>')); ?>

                            <?php else: ?>
                                <?php echo sprintf(lang('igniter.local::default.text_collection_time_info'), lang('igniter.local::default.text_is_closed')); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </dd>
                    <dd class="text-muted small">
                        <?php if(!$locationObject->hasDelivery AND $locationObject->hasCollection): ?>
                            <?php echo app('translator')->get('igniter.local::default.text_only_collection_is_available'); ?>
                        <?php elseif($locationObject->hasDelivery AND !$locationObject->hasCollection): ?>
                            <?php echo app('translator')->get('igniter.local::default.text_only_delivery_is_available'); ?>
                        <?php elseif($locationObject->hasDelivery AND $locationObject->hasCollection): ?>
                            <?php echo app('translator')->get('igniter.local::default.text_offers_both_types'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('igniter.local::default.text_offers_no_types'); ?>
                        <?php endif; ?>
                    </dd>
                </dl>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

