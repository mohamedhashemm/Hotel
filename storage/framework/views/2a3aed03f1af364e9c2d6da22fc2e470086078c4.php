        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
       <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
       
       <li class="nav-item">
           <a href="<?php echo e(route($item['route'])); ?>" class="nav-link <?php echo e(Route::is($item['active'])? 'active' : ''); ?>">
               <i class="<?php echo e($item['icon']); ?>"></i>
               <p>
                <?php echo e($item['title']); ?>

                <?php if(isset($item['badge'])): ?>
                    
                <span class="right badge badge-danger"><?php echo e($item['badge']); ?></span>
                <?php endif; ?>
                </p>
            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</nav>
<!-- /.sidebar-menu -->
<?php /**PATH C:\laravel\STORE_APP\resources\views/components/nav.blade.php ENDPATH**/ ?>