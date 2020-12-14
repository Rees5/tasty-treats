
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo e(App::getLocale()); ?>">
<head>
    <?php echo controller()->renderPartial('head'); ?>
</head>
<body class="<?php echo e($this->page->bodyClass); ?>">
    <header id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo">
                        <a class="" href="<?php echo e(page_url('home')); ?>"><?php echo app('translator')->get($this->page->title); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="page-wrapper" class="content-area">
        <?php echo controller()->renderPage(); ?>
    </div>

    <footer id="page-footer">
        <?php echo controller()->renderPartial('footer'); ?>
    </footer>
    <script type="text/javascript" src="<?php echo e(asset('app/admin/assets/js/admin.js')); ?>" id="app-js"></script>
    <?php echo get_script_tags(); ?></body>
</html>