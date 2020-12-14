<div class="btn-toolbar" role="toolbar">
    <div class="toolbar-action flex-fill d-sm-flex justify-content-between">
        <div class="toolbar-item">
            <div class="btn-group">
                <div
                    class="dropdown mr-2"
                    data-control="folder-tree-dropdown"
                >
                    <button
                        type="button"
                        class="btn btn-default dropdown-toggle"
                        data-toggle="dropdown"
                    ><i class="fa fa-ellipsis-h"></i></button>
                    <div
                        id="<?php echo e($this->getId('folder-tree')); ?>"
                        data-control="folder-tree"
                        class="dropdown-menu"
                    ><?php echo $this->makePartial('mediamanager/folder_tree'); ?></div>
                </div>
                <button
                    class="btn btn-default" type="button"
                    data-media-control="refresh">
                    <i class="fa fa-refresh"></i>
                </button>
            </div>

            <div class="btn-group">
                <?php if($this->getSetting('uploads')): ?>
                    <button
                        type="button" class="btn btn-primary"
                        data-media-control="upload">
                        <i class="fa fa-upload"></i>&nbsp;&nbsp;
                        <?php echo app('translator')->get('main::lang.media_manager.button_upload'); ?>
                    </button>
                <?php endif; ?>
            </div>

            <div class="btn-group">
                <?php if($this->getSetting('new_folder')): ?>
                    <button
                        class="btn btn-default" title="<?php echo app('translator')->get('main::lang.media_manager.text_new_folder'); ?>"
                        data-media-control="new-folder">
                        <i class="fa fa-folder"></i>
                    </button>
                <?php endif; ?>
                <?php if($this->getSetting('rename')): ?>
                    <button
                        class="btn btn-default" title="<?php echo app('translator')->get('main::lang.media_manager.text_rename_folder'); ?>"
                        data-media-control="rename-folder">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <?php endif; ?>
                <?php if($this->getSetting('delete')): ?>
                    <button
                        class="btn btn-danger" title="<?php echo app('translator')->get('main::lang.media_manager.text_delete_folder'); ?>"
                        data-media-control="delete-folder">
                        <i class="fa fa-trash"></i>
                    </button>
                    <?php endif; ?>
            </div>
        </div>

        <div class="toolbar-item">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="dropdown mr-2">
                        <a class="btn btn-default dropdown-toggle" role="button" data-toggle="dropdown" title="Sort">
                            <?php if(isset($sortBy[1]) AND $sortBy[1] === 'ascending'): ?>
                                <i class="fa fa-sort-amount-asc"></i> <i class="caret"></i>
                            <?php else: ?>
                                <i class="fa fa-sort-amount-desc"></i> <i class="caret"></i>
                            <?php endif; ?>
                        </a>
                        <?php echo $this->makePartial('mediamanager/sorting', ['sortBy', $sortBy]); ?>

                    </div>

                    <?php if (! ($isPopup)): ?>
                        <a
                            class="btn btn-default btn-options mr-2"
                            href="<?php echo e(admin_url('settings/edit/media')); ?>">
                            <i class="fa fa-gears"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <?php echo $this->makePartial('mediamanager/search'); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/main/widgets/mediamanager/toolbar.blade.php ENDPATH**/ ?>