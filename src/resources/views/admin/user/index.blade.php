@extends('../admin.layout.master')
@section('main')
<div class="container" ng-controller="userControl">
<h2>User</h2> <button class="btn btn-default" ng-click="form()">ADD</button>           
  <table class="table table-hover">
    <thead>
      <tr>
        <td>#</td>
        <th>Username</th>
        <th>Password</th>
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
        <td>{{x.role}}</td>
        <td><a href="/admin/user/form/{{x.id}}">edit</a></td>
        <td><a href="javascript:void(0)" ng-click="delete(x.id)">delete</a></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection