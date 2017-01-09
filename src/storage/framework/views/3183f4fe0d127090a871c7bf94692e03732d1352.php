<?php $__env->startSection('main'); ?>
<div ng-controller="tableController">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="icon-grid52"></i>จัดการโต๊ะ</h3>
			<button class="btn btn-success" ng-click="form()" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</button>
			<div class="clearfix"></div>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
				<li><i class="icon-grid52"></i>จัดการโต๊ะ</li>                
			</ol>
		</div>
	</div>
		<h3 class="alert alert-info" align="center" ng-show="!data.length">ยังไม่มีข้อมูล</h3>
		<div class="table-responsive" ng-show="data.length">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อโต๊ะ</th>
						<th>จำนวนที่นั่ง</th>
						<th>สถานะ</th>
						<th class="text-center">ตัวเลือก</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="x in data">
					<td>{{$index+1}}</td>
						<td>{{x.name}}</td>
						<td>{{x.seat}}</td>
						<td>
							<select class="form-control" ng-model="x.status" ng-change="changeStatus(x)">
								<option value="1">ว่าง</option>
								<option value="2">ไม่ว่าง</option>
							</select>
						</td>
						<td class="text-center"><button class="btn btn-warning" ng-click="form(x)"><i class="icon-pencil5"></i> แก้ไข</button> <button class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</button></td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form ng-submit="submit(formData)">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">จัดการโต๊ะ</h4>
						</div>
						<div class="modal-body">
							<div class="form-inline">
								<div class="form-group">
									<label for="name">ชื่อโต๊ะ : </label>
									<input type="text" class="form-control" id="name" ng-model="formData.name">
								</div>
								<div class="form-group">
									<label for="seat"> จำนวนที่นั่ง : </label>
									<input type="number" min="1" class="form-control" id="seat" ng-model="formData.seat">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross"></i> ปิด</button>
							<button type="submit" class="btn btn-success"><i class="icon-checkmark4"></i> ตกลง</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>