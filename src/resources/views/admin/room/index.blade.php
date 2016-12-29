@extends('../admin.layout.master')
@section('main')
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i>Room</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Room</li>                
          </ol>
        </div>
      </div>
<div class="container" ng-controller="roomController">
<button class="btn btn-default" ng-click="form()" style='float:right'>Add Room</button>           
  <table class="table table-hover">
    <thead>
      <tr>
        <td>#</td>
        <th>Type</th>
        <th>Title Room</th>
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
        <td>{{x.type}}</td>
        <td>{{x.title}}</td>
        <td>{{x.description}}</td>
        <td>{{x.price}}</td>
        <td>{{x.image}}</td>
        <td><a href="/admin/room/form/{{x.id}}">edit</a></td>
        <td><a href="javascript:void(0)" ng-click="delete(x.id)">delete</a></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection