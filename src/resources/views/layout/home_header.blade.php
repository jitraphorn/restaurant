<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(./assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">
				

				<div class="row row-mt-15em">
					<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
						<!-- <span class="intro-text-small">Hand-crafted by <a href="#" target="_blank">RMUTL</a></span> -->
						<h1 class="cursive-font">ยินดีต้อนรับ!</h1>	
					</div>
					<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
						<div class="form-wrap">
							<div class="tab">
								
								<div class="tab-content">
									<div class="tab-content-inner active" data-content="signup">
										<h3 class="cursive-font">จองโต๊ะและรายการอาหาร</h3>
										<form ng-submit="tableReservation()">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="activities">จำนวนคน</label>
													<input type="number" class="form-control" ng-model="tableData.person" ng-init="tableData.person = 1">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="date-start">วันที่</label>
													<input type="text" id="date" class="form-control">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="date-start">เวลา</label>
													<select class="form-control" ng-model="tableData.time" ng-init="tableData.time = '9.00น. - 12.00น.'">
														<option value="9.00น. - 12.00น.">9.00น. - 12.00น.</option>
														<option value="12.00น. - 15.00น.">12.00น. - 15.00น.</option>
														<option value="12.00น. - 18.00น.">15.00น. - 18.00น.</option>
														<option value="18.00น. - 21.00น.">18.00น. - 21.00น.</option>
													</select>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-block" value="ทำการจอง">
												</div>
											</div>
										</form>	
									</div>

									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</header>

<!-- Table Modal -->
<div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form ng-submit="submitTableReservation(cusData)">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">จองโต๊ะอาหาร</h4>
				</div>
				<div class="modal-body">
					<h4>ข้อมูลผู้จอง</h4>
					<div class="form-group col-md-6">
						<label>ชื่อ</label>
						<input type="text" class="form-control" ng-model="cusData.fname">
					</div>
					<div class="form-group col-md-6">
						<label>นามสกุล</label>
						<input type="text" class="form-control" ng-model="cusData.lname">
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-6">
						<label>เบอร์โทรศัพท์</label>
						<input type="text" class="form-control" ng-model="cusData.tel">
					</div>
					<div class="form-group col-md-6">
						<label>อีเมล</label>
						<input type="text" class="form-control" ng-model="cusData.email">
					</div>
					<div class="clearfix"></div>
<!-- 					<div class="form-group col-md-12">
						<label>ที่อยู่</label>
						<textarea class="form-control" ng-model="cusData.address"></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-6">
						<label>เพศ</label>
						<select class="form-control" ng-model="cusData.gender" ng-init="cusData.gender = 'm'">
							<option value="m">ชาย</option>
							<option value="f">หญิง</option>
						</select>
					</div>
					<div class="clearfix"></div> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross"></i> ปิด</button>
					<button type="submit" class="btn btn-success"><i class="icon-check"></i> ตกลง</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Table Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form ng-submit="submitMenu()">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">รายการอาหาร</h4>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th class="text-center">รูปภาพ</th>
								<th class="text-center">ชื่อเมนู</th>
								<th class="text-center">ราคา</th>
								<th style="max-width: 80px" class="text-center">จำนวน</th>
							</tr>
							<tr ng-repeat="x in listMenu">
								<td>
									<img src="{{x.image}}" alt="Image" style="width:50px;height: 50px">
								</td>
								<td>{{x.name}}</td>
								<td>{{x.price | number:2}}</td>
								<td style="max-width: 80px"><input type="number" class="form-control text-center" ng-model="menu_list[x.id]" ng-init="menu_list[x.id] = 0"></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross"></i> ปิด</button>
					<button type="submit" class="btn btn-success"><i class="icon-check"></i> ตกลง</button>
				</div>
			</form>
		</div>
	</div>
</div>