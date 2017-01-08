@extends('../admin.layout.master')
@section('main')
<div ng-controller="customerController">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="icon-address-book2"></i>ข้อมูลลูกค้า</h3>
      <a class="btn btn-success" href="/admin/customer/form" style='float:right'><i class="icon-plus-circle2"></i> เพิ่มข้อมูล</a>
      <div class="clearfix"></div>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
        <li><i class="icon-address-book2"></i>ข้อมูลลูกค้า</li>                
      </ol>
    </div>
  </div>
    <h3 class="alert alert-info" align="center" ng-show="!data.length">ยังไม่มีข้อมูล</h3>
    <div class="table-responsive" ng-show="data.length">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>ประเภท</th>
            <th>ชื่อ - นามสกุล</th>
            <th>เบอร์โทร</th>
            <th>อีเมล</th>
            <th class="text-center">ตัวเลือก</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="x in data">
          <td>{{$index+1}}</td>
            <td ng-if="x.type == 'c'">ทั่วไป</td>
            <td ng-if="x.type == 'm'">สมาชิก</td>
            <td>{{x.fname}} {{x.lname}}</td>
            <td>{{x.tel}}</td>
            <td>{{x.email}}</td>
            <td class="text-center"><a class="btn btn-warning" href="/admin/customer/form/{{x.id}}"><i class="icon-pencil5"></i> แก้ไข</a> <a class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</a></td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
@endsection