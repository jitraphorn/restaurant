@extends('../admin.layout.master')
@section('main')
<script type="text/javascript">
	var data = <?= json_encode($data);?>;
	var roomList = <?= json_encode($roomList);?>;
</script>
<div ng-controller="booksFormController">
	<!-- Content Header -->
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header" ng-if="!data.booking.id"><i class="icon-book3"> เพิ่มข้อมูลจองห้องพัก</i></h3>
			<h3 class="page-header" ng-if="data.booking.id"><i class="icon-book3"></i> แก้ไขข้อมูลจองห้องพัก</h3>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
				<li><i class="icon-book3"></i><a href="/admin/user">จองห้องพัก</a></li>     
				<li><i class="icon-pencil6"></i>ฟอร์ม</li>                
			</ol>
		</div>
	</div>

	 <!-- Data Form -->
	 <form ng-submit="add(data)" name="dataForm">
	 	 <div class="form-group col-md-6">
	 		<label>ห้องพัก</label>
	 		<select class="form-control" ng-model="booking.room_id" ng-init="selectedRoom()" ng-change="changeRoom(booking.room_id)">
	 			<option value="{{x.id}}" ng-repeat="x in roomList">{{x.title}}</option>
	 		</select>	
	 	</div>
	 	<div class="form-group col-md-6">
	 		<label>ราคา</label>
	 		<h4>{{booking.price | number:2}} บาท</h4>
	 	</div>
	 	<div class="clearfix"></div>
	 	<div class="form-group col-md-6">
	 		<label>วันที่เข้าพัก</label>
	 		<input type="text" id="checkin_date" class="form-control">
	 	</div>
	 	<div class="form-group col-md-6">
	 		<label>วันที่สิ้นสุด</label>
	 		<input type="text" id="checkout_date" class="form-control">
	 	</div>
	 	<div class="form-group col-md-6">
	 		<label>ชื่อ</label>
	 		<input type="text" class="form-control" ng-model="cusData.fname" ng-disabled="booking.id" required>
	 	</div>
	 	<div class="form-group col-md-6">
	 		<label>นามสกุล</label>
	 		<input type="text" class="form-control" ng-model="cusData.lname" ng-disabled="booking.id" required>
	 	</div>
	 	<div class="clearfix"></div>
	 	<div class="form-group col-md-6">
	 		<label>เบอร์โทรศัพท์</label>
	 		<input type="text" class="form-control" ng-model="cusData.tel" ng-disabled="booking.id" required>
	 	</div>
	 	<div class="form-group col-md-6">
	 		<label>อีเมล</label>
	 		<input type="text" class="form-control" ng-model="cusData.email" ng-disabled="booking.id" required>
	 	</div>
	 	<div class="clearfix"></div>
		<div align="center">
			<button type="submit" class="btn btn-success"><i class="icon-checkmark4"></i> ตกลง</button> <a class="btn btn-default" href="/admin/user"><i class="icon-exit2"></i> ยกเลิก</a>
		</div>
	</form>
</div>
@endsection