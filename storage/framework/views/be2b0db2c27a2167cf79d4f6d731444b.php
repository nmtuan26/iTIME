
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
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:10%;">Sản Phẩm</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="width:30%; vertical-align:unset;">
                            <div class="product-image-title">
                                <?php $image = json_decode($compare->ImageName)[0];?>
                                <a class="product-image" href="<?php echo e(URL::to('/shop-single/'.$compare->ProductSlug)); ?>"><img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="product"></a>
                                <h5 class="title"><a class="view-hover" href="<?php echo e(URL::to('/shop-single/'.$compare->ProductSlug)); ?>"><?php echo e($compare->ProductName); ?></a></h5>
                            </div>
                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="vertical-align:unset;"><div style="text-align:justify;"><?php echo $compare->DesProduct; ?></div></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <th>Giá</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $SalePrice = $compare->Price;  
                                $get_time_sale = ProductController::get_sale_pd($compare->idProduct); 
                                if($get_time_sale) $SalePrice = $SalePrice - ($SalePrice/100) * $get_time_sale->Percent;
                            ?>
                        <td><span class="current-price text-primary"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <th>Xem chi tiết</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><a href="<?php echo e(URL::to('/shop-single/'.$compare->ProductSlug)); ?>" class="btn btn-primary">Xem chi tiết</a></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <!-- <tr>
                        <th>Xóa</th>
                        <?php $__currentLoopData = $list_compare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><a href="compare.php?del_idpro=" class="btn btn-secondary">Xóa</a></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>  -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Cart End-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\shop\customer\compare.blade.php ENDPATH**/ ?>