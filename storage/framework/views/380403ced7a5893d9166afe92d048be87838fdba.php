


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <h4 class="text-dark">Votre panier</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img src="<?php echo e($item->associatedModel->image); ?>"
                             alt="<?php echo e($item->title); ?>"
                             width="50"
                             height="50"
                             class="img-fluid rounded" >
                        </td>
                        <td>
                            <?php echo e($item->name); ?>

                        </td>
                        <td>
                            <form class="d-flex flex-row justify-content-center align-items-center" action="<?php echo e(route('update.cart',$item->associatedModel->slug)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="form-group">
                                   
                                    <input type="number" name="qty" value="<?php echo e($item->quantity); ?>" id="qty"   max="<?php echo e($item->associatedModel->qty); ?>" min="1" class="from-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                       
                        <td>
                            <?php echo e($item->price); ?> DH
                        </td>
                        <td>
                            <?php echo e($item->price * $item->quantity); ?> DH
                        </td>
                        <td>
                            <form class="d-flex flex-row justify-content-center align-items-center" action="<?php echo e(route('remove.cart',$item->associatedModel->slug)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-dark font-weight-bold">
                        <td class="border border-success" colspan="3">
                            Total
                        </td>
                        <td class="border border-success" colspan="3">
                            <?php echo e(Cart::getSubTotal()); ?> DH
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\CodeTests\e-project\resources\views/cart/index.blade.php ENDPATH**/ ?>