<div
    class="field-rating"
    data-control="star-rating"
    data-score="<?php echo e($value); ?>"
    data-hints='<?php echo json_encode($hints, 15, 512) ?>'
    data-score-name="<?php echo e($field->getName()); ?>"
    <?php echo $field->getAttributes(); ?>>

    <div class="rating rating-star"></div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/formwidgets/starrating/starrating.blade.php ENDPATH**/ ?>