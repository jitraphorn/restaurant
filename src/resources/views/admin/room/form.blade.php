@extends('../admin.layout.master')
@section('main')
<script type="text/javascript">
  var data = <?= json_encode($data);?>
</script>
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Add Room</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Add Room</li>                
          </ol>
        </div>
      </div>
<div class="container" ng-controller="roomFormControl">
       
  <form ng-submit="add(data)">
  <div class="form-group">
    <label for="role">Type Bedded:</label>
    <select class="form-control" ng-model="data.type">
      <option value="1">Single Bedded Room</option>
      <option value="2">Twin Bedded Room</option>
      <option value="3">Double Bedded Room</option>
    </select>
  </div>
  <div class="form-group">
    <label for="title">Title Room :</label>
    <input type="title" class="form-control" id="title" ng-model="data.title">
  </div>
  <div class="form-group">
    <label for="description">Description :</label>
    <input type="description" class="form-control" id="description" ng-model="data.description">
  </div>
  <div class="form-group">
    <label for="Price">Price :</label>
    <input type="Price" class="form-control" id="Price" ng-model="data.price">
  </div>
  <div class="form-group">
    <label for="image">Image :</label>
    <input type="file" id="image" ng-model="data.path">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection