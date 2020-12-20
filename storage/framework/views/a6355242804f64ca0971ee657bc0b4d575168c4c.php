<div
    class="components-item"
    data-control="component"
    data-component-alias="<?php echo e($component->alias); ?>"
>
    <div class="components-item-action">
        <a
            data-component-control="drag"
            class="handle btn btn-light btn-sm"
            role="button"
        ><i class="fa fa-arrows-alt"></i></a>
        <a
            data-component-control="remove"
            class="remove btn btn-light btn-sm pull-right"
            role="button"
            data-prompt="<?php echo app('translator')->get('admin::lang.alert_confirm'); ?>"
            title="<?php echo app('translator')->get('main::lang.components.button_delete'); ?>"
        ><i class="fa fa-trash text-danger"></i></a>
    </div>
    <div
        class="component btn btn-light text-left<?php echo e($component->fatalError ? ' border-danger' : ''); ?>"
        data-component-control="load"
    >
        <b><?php echo app('translator')->get($component->name); ?></b>
        <p class="text-muted mb-0"><?php echo e($component->description ? lang($component->description) : ''); ?></p>
        <?php if($component->fatalError): ?>
            <p class="text-danger mb-0"><?php echo e($component->fatalError); ?></p>
        <?php endif; ?>
    </div>
    <input
        type="hidden"
        name="<?php echo e($this->formField->getName()); ?>[]"
        value="<?php echo e($component->alias); ?>"
    >
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/main/formwidgets/components/component.blade.php ENDPATH**/ ?>