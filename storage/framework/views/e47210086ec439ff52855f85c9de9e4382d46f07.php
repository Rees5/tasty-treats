<?php echo $this->makePartial($field->path ?: 'form/'.$field->fieldName, [
    'formModel' => $formModel,
    'formField' => $field,
    'formValue' => $field->value,
    'model'     => $formModel,
    'field'     => $field,
    'value'     => $field->value,
]); ?>

<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/widgets/form/field_partial.blade.php ENDPATH**/ ?>