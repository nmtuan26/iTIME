
<?php $__env->startSection('content_dash'); ?>

<?php use Illuminate\Support\Facades\Session; ?>

<div class="content-page">
    <div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Chỉnh Sửa Nhóm Phân Loại</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(URL::to('/submit-edit-attribute/'.$select_attribute->idAttribute)); ?>" method="POST" data-toggle="validator">
                        <?php echo csrf_field(); ?>
                        <div class="row"> 
                            <div class="col-md-12">
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
                                <div class="form-group">
                                    <label>Tên nhóm phân loại</label>
                                    <input type="text" name="AttributeName" class="form-control" value="<?php echo e($select_attribute->AttributeName); ?>" placeholder="Nhập tên nhóm phân loại" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>    
                        </div>                             
                        <input type="submit" class="btn btn-primary mr-2" value="Sửa nhóm phân loại">
                        <a href="<?php echo e(URL::to('/manage-attribute')); ?>" class="btn btn-light mr-2">Trở Về</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\admin\product\product-attribute\attribute\edit-attribute.blade.php ENDPATH**/ ?>