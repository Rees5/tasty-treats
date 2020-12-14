<?php echo get_metas(); ?>

<link href="<?php echo e(theme_url('demo/assets/images/favicon.ico')); ?>" rel="shortcut icon" type="image/ico">
<title><?php echo e(sprintf(lang('main::lang.site_title'), lang(get_title()), setting('site_name'))); ?></title>
<link href="<?php echo e(asset('app/admin/assets/css/admin.css')); ?>" rel="stylesheet" type="text/css" id="flame-css">
<?php echo get_style_tags(); ?>

<link href="<?php echo e(theme_url('demo/assets/css/demo.css')); ?>" rel="stylesheet" type="text/css" id="demo-css">
