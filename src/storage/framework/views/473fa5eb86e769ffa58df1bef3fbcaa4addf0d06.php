<?php $__env->startSection('main'); ?>
<div ng-controller="orderController">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="icon-icon-chair"></i>การจองโต๊ะอาหาร</h3>
			<a class="btn btn-success" href="/admin/order/form" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</a>
			<div class="clearfix"></div>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
				<li><i class="icon-icon-chair"></i>การจองโต๊ะอาหาร</li>                
			</ol>
		</div>
	</div>
		<h3 class="alert alert-info" align="center" ng-show="!data.length">ยังไม่มีข้อมูล</h3>
		<div class="table-responsive" ng-show="data.length">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อผู้จอง</th>
						<th>จำนวนคน</th>
						<th>เวลา</th>
						<th>สถานะ</th>
						<th class="text-center">ตัวเลือก</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="x in data" ng-class="{'success': x.status == '1'}">
						<td>{{$index+1}}</td>
						<td>{{x.customer_detail.fname + x.customer_detail.lname}}</td>
						<td>{{x.person}}</td>
						<td>{{x.date +" "+ x.time}}</td>
						<td>
							<select class="form-control" convert-to-number ng-init="dummyStatus = x.status" ng-model="dummyStatus" ng-change="changeStatus(x.id,x.status)">
								<option value="0" ng-selected="x.status == '0'">รออนุมัติ</option>
								<option value="1" ng-selected="x.status == '1'">อนุมัติแล้ว</option>
							</select>
						</td>
						<td class="text-center"><button class="btn btn-info" ng-click="form(x)"><i class="icon-list"></i> ดูรายละเอียด</button> <a class="btn btn-warning" href="/admin/order/form/{{x.id}}"><i class="icon-pencil5"></i> แก้ไข</a> <button class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</button></td>
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
							<h4 class="modal-title" id="myModalLabel">ข้อมูลการจองโต๊ะ</h4>
						</div>
						<div class="modal-body">
							<p align="center" ng-if="dataDetail.status == '0'" class="alert alert-danger"><b>รออนุมัติ</b></p>
							<p align="center" ng-if="dataDetail.status == '1'" class="alert alert-success"><b>อนุมัติแล้ว</b></p>
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td><b>วันที่</b></td>
										<td>{{dataDetail.date}}</td>
										<td><b>เวลา</b></td>
										<td>{{dataDetail.time}}</td>
									</tr>
									<tr>
										<td><b>จำนวน</b></td>
										<td>{{dataDetail.person}} คน</td>
										<td><b>วันที่ทำการจอง</b></td>
										<td>{{dataDetail.created_at}}</td>
										
									</tr>
									<tr>
										<td><b>ชื่อคนจอง</b></td>
										<td>{{dataDetail.customer_detail.fname}} {{dataDetail.customer_detail.lname}}</td>
										<td><b>เบอร์โทร</b></td>
										<td>{{dataDetail.customer_detail.tel}}</td>
									</tr>
									<tr>
										<td><b>อีเมล</b></td>
										<td colspan="3">{{dataDetail.customer_detail.email}}</td>
									</tr>
								</table>
							</div>
							<hr>
							<div class="modal-header" style="margin: 15px -15px;">
								<h4 class="modal-title">รายการอาหาร</h4>
							</div>
							<div class="table-responsive" ng-if="dataDetail.menu_list.length">
								<table class="table">
									<tr>
										<th class="text-center">รูปภาพ</th>
										<th class="text-center">ชื่อเมนู</th>
										<th style="max-width: 80px" class="text-center">จำนวน</th>
									</tr>
									<tr ng-repeat="x in dataDetail.menu_list">
										<td>
											<img src="{{x.menu_detail.image}}" alt="Image" style="width:50px;height: 50px">
										</td>
										<td>{{x.menu_detail.name}}</td>
										<td class="text-center">{{x.amount}}</td>
									</tr>
								</table>
							</div>
							<h5 align="center" ng-if="!dataDetail.menu_list.length"> ไม่มีรายการอาหาร </h5>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross"></i> ปิด</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>