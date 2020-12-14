<?php if(count($customerReservations)): ?>
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th><?php echo app('translator')->get('igniter.reservation::default.reservations.column_location'); ?></th>
                <th><?php echo app('translator')->get('igniter.reservation::default.reservations.column_status'); ?></th>
                <th><?php echo app('translator')->get('igniter.reservation::default.reservations.column_date'); ?></th>
                <th><?php echo app('translator')->get('igniter.reservation::default.reservations.column_table'); ?></th>
                <th><?php echo app('translator')->get('igniter.reservation::default.reservations.column_guest'); ?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $customerReservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($reservation->location ? $reservation->location->location_name : null); ?></td>
                    <td><b><?php echo e($reservation->status->status_name); ?></b></td>
                    <td><?php echo e($reservation->reserve_date->setTimeFromTimeString($reservation->reserve_time)->isoFormat($reservationDateTimeFormat)); ?></td>
                    <td><?php echo e($reservation->related_table ? $reservation->related_table->table_name : null); ?></td>
                    <td><?php echo e($reservation->guest_num); ?></td>
                    <td>
                        <a
                            class="btn btn-light"
                            href="<?php echo e(site_url($reservationsPage, ['reservationId' => $reservation->reservation_id, 'hash' => $reservation->hash])); ?>"
                        ><i class="fa fa-receipt"></i>&nbsp;&nbsp;<?php echo app('translator')->get('igniter.reservation::default.reservations.btn_view'); ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-bar text-right">
        <div class="links"><?php echo $customerReservations->links(); ?></div>
    </div>
<?php else: ?>
    <p><?php echo app('translator')->get('igniter.reservation::default.reservations.text_empty'); ?></p>
<?php endif; ?>

