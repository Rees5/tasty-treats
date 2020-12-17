<div class="field-section">
    <?php if($field->label): ?>
        <h5 class="section-title"><?php echo app('translator')->get($field->label); ?></h5>
    <?php endif; ?>

    <?php if($field->comment): ?>
        <p class="help-block"><?php echo app('translator')->get($field->comment); ?></p>
    <?php endif; ?>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/form/field_section.blade.php ENDPATH**/ ?>