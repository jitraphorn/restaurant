<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
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
										<form ng-submit="tableReservation(tableData)">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="activities">จำนวนคน</label>
													<select name="#" id="activities" class="form-control" ng-model="tableData.person">
														<option value="">จำนวนคน</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5+</option>
													</select>
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
													<input type="text" id="time" class="form-control">
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
				<div class="modal-body" style="display:inline-block;">
					<div style="height:15px;width:15px;background:#fff;border:1px solid #000;display:inline-block;"></div> <span>ว่าง</span> 
					<div style="height:15px;width:15px;background:red;border:1px solid #000;display:inline-block;"></div> <span>ไม่ว่าง</span>
					<div style="height:15px;width:15px;background:green;border:1px solid #000;display:inline-block;"></div> <span>กำลังเลือก</span>
					<div class="clearfix"></div>
					<div class="col-xs-3 tableZ" id="tableZ{{x.id}}" ng-repeat="x in listTable" ng-class="{'table-active':x.status == '2'}" ng-click="selectTable(x)">{{x.name}}<br>จำนวน {{x.seat}} ที่นั่ง
					</div>
					<div class="clearfix"></div>
					<hr>
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
					<div class="form-group col-md-12">
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
					<div class="clearfix"></div>
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
				<div class="modal-body" style="display:inline-block;">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>ชื่อเมนู</th>
								<th>ราคา</th>
								<th>จำนวน</th>
							</tr>
							<tr ng-repeat="x in listMenu">
								<td>{{x.name}}</td>
								<td>{{x.price | number:2}}</td>
								<td><input type="number" ng-model="menu_list[x.id]" ng-init="menu_list[x.id] = 0"></td>
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