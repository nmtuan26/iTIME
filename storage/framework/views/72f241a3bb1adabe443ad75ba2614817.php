
<?php $__env->startSection('content_dash'); ?>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Khuyến Mãi ( Tổng: <?php echo e($count_sale); ?> đợt )</h4>
                        <p class="mb-0">Danh sách khuyến mãi hiện có. <br>
                        Trang này hiện thông tin các sản phẩm khuyến mãi theo đợt, có thể chỉnh sửa và xóa sản phẩm khuyến mãi.</p>
                    </div>
                    <a href="<?php echo e(URL::to('/add-sale')); ?>" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm khuyến mãi</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th> Tên khuyến mãi </th>
                                <th> Sản phẩm </th>
                                <th> Bắt đầu </th>
                                <th> Kết thúc </th>
                                <th> % Giảm </th>
                                <th> Thao tác </th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            <tr>
                                <?php $__currentLoopData = $list_sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e($sale->SaleName); ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php $image = json_decode($sale->ImageName)[0];?>
                                        <img src="<?php echo e(asset('storage/kidoldash/images/product/'.$image)); ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                        <div><?php echo e($sale->ProductName); ?></div>
                                    </div>
                                </td>
                                <td><?php echo e($sale->SaleStart); ?></td>
                                <td><?php echo e($sale->SaleEnd); ?></td>
                                <td><?php echo e($sale->Percent); ?></td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"
                                            href="<?php echo e(URL::to('/edit-sale/'.$sale->idSale.'/'.$sale->idProduct)); ?>"><i class="ri-pencil-line mr-0"></i></a>
                                        
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-target="#modal-delete-<?php echo e($sale->idSale); ?>" data-placement="top" title="" data-original-title="Xóa"
                                            style="cursor:pointer;"><i class="ri-delete-bin-line mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-delete-<?php echo e($sale->idSale); ?>"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thông báo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có muốn xóa khuyến mãi của sản phẩm <?php echo e($sale->ProductName); ?> không?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                            <a href="<?php echo e(URL::to('/delete-sale/'.$sale->idSale)); ?>" type="button" class="btn btn-primary">Xác nhận</a>
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
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan\resources\views\admin\product\sale\manage-sale.blade.php ENDPATH**/ ?>