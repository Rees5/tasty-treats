<?php
$type = $tabs->section;
$activeTab = $activeTab ? $activeTab : '#'.$type.'tab-1';
?>
<div class="tab-heading">
    <ul class="form-nav nav nav-tabs">
        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $tabName = '#'.$type.'tab-'.$loop->iteration;
            ?>
            <li class="nav-item">
                <a
                    class="nav-link<?php echo e(($tabName == $activeTab) ? ' active' : ''); ?>"
                    href="<?php echo e($tabName); ?>"
                    data-toggle="tab"
                ><?php echo app('translator')->get($name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<div class="row no-gutters">
    <div class="col-md-8">
        <div class="tab-content">
            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $tabName = '#'.$type.'tab-'.$loop->iteration;
                ?>
                <div
                    class="tab-pane <?php echo e(($tabName == $activeTab) ? 'active' : ''); ?>"
                    id="<?php echo e($type.'tab-'.$loop->iteration); ?>">
                    <div class="form-fields">
                        <?php echo $this->makePartial('form/form_fields', ['fields' => $fields]); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-md-4 pl-md-3">
        <?php echo $this->makePartial('mailtemplates/form/variables', [
            'cssClass' => ' form-fields pl-0',
            'variables' => \System\Classes\MailManager::instance()->listRegisteredVariables(),
        ]); ?>

    </div>
</div>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/system/views/maillayouts/form/form_tabs.blade.php ENDPATH**/ ?>