<?php $__env->startSection('main'); ?>
<script type="text/javascript">
	var data = <?= json_encode($data);?>
</script>
<div ng-controller="userFormControl">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-laptop"></i> Add User</h3>
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
				<li><i class="fa fa-laptop"></i>Add User</li>                
			</ol>
		</div>
	</div>
	<form ng-submit="add(data)">
		<div class="form-group">
			<label for="username">Username :</label>
			<input type="username" class="form-control" id="username" ng-model="data.username">
		</div>
		<div class="form-group">
			<label for="pwd">Password :</label>
			<input type="password" class="form-control" id="pwd" ng-model="data.password">
		</div>
		<div class="form-group">
			<label for="name">Name :</label>
			<input type="name" class="form-control" id="name" ng-model="data.name">
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" class="form-control" id="email" ng-model="data.email">
		</div>
		<div class="form-group">
			<label for="role">Role:</label>
			<select class="form-control" ng-model="data.role">
				<option value="1">Owner</option>
				<option value="2">Employee</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>