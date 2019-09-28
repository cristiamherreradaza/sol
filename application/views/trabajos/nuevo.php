<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-6 col-8 align-self-center">
				<h3 class="text-themecolor mb-0 mt-0">Forms</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Form</li>
				</ol>
			</div>
			<div class="col-md-6 col-4 align-self-center">
				<button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm float-right ml-2"><i
						class="ti-settings text-white"></i></button>
				<button class="btn float-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
				<div class="dropdown float-right mr-2 hidden-sm-down">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"> January 2019 </button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" href="#">February
							2019</a> <a class="dropdown-item" href="#">March 2019</a> <a class="dropdown-item" href="#">April 2019</a>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-outline-info">
					<div class="card-header">
						<h4 class="mb-0 text-white">Other Sample form</h4>
					</div>
					<div class="card-body">
						<form action="#">
							<div class="form-body">
								<h3 class="card-title">Person Info</h3>
								<hr>
								<div class="row pt-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">First Name</label>
											<input type="text" id="firstName" class="form-control" placeholder="John doe">
											<small class="form-control-feedback"> This is inline help </small> </div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group has-danger">
											<label class="control-label">Last Name</label>
											<input type="text" id="lastName" class="form-control form-control-danger" placeholder="12n">
											<small class="form-control-feedback"> This field has error. </small> </div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Gender</label>
											<select class="form-control custom-select">
												<option value="">Male</option>
												<option value="">Female</option>
											</select>
											<small class="form-control-feedback"> Select your gender </small> </div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Date of Birth</label>
											<input type="date" class="form-control" placeholder="dd/mm/yyyy">
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Category</label>
											<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
												<option value="Category 1">Category 1</option>
												<option value="Category 2">Category 2</option>
												<option value="Category 3">Category 5</option>
												<option value="Category 4">Category 4</option>
											</select>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Membership</label>
											<div class="mb-2">
												<label class="custom-control custom-radio">
													<input id="radio1" name="radio" type="radio" class="custom-control-input">
													<span class="custom-control-label">Free</span>
												</label>
												<label class="custom-control custom-radio">
													<input id="radio2" name="radio" type="radio" class="custom-control-input">
													<span class="custom-control-label">Paid</span>
												</label>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<h3 class="box-title mt-5">Address</h3>
								<hr>
								<div class="row">
									<div class="col-md-12 ">
										<div class="form-group">
											<label>Street</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>City</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label>State</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Post Code</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label>Country</label>
											<select class="form-control custom-select">
												<option>--Select your Country--</option>
												<option>India</option>
												<option>Sri Lanka</option>
												<option>USA</option>
											</select>
										</div>
									</div>
									<!--/span-->
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<button type="button" class="btn btn-inverse">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Row -->
	</div>
</div>
