



<?php $__env->startSection('bodycontent'); ?>
	<div class="wrapper" id="app">
		<?php echo $__env->make('header', ['some' => 'data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->make('sidebar', ['some' => 'data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->yieldContent('admincontent'); ?>
		<?php echo $__env->make('footer', ['some' => 'data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="control-sidebar-bg"></div>
	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('jscontent'); ?>

	<!-- DataTables -->
	<script src="<?php echo e(asset('/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/bower_components/admin-lte/plugins/moment/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/bower_components/admin-lte/plugins/fullcalendar/main.min.js')); ?>"></script>
	
	<script src="<?php echo e(asset('/bower_components/admin-lte/plugins/select2/js/select2.full.min.js')); ?>"></script>
	

	<!-- SlimScroll -->
	<script src="<?php echo e(asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo e(asset('/bower_components/admin-lte/plugins/fastclick/fastclick.js')); ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo e(asset('/bower_components/admin-lte/dist/js/adminlte.min.js')); ?>"></script>
	
	<script src="<?php echo e(asset('/js/app.js')); ?>"></script>

	<!-- page script -->
	<script>
	  $(function () {
	  	$('.select2').select2()
	    
	    $('#example1').DataTable({
	      'paging'      : true,
	      'lengthChange': false,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : false
	    })
	  })
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ceayama Software\TeachersTurf\resources\views/layouts/layout.blade.php ENDPATH**/ ?>