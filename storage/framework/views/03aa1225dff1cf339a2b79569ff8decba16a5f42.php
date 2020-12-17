<?php if(isset($carteInfo['owner'])): ?>
    <div class="panel-body border-bottom">
        <div class="d-flex">
            <div class="media-right media-middle">
                <i class="fa fa-globe fa-3x"></i>
            </div>
            <div class="media-body wrap-left">
                <h3 class="no-margin-top"><?php echo e($carteInfo['name']); ?></h3>
                <p><?php echo e($carteInfo['description'] ?? ''); ?></p>
                <strong>Owner:</strong> <?php echo e($carteInfo['owner']); ?><br/>
                <span class="small">
                    <strong>Updated:</strong> <?php echo e(mdate(lang('system::lang.php.date_time_format'), strtotime($carteInfo['updated_at']))); ?>

                </span>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/system/views/updates/carte_info.blade.php ENDPATH**/ ?>