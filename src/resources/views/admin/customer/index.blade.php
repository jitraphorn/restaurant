@extends('../admin.layout.master')
@section('main')
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i>Customer</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Customer</li>                
          </ol>
        </div>
      </div>
<div class="container" ng-controller="customerController">
<button class="btn btn-default" ng-click="form()" style='float:right'>Add Customer</button>           
  <table class="table table-hover">
    <thead>
      <tr>
        <td>#</td>
        <th>Type</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Tel</th>
        <th>E-mail</th>
        <th>Address</th>
        <th>edit</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="x in data">
      <td>{{$index+1}}</td>
        <td>{{x.type}}</td>
        <td>{{x.fname}}</td>
        <td>{{x.lname}}</td>
        <td>{{x.gender}}</td>
        <td>{{x.tel}}</td>
        <td>{{x.email}}</td>
        <td>{{x.address}}</td>
        <td><a href="/admin/customer/form/{{x.id}}">edit</a></td>
        <td><a href="javascript:void(0)" ng-click="delete(x.id)">delete</a></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection