<?php $__env->startSection('main'); ?>
<div ng-controller="booksController">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="icon-book3"></i>การจองห้องพัก</h3>
			<a class="btn btn-success" href="/admin/books/form" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</a>
			<div class="clearfix"></div>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
				<li><i class="icon-book3"></i>การจองห้องพัก</li>                
			</ol>
		</div>
	</div>
		<h3 class="alert alert-info" align="center" ng-show="!data.length">ยังไม่มีข้อมูล</h3>
		<div class="table-responsive" ng-show="data.length">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>รหัสการจอง</th>
						<th>ชื่อห้องพัก</th>
						<th>ราคารวม</th>
						<th>เช็คอิน - เช็คเอาท์</th>
						<th>สถานะ</th>
						<th class="text-center">ตัวเลือก</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="x in data">
						<td>{{$index+1}}</td>
						<td>{{x.code}}</td>
						<td>{{x.roomDetail.name}}</td>
						<td>{{x.price | number:2}}</td>
						<td>{{x.checkin_date}} - {{x.checkout_date}}</td>
						<td ng-if="x.status == 1 || x.status == '1'">รออนุมัติ</td>
						<td ng-if="x.status == 2 || x.status == '2'">อนุมัติแล้ว</td>
						<td class="text-center"><a class="btn btn-warning" href="/admin/books/form/{{x.id}}"><i class="icon-pencil5"></i> แก้ไข</a> <a class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</a></td>
					</tr>
				</tbody>
			</table>
		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>