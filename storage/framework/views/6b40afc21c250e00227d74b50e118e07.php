<?php echo get_script_tags(); ?>

<?php echo $this->theme->ga_tracking_code; ?>

<?php if(!empty($this->theme->custom_js)): ?>
    <script type="text/javascript"><?php echo $this->theme->custom_js; ?></script>
<?php endif; ?>
