

<?php $__env->startSection('title', 'Categories'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>

    <li class="breadcrumb-item active">Categories</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-sm btn-outline-primary">Create</a>
        <a href="<?php echo e(route('categories.trash')); ?>" class="btn btn-sm btn-outline-danger">Trashed</a>

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
                <th>Status </th>
                <th>Parent Id</th>
                <th>Create At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <td><img src="<?php echo e(asset('storage/'. $category->image)); ?>" height="50" width="50" alt="" ></td>
                    <td><?php echo e($category->id); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->status); ?></td>
                    <td><?php echo e($category->parent_id); ?></td>
                    <td><?php echo e($category->created_at); ?></td>
                    
                    <td>
                        <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7">No Category Define</td>
            </tr>
            <?php endif; ?>



        </tbody>



    </table>

    <?php echo e($categories->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.starter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\STORE_APP\resources\views/categories/index.blade.php ENDPATH**/ ?>