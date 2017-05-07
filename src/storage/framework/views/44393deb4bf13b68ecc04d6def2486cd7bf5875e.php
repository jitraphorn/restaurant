<?php $__env->startSection('main'); ?>
<div ng-controller="dashboardController">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-home"></i>หน้าแรก</h3>
			<div class="clearfix"></div>
		</div>
	</div>
	<h2>การตั้งค่า</h2>
	<div class="form-group">
		<label>เปิด/ปิดการจองโต๊ะ : </label>
		<button type="button" class="btn btn-success" ng-if="config.order_status" ng-click="changeOrderStatus()"><i class="icon-check"></i>เปิดการจองโต๊ะแล้ว</button>
		<button type="button" class="btn btn-danger" ng-if="!config.order_status" ng-click="changeOrderStatus()"><i class="icon-cross"></i>ปิดการจองโต๊ะแล้ว</button>
	</div>
	<form class="form-inline form-group">
		<div class="form-group">
			<label for="max_table">จำนวนโต๊ะสูงสุด : </label>
			<input type="text" class="form-control form-lg" id="max_table" ng-model="config.max_table">
		</div>
		<button type="submit" class="btn btn-primary">ตกลง</button>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>