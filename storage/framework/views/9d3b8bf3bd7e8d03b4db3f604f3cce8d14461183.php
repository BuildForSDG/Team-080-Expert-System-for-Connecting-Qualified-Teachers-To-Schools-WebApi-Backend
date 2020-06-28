

<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Cities</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('cities.create')); ?>"> Create New Cities</a>
            </div>
        </div>
    </div>
   

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div><br />
  <?php endif; ?>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>City Name</td>
         
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($city->name); ?></td>
            
            <td>
            <form action="<?php echo e(route('cities.destroy',$city->id)); ?>" method="POST">
   
   <a class="btn btn-info" href="<?php echo e(route('cities.show',$city->id)); ?>">Edit</a>

   

   <?php echo csrf_field(); ?>
   

   <button type="submit" class="btn btn-danger">Delete</button>
</form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <?php echo e($cities->links()); ?>

<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ceayama Software\TeachersTurf\resources\views/city/cities.blade.php ENDPATH**/ ?>