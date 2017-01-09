var app = angular.module('app', []).constant('API_URL', 'http://localhost:8081');;

app.config(function($httpProvider){
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

app.controller('mainController', function ($scope, $http,$timeout,dataService) {
	console.log("main")
	$scope.startLoading = function(){
		$('#page-loading').fadeIn();
	}

	$scope.endLoading = function(){
		$('#page-loading').fadeOut();
	}
});

app.controller('loginController', function ($scope,dataService,API_URL) {

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

app.controller('dashboardController', function ($scope,dataService,API_URL) {
	console.log("Dashboard")
	$("#sidebar > ul > li").removeClass('active');
	$("#dashboard-menu").addClass('active');
});

app.controller('userController', function ($scope,dataService,API_URL) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#user-menu").addClass('active');

	function listData(){
		dataService.getData("/admin/user/list").then(function(res){
			$scope.data = res.data;
		})
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

app.controller('userFormController', function ($scope,dataService,API_URL,$timeout) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#user-menu").addClass('active');

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
						window.location = API_URL+"/admin/user";
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
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#customer-menu").addClass('active');

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

app.controller('customerFormController', function ($scope,dataService,API_URL) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#customer-menu").addClass('active');

	if(data){
		$scope.data = data;
		$scope.data.type += "";
	}else{
		$scope.data = {};
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
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#room-menu").addClass('active');

	function listData(){
		dataService.getData("/admin/room/list").then(function(res){
			$scope.data = res.data;
		})
	}

	$scope.form = function(){
		window.location = API_URL+"/admin/room/form";
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
			dataService.getData("/admin/room/delete/"+id).then(function(res){
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

app.controller('roomFormController', function ($scope,dataService,API_URL,$timeout) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#room-menu").addClass('active');
	$scope.Image = []; // array for multiple image form add

	if(data){
		$scope.data = data;
		$scope.data.type += "";
		console.log($scope.data)
		$scope.data.image = data.image;
	}else{
		$scope.data = {};
		$scope.data.type = "1";
	}

	$scope.add = function(data){
		$('#page-loading').fadeIn();
		var form = document.forms.namedItem("dataForm");
		var oData = new FormData(form);
		oData.append('folder',"room");
		$.ajax({
			type:'POST',
			url: API_URL + '/admin/file/add',
			data: oData,
			processData: false,
			contentType: false,
			success: function (res){
				data.image = res;
				addData(data)
			}
		});
	}

	function addData(data){
		dataService.postData("/admin/room/add",data).then(function(res){
			console.log(res)
			if(res.data.result){
				data = "";
				$timeout(function(){
					swal({
						title: "การทำรายการสำเร็จ!",
						text: "ข้อมูลของคุณถูกบันทึกแล้ว",
						type: "success",
						confirmButtonClass: "btn-default",
						confirmButtonText: 'กลับสู่หน้าหลัก',
					},
					function(){
						window.location = API_URL+"/admin/room";
					});
				},500)

			}else{
				$timeout(function(){
					swal("การทำรายการผิดพลาด!", "กรุณาลองใหม่อีกครั้ง", "error");
				},500)
			}
		})
		$('#page-loading').fadeOut();
	}

	$scope.addImage = function(){
		$scope.Image.push({label:''});
	}

	$scope.removeImage = function(){
		$scope.Image.pop();
	}

	$scope.deleteImage = function(id){
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
			dataService.getData("/admin/room/image/delete/"+id).then(function(res){
				if(res.data.result){
					swal("ทำการลบเรียบร้อยแล้ว!", "ข้อมูลที่คุณเลือกถูกลบแล้ว", "success");
				}else{
					swal("ทำการลบข้อมูลผิดพลาด!", "ลบข้อมูลผิดพลาดกรุณาลองใหม่อีกครั้ง", "error");
				}
				listImage();
			})
		});
	}

	function listImage(){
		dataService.getData("/admin/room/image/list/"+$scope.data.id).then(function(res){
			console.log("image",res)
			$scope.data.image = res.data;
		})
		
	}

	function init(){
		
	}

	init();
});


app.controller('menuController', function ($scope,dataService,API_URL) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#menu-menu").addClass('active');

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
		listData();
	}

	init();
});

app.controller('menuFormController', function ($scope,dataService,API_URL,$timeout) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#menu-menu").addClass('active');

	function readFile() {
		$('.preloadImg').show();
		if (this.files && this.files[0]) {
			var FR= new FileReader();
			FR.onload = function(e) {
				setTimeout(function(){
					$scope.previewImg = e.target.result;
					$scope.$apply();
					$('.preloadImg').hide();
				},2000)
			};       
			FR.readAsDataURL( this.files[0] );
		}
	}

	document.getElementById("inp").addEventListener("change", readFile, false);
	
	if(data){
		$scope.data = data;
	}else{
		$scope.data = {};
	}

	$scope.add = function(data){
		$('#page-loading').fadeIn();
		var form = document.forms.namedItem("dataForm");
		var oData = new FormData(form);
		oData.append('folder',"room");
		$.ajax({
			type:'POST',
			url: API_URL + '/admin/file/add',
			data: oData,
			processData: false,
			contentType: false,
			success: function (res){
				data.image = res;
				addData(data)
			}
		});
	}

	function addData(data){
		dataService.postData("/admin/menu/add",data).then(function(res){
			console.log(res)
			if(res.data.result){
				data = "";
				$timeout(function(){
					swal({
						title: "การทำรายการสำเร็จ!",
						text: "ข้อมูลของคุณถูกบันทึกแล้ว",
						type: "success",
						confirmButtonClass: "btn-default",
						confirmButtonText: 'กลับสู่หน้าหลัก',
					},
					function(){
						window.location = API_URL+"/admin/menu";
					});
				},500)

			}else{
				$timeout(function(){
					swal("การทำรายการผิดพลาด!", "กรุณาลองใหม่อีกครั้ง", "error");
				},500)
			}
		})
		$('#page-loading').fadeOut();
	}

	function init(){
		
	}

	init();
});


app.controller('booksController', function ($scope,dataService,API_URL) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#books-menu").addClass('active');

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


app.controller('booksFormController', function ($scope,dataService,API_URL) {
	//- Active Menu
	$("#sidebar > ul > li").removeClass('active');
	$("#books-menu").addClass('active');
	
	if(data){
		$scope.data = data;
	}else{
		$scope.data = {};
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

app.controller('tableController', function ($scope, $http,$timeout,dataService) {
	console.log("table")
	function listData(){
		dataService.getData("/admin/table/list").then(function(res){
			$scope.data = res.data;
			$scope.data.status += "";
		})
	}

	$scope.form = function(data){
		if(data){
			$scope.formData = data;
		}else{
			$scope.formData = {};
			$scope.formData.seat = 1;
		}
		$('#formModal').modal('show');	
	}

	$scope.submit = function(data){
		dataService.postData("/admin/table/add",data).then(function(res){
			if(res.data.result){
				swal("ทำการลบเรียบร้อยแล้ว!", "ข้อมูลของคุณถูกบันทึกแล้ว", "success");
			}else{
				swal("การทำรายการผิดพลาด!", "กรุณาลองใหม่อีกครั้ง", "error");
			}
			listData();
			$('#formModal').modal('hide');	
		})
	}

	$scope.changeStatus = function(data){
		dataService.postData("/admin/table/add",data).then(function(res){
			if(res.data.result){
				swal("ทำการลบเรียบร้อยแล้ว!", "เปลี่ยนสถานะเรียบร้อยแล้ว", "success");
			}else{
				swal("การทำรายการผิดพลาด!", "กรุณาลองใหม่อีกครั้ง", "error");
			}
		})
	}

	function init(){
		listData();
	}

	init();
});



