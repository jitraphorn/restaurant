var app = angular.module('app', []).constant('API_URL', 'http://localhost:8081');;

app.config(function($httpProvider){
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

app.controller('mainController', function ($scope, $http,$timeout,dataService) {
	console.log("main")
	$scope.tableData = {};
	$scope.tableReservation = function(data){
		var date = moment($('#date').data("DateTimePicker").date()).format('YYYY-MM-DD')
		var time = moment($('#time').data("DateTimePicker").date()).format('HH:mm:ss')
		data.datetime = date + " " + time;
		console.log(data)
		dataService.getData("/admin/table/list").then(function(res){
			$scope.listTable = res.data;
			$('#tableModal').modal("show")
		})
	}

	$scope.selectTable = function(data){
		console.log(data)
		if(data.status == '1'){
			$('.tableZ').removeClass('table-selected');
			$('#tableZ'+data.id).addClass('table-selected');
			$scope.tableData.table_id = data.id;
		}else{
			alert("โต๊ะที่คุณเลือกยังไม่ว่างในตอนนี้")
		}
		
	}

	$scope.submitTableReservation = function(data){
		alert("Comming Soon!")
	}

});

app.controller('homeController', function ($scope, $http,$timeout,dataService) {
	console.log("home")

});