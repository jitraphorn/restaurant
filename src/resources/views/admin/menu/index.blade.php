@extends('../admin.layout.master')
@section('main')
<div ng-controller="menuController">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-cutlery"></i>เมนูอาหาร</h3>
      <a class="btn btn-success" href="/admin/menu/form" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</a>
      <div class="clearfix"></div>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
        <li><i class="fa fa-cutlery"></i>เมนูอาหาร</li>                
      </ol>
    </div>
  </div>
    <h3 class="alert alert-info" align="center" ng-show="!data.length">ยังไม่มีข้อมูล</h3>
    <div class="table-responsive" ng-show="data.length">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>รูปภาพ</th>
            <th>ชื่อเมนู</th>
            <th>ราคา</th>
            <th class="text-center">ตัวเลือก</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="x in data">
            <td>{{$index+1}}</td>
            <td ng-if="!x.image"><img src="https://dummyimage.com/50x50/000/fff"></td>
            <td><img src="{{x.image}}" ng-if="x.image" style="width:50px;height:50px;"></td>
            <td>{{x.name}}</td>
            <td>{{x.price | number:2}}</td>
            <td class="text-center"><a class="btn btn-warning" href="/admin/menu/form/{{x.id}}"><i class="icon-pencil5"></i> แก้ไข</a> <a class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</a></td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
@endsection