

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e($product->title); ?></div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-6 mb-2 shadow-sm">
                                <div class="card"style="width:18rem,height:100%">
                                    <div class="card-img-top">
                                        <img class="img-fluid rounded" src="<?php echo e($product->image); ?>" alt="<?php echo e($product->title); ?>">

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($product->title); ?></h5>
                                        <p class="text-dark font-weight-blod">
                                            <?php echo e($product->category->title); ?>

                                        </p>
                                        <p class="d-flex flex-row justify-content-between align-items-center">
                                                <span class="text-muted">
                                                    <?php echo e($product->price); ?> DH
                                                </span>
                                                <span class="text-danger">
                                                 <strike><?php echo e($product->old_price); ?> DH</strike>   
                                                </span>
                                        </p>
                                        <p class="card-text">
                                            <?php echo e($product->description); ?>

                                        </p>
                                        <p class="font-weight-blod">
                                            <?php if($product->instock>0): ?>
                                            <span class="text-success">
                                                Disponible
                                            </span>
                                            <?php else: ?>
                                            <span class="text-danger">
                                                Non Disponible
                                            </span>
                                                
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                </div>
                            <hr>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="col-md-4">
           <form action="" method="">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="qte" class="label-input">
                    Quantite:
                </label>
                <input type="number" name="qte" id="qte"value="1"placeholder="Quantite"max="<?php echo e($product->instock); ?>"min="1"class="from-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block bg-dark">
                    <i class="fa fa-shopping-cart"></i>
                    Ajoute au panier
                </button>
            </div>
           </form>
           </div>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yassine\Desktop\e-comerce\e-project\resources\views/products/show.blade.php ENDPATH**/ ?>