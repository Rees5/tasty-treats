<?php if(count($featuredMenuItems)): ?>
    <div id="featured-menu-box" class="module-box py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mb-3"><?php echo e($featuredTitle); ?></h2>
                </div>
            </div>

            <div class="row">
                <?php $__currentLoopData = $featuredMenuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-<?php echo e(round(12 / $featuredPerRow)); ?> mb-3 mb-sm-0">
                        <div class="card h-100">
                            <?php if($featuredItem->hasMedia()): ?>
                                <img
                                    class="card-img-top"
                                    src="<?php echo e($featuredItem->getThumb([
                                        'width' => $featuredWidth,
                                        'height' => $featuredHeight,
                                    ])); ?>" alt="<?php echo e($featuredItem->getBuyableName()); ?>"
                                />
                            <?php endif; ?>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo e($featuredItem->getBuyableName()); ?>

                                    <small><?php echo e(currency_format($featuredItem->getBuyablePrice())); ?></small>
                                </h4>
                                <p class="card-text"><?php echo e($featuredItem['menu_description']); ?></p>
				<p><div id="cart-buttons" 
class="mt-3">
            <a href="/default/menus"><button class="checkout-btn btn 
btn-primary  
btn-block 
btn-lg">Order Now</button>
        </div></p></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

