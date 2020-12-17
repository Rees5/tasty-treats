<?php if($this->previewMode): ?>
    <div class="form-control-static"><?php echo e($value ? $value->format($formatAlias) : null); ?></div>
<?php else: ?>

    <div
        id="<?php echo e($this->getId()); ?>"
        class="control-datepicker"
    >
        <?php echo $this->makePartial('datepicker/picker_'.$mode); ?>

    </div>

<?php endif; ?>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/formwidgets/datepicker/datepicker.blade.php ENDPATH**/ ?>