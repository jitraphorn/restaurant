var app = angular.module('app', []).constant('API_URL', 'http://localhost:8081');;

app.config(function($httpProvider){
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

app.controller('mainControl', function ($scope, $http,$timeout,dataService) {
	console.log("main")
	$scope.startLoading = function(){
		$('#page-loading').fadeIn();
	}

	$scope.endLoading = function(){
		$('#page-loading').fadeOut();
	}
});

app.controller('loginControl', function ($scope,dataService,API_URL) {

	$scope.submit = function(data){
		dataService.postData("/admin/checkLogin",data)
		.then(function(res){
			if(res.data.result){
				window.location = API_URL+"/admin/";
			}else{
				swal("ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด!", "กรุณาลองใหม่อีกครั้ง", "error");
			}
		})
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
		swal({
			title: "ต้องการลบใช่หรือไม่?",
			text: "หากทำการลบแล้วไม่สามารถกู้คืนได้!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "ยืนยัน",
			closeButtonText: "ปิด",
			closeOnConfirm: false
		},
		function(){
			dataService.getData("/admin/user/delete/"+id).then(function(res){
				if(res.data.result){
					swal("ทำการลบเรียบร้อยแล้ว!", "ข้อมูลที่คุณเลือกถูกลบแล้ว", "success");
				}else{
					swal("ทำการลบข้อมูลผิดพลาด!", "ลบข้อมูลผิดพลาดกรุณาลองใหม่อีกครั้ง", "error");
				}
				listData();
			})
		});
	}

	function init(){
		listData()
	}

	init();
});

app.controller('userFormControl', function ($scope,dataService,API_URL,$timeout) {
	if(data){
		$scope.data = data;
		$scope.data.role += "";
	}else{
		$scope.data = {};
		$scope.data.role = "1"
	}

	$scope.add = function(data){
		console.log(data);
		$('#page-loading').fadeIn();
		dataService.postData("/admin/user/add",data).then(function(res){
			if(res.data.result){
				$timeout(function(){
					swal({
						title: "การทำรายการสำเร็จ!",
						text: "ข้อมูลของคุณถูกบันทึกแล้ว",
						type: "success",
						confirmButtonClass: "btn-default",
						confirmButtonText: 'กลับสู่หน้าหลัก',
					},
					function(){
						window.location = API_URL+"/admin/";
					});
				},500)

			}else{
				swal("การทำรายการผิดพลาด!", "ชื่อผู้ใช้หรืออีเมลของคุณซ้ำ", "error");
			}
		$('#page-loading').fadeOut();
		})
	}

	function init(){
		
	}

	init();
});


app.controller('customerController', function ($scope,dataService,API_URL) {

	function listData(){
		dataService.getData("/admin/customer/list").then(function(res){
			$scope.data = res.data;
		})
	}

	$scope.form = function(){
		window.location = API_URL+"/admin/customer/form";
	}

	$scope.delete = function(id){
		dataService.getData("/admin/customer/delete/"+id).then(function(res){
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

app.controller('customerFormControl', function ($scope,dataService,API_URL) {
	if(data){
		$scope.data = data;
		$scope.data.role += "";
	}else{
		$scope.data = {};
		$scope.data.role = "1"
	}

	$scope.add = function(data){
		console.log(data);
		dataService.postData("/admin/customer/add",data).then(function(res){
			if(res.data.result){
				alert("success")
				window.location = API_URL+"/admin/customer";
			}else{
				alert("Fail")
			}
		})
	}

	function init(){
		
	}

	init();
});


app.controller('roomController', function ($scope,dataService,API_URL) {

	function listData(){
		dataService.getData("/admin/room/list").then(function(res){
			$scope.data = res.data;
		})
	}

	$scope.form = function(){
		window.location = API_URL+"/admin/room/form";
	}

	$scope.delete = function(id){
		dataService.getData("/admin/room/delete/"+id).then(function(res){
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

app.controller('roomFormControl', function ($scope,dataService,API_URL) {
	if(data){
		$scope.data = data;
		$scope.data.role += "";
	}else{
		$scope.data = {};
		$scope.data.role = "1"
	}

	$scope.add = function(data){
		console.log(data);
		dataService.postData("/admin/room/add",data).then(function(res){
			if(res.data.result){
				alert("success")
				window.location = API_URL+"/admin/room";
			}else{
				alert("Fail")
			}
		})
	}

	function init(){
		
	}

	init();
});


app.controller('menuController', function ($scope,dataService,API_URL) {

	function listData(){
		dataService.getData("/admin/menu/list").then(function(res){
			$scope.data = res.data;
		})
	}

	$scope.form = function(){
		window.location = API_URL+"/admin/menu/form";
	}

	$scope.delete = function(id){
		dataService.getData("/admin/menu/delete/"+id).then(function(res){
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

app.controller('menuFormControl', function ($scope,dataService,API_URL) {
	if(data){
		$scope.data = data;
		$scope.data.role += "";
	}else{
		$scope.data = {};
		$scope.data.role = "1"
	}

	$scope.add = function(data){
		console.log(data);
		dataService.postData("/admin/menu/add",data).then(function(res){
			if(res.data.result){
				alert("success")
				window.location = API_URL+"/admin/menu";
			}else{
				alert("Fail")
			}
		})
	}

	function init(){
		
	}

	init();
});



