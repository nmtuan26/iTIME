
<?php $__env->startSection('content'); ?>

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">So Sánh Sản Phẩm</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">So sánh sản phẩm</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<?php use App\Http\Controllers\ProductController; ?>

<!--Cart Start-->
<div class="cart-page section-padding-5">
    <div class="container">
        <div class="cart-table compare-table table-responsive">
            <table class="table table-bordered text-center align-middle">
                <tbody>
                    <tr>
                        <th style="width: 15%;">Sản Phẩm</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="width: 25%;">
                            <div class="product-image-title">
                                <?php $image = json_decode($compare->ImageName)[0]; ?>
                                <a class="product-image d-block mx-auto" href="<?php echo e(URL::to('/shop-single/'.$compare->ProductSlug)); ?>">
                                    <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="product" style="max-width: 120px; height: auto;">
                                </a>
                                <h6 class="title mt-2">
                                    <a class="view-hover text-dark" href="<?php echo e(URL::to('/shop-single/'.$compare->ProductSlug)); ?>">
                                        <?php echo e($compare->ProductName); ?>

                                    </a>
                                </h6>
                            </div>
                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="text-justify px-3" style="font-size: 15px;"><?php echo $compare->DesProduct; ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <th>Giá</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $SalePrice = $compare->Price;  
                                $get_time_sale = ProductController::get_sale_pd($compare->idProduct); 
                                if($get_time_sale) $SalePrice = $SalePrice - ($SalePrice/100) * $get_time_sale->Percent;
                            ?>
                        <td><span class="current-price text-danger fw-bold"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <th>Xem chi tiết</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><a href="<?php echo e(URL::to('/shop-single/'.$compare->ProductSlug)); ?>" class="btn btn-sm btn-primary">Xem chi tiết</a></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Cart End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views/shop/customer/compare.blade.php ENDPATH**/ ?>