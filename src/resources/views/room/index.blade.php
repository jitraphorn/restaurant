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
					<a href="javascript:void(0)" class="fh5co-card-item" ng-click="click_item({{%$room->image%}})">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{%$room->image[0]->path%}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>{{%$room->name%}}</h2>
							<p class="desc-menu">{{%$room->description%}}</p>
							<p><span class="price cursive-font">{{%$room->price%}} บาท</span></p>
							<button class="btn btn-info btn-block">ทำการจอง</button>
						</div>
					</a>
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
	<!-- carousel mpdal -->
</div>
@endsection