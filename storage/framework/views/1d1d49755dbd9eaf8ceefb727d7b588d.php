
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto my-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title h4 mb-4 font-weight-normal">
                        <?php echo app('translator')->get('main::lang.account.login.text_login'); ?>
                    </h1>

                    <?php echo controller()->renderPartial('account::login'); ?>

                    <div class="row">
                        <div class="col-md-5 p-sm-0">
                            <a class="btn btn-link btn-lg" href="<?php echo e(site_url('account/reset')); ?>">
                                <span class="small"><?php echo app('translator')->get('main::lang.account.login.text_forgot'); ?></span>
                            </a>
                        </div>
                        <?php if((bool)$canRegister): ?>
                            <div class="col-sm-7">
                                <a
                                    class="btn btn-outline-default btn-block btn-lg"
                                    href="<?php echo e(site_url('account/register')); ?>"
                                ><?php echo app('translator')->get('main::lang.account.login.button_register'); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
