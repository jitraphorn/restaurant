<?php $__env->startSection('main'); ?>
<div ng-controller="userControl">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-user"></i>ผู้ใช้งาน</h3>
			<button class="btn btn-success" ng-click="form()" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</button>
			<div class="clearfix"></div>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
				<li><i class="fa fa-laptop"></i>User</li>                
			</ol>
		</div>
	</div>
		<h3 class="alert alert-info" align="center" ng-show="!data.length">ยังไม่มีข้อมูล</h3>
		<div class="table-responsive" ng-show="data.length">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อผู้ใช้</th>
						<th>ชื่อ-นามสกุล</th>
						<th>อีเมล</th>
						<th>หน้าที่</th>
						<th class="text-center">ตัวเลือก</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="x in data">
					<td>{{$index+1}}</td>
						<td>{{x.username}}</td>
						<td>{{x.name}}</td>
						<td>{{x.email}}</td>
						<td ng-if="x.role == 1 || x.role == '1'">เจ้าของกิจการ</td>
						<td ng-if="x.role == 2 || x.role == '2'">พนักงาน</td>
						<td class="text-center"><a class="btn btn-warning" href="/admin/user/form/{{x.id}}"><i class="icon-pencil5"></i> แก้ไข</a> <a class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</a></td>
					</tr>
				</tbody>
			</table>
		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>