
<?php $__env->startSection('content'); ?>

<?php use App\Http\Controllers\ProductController; ?>
<!--Slider Start-->
<div class="slider-area">
    <div class="swiper-container slider-active">
        <div class="swiper-wrapper">
            <!--Single Slider Start-->
            <div class="single-slider swiper-slide animation-style-01" style="background-image: url('kidolshop/images/slider/dong1.jpg');">
                <div class="container">
                    <div class="slider-content">
                    <h5 class="sub-title" style="color: #FFD700;">Nhập: <span style="color: #FF0000;">SALE100K</span> <br> Giảm 100K cho mọi đơn hàng</h5>
<h2 class="main-title" style="color: #FFD700;">Ngày đặc biệt!</h2>
<p style="color: #FFD700;">Nhập: <span style="color: #FF0000;">SALE10</span> để được giảm 10%, số lượng có hạn!</p>


                        <ul class="slider-btn">
                            <li><a href="<?php echo e(URL::to('/store')); ?>" class="btn btn-round btn-primary">Bắt đầu mua sắm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Single Slider End-->

            <!--Single Slider Start-->
            <div class="single-slider swiper-slide animation-style-01" style="background-image: url('kidolshop/images/slider/KIDOLBanner2.png');">
                <div class="container" style="text-align:right;">
                    <div class="slider-content">
                        <h5 class="sub-title sub-title-right">Nhập: <span class="text-info">SALE100K</span> <br> Giảm 100K cho mọi đơn hàng</h5>
                        <h2 class="main-title">Ngày đặc biệt!</h2>
                        <p>Nhập: <span class="text-info">SALE10</span> để được giảm 10%, số lượng có hạn!</p>

                        <ul class="slider-btn">
                            <li><a href="<?php echo e(URL::to('/store')); ?>" class="btn btn-round btn-primary">Bắt đầu mua sắm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Single Slider End-->
        </div>
        <!--Swiper Wrapper End-->

        <!-- Add Arrows -->
        <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
        <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

    </div>
    <!--Swiper Container End-->
</div>
<!--Slider End-->



<!--Shipping Start-->
<div class="shipping-area section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping">
                    <div class="shipping-icon">
                        <img src="kidolshop/images/shipping-icon/Free-Delivery.png" alt="">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Miễn Phí Vận Chuyển</h5>
                        <p>Giao hàng miễn phí cho tất cả các đơn đặt hàng trên 1.000.000đ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping">
                    <div class="shipping-icon">
                        <img src="kidolshop/images/shipping-icon/Online-Order.png" alt="">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Đặt Hàng Online</h5>
                        <p>Đừng lo lắng, bạn có thể đặt hàng Trực tuyến trên Trang web của chúng tôi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping">
                    <div class="shipping-icon">
                        <img src="kidolshop/images/shipping-icon/Freshness.png" alt="">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Hiện Đại</h5>
                        <p>Cập nhật những sản phẩm mới nhất</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping">
                    <div class="shipping-icon">
                        <img src="kidolshop/images/shipping-icon/Made-By-Artists.png" alt="">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Hỗ Trợ 24/7</h5>
                        <p>Đội ngũ hỗ trợ trưc tuyến chuyên nghiệp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Shipping End-->


