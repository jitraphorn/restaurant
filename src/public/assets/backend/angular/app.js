var app = angular.module('app', []).constant('API_URL', 'http://localhost:8081');;

app.config(function($httpProvider){
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

app.controller('mainControl', function ($scope, $http,$timeout,dataService) {
	console.log("main")
});

app.controller('loginControl', function ($scope,dataService,API_URL) {

	function listData(){

	}

	$scope.submit = function(data){
		dataService.postData("/admin/checkLogin",data)
		.then(function(res){
			if(res.data.result){
				window.location = API_URL+"/admin/";
			}else{
				alert("Username Password incorrect")
			}
		})
	}

	function init(){

	}
});

app.controller('userControl', function ($scope,dataService,API_URL) {

	function listData(){
		dataService.getData("/admin/user/list").then(function(res){
			$scope.data = res.data;
		})
	}

	$scope.form = function(){
		window.location = API_URL+"/admin/user/form";
	}

	$scope.delete = function(id){
		dataService.getData("/admin/user/delete/"+id).then(function(res){
			console.log(res)
			if(res.data.result){
				alert("success")
			}else{
				alert("failed")
			}
			listData();
		})
	}

	function init(){
		listData()
	}

	init();
});

app.controller('userFormControl', function ($scope,dataService,API_URL) {
	if(data){
		$scope.data = data;
		$scope.data.role += "";
	}else{
		$scope.data = {};
		$scope.data.role = "1"
	}

	$scope.add = function(data){
		console.log(data);
		dataService.postData("/admin/user/add",data).then(function(res){
			if(res.data.result){
				alert("success")
				window.location = API_URL+"/admin/user";
			}else{
				alert("Fail")
			}
		})
	}

	function init(){
		
	}

	init();
});


