@extends('../admin.layout.master')
@section('main')
<script type="text/javascript">
  var data = <?= json_encode($data);?>
</script>
<div class="container" ng-controller="userFormControl">
<h2>Add User</h2>         
  <form ng-submit="add(data)">
  <div class="form-group">
    <label for="username">username:</label>
    <input type="username" class="form-control" id="username" ng-model="data.username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" ng-model="data.password">
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
@endsection