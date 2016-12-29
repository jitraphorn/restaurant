@extends('../admin.layout.master')
@section('main')
<script type="text/javascript">
  var data = <?= json_encode($data);?>
</script>
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Add Menu</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Add Menu</li>                
          </ol>
        </div>
      </div>
<div class="container" ng-controller="menuFormControl">
       
  <form ng-submit="add(data)">
  <div class="form-group">
    <label for="title">Name :</label>
    <input type="title" class="form-control" id="title" ng-model="data.name">
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
    <input type="file" id="image" ng-model="data.image">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection