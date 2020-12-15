<?php echo get_metas(); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php if(trim($favicon = $this->theme->favicon, '/')): ?>
    <link href="<?php echo e(uploads_url($favicon)); ?>" rel="shortcut icon" type="image/ico">
<?php else: ?>
    <?php echo get_favicon(); ?>

<?php endif; ?>
<title><?php echo e(sprintf(lang('main::lang.site_title'), lang(get_title()), setting('site_name'))); ?></title>
<link href="//fonts.googleapis.com/css?family=Amaranth|Titillium+Web:200,200i,400,400i,600,600i,700,700i|Droid+Sans+Mono" rel="stylesheet">
<?php echo get_style_tags(); ?>

<?php if(!empty($this->theme->custom_css)): ?>
    <style type="text/css" id="custom-css"><?php echo $this->theme->custom_css; ?></style>
<?php endif; ?>
