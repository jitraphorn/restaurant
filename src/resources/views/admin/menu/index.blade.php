@extends('../admin.layout.master')
@section('main')
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i>Menu</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Menu</li>                
          </ol>
        </div>
      </div>
<div class="container" ng-controller="menuController">
<button class="btn btn-default" ng-click="form()" style='float:right'>Add Menu</button>           
  <table class="table table-hover">
    <thead>
      <tr>
        <td>#</td>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>edit</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="x in data">
      <td>{{$index+1}}</td>
        <td>{{x.name}}</td>
        <td>{{x.description}}</td>
        <td>{{x.price}}</td>
        <td>{{x.image}}</td>
        <td><a href="/admin/menu/form/{{x.id}}">edit</a></td>
        <td><a href="javascript:void(0)" ng-click="delete(x.id)">delete</a></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection