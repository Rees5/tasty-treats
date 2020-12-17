<?php if(($galleryImages = array_get($gallery, 'images')) AND count($galleryImages)): ?>
    <h1 class="h4"><b><?php echo e(array_get($gallery, 'title')); ?></b></h1>
    <p><?php echo nl2br(array_get($gallery, 'description', '')); ?></p><br/>
    <div class="row gallery">
        <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
                <img
                    class="img-responsive img-rounded"
                    src="<?php echo e($media->getThumb()); ?>"
                />
                <div class="overlay">
                    <a
                        href="<?php echo e($media->getPath()); ?>"
                        target="_blank"
                    ><i class="fa fa-eye"></i></a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <p><?php echo app('translator')->get('igniter.local::default.text_empty_gallery'); ?></p>
<?php endif; ?>

