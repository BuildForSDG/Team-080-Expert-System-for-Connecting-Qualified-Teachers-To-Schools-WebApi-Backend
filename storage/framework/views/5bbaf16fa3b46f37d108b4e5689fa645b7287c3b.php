

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Questions </h1>

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
        <form method="post" action="<?php echo e(route('questions.update')); ?>" enctype="multipart/form-data">
        
            <?php echo csrf_field(); ?>
            <div class="form-group">

<label for="question">Question:</label>
<input type="text" class="form-control" name="question" value=<?php echo e($question->question); ?>/>
</div>

<div class="form-group">
<label for="is_active">Is Active?:</label>
<input type="checkbox" class="form-control" name="is_active" value=<?php echo e($question->is_active); ?> />
</div>

<div class="form-group">
<label for="images"></label>
<div class="custom-file">
<input type="file" class="custom-file-input" id="images" name="image_name" value=<?php echo e($question->image_name); ?> >
<label class="custom-file-label" for="images">Question Image</label>
</div>
</div>






<div class="form-group">
<label for="is_german">Is German?:</label>
<input type="checkbox" class="form-control" name="is_german" value=<?php echo e($question->is_german); ?>/>
</div>








<div class="form-group row mt-4">

<label for="home_content" class="col-md-2 col-form-label">Subject</label>
<div class="col-md-10">

<select class="form-control" name="subject_name" id="subject_name" required>
<option selected>Select A Subject</option>
<?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>

            <input type="hidden" name="id" value = "<?php echo e($question->id); ?>">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ceayama Software\TeachersTurf\resources\views/question/question.blade.php ENDPATH**/ ?>