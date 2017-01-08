<?php $__env->startSection('main'); ?>
<script type="text/javascript">
	var data = <?= json_encode($data);?>
</script>
<div ng-controller="booksFormController">
	<!-- Content Header -->
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header" ng-if="!data.id"><i class="icon-book3"> เพิ่มข้อมูลการจองห้องพัก</i></h3>
			<h3 class="page-header" ng-if="data.id"><i class="icon-book3"></i> แก้ไขข้อมูลการจองห้องพัก</h3>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
				<li><i class="icon-book3"></i><a href="/admin/books">การจองห้องพัก</a></li>     
				<li><i class="icon-pencil6"></i>ฟอร์ม</li>                
			</ol>
		</div>
	</div>

	 <!-- Data Form -->
	<form ng-submit="add(data)" name="dataForm">
		<div class="col-md-6">
			<div class="form-group">
				<label for="username">ชื่อผู้ใช้</label>
				<input type="text" class="form-control" id="username" ng-model="data.username" ng-disabled="data.id">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="pwd">รหัสผ่าน</label>
				<input type="password" class="form-control" id="pwd" ng-model="data.password" ng-disabled="data.id">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">ชื่อ-นามสกุล</label>
				<input type="text" class="form-control" id="name" ng-model="data.name">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="email">อีเมล</label>
				<input type="email" class="form-control" id="email" ng-model="data.email">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="role">หน้าที่</label>
				<select class="form-control" ng-model="data.role" id="role">
					<option value="1">เจ้าของกิจการ</option>
					<option value="2">พนักงาน</option>
				</select>
			</div>
		</div>
		<div class="clearfix"></div>
		<div align="center">
			<button type="submit" class="btn btn-success"><i class="icon-checkmark4"></i> ตกลง</button> <a class="btn btn-default" href="/admin/user"><i class="icon-exit2"></i> ยกเลิก</a>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>