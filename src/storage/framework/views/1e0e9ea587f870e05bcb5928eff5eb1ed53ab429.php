<?php $__env->startSection('main'); ?>
<script type="text/javascript">
  var data = <?= json_encode($data);?>
</script>
<div ng-controller="customerFormController">
  <!-- Content Header -->
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" ng-if="!data.id"><i class="icon-address-book2"> เพิ่มข้อมูลลูกค้า</i></h3>
      <h3 class="page-header" ng-if="data.id"><i class="icon-address-book2"></i> แก้ไขข้อมูลลูกค้าก</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
        <li><i class="icon-address-book2"></i><a href="/admin/customer">ข้อมูลลูกกค้า</a></li>     
        <li><i class="icon-pencil6"></i>ฟอร์ม</li>                
      </ol>
    </div>
  </div>

  <!-- Data Form -->
  <form ng-submit="add(data)" name="dataForm">
  <div class="col-md-6">
      <div class="form-group">
        <label for="fname">ชื่อ</label>
        <input type="text" class="form-control" id="fname" ng-model="data.fname">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lname">นามสกุล</label>
        <input type="text" class="form-control" id="lname" ng-model="data.lname">
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="email">อีเมล</label>
        <input type="email" class="form-control" id="email" ng-model="data.email">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="tel">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" id="tel" ng-model="data.tel">
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="address">ที่อยู่</label>
        <textarea class="form-control" id="address" ng-model="data.address"></textarea>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
      <div class="form-group">
      <label for="gender">เพศ</label>
        <select class="form-control" id="gender" ng-model="data.gender">
          <option value="">-- กรุณาเลือกเพศ --</option>
          <option value="m">ชาย</option>
          <option value="f">หญิง</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="type">ประเภทลูกค้า</label>
        <select class="form-control" id="type" ng-model="data.type">
        <option value="">-- กรุณาเลือกประเภท --</option>
          <option value="c">ทั่วไป</option>
          <option value="m">สมาชิก</option>
        </select>
      </div>
    </div>
    <div class="clearfix"></div>

     <div class="col-md-6" ng-if="data.type == 'm'">
      <div class="form-group">
        <label for="username">ชื่อผู้ใช้</label>
        <input type="text" class="form-control" id="username" ng-model="data.username" ng-disabled="data.id">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group" ng-if="data.type == 'm'">
        <label for="password">รหัสผ่าน</label>
        <input type="password" class="form-control" id="password" ng-model="data.password" ng-disabled="data.id">
      </div>
    </div>
    <div class="clearfix"></div>

    <!-- Button -->
    <div align="center">
      <button type="submit" class="btn btn-success"><i class="icon-checkmark4"></i> ตกลง</button> <a class="btn btn-default" href="/admin/customer"><i class="icon-exit2"></i> ยกเลิก</a>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>