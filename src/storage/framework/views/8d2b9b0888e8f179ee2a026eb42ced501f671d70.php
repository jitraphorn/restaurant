<?php $__env->startSection('main'); ?>
<script type="text/javascript">
	var data = <?= json_encode($data);?>;
	var listMenu = <?= json_encode($listMenu);?>;
</script>
<div ng-controller="orderFormController">
	<!-- Content Header -->
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header" ng-if="!data.order.id"><i class="icon-chair"> เพิ่มข้อมูลการจองโต๊ะ</i></h3>
			<h3 class="page-header" ng-if="data.order.id"><i class="icon-chair"></i> แก้ไขข้อมูลการจองโต๊ะ</h3>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
				<li><i class="icon-chair"></i><a href="/admin/order">การจองโต๊ะ</a></li>     
				<li><i class="icon-pencil6"></i>ฟอร์ม</li>                
			</ol>
		</div>
	</div>

	 <!-- Data Form -->
	<form ng-submit="add(data)" name="dataForm">
		<div class="col-md-12">
			<h4>ข้อมูลการจอง</h4>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="person">จำนวนคน</label>
				<input type="number" min="1" class="form-control" id="person" ng-model="data.order.person" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="date">วันที่</label>
				<input type="date" class="form-control" id="date" ng-model="data.order.date" required>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="time">เวลา</label>
				<select class="form-control" ng-model="data.order.time" required>
					<option value="9.00น. - 12.00น." selected>9.00น. - 12.00น.</option>
					<option value="12.00น. - 15.00น.">12.00น. - 15.00น.</option>
					<option value="12.00น. - 18.00น.">15.00น. - 18.00น.</option>
					<option value="18.00น. - 21.00น.">18.00น. - 21.00น.</option>
				</select>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12">
			<h4>ข้อมูลผู้จอง</h4>
		</div>
		<div class="clearfix"></div>
		<div class="form-group col-md-6">
			<label>ชื่อ</label>
			<input type="text" class="form-control" ng-model="data.customer_detail.fname" ng-disabled="data.order.id">
		</div>
		<div class="form-group col-md-6">
			<label>นามสกุล</label>
			<input type="text" class="form-control" ng-model="data.customer_detail.lname" ng-disabled="data.order.id">
		</div>
		<div class="clearfix"></div>
		<div class="form-group col-md-6">
			<label>เบอร์โทรศัพท์</label>
			<input type="text" class="form-control" ng-model="data.customer_detail.tel" ng-disabled="data.order.id">
		</div>
		<div class="form-group col-md-6">
			<label>อีเมล</label>
			<input type="text" class="form-control" ng-model="data.customer_detail.email" ng-disabled="data.order.id">
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12">
			<h4>รายการอาหาร</h4>
		</div>
		<div class="clearfix"></div>
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th class="text-center">รูปภาพ</th>
					<th class="text-center">ชื่อเมนู</th>
					<th class="text-center">ราคา</th>
					<th style="max-width: 80px" class="text-center">จำนวน</th>
				</tr>
				<tr ng-repeat="x in listMenu">
					<td>
						<img src="{{x.image}}" alt="Image" style="width:50px;height: 50px">
					</td>
					<td>{{x.name}}</td>
					<td>{{x.price | number:2}}</td>
					<td style="max-width: 80px"><input type="number" class="form-control text-center" ng-model="data.menu_list[x.id]" ng-init="initAmount(x.id)"></td>
				</tr>
			</table>
		</div>
		<div class="clearfix"></div>
		<div align="center">
			<button type="submit" class="btn btn-success"><i class="icon-checkmark4"></i> ตกลง</button> <a class="btn btn-default" href="/admin/user"><i class="icon-exit2"></i> ยกเลิก</a>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>