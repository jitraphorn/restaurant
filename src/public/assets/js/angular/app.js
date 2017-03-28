var app = angular.module('app', []).constant('API_URL', 'http://localhost:8081');;

app.config(function($httpProvider){
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

app.controller('mainController', function ($scope, $http,$timeout,dataService) {
	console.log("main")
	$scope.tableData = {};
	$scope.tableData.date = moment(new Date()).format('YYYY-MM-DD')

	$scope.tableReservation = function(){
		$scope.tableData.date = moment($('#date').data("DateTimePicker").date()).format('YYYY-MM-DD')
		$('#tableModal').modal("show")
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

app.controller('roomController', function ($scope, $http,$timeout,dataService) {
	console.log("room")
	var myDate = new Date();
	$('#checkin_date').datetimepicker({
		format: 'DD/MM/YYYY',
		minDate:new Date(),
		defaultDate:new Date()
	});
	$('#checkout_date').datetimepicker({
		format: 'DD/MM/YYYY',
		minDate:myDate.setDate(myDate.getDate() + 1),
		defaultDate:myDate.setDate(myDate.getDate() + 1)
	});
	$scope.slide = [];
	$scope.click_item = function(image){
		$scope.slide = image;
		$('.slide-modal').modal("show");
	}

	$scope.reservation = function(){
		$('#reservationModal').modal("show");
	}

	$scope.submitReservation = function(){
		$scope.booking = {};
		$scope.booking.checkin_date = moment($('#checkin_date').data("DateTimePicker").date()).format('YYYY-MM-DD')
		$scope.booking.checkout_date = moment($('#checkout_date').data("DateTimePicker").date()).format('YYYY-MM-DD')
		let json = {booking:$scope.booking, cusData:$scope.cusData}
		console.log(json)
	}
});

app.controller('foodController', function ($scope, $http,$timeout,dataService) {
	console.log("food")
});