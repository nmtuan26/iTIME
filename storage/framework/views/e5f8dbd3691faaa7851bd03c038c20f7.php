

<?php $__env->startSection('content'); ?>

<!--Page Banner Start-->
<div class="container" style="background-color: black; padding: 40px 0;">
    <div class="page-banner-content text-center">
        <h2 class="title" style="color: gold;">Về Chúng Tôi</h2>
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>" style="color: gold;">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gold;">Về chúng tôi</li>
        </ol>
    </div>
</div>
<!--Page Banner End-->


<!-- Introduction Section Start -->
<div class="about-introduction section-padding-5">
    <div class="container">
        <h3 class="title">iTIME – Tinh Hoa Hội Tụ</h3>
        <p>
            iTIME được thành lập từ năm 2013, thời điểm ban đầu, chúng tôi chập chững bước đi với hình thức bán online nhỏ lẻ, xuất phát từ các thương hiệu Nhật Bản, Thụy Sĩ bình dân… Địa điểm giao dịch trực tiếp cho anh em chủ yếu tại nhà, trụ sở cơ quan hoặc các quán cafe, trà đá vỉa hè… quanh khu vực Hà Nội. Mặc dù khởi đầu đầy khó khăn nhưng iTIME đã giúp hàng ngàn khách hàng lựa chọn được cho mình những mẫu đồng hồ ưng ý, góp phần tạo nên phong cách sống tự tin, thành đạt cho anh em khắp cả nước.
        </p>
        <!-- Add image here -->
        <img src="<?php echo e(asset('kidolshop/images/gt1.jpg')); ?>" alt="Intro Image 1" class="img-fluid mb-4">

        <p>
            Trải qua những thăng trầm thách thức gian nan, cùng với sự tin yêu và nhiệt tình ủng hộ của anh em đam mê đồng hồ trên mọi miền Tổ Quốc và nhằm giúp khách hàng có một không gian đẹp, sang trọng hơn để thỏa mãn niềm đam mê đồng hồ, năm 2015 iTIME chính thức khai trương Showroom tọa lạc tại trung tâm Khu Đô Thị Sóc Sơn, Hà Nội. Ngày khai trương rất vui khi có sự góp mặt của gia đình, bạn bè, khách hàng thân thiết và anh em đối tác lớn trên địa bàn Thủ đô.
        </p>
        <!-- Add another image here -->
        <img src="<?php echo e(asset('kidolshop/images/gt2.jpg')); ?>" alt="Intro Image 2" class="img-fluid mb-4">

        <p>
            Đến nay, cùng với sự tận tụy, tận tâm, chu đáo, nhiệt tình với khách hàng và nhiều năm kinh nghiệm, chúng tôi có thể hoàn toàn tự hào khi trở thành một địa chỉ tin cậy của anh em đam mê cỗ máy thời gian trên mọi miền Tổ Quốc. iTIME trở thành cầu nối giữa người mua, người chơi đến với những chiếc đồng hồ yêu thích, những chiếc đồng hồ chính hãng.
        </p>
        <!-- Add final image here -->
        <img src="<?php echo e(asset('kidolshop/images/gt3.jpg')); ?>" alt="Intro Image 3" class="img-fluid mb-4">
        <p>
        iTIME- Tinh hoa hội tụ, nơi sẽ hội tụ những sản phẩm chính hãng, chế độ bảo hành hậu mãi dài lâu cùng mức giá cạnh tranh cho quý khách hàng!

    </p>
    <p>Cám ơn quý khách hàng đã quan tâm và ủng hộ dịch vụ của iTIME. Hy vọng iTIME được Phục vụ quý khách hàng trong tương lai gần!</p>
    </div>
</div>
<!-- Introduction Section End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views/shop/about/about.blade.php ENDPATH**/ ?>