

<?php $__env->startSection('title', 'products'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>

    <li class="breadcrumb-item active">products</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-sm btn-outline-primary">Create</a>
      

    </div>
   
    <br>

    <?php if(session()->has('success')): ?>
        <div class=" alert alert-success">
            <?php echo e(session('success')); ?>


        </div>
    <?php endif; ?>




    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Id</th>
                <th>Name </th>
                <th>Category </th>
                <th>Store </th>
                <th>Status </th>
                <th>Parent Id</th>
                <th>Create At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <td><img src="<?php echo e(asset('storage/'. $product->image)); ?>" height="50" width="50" alt="" ></td>
                    <td><?php echo e($product->id); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->category_id); ?></td>
                    <td><?php echo e($product->store_id); ?></td>
                    <td><?php echo e($product->status); ?></td>
                    <td><?php echo e($product->parent_id); ?></td>
                    <td><?php echo e($product->created_at); ?></td>
                    
                    <td>
                        <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7">No product Define</td>
            </tr>
            <?php endif; ?>



        </tbody>



    </table>

    <?php echo e($products->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.starter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\STORE_APP\resources\views/products/index.blade.php ENDPATH**/ ?>