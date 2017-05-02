@extends('../admin.layout.master')
@section('main')
<div ng-controller="booksController">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="icon-book3"></i>การจองห้องพัก</h3>
<!-- 			<a class="btn btn-success" href="/admin/books/form" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</a> -->
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
					<tr ng-repeat="x in data" ng-class="{'success': x.status == '1'}">
						<td>{{$index+1}}</td>
						<td>{{x.code}}</td>
						<td>{{x.roomDetail.name}}</td>
						<td>{{x.price | number:2}}</td>
						<td>{{x.checkin_date}} - {{x.checkout_date}}</td>
						<td>
							<select class="form-control" convert-to-number ng-init="dummyStatus = x.status" ng-model="dummyStatus" ng-change="changeStatus(x.id,x.status)">
								<option value="0" ng-selected="x.status == '0'">รออนุมัติ</option>
								<option value="1" ng-selected="x.status == '1'">อนุมัติแล้ว</option>
							</select>
						</td>
						<td class="text-center"><button class="btn btn-info" ng-click="form(x)"><i class="icon-list"></i> ดูรายละเอียด</button> <a class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</a></td>
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
							<h4 class="modal-title" id="myModalLabel">ข้อมูลการจองห้องพัก</h4>
						</div>
						<div class="modal-body">
							<p align="center" ng-if="dataDetail.status == '0'" class="alert alert-danger"><b>รออนุมัติ</b></p>
							<p align="center" ng-if="dataDetail.status == '1'" class="alert alert-success"><b>อนุมัติแล้ว</b></p>
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td><b>รหัสการจอง</b></td>
										<td>{{dataDetail.code}}</td>
										<td><b>ชื่อห้อง</b></td>
										<td>{{dataDetail.room_detail.title}}</td>
									</tr>
									<tr>
										<td><b>ตั้งแต่</b></td>
										<td>{{dataDetail.checkin_date}}</td>
										<td><b>จนถึง</b></td>
										<td>{{dataDetail.checkout_date}}</td>
									</tr>
									<tr>
										<td><b>ราคา</b></td>
										<td>{{dataDetail.price}}</td>
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
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross"></i> ปิด</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
@endsection