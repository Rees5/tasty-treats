<?php
    $staffLocationId = AdminLocation::getId();
    $staffAvatar = '//www.gravatar.com/avatar/'.md5(strtolower(trim(AdminAuth::getStaffEmail()))).'.png?s=64&d=mm';
    $staffLocations = AdminLocation::listLocations()->all();
    $staffGroupNames = implode(', ', AdminAuth::staff()->groups->pluck('staff_group_name')->all());
    $staffState = \Admin\Classes\UserState::forUser();
?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link" data-toggle="dropdown">
        <img
            class="rounded-circle"
            src="<?php echo e($staffAvatar); ?>"
        >
    </a>
    <div class="dropdown-menu">
        <div class="d-flex flex-column w-100 align-items-center">
            <div class="pt-4 px-4 pb-2">
                <img class="rounded-circle" src="<?php echo e($staffAvatar); ?>">
            </div>
            <div class="pb-3 text-center">
                <div class="text-uppercase"><?php echo e(AdminAuth::getStaffName()); ?></div>
                <div class="text-muted"><?php echo e($staffGroupNames); ?></div>
            </div>
        </div>
        <?php if(!AdminLocation::isSingleMode()): ?>
            <div class="px-3 pb-3">
                <form method="POST" accept-charset="UTF-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text<?php echo e($staffLocationId ? ' text-info' : ' text-muted'); ?>">
                                <i class="fa fa-map-marker fa-fw"></i>
                            </div>
                        </div>
                        <select
                            name="location"
                            class="form-control"
                            data-request="<?php echo e($this->getEventHandler('onChooseLocation')); ?>"
                        >
                            <?php if(AdminAuth::isSuperUser()): ?>
                                <option value="0"><?php echo app('translator')->get('admin::lang.text_all_locations'); ?></option>
                            <?php endif; ?>
                            <?php $__currentLoopData = $staffLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    value="<?php echo e($key); ?>"
                                    <?php echo e($key == $staffLocationId ? 'selected="selected"' : ''); ?>

                                ><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        <a
            class="dropdown-item"
            data-toggle="modal"
            data-target="#editStaffStatusModal"
            role="button"
        >
            <i class="fa fa-circle fa-fw text-<?php echo e($staffState->getStatusColorName()); ?>"></i><?php echo app('translator')->get('admin::lang.text_set_status'); ?>
        </a>
        <a class="dropdown-item" href="<?php echo e(admin_url('staffs/account')); ?>">
            <i class="fa fa-user fa-fw"></i><?php echo app('translator')->get('admin::lang.text_edit_details'); ?>
        </a>
        <a class="dropdown-item text-danger" href="<?php echo e(admin_url('logout')); ?>">
            <i class="fa fa-power-off fa-fw"></i><?php echo app('translator')->get('admin::lang.text_logout'); ?>
        </a>
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item text-muted" href="https://tastyigniter.com/about" target="_blank">
            <i class="fa fa-info-circle fa-fw"></i><?php echo app('translator')->get('admin::lang.text_about_tastyigniter'); ?>
        </a>
        <a class="dropdown-item text-muted" href="https://tastyigniter.com/docs" target="_blank">
            <i class="fa fa-book fa-fw"></i><?php echo app('translator')->get('admin::lang.text_documentation'); ?>
        </a>
        <a class="dropdown-item text-muted" href="https://forum.tastyigniter.com" target="_blank">
            <i class="fa fa-users fa-fw"></i><?php echo app('translator')->get('admin::lang.text_community_support'); ?>
        </a>
    </div>
</li>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/views/_partials/top_nav_user_menu.blade.php ENDPATH**/ ?>