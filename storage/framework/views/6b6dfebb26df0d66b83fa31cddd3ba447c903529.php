

<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Answers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('answers.create')); ?>"> Create New Answers</a>
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
          <td>Answer</td>
          <td>Is Active</td>
        <td>Is Correct</td>
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($answer->answer); ?></td>
            <td><?php echo e($answer->is_active); ?></td>
            <td><?php echo e($answer->is_correct); ?></td>
            
            <td>
            
   
            <a class="btn btn-info" href="<?php echo e(route('answers.show',$answer->id)); ?>">Edit</a>
         
            
         
            
                     </td>
                     <td><a class="btn btn-danger" href = 'delete/<?php echo e($answer->id); ?>'>Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <?php echo e($answers->links()); ?>

<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ceayama Software\TeachersTurf\resources\views/answer/answers.blade.php ENDPATH**/ ?>