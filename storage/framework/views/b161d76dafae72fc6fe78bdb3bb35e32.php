
<?php $__env->startSection('content'); ?>

<?php use Illuminate\Support\Facades\Session; ?>

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Đăng Ký</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home')); ?>">Trang Chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng Ký</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Register Start-->
<div class="register-page section-padding-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login-register-content">
                    <h4 class="title">Tạo Tài Khoản Mới</h4>

                    <div class="login-register-form">
                        <form method="POST" action="<?php echo e(URL::to('/submit-register')); ?>" id="form-register">
                            <?php echo csrf_field(); ?>
                            <?php
                                $message = Session::get('message');
                                $error = Session::get('error');
                                if($message){
                                    echo '<span class="text-success">'.$message.'</span>';
                                    Session::put('message', null);
                                }else if($error){
                                    echo '<span class="text-danger">'.$error.'</span>';
                                    Session::put('error', null);
                                }
                            ?>  
                            <div class="form-group mt-15">
                                <label for="username">Tên tài khoản</label>
                                <input id="username" type="email" name="username" placeholder="Nhập email của bạn" required>
                                
                            </div>
                            <div class="form-group mt-15">
                                <label for="passsword">Mật khẩu</label>
                                <input id="password" type="password" name="password">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group mt-15">
                                <label for="repassword">Xác nhận mật khẩu</label>
                                <input id="repassword" type="password" name="repassword">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group mt-15">
                                <input type="submit" class="btn btn-primary btn-block"  value="Đăng ký"/>
                            </div>
                            <div class="form-group mt-15">
                                <label>Bạn đã có tài khoản?</label>
                                <a href="<?php echo e(URL::to('/login')); ?>" class="btn btn-dark btn-block">Đăng nhập</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Register End-->

<!-- Validate form đăng ký -->
<script>
    $(document).ready(function(){  
        Validator({
            form: "#form-register",
            errorSelector: ".text-danger",
            parentSelector: ".form-group",
            rules:[
            Validator.isRequired("#username"),
            Validator.isEmail("#username"),
            Validator.isRequired("#password"),
            Validator.isRequired("#repassword"),
            Validator.isFullname('#username'),
            Validator.isPassword("#password"),
            Validator.isRePassword("#repassword",function(){
                return  document.querySelector("#form-register #password").value;
            })
            ]
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\shop\customer\register.blade.php ENDPATH**/ ?>