

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Cities </h1>

        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <br /> 
        <?php endif; ?>
        <form method="post" action="<?php echo e(route('countries.update')); ?>" enctype="multipart/form-data">
        
            <?php echo csrf_field(); ?>
            <div class="form-group">

                <label for="long_name">Country Name:</label>
                <input type="text" class="form-control" name="long_name" value=<?php echo e($country->long_name); ?>/>
            </div>
           
           
   

                      

            <input type="hidden" name="id" value = "<?php echo e($country->id); ?>">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ceayama Software\TeachersTurf\resources\views/country/country.blade.php ENDPATH**/ ?>