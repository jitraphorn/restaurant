<?php $__env->startSection('main'); ?>
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i>User</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>User</li>                
          </ol>
        </div>
      </div>
<div class="container" ng-controller="userControl">
<button class="btn btn-default" ng-click="form()" style='float:right'>ADD</button>           
  <table class="table table-hover">
    <thead>
      <tr>
        <td>#</td>
        <th>Username</th>
        <th>Password</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>role</th>
        <th>edit</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="x in data">
      <td>{{$index+1}}</td>
        <td>{{x.username}}</td>
        <td>{{x.password}}</td>
        <td>{{x.name}}</td>
        <td>{{x.email}}</td>
        <td>{{x.role}}</td>
        <td><a href="/admin/user/form/{{x.id}}">edit</a></td>
        <td><a href="javascript:void(0)" ng-click="delete(x.id)">delete</a></td>
      </tr>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>