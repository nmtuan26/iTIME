
<?php $__env->startSection('content'); ?>

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(../kidolshop/images/banner/nammoi.jpg)">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Chi tiết sản phẩm</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item">Chi tiết sản phẩm</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<?php
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Session;

    $image = json_decode($product->ImageName)[0];
    $get_time_sale = ProductController::get_sale_pd($product->idProduct);
    $SalePrice = $product->Price;
    if($get_time_sale) $SalePrice = $product->Price - ($product->Price/100) * $get_time_sale->Percent;
?>

<!--Shop Single Start-->
<div class="shop-single-page section-padding-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="shop-image">
                    <div class="shop-single-preview-image">
                        <img class="product-zoom" src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                        
                        <?php if($get_time_sale): ?> 
                            <?php if($product->QuantityTotal == '0'): ?> <span class="sticker-new label-sale">HẾT HÀNG</span>
                            <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span> <?php endif; ?>
                        <?php elseif($product->QuantityTotal == '0'): ?> <span class="sticker-new label-sale">HẾT HÀNG</span> <?php endif; ?>
                    </div>
                    <div id="gallery_01" class="shop-single-thumb-image shop-thumb-active swiper-container">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = json_decode($product->ImageName); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide single-product-thumb">
                                <a class="active" href="#" data-image="<?php echo e(asset('storage/kidoldash/images/product/'.$img)); ?>">
                                    <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$img)); ?>" alt="">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Add Arrows -->
                        <div class="swiper-thumb-next"><i class="fa fa-angle-right"></i></div>
                        <div class="swiper-thumb-prev"><i class="fa fa-angle-left"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shop-single-content">
                    <h3 class="title"><?php echo e($product->ProductName); ?></h3>
                    <span class="product-sku">Mã sản phẩm: <span><?php echo e($product->idProduct); ?></span></span>
                    <div class="text-primary">Đã Bán: <?php echo e($product->Sold); ?> sản phẩm</div>
                    <div class="text-primary">Còn Lại: <?php echo e($product->QuantityTotal); ?> sản phẩm</div>
                    <div class="text-primary">Lượt Yêu Thích: <?php echo e($count_wish); ?> </div>
                     <!--<div class="product-rating">
                        <ul class="rating-star">
                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                            <li class="rating-on"><i class="fa fa-star-o"></i></li>
                        </ul>
                        <span>No reviews</span>
                    </div> -->
                    <div class="thumb-price">
                        <?php if($SalePrice < $product->Price): ?>
                            <span class="old-price"><?php echo e(number_format($product->Price,0,',','.')); ?>đ</span>
                            <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                            <span class="discount">-<?php echo e($get_time_sale->Percent); ?>%</span>
                        <?php else: ?>
                            <span class="current-price"><?php echo e(number_format($product->Price,0,',','.')); ?>đ</span>
                        <?php endif; ?>
                    </div>
                    <div><?php echo $product->ShortDes; ?></div>

                    <div class="shop-single-material pt-3">
                        <div class="material-title col-lg-2"><?php echo e($name_attribute->AttributeName); ?>:</div>
                        <ul class="material-list">
                            <?php $__currentLoopData = $list_pd_attr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pd_attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="material-radio">
                                    <input type="radio" value="<?php echo e($pd_attr->idProAttr); ?>" class="AttrValName" name="material" id="<?php echo e($pd_attr->idProAttr); ?>" data-name="<?php echo e($pd_attr->AttrValName); ?>" data-qty="<?php echo e($pd_attr->Quantity); ?>">
                                    <label for="<?php echo e($pd_attr->idProAttr); ?>"><?php echo e($pd_attr->AttrValName); ?></label>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="mt-20 qty-of-attr-label">Còn Lại: <?php echo e($name_attribute->Quantity); ?></div>
                    <form method="POST">
                        <?php echo csrf_field(); ?>
                    <div class="product-quantity d-flex flex-wrap align-items-center pt-30">
                        <span class="quantity-title">Số Lượng: </span>
                        <div class="quantity d-flex align-items-center">
                            <button type="button" class="sub-qty"><i class="ti-minus"></i></button>
                            <input type="number" class="qty-buy" name="qty_buy" value="1" />
                            <button type="button" class="add-qty"><i class="ti-plus"></i></button>
                        </div>
                    </div>
                    
                    <input type="hidden" name="idProduct" id="idProduct" value="<?php echo e($product->idProduct); ?>">
                    <input type="hidden" name="PriceNew" id="PriceNew" value="<?php echo e(round($SalePrice,-3)); ?>">
                    <input class="qty-of-attr" name="qty_of_attr" type="hidden" value="<?php echo e($name_attribute->Quantity); ?>">

                    <input type="hidden" id="AttributeName" name="AttributeName" value="<?php echo e($name_attribute->AttributeName); ?>">
                    <input type="hidden" id="AttributeProduct" name="AttributeProduct">
                    <input type="hidden" id="idProAttr" name="idProAttr">
                    
                    <div class="text-primary alert-qty"></div>

                    <div class="product-action d-flex flex-wrap">
                        <div class="action">
                            <button type="button" class="btn btn-primary add-to-cart">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="action">
                            <a class="add-to-wishlist" data-id="<?php echo e($product->idProduct); ?>" data-tooltip="tooltip" data-placement="right" title="Thêm vào yêu thích"><i class="fa fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="text-primary alert-add-to-cart"></div>

                    <div class="dynamic-checkout-button">
                        <!-- <div class="checkout-checkbox">
                            <input type="checkbox" id="disabled">
                            <label for="disabled"><span></span> I agree with the terms and conditions </label>
                        </div> -->
                        <div class="checkout-btn">
                            <input type="submit" formaction="<?php echo e(URL::to('/buy-now')); ?>" class="btn btn-primary buy-now" value="Mua ngay"/>
                            <!-- <button type="button" class="btn btn-primary buy-now">Mua ngay</button> -->
                        </div>
                    </div>
                    <div class="text-primary alert-buy-now"></div>
                    <?php
                        $error = Session::get('error');
                        if($error){
                            echo '<div class="text-danger">'.$error.'</div>';
                            Session::put('error', null);
                        }
                    ?>    
                    </form>

                    <div class="custom-payment-options">
                        <p>Phương thức thanh toán</p>

                        <ul class="payment-options">
                            <li><img src="<?php echo e(asset('kidolshop/images/payment-icon/payment-1.svg')); ?>" alt=""></li>
                            <li><img src="<?php echo e(asset('kidolshop/images/payment-icon/payment-2.svg')); ?>" alt=""></li>
                            <li><img src="<?php echo e(asset('kidolshop/images/payment-icon/payment-3.svg')); ?>" alt=""></li>
                            <li><img src="<?php echo e(asset('kidolshop/images/payment-icon/payment-4.svg')); ?>" alt=""></li>
                            <li><img src="<?php echo e(asset('kidolshop/images/payment-icon/payment-5.svg')); ?>" alt=""></li>
                            <li><img src="<?php echo e(asset('kidolshop/images/payment-icon/payment-7.svg')); ?>" alt=""></li>
                        </ul>
                    </div>

                    <!-- <div class="social-share">
                        <span class="share-title">Share:</span>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <!--Shop Single End-->



        <!--Shop Single info Start-->
        <div class="shop-single-info">
            <div class="shop-info-tab">
                <ul class="nav justify-content-center" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Mô tả/Chi tiết</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Nhận xét</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <div class="description">
                        <p><?php echo $product->DesProduct; ?></p>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel">
                    <div class="reviews">
                        <h3 class="review-title">Customer Reviews</h3>

                        <ul class="reviews-items">
                            <li>
                                <div class="single-review">
                                    <h6 class="name">Rosie Silva</h6>
                                    <div class="rating-date">
                                        <ul class="rating">
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="date">Oct 20, 2020</span>
                                    </div>

                                    <p>Proin bibendum dolor vitae neque ornare, vel mollis est venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascet</p>
                                </div>
                            </li>
                            <li>
                                <div class="single-review">
                                    <h6 class="name">Rosie Silva</h6>
                                    <div class="rating-date">
                                        <ul class="rating">
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="date">Oct 20, 2020</span>
                                    </div>

                                    <p>Proin bibendum dolor vitae neque ornare, vel mollis est venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascet</p>
                                </div>
                            </li>
                            <li>
                                <div class="single-review">
                                    <h6 class="name">Rosie Silva</h6>
                                    <div class="rating-date">
                                        <ul class="rating">
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                            <li class="rating-on"><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="date">Oct 20, 2020</span>
                                    </div>

                                    <p>Proin bibendum dolor vitae neque ornare, vel mollis est venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascet</p>
                                </div>
                            </li>
                        </ul>

                        <div class="reviews-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Name</label>
                                            <input type="text" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Email</label>
                                            <input type="text" placeholder="john.smith@example.com">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="reviews-rating">
                                            <label>Rating</label>
                                            <ul id="rating" class="rating">
                                                <li class="star" title='Poor' data-value='1'><i class="fa fa-star-o"></i></li>
                                                <li class="star" title='Poor' data-value='2'><i class="fa fa-star-o"></i></li>
                                                <li class="star" title='Poor' data-value='3'><i class="fa fa-star-o"></i></li>
                                                <li class="star" title='Poor' data-value='4'><i class="fa fa-star-o"></i></li>
                                                <li class="star" title='Poor' data-value='5'><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <label>Body of Review (1500)</label>
                                            <textarea placeholder="Write your comments here"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <button class="btn btn-dark">Submit Review</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Shop Single End-->

