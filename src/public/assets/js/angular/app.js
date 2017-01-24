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
		dataService.getData("/api/table/list").then(function(res){
			$scope.listTable = res.data;
			$('#tableModal').modal("show")
		})
	}

	$scope.selectTable = function(data){
		if(data.status == '1'){
			$('.tableZ').removeClass('table-selected');
			$('#tableZ'+data.id).addClass('table-selected');
			$scope.tableData.table_id = data.id;
		}else{
			alert("โต๊ะที่คุณเลือกยังไม่ว่างในตอนนี้")
		}
		
	}

	$scope.submitTableReservation = function(data){
		data.type = "C";
		let json = {order:$scope.tableData,customer:data}
		console.log(json);
		dataService.postData("/api/order/add",json).then(function(res){
			console.log(res.data.result);
			if(confirm('ต้องการเลือกรายการอาหารหรือไม่?')){
				$('#tableModal').modal("hide")
				$timeout(function() {
					menuOrder(res.data.result);
				}, 500);
			}else{
				$('#tableModal').modal("hide")
				alert("ทำรายการสำเร็จแล้ว!")
			}
		})
	}

	function menuOrder(orderId){
		$scope.menu_list = [];
		$scope.order_id = orderId;
		dataService.getData("/api/menu/list").then(function(res){
			$scope.listMenu = res.data;
			$('#menuModal').modal("show")
		})
	}

	$scope.submitMenu = function(){
		var menu_list = [];
		console.log($scope.menu_list)
		angular.forEach($scope.menu_list, function(amount, key) {
			if(amount > 0){
				menu_list.push({menu_id:key,amount:amount,order_id:$scope.order_id});
			}

		});
		console.log(menu_list)
		dataService.postData("/api/order/addMenuList",{data:menu_list}).then(function(res){
			if(res.data.result){
				$('#menuModal').modal("hide");
				alert("ทำรายการสำเร็จแล้ว!")
			}
		})

	}

});

app.controller('homeController', function ($scope, $http,$timeout,dataService) {
	console.log("home")

});