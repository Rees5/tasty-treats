<?php
    $orderDateTime = $location->orderDateTime();
    $orderTimeIsAsap = $location->orderTimeIsAsap();
?>
<?php if(!$location->checkOrderTime()): ?>
    <button
        class="btn btn-light btn-timepicker btn-block text-truncate active"
        id="orderTimePicker"
    >
        <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
        <b><?php echo app('translator')->get('igniter.cart::default.text_is_closed'); ?></b>
    </button>
<?php else: ?>
    <div
        class="dropdown"
        data-control="timepicker"
        data-time-slot='<?php echo json_encode($locationTimeslot, 15, 512) ?>'
    >
        <button
            class="btn btn-light btn-timepicker btn-block dropdown-toggle text-truncate"
            type="button"
            id="orderTimePicker"
            data-toggle="dropdown"
            data-boundary="viewport"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
            <b>
                <?php if($orderTimeIsAsap AND $locationCurrentSchedule->isOpen()): ?>
                    <?php echo app('translator')->get('igniter.local::default.text_asap'); ?>
                <?php else: ?>
                    <?php echo e($orderDateTime->isoFormat($timePickerDateTimeFormat)); ?>

                <?php endif; ?>
            </b>
        </button>

        <div class="dropdown-menu" aria-labelledby="orderTimePicker">
            <button
                type="button"
                class="dropdown-item py-2"
                data-timepicker-option="asap"
            ><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo app('translator')->get('igniter.local::default.text_asap'); ?></button>
            <button
                type="button"
                class="dropdown-item py-2"
                data-timepicker-option="later"
            ><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo app('translator')->get('igniter.local::default.text_later'); ?></button>

            <form
                class="dropdown-content px-4 py-3 hide"
                role="form"
                data-request="<?php echo e($timeSlotEventHandler); ?>"
            >
                <input
                    type="hidden"
                    data-timepicker-control="type"
                    value="<?php echo e($orderTimeIsAsap ? 'asap' : 'later'); ?>"
                    autocomplete="off"
                />
                <div class="form-group">
                    <select
                        class="form-control"
                        data-timepicker-control="date"
                        data-timepicker-label="<?php echo app('translator')->get('igniter.local::default.label_date'); ?>"
                        data-timepicker-selected="<?php echo e($orderDateTime ? $orderDateTime->format('Y-m-d') : ''); ?>"
                    ></select>
                </div>
                <div class="form-group">
                    <select
                        class="form-control"
                        data-timepicker-control="time"
                        data-timepicker-label="<?php echo app('translator')->get('igniter.local::default.label_time'); ?>"
                        data-timepicker-selected="<?php echo e($orderDateTime ? $orderDateTime->format('H:i') : ''); ?>"
                    ></select>
                </div>
                <button
                    type="button"
                    class="btn btn-primary text-nowrap"
                    data-timepicker-submit
                    data-attach-loading
                >
                    <?php echo e(sprintf(lang('igniter.local::default.label_choose_order_time'),
                        $location->orderTypeIsDelivery()
                            ? lang('igniter.local::default.text_delivery')
                            : lang('igniter.local::default.text_collection'))); ?>

                </button>
            </form>
        </div>
    </div>
<?php endif; ?>

