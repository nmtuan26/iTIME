
<?php $__env->startSection('content_dash'); ?>

<?php use Illuminate\Support\Facades\Session; ?>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Danh Mục ( Tổng: <?php echo e($count_category); ?> danh mục )</h4>
                        <p class="mb-0">Danh sách các danh mục hợp tác với cửa hàng<br>
                            Bảng điều khiên thực hiện chức năng.</p>
                    </div>
                    <!-- <a href="#" class="btn btn-primary add-list" data-toggle="modal" data-target="#add-category"><i class="las la-plus mr-3"></i>Thêm Danh Mục</a> -->
                    <a href="<?php echo e(URL::to('/add-category')); ?>" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm Danh Mục</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body" id="load-category">
                            <?php $__currentLoopData = $list_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->idCategory); ?></td>
                                <td><?php echo e($category->CategoryName); ?></td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"
                                            href="<?php echo e(URL::to('/edit-category/'.$category->idCategory)); ?>"><i class="ri-pencil-line mr-0"></i></a>
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-target="#model-delete-<?php echo e($category->idCategory); ?>" data-placement="top" title="" data-original-title="Xóa"
                                            style="cursor:pointer;"><i class="ri-delete-bin-line mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="model-delete-<?php echo e($category->idCategory); ?>"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có muốn xóa danh mục <?php echo e($category->CategoryName); ?> không?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                        <a href="<?php echo e(URL::to('/delete-category/'.$category->idCategory)); ?>" type="button" class="btn btn-primary">Xác nhận</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\admin\category\manage-category.blade.php ENDPATH**/ ?>