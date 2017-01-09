@extends('../admin.layout.master')
@section('main')
<script type="text/javascript">
	var data = <?= json_encode($data);?>
</script>
<div ng-controller="roomFormController">
	<!-- Content Header -->
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header" ng-if="!data.id"><i class="icon-bed2"> เพิ่มข้อมูลห้องพัก</i></h3>
			<h3 class="page-header" ng-if="data.id"><i class="icon-bed2"></i> แก้ไขข้อมูลห้องพัก</h3>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
				<li><i class="icon-bed2"></i><a href="/admin/room">ห้องพัก</a></li>     
				<li><i class="icon-pencil6"></i>ฟอร์ม</li>                
			</ol>
		</div>
	</div>

	<!-- Data Form -->
	<form ng-submit="add(data)" name="dataForm">
		<div class="col-md-12">
			<div class="form-group">
				<label for="title">ชื่อห้องพัก</label>
				<input type="text" class="form-control" id="title" ng-model="data.title">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="description">รายละเอียด</label>
				<textarea class="form-control" id="description" ng-model="data.description"></textarea>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="type">ประเภท</label>
				<select class="form-control" ng-model="data.type" id="type">
					<option value="1">เตียงเดี่ยว</option>
					<option value="2">เตียงคู่</option>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="price">ราคา</label>
				<input type="number" class="form-control" id="price" ng-model="data.price">
			</div>
		</div>
		<div class="clearfix"></div>
		
		<!-- Image -->
		<div class="col-md-12">
			<div class="form-group">
				<button type="button" ng-click="addImage()" class="btn btn-primary"><i class="icon-plus3"></i> เพิ่มรูปภาพ</button>
				<button type="button" ng-click="removeImage()" class="btn btn-default"> <i class="icon-cross"></i> ลบรูปภาพ</button>
				<p>ขนาดแนะนำ 1200px x 800px</p>
			</div>
			<div class="form-group col-md-6">
				<input type="file" name="image[]" accept="image/*"/>
			</div>
			<div ng-repeat="x in Image" class="form-group col-md-6">
				<input type="file" name="image[]" accept="image/*"/>
			</div>
			<div class="clearfix"></div>
			<div ng-repeat="x in data.image" class="col-md-6 form-group" ng-if="data.image">
				<button ng-if="x.id" type="button" style="position:absolute;top:0;right:15px;" ng-click="deleteImage(x.id)"><i class="icon-bin"></i></button><img src="{{x.path}}" class="img-responsive"/>
			</div>
		</div>
		<div class="clearfix"></div>

		<!-- Button -->
		<div align="center">
			<button type="submit" class="btn btn-success"><i class="icon-checkmark4"></i> ตกลง</button> <a class="btn btn-default" href="/admin/room"><i class="icon-exit2"></i> ยกเลิก</a>
		</div>
	</form>
</div>
@endsection