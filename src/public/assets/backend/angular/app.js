var app = angular.module('app', []).constant('API_URL', 'http://localhost:8081');;

app.config(function($httpProvider){
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

app.directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return val != null ? parseInt(val, 10) : null;
      });
      ngModel.$formatters.push(function(val) {
        return val != null ? '' + val : null;
      });
    }
  };
});

app.controller('mainController', function ($scope, $http,$timeout,dataService) {
	console.log("main")
	$scope.startLoading = function(){
		$('#page-loading').fadeIn();
	}

	$scope.endLoading = function(){
		$('#page-loading').fadeOut();
	}

	$scope.alertSuccess = (title = "สำเร็จ!", desc = "การทำรายการของคุณสำเร็จแล้ว") => {
		$timeout(() => {
			swal({
				title,
				text: desc,
				type: "success",
				showCancelButton: false,
				confirmButtonClass: "btn-success",
				confirmButtonText: 'Close',
			})
		},500)
		
	}

	$scope.alertFail = (title = "ผิดพลาด!", desc = "การทำรายการของคุณผิดพลาด") => {
		$timeout(() => {
			swal({
				title,
				text: desc,
				type: "error",
				showCancelButton: false,
				confirmButtonClass: "btn-danger",
				confirmButtonText: 'Close',
			})
		},500)
	}

	$scope.alertDelete = (url, callback) => {
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
		confirm => {
			console.log("confirm",confirm)
			if(confirm){
				swal({
					title: "ทำการลบเรียบร้อยแล้ว!",
					text: "ข้อมูลที่คุณเลือกถูกลบแล้ว",
					type: "success",
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: 'Close',
				})
				dataService.getData(url).then(res => {
					console.log(`callback parent:${res}`)
					callback(res);
				})
			}else{
				callback(false);
			}
	   		
		});
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
        $scope.$parent.alertDelete("/admin/user/delete/"+id,function(callback){
            if(callback.status == 200){
                listData();
            }
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
		$scope.$parent.alertDelete("/admin/customer/delete/"+id,function(callback){
			if(callback.status == 200){
				listData();
			}
		});
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
		$('#page-loading').fadeIn();
		dataService.postData("/admin/customer/add",data).then(function(res){
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
						window.location = API_URL+"/admin/customer";
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
        $scope.$parent.alertDelete("/admin/room/delete/"+id,function(callback){
            if(callback.status == 200){
                listData();
            }
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
        $scope.$parent.alertDelete("/admin/menu/delete/"+id,function(callback){
            if(callback.status == 200){
                listData();
            }
        });
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

	function viewData(id){
		dataService.getData("/admin/menu/view/"+id).then(function(res){
			$scope.data = res.data;
		})
	}

	$scope.add = function(data){
		$('#page-loading').fadeIn();
		var form = document.forms.namedItem("dataForm");
		var oData = new FormData(form);
		oData.append('folder',"menu");
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
				$scope.previewImg = "";
				viewData(res.data.id)
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
		dataService.getData("/admin/books/list").then(function(res){
			$scope.data = res.data;
		})
	}

	$scope.form = function(){
		window.location = API_URL+"/admin/books/form";
	}

    $scope.delete = function(id){
        $scope.$parent.alertDelete("/admin/books/delete/"+id,function(callback){
            if(callback.status == 200){
                listData();
            }
        });
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
		$('#page-loading').fadeIn();
		dataService.postData("/admin/menu/add",data).then(function(res){
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

app.controller('tableController', function ($scope, $http,$timeout,dataService) {
	$("#sidebar > ul > li").removeClass('active');
	$("#table-menu").addClass('active');
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
				swal("ทำรายการสำเร็จ!", "เปลี่ยนสถานะเรียบร้อยแล้ว", "success");
			}else{
				swal("การทำรายการผิดพลาด!", "กรุณาลองใหม่อีกครั้ง", "error");
			}
		})
	}

    $scope.delete = function(id){
        $scope.$parent.alertDelete("/admin/table/delete/"+id,function(callback){
            if(callback.status == 200){
                listData();
            }
        });
    }

	function init(){
		listData();
	}

	init();
});


app.controller('orderController', function ($scope, $http,$timeout,dataService) {
	$("#sidebar > ul > li").removeClass('active');
	$("#order-menu").addClass('active');
	$scope.tableList = tableList;

	function listData(){
		dataService.getData("/admin/order/list").then(function(res){
			$scope.data = res.data;
			$scope.data.status += "";
		})
	}

	$scope.form = function(data){
		delete data.$$hashKey;
		$scope.jsonx = JSON.stringify(data, null, 6);
		$('#formModal').modal('show');	
	}

	$scope.delete = function(id){
		$scope.$parent.alertDelete("/admin/order/delete/"+id,function(callback){
			if(callback.status == 200){
				listData();
			}
		});
	}

	$scope.changeTable = function(id,tableId){
		let json = {id:id,table_id:tableId};
		console.log(json)
		dataService.postData("/admin/order/update",json).then(function(res){
			if(res.data.result){
				swal("ทำรายการสำเร็จ!", "เลือกโต๊ะเรียบร้อยแล้ว", "success");
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



