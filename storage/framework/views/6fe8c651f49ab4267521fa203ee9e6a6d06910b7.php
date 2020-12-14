<?php
$addonDefault = [
    'tag'        => 'span',
    'label'      => 'Label',
    'attributes' => [
        'class' => 'input-group-text',
    ],
];
$addonLeft = isset($field->config['addonLeft']) ? (object)array_merge($addonDefault, $field->config['addonLeft']) : null;
$addonRight = isset($field->config['addonRight']) ? (object)array_merge($addonDefault, $field->config['addonRight']) : null;
?>
<div class="input-group">
    <?php if($addonLeft): ?>
        <span class="input-group-append">
            <?php echo '<'.$addonLeft->tag.Html::attributes($addonLeft->attributes).'>'
            .lang($addonLeft->label).'</'.$addonLeft->tag.'>'; ?>

        </span>
    <?php endif; ?>

    <input
        type="text"
        name="<?php echo e($field->getName()); ?>"
        id="<?php echo e($field->getId()); ?>"
        value="<?php echo e($field->value); ?>"
        placeholder="<?php echo e($field->placeholder); ?>"
        class="form-control"
        autocomplete="off"
        <?php echo $this->previewMode ? 'disabled' : ''; ?>

        <?php echo $field->hasAttribute('pattern') ? '' : 'pattern="-?\d+(\.\d+)?"'; ?>

        <?php echo $field->hasAttribute('maxlength') ? '' : 'maxlength="255"'; ?>

        <?php echo $field->getAttributes(); ?>

    />

    <?php if($addonRight): ?>
        <span class="input-group-prepend">
            <?php echo '<'.$addonRight->tag.Html::attributes($addonRight->attributes).'>'
            .lang($addonRight->label).'</'.$addonRight->tag.'>'; ?>

        </span>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/widgets/form/field_addon.blade.php ENDPATH**/ ?>