<!--Recommend Product Start-->
<div class="new-product-area section-padding-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <div class="section-title text-center">
                    <h2 class="title">Gợi Ý Cho Bạn</h2>
                </div>
            </div>
        </div>
        <div class="product-wrapper">
            <div class="swiper-container product-active">
                <div class="swiper-wrapper">
                    <?php 
                        if(Illuminate\Support\Facades\Session::get('idCustomer') == '') $idCustomer = session()->getId();
                        else $idCustomer = Illuminate\Support\Facades\Session::get('idCustomer');
                    ?>
                    <?php if(App\Models\Viewer::where('idCustomer',$idCustomer)->count() != 0): ?>
                        <?php $id_pds = json_decode($recommend_pds); ?>
                        <?php $__currentLoopData = $id_pds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $id_pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $product = App\Http\Controllers\CartController::get_product($id_pd); ?>
                        <div class="swiper-slide">
                            <div class="single-product">
                                <div class="product-image">
                                    <?php $image = json_decode($product->ImageName)[0];?>
                                    <a href="<?php echo e(URL::to('/shop-single/'.$product->ProductSlug)); ?>">
                                        <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                    </a>

                                    <?php
                                        $SalePrice = $product->Price;  
                                        $get_time_sale = ProductController::get_sale_pd($product->idProduct); 
                                    ?>

                                    <?php if($get_time_sale): ?>
                                        <?php $SalePrice = $product->Price - ($product->Price/100) * $get_time_sale->Percent; ?>
                                        <div class="product-countdown">
                                            <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                        </div>
                                        <?php if($product->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                        <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                        <?php endif; ?>
                                    <?php elseif($product->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                    <?php endif; ?>

                                    <div class="action-links">
                                        <ul>
                                            <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($product->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                            <li><a class="add-to-compare" data-idcat="<?php echo e($product->idCategory); ?>" id="<?php echo e($product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                            <li><a class="add-to-wishlist" data-id="<?php echo e($product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                            <li><a class="quick-view-pd" data-id="<?php echo e($product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <!-- <ul class="rating">
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    </ul> -->
                                    <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$product->ProductSlug)); ?>"><?php echo e($product->ProductName); ?></a></h4>
                                    <div class="price-box">
                                        <?php if($SalePrice < $product->Price): ?>
                                            <span class="old-price"><?php echo e(number_format($product->Price,0,',','.')); ?>đ</span>
                                            <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                        <?php else: ?>
                                            <span class="current-price"><?php echo e(number_format($product->Price,0,',','.')); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $recommend_pds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="single-product">
                                <div class="product-image">
                                    <?php $image = json_decode($product->ImageName)[0];?>
                                    <a href="<?php echo e(URL::to('/shop-single/'.$product->ProductSlug)); ?>">
                                        <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                    </a>

                                    <?php
                                        $SalePrice = $product->Price;  
                                        $get_time_sale = ProductController::get_sale_pd($product->idProduct); 
                                    ?>

                                    <?php if($get_time_sale): ?>
                                        <?php $SalePrice = $product->Price - ($product->Price/100) * $get_time_sale->Percent; ?>
                                        <div class="product-countdown">
                                            <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                        </div>
                                        <?php if($product->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                        <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                        <?php endif; ?>
                                    <?php elseif($product->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                    <?php endif; ?>

                                    <div class="action-links">
                                        <ul>
                                            <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($product->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                            <li><a class="add-to-compare" data-idcat="<?php echo e($product->idCategory); ?>" id="<?php echo e($product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                            <li><a class="add-to-wishlist" data-id="<?php echo e($product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                            <li><a class="quick-view-pd" data-id="<?php echo e($product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <!-- <ul class="rating">
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    </ul> -->
                                    <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$product->ProductSlug)); ?>"><?php echo e($product->ProductName); ?></a></h4>
                                    <div class="price-box">
                                        <?php if($SalePrice < $product->Price): ?>
                                            <span class="old-price"><?php echo e(number_format($product->Price,0,',','.')); ?>đ</span>
                                            <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                        <?php else: ?>
                                            <span class="current-price"><?php echo e(number_format($product->Price,0,',','.')); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <!-- Add Arrows -->
                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
            </div>
        </div>
    </div>
</div>
<!--Recommend Product End-->


<!--New Product Start-->
<div class="new-product-area section-padding-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <div class="section-title text-center">
                    <h2 class="title">Sản Phẩm Mới</h2>
                </div>
            </div>
        </div>
        <div class="product-wrapper">
            <div class="swiper-container product-active">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $list_new_pd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $new_pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="single-product">
                            <div class="product-image">
                                <?php $image = json_decode($new_pd->ImageName)[0];?>
                                <a href="<?php echo e(URL::to('/shop-single/'.$new_pd->ProductSlug)); ?>">
                                    <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                </a>

                                <?php
                                    $SalePrice = $new_pd->Price;  
                                    $get_time_sale = ProductController::get_sale_pd($new_pd->idProduct); 
                                ?>

                                <?php if($get_time_sale): ?>
                                    <?php $SalePrice = $new_pd->Price - ($new_pd->Price/100) * $get_time_sale->Percent; ?>
                                    <div class="product-countdown">
                                        <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                    </div>
                                    <?php if($new_pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                    <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                    <?php endif; ?>
                                <?php elseif($new_pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                <?php endif; ?>

                                <div class="action-links">
                                    <ul>
                                        <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($new_pd->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                        <li><a class="add-to-compare" data-idcat="<?php echo e($new_pd->idCategory); ?>" id="<?php echo e($new_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                        <li><a class="add-to-wishlist" data-id="<?php echo e($new_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                        <li><a class="quick-view-pd" data-id="<?php echo e($new_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <!-- <ul class="rating">
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                </ul> -->
                                <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$new_pd->ProductSlug)); ?>"><?php echo e($new_pd->ProductName); ?></a></h4>
                                <div class="price-box">
                                    <?php if($SalePrice < $new_pd->Price): ?>
                                        <span class="old-price"><?php echo e(number_format($new_pd->Price,0,',','.')); ?>đ</span>
                                        <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                    <?php else: ?>
                                        <span class="current-price"><?php echo e(number_format($new_pd->Price,0,',','.')); ?>đ</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Add Arrows -->
                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
            </div>
        </div>
    </div>
</div>
<!--New Product End-->

<!--About Start-->
<div class="about-area section-padding-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="kidolshop/images/banner/daugia.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <h2 class="title">Cùng Itime đấu giá liền tay với nhiều ưu đãi </h2>
                    <p>Các mã giảm giá hiện có trên cửa hàng:</p>
                    <ul>
                        <li> SALE100K: Giảm 100K trên tổng giá trị đơn hàng. </li>
                        <li> SALE10: Giảm 10% trên tổng giá trị đơn hàng. </li>
                    </ul>
                    <div class="about-btn">
                        <a href="<?php echo e(URL::to('/store')); ?>" class="btn btn-primary btn-round">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--About End-->



<!--New Product Start-->
<div class="features-product-area section-padding-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <div class="section-title text-center">
                    <h2 class="title">Sản Phẩm</h2>
                </div>
            </div>
        </div>
        <div class="product-wrapper">
            <div class="product-tab-menu">
                <ul class="nav justify-content-center" role="tablist">
                    <li>
                        <a class="active" data-toggle="tab" href="#tab3" role="tab">Bán chạy</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab2" role="tab">Nổi bật</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab1" role="tab">Đang Sale</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content product-items-tab">
                <div class="tab-pane fade show active" id="tab3" role="tabpanel">
                    <div class="swiper-container product-active">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $list_bestsellers_pd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bestsellers_pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="single-product">
                                    <div class="product-image">
                                        <?php $image = json_decode($bestsellers_pd->ImageName)[0];?>
                                        <a href="<?php echo e(URL::to('/shop-single/'.$bestsellers_pd->ProductSlug)); ?>">
                                            <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                        </a>

                                        <?php
                                            $SalePrice = $bestsellers_pd->Price;  
                                            $get_time_sale = ProductController::get_sale_pd($bestsellers_pd->idProduct); 
                                        ?>

                                        <?php if($get_time_sale): ?>
                                            <?php $SalePrice = $bestsellers_pd->Price - ($bestsellers_pd->Price/100) * $get_time_sale->Percent; ?>
                                            <div class="product-countdown">
                                                <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                            </div>
                                            <?php if($bestsellers_pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                            <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                            <?php endif; ?>
                                        <?php elseif($bestsellers_pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                        <?php endif; ?>

                                        <div class="action-links">
                                            <ul>
                                                <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($bestsellers_pd->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                                <li><a class="add-to-compare" data-idcat="<?php echo e($bestsellers_pd->idCategory); ?>" id="<?php echo e($bestsellers_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                                <li><a class="add-to-wishlist" data-id="<?php echo e($bestsellers_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                                <li><a class="quick-view-pd" data-id="<?php echo e($bestsellers_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <!-- <ul class="rating">
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        </ul> -->
                                        <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$bestsellers_pd->ProductSlug)); ?>"><?php echo e($bestsellers_pd->ProductName); ?></a></h4>
                                        <div class="price-box">
                                            <?php if($SalePrice < $bestsellers_pd->Price): ?>
                                                <span class="old-price"><?php echo e(number_format($bestsellers_pd->Price,0,',','.')); ?>đ</span>
                                                <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                            <?php else: ?>
                                                <span class="current-price"><?php echo e(number_format($bestsellers_pd->Price,0,',','.')); ?>đ</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Add Arrows -->
                        <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                        <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel">
                    <div class="swiper-container product-active">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $list_featured_pd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $featured_pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="single-product">
                                    <div class="product-image">
                                        <?php $image = json_decode($featured_pd->ImageName)[0];?>
                                        <a href="<?php echo e(URL::to('/shop-single/'.$featured_pd->ProductSlug)); ?>">
                                            <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                        </a>

                                        <?php
                                            $SalePrice = $featured_pd->Price;  
                                            $get_time_sale = ProductController::get_sale_pd($featured_pd->idProduct); 
                                        ?>

                                        <?php if($get_time_sale): ?>
                                            <?php $SalePrice = $featured_pd->Price - ($featured_pd->Price/100) * $get_time_sale->Percent; ?>
                                            <div class="product-countdown">
                                                <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                            </div>
                                            <?php if($featured_pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                            <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                            <?php endif; ?>
                                        <?php elseif($featured_pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                        <?php endif; ?>

                                        <div class="action-links">
                                            <ul>
                                                <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($featured_pd->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                                <li><a class="add-to-compare" data-idcat="<?php echo e($featured_pd->idCategory); ?>" id="<?php echo e($featured_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                                <li><a class="add-to-wishlist" data-id="<?php echo e($featured_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                                <li><a class="quick-view-pd" data-id="<?php echo e($featured_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <!-- <ul class="rating">
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        </ul> -->
                                        <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$featured_pd->ProductSlug)); ?>"><?php echo e($featured_pd->ProductName); ?></a></h4>
                                        <div class="price-box">
                                            <?php if($SalePrice < $featured_pd->Price): ?>
                                                <span class="old-price"><?php echo e(number_format($featured_pd->Price,0,',','.')); ?>đ</span>
                                                <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                            <?php else: ?>
                                                <span class="current-price"><?php echo e(number_format($featured_pd->Price,0,',','.')); ?>đ</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Add Arrows -->
                        <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                        <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab1" role="tabpanel">
                    <div class="swiper-container product-active">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $list_featured_pd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $featured_pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $SalePrice = $featured_pd->Price;  
                                $get_time_sale = ProductController::get_sale_pd($featured_pd->idProduct); 
                            ?>
                            <?php if($get_time_sale): ?>
                            <div class="swiper-slide">
                                <div class="single-product">
                                    <div class="product-image">
                                        <?php $image = json_decode($featured_pd->ImageName)[0];?>
                                        <a href="<?php echo e(URL::to('/shop-single/'.$featured_pd->ProductSlug)); ?>">
                                            <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                        </a>

                                        <?php $SalePrice = $featured_pd->Price - ($featured_pd->Price/100) * $get_time_sale->Percent; ?>
                                        <div class="product-countdown">
                                            <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                        </div>
                                        <?php if($featured_pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                        <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                        <?php endif; ?>

                                        <div class="action-links">
                                            <ul>
                                                <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($featured_pd->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                                <li><a class="add-to-compare" data-idcat="<?php echo e($featured_pd->idCategory); ?>" id="<?php echo e($featured_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                                <li><a class="add-to-wishlist" data-id="<?php echo e($featured_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                                <li><a class="quick-view-pd" data-id="<?php echo e($featured_pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <!-- <ul class="rating">
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                        </ul> -->
                                        <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$featured_pd->ProductSlug)); ?>"><?php echo e($featured_pd->ProductName); ?></a></h4>
                                        <div class="price-box">
                                            <?php if($SalePrice < $featured_pd->Price): ?>
                                                <span class="old-price"><?php echo e(number_format($featured_pd->Price,0,',','.')); ?>đ</span>
                                                <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                            <?php else: ?>
                                                <span class="current-price"><?php echo e(number_format($featured_pd->Price,0,',','.')); ?>đ</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Add Arrows -->
                        <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                        <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--New Product End-->



<!--Testimonial Start-->
<!-- <div class="testimonial-area" style="background-image: url(kidolshop/images/testimonial-bg.jpg);">
    <div class="container">
        <div class="swiper-container testimonial-active">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="single-testimonial text-center">
                        <p>Felis eu pede mollis pretium. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus lingua. felis eu pede mollis pretium.</p>

                        <div class="testimonial-author">
                            <img src="kidolshop/images/testimonial-img-1.png" alt="">
                            <span class="author-name">Torvi / COO</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="single-testimonial text-center">
                        <p>Felis eu pede mollis pretium. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus lingua. felis eu pede mollis pretium.</p>

                        <div class="testimonial-author">
                            <img src="kidolshop/images/testimonial-img-2.png" alt="">
                            <span class="author-name">Shara / Founder</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Arrows -->
            <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
            <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
        </div>
    </div>
</div> -->
<!--Testimonial End-->



<!--Experts Start-->
<!-- <div class="experts-area section-padding-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <div class="section-title text-center">
                    <h2 class="title">Flower Experts</h2>
                    <p>A perfect blend of creativity, energy, communication, happiness and love. Let us arrange a smile for you.</p>
                </div>
            </div>
        </div>
        <div class="expert-wrapper">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-expert text-center">
                        <div class="expert-image">
                            <img src="kidolshop/images/experts/team-1.jpg" alt="">
                        </div>
                        <div class="expert-content">
                            <h4 class="name">Marcos Alonso</h4>
                            <p>Biologist</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-expert text-center">
                        <div class="expert-image">
                            <img src="kidolshop/images/experts/team-2.jpg" alt="">
                        </div>
                        <div class="expert-content">
                            <h4 class="name">Shara friken</h4>
                            <p>Photographer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-expert text-center">
                        <div class="expert-image">
                            <img src="kidolshop/images/experts/team-3.jpg" alt="">
                        </div>
                        <div class="expert-content">
                            <h4 class="name">Torvi greac</h4>
                            <p>Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-expert text-center">
                        <div class="expert-image">
                            <img src="kidolshop/images/experts/team-4.jpg" alt="">
                        </div>
                        <div class="expert-content">
                            <h4 class="name">Alonso Gomej</h4>
                            <p>Florist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--Experts End-->



<!--Blog Start-->
<div class="blog-area blog-bg section-padding-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <div class="section-title text-center">
                    <h2 class="title">Bài Viết Của Chúng Tôi</h2>
                </div>
            </div>
        </div>
        <div class="blog-wrapper mt-30">
            <div class="swiper-container blog-active">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $list_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="<?php echo e(URL::to('/blog/'.$blog->BlogSlug)); ?>"><img src="<?php echo e(asset('storage/kidoldash/images/blog/'.$blog->BlogImage)); ?>" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h4 class="title"><a href="<?php echo e(URL::to('/blog/'.$blog->BlogSlug)); ?>"><?php echo e($blog->BlogTitle); ?></a></h4>
                                <div class="articles-date">
                                    <p><span><?php echo e($blog->created_at); ?></span></p>
                                </div>
                                <div class="four-line mb-4"><?php echo $blog->BlogDesc; ?></div>

                                <div class="blog-footer">
                                    <a class="more" href="<?php echo e(URL::to('/blog/'.$blog->BlogSlug)); ?>">Tìm hiểu thêm</a>
                                    <!-- <p class="comment-count"><i class="icon-message-circle"></i> 0</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Add Arrows -->
                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
            </div>
        </div>
    </div>
</div>
<!--Blog End-->

<!--Newsletter Start-->
<!-- <div class="newsletter-area section-padding-5">
    <div class="container">
        <div class="newsletter-form">
            <div class="section-title text-center">
                <h2 class="title">Join The Colorful Bunch!</h2>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Your email address">
                <button>Subscribe</button>
                <i class="icon-mail"></i>
            </div>
        </div>
    </div>
</div> -->
<!--Newsletter End-->
<!--Brand Start-->
<div class="brand-area">
    <div class="container">
        <div class="brand-active swiper-container">
            <div class="swiper-wrapper">
                <div class="single-brand swiper-slide">
                    <img src="<?php echo e(asset('kidolshop/images/brand/omega.png')); ?>" alt="">
                </div>
                <div class="single-brand swiper-slide">
                    <img src="<?php echo e(asset('kidolshop/images/brand/hublot.png')); ?>" alt="">
                </div>
                <div class="single-brand swiper-slide">
                    <img src="<?php echo e(asset('kidolshop/images/brand/longgin.png')); ?>" alt="">
                </div>
                <div class="single-brand swiper-slide">
                    <img src="<?php echo e(asset('kidolshop/images/brand/tissot.png')); ?>" alt="">
                </div>
                <div class="single-brand swiper-slide">
                    <img src="<?php echo e(asset('kidolshop/images/brand/casio.png')); ?>" alt="">
                </div>
                <div class="single-brand swiper-slide">
                    <img src="<?php echo e(asset('kidolshop/images/brand/orien.png')); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!--Brand End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\shop\home.blade.php ENDPATH**/ ?>