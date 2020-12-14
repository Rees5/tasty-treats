<?php echo form_open([
    'id' => 'booking-form',
    'role' => 'form',
    'method' => 'POST',
    'data-request' => $bookingEventHandler,
]); ?>


<div class="form-row">
    <div class="col-sm-6">
        <div class="form-group">
            <input
                type="text"
                name="first_name"
                id="first-name"
                class="form-control"
                placeholder="<?php echo app('translator')->get('igniter.reservation::default.label_first_name'); ?>"
                value="<?php echo e(set_value('first_name', $reservation->first_name)); ?>"
            />
            <?php echo form_error('first_name', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <input
                type="text"
                name="last_name"
                id="last-name"
                class="form-control"
                placeholder="<?php echo app('translator')->get('igniter.reservation::default.label_last_name'); ?>"
                value="<?php echo e(set_value('last_name', $reservation->last_name)); ?>"
            />
            <?php echo form_error('last_name', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-sm-6">
        <div class="form-group">
            <input
                type="text"
                name="email"
                id="email"
                class="form-control"
                placeholder="<?php echo app('translator')->get('igniter.reservation::default.label_email'); ?>"
                value="<?php echo e(set_value('email', $reservation->email)); ?>"
            />
            <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <input
                type="text"
                name="telephone"
                id="telephone"
                class="form-control"
                placeholder="<?php echo app('translator')->get('igniter.reservation::default.label_telephone'); ?>"
                value="<?php echo e(set_value('telephone', $reservation->telephone)); ?>"
            />
            <?php echo form_error('telephone', '<span class="text-danger">', '</span>'); ?>

        </div>
    </div>
</div>

<div class="form-group">
    <textarea
        name="comment"
        id="comment"
        class="form-control"
        rows="2"
        placeholder="<?php echo app('translator')->get('igniter.reservation::default.label_comment'); ?>"
    ><?php echo e(set_value('comment', $reservation->comment)); ?></textarea>
    <?php echo form_error('comment', '<span class="text-danger">', '</span>'); ?>

</div>

<button
    type="submit"
    class="btn btn-primary btn-block btn-lg"
><?php echo app('translator')->get('igniter.reservation::default.button_reservation'); ?></button>

<?php echo form_close(); ?>


