<?php
    $variables = $variables ?? $field->options();
?>
<div class="w-100 flex-column<?php echo e($cssClass ?? ''); ?>">
    <label class="sr-only">
        <?php echo app('translator')->get('system::lang.mail_templates.text_variables'); ?>
    </label>
    <select
        class="form-control"
        autocomplete="off"
        onchange="$('#email-variables > div').hide();$('#'+this.value).show()"
    >
        <?php $__currentLoopData = $variables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupName => $vars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e(str_slug($groupName)); ?>"
                <?php echo $loop->first ? 'selected="selected"' : ''; ?>

            ><?php echo app('translator')->get($groupName); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div
        id="email-variables"
        class="card card-body bg-white mt-2"
    >
        <p class="small"><?php echo app('translator')->get('system::lang.mail_templates.help_variables'); ?></p>
        <?php $__currentLoopData = $variables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupName => $vars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                id="<?php echo e(str_slug($groupName)); ?>"
                style="display: <?php echo e($loop->first ? 'block' : 'none'); ?>;"
            >
                <?php $__currentLoopData = $vars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variable => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span
                        class="badge border mb-2"
                        title="<?php echo app('translator')->get($label); ?>"
                        style="font-size: 100%;"
                    ><pre class="mb-0 text-muted"><code><?php echo e($variable); ?></code></pre></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/views/mailtemplates/form/variables.blade.php ENDPATH**/ ?>