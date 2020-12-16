<?php echo $this->makePartial('lists/list_button', ['record' => $theme, 'column' => $this->getColumn('source')]); ?>


<?php if($theme->getTheme()->hasCustomData()): ?>
    <?php echo $this->makePartial('lists/list_button', ['record' => $theme, 'column' => $this->getColumn('edit')]); ?>

<?php endif; ?>

<?php echo $this->makePartial('lists/list_button', ['record' => $theme, 'column' => $this->getColumn('default')]); ?>


<?php echo $this->makePartial('lists/list_button', ['record' => $theme, 'column' => $this->getColumn('delete')]); ?>

<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/system/views/themes/lists/list_buttons.blade.php ENDPATH**/ ?>