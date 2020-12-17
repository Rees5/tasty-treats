<?php if($locationInfo->hasDelivery): ?>
    <h4 class="panel-title p-3"><b><?php echo app('translator')->get('igniter.local::default.text_delivery_areas'); ?></b></h4>
    <div class="list-group list-group-flush">
        <?php if(count($locationInfo->deliveryAreas)): ?>
            <div class="list-group-item">
                <div class="row">
                    <div class="col-sm-4"><b><?php echo app('translator')->get('admin::lang.label_name'); ?></b></div>
                    <div class="col-sm-8"><b><?php echo app('translator')->get('igniter.local::default.column_area_charge'); ?></b>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $locationInfo->deliveryAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4"><?php echo e($area->name); ?></div>
                        <div class="col-sm-8">
                            <?php echo implode('<br>', $__SELF__->getAreaConditionLabels($area)); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="list-group-item">
                <p><?php echo app('translator')->get('igniter.local::default.text_no_delivery_areas'); ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

