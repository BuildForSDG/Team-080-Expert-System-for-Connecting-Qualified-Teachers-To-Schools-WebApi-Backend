

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
        <form method="post" action="<?php echo e(route('cities.update')); ?>" enctype="multipart/form-data">
        
            <?php echo csrf_field(); ?>
            <div class="form-group">

<label for="name">City Name:</label>
<input type="text" class="form-control" name="name" value=<?php echo e($city->name); ?>/>
</div>




      

<div class="form-group row mt-4">

<label for="home_content" class="col-md-2 col-form-label">State</label>
<div class="col-md-10">

<select class="form-control" name="home_content" id="home_content" required>
<option selected>Select A State</option>
<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>

            <input type="hidden" name="id" value = "<?php echo e($city->id); ?>">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ceayama Software\TeachersTurf\resources\views/city/city.blade.php ENDPATH**/ ?>