<!--New Product Start-->
<?php if($list_related_product->count() > 0): ?>
<div class="new-product-area section-padding-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <div class="section-title text-center">
                    <h2 class="title">Sản Phẩm Liên Quan</h2>
                    
                </div>
            </div>
        </div>
        <div class="product-wrapper">
            <div class="swiper-container product-active">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $list_related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="single-product">
                            <div class="product-image">
                                <?php $image = json_decode($related_product->ImageName)[0];?>
                                <a href="<?php echo e(URL::to('/shop-single/'.$related_product->ProductSlug)); ?>">
                                    <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                </a>

                                <?php
                                    $SalePrice = $related_product->Price;  
                                    $get_time_sale = ProductController::get_sale_pd($related_product->idProduct); 
                                ?>

                                <?php if($get_time_sale): ?>
                                    <?php $SalePrice = $related_product->Price - ($related_product->Price/100) * $get_time_sale->Percent; ?>
                                    <div class="product-countdown">
                                        <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                    </div>
                                    <?php if($related_product->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                    <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                    <?php endif; ?>
                                <?php elseif($related_product->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                <?php endif; ?>

                                <div class="action-links">
                                    <ul>
                                        <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($related_product->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                        <li><a class="add-to-compare" data-idcat="<?php echo e($related_product->idCategory); ?>" id="<?php echo e($related_product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                        <li><a class="add-to-wishlist" data-id="<?php echo e($related_product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                        <li><a class="quick-view-pd" data-id="<?php echo e($related_product->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
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
                                <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$related_product->ProductSlug)); ?>"><?php echo e($related_product->ProductName); ?></a></h4>
                                <div class="price-box">
                                    <?php if($SalePrice < $related_product->Price): ?>
                                        <span class="old-price"><?php echo e(number_format($related_product->Price,0,',','.')); ?>đ</span>
                                        <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                    <?php else: ?>
                                        <span class="current-price"><?php echo e(number_format($related_product->Price,0,',','.')); ?>đ</span>
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
<?php endif; ?>


<div id="modal-AddToCart">
    
</div>

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

<!-- Validate QuantityBuy & Add To Cart & Buy Now -->
<script>
    $(document).ready(function(){  
        var idCustomer = '<?php echo Session::get('idCustomer'); ?>';
        var $Quantity = parseInt($('.qty-of-attr').val());
        $("input:radio[name=material]:first").attr('checked', true);
        $('#idProAttr').val($("input:radio[name=material]:first").val());

        var AttributeProduct = $('#AttributeName').val() + ': ' + $('.AttrValName').data("name");
        $('#AttributeProduct').val(AttributeProduct);

        $("input:radio[name=material]").on('click',function(){
            $(".qty-buy").val("1");
            $('.alert-qty').html("");
            $('.alert-add-to-cart').html("");
            $('.alert-buy-now').html("");
            $idAttribute = $(this).attr("id");
            $AttrValName = $(this).data("name");
            $Quantity = $(this).data("qty");
            $('.qty-of-attr-label').html("Còn Lại: " +$Quantity);
            $('.qty-of-attr').val($Quantity);
            
            AttributeProduct = $('#AttributeName').val() + ': ' + $AttrValName;
            $('#AttributeProduct').val(AttributeProduct);

            $('#idProAttr').val($("#"+$idAttribute).val());
        });

        $('.add-qty').on('click',function(){
            var $input = $(this).prev();
            var currentValue = parseInt($input.val());
            if(currentValue >= $Quantity){
                $('.alert-qty').html("Vượt quá số lượng sản phẩm hiện có!");
            }else{
                $input.val(currentValue + 1);
            }
        });

        $('.sub-qty').on('click',function(){
            var $input = $(this).next();
            var currentValue = parseInt($input.val());
            (currentValue == 1)? currentValue : $input.val(currentValue - 1);
        });

        $('.buy-now').on('click',function(e){
            if($(".qty-buy").val() > $Quantity){
                $('.alert-buy-now').html("Vượt quá số lượng sản phẩm hiện có!");
                e.preventDefault();
            }
        });

        $('.add-to-cart').on('click',function(){
            if(idCustomer == "")
            {
                window.location.href='../login';
            }else if($(".qty-buy").val() > $Quantity)
            {
                $('.alert-add-to-cart').html("Vượt quá số lượng sản phẩm hiện có!");
            }else
            {
                var idProduct = $('#idProduct').val();
                var AttributeProduct = $('#AttributeProduct').val();
                var QuantityBuy = $('.qty-buy').val();
                var PriceNew = $('#PriceNew').val();
                var _token = $('input[name="_token"]').val();
                var qty_of_attr = $('.qty-of-attr').val();
                var idProAttr = $('#idProAttr').val();

                $.ajax({
                    url: '<?php echo e(url("/add-to-cart")); ?>',
                    method: 'POST',
                    data: {idProduct:idProduct,idProAttr:idProAttr,AttributeProduct:AttributeProduct,QuantityBuy:QuantityBuy,PriceNew:PriceNew,qty_of_attr:qty_of_attr, _token:_token},
                    success:function(data){
                        $('#modal-AddToCart').html(data);
                        $('.modal-AddToCart').modal('show');
                    }
                });
            }        
        });
    });
</script>
<script>
// So sánh sản phẩm
$('.add-to-compare').on('click', function() {
    var idCategory = $(this).data('idcat');
    var idProduct = $(this).attr('id');
    var _token = $('input[name="_token"]').val();

    $.ajax({
        url: '<?php echo e(url("/modal-compare")); ?>',  // Gọi AJAX để lấy danh sách sản phẩm so sánh
        method: 'POST',
        data: {
            idCategory: idCategory,
            idProduct: idProduct,
            _token: _token
        },
        success: function(data) {
            $('#modal-Compare').html(data);  // Chèn nội dung modal vào
            $('#modal-Compare').modal('show');  // Hiển thị modal

            // Xử lý tìm kiếm trong modal
            $("#search-pd-compare").on("keyup", function() {
                var value = $(this).val();
                
                $.ajax({
                    url: '<?php echo e(url("/modal-compare-search")); ?>',
                    method: 'POST',
                    data: {
                        idCategory: idCategory,
                        idProduct: idProduct,
                        value: value,
                        _token: _token
                    },
                    success: function(data) {
                        $('.modal-compare-body').html(data);  // Cập nhật danh sách sản phẩm sau tìm kiếm
                    }
                });
            });

            // Xử lý khi người dùng tích chọn sản phẩm
            $(document).on("click", 'input[type=checkbox]', function() {
                var product_id = $(this).data("id");
                var numberOfChecked = $('input:checkbox:checked').length;

                if (numberOfChecked > 2) {
                    $('#WarningModal').modal('show');  // Hiển thị cảnh báo khi chọn quá 2 sản phẩm
                    $(this).prop('checked', false);  // Hủy chọn
                } else {
                    if ($(this).is(":checked")) {
                        // Nếu chọn sản phẩm, làm nổi bật viền ảnh và kích hoạt nút So sánh
                        $("#product-image-" + product_id).css("border", "#f379a7 3px solid");
                        $("#product-image-" + product_id).css("border-radius", "10px");
                        $(".btn-compare").css("pointer-events", "auto");
                        $(".btn-compare").css("background-color", "#f379a7");
                        $("#product-" + product_id).val(product_id);  // Lưu id sản phẩm vào hidden field
                    } else {
                        // Nếu bỏ chọn sản phẩm, làm mờ viền ảnh và hủy chọn sản phẩm
                        $("#product-image-" + product_id).css("border", "none");
                        $("#product-" + product_id).val("");
                        $(document).ready(function() {
                            var $fields = $(this).find('input[name="chk_product[]"]:checked');
                            if (!$fields.length) {
                                $(".btn-compare").css("pointer-events", "none");
                                $(".btn-compare").css("background-color", "#b9b5b5");
                            }
                        });
                    }
                }
            });

            // Khi nhấn vào nút So sánh
            $('.btn-compare').on('click', function() {
                var chk_product = $("input[name='chk_product[]']:checked").map(function() {
                    return this.value;
                }).get();  // Lấy danh sách các sản phẩm đã chọn

                if (chk_product.length < 1) {
                    alert("Vui lòng chọn ít nhất một sản phẩm để so sánh!");  // Thông báo nếu chưa chọn sản phẩm
                    return;
                }

                // Tạo URL để so sánh các sản phẩm đã chọn
                var cmp_pro = chk_product.join(',');
                window.location.href = '<?php echo e(url("compare")); ?>?product=' + idProduct + ',' + cmp_pro;
            });
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views/shop/product/shop-single.blade.php ENDPATH**/ ?>