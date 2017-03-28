@extends('../admin.layout.master')
@section('main')
<script type="text/javascript">
	var tableList = <?php echo json_encode($data['tableList']);?>;
	console.log(tableList)
</script>
<div ng-controller="orderController">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="icon-icon-chair"></i>การจองโต๊ะอาหาร</h3>
			<button class="btn btn-success" ng-click="form()" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</button>
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
						<th>โต๊ะ</th>
						<th class="text-center">ตัวเลือก</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="x in data">
						<td>{{$index+1}}</td>
						<td>{{x.customer_detail.fname + x.customer_detail.lname}}</td>
						<td>{{x.person}}</td>
						<td>{{x.datetime}}</td>
						<td>{{x.status == 0 ? 'ยังไม่ได้ชำระเงิน':'ชำระเงินเรียบร้อยแล้ว'}}</td>
						<td>
							<select class="form-control" ng-model="data[$index].table_id" convert-to-number ng-change="changeTable(x.id,data[$index].table_id)">
								<option value="">ยังไม่มี</option>
								<option value="{{t.id}}" ng-repeat="t in tableList">{{t.name}}</option>
							</select>
						</td>
						<td class="text-center"><button class="btn btn-info" ng-click="form(x)"><i class="icon-list"></i> ดูรายละเอียด</button> <button class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</button></td>
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
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td><b>โต๊ะที่</b></td>
										<td ng-if="!dataDetail.table_detail">ยังไม่มี</td>
										<td ng-if="dataDetail.table_detail">{{dataDetail.table_detail.name}}</td>
										<td><b>จำนวน</b></td>
										<td>{{dataDetail.person}} คน</td>
									</tr>
									<tr>
										<td><b>วันที่</b></td>
										<td>{{dataDetail.date}}</td>
										<td><b>เวลา</b></td>
										<td>{{dataDetail.time}} คน</td>
									</tr>
									<tr>
										<td><b>ชื่อคนจอง</b></td>
										<td colspan="3">{{dataDetail.customer_detail.fname}} {{dataDetail.customer_detail.lname}}</td>
									</tr>
									<tr>
										<td><b>เบอร์โทร</b></td>
										<td>{{dataDetail.customer_detail.tel}}</td>
										<td><b>อีเมล</b></td>
										<td>{{dataDetail.customer_detail.email}}</td>
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
@endsection