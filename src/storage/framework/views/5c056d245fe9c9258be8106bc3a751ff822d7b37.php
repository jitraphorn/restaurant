<?php $__env->startSection('main'); ?>
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
            <td><img src="https://dummyimage.com/50x50/000/fff"></td>
            <td>{{x.title}}</td>
            <td>{{x.price}}</td>
            <td class="text-center"><a class="btn btn-warning" href="/admin/menu/form/{{x.id}}"><i class="icon-pencil5"></i> แก้ไข</a> <a class="btn btn-danger" href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-bin"></i> ลบ</a></td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>