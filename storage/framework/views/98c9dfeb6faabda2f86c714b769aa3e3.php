
<?php $__env->startSection('content'); ?>

<!--Page Banner Start-->
<div class="container" style="background-color: black; padding: 40px 0;">
    <div class="page-banner-content text-center">
        <h2 class="title" style="color: gold;">Liên Hệ</h2>
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>" style="color: gold;">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gold;">Liên hệ</li>
        </ol>
    </div>
</div>
<!--Page Banner End-->
<?php if(session('success')): ?>
    <div id="success-alert" class="alert alert-success" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1050; padding: 15px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<script>
    // Đảm bảo script này được đặt ở cuối trang hoặc trong phần footer.
    document.addEventListener("DOMContentLoaded", function () {
        const alertBox = document.getElementById('success-alert');
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.transition = "opacity 0.5s ease";
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500); // Xóa hoàn toàn khỏi DOM sau khi ẩn
            }, 2000); // Thời gian hiển thị thông báo (2 giây)
        }
    });
</script>

<!-- Form Liên Hệ Start -->
<div class="contact-form" style="margin-top: 40px; background-color: #f4f4f4; padding: 40px; max-width: 600px; margin: 40px auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h3 style="text-align: center; color: black; margin-bottom: 20px;">Liên Hệ Với Chúng Tôi</h3>
    <form action="<?php echo e(route('send.contact')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="name" style="color: black; font-weight: bold;">Họ và Tên</label>
            <input type="text" id="name" name="name" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="email" style="color: black; font-weight: bold;">Email</label>
            <input type="email" id="email" name="email" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="message" style="color: black; font-weight: bold;">Tin Nhắn</label>
            <textarea id="message" name="message" class="form-control" rows="30" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; height: 200px;" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="display: block; width: 100%; background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
            Gửi
        </button>
    </form>
</div>
<!-- Form Liên Hệ End -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\shop\about\contact.blade.php ENDPATH**/ ?>