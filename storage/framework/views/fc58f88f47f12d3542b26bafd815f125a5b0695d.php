<?php if(AdminAuth::isLogged()): ?>
    <nav class="navbar navbar-top navbar-expand navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a class="logo">
                    <i class="logo-icon icon-ti-logo"></i>
                </a>
            </div>

            <div class="page-title">
                <span><?php echo Template::getHeading(); ?></span>
            </div>

            <div class="navbar navbar-right">
                <button
                    type="button"
                    class="navbar-toggler"
                    data-toggle="collapse"
                    data-target="#navSidebar"
                    aria-controls="navSidebar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="fa fa-bars"></span>
                </button>

                <?php echo $this->widgets['mainmenu']->render(); ?>

            </div>
        </div>
    </nav>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/admin/views/_partials/top_nav.blade.php ENDPATH**/ ?>