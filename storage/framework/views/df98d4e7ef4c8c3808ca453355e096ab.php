
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo e(App::getLocale()); ?>">
<head>
    <?php echo controller()->renderPartial('head'); ?>
</head>
<body class="<?php echo e($this->page->bodyClass); ?>">

    <header class="header">
        <?php echo controller()->renderPartial('header'); ?>
    </header>

    <main role="main">
        <div id="page-wrapper">
            <div class="container">
                <div class="row py-4">
                    <div class="col-sm-2 d-none d-sm-inline-block">
                        <div class="categories affix-categories">
                            <?php echo controller()->renderComponent('categories'); ?>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="content">
                            <?php echo controller()->renderPartial('localBox::container'); ?>

                            <?php echo controller()->renderPage(); ?>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <?php echo controller()->renderPartial('cartBox::container'); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="pt-5">
        <?php echo controller()->renderPartial('footer'); ?>
    </footer>
    <div id="notification">
        <?php echo controller()->renderPartial('flash'); ?>
    </div>
    <?php echo controller()->renderPartial('eucookiebanner'); ?>
    <?php echo controller()->renderPartial('scripts'); ?>
</body>
</html>