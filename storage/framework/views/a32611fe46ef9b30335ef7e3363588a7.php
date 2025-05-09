
<?php $__env->startSection('content'); ?>

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Đơn đặt hàng</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đơn đặt hàng</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->


<!--My Account Start-->
<div class="register-page section-padding-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="my-account-menu mt-30">
                    <ul class="nav account-menu-list flex-column">
                        <li>
                            <a href="<?php echo e(URL::to('/account')); ?>"><i class="fa fa-user"></i> Hồ Sơ</a>
                        </li>
                        <li>
                            <a href="<?php echo e(URL::to('/change-password')); ?>"><i class="fa fa-key"></i> Đổi Mật Khẩu</a>
                        </li>
                        <li>
                            <a class="active"><i class="fa fa-shopping-cart"></i> Đơn Đặt Hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <div class="tab-content my-account-tab mt-30" id="pills-tabContent">
                    <div class="tab-pane fade active show">
                        <div class="my-account-order account-wrapper">
                            <h4 class="account-title mb-15">Đơn Đặt Hàng</h4>
                            <div class="row pt-30 pb-30 mb-25" style="border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5; justify-content: space-evenly;">
                                <a href="<?php echo e(URL::to('/ordered')); ?>" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;">
                                    <i class="fa fa-envelope" style="font-size:24px;"></i>
                                    <div>Tất cả</div>
                                    <?php if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->count() > 0): ?>
                                    <span class="qty-ordered"><?php echo e(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->count()); ?></span> <?php endif; ?>
                                </a>
                                <a href="<?php echo e(URL::to('/order-waiting')); ?>" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;">
                                    <i class="fa fa-inbox" style="font-size:24px;"></i>
                                    <div>Chờ xác nhận</div>
                                    <?php if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','0')->count() > 0): ?>
                                    <span class="qty-ordered"><?php echo e(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','0')->count()); ?></span> <?php endif; ?>
                                </a>
                                <a href="<?php echo e(URL::to('/order-shipping')); ?>" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;"> 
                                    <i class="fa fa-plane" style="font-size:24px;"></i>
                                    <div>Đang giao</div>
                                    <?php if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','1')->count() > 0): ?>
                                    <span class="qty-ordered"><?php echo e(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','1')->count()); ?></span> <?php endif; ?>
                                </a>
                                <a class="col-xl-2 col-md-2 text-center view-hover text-primary" style="position:relative;"> 
                                    <i class="fa fa-check-circle" style="font-size:24px;"></i>
                                    <div>Đã giao</div>
                                    <?php if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','2')->count() > 0): ?>
                                    <span class="qty-ordered"><?php echo e(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','2')->count()); ?></span> <?php endif; ?>
                                </a>
                                <a href="<?php echo e(URL::to('/order-cancelled')); ?>" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;">
                                    <i class="fa fa-times" style="font-size:24px;"></i>
                                    <div>Đã hủy</div>
                                    <?php if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','99')->count() > 0): ?>
                                    <span class="qty-ordered"><?php echo e(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','99')->count()); ?></span> <?php endif; ?>
                                </a>
                            </div>
                            <!-- <div class="account-table text-center mt-25 table-responsive"> -->
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="no">Mã ĐH</th>
                                            <th class="name">Tên người nhận</th>
                                            <th class="date">Ngày đặt</th>
                                            <th class="date">Ngày giao</th>
                                            <th class="total">Tổng tiền</th>
                                            <th class="action text-center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>             
                                        <?php $__currentLoopData = $list_bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                     
                                        <tr>
                                            <td><?php echo e($bill->idBill); ?></td>
                                            <td><?php echo e($bill->CustomerName); ?></td>
                                            <td><?php echo e($bill->created_at); ?></td>

                                            <td><?php echo e($bill->ReceiveDate); ?></td>            

                                            <td><?php echo e(number_format($bill->TotalBill,0,',','.')); ?>đ</td>
                                            <td class="d-flex justify-content-center">
                                                <a class="view-hover h3" href="<?php echo e(URL::to('/ordered-info/'.$bill->idBill)); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xem chi tiết"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--My Account End-->

<script>
    window.scrollBy(0,300);
    $(document).ready(function(){  
        $('body').tooltip({selector: '[data-toggle="tooltip"]'});
        $('#example').DataTable();
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\shop\customer\order-shipped.blade.php ENDPATH**/ ?>