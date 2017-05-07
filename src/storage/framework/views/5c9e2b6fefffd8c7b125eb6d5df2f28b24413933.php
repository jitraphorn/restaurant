<?php $__env->startSection('main'); ?>
<script type="text/javascript">
  var data = <?= json_encode($data);?>
</script>
<div ng-controller="menuFormController">
  <!-- Content Header -->
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" ng-if="!data.id"><i class="fa fa-cutlery"> เพิ่มข้อมูลเมนูอาหาร</i></h3>
      <h3 class="page-header" ng-if="data.id"><i class="fa fa-cutlery"></i> แก้ไขข้อมูลเมนูอาหารก</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="/admin/">หน้าแรก</a></li>
        <li><i class="fa fa-cutlery"></i><a href="/admin/menu">เมนูอาหาร</a></li>     
        <li><i class="icon-pencil6"></i>ฟอร์ม</li>                
      </ol>
    </div>
  </div>

  <!-- Data Form -->
  <form ng-submit="add(data)" name="dataForm">
    <div class="col-md-12">
      <div class="form-group">
        <label for="name">ชื่อเมนู</label>
        <input type="text" class="form-control" id="name" ng-model="data.name">
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
        <label for="price">ราคา</label>
        <input type="number" class="form-control" id="price" ng-model="data.price">
      </div>
    </div>
    <div class="clearfix"></div>
    
    <!-- Image -->
    <div class="form-group col-md-12">
      <label for="inp">อัพโหลดรูปภาพ</label>
      <input id="inp" type="file" name="image[]" accept="image/*"/><br/>
      <label ng-if="previewImg">รูปภาพใหม่</label>
      <p align="center" style="display:none;margin-top:15px;" class="preloadImg"><i class="icon-spinner2 fa-spin fa-2x"></i> กำลังโหลด . . .</p><img id="img" src="{{previewImg}}" style="margin-top:15px;" ng-if="previewImg" class="img-responsive"/>
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-12">
      <label>รูปภาพปัจจุบัน</label><img ng-if="data.image.length" src="{{data.image}}" class="img-responsive"/>
      <p ng-if="!data.image" class="alert alert-info">ยังไม่มีรูปภาพ</p>
    </div>
    <div class="clearfix"></div>

    <!-- Button -->
    <div align="center">
      <button type="submit" class="btn btn-success"><i class="icon-checkmark4"></i> ตกลง</button> <a class="btn btn-default" href="/admin/menu"><i class="icon-exit2"></i> ยกเลิก</a>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>