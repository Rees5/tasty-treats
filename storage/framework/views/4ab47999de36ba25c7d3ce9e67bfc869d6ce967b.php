<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <?php echo get_metas(); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo get_favicon(); ?>

    <title><?php echo e(sprintf(lang('admin::lang.site_title'), Template::getTitle(), setting('site_name'))); ?></title>
    <?php echo get_style_tags(); ?>

</head>
<body class="page <?php echo e($this->bodyClass); ?>">
    <?php if(AdminAuth::isLogged()): ?>

        <?php echo $this->makePartial('top_nav'); ?>


        <?php echo AdminMenu::render('side_nav'); ?>


    <?php endif; ?>

    <div class="page-wrapper">
        <div class="page-content">
            <?php echo Template::getBlock('body'); ?>

        </div>
    </div>

    <div id="notification">
        <?php echo $this->makePartial('flash'); ?>

    </div>
    <?php echo $this->makePartial('set_status_form'); ?>

    <?php echo Assets::getJsVars(); ?>

    <?php echo get_script_tags(); ?>

</body>
</html>
<?php /**PATH /home/u236745344/domains/qweli.org/public_html/tastytreats/app/admin/views/_layouts/default.blade.php ENDPATH**/ ?>