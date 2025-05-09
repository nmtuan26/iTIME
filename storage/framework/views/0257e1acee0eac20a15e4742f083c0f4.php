
<?php $__env->startSection('content'); ?>


<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(kidolshop/images/banner/nammoi.jpg);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Tìm Kiếm Sản Phẩm</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm sản phẩm</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<?php use App\Http\Controllers\ProductController; ?>

<!--Shop Start-->
<div class="shop-page section-padding-6">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">

                <h4><i class="icon-search"></i> Kết quả tìm kiếm cho từ khóa <span class="text-primary">'<?php echo e($keyword); ?>'</span></h4>
                <input type="hidden" id="keyword-link" value="<?php echo e($keyword); ?>">

                <!--Shop Top Bar Start-->
                <div class="shop-top-bar d-sm-flex align-items-center justify-content-between mt-3">
                    <div class="top-bar-btn">
                        <ul class="nav" role="tablist">
                            <li class="nav-item"><a class="nav-link grid active" data-toggle="tab" href="#grid" role="tab"></a></li>
                            <li class="nav-item"><a class="nav-link list" data-toggle="tab" href="#list" role="tab"></a></li>
                        </ul>
                    </div>
                    <div class="top-bar-sorter">
                        <div class="sorter-wrapper d-flex align-items-center">
                            <label>Sắp xếp theo:</label>
                            <!-- <select class="sorter wide" name="SortBy" id="SortBy">
                                <option value="&sort_by=new">Mới Nhất</option>
                                <option value="&sort_by=old">Cũ Nhất</option>
                                <option value="&sort_by=bestsellers">Bán Chạy</option>
                                <option value="&sort_by=featured">Nổi Bật</option>
                                <option value="&sort_by=sale">Đang SALE</option>
                                <option value="&sort_by=price_desc">Giá, Cao đến Thấp</option>
                                <option value="&sort_by=price_asc">Giá, Thấp đến Cao</option>
                            </select> -->
                            <div class="select-input">
                                <span class="select-input__sort"
                                    <?php
                                        if(isset($_GET['sort_by'])){
                                            echo 'data-sort=' . '&sort_by=' .$_GET['sort_by'];
                                        }else echo "data-sort='&sort_by=new'";
                                    ?>
                                >
                                    <?php
                                        if(isset($_GET['sort_by'])){
                                            if($_GET['sort_by'] == 'new') echo 'Mới Nhất';
                                            else if($_GET['sort_by'] == 'old') echo 'Cũ Nhất';
                                            else if($_GET['sort_by'] == 'bestsellers') echo 'Bán Chạy';
                                            else if($_GET['sort_by'] == 'featured') echo 'Nổi Bật';
                                            else if($_GET['sort_by'] == 'sale') echo 'Đang SALE';
                                            else if($_GET['sort_by'] == 'price_desc') echo 'Giá, Cao đến Thấp';
                                            else if($_GET['sort_by'] == 'price_asc') echo 'Giá, Thấp đến Cao';
                                        }else echo 'Mới Nhất';
                                    ?>
                                </span><i class="select-input__icon fa fa-angle-down"></i>
                                <ul class="select-input__list">
                                    <li class="select-input__item" data-sort="&sort_by=new">Mới Nhất</li>
                                    <li class="select-input__item" data-sort="&sort_by=old">Cũ Nhất</li>
                                    <li class="select-input__item" data-sort="&sort_by=bestsellers">Bán Chạy</li>
                                    <li class="select-input__item" data-sort="&sort_by=featured">Nổi Bật</li>
                                    <li class="select-input__item" data-sort="&sort_by=sale">Đang SALE</li>
                                    <li class="select-input__item" data-sort="&sort_by=price_desc">Giá, Cao đến Thấp</li>
                                    <li class="select-input__item" data-sort="&sort_by=price_asc">Giá, Thấp đến Cao</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-bar-page-amount">
                        <p>Có: <?php echo e($count_pd); ?> sản phẩm</p>
                    </div>
                </div>
                <!--Shop Top Bar End-->


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="grid" role="tabpanel">
                        <div class="row">
                            <?php $__currentLoopData = $list_pd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-product">
                                    <div class="product-image">
                                        <?php $image = json_decode($pd->ImageName)[0];?>
                                        <a href="<?php echo e(URL::to('/shop-single/'.$pd->ProductSlug)); ?>">
                                            <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                        </a>

                                        <?php
                                            $SalePrice = $pd->Price;  
                                            $get_time_sale = ProductController::get_sale_pd($pd->idProduct); 
                                        ?>

                                        <?php if($get_time_sale): ?>
                                            <?php $SalePrice = $pd->Price - ($pd->Price/100) * $get_time_sale->Percent; ?>
                                            <div class="product-countdown">
                                                <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                            </div>
                                            <?php if($pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                            <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                            <?php endif; ?>
                                        <?php elseif($pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                        <?php endif; ?>

                                        <div class="action-links">
                                            <ul>
                                                <!-- <li><a class="AddToCart-Single" data-id="<?php echo e($pd->idProduct); ?>" data-PriceNew="<?php echo e($SalePrice); ?>" data-token="<?php echo e(csrf_token()); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào giỏ hàng"><i class="icon-shopping-bag"></i></a></li> -->
                                                <li><a class="add-to-compare" data-idcat="<?php echo e($pd->idCategory); ?>" id="<?php echo e($pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                                <li><a class="add-to-wishlist" data-id="<?php echo e($pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                                <li><a class="quick-view-pd" data-id="<?php echo e($pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
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
                                        <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$pd->ProductSlug)); ?>"><?php echo e($pd->ProductName); ?></a></h4>
                                        <div class="price-box">
                                            <?php if($SalePrice < $pd->Price): ?>
                                                <span class="old-price"><?php echo e(number_format($pd->Price,0,',','.')); ?>đ</span>
                                                <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                            <?php else: ?>
                                                <span class="current-price"><?php echo e(number_format($pd->Price,0,',','.')); ?>đ</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        <?php $__currentLoopData = $list_pd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-product product-list">
                            <div class="product-image">
                                <?php $image = json_decode($pd->ImageName)[0];?>
                                <a href="<?php echo e(URL::to('/shop-single/'.$pd->ProductSlug)); ?>">
                                    <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                </a>

                                <?php
                                    $SalePrice = $pd->Price;  
                                    $get_time_sale = ProductController::get_sale_pd($pd->idProduct); 
                                ?>

                                <?php if($get_time_sale): ?>
                                    <?php $SalePrice = $pd->Price - ($pd->Price/100) * $get_time_sale->Percent; ?>
                                    <div class="product-countdown">
                                        <div data-countdown="<?php echo e($get_time_sale->SaleEnd); ?>"></div>
                                    </div>
                                    <?php if($pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                    <?php else: ?> <span class="sticker-new label-sale">-<?php echo e($get_time_sale->Percent); ?>%</span>
                                    <?php endif; ?>
                                <?php elseif($pd->QuantityTotal == '0'): ?> <span class="sticker-new soldout-title">Hết hàng</span>
                                <?php endif; ?>

                                <div class="action-links">
                                    <ul>
                                        <li><a class="quick-view-pd" data-id="<?php echo e($pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Xem nhanh"><i class="icon-eye"></i></a></li> 
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <!-- <ul class="rating">
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                    <li class="rating-on"><i class="fa fa-star-o"></i></li>
                                </ul> -->
                                <h4 class="product-name"><a href="<?php echo e(URL::to('/shop-single/'.$pd->ProductSlug)); ?>"><?php echo e($pd->ProductName); ?></a></h4>
                                <div class="price-box">
                                    <?php if($SalePrice < $pd->Price): ?>
                                        <span class="old-price"><?php echo e(number_format($pd->Price,0,',','.')); ?>đ</span>
                                        <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                    <?php else: ?>
                                        <span class="current-price"><?php echo e(number_format($pd->Price,0,',','.')); ?>đ</span>
                                    <?php endif; ?>
                                </div>
                                <p><?php echo $pd->ShortDes; ?></p>

                                <ul class="action-links">
                                    <!-- <li><a href="javascript:void(0);" class="add-cart" data-tooltip="tooltip" data-placement="top" title="Add to cart"> Add to cart </a></li> -->
                                    <li><a class="add-to-wishlist" data-id="<?php echo e($pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="Thêm vào danh sách yêu thích"><i class="icon-heart"></i></a></li>
                                    <li><a class="add-to-compare" data-idcat="<?php echo e($pd->idCategory); ?>" id="<?php echo e($pd->idProduct); ?>" data-tooltip="tooltip" data-placement="left" title="So sánh"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>


                <!--Pagination Start-->
                <div class="page-pagination">
                    <?php echo e($list_pd->appends(request()->input())->links()); ?>

                </div>
                <!--Pagination End-->


            </div>
            <div class="col-lg-3">
                <div class="shop-sidebar">

                    <h4><i class="fa fa-filter"></i> BỘ LỌC TÌM KIẾM</h4>

                    <!--Sidebar Categories Start-->
                    <div class="sidebar-categories">
                        <h3 class="widget-title">Theo danh mục</h3>

                       

                        <ul class="categories-list">
                            <?php $__currentLoopData = $list_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="d-flex align-items-center">
                                <input 
                                <?php 
                                    if(isset($_GET['category'])){
                                        $idCategory = $_GET['category'];
                                        $category_arr = explode(",",$idCategory);
                                        
                                        if(in_array($category->idCategory, $category_arr)) echo 'checked';
                                        else echo '';
                                    } 
                                ?> 
                                class="filter-product" type="checkbox" id="cat-<?php echo e($category->idCategory); ?>" data-filter="category" value="<?php echo e($category->idCategory); ?>" name="category-filter" style="width:15px;height:15px;">
                                <label class="mb-0 ml-2" for="cat-<?php echo e($category->idCategory); ?>" style="font-size:15px;cursor:pointer;"><span style="position:relative; top:2px;"><?php echo e($category->CategoryName); ?></span></label>
                                <span style="margin-left:auto">(<?php echo e(App\Http\Controllers\CustomerController::count_cat_search($category->idCategory)); ?>)</span>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!--Sidebar Categories End-->

                    <!--Sidebar Categories Start-->
                    <div class="sidebar-categories">
                        <h3 class="widget-title">Theo thương hiệu</h3>

                        <ul class="categories-list">
                        <?php $__currentLoopData = $list_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="d-flex align-items-center">
                                <input 
                                <?php 
                                    if(isset($_GET['brand'])){
                                        $idBrand = $_GET['brand'];
                                        $brand_arr = explode(",",$idBrand);
                                        
                                        if(in_array($brand->idBrand, $brand_arr)) echo 'checked';
                                        else echo '';
                                    } 
                                ?> 
                                class="filter-product" type="checkbox" id="brand-<?php echo e($brand->idBrand); ?>" data-filter="brand" value="<?php echo e($brand->idBrand); ?>" name="brand-filter" style="width:15px;height:15px;">
                                <label class="mb-0 ml-2" for="brand-<?php echo e($brand->idBrand); ?>" style="font-size:15px;cursor:pointer;"><span style="position:relative; top:2px;"><?php echo e($brand->BrandName); ?></span></label>
                                <span style="margin-left:auto">(<?php echo e(App\Http\Controllers\CustomerController::count_brand_search($brand->idBrand)); ?>)</span>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <div class="sidebar-categories">
                        <h3 class="widget-title">Theo giá</h3>
                        <div class="d-flex justify-content-between">
                            <input class="input-filter-price min" type="number" min="0" maxlength="13" placeholder="đ TỪ" onkeypress="return /[0-9]/i.test(event.key)"
                                <?php
                                    if(isset($_GET['priceMin'])){
                                        echo "value=" .$_GET['priceMin'];
                                    }
                                ?>
                            >
                            <span style="line-height: 240%;"> - </span>
                            <input class="input-filter-price max" type="number" min="0" maxlength="13" placeholder="đ ĐẾN" onkeypress="return /[0-9]/i.test(event.key)"
                                <?php
                                    if(isset($_GET['priceMax'])){
                                        echo "value=" .$_GET['priceMax'];
                                    }
                                ?>
                            >
                        </div>
                        <div class="alert-filter-price text-primary mt-2 d-none">Vui lòng điền khoảng giá phù hợp</div>
                        <button type="button" class="btn-filter-price btn btn-primary">Áp dụng</button>
                    </div>
                    <!--Sidebar Categories End-->

                    <!--Sidebar Color Start-->
                    <!-- <div class="sidebar-color">
                        <h3 class="widget-title">Color</h3>

                        <ul class="color-list">
                            <li class="active"> <span data-color="#ff0000"></span> Red</li>
                            <li> <span data-color="#008000"></span> Green</li>
                            <li> <span data-color="#0000ff"></span> Blue</li>
                            <li> <span data-color="#ffff00"></span> Yellow</li>
                            <li> <span data-color="#ffffff"></span> White</li>
                            <li> <span data-color="#ffd700"></span> Gold</li>
                        </ul>
                    </div> -->
                    <!--Sidebar Color End-->

                    <!--Sidebar Size Start-->
                    <!-- <div class="sidebar-size">
                        <h3 class="widget-title">Size</h3>

                        <ul class="size-list">
                            <li><a href="javascript:void(0)">S</a></li>
                            <li><a href="javascript:void(0)">M</a></li>
                            <li><a href="javascript:void(0)">L</a></li>
                            <li><a href="javascript:void(0)">Xl</a></li>
                            <li><a href="javascript:void(0)">XXl</a></li>
                        </ul>
                    </div> -->
                    <!--Sidebar Size End-->

                    <!--Sidebar Size Start-->
                    <div class="sidebar-banner">
                        <a href="#"><img src="kidolshop/images/banner-top-pd.png" alt=""></a>
                    </div>
                    <!--Sidebar Size End-->


                    <!--Sidebar Product Start-->
                    <div class="sidebar-product">
                        <h3 class="widget-title">Top sản phẩm bán chạy</h3>

                        <ul class="product-list">
                            <?php $__currentLoopData = $top_bestsellers_pd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $top_pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="single-mini-product">
                                    <div class="product-image">
                                        <?php $image = json_decode($top_pd->ImageName)[0];?>
                                        <a href="<?php echo e(URL::to('/shop-single/'.$top_pd->ProductSlug)); ?>">
                                            <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h4 class="title"><a class="two-line" href="<?php echo e(URL::to('/shop-single/'.$top_pd->ProductSlug)); ?>"><?php echo e($top_pd->ProductName); ?></a></h4>
                                        <span class="text-primary h6">Đã bán: <?php echo e($top_pd->Sold); ?></span>
                                        <?php
                                            $SalePrice = $top_pd->Price;  
                                            $get_time_sale = ProductController::get_sale_pd($top_pd->idProduct); 
                                            if($get_time_sale) $SalePrice = $top_pd->Price - ($top_pd->Price/100) * $get_time_sale->Percent;
                                        ?>
                                        <div class="price-box">
                                            <?php if($SalePrice < $top_pd->Price): ?>
                                                <span class="old-price"><?php echo e(number_format($top_pd->Price,0,',','.')); ?>đ</span>
                                                <span class="current-price"><?php echo e(number_format(round($SalePrice,-3),0,',','.')); ?>đ</span>
                                            <?php else: ?>
                                                <span class="current-price"><?php echo e(number_format($top_pd->Price,0,',','.')); ?>đ</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!--Sidebar Product End-->



                    <!--Sidebar Tags Start-->
                    <!-- <div class="sidebar-tags">
                        <h3 class="widget-title">Tags</h3>

                        <ul class="tags-list">
                            <li><a href="#">black</a></li>
                            <li><a href="#">blue</a></li>
                            <li><a href="#">fiber</a></li>
                            <li><a href="#">gold</a></li>
                            <li><a href="#">gray</a></li>
                            <li><a href="#">green</a></li>
                            <li><a href="#">I</a></li>
                            <li><a href="#">leather</a></li>
                        </ul>
                    </div> -->
                    <!--Sidebar Tags End-->


                </div>
            </div>
        </div>
    </div>
</div>
<!--Shop End-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views/shop/search.blade.php ENDPATH**/ ?>