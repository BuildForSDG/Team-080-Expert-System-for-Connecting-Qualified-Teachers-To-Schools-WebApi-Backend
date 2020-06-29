

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Create Answers </h1>

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
        <form method="post" action="<?php echo e(route('answers.store')); ?>" enctype="multipart/form-data">
        
            <?php echo csrf_field(); ?>
            <div class="form-group">

                <label for="answer">Answer:</label>
                <input type="text" class="form-control" name="answer"/>
            </div>
           
            <div class="form-group">
                <label for="is_active">Is Active?:</label>
                <input type="checkbox" class="form-control" name="is_active" />
            </div>

            <div class="form-group">
        <label for="images"></label>
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="images" name="image_name">
            <label class="custom-file-label" for="images">Answer Image</label>
        </div>
    </div>
   

            
   

            
            <div class="form-group">
                <label for="is_correct">Is Correct?:</label>
                <input type="checkbox" class="form-control" name="is_correct"/>
            </div>
           

          
           
          
           
           

<div class="form-group row mt-4">

<label for="home_content" class="col-md-2 col-form-label">Question</label>
<div class="col-md-10">

<select class="form-control" name="question_name" id="question_name" required>
<option selected>Select A Question</option>
<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($question->id); ?>"><?php echo e($question->question); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>



            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ceayama Software\TeachersTurf\resources\views/answer/create.blade.php ENDPATH**/ ?>