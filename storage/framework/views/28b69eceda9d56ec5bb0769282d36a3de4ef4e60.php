<?php
    $newsFeed = [];
    if (isset($newsRss) AND @$newsRss->load($this->newsRss)) {
        foreach ($newsRss->getElementsByTagName('item') as $content) {
            $item = [
                'title' => $content->getElementsByTagName('title')->item(0)->nodeValue,
                'description' => $content->getElementsByTagName('description')->item(0)->nodeValue,
                'link' => $content->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => $content->getElementsByTagName('pubDate')->item(0)->nodeValue,
            ];

            $newsFeed[] = $item;
        }

        $newsCount = $this->property('newsCount');
        $count = (($count = count($newsFeed)) < $newsCount) ? $count : $newsCount;

        $newsFeed = array_slice($newsFeed, 0, $count);
    }
?>
<div class="dashboard-widget widget-news">
    <h6 class="widget-title"><?php echo app('translator')->get($this->property('title')); ?></h6>
    <div class="row">
        <div class="list-group list-group-flush w-100">
            <?php $__empty_1 = true; $__currentLoopData = $newsFeed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a class="list-group-item" target="_blank" href="<?php echo e($feed['link']); ?>">
                    <b class="d-block text-truncate"><?php echo e($feed['title']); ?></b>
                    <span class="text-muted d-block text-truncate"><?php echo e(strip_tags($feed['description'])); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="mt-3">
                    <p class="text-danger">
                        <?php echo app('translator')->get('admin::lang.dashboard.error_rss'); ?>
                        <a href="javascript:location.reload();">
                            <?php echo app('translator')->get('admin::lang.text_reload'); ?>
                        </a>.
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\tasty\setup-master/app/system/dashboardwidgets/news/news.blade.php ENDPATH**/ ?>