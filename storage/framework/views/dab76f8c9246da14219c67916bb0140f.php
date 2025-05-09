
<?php $__env->startSection('content'); ?>

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(kidolshop/images/banner/nammoi.jpg);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Thanh toán</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Empty Cart Start-->
<div class="empty-cart-page section-padding-5">
    <div class="container">
        <div class="empty-cart-content text-center d-flex flex-column align-items-center">
            <h1>Đặt hàng thành công</h1>
            <div class="empty-cart-img">
                <i class="fa fa-check-circle text-primary" style="font-size:100px;"></i>
            </div>
            <p>Cảm ơn bạn đã mua sắm tại trang web của chúng tôi</p>
            <!-- <div>@ echo $test @endphp</div> -->
            <!-- <div>$test</div> -->
            <a href="<?php echo e(URL::to('/ordered')); ?>" class="btn btn-primary"><i class="fa fa-angle-left"></i> Xem đơn đã đặt</a>
        </div>
    </div>
</div>
<!--Empty Cart End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\shop\cart\success-order.blade.php ENDPATH**/ ?>