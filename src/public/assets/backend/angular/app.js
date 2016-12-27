var app = angular.module('app', []).constant('API_URL', 'http://localhost:8081');;

app.config(function($httpProvider){
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

app.controller('mainControl', function ($scope, $http,$timeout,dataService) {
	console.log("main")
});

app.controller('loginControl', function ($scope, $http,$timeout,dataService) {
	console.log("login")
	$scope.submit = function(data){
		dataService.postData("/admin/checkLogin",data).then(function(res){
			console.log(res)
		})

		
	}
});