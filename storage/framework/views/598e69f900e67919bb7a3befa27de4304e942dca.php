<?php if($outsideTabs->hasFields()): ?>
    <?php echo $this->makePartial('form/form_section', ['tabs' => $outsideTabs]); ?>

<?php endif; ?>

<?php if($primaryTabs->hasFields()): ?>
    <?php echo $this->makePartial('form/form_section', ['tabs' => $primaryTabs]); ?>

<?php endif; ?>

<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/form/form.blade.php ENDPATH**/ ?>