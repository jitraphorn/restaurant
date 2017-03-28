@extends('layout.master')
@section('header')
@include('layout.main_header')
@endsection
@section('content')
<div ng-controller="roomController as room">
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font primary-color">รายการห้องพัก</h2>
					<p>บ้านพักสไตล์รีสอร์ท ชมวิวสวนไม้สักสวย ๆ ยามค่ำคืนได้บรรยากาศ</p>
				</div>
			</div>
			<div class="row">
				@foreach($data['room'] as $room)
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="fh5co-card-item">
						<a href="javascript:void(0)" class="" ng-click="click_item({{%$room->image%}})">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="{{%$room->image[0]->path%}}" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>{{%$room->name%}}</h2>
								<p class="desc-menu">{{%$room->description%}}</p>
								<p><span class="price cursive-font">{{%$room->price%}} บาท</span></p>
							</div>
						</a>
						<button class="btn btn-info btn-block" ng-click="reservation()">ทำการจอง</button>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- carousel modal -->
	<div class="modal fade slide-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item" ng-repeat="img in slide" ng-class="{active:!$index}">
							<img class="img-responsive" src="{{img.path}}">
						</div>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- carousel modal -->

	<!-- reservation modal -->
	<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form ng-submit="submitReservation()">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">จองห้องพัก</h4>
					</div>
					<div class="modal-body">
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
							<input type="text" class="form-control" ng-model="cusData.fname">
						</div>
						<div class="form-group col-md-6">
							<label>นามสกุล</label>
							<input type="text" class="form-control" ng-model="cusData.lname">
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-md-6">
							<label>เบอร์โทรศัพท์</label>
							<input type="text" class="form-control" ng-model="cusData.tel">
						</div>
						<div class="form-group col-md-6">
							<label>อีเมล</label>
							<input type="text" class="form-control" ng-model="cusData.email">
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-md-12">
							<label>ที่อยู่</label>
							<textarea class="form-control" ng-model="cusData.address"></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-md-6">
							<label>เพศ</label>
							<select class="form-control" ng-model="cusData.gender" ng-init="cusData.gender = 'm'">
								<option value="m">ชาย</option>
								<option value="f">หญิง</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross"></i> ปิด</button>
						<button type="submit" class="btn btn-success"><i class="icon-check"></i> ตกลง</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- reservation modal -->
</div>
@endsection