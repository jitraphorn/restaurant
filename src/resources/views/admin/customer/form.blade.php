@extends('../admin.layout.master')
@section('main')
<script type="text/javascript">
  var data = <?= json_encode($data);?>
</script>
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Add Customer</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Add Customer</li>                
          </ol>
        </div>
      </div>
<div class="container" ng-controller="customerFormControl">
       
  <form ng-submit="add(data)">
  <div class="form-group">
    <label for="role">Type :</label>
    <select class="form-control" ng-model="data.type">
      <option value="C">Other</option>
      <option value="M">Member</option>
    </select>
  </div>
  <div class="form-group">
    <label for="name">Name :</label>
    <input type="name" class="form-control" id="name" ng-model="data.fname">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name :</label>
    <input type="lastname" class="form-control" id="lastname" ng-model="data.lname">
  </div>
  <div class="form-group">
    <label for="tel">Tel :</label>
    <input type="tel" class="form-control" id="tel" ng-model="data.tel">
  </div>
  <div class="form-group">
    <label for="email">E-mail :</label>
    <input type="email" class="form-control" id="email" ng-model="data.email">
  </div>
  <div class="form-group">
  <label for="comment">Address :</label>
  <textarea class="form-control" rows="5" id="comment" ng-model="data.address"></textarea>
  </div>
  <div class="form-group">
    <label for="username">Username :</label>
    <input type="username" class="form-control" id="username" ng-model="data.username">
  </div>
  <div class="form-group">
    <label for="pwd">Password :</label>
    <input type="password" class="form-control" id="pwd" ng-model="data.password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection